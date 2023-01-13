<?php

$title = 'Barang';
include 'layout/navbar.php';
include 'config/function.php';


?>

<h2 class="judul">Data Barang</h2>
<br>
<br>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<form method="GET" action="" class="search">
  <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>" placeholder="Search here ...">
  <i class="fa fa-search"></i>
</form>
<br><br>

<?php
    if(isset($_GET['cari'])) {
      $pencarian = $_GET['cari'];
      $query = "SELECT * FROM barang where id_barang like '%".$pencarian."%'
      or nama_barang like '%".$pencarian."%'  or modal like '%".$pencarian."%'
      or harga like '%".$pencarian."%' or stok like '%".$pencarian."%' ORDER BY id_barang ";
    }
    else {
      $query = "SELECT * FROM barang";
    }

      $barang = mysqli_query($koneksi, $query);
  ?>


<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Modal</th>
            <th>No.H</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php 
        $no = 1;
      ?>
      <?php while($data = mysqli_fetch_array($barang)) {
        $id_barang = $data['id_barang'];
        $nama_barang = $data['nama_barang'];
        $alamat = $data['alamat'];
        $no_hp = $data['no_hp'];
      ?>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td><?php echo $id_supplier;?></td>
                <td><?php echo $nama_supplier;?></td>
                <td><?php echo $alamat;?></td>
                <td><?php echo $no_hp;?></td>
                <td>
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $id_supplier; ?>">Edit</a>
                  <input type="hidden" name="idedit_supplier" id="idedit_supplier" value="<?= $id_supplier; ?>">
                  <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete<?= $id_supplier?>">Delete</a>
                  <input type="hidden" name="idhapus_supplier" id="idhapus_supplier" value="<?= $id_supplier; ?>">
                </td>
            </tr>

            <?php
      };
    ?>


<style>
  .search{
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;
}

.search input{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}

.fa{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #07051a;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
}

.search:hover{
    width: 300px;
    cursor: pointer;
}

.search:hover input{
    display: block;
}

.search:hover .fa{
    background: #07051a;
    color: white;
}

  body{
    padding-top: 2em;
    background-image: url(./images/bg.png) no-repeat;
    background-size: 100% 100%;
    background-attachment:fixed;
  }

  h2 {
    color:white;
    text-align: center;
    font-weight: bold;
    font-size: 3rem;
    margin-top: 2em;
    line-height: 3.3rem;
  }

  .container p {
    color:white;
    text-align: center;
    font-weight: bold;
    font-size: 1.5rem;
    line-height: 3.3rem;
  }


  a {
      color: white;
  }


  table {
    border-spacing: 1;
    border-collapse: collapse;
    background: white;
    border-radius: 6px;
    overflow: hidden;
    max-width: 1500px;

    width: 97%;
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
    width: 100px;
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

<script src="script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>