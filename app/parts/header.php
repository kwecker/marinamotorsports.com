<?php

	$title = "Marina Motorsports";

	if ($section != 'Home') {
		if (isset($subsection)) {
			$title = $subsection . ' | ' . $title;
		} else {
			$title = $section . ' | ' . $title;
		}
	}

	$nav = array(
		'Home' => '/',
		'Events' => '/events/',
		'Calendar' => '/calendar/',
		'Sponsors' => '/sponsors/',
		'Charities' => '/charities/',
		'Merchandise' => '/merchandise/',
		'Gallery' => '/gallery/',
		'Media' => '/media/',
		'Links' => '/links/',
		'Contact Us' => '/contact/'
	);

	function makeNavItems($items, $current) {
		foreach ($items as $name => $link) {
			$active = ($current == $name) ? ' active' : '';
			echo "<li class=\"menu__item\"><a href=\"$link\" class=\"menu__link$active\">$name</a></li>";
		}
	}

	function makeSplitNav($items, $current="") {
		// This splits the navigation into two equal lists.
		$count = count($items);
		$menus = array(
			'left' => array_slice($items, 0, $count/2),
			'right' => array_slice($items, $count/2)
		);

		foreach ($menus as $pos => $items) {
			echo "<ul class=\"menu menu--$pos\">";
			makeNavItems($items, $current);
			echo '</ul>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>

	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
	<!-- build:css(app) /css/main.min.css -->
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/slick.css">
	<link rel="stylesheet" href="/css/chocolat.css">
	<link rel="stylesheet" href="/css/main.css">
	<!-- endbuild -->
</head>
<body>

<div class="main-wrapper">

	<header class="main-header">
		<nav id="main-navigation" class="group">
			<?php makeSplitNav($nav, $section); ?>
		</nav>

		<div class="masthead">
			<span class="tagline tagline--left"><img src="/images/tag-left.png" alt="Wheels in Motion" width="294" height="35"></span>
			<div class="logo"><h1><a href="/"><img src="/images/logo.png" alt="Marina Motorsports"></a></h1></div>
			<span class="tagline tagline--right"><img src="/images/tag-right.png" alt="for Community Benefit" width="330" height="36"></span>
		</div>
	</header>

	<section id="call-to-action">
		<?php
			perch_content_create("Header Slideshow", array(
				'template'=> 'slideshow.html',
				'multiple' => true,
				'edit-mode' => 'singlepage',
				'shared' => true
			));
		?>
		<section class="slideshow">
			<?php perch_content("Header Slideshow"); ?>
		</section>
		<aside class="sidebar sidebar--top">
			<div class="wrap">
				<figure class="register-badge">
					<a href="/registration/">
						<img src="/images/little-car-show-badge.png" alt="The Little Car Show | Pacific Grove, CA" width="238" height="90">
						<figcaption>
							Click here to Register Your Car for the <?php perch_content("Event Year"); ?> The Little Car Show!
						</figcaption>
					</a>
				</figure>
				<p>
					The complete list of events that Marina Motorsports, Inc. is involved with on the Monterey Peninsula is listed on our <a href="/calendar/">calendar</a> page.
				</p>
			</div>
		</aside>
	</section>

	<aside class="ticker">
		<span>The Little Car Show / Wednesday, August 16, 2017</span>
	</aside>

	<section class="main-content">