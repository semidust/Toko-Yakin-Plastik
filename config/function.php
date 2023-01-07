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
    global $db;

    $id_edit = $post['id_edit'];
    $jmlh_barang = $post['jmlh_barang'];
    $tgl_transaksi = $post['tgl_transaksi'];
    $total = $post['total'];

    //query ubah data
    $query = "UPDATE penjualan SET jmlh_barang = '$jmlh_barang', tgl_transaksi = '$tgl_transaksi', total = '$total', 
     WHERE no_notajual = $id_edit";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

?>