<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|',true,right);bloginfo('name');?></title>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
	<link rel="stylesheet" type="text/css" href=<?php echo get_stylesheet_uri();?>>
	<link rel="shortcut icon" href="favicon.icon">
	<?php if (is_singular()) wp_enqueue_script("comment-reply"); ?>

</head>
<body>
	<div class="firstViewArea">
		<div class="topLink">
		<a href="<?php echo home_url('/');?>"><img src="<?php echo get_stylesheet_directory_uri();?>/img/logo_1.png" class="logo"></a>
		<h1 class="title"><a href="<?php echo home_url('/');?>"><?php bloginfo('name');?></a></h1>
		</div>
		<div class="pattern"></div>
		<video autoplay muted loop id="backgroundVideo" >
		<source src="<?php echo get_stylesheet_directory_uri();?>/videos/alice_demo.mp4" type="video/mp4">
		</video>
	</div>
	<div id="header">
		<div class="container">
		<?php wp_nav_menu();?>
		</div>
	</div>
	<!-- header -->