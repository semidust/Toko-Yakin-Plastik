
<style>
.mycssquote {
      font-weight: bold;
      font-size: 30px;
      margin-top: 7em;
      text-align: center;
      text-transform: uppercase;
      color: black;
      font-family: "Poppins", sans-serif;
      text-align: center;
      top: 50%;
      left: 50%;
}
</style>

<?php
$koneksi=mysqli_connect("localhost","root","","hiskia");
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

<html>
<link rel="stylesheet" href="uts.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    
    <center>
    <a class="btn btn-primary" href="konser_tambah.html">Add</a>
    <a class="btn btn-secondary" href="konser.php">Back</a> 
    </center>

</html>




