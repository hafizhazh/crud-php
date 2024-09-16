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

$title = 'Data Pegawai';

include 'layout/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data pegawai</li>
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
                <h3 class="card-title">Table Data pegawai</h3>
              </div>
              <!-- /.card-header -->
               <div class="card-body">
           
         <table class="table table-border table-striped">
          <thead>
            <tr >
              <th>no</th>
              <th>nama</th>
              <th>jabatan</th>
              <th>email</th>
              <th>telepon</th>
              <th>alamat</th>
            </tr>
          </thead>
          <tbody id="live_data">

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

<script>
    $('document').ready(function(){
       setInterval(function(){
         getPegawai()
       },200)
    });

    function getPegawai()
{
    $.ajax({
        url: "realtime-pegawai.php",
        type: "GET",
        success: function(response){
            $('#live_data').html(response)
        }
    });
}
    
</script>

<?php 
include 'layout/footer.php';
?>
