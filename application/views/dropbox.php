<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style type="text/styelsheet">
@media (min-width:980px) {
  body { /*padding-top: 60px;*/ }
}
.main-block { margin: 180px auto 360px auto; }
.main-box { margin: 100px auto 100px auto; display: inline-block; }
.canvas-container { margin: 0 auto; float: none; border: 5px solid #aaa; overflow: hidden; }
.menu { margin-bottom: 20px; }
.menu img { margin-bottom: 10px; cursor: pointer; border: 1px solid white; }
.menu img:hover{ border: 1px solid green; }
.thumb { height: 70px; }
.msg { margin: 10px auto 10px auto; }
</style>
<div class="container">
   <div class="center-block">
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
          <a href="<?php echo $img->file_name;?>" id="fancybox" title="<?php echo $this->Participants->getParticipant($img->participant_id)->email;?>">
            <img class="img-responsive" style="max-height:220px;<?php if ($attachment->id == $img->id) { echo 'border:2px dashed red;'; } ?>" src="<?php echo $img->file_name;?>"/>
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
      <?php if ($this->logged_in) { ?>
      <div class="text-center main-block" style="margin:100px auto 180px auto;">
          <div class="demo-frame">
            <div class="demo-container" id="file-handler">
              <img id="img_tracking" src="<?php echo base_url('uploads/gallery/faces.jpg');?>" />
              <!-- <img id="img_tracking" src="<?php echo base_url('uploads/gallery/10275287_875775332540613_4181229518108083063_o_612.jpg');?>" /> -->
            </div>          
          </div>
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
                <div class="text-center button-submit" id="submit-button" style="display: none; text-align:center; margin: 12px -33px 0px 0px;">
                    <?php echo form_submit(['type'=>'submit','value'=>'KIRIM','id'=>'send_image','class'=>"btn btn-primary submit-color"]);?>
                    <div class="msg"></div>
                </div>
            </div>          
          <div class="center-block handler-text"><h3></h3></div>
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

<?php } ?>
      

  </div>
  <style>
  .rect {
    border: 2px solid #a64ceb;
    left: -1000px;
    position: absolute;
    top: -1000px;
  }
  /*#img_tracking {*/
    /*position: absolute;*/
    /*top: 50%;*/
    /*left: 50%;*/
    /*margin: -173px 0 0 -300px;*/
  /*}*/
  </style>
  <script type="text/javascript"></script>
  <!-- /.container -->
</div>    