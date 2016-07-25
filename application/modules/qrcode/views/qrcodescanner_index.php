<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="portlet-config" class="modal fade">
		    <div class="modal-dialog">
			<div class="modal-content">
			    <div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button"></button>
				<h4 class="modal-title">Modal title</h4>
			    </div>
			    <div class="modal-body">
				Widget settings form goes here
			    </div>
			    <div class="modal-footer">
				<button class="btn blue" type="button">Save changes</button>
				<button data-dismiss="modal" class="btn default" type="button">Close</button>
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
			<h3 class="page-title">Manage <?=$page_title;?></h3>
			<ul class="page-breadcrumb breadcrumb">					
			    <li>
				<i class="fa fa-home"></i>
				<a href="<?=base_url(ADMIN.'dashboard/index')?>">	
					Dashboard
				</a>
				<i class="fa fa-angle-right"></i>
			    </li>
			    <li>
				<a href="<?=base_url(ADMIN.$class_name.'/index');?>">
					<?=$page_title;?>
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
<style type="text/css">
#qrfile{
    width:320px;
    height:240px;
}
#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#iembedflash{
    margin:0;
    padding:0;
}
#mp1{
    text-align:center;
    font-size:25px;
}
#mp2{
    text-align:center;
    font-size:25px;
    color:red;
}
.selector{
    border: solid;
    border-width: 3px 3px 1px 3px;
    margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:320px;
    height:240px;
    border: solid;
    border-width: 1px 1px 1px 1px;
}
#result{
    border: solid;
    border-width: 1px 1px 1px 1px;
    padding:20px;
    width:37.3%;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
    margin-left:35px;
    margin-right:35px;
    padding-top:10px;
    padding-bottom:10px;
    border-radius:20px;
}
p.helptext{
    margin-top:54px;
    font:18px arial,sans-serif;
}
p.helptext2{
    margin-top:100px;
    font:18px arial,sans-serif;
}
.tsel{
    padding:0;
}

</style>

		<div id="main">
			<div id="mainbody" class="center-block">
				<div class="clearfix">
					<div class="pull-left">
						<button id="qrimg" class="btn btn-primary btn-sm" onclick="setimg()"><span class="fa fa-file-o"></span></button>
						<button id="webcamimg" class="btn btn-primary btn-sm" onclick="setwebcam()"><span class="fa fa-camera"></span></button>
					</div>	
				</div>
				<div id="outdiv" style="width:373px;height:280px"></div>
				<div id="result" style="width:373px;height:auto"></div>
			</div>
		</div>

		<canvas id="qr-canvas" width="800" height="600"></canvas>

		<!-- END PAGE CONTENT-->

		</div>	
	</div>
</div>
</div>