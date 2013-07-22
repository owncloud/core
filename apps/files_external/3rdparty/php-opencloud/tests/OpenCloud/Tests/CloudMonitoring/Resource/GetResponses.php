<?php

return array(
    'limits' => 'Account/limits',
    'account' => 'Account/account',
    'audits' => 'Account/audit_list',
        
    'entities' => 'Entity/entities',
    'entities/{w}' => 'Entity/entity',
        
    'entities/{w}/checks' => 'Check/list_checks',
    'entities/{w}/checks/{w}' => 'Check/get',
        
    'entities/{w}/checks/{w}/metrics' => 'Metric/list',
    'entities/{w}/checks/{w}/metrics/{w}' => 'Metric/data_points',
        
    'check_types' => 'CheckType/list',
    'check_types/(\w|\.)+' => 'CheckType/get',
        
    'entities/{w}/alarms' => 'Alarm/list',
    'entities/{w}/alarms/{w}' => 'Alarm/get',
        
    'entities/{w}/alarms/{w}/notification_history' => 'NotificationHistory/list',
    'entities/{w}/alarms/{w}/notification_history/{w}' => 'NotificationHistory/get',
    'entities/{w}/alarms/{w}/notification_history/{w}/{w}' => 'NotificationHistory/get_history_item',
    
    'monitoring_zones' => 'Zone/list',
    'monitoring_zones/{w}' => 'Zone/get',
    
    'notifications' => 'Notification/list',
    'notifications/{w}' => 'Notification/get',
       
    'notification_plans' => 'NotificationPlan/list',
    'notification_plans/{w}' => 'NotificationPlan/get',
        
    'notification_types' => 'NotificationType/list',
    'notification_types/{w}' => 'NotificationType/get',
        
    'changelogs/alarms' => 'Changelog/list',
    'changelogs/alarms?entityId={w}' => 'Changelog/list',
        
    'views/overview' => 'View/get',
    'views/overview?id=entityId&id={w}' => 'View/get',
    'views/overview?uri={w}&uri={w}' => 'View/get',
        
    'alarm_examples' => 'Alarm/example_list',
    'alarm_examples/{w}' => 'Alarm/example_get',
        
    'agents' => 'Agent/list',
    'agents/{w}' => 'Agent/get',
    'agents/{w}/connections' => 'Agent/connections_list',
    'agents/{w}/connections/{w}' => 'Agent/connections_get',
    
    'agent_tokens' => 'Agent/tokens_list',
    'agent_tokens/{w}' => 'Agent/tokens_get',
    
    'entities/{w}/agent/check_types/{w}/targets' => 'Agent/targets_list',
        
    'agents/{w}/host_info/cpus' => 'Agent/host_cpu',
    'agents/{w}/host_info/disks' => 'Agent/host_disk',
    'agents/{w}/host_info/filesystems' => 'Agent/host_filesystem',
    'agents/{w}/host_info/memory' => 'Agent/host_memory',
    'agents/{w}/host_info/network_interfaces' => 'Agent/host_network_interface',
    'agents/{w}/host_info/processes' => 'Agent/host_processes',
    'agents/{w}/host_info/system' => 'Agent/host_sysinfo',
    'agents/{w}/host_info/who' => 'Agent/host_logged_in_user'
);