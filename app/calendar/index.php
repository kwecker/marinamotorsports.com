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
					<section class="calendar-links">
						<?php perch_content_custom("Posters", array(
							'page' => '/media/*',
							'template' => 'poster-single.html',
							'count' => 1
						)); ?>
						<?php
							perch_content_create("Swap Meet Poster", array(
								'template' => 'poster-single.html',
								'shared' => true
							));
							perch_content("Swap Meet Poster");
						?>
						<?php
							perch_content_create("Regional Map", array(
								'template' => 'map.html'
							));
							perch_content("Regional Map");
						 ?>
					</section>
				</section>
			</div>
		</section>

<?php include('../parts/footer.php'); ?>