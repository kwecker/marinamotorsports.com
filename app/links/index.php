<?php
$section = 'Links';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Links</h1>
				</header>
				<section class="text">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");

						perch_content_create("Logo Links", array(
							'template' => 'link-list-images.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Logo Links");

						perch_content_create("Text Links", array(
							'template' => 'link-list.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Text Links");
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>