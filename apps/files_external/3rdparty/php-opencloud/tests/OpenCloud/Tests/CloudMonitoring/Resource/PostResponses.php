<?php

return array(

	'tokens' => 'Account/authenticate',

	'account' => 'Account/put',

	'entities' => 'Entity/post',
	'entities/{w}' => 'Entity/put',

	'entities/{w}/checks' => 'Entity/check_post',
	'entities/{w}/test-check' => 'Entity/check_test_post',
	'entities/{w}/test-check\?debug=true' => 'Entity/check_test_debug_post',
	'entities/{w}/checks/{w}/test' => 'Check/test_existing',
	'entities/{w}/checks/{w}/test\?debug=true' => 'Check/test_debug',
	'entities/{w}/checks/{w}' => 'Entity/check_put',

	'monitoring_zones/{w}/traceroute' => 'Zone/traceroute',

	'entities/{w}/alarms' => 'Alarm/post',
	'entities/{w}/test-alarm' => 'Alarm/test_alarm_post',
	'entities/{w}/alarms/{w}' => 'Alarm/put',

	'notification_plans' => 'NotificationPlan/post',
	'notification_plans/{w}' => 'NotificationPlan/put',

	'notifications' => 'Notification/post',
	'notifications/{w}' => 'Notification/put',
	'notifications/{w}/test' => 'Notification/test',
	'test-notification' => 'Notification/test',

	'alarm_examples/{w}' => 'Alarm/example_post'
);