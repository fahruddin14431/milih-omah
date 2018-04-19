<!DOCTYPE html>
<html lang="en" ng-app="materialism">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Milih Omah</title>

  <link href="<?= base_url() ?>assets/css/materialism.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/helpers.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/ripples.css" rel="stylesheet" />

</head>
<body class="page-login theme-template-dark theme-blue alert-open alert-with-mat-grow-top-right overflow-no" init-ripples style="background:url('assets/img/sutojayan.png')no-repeat center ; background-size:cover;">
  <div class="center">
    <div class="card bordered z-depth-2"  style="margin:0% auto; max-width:400px;">
      <div class="card-header">
        <div class="brand-logo">
          <div id="logo">
            <div class="foot1"></div>
            <div class="foot2"></div>
            <div class="foot3"></div>
            <div class="foot4"></div>
          </div>
          ILIH OMAH
        </div>
      </div>
      <div class="card-content">
        <?php if(!empty($this->session->flashdata('error_login'))): ?>
            <div class="alert alert-dismissible alert-danger">
              <p><?= $this->session->flashdata('error_login'); ?></p>
            </div>
        <?php endif; ?>
        <form class="form-floating" action="<?= site_url() ?>auth/login" method="POST">
          <div class="form-group">
            <label class="control-label">Pengguna</label>
            <input type="text" name="pengguna" class="form-control" required autocomplate="off">
          </div>
          <div class="form-group">
            <label class="control-label">Kata Sandi</label>
            <input type="password" name="kata_sandi" class="form-control" required autocomplate="off">
          </div>
          <div class="card-action clearfix">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>          
        </form>
      </div>
    </div>
  </div>

  <script charset="utf-8" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script charset="utf-8" src="<?= base_url() ?>/assets/js/login.js"></script>

</body>
</html>
