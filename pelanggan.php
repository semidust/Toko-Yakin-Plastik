<?php

$title = 'Data Pegawai';
include 'layout/navbar.php';
include 'config/function.php';

//cek apakah tombol add ditekan
if (isset($_POST['tambah'])) {
  if (create_data($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'pelanggan.php';
           </script>";
  }

  else {
    echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'pelanggan.php';
           </script>";
  }
}

?>

<h2 class="judul">Data Pelanggan</h2>
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

<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>No. Hp</th>
            <th>Alamat</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php
        if(isset($_GET['cari'])) {
          $pencarian = $_GET['cari'];
          $query = "SELECT * FROM pelanggan where nama_pelanggan like '%".$pencarian."%'
          or no_hp like '%".$pencarian."%' ORDER BY no_hp ";
        }
        else {
          $query = "SELECT * FROM pelanggan";
        }

        $data_pelanggan = select($query);
      ?>
      <?php foreach($data_pelanggan as $pelanggan) : ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $pelanggan['nama'];?></td>
                <td><?php echo $pelanggan['no_hp'];?></td>
                <td><?php echo $pelanggan['alamat'];?></td>
                <td>
                  <a class="btn btn-primary" href="pelanggan_edit.php?no_notajual=<?= $pelanggan['no_hp']?>">Edit</a>
                  <a class="btn btn-secondary" href="pelanggan_hapus.php?no_notajual=<?= $pelanggan['no_hp']?>" 
                  onclick="return confirm('Apakah ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>
      <?php endforeach; ?>
    </tbody>
</table>

    <center>
    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Add</a>
    <a class="btn btn-secondary" href="index.php">Back</a> 
    </center>
    <br><br><br><br>

    <!--Add Data-->
    <div class="modal fade" id="add">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <form class="p-3 bg-body rounded" method="post" action="">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nohp" class="form-label">Nomor Nota Jual</label>
              <input type="number" class="form-control" name="no_notajual" id="no_notajual">
            </div>

            <div class="mb-3">
              <label for="nohp" class="form-label">ID Pegawai</label>
              <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" 
              value="<?= $_SESSION['id_pelanggan']; ?>" disabled>
            </div>

            <div class="mb-3">
              <label for="nama" class="form-label">ID Barang</label>
              <input type="number" class="form-control" name="id_barang" id="id_barang">
            </div>

            <div class="mb-3">
              <label for="nama" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" id="nama_barang">
            </div>
          
            <div class="mb-3">
              <label for="tickets" class="form-label">Jumlah Barang</Title></label>
              <input type="number" class="form-control" name="jmlh_barang" id="jmlh_barang">
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Tanggal Transaksi</label>
              <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi">
            </div>

            <div class="mb-3">
              <label for="nohp" class="form-label">Total</label>
              <input type="number" class="form-control" name="total" id="total">
            </div>

            <div class="mb-3">
              <label for="nohp" class="form-label">Nomor HP</label>
              <input type="text" class="form-control" name="no_hp" id="no_hp">
            </div>

          </div>

          <div class="modal-footer" >
            <button type="submit" name="tambah" id="tambah" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
          </form>

        </div>
      </div>
    </div>


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

    width: 70%;
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