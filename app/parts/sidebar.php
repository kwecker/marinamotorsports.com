<aside class="sidebar sidebar--main">
	<div class="wrap">
		<div class="sidebar-button square-button">
			<a href="">
				<img src="/images/sidebar/swaps.jpg" alt="" width="214" height="149">
				<span class="text">Free Swap Meets!</span>
			</a>
		</div>
		<div class="sidebar-button square-button">
			<a href="">
				<img src="/images/sidebar/autox.jpg" alt="" width="214" height="136">
				<span class="text">AutoX</span>
			</a>
		</div>

		<section id="sidebar-upcoming">
			<header>
				<h1>Upcoming Events</h1>
			</header>

			<?php perch_events_custom(array(
				'filter' => 'eventDateTime',
				'match' => 'gte',
				'value' => date('Y-m-d H:i:s'),
				'template' => 'events/listing/calendar.html',
				'count' => 5
			)); ?>

			<a href="/calendar/">View All Upcoming Events &gt;</a>
		</section>
	</div>
</aside>