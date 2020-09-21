<?php 
error_reporting(0);
include "config/koneksi.php";

if(isset($_POST['simpan'])){
  $sql = "INSERT INTO tb_distributor VALUES ('$_POST[id_distributor]', '$_POST[nama_distributor]', '$_POST[nama_perusahaan]');";
  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=distributor'</script>";
  }
  if(isset($_GET['hapus'])){
    $sql = mysqli_query($con, "DELETE FROM tb_distributor WHERE id_distributor = '$_GET[id]'");
  }
 ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Distributor</h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="nama_distributor" class="form-control" placeholder="Nama Distributor">
                    </div>
                    <div class="col">
                    <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                    </div>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Distributor</th>
                      <th>Nama Distributor</th>
                      <th>Nama Perusahaan</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con, "SELECT * FROM tb_distributor");
                      while($r=mysqli_fetch_array($sql)){
                     ?>
                     <tr>
                       <td><?php echo $r['id_distributor'] ?></td>
                       <td><?php echo $r['nama_distributor'] ?></td>
                       <td><?php echo $r['nama_perusahaan'] ?></td>
                       <td><a class="btn btn-danger" href="?menu=distributor&hapus&id=<?php echo $r['id_distributor'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                     </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

