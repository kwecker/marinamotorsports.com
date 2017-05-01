<?php
$section = 'Gallery';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Gallery</h1>
				</header>
				<section class="text" id="intro">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");
					?>

					<section class="gallery-grid">
						<div class="gallery-grid__button square-button">
							<a href="#">
								<img src="../images/gallery/thumbs/2016.jpg" alt="" width="272" height="168">
								<span class="text">The Little Car Show 2016</span>
							</a>
						</div>
						<div class="gallery-grid__button square-button">
							<a href="#">
								<img src="../images/gallery/thumbs/2015.jpg" alt="" width="272" height="168">
								<span class="text">The Little Car Show 2015</span>
							</a>
						</div>
						<div class="gallery-grid__button square-button">
							<a href="#">
								<img src="../images/gallery/thumbs/2014.jpg" alt="" width="272" height="168">
								<span class="text">The Little Car Show 2014</span>
							</a>
						</div>
						<div class="gallery-grid__button square-button">
							<a href="#">
								<img src="../images/gallery/thumbs/2013.jpg" alt="" width="272" height="168">
								<span class="text">The Little Car Show 2013</span>
							</a>
						</div>
					</section>

				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>