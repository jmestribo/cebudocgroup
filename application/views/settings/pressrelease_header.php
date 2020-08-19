<!DOCTYPE html>
<html >
<head>
  <!--WEB DEVELOPER: JORGE III ARRIOLA-->
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/modern-logo-cdg-318x141.png" type="image/x-icon">
  <?php foreach($result as $row): ?>
  <meta name="keywords" content="<?=$row->keywords?>">
  <meta name="description" content="<?=$description;?>">
  
  <title><?=$row->title?> | <?=$title;?></title>
  <?php endforeach; ?>
  <!--meta fb-->
  <meta property="og:locale" content="en_US" />
  <meta property="og:url" content="https://cebudocgroup.com/media/press_releases" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="OrmocDoc gives back at 6th" />
  <meta property="og:description" content="Celebrating its 6th Founding Anniversary" />
  <meta property="og:image" content="https://cebudocgroup.com/assets/images/ormocdoc-header-pr-2220x1110.jpg" />
  
  
  
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/tether/tether.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dropdown/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/socicon/css/styles.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/theme/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/gallery/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/pace/css/flash.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/style.css">



  
<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129266023-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129266023-1');
</script>


  <!--loader-->
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script-->

  <!-- OLD LOADING SCRIPT-->
  <!--script>setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 1000);</script-->

<!--style type="text/css">
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('assets/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style-->
<!--loader-->

<!--SUBSCRIBE-->
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us20.list-manage.com","uuid":"9aa2e979eaec464bdec391d93","lid":"d869bcc9af","uniqueMethods":true}) })</script>
<!--END SUBSCRIBE-->
</head>
<body>

<!--FACEBOOK-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--END FACEBOOK-->

  <!--<div class="loader"></div>-->


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
