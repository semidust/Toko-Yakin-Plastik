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
	$supplier = $_POST['supplierm'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);

	$stoksekarang = $ambildatabarang['stok'];
    $harga = $ambildatabarang['modal'];
    $total = $qty * $harga;
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

	$supplier = $_POST['supplier_medit'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
    $cekstokmasuk = mysqli_query($koneksi, "SELECT * FROM masuk WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);
    
    $ambildatamasuk = mysqli_fetch_array($cekstokmasuk);

	$stoksekarang = $ambildatabarang['stok'];
    $harga = $ambildatabarang['modal'];
    $total = $qty * $harga;
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

//crud keluar
if (isset($_POST['addkeluar'])) {
	$idtransaksi = $_POST['transaksi'];
    $barang = $_POST['barangkeluar'];
    $qty = $_POST['jmlh_barangk'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
    $cektransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi ='$idtransaksi'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);
    $ambildatatransaksi = mysqli_fetch_array($cektransaksi);

    $tanggal = $ambildatatransaksi['tgl_transaksi'];

	$stoksekarang = $ambildatabarang['stok'];
    $harga = $ambildatabarang['harga'];
    $total = $qty * $harga;
	$tambahqty = $stoksekarang - $qty;

    $addkeluar = mysqli_query($koneksi, "INSERT INTO keluar (id_barang, id_transaksi, tgl_bkeluar, jmlh_barang, total)
    VALUES ('$barang', '$idtransaksi', '$tanggal', '$qty', '$total')");
	$updatestokkeluar = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");

	if ($addkeluar && $updatestokkeluar) {
		echo "<script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'keluar.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'keluar.php';
             </script>";
	}
}

if (isset($_POST['editkeluar'])) {
    $idkeluar = $_POST['id_kedit'];
    $barang = $_POST['barang_kedit'];
    $qty = $_POST['jmlh_kedit'];
    $idtransaksi = $_POST['transaksi_kedit'];

	$cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
    $cektransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi ='$idtransaksi'");
    $cekstokkeluar = mysqli_query($koneksi, "SELECT * FROM keluar WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);
    $ambildatatransaksi = mysqli_fetch_array($cektransaksi);
    $ambildatakeluar = mysqli_fetch_array($cekstokkeluar);

    $tanggal = $ambildatatransaksi['tgl_transaksi'];
	$stoksekarang = $ambildatabarang['stok'];
    $harga = $ambildatabarang['harga'];
    $stokkeluar = $ambildatakeluar['jmlh_barang'];

    $total = $qty * $harga;

    if ($qty>$stokkeluar) {
        $selisih = $qty - $stokkeluar;
        $tambahqty = $stoksekarang - $selisih;
    }
    else {
        $selisih = $stokkeluar - $qty;
        $tambahqty = $stoksekarang + $selisih;
    }
    
	
	$editkeluar = mysqli_query($koneksi, "UPDATE keluar SET id_transaksi = '$idtransaksi', tgl_bkeluar = '$tanggal', jmlh_barang = '$qty', 
    total = '$total'  WHERE id_keluar = $idkeluar");
	$updatestokkeluar = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");

	if ($editkeluar && $updatestokkeluar) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'keluar.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'keluar.php';
             </script>";
	}
}

if (isset($_POST['deletekeluar'])) {
	$barang = $_POST['barang_khapus'];
    $idkeluar = $_POST['id_khapus'];
    $qty = $_POST['jumlah_khapus'];
    
    $cekstokbarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang ='$barang'");
	$ambildatabarang = mysqli_fetch_array($cekstokbarang);

	$stoksekarang = $ambildatabarang['stok'];
    $tambahqty = $stoksekarang + $qty;

    $updatestokkeluar = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");
    $querykhapus = mysqli_query($koneksi, "DELETE FROM keluar WHERE id_keluar = '$idkeluar'");

	if ($updatestokkeluar && $querykhapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'keluar.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'keluar.php';
             </script>";
	}
}

//crud transaksi
if (isset($_POST['addtransaksi'])) {
    $tanggal = $_POST['tgl_transaksi'];
	$deskripsi = $_POST['deskripsi'];
	$total = $_POST['totalt'];
    $pelanggan = $_POST['pelanggant'];

	$addtransaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, deskripsi, total_transaksi, tgl_transaksi) VALUES ('$pelanggan', '$deskripsi', '$total', '$tanggal')");

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

    $updatestokkeluar = mysqli_query($koneksi, "UPDATE barang SET stok ='$tambahqty' WHERE id_barang = '$barang'");
	$querytedit = mysqli_query($koneksi, "UPDATE transaksi SET id_pelanggan = '$pelanggan', deskripsi = '$deskripsi', 
    total_transaksi = '$total', tgl_transaksi = '$tanggal' WHERE id_transaksi = '$id_tedit'");

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

	$nama_supplier = $_POST['nama_supplier'];
	$alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

	$addsupplier = mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier, alamat, no_hp) VALUES ('$nama_supplier', '$alamat', '$no_hp')");

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

if (isset($_POST['editsupplier'])) {
	$id_sedit = $_POST['id_sedit'];
    $nama_supplier_edit = $_POST['nama_supplier_edit'];
	$alamat_edit = $_POST['alamat_edit'];
	$no_hp_edit = $_POST['no_hp_edit'];

	$querysedit = mysqli_query($koneksi, "UPDATE supplier SET id_supplier = '$id_sedit', nama_supplier = '$nama_supplier_edit', 
    alamat = '$alamat_edit', no_hp = '$no_hp_edit' WHERE id_supplier = '$id_sedit'");

	if ($querysedit) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'supplier.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'supplier.php';
             </script>";
	}
}

//Crud Pelanggan
if (isset($_POST['addpelanggan'])) {
    $id_pelanggan= $_POST['id_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$no_hp = $_POST['no_hp'];


	$addpelanggan = mysqli_query($koneksi, "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, no_hp) VALUES ('$id_pelanggan', '$nama_pelanggan', '$no_hp')");

	if ($addpelanggan) {
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

if (isset($_POST['deletepelanggan'])) {
	$id_phapus = $_POST['id_phapus'];
	$hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_phapus'");

	if ($hapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'pelanggan.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'pelanggan.php';
             </script>";
	}
}

if (isset($_POST['editpelanggan'])) {
	$id_pedit = $_POST['id_pedit'];
    $nama_pelanggan_edit = $_POST['nama_pelanggan_edit'];
	$no_hp_edit = $_POST['no_hp_edit'];

	$querypedit = mysqli_query($koneksi, "UPDATE pelanggan SET id_pelanggan = '$id_pedit', nama_pelanggan = '$nama_pelanggan_edit', 
    no_hp = '$no_hp_edit' WHERE id_pelanggan = '$id_pedit'");

	if ($querypedit) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'pelanggan.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'pelanggan.php';
             </script>";
	}
}

//Crud Barang
if (isset($_POST['addbarang'])) {
    $id_barang= $_POST['id_barang'];
    $nama_barang= $_POST['nama_barang'];
    $modal= $_POST['modal'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

	$addbarang= mysqli_query($koneksi, "INSERT INTO barang (id_barang, nama_barang, modal,harga,stok) VALUES ('$id_barang', '$nama_barang', '$modal','$harga','$stok')");

	if ($addbarang) {
		echo "<script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'barang.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'barang.php';
             </script>";
	}
}

if (isset($_POST['deletebarang'])) {
	$id_bhapus = $_POST['id_bhapus'];
	$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang = '$id_bhapus'");

	if ($hapus) {
		echo "<script>
              alert('Data berhasil dihapus!');
              document.location.href = 'barang.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal dihapus!');
              document.location.href = 'barang.php';
             </script>";
	}
}

if (isset($_POST['editbarang'])) {
	$id_bedit = $_POST['id_bedit'];
    $nama_barang_edit = $_POST['nama_barang_edit'];
    $modal_edit = $_POST['modal_edit'];
    $harga_edit = $_POST['harga_edit'];
    $stok_edit = $_POST['stok_edit'];


	$querybedit = mysqli_query($koneksi, "UPDATE barang SET id_barang = '$id_bedit', nama_barang= '$nama_barang_edit', 
    modal = '$modal_edit', harga ='$harga_edit', stok = '$stok_edit' WHERE id_barang = '$id_bedit'");

	if ($querybedit) {
		echo "<script>
              alert('Data berhasil diubah!');
              document.location.href = 'barang.php';
             </script>";
	} 
    else {
		echo "<script>
              alert('Data gagal diubah!');
              document.location.href = 'barang.php';
             </script>";
	}
}

?>

