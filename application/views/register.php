<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Info Kajian Islami | Registration Page</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/fadli.ico') ?>"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js'); ?> IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js'); ?> doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'); ?>"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); ?>"></script>
  <![endif]-->

  <!-- Google Font -->
 <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head> -->
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Info Kajian Islami  </a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Sebagai Takmir/Pengurus Masjid</p>

    <form action="" method="post" id="form-data" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" name="nama_takmir" class="form-control" placeholder="Nama Lengkap" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pwd" class="form-control" placeholder="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" required="">
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required="">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label class="form-control-label">Masjid</label>
          <select id="id_masjid" name="id_masjid" class="form-control">
          <option value=""> -- Pilih Masjid -- </option>
          <?php $no = 0; foreach ($takmir_masjid as $row): ?>
              <option value="<?php echo $row->id_masjid; ?>"><?php echo $row->nama_masjid; ?></option>               
          <?php endforeach; ?>
          </select>
      </div>
      <div class="form-group has-feedback">
        <h3><font color="red"><strong> <i>Notice:</i></strong></font></h3>
        <p>Jika nama masjid belum tersedia, silahkan tambahkan melalui link di bawah ini!</p>
      </div>
      <div class="form-group has-feedback">
        <a href="<?php echo site_url('masjid/insert'); ?>" class="text-center"><font color="blue"><ins>Daftarkan Masjid</ins></font></a>
      </div>
      
      <div class="row">
        <!-- /.col -->

        <div class="col-xs-4">
          <button type="submit" name="submit" value="true" class="btn btn-success">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>

</body>
</html>
