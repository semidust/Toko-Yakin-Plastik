<?php

include 'config/function.php'; 

$no_notajual = $_GET['no_notajual'];

if(delete_datajual($no_notajual) > 0){
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'penjualan.php';
        </script>";
}

else{
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'penjualan.php';
        </script>";
}

?>







