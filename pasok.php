<?php  
error_reporting(0);
include "config/koneksi.php";

if(isset($_POST['simpan'])){
    $sql = "INSERT INTO tb_pasok VALUES ('$_POST[id_pembelian]', '$_POST[nama_obat]', '$_POST[jumlah]', '$_POST[nama_distributor]');";
    $eksekusi = mysqli_query($con, $sql);
    echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=pasok'</script>";
  }
if(isset($_GET['hapus'])){
  $sql = mysqli_query($con, "DELETE FROM tb_pasok WHERE id_pembelian = '$_GET[id]'");
}
 ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasok</h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <select name="nama_obat">
                      <option value="" selected="selected">Nama Obat</option>
                      <?php 
                      $query = "SELECT * FROM tb_obat";
                      $hasil = mysqli_query($con, $query);
                      $no=0;
                      while ($data=mysqli_fetch_array($hasil)){
                        $no++;
                      ?>
                        <option value="<?php echo $data['nama_obat'];?>"><?php echo $data['nama_obat'];?></option>
                        <?php 
                          }
                         ?>
                    </select>
                    <div class="col">
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Pembelian"> 
                    </div>                   
                    <select name="nama_distributor">
                      <option value="" selected="selected">Nama Distributor</option>
                      <?php 
                      $query = "SELECT * FROM tb_distributor";
                      $hasil = mysqli_query($con, $query);
                      $no=0;
                      while ($data=mysqli_fetch_array($hasil)){
                        $no++;
                      ?>
                        <option value="<?php echo $data['nama_distributor'];?>"><?php echo $data['nama_distributor'];?></option>
                        <?php 
                          }
                         ?>
                    </select>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Pembelian</th>
                      <th>Nama Obat</th>
                      <th>Jumlah Pembelian</th>
                      <th>Nama Distributor</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   
                      $sql = mysqli_query($con,"SELECT * FROM tb_pasok");
                      while($r=mysqli_fetch_array($sql)){
                     ?>
                     <tr> 
                        <td><?php echo $r['id_pembelian'] ?></td>
                        <td><?php echo $r['nama_obat'] ?></td>
                        <td><?php echo $r['jumlah'] ?></td>
                        <td><?php echo $r['nama_distributor'] ?></td>
                         <td><a class="btn btn-danger" href="?menu=pasok&hapus&id=<?php echo $r['id_pembelian'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                     </tr>
                        <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    
