<style>
    body {
        background-image: url(./images/bg.png);
    }
.mycssquote {
      font-weight: bold;
      font-size: 30px;
      margin-top: 8em;
      text-align: center;
      text-transform: uppercase;
      color: red;
      font-family: "Poppins", sans-serif;
      text-align: center;
      top: 50%;
      left: 50%;
}
</style>
 
 
<?php
    include 'config/koneksi.php';
    session_start();
    $id_pegawai = $_POST['id_pegawai'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai' and password_pegawai = '$password'");
    
    $cek = mysqli_num_rows($query);

    if ($cek == TRUE){
        $_SESSION['id_pegawai'] = $id_pegawai;
        header ("location:index.php");
    }
    else{
        echo "<p class=\"mycssquote\">Login Gagal.</p>";
    }
?>

<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
<center>
<br><a class="btn btn-secondary" href="login.php">Retry</a> 
</center>
</html>