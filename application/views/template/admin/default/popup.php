<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<?php foreach ($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<style type='text/css'>
body {
	font-family: Arial;
	font-size: 14px;
}
a {
	color: blue;
	text-decoration: none;
	font-size: 14px;
}
a:hover {
	/*text-decoration: underline;*/ text-decoration: none;
}
</style>
</head>
<body>
<?php echo $output; ?>
<?php foreach ($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php echo $js_inline;?>
</body>
</html>