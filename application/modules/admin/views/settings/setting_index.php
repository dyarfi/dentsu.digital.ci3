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
				    Home
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
			<div class="portlet-body">
			    <div class="table-toolbar">
				<div class="btn-group">
				    <a class="btn green" id="sample_editable_1_new" href="<?=base_url(ADMIN.$class_name.'/add');?>">
				    Add New <i class="fa fa-plus"></i>
				    </a>
				</div>
				<!--div class="btn-group pull-right">
				    <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <i class="fa fa-angle-down"></i>
				    </button>
				    <ul class="dropdown-menu pull-right">
					<li>
					    <a href="#">
						     Print
					    </a>
					</li>
					<li>
					    <a href="#">
						     Save as PDF
					    </a>
					</li>
					<li>
					    <a href="#">
						     Export to Excel
					    </a>
					</li>
				    </ul>
				</div-->
			    </div>
			    <div role="grid" class="dataTables_wrapper" id="sample_1_wrapper">						
				<!--div class="table-scrollable"-->
				<div class="table">
				    <?php
					// Form for changing data status
					echo form_open_multipart(ADMIN.$class_name.'/change');
				    ?>
				    <table id="sample_2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample_2_info">
				    <thead>
					<tr role="row">
					<th class="table-checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 20px;" aria-label=" "><input type="checkbox" data-set="#sample_2 .checkboxes" class="group-checkable">
					</th>
					<th class="sorting" role="columnheader" tabindex="1" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 150px;" aria-label="Email : activate to sort column ascending">Name
					</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 120px;" aria-label="Username : activate to sort column ascending">Parameter
					</th>
					<th class="sorting_disabled" role="columnheader" tabindex="2" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 90px;">Value
					</th><th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="Groups : activate to sort column ascending">Is System
					</th><th class="sorting_disabled" role="columnheader" aria-controls="sample_2" tabindex="4" rowspan="1" colspan="1" style="width: 120px;" aria-label="Status : activate to sort column ascending">Status
					</th>
					</th><th class="sorting_disabled" role="columnheader" aria-controls="sample_2" tabindex="4" rowspan="1" colspan="1" style="width: 120px;" aria-label="Status : activate to sort column ascending">Manage
					</th>
					</tr>
				    </thead>							
				    <tbody role="alert" aria-live="polite" aria-relevant="all">								
					<?php							
					$i = 1;
					foreach ($rows as $row) { ?>
					<tr class="odd gradeX <?php echo ($i % 2) ? 'even' : 'odd'; ?>">
					    <td class=" sorting_1">
						<input type="checkbox" class="checkboxes" name="check[]" id="check_<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" />
					    </td>
					    <td class=" "><?php echo $row->alias;?></td>
					    <td class=" "><?php echo $row->parameter;?></td>
					    <td class=" "><?php echo strip_tags(character_limiter($row->value, 40));?></td>
					    <td class="center ">
						<?php //echo $is_system[$row->is_system];?>
						<span class="label label-sm label-<?php if($is_system[$row->is_system]) { echo 'success'; } else { echo 'warning'; } ?>">							<?php if($is_system[$row->is_system]) { echo 'Yes'; } else { echo 'No'; } ?>
						</span>
					    </td>
					    <td class="center "><?php echo $statuses[$row->status];?></td>
					    <td class=" ">
						<!--span class="label label-sm label-<?php if($row->status == 'active') { echo 'success'; } else { echo 'warning'; }?>"><?php echo $row->status;?>
						</span-->
						<ul class="list-inline">
						    <li>
							<a class="btn default btn-xs blue" href="<?=base_url(ADMIN.'setting/view/'.$row->id);?>" title="View"><i class="fa fa-check"></i>View
							</a>
						    </li>
						    <li>
							<a class="btn default btn-xs purple" href="<?=base_url(ADMIN.'setting/edit/'.$row->id);?>" title="Edit"><i class="fa fa-edit"></i>Edit
							</a>
						    </li>
						    <li>
							<a class="btn default btn-xs red" href="<?=base_url(ADMIN.'setting/delete/'.$row->id);?>" title="Delete"><i class="fa fa-trash-o"></i>Delete
							</a>
						    </li>
						</ul>
					    </td>				
					</tr>
					<?php 
					$i++;
					} ?>
				    </tbody>
				    <tfoot>
					<tr>
					    <td id="corner"><span class="glyphicon glyphicon-minus"></span></td>
					    <td colspan="6">
						<div id="selection" class="input-group">
						    <div class="form-group form-group-sm">
							<label class="col-xs-6 control-label small" for="select_action"> Change status : </label>
							<div class="col-xs-6">
							<select name="select_action" id="select_action" class="form-control input-sm">
							    <option value="">&nbsp;</option>
							    <?php foreach ($statuses as $row => $value) : ?>
							    <option value="<?php echo $row; ?>">
								<?php echo ucfirst($value); ?>
							    </option>
							    <?php endforeach; ?>
							</select>
							</div>
						      </div>
						 </div>   
					    </td>
					</tr>
				    </tfoot>
				</table>
				<?php echo form_close();?>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
		
	    <div class="row">
		<div class="col-md-12">
		    <h3>Maintenance Mode</h3>
		    <?php echo form_open($action, array('class'=>'form-horizontal','id'=>'maintenance_form'), $hidden);?>
			<div class="form-group">
			    <div class="radio-list">
				<div class="radio-inline">
					<label class="col-md-12" for="maintenance_mode">Yes <span>&nbsp;<?php echo form_radio('maintenance_mode', 1, ($configuration) ? true : false, 'class="maintenance_mode"');?></span></label>
				</div>
				<div class="radio-inline">
				    <label class="col-md-12" for="maintenance_mode">No <span>&nbsp;<?php echo form_radio('maintenance_mode', 0, (!$configuration) ? true : false, 'class="maintenance_mode"');?></span></label>
				</div>
			    </div>
			</div>
			<div class="btn-group">
			    <button class="btn btn-danger" type="submit" name="submit" value="submit">Submit</button>
			</div>
		    <?php echo form_close();?>
		</div>
	    </div>
		
	    <!-- END PAGE CONTENT-->
	</div>
</div>