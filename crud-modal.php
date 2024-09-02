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




$title = 'Data Akun';

include 'layout/header.php';


//tampil seluruh data
$data_akun = select("SELECT * FROM akun");


//tampil seluruh data
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");



//jika tombol di tekan
if (isset($_POST['tambah'])) {
    if (create_akun($_POST)>0) {
         echo "
        <script>
        alert('data akun berhasil di tambahkan');
        document.location.href='crud-modal.php';
        </script>
        ";

    }else {
        echo "
        <script>
        alert('data akun gagal di tambahkan');
        document.location.href='crud-modal.php';
        </script>
        ";
    }
}

if (isset($_POST['ubah'])) {
    if (update_akun($_POST)>0) {
         echo "
        <script>
        alert('data akun berhasil di ubah');
        document.location.href='crud-modal.php';
        </script>
        ";

    }else {
        echo "
        <script>
        alert('data akun gagal di ubah');
        document.location.href='crud-modal.php';
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
            <h1 class="m-0">Data Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Akun</li>
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
                <h3 class="card-title">Table Data Akun</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"> Tambah</button>
        <div class="container mt-5">
        <?php if ($_SESSION['level'] == 1): ?>
</button>
<?php endif; ?>
        <table class="table table-border table-striped mt-3 mx-auto" id="table">
          <thead>
            <tr>
              <th>no</th>
              <th>nama</th>
              <th>username</th>
              <th>email</th>
              <th>password</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no =1;?>
        <!--tampil seluruh data-->
            <?php  if ($_SESSION['level'] == 1 ): ?>
            <?php foreach($data_akun as $akun): ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $akun['nama'];?></td>
                    <td><?= $akun['username'];?></td>
                    <td><?= $akun['email'];?></td>
                    <td>Passoword ter-enskripsi</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'];?>">ubah</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun'];?>">hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else:?>
            <!--tampil data berdasarkan user login-->
            <?php foreach($data_bylogin as $akun): ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $akun['nama'];?></td>
                    <td><?= $akun['username'];?></td>
                    <td><?= $akun['email'];?></td>
                    <td>Passoword ter-enskripsi</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun'];?>">ubah</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif;?>
          </tbody>
      </table>
    </div>


<!--modalTambahb5-->
     <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama">nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

             <div class="mb-3">
                <label for="username">username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password">password</label>
                <input type="password" name="password" class="form-control" required minlength="6">
            </div>

            <div class="mb-3">
                <label for="level">level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="">--pilih level--</option>
                    <option value="1">admin</option>
                    <option value="2">operator barang</option>
                    <option value="3">operator mahasiswa</option>
                </select>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
        <button type="submit" name="tambah" class="btn btn-primary">tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach($data_akun as $akun):?>
     <div class="modal fade" id="modalUbah<?=$akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="id_akun" value="<?= $akun['id_akun'];?>">
            <div class="mb-3">
                <label for="nama">nama</label>
                <input type="text" name="nama" class="form-control" value="<?=$akun['nama'];?>" required>
            </div>

             <div class="mb-3">
                <label for="username">username</label>
                <input type="text" name="username" class="form-control" value="<?=$akun['username'];?>" required>
            </div>

            <div class="mb-3">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" value="<?=$akun['email'];?>" required>
            </div>

            <div class="mb-3">
                <label for="password">password <small>(masukan password baru/lama)</small></label>
                <input type="password" name="password" class="form-control" value="<?=$akun['password'];?>" required minlength="6">
            </div>

     <?php if ($_SESSION['level'] == 1):?>
             <div class="mb-3">
                <label for="level">level</label>
                <select name="level" id="level" class="form-control" required>
                   <?php $level = $akun['level'];?>
                    <option value="">pilih level</option>
                    <option value="1"<?= $level == '1' ? 'selected' : null ?>>admin</option>
                    <option value="2"<?= $level == '2' ? 'selected' : null ?>>operator barang</option>
                    <option value="3"<?= $level == '3' ? 'selected' : null ?>>operator mahasiswa</option>
                </select>
            </div>
            <?php else :?>
              <input type="hidden" name="level" value="<?= $akun['level'];?>">
     <?php endif; ?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>

<?php foreach($data_akun as $akun):?>
      <div class="modal fade" id="modalHapus<?=$akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">   
        <p>yakin nihh boy hapus akun : <?= $akun['nama'];?> .?</p>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
        <a href="hapus-akun.php?id_akun=<?=$akun['id_akun'];?>" class="btn btn-danger"> hapus</a>
    </div>
    </div>
  </div>
</div>
<?php endforeach;?>

           </di>
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
