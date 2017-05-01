<?php
$section = 'Sponsors';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Sponsors and Merchants</h1>
				</header>
				<section class="text" id="intro">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");
					?>
					<?php
						perch_content_create("Sponsor Levels", array(
							'template' => 'sponsors.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Sponsor Levels");
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>