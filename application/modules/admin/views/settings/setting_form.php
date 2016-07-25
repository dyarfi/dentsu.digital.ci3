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
						<a href="<?php echo base_url(ADMIN.'dashboard/index');?>">
							Dashboard
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							Setting Control
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url(ADMIN.$class_name);?>/<?php echo ($action) ? $action .'/'. $param :'';?>">
							<?php echo $page_title;?>
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
							<label class="control-label col-md-3">Setting Alias </label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="text" class="form-control" name="alias" placeholder="Alias" value="<?php echo $fields->alias;?>" id="alias">
								</div>
								<span class="help-block"><?php echo $errors['alias'];?></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Parameter</label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="text" class="form-control" name="parameter" <?php echo $action == 'edit' ? 'readonly' : ''; ?> placeholder="Parameter" value="<?php echo $fields->parameter;?>" id="parameter">
								</div>
								<span class="help-block"><?php echo $errors['parameter'];?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">					
					<!--/span-->
					<div class="col-md-6">							
						<div class="form-group">
							<label class="control-label col-md-3">Value</label>
							<div class="col-md-9">
								<div class="input-group">
									<?php if ($fields->show_editor) { ?>
									<textarea name="value" class="form-control wysihtml5" id="value" rows="15" cols="600"><?php echo $fields->value;?></textarea>
									<?php } else  {?>
									<input type="text" class="form-control" name="value" placeholder="Value" value="<?php echo $fields->value;?>" id="value">
									<?php } ?>
								</div>
								<span class="help-block"><?php echo $errors['value'];?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Help Text</label>
							<div class="col-md-9">
								<div class="input-group">
									<textarea name="help_text" class="form-control" id="value" rows="2" cols="600"><?php echo $fields->help_text;?></textarea>
								</div>
								<span class="help-block small">Help comments for the fields</span>
								<span class="help-block"><?php echo $errors['value'];?></span>
							</div>
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