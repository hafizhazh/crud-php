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

 //membatasi halaman sesuai user login
  if ($_SESSION["level"] != 1 and $_SESSION['level'] !=2 ) {
      echo "<script>
      alert('lapo ng kene');
          document.location.href ='crud-modal.php';
      </script>";
      exit;
 }




$title = 'Data Mahasiswa';

include 'layout/header.php';

$id_mahasiswa = (int)$_GET ['id_mahasiswa'];
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa= $id_mahasiswa")[0];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Detail Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <!-- /.row -->

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
                  <h1> Data <?= $mahasiswa['nama'];?> </h1>
      
        <table class="table table-bordered table-striped mt-3 mx-auto"">  
         
            <tr>
                <td>Nama</td>
                <td>: <?= $mahasiswa['nama'];?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>: <?= $mahasiswa['prodi'];?></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>: <?= $mahasiswa['jk'];?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>: <?= $mahasiswa['telepon'];?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $mahasiswa['alamat'];?></td>
            </tr>
            <tr>
                <td>email</td>
                <td>: <?= $mahasiswa['email'];?></td>
            </tr>
            <tr>
                <td width="50%">FOto</td>
                <td>
                    <a href="assets/img/<?= $mahasiswa['foto'];?>">
                        <img src="assets/img/<?= $mahasiswa['foto'];?>" alt="foto" width="50%">
                    </a>
                </td>
            </tr>

    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float:right;">kembali</a>
           </div>
      </div>
      </div>
      </div>
      </div>
      </section>
</div>
</section>
</div>
      <!-- /.container-fluid -->
    <!-- /.content -->
  <!-- /.content-wrapper -->

<?php 
include 'layout/footer.php';
?>
