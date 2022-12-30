<h2 class="judul">Hiring Data</h2>
<br>
<br>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<table class="shadow-lg p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Total Pay ($)</th>
            <th>Phone Number</th>
            <th>Edit | Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $koneksi=mysqli_connect("localhost","root","","hiskia");
        $query = mysqli_query($koneksi, "SELECT * FROM crud");
        $no = 0;
        while($data = mysqli_fetch_array($query)){
            $no++;
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['tickets'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['no_hp'];?></td>
        
        <td>
            <a class="btn btn-primary" href="konser_edit.php?id=<?= $data['id']?>">Edit</a>
            <a class="btn btn-secondary" href="konser_hapus.php?id=<?= $data['id']?>">Delete</a>
    <?php
        }
        ?>
        </tbody>
    </table>

    <center>
    <a class="btn btn-primary" href="konser_tambah.html">Add</a>
    <a class="btn btn-secondary" href="../index.html">Back</a> 
    </center>
    <br><br><br><br>

<style>

h2 {
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
  max-width: 800px;
  width: 100%;
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