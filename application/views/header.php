<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" media="screen" type="text/css" title="Style" href="<?= base_url(); ?>assets/css/style.css" />
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.png" type="image/png">
	<?php 
		if (isset($pageTitle)) {
			$pageTitle .= ' - Vehicles in Nepal';
		} else {
			$pageTitle = 'Vehicles in Nepal'; 
		}
	?>
	<title><?php echo $pageTitle; ?></title>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
</head>

<body>
	<!-- HEADER -->
	<div id="header"></div>		
	<div id="content-top-shadow"></div>
	<!-- TABS -->
	<div id="navbar">
		<ul id="tabs">
			<li id="home" class='<?= ($this->uri->segment(1) === 'home') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>" title="Home">Home</a>
			</li>
			<li id="roads" class='<?= ($this->uri->segment(1) === 'roads') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>roads" title="Roads">Roads</a>
			</li>
			<li id="vehicles" class='<?= ($this->uri->segment(1) === 'vehicles') ? 'current' : ''?>'> 
				<a href="<?= base_url() ?>vehicles" title="Vehicles">Vehicles</a>
			</li>
			<li id="accidents" class='<?= ($this->uri->segment(1) === 'accidents') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>accidents" title="Accidents">Accidents</a>
			</li>
			<li id="resources" class='<?= ($this->uri->segment(1) === 'resources') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>resources" title="Resources">Resources</a>
			</li>
			<li id="about" class='<?= ($this->uri->segment(1) === 'about') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>about" title="About">About</a>
			</li>
			<li id="contact" class='<?= ($this->uri->segment(1) === 'contact') ? 'current' : ''?>'>
				<a href="<?= base_url() ?>contact" title="Contact">Contact</a>
			</li>
		</ul>
	<!-- END OF TABS -->
	</div>