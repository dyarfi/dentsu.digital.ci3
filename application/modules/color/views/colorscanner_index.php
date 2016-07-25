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
 <style>
 .demo-frame {
  /*background: url(frame.png) no-repeat;*/
  width: 854px;
  height: 658px;
  /*position: fixed;
  top: 50%;
  left: 50%;
  margin: -329px 0 0 -429px;
  padding: 95px 20px 45px 34px;
  */
  overflow: hidden;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}

.demo-container {
  width: 100%;
  height: 530px;
  position: relative;
  background: #eee;
  overflow: hidden;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
}

  .rect {
    width: 80px;
    height: 80px;
    position: absolute;
    left: -1000px;
    top: -1000px;
  }
  </style>

<div class="demo-frame">
    <div class="demo-container">
      <img id="img" is="image-color-tracking" target="magenta yellow cyan" src="<?php echo base_url();?>assets/admin/img/works/img5.jpg" />
	</div>
</div>

	<!-- Using Custom Elements -->

  	<canvas is="canvas-color-tracking" target="magenta yellow cyan" id="MyCanvas"></canvas>



		    </div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>