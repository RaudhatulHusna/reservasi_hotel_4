<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
<div class="container-lg">
    <a class="navbar-brand" href=""><i class="bi bi-buildings"></i> La Luna  Hotel</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
<ul class="navbar-nav">
        <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <?php
    echo $hasil['username'];
    ?>
</a>
<ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Modalubahprofil"><i class="bi bi-person-circle"></i> Profile</a></li>
            <li><a class="dropdown-item" href="#"data-bs-toggle="modal" data-bs-target="#Modalubahpassword"><i class="bi bi-key-fill"></i> Ubah Password</a></li>
            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
</ul>
        </li>
    </ul>
    </div>
</div>
</nav>

<!-- Modal Edit-->
<div class="modal fade" id="Modalubahpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pssword</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="needs-validaton" novalidate action="proses/proses_ubah_password.php" method="POST">
    <div class="row">
<div class="col-lg-12">
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username"required value="<?php echo $_SESSION['username_hotel']?>">
  <label for="floatingInput">Username</label>
  <div class="invalid-feedback">
        Masukkan Username anda
      </div>
</div>
</div>
</div>
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingpassword" name="passwordlama" required>
  <label for="floatingInput">Password Lama</label>
  <div class="invalid-feedback">
        Masukkan Password Lama
      </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingInput"  name="passwordbaru"required>
  <label for="floatingInput">Password Baru</label>
  <div class="invalid-feedback">
        Masukkan Password Baru
      </div>
</div>
</div>
</div>
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingpassword" name="repasswordbaru" required>
  <label for="floatingInput">Ulangi Password Baru</label>
  <div class="invalid-feedback">
        Masukkan Ulangi Password Baru
      </div>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save changes</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Edit-->

<!-- Modal Edit-->
<div class="modal fade" id="#Modalubahprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Pssword</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="needs-validaton" novalidate action="proses/proses_ubah_password.php" method="POST">
    <div class="row">
<div class="col-lg-12">
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username"required value="<?php echo $_SESSION['username_hotel']?>">
  <label for="floatingInput">Username</label>
  <div class="invalid-feedback">
        Masukkan Username anda
      </div>
</div>
</div>
</div>
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingpassword" name="passwordlama" required>
  <label for="floatingInput">Password Lama</label>
  <div class="invalid-feedback">
        Masukkan Password Lama
      </div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingInput"  name="passwordbaru"required>
  <label for="floatingInput">Password Baru</label>
  <div class="invalid-feedback">
        Masukkan Password Baru
      </div>
</div>
</div>
</div>
<div class = "col-lg-6">
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingpassword" name="repasswordbaru" required>
  <label for="floatingInput">Ulangi Password Baru</label>
  <div class="invalid-feedback">
        Masukkan Ulangi Password Baru
      </div>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save changes</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Modal Edit-->


