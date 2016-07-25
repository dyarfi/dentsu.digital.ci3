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
<link href="<?=admin_theme()?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

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
			<img src="<?=admin_theme()?>assets/img/logo.png" alt="logo" class="img-responsive col-md-7 col-lg-7"/>
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
			
			
			<!-- END STYLE CUSTOMIZER -->
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
                <?
                if($this->uri->segment(2)=='deleted_succes')
				{
				?>
                <!-- Alert Class -->
                <div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<strong>Warning!</strong> One Media Has Been Deleted !
				</div>
                <?
				}
				?>
                <!-- end alert Class -->
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
										<label><input type="checkbox" checked data-column="0">Uploader</label>
										<label><input type="checkbox" checked data-column="1">Content</label>
										<label><input type="checkbox" checked data-column="2">Keyword</label>
                                        <label><input type="checkbox" checked data-column="2">Like Count</label>
										<label><input type="checkbox" checked data-column="3">Retweet Count</label>
										<label><input type="checkbox" checked data-column="3">Preview Count</label>										
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2" style="">
							<thead>
							<tr>
								<th>
									 Uploader
								</th>
								<th>
									 Content
								</th>
                                <th>
									 Keyword
								</th>
								<th class="hidden-xs">
									 Like Count
								</th>
                                <th class="hidden-xs">
									 Retweet Count
								</th>
								<th class="hidden-xs">
									 Status
								</th>
								<th class="hidden-xs">
									 Preview
								</th>
                                <th >
									 Action
								</th>
								
							</tr>
							</thead>
							<tbody>
                            <?
                            foreach($media as $med) {
							?>
							<tr>
								<td>
									 <?=$med['from_name']?>
								</td>
                                <td>
									 <div><?=$med['content']?></div>
								</td>
								<td>
									 <?=$med['keyword']?>
								</td>
								<td>
									<?=$med['like_count'] ? $med['like_count'] : '-';?>
								</td>
                                <td>
									 <?=$med['retweet_count'] ? $med['retweet_count'] : '-';?>
								</td>
							    <td>
									 <?=ucfirst($med['status']);?>
								</td>	
								<td>
                                <a class="btn default" data-toggle="modal" href="#responsive<?=$med['id']?>">
										VIEW IMAGE
									</a>
									 <div id="responsive<?=$med['id']?>" class="modal fade" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title"><?=$med['from_name']?></h4>
										</div>
										<div class="modal-body">
											<img src="<?=$med['media']?>" class="img-responsive">
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn default">Close</button>
											
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
								<div class="page-loading page-loading-boxed">
									<img src="<?=base_url()?>assets/img/loading-spinner-grey.gif" alt="" class="loading">
									<span>
										&nbsp;&nbsp;Loading...
									</span>
								</div>
								<div class="modal-dialog">
									<div class="modal-content">
									</div>
								</div>
							</div>
								</td>
                                <td>
                                  <!--a href="#" ><i class="fa fa-edit"></i> Edit</a>|| -->                             
                              <a href="<?=base_url()?>__admin_gallery/delete/<?=$med['original_id']?>" >
							<i class="fa fa-trash-o"></i> Delete
								
							</a>
                            
                           
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