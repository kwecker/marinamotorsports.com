<?php
	include('../perch/runtime.php');
	perch_member_log_out();
	if (perch_get('s') == 'reg') {
		PerchUtil::redirect("/events/");
	} elseif (perch_get('s') == 'merch') {
		PerchUtil::redirect("/merchandise/");
	}