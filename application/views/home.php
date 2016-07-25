<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
/*
* This is when user already participated
*/
if ($gallery) { ?>
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
}
?>