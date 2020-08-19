<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets_healthful/images/hfasset-6-574x170.png" type="image/x-icon">
  <?php foreach($result as $row): ?>
  <meta name="keywords" content="<?=$row->keywords?>">
  <meta name="description" content="<?=$description;?>">
  <title><?=$row->title;?> | <?=$title?></title>
  <?php endforeach; ?>
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/tether/tether.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/socicon/css/styles.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/animatecss/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/dropdown/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/theme/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/gallery/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_healthful/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/all.css">
  
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129266023-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129266023-1');
</script>

</head>
<body>

  <!-- Page Loader -->
    <!--div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <div class="font-loader">Please wait...</div>
        </div>
    </div-->
    <!-- #END# Page Loader -->

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


