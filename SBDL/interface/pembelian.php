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
        <a class="nav-link" href="databarang.php">Data Barang <span class="sr-only">(current)</span></a>
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
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#">Tambah Data</button>
<table class="table table-striped">
  <thead>
  <thead>
      <tr>
          <th scope="col">No.</th>
          <th scope="col">Tanggal Beli</th>
          <th scope="col">No Nota</th>
          <th scope="col">Suplier</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga Beli</th>
          <th scope="col">Jumlah Barang</th>
          <th scope="col">Total Beli</th>
          <th scope="col">User</th>
      </tr>
    </thead>
    <tbody>
      <?php
          include 'koneksi.php';
          $no = 1; 
          $query = mysqli_query($koneksi, "SELECT pembelian.no_nota_pembelian, pembelian.tgl_beli, suplier.nama_suplier, barang.nama_barang, pembelian.harga_beli, pembelian.total_beli, 
          pembelian.jumlah_barang, pembelian.user
          FROM pembelian, suplier, barang
          WHERE pembelian.kode_suplier=suplier.kode_suplier and pembelian.kode_barang=barang.kode_barang");
          while ($data = mysqli_fetch_array($query)) {
      ?>
      <tr>
          <td scope="col"><?= $no++; ?></td>
          <td scope="col"><?= $data['no_nota_pembelian'];  ?></td>
          <td scope="col"><?= $data['tgl_beli'];  ?></td>
          <td scope="col"><?= $data['nama_suplier'];  ?></td>
          <td scope="col"><?= $data['nama_barang'];  ?></td>
          <td scope="col"><?= $data['harga_beli'];  ?></td>
          <td scope="col"><?= $data['jumlah_barang'];  ?></td>
          <td scope="col"><?= $data['total_beli'];  ?></td>
          <td scope="col"><?= $data['user'];  ?></td>
          <td> <a href="#" type="button" class="btn btn-danger" onclick="return-confirm('Yakin?')">DELETE</a>
      <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>

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
      <form method="POST" action="tambahdatajual.php">
          <div class="form-group">
            <label for="kode_barang">No Nota</label>
            <input type="text" name="no_nota" class="form-control" id="no_nota">
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <?php
            include 'koneksi.php';
            $query1 = mysqli_query($koneksi, "SELECT * FROM barang");
          while ($data1 = mysqli_fetch_array($query1)) {
        ?>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio<?= $data1['kode_barang']; ?>" name="radioBarang" value="<?= $data1['kode_barang']; ?>" class="custom-control-input">
                <label class="custom-control-label" for="customRadio<?= $data1['kode_barang']; ?>"><?= $data1['nama_barang']; ?></label>
            </div>
            <?php } ?>
            
          </div>
            <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control" id="harga_jual">
          </div>  
          <div class="form-group">
            <label for="stok">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" class="form-control" id="jumlah_barang">
          </div>
          <div class="form-group">
            <label for="stok">Total</label>
            <input type="text" name="total" class="form-control" id="total">
          </div>
          <div class="form-group">
            <label for="stok">User</label>
            <input type="text" name="user" class="form-control" id="user">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
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
