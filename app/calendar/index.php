<?php
$section = 'Calendar';

include('../perch/runtime.php');
include('../parts/header.php');
?>

		<section class="content">
			<div class="wrap">
				<header>
					<h1>Calendar of Events</h1>
				</header>
				<section class="text">
					<?php
						perch_content_create("Intro Text", array( 'template' => 'textblock.html'));
						perch_content("Intro Text");
					?>
					<section id="calendar">
					<?php
						perch_events_calendar(array(
							'past-events' => true
						));
					?>
					</section>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>