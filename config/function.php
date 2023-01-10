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


?>