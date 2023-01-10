<?php

include 'config/function.php'; 

$id_pegawai = $_GET['id_pegawai'];

if(delete_datapegawai($id_pegawai) > 0){
    echo "<script> 
            alert('Data berhasil dihapus!');
            document.location.href = 'pegawai.php';
        </script>";
}

else{
    echo "<script> 
            alert('Data gagal dihapus!');
            document.location.href = 'pegawai.php';
        </script>";
}

?>







