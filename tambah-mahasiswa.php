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

$title = 'Tambah mahasiswa';


include 'layout/header.php';


//cek apakah tombol tambah di tekan

if(isset($_POST['tambah'])){
    if(create_mahasiswa($_POST) > 0){
        echo "
        <script>
        alert('data mahasiswa berhasil di tambahkan');
        document.location.href='mahasiswa.php';
        </script>
        ";

    }else {
        echo "
        <script>
        alert('data mahasiswa gagal di tambahkan');
        document.location.href='mahasiswa.php';
        </script>
        ";
    }
}
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-plus"></i>Tambah mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mahasiswa.php">data mahasiswa</a></li>
              <li class="breadcrumb-item active">Tambah mahasiswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content"
       <div class="container-fluid">  

 <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
  <label for="nama" class="form-label">Nama Mahasiswa</label>
  <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama mahasiswa"
  required>
</div>

 <div class="row">
               <div class="mb-3 col-6">
  <label for="prodi" class="form-label">Program Studi</label>
  <select name="prodi" id="prodi" class="form-control" required>
    <option value="">Pilih Program Studi</option>
    <option value="Teknik Mesin">Teknik Mesin</option>
    <option value="Arsitektur">Arsitektur</option>
    <option value="Sastra Inggris">Sastra Inggris</option>
  </select>
</div>

<div class="mb-3 col-6">
  <label for="jk" class="form-label">Jenis Kelamin</label>
  <select name="jk" id="jk" class="form-control" required>
    <option value="">Pilih jenis kelamin</option>
    <option value="laki-laki">laki-laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
</div>

<div class="mb-3" style : margin-left:3px;>
  <label for="telepon" class="form-label">Telepon</label>
  <input type="number" class="form-control" id="telepon" name="telepon" placeholder="masukan no telepon"
  required>
</div>


<div class="mb-3">
  <label for="alamat" class="form-label">alamat </label>
<textarea name="alamat"></textarea>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email" placeholder="masukan email"
  required>
</div>

<div class="mb-3">
  <label for="foto" class="form-label">Foto</label>
  <input type="file" class="form-control" id="foto" name="foto" placeholder="foto"
  onchange="previewImg()">
  <img src="" alt="" class="img-thumbnail img-preview mt-2" width="100px">
</div>
</div>
<button type="submit" name="tambah" class="btn btn-primary" style="float:right;">Tambah</button>

        </form>
    </div>
    <script>
      function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
          imgPreview.src = e.target.result;
        }
      }
    </script>
      </div>
</section>
</div>

<?php 
include 'layout/footer.php';
?>
