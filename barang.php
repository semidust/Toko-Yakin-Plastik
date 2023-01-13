<?php
$title = 'Data Barang';
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
      or nama_barang like '%".$pencarian."%' ORDER BY id_barang ";
    }
    else {
      $query = "SELECT * FROM barang";
    }

    $barangku = mysqli_query($koneksi, $query);
  ?>

<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Modal</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>

      <?php 
        $no = 1;
      ?>

<!--Tampil-->

      <?php while($data = mysqli_fetch_array($barangku)) {
        $id_barang = $data['id_barang'];
        $nama_barang = $data['nama_barang'];
        $modal = $data['modal'];
        $harga = $data['harga'];
        $stok = $data['stok'];
      ?>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td><?php echo $nama_barang;?></td>
                <td><?php echo $modal;?></td>
                <td><?php echo $harga;?></td>
                <td><?php echo $stok;?></td>
                <td>
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $id_barang; ?>">Edit</a>
                  <input type="hidden" name="idedit_barang" id="idedit_barang" value="<?= $id_barang; ?>">
                  <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete<?= $id_barang?>">Delete</a>
                  <input type="hidden" name="idhapus_barang" id="idhapus_barang" value="<?= $id_barang; ?>">
                </td>
            </tr>



              <!--Edit Data-->

              <div class="modal fade" id="edit<?= $id_barang; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Edit Barang</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="p-3 bg-body rounded" method="post" action="">
                    <div class="modal-body">

                      <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input class="form-control" name="nama_barang_edit" value="<?= $nama_barang; ?>" required>
                      </div>

                      <div class="mb-3">
                        <label for="modal" class="form-label">Modal</label>
                        <input type="number" class="form-control" name="modal_edit" value="<?= $modal; ?>" required>
                      </div>

                      <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga_edit" value="<?= $harga; ?>" required>
                      </div>

                      <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type ="number" class="form-control" name="stok_edit" value="<?= $stok; ?>" required>
                      </div>
                    </div>

                    <div class="modal-footer" >
                      <input type="hidden" name="id_bedit" id="id_bedit" value="<?= $id_barang; ?>">
                      <button type="submit" name="editbarang" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                  </div>
                </div>
            </div>

              <!--Delete Data-->
              <div class="modal fade" id="delete<?= $id_barang; ?>">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Barang</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <p>Apakah yakin ingin menghapus <?=$nama_barang;?>?</p>
                    </div>

                    <form method="post">
                    <div class="modal-footer">
                      <input type="hidden" name="id_bhapus" id="id_bhapus" value="<?= $id_barang; ?>">
                      <button type="submit" class="btn btn-primary" name="deletebarang">Delete</button>
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
            <h4 class="modal-title">Data Barang</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <form class="p-3 bg-body rounded" method="post" action="">
          <div class="modal-body">


            <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" required>
            </div>

            <div class="mb-3">
              <label for="modal" class="form-label">Modal</label>
              <input type="number" class="form-control" name="modal" required>
            </div>

            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control" name="harga" required>
            </div>

            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" class="form-control" name="stok" required>
            </div>


          </div>
          <div class="modal-footer" >
            <button type="submit" name="addbarang" class="btn btn-primary">Add</button>
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