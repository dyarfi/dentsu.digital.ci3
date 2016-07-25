<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php //echo $page_title; ?></title>	
	<script type="text/javascript">
		var base_URL = '<?php echo base_url();?>';
	</script>
</head>
<body>
<?php $this->load->view($main); ?>
<!-- Core JavaScript Files -->
<script src="<?php echo base_url();?>assets/public/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/public/js/jquery.easing.min.js"></script>	
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>assets/public/js/custom.blank.js"></script>	
<script type="text/javascript">
jQuery(document).ready(function() {     
  Blank.init();
});
</script>		
</body>
</html>