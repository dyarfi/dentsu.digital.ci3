
<!-- Section: about -->
<section id="about" class="home-section text-left">
	<h4>CAMPAIGNS</h4>
	<ul>
	<?php foreach ($campaigns as $campaign => $list) { ?>
		<li>ID <?php echo $list['id'];?></li>
		<li>TITLE <?php echo $list['title'];?></li>
	<?php } ?>
	</ul>
</section>
<!-- /Section: about -->
