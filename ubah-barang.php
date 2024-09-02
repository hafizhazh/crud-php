<?php
session_start();
//membatasi halaman login
 if (!isset($_SESSION["login"])) {
      echo "<script>
      alert('login lah boy');
          document.location.href ='login.php';
      </script>";
      exit;
 }

$title = 'Ubah Barang';

include 'layout/header.php';


//mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

//cek apakah tombol tambah di tekan

if(isset($_POST['ubah'])){
    if(update_barang($_POST) > 0){
        echo "
        <script>
        alert('data barang berhasil di ubah');
        document.location.href='index.php';
        </script>
        ";

    }else {
        echo "
        <script>
        alert('data barang gagal di ubah');
        document.location.href='index.php';
        </script>
        ";
    }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-edit"></i> Ubah barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">data barang</a></li>
              <li class="breadcrumb-item active">ubah barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"
       <div class="container-fluid">  
        <form action="" method="post">
            <input type="hidden" name="id_barang" value="<?= $barang['id_barang']?>">
            <div class="mb-3">
  <label for="nama" class="form-label">Nama Barang</label>
  <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']?>" placeholder="masukan nama barang"
  required>
</div>

<div class="mb-3">
  <label for="Jumlah" class="form-label">Jumlah Barang</label>
  <input type="number" class="form-control" id="Jumlah" name="jumlah" value="<?= $barang['jumlah']?>" placeholder="masukan Jumlah barang"
  required>
</div>


<div class="mb-3">
  <label for="Harga" class="form-label">Jumlah Barang</label>
  <input type="number" class="form-control" id="Harga" name="harga" value="<?= $barang['harga']?>" placeholder="masukan harga barang"
  required>
</div>


<button type="submit" name="ubah" class="btn btn-primary" style="float:right;">Ubah</button>

        </form>
      </div>
</section>
</div>
      <!-- /.container-fluid -->
    <!-- /.content -->
  <!-- /.content-wrapper -->

<?php 
include 'layout/footer.php';
?>
