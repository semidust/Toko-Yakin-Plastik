<?php

$title = 'Barang Masuk';
include 'layout/navbar.php';
include 'config/function.php';

?>

<h2 class="judul">Data Barang Keluar</h2>
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

  <div class="row" style="width: 50%; margin-left: 300pt">
      <div class="col">
        <form method="post" class="form-inline">
        <input type="date" name="tgl_mulai" class="form-control">
      </div>

      <div class="col">
        <input type="date" name="tgl_selesai" class="form-control">
      </div>

      <div class="col">
        <button type="submit" name="filter_tgl" class="btn btn-info">Filter</button>
        </form>
      </div>
  </div>

  <br><br>

  <?php
    if(isset($_GET['cari'])) {
      $pencarian = $_GET['cari'];
      if(isset($_POST['filter_tgl'])) {
        $mulai = $_POST['tgl_mulai'];
        $selesai = $_POST['tgl_selesai'];

        if($mulai!=null || $selesai!=null) {
          $query = "SELECT * FROM keluar, transaksi, barang 
          WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
          AND (nama_barang LIKE '%".$pencarian."%')
          AND (tgl_bkeluar BETWEEN '$mulai' AND DATE_ADD('$selesai', INTERVAL 0 DAY))
          ORDER BY tgl_bkeluar";
        }
        else {
          $query = "SELECT * FROM keluar, transaksi, barang 
          WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
          AND (nama_barang LIKE '%".$pencarian."%')
          ORDER BY tgl_bkeluar";
        }
      }

      else {
        $query = "SELECT * FROM keluar, transaksi, barang 
        WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
        AND (nama_barang LIKE '%".$pencarian."%')
        ORDER BY tgl_bkeluar";
      }
    }

    else {
      if(isset($_POST['filter_tgl'])) {
        $mulai = $_POST['tgl_mulai'];
        $selesai = $_POST['tgl_selesai'];

        if($mulai!=null || $selesai!=null) {
           $query = "SELECT * FROM keluar, transaksi, barang 
           WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
           AND (tgl_bkeluar BETWEEN '$mulai' AND DATE_ADD('$selesai', INTERVAL 0 DAY))
           ORDER BY tgl_bkeluar";
        }
        else {
          $query = "SELECT * FROM keluar, transaksi, barang 
          WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
          ORDER BY tgl_bkeluar";
        }
      }

      else {
        $query = "SELECT * FROM keluar, transaksi, barang 
        WHERE (barang.id_barang = keluar.id_barang AND transaksi.id_transaksi = keluar.id_transaksi)
        ORDER BY tgl_bkeluar";
      }
    }
      $keluar = mysqli_query($koneksi, $query);
  ?>

<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal Barang Keluar</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php 
        $no = 1;
        $totaljual = 0;
      ?>
      <?php while($data = mysqli_fetch_array($keluar)) {
        $idkeluar = $data['id_keluar'];
        $idbarang = $data['id_barang'];
        $idtransaksi = $data['id_transaksi'];
        $barang = $data['nama_barang'];
        $jumlah = $data['jmlh_barang'];
        $total = $data['total'];
        $tanggal = $data['tgl_bkeluar'];
      ?>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td><?php echo date('d-m-Y', strtotime($tanggal));?></td>
                <td><?php echo $barang;?></td>
                <td><?php echo $jumlah;?></td>
                <td>Rp<?php echo $total;?></td>
                <td>
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $idkeluar; ?>">Edit</a>
                  <input type="hidden" name="idedit_keluar" value="<?= $idkeluar; ?>">
                  <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete<?= $idkeluar?>">Delete</a>
                  <input type="hidden" name="idhapus_keluar"  value="<?= $idkeluar; ?>">
                </td>
            </tr>

              <!--Edit Data-->
              <div class="modal fade" id="edit<?= $idkeluar; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Edit Barang Keluar</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="p-3 bg-body rounded" method="post" action="">
                    <div class="modal-body">

                      <div class="mb-3">
                        <label for="barang_kedit" class="form-label">Barang</label>
                        <select name="barang_keluaredit" class="form-control" disabled>
                        <?php 
                        $pilihanbarang = mysqli_query($koneksi, "SELECT * FROM barang"); 
                        while ($fetcharray = mysqli_fetch_array($pilihanbarang)) {
                          $nama_barang = $fetcharray['nama_barang'];
                          $id_barang = $fetcharray['id_barang'];
                          ?>
                          <option value="<?= $id_barang ?>">
                            <?= $nama_barang ?>
                          </option>
                        <?php
                        }
                        ?>
                        </select>
                        <input type="hidden" name="barang_kedit" class="form-control" value="<?= $idbarang?>">
                      </div>

                      <div class="mb-3">
                        <label for="jmlh_kedit" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jmlh_kedit" value="<?= $jumlah ?>" required>
                      </div>

                      <input type="hidden" name="transaksi_kedit" class="form-control" value="<?= $idtransaksi?>">
                    </div>

                    <div class="modal-footer" >
                      <input type="hidden" name="id_kedit" id="id_kedit" value="<?= $idkeluar; ?>">
                      <button type="submit" name="editkeluar" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>

              <!--Delete Data-->
              <div class="modal fade" id="delete<?= $idkeluar; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Barang Keluar</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <p>Apakah yakin ingin menghapus data <?= $barang;?> (<?=$jumlah?>)?</p>
                    </div>

                    <form method="post">
                    <div class="modal-footer">
                      <input type="hidden" name="id_khapus" value="<?= $idkeluar; ?>">
                      <input type="hidden" name="barang_khapus" value="<?= $idbarang; ?>">
                      <input type="hidden" name="jumlah_khapus" value="<?= $jumlah; ?>">
                      <button type="submit" class="btn btn-primary" name="deletekeluar">Delete</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>

    <?php
      };
    ?>
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
            <h4 class="modal-title">Tambah Barang Keluar</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <form class="p-3 bg-body rounded" method="post" action="">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="transaksi" class="form-label">Transaksi</label>
                        <select name="transaksi" class="form-control" required>
                        <option selected value="">::Pilih Transaksi::</option>
                        <?php 
                        $pilihantransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi"); 
                        while ($fetcharray = mysqli_fetch_array($pilihantransaksi)) {
                          $deskripsi = $fetcharray['deskripsi'];
                          $id_transaksi = $fetcharray['id_transaksi'];
                          $tanggal = $fetcharray['tgl_transaksi'];
                          ?>
                          <option value="<?= $id_transaksi ?>">
                            <?= date('d-m-Y', strtotime($tanggal)) ?> : <?= $deskripsi ?> 
                          </option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="barangkeluar" class="form-label">Barang</label>
                        <select name="barangkeluar" class="form-control" required>
                        <option selected value="">::Pilih Barang::</option>
                        <?php 
                        $pilihanbarang = mysqli_query($koneksi, "SELECT * FROM barang"); 
                        while ($fetcharray = mysqli_fetch_array($pilihanbarang)) {
                          $nama_barang = $fetcharray['nama_barang'];
                          $id_barang = $fetcharray['id_barang'];
                          ?>
                          <option value="<?= $id_barang ?>">
                            <?= $nama_barang ?>
                          </option>
                        <?php
                        }
                        ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="jmlh_barangk" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jmlh_barangk" required>
                      </div>

                    </div>

          <div class="modal-footer" >
            <button type="submit" name="addkeluar" class="btn btn-primary">Add</button>
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
    max-width: 1000px;

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