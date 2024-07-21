<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query= mysqli_query ($conn,"SELECT tb_booking.*,nama, SUM(harga*jumlah) AS harganya FROM tb_booking
LEFT JOIN tb_user ON tb_user.id = tb_booking.pelayan
LEFT JOIN tb_list_booking ON tb_list_booking.booking = tb_booking.id_booking
LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_booking.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_booking.id_booking
GROUP BY id_booking");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record ;
}
?>
<div class="col-lg-9 mt-2">
<div class="card">
  <div class="card-header">
    Halaman Booking
  </div>
  <div class="card-body">
    <div class ="row">
    <div class="col d-flex justify-content-end">
    <button class="btn btn-primary"data-bs-toggle="modal" data-bs-target=#ModalTambahUser> Tambah Booking</button>
</div>
</div>
<!-- Modal Tambah Booking Baru -->
<div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fullsc">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Booking Kamar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
<form class="needs-validaton" novalidate action="proses/proses_input_booking.php" method="POST">
    <div class="row">
      <div class="col-lg-3">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="uploadfoto"  name="kode_booking" value="<?php  echo date('ymdHi').rand(100,999)?>" readonly>
  <label for="uploadfoto">Kode Booking</label>
  <div class="invalid-feedback">
        Masukkan Kode Booking
      </div>
</div>
</div>
<div class="col-lg-3">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="tipe_kamar" placeholder="tipe_kamar" name="tipe_kamar"required>
  <label for="floatingInput">Tipe kamar</label>
  <div class="invalid-feedback">
        Masukkan Tipe Kamar
      </div>
</div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="pengunjung" placeholder="nama_pengunjung" name="pengunjung"required>
  <label for="floatingInput">Nama Pengunjung</label>
  <div class="invalid-feedback">
        Masukkan Nama Anda
      </div>
</div>
</div>
</div>
<div class="row">
      <div class="col-lg-12">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="catatan" placeholder="catatan"   name="catatan">
  <label for="floatingPassword">Catatan</label>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="input_booking_validate" value="12345">Buat Booking</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah Booking Baru -->
<?php
        if (empty($result)) {
            echo " Data menu tidak ada";
        } else {
            foreach ($result as $row) {
        ?>

<!-- Modal Edit -->
<div class="col-lg-9 mt-1">
<div class="modal fade" id="Modaledit<?php echo $row['id_booking']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-fullsc">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
<form class="needs-validaton" novalidate action="proses/proses_edit_booking.php" method="POST">
    <div class="row">
      <div class="col-lg-3">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="uploadfoto"  name="kode_booking" value="<?php echo $row['id_booking']?>"readonly>
  <label for="uploadfoto">Kode Booking</label>
  <div class="invalid-feedback">
        Masukkan Kode Booking
      </div>
</div>
</div>
<div class="col-lg-3">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="tipe_kamar" placeholder="tipe_kamar" name="tipe_kamar"required value="<?php echo $row['tipe_kamar'] ?>">
  <label for="floatingInput">Tipe kamar</label>
  <div class="invalid-feedback">
        Masukkan Tipe Kamar
      </div>
</div>
</div>
<div class="col-lg-6">
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="pengunjung" placeholder="nama_pengunjung" name="pengunjung"required value="<?php echo $row['pengunjung'] ?>">
  <label for="floatingInput">Nama Pengunjung</label>
  <div class="invalid-feedback">
        Masukkan Nama Anda
      </div>
</div>
</div>
</div>
<div class="row">
      <div class="col-lg-12">
      <div class="form-floating mb-3">
  <input type="text" class="form-control" id="catatan" placeholder="catatan"   name="catatan" value="<?php echo $row['catatan'] ?>">
  <label for="floatingPassword">Catatan</label>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit_booking_valid" value="12345">Save Change</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Edit -->

<!-- Modal Delete -->
<div class="modal fade" id="ModalDelete<?php echo $row['id_booking']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="needs-validaton" novalidate action="proses/proses.delete.booking.php" method="POST">
        <input type="hidden" value="<?php echo $row['id_booking'] ?>" name="kode_booking">
        <div class="col-lg-12">
          Apakah anda ingin menghapus booking atas nama <b><?php echo $row['pengunjung']?></b> dengan kode booking <b><?php echo $row['id_booking']?></b>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete_booking_validate" value="12345"> Delete</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!--Akhir Modal Delete-->
<?php
            }
            ?>
<div class="tabel-responsive">

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Booking</th>
      <th scope="col">Pengunjung</th>
      <th scope="col">Tipe kamar</th>
      <th scope="col">Total harga</th>
      <th scope="col">Pelayan</th>
      <th scope="col">Waktu Booking</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($result as $row){
    ?>
    <tr>
      <th scope="row"><?php echo $no++ ?></th>
      <td><?php echo $row['id_booking'] ?></td>
      <td><?php echo $row['pengunjung'] ?></td>
      <td><?php echo $row['tipe_kamar'] ?></td>
      <td> <?php echo number_format($row['harganya'], 0, ' ,', '.')?></td>
      <td><?php echo $row['nama'] ?></td>
      <td><?php echo $row['timestamp'] ?></td>
      <td><?php echo $row['Status'] ?></td>
      <td class="d-flex">
        <a class ="btn btn-primary btn-sm me-1" href="./?x=bookingitem&booking=<?php echo $row['id_booking']."&pengunjung=".$row['pengunjung']."&tipe_kamar=".$row['tipe_kamar'] ?>"><i class="bi bi-eye-fill"></i></a>
        <button class ="btn btn-warning btn-sm me-1"data-bs-toggle="modal" data-bs-target="#Modaledit<?php echo $row['id_booking']?>"><i class="bi bi-pencil-square"></i></button>
        <button class ="btn btn-danger btn-sm me-1"data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_booking']?>"><i class="bi bi-trash3"></i></button>
      </td>
      </div>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</div>
<?php
            }
?>
  </div>
</div>
</div>


