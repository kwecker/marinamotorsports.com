<?php
$section = 'Home';

include('perch/runtime.php');
include('parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Welcome to Marina Motorsports, Inc.</h1>
				</header>
				<section class="text" id="intro">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");
					?>
				</section>

				<section id="gallery">
					<header>
						<h2>The Little Car Show Gallery</h2>
					</header>

					<?php perch_gallery_album_images('home-page-gallery', array(
						'template' => 'image-grid.html'
					)); ?>

				</section>
			</div>
		</section>

<?php include('parts/footer.php'); ?>