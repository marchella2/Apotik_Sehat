<?php 
include "config/koneksi.php";
error_reporting(0);
if(isset($_POST['simpan'])){
  $sql = "INSERT INTO tb_petugas VALUES ('$_POST[id_petugas]', '$_POST[nama_petugas]', '$_POST[jk]', '$_POST[alamat]', '$_POST[username]', '$_POST[password]');";
  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=petugas'</script>";
  }
if(isset($_GET['edit'])){
  $sql = mysqli_query($con, "SELECT * FROM tb_petugas WHERE id_petugas='$_GET[id]'");
  $isi = mysqli_fetch_array($sql);
}
if(isset($_GET['hapus'])){
  $sql = mysqli_query($con, "DELETE FROM tb_petugas WHERE id_petugas = '$_GET[id]'");
}
if(isset($_POST['update'])){
  $hhhh = mysqli_query($con, "UPDATE tb_petugas SET id_petugas = '$_POST[id_petugas]', nama_petugas = '$_POST[nama_petugas]', jk = '$_POST[jk]', alamat = '$_POST[alamat]', username = '$_POST[username]', password = '$_POST[password]' WHERE id_petugas = '$_GET[id]'");
  if($hhhh){
    echo "<script>alert('Data berhasil diubah');document.location.href='?menu=petugas';</script>";
  }else{
    echo "<script>alert('Data gagal diubah');document.location.href='?menu=petugas';</script>";
  }
}
 ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="id_petugas" class="form-control" value="<?php echo $isi['id_petugas'] ?>" placeholder="ID Petugas">
                    </div>
                    <div class="col">
                    <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" value="<?php echo $isi['nama_petugas'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input class="form-control" type="text" name="jk" placeholder="Jenis Kelamin" value="<?php echo $isi['jk'] ?>">
                    </div>
                    <div class="col">
                    <input class="form-control" name="alamat" placeholder="Alamat" value="<?php echo$isi['alamat'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $isi['username'] ?>">
                </div>
                <div class="col">
                  <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $isi['password'] ?>">
                </div>
              </div>
            </div>
            <?php if(isset($_GET['edit'])){ ?>
                <td><input type="submit" class="btn btn-warning" name="update" value="UPDATE"></td>
            <?php }else{ ?>
                <td><input type="submit" class="btn btn-warning" name="simpan" value="Simpan"></td>
            <?php } ?>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Petugas</th>
                      <th>Nama Petugas</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con, "SELECT * FROM tb_petugas");
                      while($r=mysqli_fetch_array($sql)){
                     ?>
                     <tr>
                       <td><?php echo $r['id_petugas'] ?></td>
                       <td><?php echo $r['nama_petugas'] ?></td>
                       <td><?php echo $r['jk'] ?></td>
                       <td><?php echo $r['alamat'] ?></td>
                       <td><?php echo $r['username'] ?></td>
                       <td><?php echo $r['password'] ?></td>
                       <td><a class="btn btn-primary" href="?menu=petugas&edit&id=<?php echo $r['id_petugas'] ?>">Edit</a></td>
                       <td><a class="btn btn-danger" href="?menu  =petugas&hapus&id=<?php echo $r['id_petugas'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                     </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
