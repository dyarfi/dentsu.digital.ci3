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
<link href="<?php echo base_url('assets/admin/gentelella/themes/css/maps/jquery-jvectormap-2.0.3.css');?>" rel="stylesheet"/>
<!-- Custom Theme Style -->
<link href="<?php echo base_url('assets/admin/gentelella/build/css/custom.min.css');?>" rel="stylesheet">
<?php if (!empty($css_files)) { foreach ($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; }?>
<link rel="shortcut icon" href="favicon.ico"/>
<script>base_URL = '<?php echo base_url();?>';</script>
</head>
<!-- END HEAD -->
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="<?php echo base_url();?>" class="site_title"><!--i class="fa fa-paw visible-xs"></i--> <span><img style="margin-top:20px" src="<?php echo base_url("assets/admin/gentelella/themes/images/logo_small.png");?>" alt="logo" class="img-responsive col-md-11 col-lg-11"/></span></a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<!--div class="profile">
				  <div class="profile_pic">
					<img src="<?php echo base_url('assets/admin/gentelella/themes/images/img.jpg');?>" alt="..." class="img-circle profile_img">
				  </div>
				  <div class="profile_info">
					<span>Welcome,</span>
					<h2><?php echo $this->user->email;?></h2>
				  </div>
				</div-->
				<!-- /menu profile quick info -->

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				  <div class="menu_section">
					<h3>&nbsp;</h3>
					<ul class="nav side-menu">
					<?php		
						$k = 0;
						foreach ($this->acl->admin_system_modules() as $name => $functions) { 
							if (is_array($functions) && count($functions) != 0) { ?>
							<li class="<?if(preg_match('/\b'.$this->uri->segment(2).'\b/i', strtolower($name))) { ?>activ e<?php } ?>">
								<a href="#collapse<?php echo $k;?>"><i class="fa fa-edit"></i><?php echo $name; ?><span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu"> 
								<?php foreach ($functions as $row_function => $row_label) { ?>
									<?php if($this->acl->user()->group_id != 1 && $row_label == 'Groups') continue; ?>
									<!--li class="<?php echo preg_match('/\b'.$this->uri->segment(2).'\b/i', substr($row_function, 0, strpos($row_function, '/'))) ? 'active' : ''; ?>"-->
									<li class="<?php echo strstr($row_function,$this->uri->segment(2)) !='' ? 'active' : ''; ?>">
									<?php //echo strstr($row_function,$this->uri->segment(2));?>
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
				  </div>			
				</div>
				<!-- /sidebar menu -->

				<!-- /menu footer buttons -->
				<div class="sidebar-footer hidden-small">
				  <a data-toggle="tooltip" data-placement="top" title="Settings">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
					<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="Lock">
					<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
				  </a>
				  <a data-toggle="tooltip" data-placement="top" title="Logout">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				  </a>
				</div>
				<!-- /menu footer buttons -->
			  </div>
			</div>
		
			<!-- top navigation -->
			<div class="top_nav">
			  <div class="nav_menu">
				<nav>
				  <div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				  </div>

				  <ul class="nav navbar-nav navbar-right">
					<li class="">
					  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo base_url('assets/admin/gentelella/themes/images/img.jpg');?>" alt="">John Doe
						<span class=" fa fa-angle-down"></span>
					  </a>
					  <ul class="dropdown-menu dropdown-usermenu pull-right">
							<!--li><a href="javascript:;"> Profile</a></li>
							<li>
							  <a href="javascript:;">
								<span class="badge bg-red pull-right">50%</span>
								<span>Settings</span>
							  </a>
							</li>
							<li><a href="javascript:;">Help</a></li>
							<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li-->
							<li><a href="<?php echo base_url(ADMIN);?>/user/view/<?php echo $this->acl->user()->id;?>"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="javascript:;"><i class="fa fa-lock"></i> Last Login <?php echo date('Y-m-d, H:i:s',$this->acl->user()->last_login);?></a></li>
							<li><a href="<?php echo base_url(ADMIN)?>/authenticate/logout"><i class="fa fa-key"></i> Log Out</a></li>
					  </ul>
					</li>

					<li role="presentation" class="dropdown">
					  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					  </a>
					  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
						  <a>
							<span class="image">
								<img src="<?php echo base_url('assets/admin/gentelella/themes/images/img.jpg');?>" alt="Profile Image" />
							</span>
							<span>
							  <span>John Smith</span>
							  <span class="time">3 mins ago</span>
							</span>
							<span class="message">
							  Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						  </a>
						</li>
						<li>
						  <a>
							<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
							<span>
							  <span>John Smith</span>
							  <span class="time">3 mins ago</span>
							</span>
							<span class="message">
							  Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						  </a>
						</li>
						<li>
						  <a>
							<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
							<span>
							  <span>John Smith</span>
							  <span class="time">3 mins ago</span>
							</span>
							<span class="message">
							  Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						  </a>
						</li>
						<li>
						  <a>
							<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
							<span>
							  <span>John Smith</span>
							  <span class="time">3 mins ago</span>
							</span>
							<span class="message">
							  Film festivals used to be do-or-die moments for movie makers. They were where...
							</span>
						  </a>
						</li>
						<li>
						  <div class="text-center">
							<a>
							  <strong>See All Alerts</strong>
							  <i class="fa fa-angle-right"></i>
							</a>
						  </div>
						</li>
					  </ul>
					</li>
				  </ul>
				</nav>
			  </div>
			</div>
			<!-- /top navigation -->
			
	<!-- page content -->
	<div class="right_col" role="main">
		<?php echo $output;//echo $this->load->view($main);?>
	</div>
	<!-- /page content -->
	
	<!-- footer content -->
	<?php $this->load->view('template/admin/gentelella/footer'); ?>
	<!-- /footer content -->
	
	</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/fastclick/lib/fastclick.js');?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/nprogress/nprogress.js');?>"></script>
<!-- Chart.js -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Chart.js/dist/Chart.min.js');?>"></script>
<!-- gauge.js -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/gauge.js/dist/gauge.min.js');?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/iCheck/icheck.min.js');?>"></script>
<!-- Skycons -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/skycons/skycons.js');?>"></script>
<!-- Flot -->
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Flot/jquery.flot.js')?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Flot/jquery.flot.pie.js')?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Flot/jquery.flot.time.js');?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Flot/jquery.flot.stack.js');?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/vendors/Flot/jquery.flot.resize.js');?>"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/flot/jquery.flot.orderBars.js');?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/flot/date.js');?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/flot/jquery.flot.spline.js');?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/flot/curvedLines.js');?>"></script>
<!-- jVectorMap -->
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/maps/jquery-jvectormap-2.0.3.min.js');?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/admin/gentelella/themes/js/datepicker/daterangepicker.js');?>"></script>

<!-- Custom Theme Scripts -->
<!--script src="<?php echo base_url('assets/admin/gentelella/build/js/custom.min.js');?>"></script-->
<script src="<?php echo base_url('assets/admin/gentelella/build/js/custom.js');?>"></script>
<!-- Development Scripts -->
<script src="<?php echo base_url('assets/static/js/app.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/index.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/form-module.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/form-setting.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/form-status.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/form-user.js');?>"></script>
<script src="<?php echo base_url('assets/static/js/table-managed.js');?>"></script>

 <?php if (!empty($js_files)) { foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
 <?php endforeach; } ?>

<script>
jQuery(document).ready(function() {    
    App.init(); // initlayout and core themes
   
    TableManaged.init();
   
    //ComponentsPickers.init();      
 
    Index.init();
    //Index.initCharts(); // init index page's custom scripts
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