<?php

include 'config/function.php'; 

$id_barang = $_GET['id_barang'];

if(delete_databarang($id_barang) > 0){
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'barang.php';
        </script>";
}

else{
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'barang.php';
        </script>";
}

?>