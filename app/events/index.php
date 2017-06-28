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
					<section class="event-registration-area">
						<strong class="large">
							The complete list of events that Marina Motorsports, Inc. is involved with on the Monterey Peninsula is listed on our <a href="/calendar/">calendar page</a>.
						</strong>
						<figure class="register-badge">
							<a href="/events/the-little-car-show/registration">
								<img src="/images/little-car-show-badge.png" alt="The Little Car Show | Pacific Grove, CA" width="238" height="90">
								<figcaption>
									Click here to Register Your Car for the <?php perch_content("Event Year"); ?> The Little Car Show!
								</figcaption>
							</a>
						</figure>
					</section>
					<hr>
					<section class="group">
						<header>
							<h2><?php perch_content("Event Year"); ?> The Little Car Show Information</h2>
						</header>
						<section class="column column--large">
							<?php
								perch_content_create("Event Information", array(
									'template' => 'textblock.html'
								));
								perch_content("Event Information");
							?>
						</section>
						<?php perch_content_create("Photos", array(
							'template' => 'photo-column.html',
							'multiple' => true,
							'edit-mode' => 'singlepage'
						));
						perch_content("Photos"); ?>
					</section>
					<?php perch_content_create("Past Presenters", array(
							'template' => 'past-presenters.html',
							'multiple' => true,
							'edit-mode' => 'listdetail'
						));
						perch_content("Past Presenters");
					?>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>