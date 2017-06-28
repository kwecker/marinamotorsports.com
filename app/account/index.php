<?php
$section = 'My Account';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>My Account</h1>
				</header>
				<section class="text">
					<?php
						if (!perch_member_logged_in()) {
							// Returning customer login form
							perch_shop_login_form();
							// New customer sign up form
							perch_shop_registration_form();
						} else {
							if(perch_member_has_tag('vehicle-registration')) {

							}
						}
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>