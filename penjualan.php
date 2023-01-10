<?php

$title = 'Penjualan Barang';
include 'layout/navbar.php';
include 'config/function.php';
$data_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan");
$data_barang = select("SELECT * FROM barang");
$data_pelanggan = select("SELECT * FROM pelanggan");

//cek apakah tombol add ditekan
if (isset($_POST['tambah'])) {
  if (create_datajual($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'penjualan.php';
           </script>";
  }

  else {
    echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'penjualan.php';
           </script>";
  }
}

//cek apakah tombol edit ditekan
if (isset($_POST['edit'])) {
  if (edit_datajual($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'penjualan.php';
           </script>";
  }

  else {
    echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'penjualan.php';
           </script>";
  }
}

?>

<h2 class="judul">Data Penjualan Barang</h2>
<br>
<br>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nomor Nota Jual</th>
            <th>ID Pegawai</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Tanggal Transaksi</th>
            <th>Total</th>
            <th>Nomor HP</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>

      <?php while($penjualan = mysqli_fetch_array($data_penjualan)) {
        $no = 1;
        $nota = $penjualan['no_notajual'];
        $pegawai = $penjualan['id_pegawai'];
        $id_barang = $penjualan['id_barang'];
        $nama_barang = $penjualan['nama_barang'];
        $jumlah = $penjualan['jmlh_barang'];
        $tanggal = $penjualan['tgl_transaksi'];
        $total = $penjualan['total'];
        $no_hp = $penjualan['no_hp'];
      ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $nota;?></td>
                <td><?php echo $pegawai;?></td>
                <td><?php echo $id_barang;?></td>
                <td><?php echo $nama_barang;?></td>
                <td><?php echo $jumlah;?></td>
                <td><?php echo $tanggal;?></td>
                <td><?php echo $total;?></td>
                <td><?php echo $no_hp;?></td>
                <td>
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $nota; ?>">Edit</a>
                  <input type="hidden" name="id_edit" id="id_edit" value="<?= $nota; ?>">
                  <a class="btn btn-secondary" href="penjualan_hapus.php?no_notajual=<?= $nota?>" 
                  onclick="return confirm('Apakah ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>

              <!--Edit Data-->
              <div class="modal fade" id="edit<?= $nota; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class=" bg-body rounded" method="post" action="">
                    <div class="modal-body">
                      <input type="hidden" name="id_edit" id="id_edit" value="<?= $nota; ?>">

                      <div class="mb-3">
                        <label for="no_notajual" class="form-label">Nomor Nota Jual</label>
                        <input type="number" class="form-control" name="no_notajual" value="<?= $nota; ?>" id="no_notajual" disabled>
                        <input type="hidden" name="no_notajual(edit)" id="no_notajual(edit)" value="<?= $nota; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="id_pegawai" class="form-label">ID Pegawai</label>
                        <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" 
                        value="<?= $pegawai; ?>" disabled>
                        <input type="hidden" name="id_pegawai(edit)" id="id_pegawai(edit)" value="<?= $pegawai; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="id_barang" class="form-label">ID Barang</label>
                        <input type="number" class="form-control" name="id_barang" value="<?= $id_barang; ?>" id="id_barang" disabled>
                        <input type="hidden" name="id_barang(edit)" id="id_barang(edit)" value="<?= $id_barang; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="id_pegawai" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" 
                        value="<?= $nama_barang; ?>" disabled>
                        <input type="hidden" name="nama_barang(edit)" id="nama_barang(edit)" value="<?= $nama_barang; ?>">
                      </div>
                      
                      <div class="mb-3">
                        <label for="jmlh_barang" class="form-label">Jumlah Barang</Title></label>
                        <input type="number" class="form-control" name="jmlh_barang" value="<?= $jumlah; ?>" id="jmlh_barang" required>
                      </div>

                      <div class="mb-3">
                        <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tgl_transaksi" value="<?= $tanggal; ?>" id="tgl_transaksi" required>
                      </div>

                      <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" name="total" value="<?= $total; ?>" id="total" required>
                      </div>

                      <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" 
                        value="<?= $no_hp; ?>" disabled>
                        <input type="hidden" name="no_hp(edit)" id="no_hp(edit)" value="<?= $no_hp; ?>">
                      </div>

                    </div>

                    <div class="modal-footer" >
                      <button type="submit" name="edit" id="edit" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>

    </tbody>
    <?php
      };
    ?>
</table>


    <center>
    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Add</a>
    <a class="btn btn-secondary" href="index.html">Back</a> 
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
              <label for="no_notajual" class="form-label">Nomor Nota Jual</label>
              <input type="number" class="form-control" name="no_notajual" id="no_notajual" required>
            </div>

            <div class="mb-3">
              <label for="id_pegawai" class="form-label">ID Pegawai</label>
              <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" 
              value="<?= $_SESSION['id_pegawai']; ?>" disabled>
            </div>

            <div class="mb-3">
              <label for="id_barang" class="form-label">Barang</label>
              <!--<input type="number" class="form-control" name="id_barang" id="id_barang">-->
              <select name="id_barang" id="id_barang" class="form-control" required>
              <option selected value="">::Pilih Barang::</option>
              <?php foreach($data_barang as $barang) : ?>
              <?php echo'<option value="'.$barang['id_barang'].'">
                          '.$barang['id_barang'].' <p>-</p> '.$barang['nama_barang'].'
                         </option>';
              ?>
              <?php endforeach; ?>
              <input type="hidden" name="nama_barang" id="nama_barang" value="<?= $barang['nama_barang']; ?>">
              </select>
            </div>
             
            <div class="mb-3">
              <label for="jmlh_barang" class="form-label">Jumlah Barang</Title></label>
              <input type="number" class="form-control" name="jmlh_barang" id="jmlh_barang" required>
            </div>

            <div class="mb-3">
              <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
              <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi" required>
            </div>

            <div class="mb-3">
              <label for="total" class="form-label">Total</label>
              <input type="number" class="form-control" name="total" id="total" required>
            </div>

            <div class="mb-3">
              <label for="no_hp" class="form-label">Pelanggan</label>
              <select name="no_hp" id="no_hp" class="form-control" required>
              <option selected value="">::Pilih Pelanggan::</option>
              <?php foreach($data_pelanggan as $pelanggan) : ?>
              <?php echo'<option value="'.$pelanggan['no_hp'].'">
                          '.$pelanggan['no_hp'].' <p>-</p> '.$pelanggan['nama'].'
                         </option>';
              ?>
              <?php endforeach; ?>
              </select>
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