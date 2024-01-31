<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konten extends CI_Model
{
    public function getDataKonten($id_konten)
    {
        $this->db->where('id_konten', $id_konten);
        $query = $this->db->get('tb_konten');
        return $query;
    }

    public function update($id, $data)
    {
        $this->db->where('id_konten', $id);
        $hasil = $this->db->update('tb_konten', $data);
        return $hasil;
    }
}
