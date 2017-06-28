<?php
$section = 'Media';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Media</h1>
				</header>
				<section class="text">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");

						perch_content_create("Posters", array(
							'template' => 'posters.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Posters");
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>