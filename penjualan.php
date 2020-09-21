<?php
include "config/koneksi.php";
$kueri= "SELECT max(id_penjualan) as maxKode FROM tb_penjualan";
$result = mysqli_query($con,$kueri);
$datas = mysqli_fetch_array($result);
$kodePembelian = $datas['maxKode'];

$noUrut = (int)substr($kodePembelian, 3, 3);
$noUrut++;

$char = "PJ";
$newID = $char. sprintf("%03s", $noUrut);
if(isset($_POST['simpan'])){
    $sql = "INSERT INTO tb_penjualan VALUES ('$_POST[id_penjualan]', '$_POST[id_obat]', '$_POST[nama_obat]', '$_POST[jumlah]', '$_POST[nama_pelanggan]', '$_POST[nama_petugas]');";
    $eksekusi = mysqli_query($con, $sql);
    echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=penjualan'</script>";
    }
if(isset($_GET['hapus'])){
    $sql = mysqli_query($con, "DELETE FROM tb_penjualan WHERE id_penjualan = '$_GET[id]'");
}
?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
            <form method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                    <input type="text" name="id_penjualan" class="form-control" value="<?php echo $newID?>" placeholder="ID Penjualan">
                    </div>
                    <select name="id_obat">
                      <option value="" selected="selected">ID Obat</option>
                      <?php 
                      $query = "SELECT * FROM tb_obat";
                      $hasil = mysqli_query($con, $query);
                      $no=0;
                      while ($data=mysqli_fetch_array($hasil)){
                        $no++;
                      ?>
                        <option value="<?php echo $data['id_obat'];?>"><?php echo $data['id_obat'];?></option>
                        <?php 
                          }
                         ?>
                    </select>
                    <select style="margin-left: 20px" name="nama_obat">
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
                    <div class="col">
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan">
                    </div>   
                    <select name="nama_petugas">
                      <option value="" selected="selected">Nama Petugas</option>
                      <?php 
                      $query = "SELECT * FROM tb_petugas";
                      $hasil = mysqli_query($con, $query);
                      $no=0;
                      while ($data=mysqli_fetch_array($hasil)){
                        $no++;
                      ?>
                        <option value="<?php echo $data['nama_petugas'];?>"><?php echo $data['nama_petugas'];?></option>
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
                      <th>ID Obat</th>
                      <th>Nama Obat</th>
                      <th>Jumlah Penjualan</th>
                      <th>Nama Pelanggan</th>
                      <th>Nama Petugas</th>
                      <th colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   
                      $sql = mysqli_query($con,"SELECT * FROM tb_penjualan");
                      while($r=mysqli_fetch_array($sql)){
                     ?>
                     <tr> 
                        <td><?php echo $r['id_penjualan'] ?></td>
                        <td><?php echo $r['id_obat'] ?></td>
                        <td><?php echo $r['nama_obat'] ?></td>
                        <td><?php echo $r['jumlah'] ?></td>
                        <td><?php echo $r['nama_pelanggan'] ?></td>
                        <td><?php echo $r['nama_petugas'] ?></td>
                         <td><a class="btn btn-danger" href="?menu=penjualan&hapus&id=<?php echo $r['id_penjualan'] ?>" onClick="return confirm('Anda Yakin?')">Hapus</a></td>
                     </tr>
                        <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
