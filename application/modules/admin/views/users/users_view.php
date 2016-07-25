<!-- BEGIN CONTENT -->
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
					<div class="modal-body">Widget settings form goes here</div>
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
			<div class="toggler"></div>
			<div class="toggler-close"></div>
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
				<h3 class="page-title">
					User Profile <small><?php $this->acl->user()->name;?></small>
				</h3>
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
									Another action
								</a>
							</li>
							<li>
								<a href="#">
									Something else here
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
						<a href="<?=base_url();?>admin/dashboard">
							Home
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url();?>admin/user">
							Users
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							User Profile
						</a>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row profile">
			<div class="col-md-12">
				<!--BEGIN TABS-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active">
							<a data-toggle="tab" href="#tab_1_1">Overview</a>
						</li>
						<li>
							<a data-toggle="tab" href="#tab_1_3">Account</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="tab_1_1" class="tab-pane active">
							<div class="row">
								<!--div class="col-md-4 col-lg-4">
									<ul class="list-unstyled profile-nav">
										<li>
											<?php /*
											<?php echo form_open_multipart(base_url(ADMIN.'user/upload'), array('id'=>'fileUploadForm'));?>
											<div class="img_holder_xhr">
												<div class="img-thumbnail">
													<a href="#" class="handle-img">
													<?php if (empty($user_profile->file_name)) { ?>
														<img alt="" src="<?=base_url($upload_url.'users_default.png');?>">							
													<?php } else {?>
														<img alt="" src="<?=base_url($upload_url.$user_profile->file_name);?>">
													<?php } ?>
													</a>
												</div>
											</div>
											<!-- The global progress bar -->
											<div id="progress" class="progress" style="display:none;">
												<div class="progress-bar progress-bar-danger"></div>
											</div>
											<div class="fileUpload pull-left">
												<span class="btn btn-default">Change</span>
												<input class="upload" type="file" id="fileupload-img" name="fileupload" data-url="<?=base_url(ADMIN.'user/image');?>">
											</div>
											<input type="hidden" name="image_temp" value=""/>
											<div class="id-uploadsticker pull-right">
												<div class="text-center button-submit" style="display: none">
													<button type="submit" class="profile-edit btn btn-default">Save</button>
												</div>
											</div>
											<?php echo form_close(); ?>											
											*/ ?>											
										</li>
									</ul>
								</div-->
								<div class="col-md-8 col-lg-8">
									<div class="row">
										<div class="col-md-8 profile-info">
											<h1><?=$this->acl->user()->name;?></h1>
											<p><?=$user_profile->about;?></p>
											<p><a href="#"><?=$user_profile->website;?></a></p>
											<ul class="list-inline">
												<?php if(!empty($user_profile->phone)) { ?>
												<li><i class="fa fa-phone"></i> <?=$user_profile->phone;?></li>
												<?php } ?>
												<?php if(!empty($user_profile->mobile_phone)) { ?>
												<li><i class="fa fa-mobile-phone"></i> <?=$user_profile->mobile_phone;?></li>
												<?php } ?>		
												<?php if(!empty($user_profile->division)) { ?>												
												<li><i class="fa fa-briefcase"></i> <?=$user_profile->division;?></li>
												<?php } ?>												
											</ul>
										</div>
										<!--end col-md-8-->										
									</div>
									<!--end row-->
									<div class="tabbable tabbable-custom tabbable-custom-profile hidden">
										<ul class="nav nav-tabs">
											<li class="active">
												<a data-toggle="tab" href="#tab_1_11">
													 Latest Customers
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_1_22">
													 Feeds
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div id="tab_1_11" class="tab-pane active">
												<div class="portlet-body">
													<table class="table table-striped table-bordered table-advance table-hover">
													<thead>
													<tr>
														<th>
															<i class="fa fa-briefcase"></i> Company
														</th>
														<th class="hidden-xs">
															<i class="fa fa-question"></i> Description
														</th>
														<th>
															<i class="fa fa-bookmark"></i> Amount
														</th>
														<th>
														</th>
													</tr>
													</thead>
													<tbody>
													<tr>
														<td>
															<a href="#">
																 Pixel Ltd
															</a>
														</td>
														<td class="hidden-xs">
															 Server hardware purchase
														</td>
														<td>
															 52560.10$
															<span class="label label-success label-sm">
																 Paid
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs green-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 Smart House
															</a>
														</td>
														<td class="hidden-xs">
															 Office furniture purchase
														</td>
														<td>
															 5760.00$
															<span class="label label-warning label-sm">
																 Pending
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs blue-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 FoodMaster Ltd
															</a>
														</td>
														<td class="hidden-xs">
															 Company Anual Dinner Catering
														</td>
														<td>
															 12400.00$
															<span class="label label-success label-sm">
																 Paid
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs blue-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 WaterPure Ltd
															</a>
														</td>
														<td class="hidden-xs">
															 Payment for Jan 2013
														</td>
														<td>
															 610.50$
															<span class="label label-danger label-sm">
																 Overdue
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs red-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 Pixel Ltd
															</a>
														</td>
														<td class="hidden-xs">
															 Server hardware purchase
														</td>
														<td>
															 52560.10$
															<span class="label label-success label-sm">
																 Paid
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs green-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 Smart House
															</a>
														</td>
														<td class="hidden-xs">
															 Office furniture purchase
														</td>
														<td>
															 5760.00$
															<span class="label label-warning label-sm">
																 Pending
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs blue-stripe">
																 View
															</a>
														</td>
													</tr>
													<tr>
														<td>
															<a href="#">
																 FoodMaster Ltd
															</a>
														</td>
														<td class="hidden-xs">
															 Company Anual Dinner Catering
														</td>
														<td>
															 12400.00$
															<span class="label label-success label-sm">
																 Paid
															</span>
														</td>
														<td>
															<a href="#" class="btn default btn-xs blue-stripe">
																 View
															</a>
														</td>
													</tr>
													</tbody>
													</table>
												</div>
											</div>
											<!--tab-pane-->
											<div id="tab_1_22" class="tab-pane">
												<div id="tab_1_1_1" class="tab-pane active">
													<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div data-rail-visible1="1" data-always-visible="1" data-height="290px" class="scroller" style="overflow: hidden; width: auto; height: 290px;">
														<ul class="feeds">
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="fa fa-bell-o"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 You have 4 pending tasks.
																				<span class="label label-danger label-sm">
																					 Take action <i class="fa fa-share"></i>
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 Just now
																	</div>
																</div>
															</li>
															<li>
																<a href="#">
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 New version v1.4 just lunched!
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 20 mins
																		</div>
																	</div>
																</a>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-danger">
																				<i class="fa fa-bolt"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 Database server #12 overloaded. Please fix the issue.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 24 mins
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 30 mins
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 40 mins
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-warning">
																				<i class="fa fa-plus"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New user registered.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 1.5 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="fa fa-bell-o"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 Web server hardware needs to be upgraded.
																				<span class="label label-inverse label-sm">
																					 Overdue
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 2 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-default">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 3 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-warning">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 5 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 18 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-default">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 21 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 22 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-default">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 21 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 22 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-default">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 21 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 22 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-default">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 21 hours
																	</div>
																</div>
															</li>
															<li>
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-info">
																				<i class="fa fa-bullhorn"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				 New order received. Please take care of it.
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		 22 hours
																	</div>
																</div>
															</li>
														</ul>
													</div><div class="slimScrollBar" style="background: none repeat scroll 0% 0% rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
												</div>
											</div>
											<!--tab-pane-->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--tab_1_2-->
						<div id="tab_1_3" class="tab-pane">
							<div class="row profile-account">
								<div class="col-md-3">
									<ul class="ver-inline-menu tabbable margin-bottom-10">
										<li class="active">
											<a href="#tab_1-1" data-toggle="tab">
												<i class="fa fa-cog"></i> Personal info
											</a>
											<span class="after">
											</span>
										</li>
										<!--li>
											<a href="#tab_2-2" data-toggle="tab">
												<i class="fa fa-picture-o"></i> Change Avatar
											</a>
										</li-->
										<li>
											<a href="#tab_3-3" data-toggle="tab">
												<i class="fa fa-lock"></i> Change Password
											</a>
										</li>
										<!--li>
											<a href="#tab_4-4" data-toggle="tab">
												<i class="fa fa-eye"></i> Privacy Settings
											</a>
										</li-->
									</ul>
								</div>
								<div class="col-md-9">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1-1">
											<form action="" method="POST" id="user-form" class="user-form">
												<input type="hidden" value="<?=$user_profile->user_id;?>" name="user_id"/>
												<div class="form-group">
													<label class="control-label">First Name</label>
													<input type="text" class="form-control" name="first_name" placeholder="<?=$user_profile->first_name;?>" value="<?=$user_profile->first_name;?>">
												</div>
												<div class="form-group">
													<label class="control-label">Last Name</label>
													<input type="text" class="form-control" name="last_name" placeholder="<?=$user_profile->first_name;?>" value="<?=$user_profile->last_name;?>">
												</div>												
												<div class="form-group">
													<label class="control-label">Phone Number</label>
													<input type="text" class="form-control" name="phone" placeholder="<?=$user_profile->phone;?>" value="<?=$user_profile->phone;?>">
												</div>
												<div class="form-group">
													<label class="control-label">Mobile Number</label>
													<input type="text" class="form-control" name="mobile_phone" placeholder="<?=$user_profile->mobile_phone;?>" value="<?=$user_profile->mobile_phone;?>">
												</div>
												<!--div class="form-group">
													<label class="control-label">Interests</label>
													<input type="text" class="form-control" placeholder="Design, Web etc.">
												</div-->
												<div class="form-group">
													<label class="control-label">Occupation</label>
													<input type="text" class="form-control" name="division" placeholder="<?=$user_profile->division;?>" value="<?=$user_profile->division;?>">
												</div>
												<div class="form-group">
													<label class="control-label">About</label>
		<textarea name="about" placeholder="<?=$user_profile->about;?>" rows="3" cols="5" class="form-control"><?=$user_profile->about;?></textarea>
												</div>
												<div class="form-group">
													<label class="control-label">Website</label>
													<input name="website" type="text" class="form-control" placeholder="<?=$user_profile->website;?>" value="<?=$user_profile->website;?>">
												</div>
												<div class="form-group">
													<label class="control-label">Captcha <a class="reload_captcha" rel="<?=base_url()?>admin/user/reload_captcha" href="javascript:;"><?php echo $captcha['image'];?></a></label>
													<input name="captcha" type="text" class="form-control" placeholder="Captcha" value="">
												</div>																							
												<div class="row margiv-top-10">
													<div class="col-md-4 col-lg-4 col-xs-4 pull-left">
														<button class="btn green">
															 Save Changes
														</button>
													</div>
													<!--button class="btn default">
														 Cancel
													</button-->
													<div class="col-md-8 col-lg-8 col-xs-7 pull-right">
														<div class="msg"></div>
													</div>
												</div>
											</form>
										</div>
										<div class="tab-pane hidden" id="tab_2-2">
											<p>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
											</p>
											<form role="form" action="#" id="" class="user-form">
												<div class="form-group">
													<div style="width: 310px;" class="thumbnail">
														<img alt="" src="http://www.placehold.it/310x170/EFEFEF/AAAAAA&amp;text=no+image">
													</div>
													<div data-provides="fileupload" class="margin-top-10 fileupload fileupload-new">
														<div class="input-group input-group-fixed">
															<span class="input-group-btn">
																<span class="uneditable-input">
																	<i class="fa fa-file fileupload-exists"></i>
																	<span class="fileupload-preview">
																	</span>
																</span>
															</span>
															<span class="btn default btn-file">
																<span class="fileupload-new">
																	<i class="fa fa-paper-clip"></i> Select file
																</span>
																<span class="fileupload-exists">
																	<i class="fa fa-undo"></i> Change
																</span>
																<input type="file" class="default">
															</span>
															<a data-dismiss="fileupload" class="btn red fileupload-exists" href="#">
																<i class="fa fa-trash-o"></i> Remove
															</a>
														</div>
													</div>
													<span class="label label-danger">
														 NOTE!
													</span>
													<span>
														 Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
													</span>
												</div>
												<div class="margin-top-10">
													<a class="btn green" href="#">
														 Submit
													</a>
													<a class="btn default" href="#">
														 Cancel
													</a>
												</div>
											</form>
										</div>
										<div class="tab-pane" id="tab_3-3">
										<form action="#" id="user-form-password" class="user-form-password">											<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?=$user->id;?>">	
											<input type="hidden" name="username" value="<?=$user->username;?>">
											<input type="hidden" name="email" value="<?=$user->email;?>">
											<input type="hidden" name="user_id" value="<?=$user->id;?>"/>
											<!--div class="form-group">
												<label class="control-label">Current Password</label>
												<input type="password" class="form-control" name="password" id="password" value="">
											</div-->
											<div class="form-group">
												<label class="control-label">New Password</label>
												<input type="password" class="form-control" name="password1" id="password1" value="">
											</div>
											<div class="form-group">
												<label class="control-label">Re-type New Password</label>
												<input type="password" class="form-control" name="password2" id="password2" value="">
											</div>
											<div class="margin-top-10">
												<button type="submit" class="btn green"> Change Password </button>
												<!--a class="btn default" href="#">Cancel</a-->
												<div class="col-md-8 col-lg-8 col-xs-7 pull-right">
													<div class="msg"></div>
												</div>
											</div>
										</form>
										</div>
										<div class="tab-pane hidden" id="tab_4-4">
											<form action="#">
												<table class="table table-bordered table-striped">
												<tbody><tr>
													<td>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..</td>
													<td>
														<label class="uniform-inline">
														<div class="radio"><span><input type="radio" value="option1" name="optionsRadios1"></span></div>
														Yes </label>
														<label class="uniform-inline">
														<div class="radio"><span class="checked"><input type="radio" checked="" value="option2" name="optionsRadios1"></span></div>
														No </label>
													</td>
												</tr>
												<tr>
													<td>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</td>
													<td>
														<label class="uniform-inline">
														<div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
													</td>
												</tr>
												<tr>
													<td>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</td>
													<td>
														<label class="uniform-inline">
														<div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
													</td>
												</tr>
												<tr>
													<td>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</td>
													<td>
														<label class="uniform-inline">
														<div class="checker"><span><input type="checkbox" value=""></span></div> Yes </label>
													</td>
												</tr>
												</tbody></table>
												<!--end profile-settings-->
												<div class="margin-top-10">
													<a class="btn green" href="#"> Save Changes</a>
													<a class="btn default" href="#"> Cancel</a>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!--end col-md-9-->
							</div>
						</div>
						<!--end tab-pane-->
						<div id="tab_1_4" class="tab-pane hidden">
							<div class="row">
								<div class="col-md-12">
									<div class="add-portfolio">
										<span>502 Items sold this week</span>
										<a class="btn icn-only green" href="#">
											 Add a new Project <i class="m-icon-swapright m-icon-white"></i>
										</a>
									</div>
								</div>
							</div>
							<!--end add-portfolio-->
							<div class="row portfolio-block">
								<div class="col-md-5">
									<div class="portfolio-text">
										<img alt="" src="<?=base_url();?>assets/img/profile/portfolio/logo_metronic.jpg">
										<div class="portfolio-text-info">
											<h4>Metronic - Responsive Template</h4>
											<p> Lorem ipsum dolor sit consectetuer adipiscing elit.</p>
										</div>
									</div>
								</div>
								<div class="col-md-5 portfolio-stat">
									<div class="portfolio-info">
										 Today Sold
										<span>
											 187
										</span>
									</div>
									<div class="portfolio-info">
										 Total Sold
										<span>
											 1789
										</span>
									</div>
									<div class="portfolio-info">
										 Earns
										<span>
											 $37.240
										</span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="portfolio-btn">
										<a class="btn bigicn-only" href="#">
											<span>
												 Manage
											</span>
										</a>
									</div>
								</div>
							</div>
							<!--end row-->
							<div class="row portfolio-block">
								<div class="col-md-5 col-sm-12 portfolio-text">
									<img alt="" src="<?=base_url();?>assets/img/profile/portfolio/logo_azteca.jpg">
									<div class="portfolio-text-info">
										<h4>Metronic - Responsive Template</h4>
										<p>
											 Lorem ipsum dolor sit consectetuer adipiscing elit.
										</p>
									</div>
								</div>
								<div class="col-md-5 portfolio-stat">
									<div class="portfolio-info">
										 Today Sold
										<span>
											 24
										</span>
									</div>
									<div class="portfolio-info">
										 Total Sold
										<span>
											 660
										</span>
									</div>
									<div class="portfolio-info">
										 Earns
										<span>
											 $7.060
										</span>
									</div>
								</div>
								<div class="col-md-2 col-sm-12 portfolio-btn">
									<a class="btn bigicn-only" href="#">
										<span>
											 Manage
										</span>
									</a>
								</div>
							</div>
							<!--end row-->
							<div class="row portfolio-block">
								<div class="col-md-5 portfolio-text">
									<img alt="" src="<?=base_url();?>assets/img/profile/portfolio/logo_conquer.jpg">
									<div class="portfolio-text-info">
										<h4>Metronic - Responsive Template</h4>
										<p>
											 Lorem ipsum dolor sit consectetuer adipiscing elit.
										</p>
									</div>
								</div>
								<div class="col-md-5 portfolio-stat">
									<div class="portfolio-info">
										 Today Sold
										<span>
											 24
										</span>
									</div>
									<div class="portfolio-info">
										 Total Sold
										<span>
											 975
										</span>
									</div>
									<div class="portfolio-info">
										 Earns
										<span>
											 $21.700
										</span>
									</div>
								</div>
								<div class="col-md-2 portfolio-btn">
									<a class="btn bigicn-only" href="#">
										<span>
											 Manage
										</span>
									</a>
								</div>
							</div>
							<!--end row-->
						</div>
						<!--end tab-pane-->
						<div id="tab_1_6" class="tab-pane hidden">
							<div class="row">
								<div class="col-md-3">
									<ul class="ver-inline-menu tabbable margin-bottom-10">
										<li class="active">
											<a href="#tab_1" data-toggle="tab">
												<i class="fa fa-briefcase"></i> General Questions
											</a>
											<span class="after">
											</span>
										</li>
										<li>
											<a href="#tab_2" data-toggle="tab">
												<i class="fa fa-group"></i> Membership
											</a>
										</li>
										<li>
											<a href="#tab_3" data-toggle="tab">
												<i class="fa fa-leaf"></i> Terms Of Service
											</a>
										</li>
										<li>
											<a href="#tab_1" data-toggle="tab">
												<i class="fa fa-info-circle"></i> License Terms
											</a>
										</li>
										<li>
											<a href="#tab_2" data-toggle="tab">
												<i class="fa fa-tint"></i> Payment Rules
											</a>
										</li>
										<li>
											<a href="#tab_3" data-toggle="tab">
												<i class="fa fa-plus"></i> Other Questions
											</a>
										</li>
									</ul>
								</div>
								<div class="col-md-9">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											<div class="panel-group" id="accordion1">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse in" id="accordion1_1">
														<div class="panel-body">
															 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_2">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_3">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-warning">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_4">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-danger">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_5" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_5">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_6" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_6">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion1_7" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
															 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion1_7">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_2">
											<div class="panel-group" id="accordion2">
												<div class="panel panel-warning">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse in" id="accordion2_1">
														<div class="panel-body">
															<p>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</p>
															<p>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</p>
														</div>
													</div>
												</div>
												<div class="panel panel-danger">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_2">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_3">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_4">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_5">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_6" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_6">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion2_7" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
															 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion2_7">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_3">
											<div class="panel-group" id="accordion3">
												<div class="panel panel-danger">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse in" id="accordion3_1">
														<div class="panel-body">
															<p>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
															</p>
															<p>
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
															</p>
															<p>
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</p>
														</div>
													</div>
												</div>
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_2">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_3">
														<div class="panel-body">
															 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_4">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_5" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_5">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_6">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a href="#accordion3_7" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle">
															 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
														</a>
														</h4>
													</div>
													<div class="panel-collapse collapse" id="accordion3_7">
														<div class="panel-body">
															 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end tab-pane-->
					</div>
				</div>
				<!--END TABS-->
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>	