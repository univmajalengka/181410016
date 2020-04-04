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
    <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
  </div>
</nav>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambah">Tambah Barang</button>
<table class="table table-striped">
  <thead>
    <tr>
          <th scope="col">No.</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Beli</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Stok Barang</th>
    </tr>
  </thead>
  <tbody>
  <?php
          include 'koneksi.php';
          $no = 1; 
          $query = mysqli_query($koneksi, "SELECT * FROM barang");
          while ($data = mysqli_fetch_array($query)) {
      ?>
    <tr>
          <td scope="col"><?= $no++; ?></td>
          <td scope="col"><?= $data['kode_barang'];  ?></td>
          <td scope="col"><?= $data['nama_barang'];  ?></td>
          <td scope="col"><?= $data['harga_beli'];  ?></td>
          <td scope="col"><?= $data['harga_jual'];  ?></td>
          <td scope="col"><?= $data['stok'];  ?></td>
          <td> <a href="hapus.php?kode_barang=<?= $data['kode_barang']?>" type="button" class="btn btn-danger" onclick="return-confirm('Yakin?')">DELETE</a>
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
      <form method="POST" action="tambah.php">
          <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" id="kode_barang">
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" id="nama_barang">
          </div>
            <div class="form-group">
            <label for="harga_barang">Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control" id="harga_barang">
          </div>  <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control" id="harga_jual">
          </div>  <div class="form-group">
            <label for="stok">Stok</label>
            <input type="text" name="stok" class="form-control" id="stok">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Barang</button>
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
