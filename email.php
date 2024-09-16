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

$title = 'kirim email';

include 'layout/header.php';

?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-envelope"></i>Kirim email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">kirim email</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content"
       <div class="container-fluid">  
      <form action="email-proses.php" method="post">
            <div class="mb-3">
  <label for="email penerima" class="form-label">Nama Penerima</label>
  <input type="email" class="form-control" id="email penerima" name="email_penerima" placeholder="Email penerima"
  required>
</div>

<div class="mb-3">
  <label for="subjek" class="form-label">subjek</label>
  <input type="text" class="form-control" id="subjek" name="subjek" placeholder="masukan subjek penerima"
  required>
</div>


<div class="mb-3">
  <label for="pesan" class="form-label">Pesan</label>
  <textarea name="pesan" id="pesan" col="20" rows="20" class="form-control"></textarea>
</div>


<button type="submit" name="kirim" class="btn btn-primary" style="float:right;">kirim</button>

        </form>
      </div>
</section>
</div>

<?php 
include 'layout/footer.php';
?>
