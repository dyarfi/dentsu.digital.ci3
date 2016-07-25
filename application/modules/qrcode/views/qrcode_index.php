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
		<!-- BEGIN STYLE CUSTOMIZER -->
		<!--div class="theme-panel hidden-xs hidden-sm">
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
						<li data-style="default" class="color-black current color-default">
						</li>
						<li data-style="blue" class="color-blue">
						</li>
						<li data-style="brown" class="color-brown">
						</li>
						<li data-style="purple" class="color-purple">
						</li>
						<li data-style="grey" class="color-grey">
						</li>
						<li data-style="light" class="color-white color-light">
						</li>
					</ul>
				</div>
				<div class="theme-option">
					<span>
						 Layout
					</span>
					<select class="layout-option form-control input-small">
						<option selected="selected" value="fluid">Fluid</option>
						<option value="boxed">Boxed</option>
					</select>
				</div>
				<div class="theme-option">
					<span>
						 Header
					</span>
					<select class="header-option form-control input-small">
						<option selected="selected" value="fixed">Fixed</option>
						<option value="default">Default</option>
					</select>
				</div>
				<div class="theme-option">
					<span>
						 Sidebar
					</span>
					<select class="sidebar-option form-control input-small">
						<option value="fixed">Fixed</option>
						<option selected="selected" value="default">Default</option>
					</select>
				</div>
				<div class="theme-option">
					<span>
						 Sidebar Position
					</span>
					<select class="sidebar-pos-option form-control input-small">
						<option selected="selected" value="left">Left</option>
						<option value="right">Right</option>
					</select>
				</div>
				<div class="theme-option">
					<span>
						 Footer
					</span>
					<select class="footer-option form-control input-small">
						<option value="fixed">Fixed</option>
						<option selected="selected" value="default">Default</option>
					</select>
				</div>
			</div>
		</div-->
		<!-- END STYLE CUSTOMIZER -->
		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">Managed Users <small>managed data users</small></h3>
				<ul class="page-breadcrumb breadcrumb">
					<!--li class="btn-group">
						<button data-close-others="true" data-delay="1000" data-hover="dropdown" data-toggle="dropdown" class="btn blue dropdown-toggle" type="button">
						<span>
							Actions
						</span>
						<i class="fa fa-angle-down"></i>
						</button>
						<ul role="menu" class="dropdown-menu pull-right">
							<li>
								<a href="#">
									Action
								</a>
							</li>
							<li>
								<a href="#">
									User Control 
								</a>
							</li>
							<li>
								<a href="#">
									List Users
								</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">
									Separated link
								</a>
							</li>
						</ul>
					</li-->
					<li>
						<i class="fa fa-home"></i>
						<a href="<?=base_url(ADMIN.'dashboard/index')?>">
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
						<a href="<?=base_url(ADMIN.'user/index');?>">
							Users
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
				<div class="portlet box light-grey">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Managed Users
						</div>
						<div class="tools">
							<a class="collapse" href="javascript:;">
							</a>
							<a class="config" data-toggle="modal" href="#portlet-config">
							</a>
							<a class="reload" href="javascript:;">
							</a>
							<a class="remove" href="javascript:;">
							</a>
						</div>
					</div>
					<div class="portlet-body">
						<div class="table-toolbar">
							<div class="btn-group">
								<!--button class="btn green" id="sample_editable_1_new">
								Add New <i class="fa fa-plus"></i>
								</button-->
								<a class="btn green" id="sample_editable_1_new" href="<?=base_url(ADMIN.'user/add');?>">
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
					<table id="sample_2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample_2_info">
						<thead>
						<tr role="row">
						<th class="table-checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 20px;" aria-label=" "><input type="checkbox" data-set="#sample_2 .checkboxes" class="group-checkable">
						</th>
							<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 120px;" aria-label="Username : activate to sort column ascending">Username
							</th><th class="sorting" role="columnheader" tabindex="1" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 150px;" aria-label="Email : activate to sort column ascending">Email
							</th>
							<th class="sorting_disabled" role="columnheader" tabindex="2" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 90px;">Password
							</th><th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="Groups : activate to sort column ascending">Groups
							</th><th class="sorting_disabled" role="columnheader" aria-controls="sample_2" tabindex="4" rowspan="1" colspan="1" style="width: 120px;" aria-label="Status : activate to sort column ascending">Status
							</th>
							</th><th class="sorting_disabled" role="columnheader" aria-controls="sample_2" tabindex="4" rowspan="1" colspan="1" style="width: 120px;" aria-label="Status : activate to sort column ascending">Manage
							</th>
						</tr>
						</thead>							
						<tbody role="alert" aria-live="polite" aria-relevant="all">								
							<?php 
							/*
							$i = 1;
							foreach ($rows as $row) { ?>
							<tr class="odd gradeX <?php echo ($i % 2) ? 'even' : 'odd'; ?>">
								<td class=" sorting_1">
									<input type="checkbox" value="1" class="checkboxes">
								</td>
								<td class=" "><?php echo $row->username;?></td>
								<td class=" "><a href="mailto:<?php echo $row->email;?>"><?php echo $row->email;?></a>
								</td>
								<td class=" "><?php echo $row->password;?></td>
								<td class="center "><?php echo $row->group_id;?></td>
								<td class="center "><?php echo $statuses[$row->status]	;?></td>
								<td class=" ">
									<!--span class="label label-sm label-<?php if($row->status == 'active') { echo 'success'; } else { echo 'warning'; }?>"><?php echo $row->status;?>
									</span-->
									<ul class="list-inline">
										<li>
											<a class="btn default btn-xs blue" href="<?=base_url(ADMIN.'user/view/'.$row->id);?>" title="View"><i class="fa fa-check"></i>View
											</a>
										</li>
										<li>
											<a class="btn default btn-xs purple" href="<?=base_url(ADMIN.'user/edit/'.$row->id);?>" title="Edit"><i class="fa fa-edit"></i>Edit
											</a>
										</li>
										<li>
											<a class="btn default btn-xs red" href="<?=base_url(ADMIN.'user/delete/'.$row->id);?>" title="Delete"><i class="fa fa-trash-o"></i>Delete
											</a>
										</li>
									</ul>
								</td>				
							</tr>
							<?php 
							$i++;
							} */ ?>
							</tbody></table></div>
						</div>
					</div>
				</div>
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>