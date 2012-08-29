<?php
$appinfo = getenv("VCAP_APPLICATION");
$appinfo_json = json_decode($appinfo,true);
if (array_key_exists("users", $appinfo_json))
   $admin = $appinfo_json["users"][0]; 	  	
else 	
   $admin = $appinfo_json["group"];

$url_parts = parse_url($_SERVER['DATABASE_URL']);
$db_name = substr( $url_parts{'path'}, 1 );

$AUTOCONFIG = array(
"installed" => false,
"adminlogin" => $admin,
"adminpass" => "changeme",
"directory" => "/app/app/data", 
"dbtype" => "mysql",
"dbname" => $db_name,
"dbuser" => $url_parts{'user'},
"dbpass" => $url_parts{'pass'},
"dbhost" => $url_parts{'host'},
"dbtableprefix" => "oc_"
);
?>
