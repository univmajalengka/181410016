<?php 
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }else{
         $username = $_SESSION['username'];
    }
 ?>
<html>
<head>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel='stylesheet' href='fontawesome/css/all.css'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Data Barang <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="penjualan.php">Penjualan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pembelian.php">Pembelian <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="suplier.php">Suplier <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a href="logout.php"><button type="button" class="btn btn-danger" onclick="return-confirm('Yakin?')">Logout</button></a>
  </div>
</nav>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambah">Tambah Suplier</button>
<table class="table table-striped">
  <thead>
    <tr>
          <th scope="col">No.</th>
          <th scope="col">Kode Suplier</th>
          <th scope="col">Nama Suplier</th>
          <th scope="col">Alamat</th>
          <th scope="col">No. Telp</th>
    </tr>
  </thead>
  <tbody>
  <?php
          include 'koneksi.php';
          $no = 1; 
          $query = mysqli_query($koneksi, "SELECT * FROM suplier");
          while ($data = mysqli_fetch_array($query)) {
      ?>
    <tr>
          <td scope="col"><?= $no++; ?></td>
          <td scope="col"><?= $data['kode_suplier'];  ?></td>
          <td scope="col"><?= $data['nama_suplier'];  ?></td>
          <td scope="col"><?= $data['alamat'];  ?></td>
          <td scope="col"><?= $data['no_telp'];  ?></td>
          <td> <a href="hapus_suplier.php?kode_suplier=<?= $data['kode_suplier']?>" type="button" class="btn btn-danger" onclick="return-confirm('Yakin?')">DELETE</a>
      <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

  <!-- ################################################## -->
  <div class="modal" tabindex="-1" role="dialog" id="tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="tambah_suplier.php">
          <div class="form-group">
            <label for="kode_barang">Kode Suplier</label>
            <input type="text" name="kode_suplier" class="form-control" id="kode_suplier">
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Suplier</label>
            <input type="text" name="nama_suplier" class="form-control" id="nama_suplier">
          </div>
            <div class="form-group">
            <label for="harga_barang">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat">
          </div>  <div class="form-group">
            <label for="harga_jual">No Telp</label>
            <input type="text" name="no_telp" class="form-control" id="no_telp">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Suplier</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

    <script src="assets/dist/js/jquery.min.js"></script>
    <script src="assets/dist/js/bootstrap.min.js"></script>
</body>
</html>
