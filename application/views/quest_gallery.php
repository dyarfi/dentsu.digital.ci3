<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
//print_r($questionnaires);
?>
<div class="row-fluid marginbot-50">

<br/><br/><br/><br/>
  <h4>Questionnaires Result</h4>

    <?php echo form_open('',['class'=>'form-horizontal']);?>
      <select name="quests" id="index_quest" class="form-control"/>
            <option value="">----- PILIH -----</option>            
            <?php 
            $i=1;
            foreach($questionnaires as $questionnaire) { ?>
              <option data-rel="<?php echo strip_tags($questionnaire->questionnaire_text);?>" value="<?php echo $questionnaire->id;?>" <?php echo ($i==1 ? '' : '');?>>
                <?php echo strip_tags($questionnaire->questionnaire_text);?>
              </option>
            <?php 
            $i++;
            }
            ?>
      </select>
    <?php echo form_close();?>

  <div id="chart2" style="padding:250px 0px;margin:40px 0; clear: both; position: relative;"></div>

</div>
