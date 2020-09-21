<?php 
error_reporting(0);
include "config/koneksi.php";

if(isset($_POST['simpan'])){
  $sql = "INSERT INTO tb_obat VALUES ('$_POST[id_obat]', '$_POST[nama_obat]', '$_POST[harga_obat]', '$_POST[jumlah]');";
  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=obat'</script>";
  }
if(isset($_GET['hapus'])){
  $sql = mysqli_query($con, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'");
}
 ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="harga_obat" class="form-control" placeholder="Harga Obat">
                    </div>
                    <div class="col">
                    <input type="number" name="jumlah" class="form-control" placeholder="Stok Obat">
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
                      <th>ID Obat</th>
                      <th>Nama Obat</th>
                      <th>Harga Obat</th>
                      <th>Stok Obat</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql = mysqli_query($con, "SELECT * FROM tb_obat");
                      while($r=mysqli_fetch_array($sql)){
                     ?>
                     <tr>
                       <td><?php echo $r['id_obat'] ?></td>
                       <td><?php echo $r['nama_obat'] ?></td>
                       <td><?php echo $r['harga_obat'] ?></td>
                       <td><?php echo $r['jumlah'] ?></td>
                       <td><a class="btn btn-danger" href="?menu=obat&hapus&id=<?php echo $r['id_obat'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                     </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
