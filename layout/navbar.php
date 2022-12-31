<?php

session_start();
include 'head.php'

?>

<body>

    
    <div class="wrapper">

        <header>
          <a class="navbar-brand" href="#">
            <img src="" height="130">
          </a>

            <!-- <a href="#" class="logo text-dark fs-3">Uni<span>lever.</span></a> -->


            <nav class="mx-auto">                
                <ul>
                    <li><a class="btn btn-outline-light" href="index.php">Home</a></li>
                    <li><a class="btn btn-outline-light" href="./barang.php">Barang</a></li>
                    <li><a class="btn btn-outline-light" href="">Pemasukan</a></li>
                    <li><a class="btn btn-outline-light" href="./penjualan.php">Penjualan</a></li>
                    <li><a class="btn btn-danger" href="aksi_logout.php">Logout</a></li>
                </ul>
            </nav>

        </header>