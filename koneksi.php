<?php
$host="localhost";
$user="root";
$pass="";
$name="hiskia";
$koneksi=mysqli_connect($host,$user,$pass) or die("Koneksi ke Database Gagal...");
mysqli_select_db($koneksi,$name);
?>