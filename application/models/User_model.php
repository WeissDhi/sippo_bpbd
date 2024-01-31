<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tb_users";

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
            ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if ($user && password_verify($post["password"], $user->password)) {
            if ($user->status_aktif == "yes") {
                // periksa password-nya
                $isPasswordTrue = password_verify($post["password"], $user->password);
                // periksa role-nya
                $isAdmin = $user->id_role == "99";
                $isKabid = $user->id_role == "1";
                $idRetana = $user->id_role == "2";

                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['id_users' => $user->id_users]);
                $this->session->set_userdata(['email' => $user->email]);
                $this->session->set_userdata(['role' => $user->id_role]);
                // jika password benar dan dia admin
                if ($isPasswordTrue && $isAdmin) {
                    // login sukses yay!
                    $this->_updateLastLogin($user->id_users);
                    redirect('dashboard');
                    return true;
                } else if ($isPasswordTrue && $isKabid) {
                    // login sukses yay!
                    $this->_updateLastLogin($user->id_users);
                    redirect('kabid');
                    return true;
                } else if ($isPasswordTrue && $idRetana) {
                    // login sukses yay!
                    $this->_updateLastLogin($user->id_users);
                    redirect('retana');
                    return true;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Upss!</strong> Password & Username anda Tidak sesuai!</div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Upss!</strong> Username / Email belum diaktivasi, silahkan cek email anda untuk klik email aktivasi atau hubungi administrator!</div>');
                redirect('auth');
            }
        } else {
            // usernya tidak tersedia
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Upss!</strong> <i class="fa fa-info-circle"></i> Username / Email tidak teregistrasi!</div>');
            redirect('auth');
        }

        // login gagal
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($id_users)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id_users={$id_users}";
        $this->db->query($sql);
    }

    //Manajemen Users
    public function cek_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_users');
        return $query;
    }

    public function cek_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_users');
        return $query;
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('tb_users tbu');
        $this->db->join('tb_user_role tbr', 'tbr.id_role = tbu.id_role', 'left');
        // $this->db->where('tbu.id_role !=', '99');
        $this->db->order_by("tbu.id_users", "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function input_users($data)
    {
        return $this->db->insert('tb_users', $data);
    }

    public function update_users($id, $data)
    {
        $this->db->where('id_users', $id);
        $hasil = $this->db->update('tb_users', $data);
        return $hasil;
    }

    public function hapus_users($id)
    {
        $this->db->where('id_users', $id);
        return $this->db->delete('tb_users');
    }

    public function data_user($id_users)
    {
        $this->db->select('*');
        $this->db->from('tb_users tbu');
        $this->db->join('tb_user_role tbr', 'tbr.id_role = tbu.id_role');
        $this->db->where('tbu.id_users', $id_users);
        $hasil = $this->db->get();
        return $hasil->row();
    }

    public function cek_status_pass($id_users)
    {
        $this->db->select('status_pass');
        $this->db->from('tb_users tbu');
        $this->db->where('tbu.id_users', $id_users);
        $hasil = $this->db->get();
        return $hasil->row()->status_pass;
    }

    public function getAllRole()
    {
        $this->db->where('id_role !=', '2');
        $this->db->order_by("id_role", "Asc");
        $query = $this->db->get("tb_user_role");
        return $query;
    }

    public function getRoleById($id_role)
    {
        $this->db->select('role');
        $this->db->where('id_role', $id_role);
        $query = $this->db->get("tb_user_role");
        return $query;
    }

    //############### Back End #################

    var $table = 'tb_users';
    var $column_order = array('username', 'email', 'alamat', 'full_name', 'no_hp', 'role', 'status_aktif', 'status_pass', 'tgl_update', null);
    var $column_search = array('username', 'email', 'alamat', 'full_name', 'no_hp', 'role', 'status_aktif', 'status_pass', 'tgl_update');
    var $order = array('id_users' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from('tb_users tbu');
        $this->db->join('tb_user_role tbr', 'tbr.id_role = tbu.id_role', 'left');

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        // $this->db->from($this->table); 
        $this->db->from('tb_users tbu');
        $this->db->join('tb_user_role tbr', 'tbr.id_role = tbu.id_role', 'left');
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_users', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_users', $id);
        return $this->db->delete($this->table);
    }
}
