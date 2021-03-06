<?php
$section = 'Charities';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Charitable Beneficiaries</h1>
				</header>
				<section class="text">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");

						perch_content_create("Charitable Contributions", array(
							'template' => 'charity_list.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Charitable Contributions");
					?>
					<div class="charities-total">
						<span class="title">Total</span> <span class="cost">0.00</span>
					</div>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>