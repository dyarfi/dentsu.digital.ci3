<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="boxed-grey">
	<div class="container">
	<div class="row-fluid">
		<div class="topDiv50">
		<?php 
		if ($vacancies) {
			?>
			<h5>Available Vacancies</h5>
			<ul>
				<?php
				foreach ($vacancies as $val) { ?>
					<li><a href="javascript:;"><?php echo $val->subject; ?></a></li>
				<?php
				}
				?>
			</ul>
		<?php
		}
		?>
		</div>
		<hr/>
	</div>
	<h4>Apply vacancy for <?php echo $vacancy->subject;?></h4>
	<?php echo form_open(base_url('vacancy/apply'),['id'=>'vacancy-form','class'=>'form-horizontal','enctype'=>'multipart/form-data','role'=>'form']);?>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
				</div>
				<!--div class="form-group">
					<label for="subject">
						Subject</label>
					<select id="subject" name="subject" class="form-control" required="required">
						<option value="na" selected="">Choose One:</option>
						<option value="service">General Customer Service</option>
						<option value="suggestions">Suggestions</option>
						<option value="product">Product Support</option>
					</select>
				</div-->			
				<div class="form-group">
					<label for="exampleInputFile">CV File</label>
					<div class="fileUpload btn btn-danger">
					  <span>Upload</span><input type="file" class="upload" value="" name="cv_file" />
					</div>				
					<div class="file-label text-primary"></div>
					<div class="checkbox">
						<p class="help-block">With submitting this form you are agree for the used of your credentials information to us.</p>						 <label><input type="checkbox">I Agree</label>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">Message</label>
					<textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-skin pull-right" id="btnContactUs">Send</button>
			</div>
		</div>
	<?php echo form_close();?>
	</div>
</div>