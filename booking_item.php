<?php
include "proses/connect.php";
$query= mysqli_query ($conn,"SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_booking
LEFT JOIN tb_booking ON tb_booking.id_booking = tb_list_booking.booking
LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_booking.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_booking.id_booking
GROUP BY id_list_booking
HAVING tb_list_booking.booking = $_GET[booking]");

$kode = $_GET['booking'];
$tipe_kamar = $_GET['tipe_kamar'];
$pengunjung = $_GET['pengunjung'];

while ($record = mysqli_fetch_array($query)) {
  $result[] = $record ;
  //$kode = $record['id_booking'];
 // $Tipe_kamar = $record['Tipe_kamar'];
 // $pengunjung = $record['Pengunjung'];
}
$select_menu = mysqli_query($conn, "SELECT id,Tipe_kamar FROM tb_daftar_menu");
?>
<div class="col-lg-9 mt-2">
<div class="card">
  <div class="card-header">
    Halaman Booking Item
  </div>
  
  <div class="card-body">
    <a href="booking" class="btn btn-primary mb-3"><i class="bi bi-skip-backward-circle-fill"></i> Back</a>
    <div class ="row"> 
    <div class="col-lg-3">
      <div class="form-floating mb-3">
  <input disabled type="text" class="form-control" id="kodebooking" value ="<?php echo $kode;?>">
  <label for="uploadfoto">Kode Booking</label>
</div>
</div>
<div class="col-lg-3">
<div class="form-floating mb-3">
  <input disabled type="text" class="form-control" id="tipe_kamar"value ="<?php echo $tipe_kamar;?>">
  <label for="uploadfoto">Tipe Kamar</label>
</div>
</div>
<div class="col-lg-3">
<div class="form-floating mb-3">
  <input disabled type="text" class="form-control" id="Pengunjung"value ="<?php echo $pengunjung;?>">
  <label for="uploadfoto">Pengunjung</label>
</div>
</div>
</div>

<!-- Modal Tambah User Baru -->
<div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
<form class="needs-validaton" novalidate action="proses/proses_tambah_menu_booking.php" method="POST">
  <input type="hidden" name="kode_booking" value="<?php echo $kode ?>">
  <input type="hidden" name="tipe_kamar"  value="<?php echo $tipe_kamar ?>">
  <input type="hidden" name="pengunjung" value="<?php echo $pengunjung ?>">
    <div class="row">
      <div class="col-lg-8">
      <div class="form-floating" mb-3">
      <select class="form-select" name="menu" id="">
                                                    <option selected hidden value="">Pilih Menu</option>
                                                    <?php
                                                    foreach ($select_menu as $value) {
                                                        if ($row['menu'] == $value['id']) {
                                                            echo "<option selected value=$value[id]>$value[menu]</option>";
                                                        } else {
                                                            echo "<option value=$value[id]>$value[menu]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
  <label for="menu">Menu </label>
  <div class="invalid-feedback">
        Pilih Menu Kamar
      </div>
</div>
</div>
<div class="col-lg-4">
<div class="form-floating mb-3">
  <input type="number" class="form-control" id="floatingInput" placeholder="jumlah_kamar" name="jumlah"required>
  <label for="floatingInput">Jumlah Kamar</label>
  <div class="invalid-feedback">
        Masukkan Jumlah Kamar
      </div>
</div>
</div>
</div>
<div class="row">
      <div class="col-lg-12">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="catatan"   name="catatan">
  <label for="floatingPassword">Catatan</label>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="input_bookingitem_validate" value="12345">Save changes</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah User Baru -->
<?php
        if (empty($result)) {
            echo "Data menu tidak ada";
        } else {
            foreach ($result as $row) {
        ?>

<?php
            }
            ?>
<!-- Modal pembayaran -->
<div class="modal fade" id="Modalbayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
<div class="tabel-responsive">

<table class="table table-hover">
<thead>
  <tr>
    <th scope="col">Tipe Kamar</th>
    <th scope="col">Harga</th>
    <th scope="col">Qty</th>
    <th scope="col">Total</th>
    <th scope="col">Aksi</th>
  </tr>
</thead>
<tbody>
  <?php
  $total = 0;
  foreach ($result as $row){
  ?>
  <tr>
    <td><?php echo $row['tipe_kamar'] ?></td>
    <td><?php echo number_format($row['Harga'], 0, ' ,', '.')?></td>
    <td><?php echo $row['jumlah'] ?></td>
    <td> <?php echo number_format($row['harganya'], 0, ' ,', '.')?></td>
  </tr>
  <?php
  $total +=$row['harganya'];
  }
  ?>
  <tr>
    <td colspan ="3" class="fw-bold">
        Total Harga
</td>
<td class="fw-bold">
    <?php echo number_format($total, 0, ' ,', '.')?>
</td>
</tr>
</tbody>
</table>
</div>
<span class="text-danger fs-5 fw-semibold">Apakan Anda Yakin Ingin Melakukan Pembayaran</span>
<form class="needs-validaton" novalidate action="proses/proses_bayar.php" method="POST">
  <input type="hidden" name="kode_booking" value="<?php echo $kode ?>">
  <input type="hidden" name="tipe_kamar"  value="<?php echo $tipe_kamar ?>">
  <input type="hidden" name="pengunjung" value="<?php echo $pengunjung ?>">
  <input type="hidden" name="total" value="<?php echo $total ?>">
    <div class="row">
<div class="col-lg-12">
<div class="form-floating mb-3">
  <input type="number" class="form-control" id="floatingInput" placeholder="jumlah_uang" name="uang"required>
  <label for="floatingInput">Jumlah uang</label>
  <div class="invalid-feedback">
        Masukkan Jumlah Uang
      </div>
</div>
</div>
</div>

<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal pembayaran-->
            
<div class="tabel-responsive">

<table class="table table-hover">
<thead>
  <tr class ="text-nowrap">
    <th scope="col">Tipe Kamar</th>
    <th scope="col">Harga</th>
    <th scope="col">Qty</th>
    <th scope="col">Total</th>
    <th scope="col">Aksi</th>
  </tr>
</thead>
<tbody>
  <?php
  $total = 0;
  foreach ($result as $row){
  ?>
  <tr>
    <td><?php echo $row['tipe_kamar'] ?></td>
    <td><?php echo number_format($row['Harga'], 0, ' ,', '.')?></td>
    <td><?php $total == $row['harganya']?></td>
  <tr>
    <td colspan="5" class="fw-bold">
      Total Harga
    <td> <?php echo number_format($row['harganya'], 0, ' ,', '.')?></td>
    <td class="d-flex">
        <button class ="btn btn-primary btn-sm me-1"data-bs-toggle="modal" data-bs-target="#Modalview<?php echo $row['id_booking']?>"><i class="bi bi-eye-fill"></i></button>
        <button class ="btn btn-warning btn-sm me-1"data-bs-toggle="modal" data-bs-target="#Modaledit<?php echo $row['id_booking']?>"><i class="bi bi-pencil-square"></i></button>
        <button class ="btn btn-danger btn-sm me-1"data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_booking']?>"><i class="bi bi-trash3"></i></button>
      </td>
  </tr>
  <?php
  $total +=$row['harganya'];
  }
  ?>
  <tr>
    <td colspan ="3" class="fw-bold">
        Total Harga
</td>
<td class="fw-bold">
    <?php echo number_format($total, 0, ' ,', '.')?>
</td>
</tr>
</tbody>
</table>
</div>
<?php
}
?>
<div>
<button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#tambahitem"><i class="bi bi-plus-lg"></i> Item</button>
            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-coin"></i> Bayar</button>
        </div>
</div>
  </div>
</div>
</div>



