<?php

include 'koneksi.php';

//fungsi menampilkan data 
function select($query)
{
    //panggil koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//fungsi menambah data pelanggan
function create_datapelanggan($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $no_hp = $post['no_hp'];
    $alamat = $post['alamat'];

    //query tambah data
    $query = "INSERT INTO pelanggan (nama, no_hp, alamat) VALUES('$nama', '$no_hp', '$alamat')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}  

//fungsi menghapus data pelanggan
function delete_datapelanggan($no_hp)
{
    global $koneksi;

    //query hapus data 
    $query = "DELETE FROM pelanggan WHERE no_hp = $no_hp";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//crud masuk
if (isset($_POST['addmasuk'])) {
	$tanggal = $_POST['tgl_bmasuk'];
    $barang = $_POST['barangmasuk'];
    $qty = $_POST['jmlh_barangm'];
    $total = $_POST['total_barangm'];
	$supplier = $_POST['supplierm'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);

	$stoksekarang = $ambildatabarang['stok'];
	$tambahqty = $stoksekarang + $qty;

    $addmasuk = mysqli_query($koneksi, "INSERT INTO masuk (id_barang, tgl_bmasuk, jmlh_barang, total, id_supplier)
    VALUES ('$barang', '$tanggal', '$qty', '$total', '$supplier')");
	$updatestokmasuk = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");

	if ($addmasuk && $updatestokmasuk) {
		echo "<script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'masuk.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'masuk.php';
             </script>";
	}
}

if (isset($_POST['editmasuk'])) {
	$tanggal = $_POST['tgl_medit'];
    $idmasuk = $_POST['id_medit'];
    $barang = $_POST['barang_medit'];
    $qty = $_POST['jmlh_medit'];
    $total = $_POST['total_medit'];
	$supplier = $_POST['supplier_medit'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
    $cekstokmasuk = mysqli_query($koneksi, "SELECT * FROM masuk WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);
    $ambildatamasuk = mysqli_fetch_array($cekstokmasuk);

	$stoksekarang = $ambildatabarang['stok'];
    $stokmasuk = $ambildatamasuk['jmlh_barang'];

    if ($qty>$stokmasuk) {
        $selisih = $qty - $stokmasuk;
        $tambahqty = $stoksekarang + $selisih;
    }
    else {
        $selisih = $stokmasuk - $qty;
        $tambahqty = $stoksekarang - $selisih;
    }
    
	
	$editmasuk = mysqli_query($koneksi, "UPDATE masuk SET tgl_bmasuk = '$tanggal', jmlh_barang = '$qty', 
    total = '$total' , id_supplier = '$supplier' WHERE id_masuk = $idmasuk");
	$updatestokmasuk = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");

	if ($editmasuk && $updatestokmasuk) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'masuk.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'masuk.php';
             </script>";
	}
}

if (isset($_POST['deletemasuk'])) {
	$barang = $_POST['barang_mhapus'];
    $idmasuk = $_POST['id_mhapus'];
    $qty = $_POST['jumlah_mhapus'];
    
    $cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);

	$stoksekarang = $ambildatabarang['stok'];
    $tambahqty = $stoksekarang - $qty;

    $updatestokmasuk = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");
    $querymhapus = mysqli_query($koneksi, "DELETE FROM masuk WHERE id_masuk = '$idmasuk'");

	if ($updatestokmasuk && $querymhapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'masuk.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'masuk.php';
             </script>";
	}
}

//crud transaksi
if (isset($_POST['addtransaksi'])) {
    $tanggal = $_POST['tgl_transaksi'];
	$deskripsi = $_POST['deskripsi'];
	$total = $_POST['totalt'];
    $pelanggan = $_POST['pelanggant'];

	$addtransaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, deskripsi, total, tgl_transaksi) VALUES ('$pelanggan', '$deskripsi', '$total', '$tanggal')");

	if ($addtransaksi) {
		echo "<script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'transaksi.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'transaksi.php';
             </script>";
	}
}

if (isset($_POST['deletetransaksi'])) {
	$id_thapus = $_POST['id_thapus'];
	$querythapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_thapus'");

	if ($querythapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'transaksi.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'transaksi.php';
             </script>";
	}
}

if (isset($_POST['edittransaksi'])) {
	$id_tedit = $_POST['id_tedit'];
    $tanggal = $_POST['tgl_tedit'];
	$deskripsi = $_POST['deskripsi_edit'];
	$total = $_POST['total_tedit'];
    $pelanggan = $_POST['pelanggan_tedit'];
	$querytedit = mysqli_query($koneksi, "UPDATE transaksi SET id_pelanggan = '$pelanggan', deskripsi = '$deskripsi', 
    total = '$total', tgl_transaksi = '$tanggal' WHERE id_transaksi = '$id_tedit'");

	if ($querytedit) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'transaksi.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'transaksi.php';
             </script>";
	}
}


//crud supplier
if (isset($_POST['addsupplier'])) {
    $id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

	$addsupplier = mysqli_query($koneksi, "INSERT INTO supplier (id_supplier, nama_supplier, alamat, no_hp) VALUES ('$id_supplier', '$nama_supplier', '$alamat', '$no_hp')");

	if ($addsupplier) {
		echo "<script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'supplier.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'supplier.php';
             </script>";
	}
}

if (isset($_POST['deletesupplier'])) {
	$id_shapus = $_POST['id_shapus'];
	$queryshapus = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$id_shapus'");

	if ($queryshapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'supplier.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'supplier.php';
             </script>";
	}
}

if (isset($_POST['edittransaksi'])) {
	$id_tedit = $_POST['id_tedit'];
    $tanggal = $_POST['tgl_tedit'];
	$deskripsi = $_POST['deskripsi_edit'];
	$total = $_POST['total_tedit'];
    $pelanggan = $_POST['pelanggan_tedit'];
	$querytedit = mysqli_query($koneksi, "UPDATE transaksi SET id_pelanggan = '$pelanggan', deskripsi = '$deskripsi', 
    total = '$total', tgl_transaksi = '$tanggal' WHERE id_transaksi = '$id_tedit'");

	if ($querytedit) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'transaksi.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'transaksi.php';
             </script>";
	}
}


?>

