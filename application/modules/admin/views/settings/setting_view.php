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
                                    <?php echo $page_title;?>
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
						<a href="<?=base_url(ADMIN);?>/admin/dashboard">
							Home
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?=base_url(ADMIN);?>/usergroups/index">
							Settings
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							<?php echo $page_title;?>
						</a>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    	<?php echo form_open(base_url(ADMIN.$class_name.'/edit/'.$param),['id'=>$class_name.'-form','class'=>'form-horizontal','enctype'=>'multipart/form-data','role'=>'form','method'=>'GET']);?>
                            <div class="form-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Parameter:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo $listing->parameter;?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Alias:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo $listing->alias;?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Value:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo $listing->value;?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Added:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo date('Y-m-d', $listing->added);?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Modified:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo date('Y-m-d', $listing->modified);?>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-4">Status:</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static">
                                                        <?php echo $statuses[$listing->status];?>
                                                    </p>
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
                                            <button type="submit" class="btn green"><i class="fa fa-pencil"></i> Edit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                   		<?php echo form_close();?>
                    <!-- END FORM-->
                </div>
		<!-- END PAGE CONTENT-->
	</div>
</div>	