<?php 
   // function date 
   // function untuk menampilkan tanggal dengan format tertentu
   //    echo date("l, d-m-y <br>");

   // Time
   // UNIX Timestamp / EPOCH Time
   // Detik Setelah 1 Januari 1970

//    echo time();
// 2 hari setelah ini
// echo date("l d-m-y", time()+60*60*24*360);

//mk time
// Membuat detik sendiri
// mmk time ()
// mktime (0,0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0,0,0,7,3,1999));


//strtotime
echo strtotime("l", strtotime("3 Jul 1999 "));
?>