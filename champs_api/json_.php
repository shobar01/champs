<?php  

$image          = $_POST['nm_gmbr']; 
            // $temp = explode(".", $_FILES["nm_gmbr"]["name"]); //untuk mengambil nama file gambarnya saja tanpa format gambarnya
            $nama_baru = 'bari.png'; //fungsi untuk membuat nama acak

            $path = "images_request/" . $nama_baru;
            file_put_contents($path, base64_decode($image));

         

?>