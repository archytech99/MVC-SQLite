$(function() {
    /*$('.modal-footer .btn-batalUser').on('click', function() {
        $('#name').val('');
        $('#email').val('');
        $('#username').val('');
        $('#password').val('');
    });

    $('.nav-item .btn-logout').on('click', function() {
        if (typeof urlUser !== 'undefined') {
            var getUrl = urlUser.replace('/user','')+'/logout';
        }
        $('.modal-header h5').html('Logout?');
        $('.modal-body p').html('Apakah anda yakin untuk mengakhiri session login anda saat ini ?');
        $('.modal-footer a').html('Logout');
        $('.modal-footer a').attr('href', getUrl);
        $('.modal-footer form').attr('action', getUrl);

    });

    $('.btn-addUser').on('click', function() {
        $('#addUserModalLabel').html('Tambah Pengguna Baru');
        $('.modal-footer button[type=submit]').html('Simpan');
    });

    $('.btn-hapusUser').on('click', function() {
        const idUser = $(this).data('id');

        $('.modal-header h5').html('Hapus Data');
        $('.modal-body p').html('Apakah anda yakin untuk menghapus data ini ?');
        $('.modal-footer a').html('Hapus');
        $('.modal-footer a').attr('href', urlUser+'/'+idUser+'/destroy');
        $('.modal-footer form').attr('action', urlUser+'/'+idUser+'/destroy');
    });*/

    $('.list-group-item .btn-editUser').on('click', function() {
        const idUser = $(this).data('id');
        console.log('idUser');

        /*$('#addUserModalLabel').html('Ubah Data Pengguna');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-body form').attr('action', urlUser+'/'+idUser+'/edit');

        $.ajax({
            url: urlUser+'/'+idUser+'/edit',
            data: {id : idUser},
            method: 'get',
            dataType: 'json',
            success: function(data) {
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#username').val(data.username);
            }
        });*/
    });
});