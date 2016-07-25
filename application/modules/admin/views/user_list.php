<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=admin_theme()?>assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?=admin_theme()?>assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" href="<?=admin_theme()?>assets/plugins/data-tables/DT_bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=admin_theme()?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=admin_theme()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="<?=base_url()?>__admin_dashboard">
			<img src="<?=admin_theme()?>assets/img/logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?=admin_theme()?>assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		{NAVTOP}
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	{MENU}
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Controls <small>{TITLE}</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						<li>
							<i class="fa fa-home"></i>
							<a href="<?=base_url()?>__admin_dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								User Control
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								{TITLE}
							</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Data {TITLE}
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn default" href="#" data-toggle="dropdown">
										 Columns <i class="fa fa-angle-down"></i>
									</a>
									<div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox" checked data-column="0">Nama User</label>
										<label><input type="checkbox" checked data-column="1">Email User</label>
										<label><input type="checkbox" checked data-column="2">Total Vote</label>
										<label><input type="checkbox" checked data-column="3">Link Facebook</label>
										
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
							<thead>
							<tr>
								<th>
									 Nama User
								</th>
								<th>
									 Email User
								</th>
								<th class="hidden-xs">
									 Total Vote
								</th>
								<th>
                                Date Join
                                </th>
                                <th class="hidden-xs">
									 Link Facebook
								</th>
                                
								
							</tr>
							</thead>
							<tbody>
                            <?
                            foreach($media as $med)
							{
							?>
							<tr>
								<td>
									 <?=$med['fb_other']?>
								</td>
								<td>
									 <?=$med['fb_email']?>
								</td>
								<td>
									 <?=$this->vote_model->count_vote_by_user($med['fb_id'])?>
								</td>
                                <td>
                                <?=$med['date_insert']?>
                                </td>
								<td>
									 <a class="btn red" href="<?=$med['fb_address']?>" target="_blank">Link Facebook</a>
								</td>
								
							</tr>
							<?
							}
							?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
                </div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
{FOOTER}
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=admin_theme()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=admin_theme()?>assets/scripts/core/app.js"></script>
<script src="<?=admin_theme()?>assets/scripts/custom/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
   TableAdvanced.init();
});
</script>
</body>
<!-- END BODY -->
</html>