<?php
  require_once('layout/head.php');
  require_once('layout/menu.php');
?> 


<div class="container">
  <div class="row">

    <?php           
    if ($logout_berhasil) 
      echo '<div class="alert alert-dismissible alert-success">'.'<center>'.'<strong>'.$logout_berhasil.'</strong>'.'</center>'.'</div>';
    if ($registrasi_berhasil)
      echo '<div class="alert alert-dismissible alert-success">'.'<center>'.'<strong>'.$registrasi_berhasil.'</strong>'.'</center>'.'</div>';
    if ($password_dan_ulangi_password_tidak_sama)
      echo '<div class="alert alert-dismissible alert-danger">'.'<center>'.'<strong>'.$password_dan_ulangi_password_tidak_sama.'</strong>'.'</center>'.'</div>';
    if ($email_sudah_ada)
      echo '<div class="alert alert-dismissible alert-warning">'.'<center>'.'<strong>'.$email_sudah_ada.'</strong>'.'</center>'.'</div>';
    if ($email_belum_terdaftar)
      echo '<div class="alert alert-dismissible alert-warning">'.'<center>'.'<strong>'.$email_belum_terdaftar.'</strong>'.'</center>'.'</div>';
    if ($email_password_salah)
      echo '<div class="alert alert-dismissible alert-danger">'.'<center>'.'<strong>'.$email_password_salah.'</strong>'.'</center>'.'</div>';
    if ($verifikasi_gagal)
      echo '<div class="alert alert-dismissible alert-danger">'.'<center>'.'<strong>'.$verifikasi_gagal.'</strong>'.'</center>'.'</div>';
    if ($captcha_tidak_sama)
      echo '<div class="alert alert-dismissible alert-danger">'.'<center>'.'<strong>'.$captcha_tidak_sama.'</strong>'.'</center>'.'</div>';
    ?>

    <div class="col-md-8">
      <h3><strong>Selamat Datang !</strong></h3> <p>di website penerimaan siswa baru MAU-MBI Amanatul Ummah Surabaya</p> <br>
        <ul class="nav nav-tabs">
  <li class="active"><a href="#prosedur" data-toggle="tab" aria-expanded="false" style="font-size: 11px">Prosedur Pendaftaran</a></li>
  <li><a href="#agenda" data-toggle="tab" aria-expanded="true" style="font-size: 11px">Agenda Kegiatan</a></li>
  <li><a href="#biaya" data-toggle="tab" aria-expanded="true" style="font-size: 11px">Biaya Pendaftaran</a></li>
  <li><a href="#alur" data-toggle="tab" aria-expanded="true" style="font-size: 11px">Alur Kegiatan</a></li>
  <li><a href="#pengumuman" data-toggle="tab" aria-expanded="true" style="font-size: 11px">Pengumuman</a></li>
 
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="prosedur">
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  <div class="tab-pane fade active in" id="agenda">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade" id="biaya">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="alur">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
  <div class="tab-pane fade" id="pengumuman">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
</div>

   </div>


    <div class="col-md-4">

    <div class="jumbotron">
     <h4><strong>Pendaftaran PSB 2017</strong></h4>
     
     <ul class="nav nav-tabs">
  <li class="active"><a href="#login" data-toggle="tab" aria-expanded="true">Login</a></li>
  <li class=""><a href="#register" data-toggle="tab" aria-expanded="false">Register</a></li>
</ul>


<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="login">
    <p style="font-size: 14px"><br>Masukkan Username dan Password untuk login. Silahkan register terlebih dahulu jika belum punya.</p>
    
<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>home/login">
  <fieldset>
    <legend>Login</legend>
    <div class="form-group">
      <label for="inputEmail" class="control-label">Email Siswa</label>
         <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="control-label">Password</label>
       <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button> <br><br>
         <a>Lupa Password ?</a>
      </div>
  </fieldset>
</form>

  </div>
  <div class="tab-pane fade" id="register">
    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>home/register">
    
    <p style="font-size: 14px; color:red"><br>Satu Email hanya diperbolehkan untuk satu kali pendaftaran</p>
  <fieldset>
    <legend>Register</legend>
    <div class="form-group">
      <label for="inputNama" class="control-label">Nama Siswa</label>
         <input type="text" class="form-control" name="inputNama" id="inputNama" placeholder="Nama Lengkap" required>
    </div>
    <div class="form-group">
      <label for="inputPanggilan" class="control-label">Panggilan</label>
         <input type="text" class="form-control" name="inputPanggilan" id="inputPanggilan" placeholder="Nama Panggilan" required>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="control-label">Email</label>
        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="control-label">Password</label>
        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="inputUlangiPassword" class="control-label">Confirm Password</label>
        <input type="password" class="form-control" name="inputUlangiPassword" id="inputUlangiPassword" placeholder="Password" required>
    </div>
    <div class="form-group">
         <label class="control-label">Captcha</label>
        <p><?php echo $image;?></p>
         <input type="text" class="form-control" name="inputCaptcha" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button> <br><br>
    </div>
  </fieldset>
</form>
  </div>
</div>
   </div>


        <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Jadwal Kegiatan PSB 2017</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>No</th>
      <th>Kegiatan</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Pendaftaran Gelombang 1</td>
      <td>01 Desember 2017 - 30 Maret 2017</td>
    </tr>
    </tbody>
    </table>
  </div>
</div>

  <div class="well">
    <p style="font-size: 14px"><strong>Pendaftaran dikenakan biaya sebesar Rp. 300.000,-</strong></p>
    <p style="font-size: 14px"><a href="http://www.psb.mau-mbi-ausby.sch.id/manual">Panduan Pendaftaran</a> dapat dilihat di alamat <a href="http://www.psb.mau-mbi-ausby.sch.id/manual">http://psb.mau-mbi-ausby.sch.id/manual.</a></p>
  </div>

  <div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Call Center PSB</h3>
  </div>
  <div class="panel-body">
    Call Center PSB <br>
    <strong>0811-1111-1111</strong> <br>
    Jalan Siwalankerto Utara 56, Wonocolo, Surabaya <br>
    Melayani setiap hari pukul 08.00 - 20.00 WIB
  </div>
</div>

    </div>

  </div>

 </div> 

<?php
  require_once('layout/script.php');
  require_once('layout/footer.php');
?> 