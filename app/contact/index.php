<?php
$section = 'Contact';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Contact Marina Motorsports, Inc.</h1>
				</header>
				<section class="text">
					<?php
						perch_content_create("Main Contact Information", array(
							'template' => 'contact.html'
						));
						perch_content_create("Little Car Show Contact", array(
							'template' => 'contact.html'
						));
						perch_content_create("Little Car Show Map", array(
							'template' => 'map.html'
						));
						perch_content_create("Motorcross Map", array(
							'template' => 'map.html'
						));

						perch_content("Main Contact Information");
						perch_content("Little Car Show Contact");

						perch_content("Little Car Show Map");
						perch_content("Motorcross Map");
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>