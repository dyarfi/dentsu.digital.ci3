<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?=$this->config->item('developer_name');?> | Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<?php if (!empty($css_files)) { foreach ($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; }?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=base_url()?>assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=base_url()?>assets/admin/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!--<link rel="shortcut icon" href="favicon.ico"/>-->
<script>base_URL = '<?=base_url()?>';</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="<?php echo base_url();?>">
	<img src="<?=base_url()?>assets/admin/img/dentsu.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <div class="messageFlash">
	<?php $this->load->view('flashdata'); ?>
    </div>
    <?php $this->load->view($main); ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="logo">
    <div class="copyright">
	<?php $this->load->view('template/admin/footer'); ?>
    </div>
</div>	
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]><script src="<?=base_url()?>assets/admin/plugins/respond.min.js"></script><script src="<?=base_url()?>assets/admin/plugins/excanvas.min.js"></script><![endif]-->
<script src="<?=base_url()?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<?php if (!empty($js_files)) { foreach ($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; } ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=base_url()?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url()?>assets/admin/scripts/core/app.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
jQuery(document).ready(function() {     
	App.init();
<?php echo ($js_inline) ? "\t".$js_inline."\n" : "";?>
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>