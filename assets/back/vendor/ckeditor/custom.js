// CKEditor
CKEDITOR.replace('editor', {
    filebrowserBrowseUrl: '../assets/backend/manajemen_file/manajemen_file.html',
    filebrowserUploadUrl: '../assets/backend/manajemen_file/core/connector/php/connector.php?command=QuickUpload&type=Files',

    // plugin options example
    qtRows: 20,
    qtColumns: 20,
    qtBorder: '1',
    qtWidth: '90%',
    qtStyle: {
        'border-collapse': 'collapse'
    },
    qtClass: 'test',
    qtCellPadding: '0',
    qtCellSpacing: '0'
});

function kirim(link_url, data_item) {

    // console.log([link_url, data_item]);

    $.ajax({
        type: 'POST',
        url: link_url,
        dataType: "JSON",
        data: data_item,
        cache: false,
        success: function (returnData) {
            // console.log(returnData);

            status = returnData['status'];
            pesan = returnData['pesan'];

            if (status == 'success') {
                $("#waktu").empty().append(returnData['tgl_update']);
                swal(pesan, {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: "btn btn-success"
                        }
                    },
                    timer: 3000,
                });
            } else {
                swal(pesan, {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: "btn btn-danger"
                        }
                    },
                    timer: 3000,
                });
            }
        },
    });
    return false;
}

function save_auto(link_url, data_item) {

    $.ajax({
        type: 'POST',
        url: link_url,
        dataType: "JSON",
        data: data_item,
        cache: false,
        success: function (returnData) {
            $("#waktu").empty().append(returnData['tgl_update']);
        },
    });
    return false;
}
