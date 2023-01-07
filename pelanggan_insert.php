<?php

include 'layout/head.php';
if(isset($_POST['tambah'])){
    $nama=$_POST['nama'];
    $tickets=$_POST['tickets'];
    $price=$_POST['price'];
    $no_hp=$_POST['no_hp'];

    $tambah=mysqli_query($koneksi,"INSERT INTO crud VALUES ('','$nama','$tickets','$price','$no_hp')");
   
    if($tambah >0){
        echo "<p class=\"mycssquote\">Berhasil.</p>";
    }

    else{
        echo "<p class=\"mycssquote\">Gagal.</p>";
    }
}
?>


</html>




