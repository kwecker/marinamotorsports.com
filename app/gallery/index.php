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
						if(perch_get('album')) {
							perch_gallery_albums(array(
								'template' => 'album-nav.html'
							));
							perch_gallery_album_images(perch_get('album'), array(
								'template' => 'image-list.html'
							));
						} else {
							// Intro Block
							perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
							perch_content("Intro Text");
							// Gallery Listing
							perch_gallery_albums(array(
								'template' => 'album-list.html',
								'image' => true
							));
						}
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>