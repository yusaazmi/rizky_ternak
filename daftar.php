<?php include 'header.php';?>
<div class="container p-3">
<h2>Daftar</h2>
<form action="simpan_daftar.php" method="POST">
  <div class="form-group col-4">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group col-4">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group col-4">
    <label for="nama">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="form-group col-4">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat">
  </div>
  <div class="form-group col-4">
    <label for="kodepos">Kodepos</label>
    <input type="text" class="form-control" id="kodepos" name="kodepos">
  </div>
  <div class="form-group col-4">
    <label for="no_hp">Nomer HP</label>
    <input type="text" class="form-control" id="no_hp" name="no_hp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include 'footer.php';?>        