<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	
	<head>	
		<title><?php echo $titre; ?></title>

		<meta http-equiv="Content-Type" content="text/html; charset= <?php echo $charset; ?>"/>

		<!-- Style import -->
		<?php foreach ($css as $url): ?>
				<link rel="stylesheet" type="text/css" media="screen" href='<?php echo $url ?>'/>
		<?php endforeach; ?>

		<!-- Js import-->
		<?php foreach ($js as $url):?>
				<script type="text/javascript" src="<?php echo $url; ?>"></script>
		<?php endforeach ?>

	</head>

	<body>
		<div id="content">
			<?php echo $output; ?>	
		</div>
		<div id='footer3'> 
		</div>
		<div id="text_footer">
			<p>Maxence Chauvet - Nicolas Klein - Tayfun Yilmaz© 2017</p>
		</div>
	</body>
</html>