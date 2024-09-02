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

$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"
       class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Data Barang</h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body">
        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>
        <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>
        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download Pdf</a>

                
         <table class="table table-border table-striped mt-3 mx-auto" id="table">
          <thead>
            <tr class="text-center">
              <th>no</th>
              <th>nama</th>
              <th>prodi</th>
              <th>jenis kelamin</th>
              <th>telepon</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1;?>
          <?php foreach ($data_mahasiswa as $mahasiswa): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $mahasiswa ['nama'];?></td>
            <td><?= $mahasiswa ['prodi'];?></td>
            <td><?= $mahasiswa ['jk'];?></td>
            <td><?= $mahasiswa ['telepon'];?></td>
            <td class="text-center" width=19%>
               <a href="detail-mahasiswa.php?id_mahasiswa=<?=$mahasiswa['id_mahasiswa'];?>" class="btn btn-secondary btn-sm"><i class="far fa-eye"></i> detail</a> 
               <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>  ubah</a> 
               <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakinn ni boy');"><i class="fas fa-trash"></i> hapus</a> 
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
      </table>
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
