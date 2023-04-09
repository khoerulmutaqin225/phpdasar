$(document).ready(function(){


    // Menghiangkan berdasarkan id menggunakan jquery
    $('#tombol-cari').hide();

    // event ketika keword ditulis 
    $('#keyword').on('keyup', function(){
        $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

    });

});


