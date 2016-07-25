<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
@media (min-width:980px) {
  body { padding-top: 60px; }
}
.main-block { margin: 180px auto 360px auto; }
.main-box { margin: 100px auto 100px auto; }
.canvas-container { margin: 0 auto; float: none; border: 5px solid #aaa; overflow: hidden; }
.menu { margin-bottom: 20px; }
.menu img { margin-bottom: 10px; cursor: pointer; border: 1px solid white; }
.menu img:hover{ border: 1px solid green; }
.thumb { height: 70px; }
.msg { margin: 10px auto 10px auto; }
.li-participated { position:relative; }
.participated { display:none;padding:2px;position:absolute;bottom:0;left:0;right:0;z-index:1;background:#f2f2f2;width:auto;margin 0 auto;word-wrap:break-word; font-size: 0.9em}
</style>
<?php
/*
* This is when user already participated
*/
if ($gallery && $attachment) { ?>
<div class="container">
  <div class="text-center main-block">
    <h4>Gallery</h4>
    <div class="row-fluid" style="margin:170px auto">
      <ul class="list-unstyled list-inline">
        <?php foreach ($gallery as $img) { ?>    
        <li class="li-participated">
          <a href="<?php echo base_url('uploads/gallery/'.$img->file_name);?>" id="fancybox" title="<?php echo $this->Participants->getParticipant($img->participant_id)->email;?>">
            <img class="img-responsive" style="max-height:220px;<?php if ($attachment->id == $img->id) { echo 'border:2px dashed red;'; } ?>" src="<?php echo base_url('uploads/gallery/'.$img->file_name);?>"/>
          </a>
          <div class="participated">
            <?php echo $this->Participants->getParticipant($img->participant_id)->email;?>
          </div>          
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>
<?php
} else {
/*
* This is when user not yet participated
*/
?>
<div class="container">
  <!-- Page Content -->       
  <div class="row-fluid">
    <div class="center-block">
      <div class="text-center main-block">
        <?php if ($this->logged_in) { ?>
        <div class="center-block clearfix main-handler">      
          <div class="row menu item-handler" style="display:none">                        
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#moustaches" aria-controls="moustaches" role="tab" data-toggle="tab"><strong>Moustaches</strong></a></li>
              <li role="presentation"><a href="#glasses" aria-controls="glasses" role="tab" data-toggle="tab"><strong>Glasses</strong></a></li>
              <li role="presentation"><a href="#hairs" aria-controls="hairs" role="tab" data-toggle="tab"><strong>Hairs</strong></a></li>
              <!-- <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="moustaches">
                <div class="well">                              
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-1.png');?>" title="moustaches-1">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-2.png');?>" title="moustaches-2">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-3.png');?>" title="moustaches-3">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-4.png');?>" title="moustaches-4">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-5.png');?>" title="moustaches-5">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/moustaches/moustaches-6.png');?>" title="moustaches-6">
                </div>  
              </div>
              <div role="tabpanel" class="tab-pane" id="glasses">
                <div class="well">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-1.png');?>" title="glasses-1">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-2.png');?>" title="glasses-2">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-3.png');?>" title="glasses-3">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-4.png');?>" title="glasses-4">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-5.png');?>" title="glasses-5">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/glasses/glasses-6.png');?>" title="glasses-6">
                </div>  
              </div>
              <div role="tabpanel" class="tab-pane" id="hairs">
                <div class="well">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-1.png');?>" title="hairs-1">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-2.png');?>" title="hairs-2">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-3.png');?>" title="hairs-3">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-4.png');?>" title="hairs-4">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-5.png');?>" title="hairs-5">
                  <img class="thumb" src="<?php echo base_url('assets/static/fabric_assets/hairs/hair-6.png');?>" title="hairs-6">
                </div>
              </div>
              <!-- <div role="tabpanel" class="tab-pane" id="settings">...</div> -->
            </div>                      
            <div class="col-lg-12">
              <textarea id="canvaText" rows="3" class="form-control"></textarea>                              
              <button id="addText" class="btn btn-warning btn-small">Add text</button>
              <button id="saveToPng" class="btn btn-primary">Save to Jpeg</button>
              <button id="delete" class="btn btn-danger">Delete selected object</button>
            </div> 
          </div> <!-- /row -->
          <div class="row-fluid" id="canva-row">
            <canvas id="canvas"></canvas>
          </div> <!-- /row -->
          <div class="col-xs-12 cari-foto vag-font">
<!--div class="img_holder_xhr">
<div class="img-thumbnail">
<a href="#" class="colorbox"><img src="<?php echo base_url('assets/static/img/250x250.jpg');?>" class="img-rounded" alt="Upload"></a>
</div>
</div-->
<div class="text-center">
  <div class="container-fluid">
    <!-- The global progress bar -->
    <div id="progress" class="progress" style="display:none;">
      <div class="progress-bar progress-bar-danger"></div>
    </div>
  </div>
</div>
<div class="center-block">
  <div class="fileUpload label label-danger">
    <label class="cari-foto-color">Browse File</label>
    <input class="upload" type="file" id="fileupload" name="fileupload" data-url="<?=base_url('upload/image');?>"/>
  </div>
</div>
<input type="hidden" name="image_temp" value="" id="image_temp">
<div class="text-center button-submit" style="display: none; text-align:center; margin: 12px -33px 0px 0px;">
  <?php //echo form_open('#');?>
  <?php echo form_submit(['type'=>'submit','value'=>'KIRIM','id'=>'send_image','class'=>"btn btn-danger submit-color"]);?>
  <div class="msg"></div>
  <?php //echo form_close();?>  
</div>
</div>    
</div>     
<?php } else { ?>  
<div class="row-fluid" style="margin:200px auto 300px auto; ">
  <div class="center-block">
    <div class="text-center main-block">
      <div class="center-block clearfix main-box">
        <?php echo form_open('',['class'=>'form-inline','id'=>'submit_email']);?>
        <h3>Please Input your Email first...</h3>
        <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'email@d3.dentsu.co.id']);?>
        <?php echo form_submit(['type'=>'submit', 'name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary']);?>
        <div class="msg"></div>
        <?php echo form_close();?>
      </div>
    </div>    
  </div>
</div>    
<?php } ?>
</div>                
</div>
</div>
<!-- /.row -->
</div>
<?php
}
?>