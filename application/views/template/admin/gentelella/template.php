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
<title><?php echo ($page_title) ? $page_title .' - ' : '';?><?php echo $this->config->item('developer_name');?> | Admin Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- Bootstrap -->
<link href="<?php echo base_url('assets/admin/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url('assets/admin/gentelella/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
<!-- iCheck -->
<link href="<?php echo base_url('assets/admin/gentelella/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="<?php echo base_url('assets/admin/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet">
<!-- jVectorMap -->
<link href="<?php echo base_url('assets/admin/gentelella/css/maps/jquery-jvectormap-2.0.3.css');?>" rel="stylesheet"/>
<!-- Custom Theme Style -->
<link href="<?php echo base_url('assets/admin/gentelella/build/css/custom.min.css');?>" rel="stylesheet">
<?php if (!empty($css_files)) { foreach ($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; }?>
<link rel="shortcut icon" href="favicon.ico"/>
<script>base_URL = '<?php echo base_url();?>';</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
	<!-- BEGIN LOGO -->
	<a class="navbar-brand" href="<?php echo base_url();?>" target="_blank"><img src="<?php echo base_url();?>assets/admin/gentelella/img/logo_small.png" alt="logo" class="img-responsive col-md-7 col-lg-7"/></a>
	<!-- END LOGO -->
	<!-- BEGIN RESPONSIVE MENU TOGGLER -->
	<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><img src="<?php echo base_url();?>assets/admin/gentelella/img/menu-toggler.png" alt=""/></a>
	<!-- END RESPONSIVE MENU TOGGLER -->		
	<!-- BEGIN TOP NAVIGATION MENU -->
	<ul class="nav navbar-nav pull-right">
	    <!-- BEGIN NOTIFICATION DROPDOWN -->
	    <!-- END NOTIFICATION DROPDOWN -->
	    <!-- BEGIN USER LOGIN DROPDOWN -->
	    <li class="dropdown user">
		<a href="<?php echo base_url(ADMIN);?>/user/view/<?php echo $this->acl->user()->id;?>" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		    <img alt="" src="<?php echo base_url();?>assets/admin/gentelella/img/avatar1_small.jpg"/>&nbsp;
			<!--img height="28px" src="<?php //echo base_url('assets/public/img/'.$this->setting['site_logo']->value);?>"/>&nbsp;-->
		    <span class="username"><?php echo $this->acl->user()->name;?></span>
		    <i class="fa fa-angle-down"></i>
		</a>
		<ul class="dropdown-menu">				
		    <li><a href="<?php echo base_url(ADMIN);?>/user/view/<?php echo $this->acl->user()->id;?>"><i class="fa fa-user"></i> Profile</a></li>
		    <li><a href="javascript:;"><i class="fa fa-lock"></i> Last Login <?php echo date('Y-m-d, H:i:s',$this->acl->user()->last_login);?></a></li>
		    <li><a href="<?php echo base_url(ADMIN)?>/authenticate/logout"><i class="fa fa-key"></i> Log Out</a></li>
		</ul>
	    </li>
	    <!-- END USER LOGIN DROPDOWN -->
	</ul>
	<!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
	    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
	    <!-- BEGIN SIDEBAR MENU -->
	    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
		<li class="sidebar-toggler-wrapper">
		    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		    <div class="sidebar-toggler hidden-phone"></div>
		    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="sidebar-search-wrapper">
		<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->					
		<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>						
		<?php		
		$k = 0;
		foreach ($this->acl->admin_system_modules() as $name => $functions) { 
		    if (is_array($functions) && count($functions) != 0) { ?>
		    <li class="<?if(preg_match('/\b'.$this->uri->segment(2).'\b/i', strtolower($name))) { ?>activ e<?php } ?>">
			<a class="" href="#collapse<?php echo $k;?>">
			    <span class="title"><?php echo $name; ?></span><span class="arrow "></span>
			</a>					
			<ul class="sub-menu"> 
			<?php foreach ($functions as $row_function => $row_label) { ?>
			    <?php if($this->acl->user()->group_id != 1 && $row_label == 'Groups') continue; ?>
			    <li class="<?php echo preg_match('/\b'.$this->uri->segment(2).'\b/i', substr($row_function, 0, strpos($row_function, '/'))) ? 'active' : ''; ?>">
				<a href="<?php echo base_url(ADMIN . $row_function .'?active=current'); ?>"><?php echo $row_label; ?></a>
			    </li>
			<?php } ?>
			</ul>				
		    </li>
		<?php } 
		$k++;
		} 
		?>
	    </ul>
	    <!-- END SIDEBAR MENU -->
	</div>
    </div>
    <!-- END SIDEBAR -->
	
	<!-- page content -->
	<div class="right_col" role="main">
		<?php echo $this->load->view($main);?>
	</div>
	<!-- /page content -->

</div>
	
	<!-- footer content -->
		<?php $this->load->view('template/admin/default/footer'); ?>
	<!-- /footer content -->

	
	
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE themes -->
<!--[if lt IE 9]><script src="<?php echo base_url();?>assets/admin/gentelella/themes/respond.min.js"></script><script src="<?php echo base_url();?>assets/admin/gentelella/themes/excanvas.min.js"></script><![endif]-->
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/flot/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/flot/jquery.flot.categories.min.js"></script>

<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url()?>assets/admin/gentelella/themes/fancybox/source/jquery.fancybox.js" type="text/javascript"></script>-->

 <?php if (!empty($js_files)) { foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
 <?php endforeach; } ?>

<!-- END CORE themes -->
<!-- BEGIN PAGE LEVEL themes -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery.sparkline.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery.cookie.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-easy-pie-chart/jquery.easy-pie-chart.js">-->
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/admin/gentelella/themes/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/themes/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL themes -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/index.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/tasks.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/table-managed.js"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/components-pickers.js"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/charts.js"></script>
<!-- END PAGE LEVEL themes -->

<!-- BEGIN USER AJAX JAVASCRIPTS -->
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/form-user.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/form-module.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/form-status.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/admin/gentelella/scripts/custom/form-setting.js" type="text/javascript"></script>
<!-- END USER AJAX JAVASCRIPTS -->

    
<script>
jQuery(document).ready(function() {    
    App.init(); // initlayout and core themes
   
    TableManaged.init();
   
    ComponentsPickers.init();      
   
    Index.init();
    Index.initCharts(); // init index page's custom scripts
    //Charts.initPieCharts();
    // Custom in admin pages
    FormStatus.init();
    FormUser.init();
    FormModule.init();
    FormSetting.init();
<?php echo ($js_inline) ? "\t".$js_inline."\n" : "";?>
<?php if ($this->session->flashdata('message')) { ?>
	bootbox.alert('<h3><?php echo $this->session->flashdata('message');?></h3>');
<?php } ?>
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>