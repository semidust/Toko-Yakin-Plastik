
<style>
.mycssquote1 {
      font-weight: bold;
      font-size: 30px;
      margin-top: 7em;
      text-align: center;
      text-transform: uppercase;
      color: green;
      font-family: "Poppins", sans-serif;
      text-align: center;
      top: 50%;
      left: 50%;
}
</style>
 
 
 <?php
$koneksi=mysqli_connect("localhost","root","","hiskia");
$id=$_GET["id"];
if(isset($_POST["edit"])){
    $nama=$_POST['nama'];
    $tickets=$_POST['tickets'];
    $price=$_POST['price'];
    $no_hp=$_POST['no_hp'];

    $update=mysqli_query($koneksi,"UPDATE crud SET nama='$nama',tickets='$tickets',price='$price',no_hp='$no_hp' WHERE id='$id'");

    if($update >0){
      echo "<p class=\"mycssquote1\">Data Berhasil Diupdate.</p>";
    }

    else{
        echo "<p class=\"mycssquote\">Gagal.</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">


</head>
<body>
    </html>
    <form class="shadow-lg p-3 mb-5 bg-body rounded" method="POST">
    <h2 class="judul">Data Edit</h2><br>
  <div class="mb-3">
    <label for="nama" class="form-label">Name</label>
    <input type="text" class="form-control" name="nama" id="nama"></div>
  </div>

  <div class="mb-3">
    <label for="tickets" class="form-label">Job Title</label>
    <input type="text" class="form-control" name="tickets" id="tickets"></div>
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Total Pay ($)</label>
    <input type="text" class="form-control" name="price" id="price"></div>
  </div>

  <div class="mb-3">
    <label for="nohp" class="form-label">Phone Number</label>
    <input type="number" class="form-control" name="no_hp" id="no_hp"></div>
  </div>
<center>
<br><input type="submit" value="Save" name="edit" class="btn btn-primary">
<a class="btn btn-secondary" href="konser.php">Back</a> 
</center>
</form>

<center>
<br>
<div class="w-50 p-3">
<table class="shadow-lg p-3 mb-5 bg-body rounded">

          <thead>
            <tr>
              <th>Job Title</th>
              <th>Total Pay</th>
            </tr>
          <thead>
          <tbody>
            <tr>
              <td>Finance Manager</td>
              <td>$17,713</td>
            </tr>
               <tr>
              <td>Project Manager</td>
              <td>$10,901</td>
            </tr>
               <tr>
              <td>Supply Planner</td>
              <td>$7,473</td>
            </tr>
               <tr>
              <td>Intern</td>
              <td>$5,260</td>
            </tr>
          </tbody>
        </table>

</center>
<style>

h2 {
  color:white;
  text-align: center;
  font-weight: bold;
  font-size: 1rem;
  line-height: 3.3rem;
  background: #3647ce;
  padding: 9px;
  border-radius: 10px;
  
}


table {
border-spacing: 1;
border-collapse: collapse;
background: white;
border-radius: 6px;
overflow: hidden;
max-width: 800px;
width: 100%;
margin: 0 auto;
position: relative;
text-align: center;
}

table td, table th {
padding-left: 8px;
text-align: center;
}

table thead tr {
height: 60px;
background: #3647ce;
font-size: 16px;
color: white;
text-align: center;
}

table thead tr td {
  text-align: center;
}

table tbody tr {
height: 80px;
border-bottom: 1px solid #000000;
border-bottom-width: 2px ;
text-align: center;
}

table tbody tr:last-child {
  text-align: center;
border: 0;
}

table td, table th {
  text-align: center;
}
table td.l, table th.l {
  text-align: center;
}
table td.c, table th.c {
text-align: center;
}
table td.r, table th.r {
text-align: center;
}



</style>


<style>
    form {
        margin-top : 3.3em;
    }

    h2 {
  color:white;
  text-align: center;
  font-weight: bold;
  font-size: 1rem;
  line-height: 3.3rem;
  background: #3647ce;
  padding: 9px;
  border-radius: 10px;
  
}
  form {
    margin-left: 25em;
    margin-right: 25em;
  }
</style>

<?php

?>
