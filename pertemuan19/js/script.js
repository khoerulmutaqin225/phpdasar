// Ambil element yang akan di ambil
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');


// Tambahkan even ketik keyword ditulis
keyword.addEventListener('keyup', function(){

    // buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajak digunakan
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){  
            // console.log(xhr.responseText);
            container.innerHTML = xhr.responseText;  
            
        }
    }

    // eksekusi ajak
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();

});