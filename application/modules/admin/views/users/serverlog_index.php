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
			     Widget logs form goes here
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
		<?php
		// Data checking
		if(!empty($rows)) { ?>
		<div class="portlet-body">
		    <div class="table-toolbar">
				<div class="btn-group">
				    <a class="btn red" id="sample_editable_1_new" href="<?=base_url(ADMIN.$class_name.'/trash');?>">
				    Trash Log <i class="fa fa-trash-o"></i>
				    </a>
				</div>
				<div class="btn-group pull-right">
				    <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <i class="fa fa-angle-down"></i>
				    </button>
				    <ul class="dropdown-menu pull-right">
					<!-- <li><a href="#">Print</a></li> -->
					<!-- <li><a href="#">Save as PDF</a></li> -->
					<li><a href="<?php echo base_url(ADMIN . $class_name.'/export');?>">Export to Excel</a></li>
				    </ul>
				</div>			    
		    </div>
		    <div role="grid" class="dataTables_wrapper" id="sample_1_wrapper">						
		    <!--div class="table-scrollable"-->
		    <div class="table">
			<table id="sample_2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample_2_info">
			    <thead>
			    <tr role="row">
				<th class="table-checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 20px;" aria-label=" "><input type="checkbox" data-set="#sample_2 .checkboxes" class="group-checkable">
				</th>
				<th class="sorting" role="columnheader" tabindex="1" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 150px;" aria-label="Session : activate to sort column ascending">Session Id</th>
				<th class="sorting" role="columnheader" tabindex="1" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 150px;" aria-label="Url : activate to sort column ascending">Url</th>
				<th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 120px;" aria-label="User : activate to sort column ascending">User</th>
				<th class="sorting_disabled" role="columnheader" tabindex="2" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 90px;">Status Code</th>
				<th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="HTTP Code : activate to sort column ascending">HTTP Code</th>
				<th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="Total Time Load : activate to sort column ascending">Total Time Load</th>
				<!--th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="Groups : activate to sort column ascending">Bytes Served</th-->
				<th class="sorting_disabled" role="columnheader" tabindex="2" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 90px;">IP Address</th>
				<th class="sorting_disabled" role="columnheader" tabindex="2" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 90px;">Referrer</th>
				<th class="sorting" role="columnheader" tabindex="3" aria-controls="sample_2" rowspan="1" colspan="1" style="width: 142px;" aria-label="Groups : activate to sort column ascending">User Agent</th>
				<th class="sorting_disabled" role="columnheader" aria-controls="sample_2" tabindex="4" rowspan="1" colspan="1" style="width: 120px;" aria-label="Status : activate to sort column ascending">Added
				</th>
			    </tr>
			    </thead>							
			    <tbody role="alert" aria-live="polite" aria-relevant="all">								
				<?php							
				$i = 1;
				$agents = array();
				foreach ($rows as $row) { 
				$agents = json_decode($row->user_agent);	
				?>
				<tr class="odd gradeX <?php echo ($i % 2) ? 'even' : 'odd'; ?>">
				    <td class=" sorting_1"><input type="checkbox" value="1" class="checkboxes"></td>
				    <td class=" "><?php echo $row->session_id;?></td>
					<td class=" "><?php echo $row->url;?></td>
				    <td class=" "><?php echo ($row->user_id) ? $row->user_id : 'Anonymous';?></td>
				    <td class=" "><?php echo $row->status_code;?></td>
				    <td class=" "><?php echo $row->http_code;?></td>
				    <td class=" "><?php echo $row->total_time;?></td>
				    <td class=" "><?php echo $row->ip_address;?></td>
				    <td class=" "><?php echo ($row->referrer) ? $row->referrer : '-';?></td>
					<td class=" "><?php echo $agents->browser .'|'. word_limiter($agents->user_agent,4) .'|'. $agents->platform;?></td>
				    <td class=" "><?php echo date('D, d-m-Y', $row->added);?></td>
				    <!--td class="center "><?php echo $statuses[$row->status];?></td-->
				    <!--td class=" ">
					<ul class="list-inline">
					    <li>
						<a class="btn default btn-xs blue" href="<?=base_url(ADMIN.'log/view/'.$row->id);?>" title="View"><i class="fa fa-check"></i>View
						</a>
					    </li>
					    <li>
						<a class="btn default btn-xs purple" href="<?=base_url(ADMIN.'log/edit/'.$row->id);?>" title="Edit"><i class="fa fa-edit"></i>Edit
						</a>
					    </li>
					    <li>
						<a class="btn default btn-xs red" href="<?=base_url(ADMIN.'log/delete/'.$row->id);?>" title="Delete"><i class="fa fa-trash-o"></i>Delete
						</a>
					    </li>
					</ul>
				    </td-->				
				</tr>
				<?php 
				$i++;
				} ?>
			    </tbody>
			    </table>
			</div>
		    </div>
		</div>
		<?php } else { ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    Data not available.
		</div>
		<?php } ?>
	    </div>
	</div>
	<!-- END PAGE CONTENT-->
    </div>
</div>