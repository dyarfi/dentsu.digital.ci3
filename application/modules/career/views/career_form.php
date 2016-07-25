<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

foreach ($divisions as $division) {
	print_r($division->id);
}
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
				<?php echo $page_title;?><!--small>managed data users</small-->
				</h3>
				<ul class="page-breadcrumb breadcrumb">					
					<li>
						<i class="fa fa-home"></i>
						<a href="<?=base_url(ADMIN.'dashboard/index');?>">
							Dashboard
						</a>
						<!--i class="fa fa-angle-right"></i-->
					</li>
					<!--li>
						<a href="#">
							User Control
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url();?>admin/user/add">
							User Add
						</a>
					</li-->
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
							<label class="control-label col-md-3">Subject </label>
							<div class="col-md-9">
									<input type="text" class="form-control" name="subject" placeholder="Subject" value="<?=$fields->subject;?>" id="subject">
								<span class="help-block"><div class="text-warning"><?php echo $errors['subject'];?></div></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Sent To</label>
							<div class="col-md-9">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-envelope"></i>
									</span>
									<input type="email" class="form-control" name="sent_to" placeholder="Sent To" value="<?=$fields->sent_to;?>" id="sent_to">
								</div>
								<span class="help-block"><span class=""><?php echo $errors['sent_to'];?></span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Ref No</label>
							<div class="col-md-9">
								<input type="ref_no" class="form-control" name="ref_no" value="<?=$fields->ref_no;?>" id="ref_no">
								<span class="help-block"><?php echo $errors['ref_no'];?></span>
							</div>							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Division</label>
							<div class="col-md-9">
								<select class="form-control" name="division_id">
								<?php foreach ($divisions as $division) {?>
									<option value="<?php echo $division->id;?>" <?php echo ($division->id == $fields->division_id) ? 'selected' : '';?>><?php echo $division->subject;?></option>
								<?php } ?>
								</select>								
								<span class="help-block"><?php echo $errors['division_id'];?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Start Date</label>
							<div class="col-md-9">
								<div class="input-group input-medium date date-picker" data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12">
									<input class="form-control" type="text" name="start_date" value="<?=$fields->start_date;?>">
									<span class="input-group-btn">
										<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								<span class="help-block"><?php echo $errors['start_date'];?></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">End Date</label>
							<div class="col-md-9">
								<div class="input-group input-medium date date-picker" data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12">
									<input class="form-control" type="text" name="end_date" value="<?=$fields->end_date;?>">
									<span class="input-group-btn">
										<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								<span class="help-block"><?php echo $errors['start_date'];?></span>
							</div>
						</div>
					</div>
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Job Purpose</label>
							<div class="col-md-9">
								<textarea type="text" placeholder="Job Purpose" name="job_purpose" class="form-control" rows="5"><?=$fields->job_purpose;?></textarea>
								<span class="help-block"><?php echo $errors['job_purpose'];?></span>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">						
						<div class="form-group">
							<label class="control-label col-md-3">Requirements</label>
							<div class="col-md-9">
								<textarea type="text" placeholder="Requirements" name="requirements" class="form-control" rows="5"><?=$fields->requirements;?></textarea>
								<span class="help-block"><?php echo $errors['requirements'];?></span>
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
							<div class="col-md-9">
								<select class="form-control" name="status">
								<?php foreach ($statuses as $status => $stat) {?>
									<option value="<?php echo $status;?>" <?php echo ($status == $fields->status) ? 'selected' : '';?>><?php echo $stat;?></option>
								<?php } ?>
								</select>								
								<span class="help-block"><?php echo $errors['status'];?></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Location</label>
							<div class="col-md-9">
								<div class="input-group">
									<span class="input-group-addon">
									<i class="fa fa-road"></i>
									</span>
									<input class="form-control" type="text" placeholder="Location" value="<?=$fields->location;?>" name="location">
								</div>
								<span class="help-block"><?php echo $errors['location'];?></span>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
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