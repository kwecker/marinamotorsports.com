<?php

$section = 'Home';

include('perch/runtime.php');
perch_layout('global.header', array( 'section' => $section ));

?>

<section class="main-content">
	<section class="content">
		<div class="wrap">
			<header>
				<h1>Welcome to Marina Motorsports, Inc.</h1>
			</header>
			<section class="text" id="intro">
				<p>
					Marina Motorsports was first formed in 1995 with the partnership of five automotive enthusiasts. Over the years board members have come and gone, but three of the original founding members remain, Robert McCaffrey, John Moulton and David Murphy. Our fourth long standing board member is Ronald Cowen. Marina Motorsports became registered as a non-profit 501 (c) (4) corporation in 1996.
				</p>
				<p>
					Marina Motorsports, Inc. is a non-profit organization. Our primary goal is to provide family oriented automotive related activities while benefiting local service clubs, other non-profit organizations and the City of Marina.
				</p>
				<p>
					We patterned our by-laws and our operation after Sports Car Racing Association Monterey Peninsula. SCRAMP hosts major automotive and motorcycle events at Monterey county’s Laguna Seca. We have hosted smaller events such as go-kart racing, autocrossing, driving schools and automotive swap meets at Marina Municipal Airport, the former Fort Ord’s Fritsche Field. Our goals are the same in that we provide a motorsport venue to allow other service groups such the Boy and Girl Scouts, Kiwanis, Rotary, etc. to benefit. Our slogan says it all: <strong><em>“Wheels in Motion for Community Benefit”</em></strong>.
				</p>
			</section>

			<section id="gallery">
				<header>
					<h2>The Little Car Show Gallery</h2>
				</header>

			</section>
		</div>
	</section>

	<aside class="sidebar sidebar--main">
		<div class="wrap">
			<div class="button">
				<img src="" alt="">
				<span class="text">Free Swap Meets!</span>
			</div>
			<div class="button">
				<img src="" alt="">
				<span class="text">AutoX</span>
			</div>
		</div>
	</aside>
</section>

<?php perch_layout('global.footer', array( 'section' => $section )); ?>
