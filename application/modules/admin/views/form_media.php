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
<link rel="stylesheet" type="text/css" href="<?=admin_theme()?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=admin_theme()?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=admin_theme()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>
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
			
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
							 THEME COLOR
						</span>
						<ul>
							<li class="color-black current color-default" data-style="default">
							</li>
							<li class="color-blue" data-style="blue">
							</li>
							<li class="color-brown" data-style="brown">
							</li>
							<li class="color-purple" data-style="purple">
							</li>
							<li class="color-grey" data-style="grey">
							</li>
							<li class="color-white color-light" data-style="light">
							</li>
						</ul>
					</div>
					
				</div>
			</div>
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
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>Form Add Media
							</div>
							
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<?php echo form_open(base_url().'__admin_media/add_media',['id'=>'form_sample_1','class'=>'form-horizontal','enctype'=>'multipart/form-data']);?>	
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									
									<div class="form-group" >
										<label class="control-label col-md-3">Media Title
										<span class="required">
											 *
										</span>
										</label>
										<div class="col-md-4">
											<input type="text" name="name" data-required="1" class="form-control"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Media City
										<span class="required">
											 *
										</span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="category" class="select2me">
												<option value="">Select...</option>
												<option value="1">BEKASI</option>
												<option value="2">BANDUNG</option>
												<option value="3">BOGOR</option>
												<option value="4">DEPOK</option>
                                                <option value="5">KARAWANG</option>
                                                <option value="6">CIREBON</option>
                                                <option value="7">SUKABUMI</option>
                                                <option value="8">INDRAMAYU</option>
                                                <option value="9">TASIK</option>
                                                <option value="10">GARUT</option>
                                                <option value="11">PURWAKARTA</option>
                                                <option value="12">CIAMIS</option>
                                                <option value="13">MAJALENGKA</option>
                                                <option value="14">KUNINGAN</option>
                                                <option value="15">SUMEDANG</option>
                                                <option value="16">CIANJUR</option>
                                                <option value="17">SUBANG</option>
                                               
											</select>
										</div>
									</div>
                                    <div class="form-group" >
										<label class="control-label col-md-3">Type 
										<span class="required">
											 *
										</span>
										</label>
										<div class="col-md-4">
											<select class="form-control" onChange="javascript:changeform();" id="type_media" name="type_media" class="select2me">
												<option value="">Type Media</option>
                                                <option value="1">Video</option>
                                                <option value="2">Image</option>    
											</select>
										</div>
									</div>		
									<div class="form-group" style="visibility:hidden;display:none;" id="video_data">
										<label class="control-label col-md-3">URL
										<span class="required">
											 *
										</span>
										</label>
										<div class="col-md-4">
											<input name="url" type="text" class="form-control"/>
											<span class="help-block">
												 e.g: https://www.demo.com or https://demo.com <br>
												<strong class=" red">use only https://</strong>
											</span>
										</div>
									</div>
									<div class="form-group last" style="visibility:hidden;display:none;" id="file_image_holder">
										<label class="control-label col-md-3">Image Upload #2</label>
										<div class="col-md-9">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
												</div>
												<div>
													<span class="btn default btn-file">
														<span class="fileinput-new">
															 Select image
														</span>
														<span class="fileinput-exists">
															 Change
														</span>
														<input type="file" name="file_image" id="file_image">
													</span>
													<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
														 Remove
													</a>
												</div>
											</div>
											<div class="clearfix margin-top-10">
												<span class="label label-danger">
													 NOTE!
												</span>
												 Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.
											</div>
										</div>
									</div>
								
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<input type="submit" class="btn green" value="Submit">
										<a  class="btn red" href="<?=base_url()?>__admin_media">Cancel</a>
									</div>
								</div>
							</form>
							<?php echo form_close();?>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
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
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/bootstrap-markdown/lib/markdown.js"></script>
<script src="<?=admin_theme()?>assets/plugins/dropzone/dropzone.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/plugins/typeahead/typeahead.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="<?=admin_theme()?>assets/scripts/core/app.js"></script>
<script src="<?=admin_theme()?>assets/scripts/custom/form-validation.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
   //FormDropzone.init();
  // TableAdvanced.init();
	  FormValidation.init();
});
function changeform()
{
	if(document.getElementById('type_media').value==1)
	{
		document.getElementById('video_data').style.visibility='visible';
		document.getElementById('video_data').style.display="block";
		document.getElementById('file_image_holder').style.display="none";
		document.getElementById('file_image_holder').style.visibility='hidden';
	}
	if(document.getElementById('type_media').value==2)
	{
		document.getElementById('video_data').style.display="none";
		document.getElementById('file_image_holder').style.display="block";
		document.getElementById('file_image_holder').style.visibility='visible';
		document.getElementById('video_data').style.visibility='hidden';
	}
}
</script>
</body>
<!-- END BODY -->
</html>