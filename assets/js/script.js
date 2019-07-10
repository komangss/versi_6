$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    // ketika tombol ubahnya di klik
    $('.tampilModalUbah').on('click', function() {
        $('#formModalLabel').html('Ubah Data Mahasiswa'); // ubah isinya (judul)
        $('.modal-footer button[type=submit]').html('Ubah Data'); // css selector. cari di class modalFooter-> button yg typenya submit
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/13-search/public/mahasiswa/ubah'); // ubah action modal-body -> form, dari tambah ke method ubah

        const id = $(this).data('id'); // tombol yg kita klik. kita ambil datanya (id)
        
        // jalankan ajax. memiliki parameter. yg pertama. url (ambil data ke url mana?)
        $.ajax({
            url: 'http://localhost/phpmvc/13-search/public/mahasiswa/getubah', // jalankan method yg bernama getUbah di Controller mahasiswa
            data: {id : id}, // kita mengirimkan bisa berupa objek // id kiri adalah nama data yg dikirimkan
            method: 'post', // datanya dikirmkan menggunakan method post/get
            dataType: 'json', // tipe datanya bisa teks biasa atau JSON
            success: function(data) { // ketika sukses : akan diterima oleh f(data)
                $('#nama').val(data.nama); // elemen dengan id ganti dengan objek data.nama
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
        
    });

});