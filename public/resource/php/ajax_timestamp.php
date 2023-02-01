<?php
date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
$wkt = "<h1 ><b>".date('H:i:s')."</b></h1>"; //Menampilkan Jam Sekarang
$tgl = "<p ><b>".date('l, d M Y')."</b></p>"; //Menampilkan Jam Sekarang

echo $wkt.$tgl;//Menampilkan Jam Sekarang
?>
