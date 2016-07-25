<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div>
	<?php foreach ($pages as $page) { ?>
		<div><h2><a href="<?php echo base_url($menu.'/page/'.$page->name);?>"><?php echo $page->subject;?></a></h2></div>
	<?php } ?>
</div>