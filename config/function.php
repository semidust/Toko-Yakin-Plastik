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


//fungsi menghapus data penjualan
function delete_datajual($no_notajual)
{
    global $koneksi;

    //query hapus data 
    $query = "DELETE FROM penjualan WHERE no_notajual = $no_notajual";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menambah data penjualan
function create_datajual($post)
{
    global $koneksi;

    $no_notajual = $post['no_notajual'];
    $id_pegawai = $_SESSION['id_pegawai'];
    $id_barang = $post['id_barang'];
    $nama_barang = $post['nama_barang'];
    $jmlh_barang = $post['jmlh_barang'];
    $tgl_transaksi = $post['tgl_transaksi'];
    $total = $post['total'];
    $no_hp = $post['no_hp'];

    //query tambah data
    $query = "INSERT INTO penjualan (no_notajual, id_pegawai, id_barang, nama_barang, jmlh_barang,
    tgl_transaksi, total, no_hp) VALUES('$no_notajual', '$id_pegawai', '$id_barang', '$nama_barang', '$jmlh_barang', '$tgl_transaksi',  
    '$total', '$no_hp')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}   

//fungsi edit data penjualan
function edit_datajual($post)
{
    global $koneksi;

    $no_notajual = $post['id_edit'];
    $id_pegawai = $post['id_pegawai(edit)'];
    $id_barang = $post['id_barang(edit)'];
    $nama_barang = $post['nama_barang(edit)'];
    $jmlh_barang = $post['jmlh_barang'];
    $tgl_transaksi = $post['tgl_transaksi'];
    $total = $post['total'];
    $no_hp = $post['no_hp(edit)'];

    //query ubah data
    $query = "UPDATE penjualan SET no_notajual = '$no_notajual', id_pegawai = '$id_pegawai', id_barang = '$id_barang',
    nama_barang = '$nama_barang', jmlh_barang = '$jmlh_barang', tgl_transaksi = '$tgl_transaksi', total = '$total', 
    no_hp = '$no_hp' WHERE no_notajual = $no_notajual";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
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

//fungsi menghapus data pegawai
function delete_datapegawai($id_pegawai)
{
    global $koneksi;

    //query hapus data 
    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menambah data pegawai
function create_datapegawai($post)
{
    global $koneksi;

    $id_pegawai = $post['id_pegawai'];
    $nama_pegawai = $post['nama_pegawai'];
    $password_pegawai = $post['password_pegawai'];

    //query tambah data
    $query = "INSERT INTO pegawai (id_pegawai, nama_pegawai, password_pegawai) VALUES('$id_pegawai', '$nama_pegawai', '$password_pegawai')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}   

//fungsi menambah data pemasukan
function create_datamasuk($post)
{
    global $koneksi;

    $id_pegawai = $_SESSION['id_pegawai'];
    $id_barang = $post['id_barang'];
    $nama_barang = $post['nama_barang'];
    $no_notamasuk = $post['no_notabeli'];
    $tgl_transaksi = $post['tgl_transaksi'];
    $jmlh_barang = $post['jmlh_barang'];
    $total = $post['total'];

    //query tambah data
    $query = "INSERT INTO pemasukan_barang ( id_pegawai, id_barang, nama_barang,no_notabeli,     tgl_transaksi,jmlh_barang,
     total) VALUES( '$id_pegawai', '$id_barang', '$nama_barang','$no_notamasuk', '$tgl_transaksi',  '$jmlh_barang',
    '$total')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}  

//fungsi menghapus data pemasukan
function delete_datamasuk($no_notabeli)
{
    global $koneksi;

    //query hapus data 
    $query = "DELETE FROM pemasukan_barang WHERE no_notabeli = $no_notabeli";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//edit data pemasukan

function edit_datamasuk($post)
{
    global $koneksi;

    $id_pegawai = $post['id_pegawai'];
    $id_barang = $post['id_barang'];
    $nama_barang = $post['nama_barang'];
    $no_notamasuk = $post['no_notabeli'];
    $tgl_transaksi = $post['tgl_transaksi'];
    $jmlh_barang = $post['jmlh_barang'];
    $total = $post['total'];

    //query ubah data
    $query = "UPDATE pemasukan_barang SET  id_pegawai = '$id_pegawai', id_barang = '$id_barang',
    nama_barang = '$nama_barang', no_notabeli = '$no_notamasuk', tgl_transaksi = '$tgl_transaksi', jmlh_barang = '$jmlh_barang',  total = '$total', 
    WHERE no_notabeli = $no_notamasuk";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menambah data barang
function create_databarang($post)
{
    global $koneksi;

    $id_barang = $_SESSION['id_barang'];
    $nama_barang = $post['nama_barang'];
    $modal = $post['modal'];
    $harga = $post['harga'];
    $stok = $post['stok'];

    //query tambah data
    $query = "INSERT INTO barang (id_barang, nama_barang, modal,harga,stok) VALUES('$id_barang', '$nama_barang', '$modal','$harga','$stok')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menghapus data pelanggan
function delete_databarang($id_barang)
{
    global $koneksi;

    //query hapus data 
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>