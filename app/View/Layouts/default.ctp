<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php echo __('PHP Workbook'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="PHP Workbook">
	<meta name="author" content="PHP,workbook,programming,begginer,quiz,プログラミング,初心者,練習帳,練習問題">

	<!-- Le styles -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
	</style>
	<?php echo $this->Html->css('bootstrap-responsive.min'); ?>
	
    <?php echo $this->Html->css('prettify'); ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<!--
	<link rel="shortcut icon" href="/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
	-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo __('PHP Workbook'); ?></a>
				<div class="nav-collapse">
					<ul class="nav">
                        <li class="divider-vertical"></li>
						<li><a href="/questions/">Questions</a></li>
                        <li class="divider-vertical"></li>
						<li><a href="/answers/">Answers</a></li>
                        <li class="divider-vertical"></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div> <!-- /container -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php echo $this->Html->script('prettify'); ?>
	<?php echo $this->Html->script('bootstrap.min'); ?>
    <!-- google pretty -->
    <?php $this->Html->scriptStart(array('inline'=>false)); ?>
        prettyPrint();
    <?php $this->Html->scriptEnd(); ?>
    <!-- google analytics -->
    <?php $this->Html->scriptStart(array('inline'=>false)); ?>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-39714116-1', 'af.cm');
        ga('send', 'pageview');
    <?php $this->Html->scriptEnd(); ?>
	<?php echo $this->fetch('script'); ?>

</body>
</html>
