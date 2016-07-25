<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="page-content-wrapper">
	<div class="page-content">
	    <div class="row">
		<div class="col-md-12">
		    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		    <h3 class="page-title">
		    <?php echo $page_title;?> <!--small>managed data users</small-->
		    </h3>
		    <ul class="page-breadcrumb breadcrumb">					
			<li>
			    <i class="fa fa-home"></i>
			    <a href="<?=base_url(ADMIN.'dashboard/index');?>">
				    Dashboard
			    </a>
			    <i class="fa fa-angle-right"></i>
			</li>
			<li>
			    <a href="<?=base_url(ADMIN.$class_name);?>/index">
				    Language Control
			    </a>
			    <i class="fa fa-angle-right"></i>
			</li>
			<li>
			    <a href="<?=base_url(ADMIN.$class_name);?>/<?=($action) ? $action .'/'. $param :'';?>">
				<?=$page_title;?>
			    </a>
			</li>
		    </ul>
		    <!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	    </div>	
	    <!-- BEGIN FORM-->
	    <?php echo form_open(base_url(ADMIN).'/'.$class_name.'/'.($action ? $action .'/'. $param :''),['id'=>$class_name.'-form','class'=>'form-horizontal','enctype'=>'multipart/form-data','role'=>'form']);?>
		<div class="form-body">
		    <!--/row-->
		    <div class="row">
			<div class="col-md-6">
			    <div class="form-group">
				<label class="control-label col-md-3">Name</label>
				<div class="col-md-9">
				    <div class="input-group">
					<input type="text" class="form-control" name="name" placeholder="Name" value="<?=$fields->name;?>" id="name">
				    </div>
				    <span class="help-block"><?php echo $errors['name'];?></span>
				</div>
				</div>
			</div>
			<div class="col-md-6">
			    <div class="form-group">
				<label class="control-label col-md-3">Url</label>
				<div class="col-md-9">
				    <div class="input-group">
					<input type="text" class="form-control" name="url" placeholder="Url" value="<?=$fields->url;?>" id="url">
				    </div>
				    <span class="help-block"><span class="small">URL friendly text</span> <?php echo $errors['url'];?></span>
				</div>
				</div>
			</div>	
			<div class="col-md-6">
			    <div class="form-group">
				<label class="control-label col-md-3">Prefix</label>
				<div class="col-md-9">
				    <div class="input-group">
					<input type="text" class="form-control" name="prefix" placeholder="Prefix" value="<?=$fields->prefix;?>" id="prefix">
				    </div>
				    <span class="help-block"><?php echo $errors['prefix'];?></span>
				</div>
			    </div>			  
			</div>
		    </div>
		    <div class="row">					
			<!--/span-->
			<div class="col-md-6">							
			    <!--div class="form-group">
				<label class="control-label col-md-3">Value</label>
				<div class="col-md-9">
				    <div class="input-group">
					<input type="text" class="form-control" name="value" placeholder="Value" value="<?=$fields->value;?>" id="value">
				    </div>
				    <span class="help-block"><?php echo $errors['value'];?></span>
				</div>
			    </div-->
			    <div class="form-group">
				<!--label class="control-label col-md-3">File Name</label>
				<div class="col-md-9">
				    <div class="input-group">
					<input type="file" class="form-control input-icon" name="file_name" placeholder="File Name" value="<?=$fields->file_name;?>" id="file_name">
				    </div>
				    <span class="help-block"><?php echo $errors['file_name'];?></span>
				</div-->
				
				<!--form id="fileupload" class="" enctype="multipart/form-data" method="POST" action="../../assets/global/plugins/jquery-file-upload/server/php/">
				    <div class="row fileupload-buttonbar">
				    <div class="col-lg-7">
					<span class="btn green fileinput-button">
					    <i class="fa fa-plus"></i>
					    <span> Add files... </span>
					    <input type="file" multiple="" name="files[]">
					</span>
					<button class="btn blue start" type="submit">
					    <i class="fa fa-upload"></i>
					    <span> Start upload </span>
					</button>
					<span class="fileupload-process"> </span>
				    </div>
				</form-->	  
				
			    </div>
			</div>
			<!--/span-->
		    </div>
		    <!--/row-->
		    <div class="row">
			<!--/span-->
			<div class="col-md-6">
			    <div class="form-group">
				<label class="control-label col-md-3">Status</label>
				<div class="col-md-6">
				    <select class="form-control" name="status">
				    <?php foreach ($statuses as $status => $stat) {?>
					    <option value="<?php echo $status;?>" <?php echo ($status == $fields->status) ? 'selected' : '';?>><?php echo $stat;?></option>
				    <?php } ?>
				    </select>								
				    <span class="help-block"><?php echo $errors['status'];?></span>
				</div>
			    </div>
			</div>
			<!--/span-->
		    </div>
		    <!--/row-->
		</div>
		<div class="form-actions fluid">
		    <div class="row">
			<div class="col-md-6">
			    <div class="col-md-offset-3 col-md-9">
				<button class="btn green" type="submit">Submit</button>
				<button class="btn default" type="reset">Cancel</button>
			    </div>
			</div>
			<div class="col-md-6">
			    <div class="msg"></div>
			</div>
		    </div>
		</div>
	    <?php echo form_close();?>
	    <!-- END FORM-->
	</div>
</div>	