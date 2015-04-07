
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			
			echo $this->fetch('meta');
			
			echo $this->Html->css('bootstrap.min');
			echo $this->Html->css('bootstrap-responsive.min');
			echo $this->Html->css('core');
			
			echo $this->fetch('css');
			echo $this->Html->css('default');
			echo $this->Html->script('libs/jquery');
			echo $this->Html->script('libs/bootstrap.min');
			
			echo $this->fetch('script');
		?>
	</head>

	<body>

		<div id="main-container">
		
			<div id="header" class="container">
			</div><!-- #header .container -->
			
			<div id="content" class="container well">
			
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div><!-- #header .container -->
			
			<div id="footer" class="container">
				<?php //Silence is golden ?>
			</div><!-- #footer .container -->
			
		</div><!-- #main-container -->
		
	</body>

</html>
