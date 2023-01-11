<?php

include 'config/function.php'; 

$no_notamasuk = $_GET['no_notabeli'];

if(delete_datamasuk($no_notamasuk) > 0){
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'pemasukan.php';
        </script>";
}

else{
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'pemasukan.php';
        </script>";
}

?>







