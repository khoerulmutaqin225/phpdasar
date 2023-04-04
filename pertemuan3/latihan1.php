<?php
  // echo "Mas Boy";
  // perulangan
  // for
  // foreach
  // while
  // do.. while

  // Perulangan Pertama
  // for( $i = 0; $i < 5; $i++  ){
  //   echo "Mas Boy <br>";
  // Nilai Awal, Kondisi terminasi, Inkremen atau Dekerment

  // for( $i = 0; $i < 5; $i++  ){
  //   echo "Mas Boy <br>";
  // }


// // Perulangan Kedua
// // Nilai Awal
// $i = 0;

// // Kondisi Terminasi
// while ($i < 5 ){
//   echo "Mas Boy <br>";

//   //Inkremen atau dekermen
//   $i++;
// }

// Perulangan Ketiga
// Nilai Awal
// $i = 0;
// do{
//   echo "Mas Boy <br>";
//   $i++;
// } while ($i < 5);

// ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<table border ="1" cellpadding="10" cellspacing="0">
  <?php for($i = 1; $i <= 3; $i++)  : ?>
  <tr>
    <?php for($j =1; $j <= 5; $j++) : ?>
      <td><?php echo "$i, $j" ; ?> </td>
      <?php endfor; ?>
    </tr>
  <?php endfor; ?>

</table>

  
</body>
</html>