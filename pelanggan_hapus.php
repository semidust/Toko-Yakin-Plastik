<?php

include 'config/function.php'; 

$no_hp = $_GET['no_hp'];

if(delete_datapelanggan($no_hp) > 0){
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'pelanggan.php';
        </script>";
}

else{
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'pelanggan.php';
        </script>";
}

?>







