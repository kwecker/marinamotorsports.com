<?php
$section = 'Events';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Marina Motorsports, Inc. Events</h1>
				</header>
				<section class="text">
					<figure class="register-badge">
						<a href="/events/the-little-car-show/registration">
							<img src="/images/little-car-show-badge.png" alt="The Little Car Show | Pacific Grove, CA" width="238" height="90">
							<figcaption>
								Click here to Register Your Car for the <?php perch_content("Event Year"); ?> The Little Car Show!
							</figcaption>
						</a>
					</figure>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>