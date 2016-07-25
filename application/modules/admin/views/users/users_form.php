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
			<a href="<?=base_url(ADMIN);?>/<?=$class_name;?>/index">
				User Control
			</a>
			<i class="fa fa-angle-right"></i>
		    </li>
		    <li>
			<a href="<?=base_url(ADMIN);?>/user/<?=($action) ? $action .'/'. $param :'';?>">
			       User <?=ucfirst($action);?>
			</a>
		    </li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	    </div>
	</div>	
	<!-- BEGIN FORM-->
	<form class="form-horizontal <?=$class_name;?>-form" method="POST" action="<?=base_url(ADMIN);?>/<?=$class_name;?>/<?=($action) ? $action .'/'. $param :'';?>" id="<?=$class_name;?>-form-default">
	    <div class="form-body">
		<h3 class="form-section">User Info</h3>
		<!--/row-->
		<div class="row">
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Username </label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
					<i class="fa fa-user"></i>
				    </span>
				    <input type="text" <?php echo $action == 'edit' ? 'readonly' : '';?> class="form-control" name="username" placeholder="Username" value="<?=$fields->username;?>" id="username">
				</div>
				<span class="help-block"><?php echo $errors['username'];?></span>
			    </div>
			</div>
		    </div>
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Email</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
				    <i class="fa fa-envelope"></i>
				    </span>
				    <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$fields->email;?>" id="email">
				</div>
				<span class="help-block"><?php echo $errors['email'];?></span>
			    </div>
			</div>
		    </div>
		</div>
		<div class="row">
		    <?php if (!$param) { ?>
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Password</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <input type="password" class="form-control" name="password" value="<?=$fields->password;?>" id="password">
				</div>
				<span class="help-block"><?php echo $errors['password'];?></span>
			    </div>
			</div>
		    </div>
		    <?php } ?>
		    <!--/span-->
		    <div class="col-md-6">							
			<div class="form-group">
			    <label class="control-label col-md-3">Group</label>
			    <div class="col-md-9">
				<select class="form-control" name="group_id">
				<?php foreach($user_groups as $group) {;?>
					<option value="<?php echo $group->id;?>" <?php echo ($group->id == $fields->group_id) ? 'selected' : '';?>><?php echo $group->name;?></option>
				<?php } ?>
				</select>
				<span class="help-block"><?php echo $errors['group_id'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		</div>
		<!--/row-->
		<div class="row">
		    <?php if (!$param) { ?>
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Retype Password</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <input type="password" class="form-control" name="password1" value="<?=$fields->password1;?>" id="password1">
				</div>
				<span class="help-block"><?php echo $errors['password1'];?></span>
			    </div>
			</div>
		    </div>
		    <?php } ?>
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
		    <!--/span-->
		</div>
		<!--/row-->
		<h3 class="form-section">User Profile</h3>
		<div class="row">
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">First Name</label>
			    <div class="col-md-9">
				<input type="text" placeholder="First Name" name="first_name" value="<?=$fields->first_name;?>" class="form-control">
				<span class="help-block"><?php echo $errors['first_name'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		    <div class="col-md-6">						
			<div class="form-group">
			    <label class="control-label col-md-3">Last Name</label>
			    <div class="col-md-9">
				<input type="text" placeholder="Last Name" name="last_name" value="<?=$fields->last_name;?>" class="form-control">
				<span class="help-block"><?php echo $errors['last_name'];?></span>								
			    </div>
			</div>
		    </div>
		    <!--/span-->
		</div>
		<!--/row-->
		<div class="row">
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Gender</label>
			    <div class="col-md-9">
				<select class="form-control" name="gender">
				<?php foreach ($genders as $gender => $gen) {?>
					<option value="<?php echo $gender;?>" <?php echo ($gender == $fields->gender) ? 'selected' : '';?>><?php echo $gen;?></option>
				<?php } ?>
				</select>	
				<span class="help-block"><?php echo $errors['gender'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Date of Birth</label>
			    <div class="col-md-9">
				<div class="input-group input-medium date date-picker" data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2012-02-12">
				    <input class="form-control" type="text" name="birthday" value="<?=$fields->birthday;?>">
				    <span class="input-group-btn">
					<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
				    </span>
				</div>
				<span class="help-block"><?php echo $errors['birthday'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		</div>
		<!--/row-->
		<div class="row">
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Phone</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
					    <i class="fa fa-phone"></i>
				    </span>
				    <input class="form-control" type="text" placeholder="Phone" value="<?=$fields->phone;?>" name="phone">
				</div>
				<span class="help-block"><?php echo $errors['phone'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Mobile</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
				    <i class="fa fa-mobile"></i>
				    </span>
				    <input class="form-control" type="text" placeholder="Mobile" value="<?=$fields->mobile_phone;?>" name="mobile_phone">
				</div>
				<span class="help-block"><?php echo $errors['mobile_phone'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		</div>
		<!--/row-->
		<div class="row">
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">Division</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
				    <i class="fa fa-book"></i>
				    </span>
				    <input class="form-control" type="text" placeholder="Division" value="<?=$fields->division;?>" name="division">
				</div>
				<span class="help-block"><?php echo $errors['division'];?></span>
			    </div>
			</div>
		    </div>
		    <!--/span-->
		    <div class="col-md-6">
			<div class="form-group">
			    <label class="control-label col-md-3">About</label>
			    <div class="col-md-9">
				<div class="input-group">
				    <span class="input-group-addon">
				    <i class="fa fa-road"></i>
				    </span>
				    <input class="form-control" type="text" placeholder="About" value="<?=$fields->about;?>" name="about">
				</div>
				<span class="help-block"><?php echo $errors['about'];?></span>
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
	</form>
	<!-- END FORM-->
    </div>
</div>	