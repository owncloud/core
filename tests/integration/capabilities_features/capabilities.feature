Feature: capabilities
	Background:
		Given using api version "1"

	Scenario: getting capabilities with admin user
		Given as an "admin"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing public upload
		Given as an "admin"
		And parameter "shareapi_allow_public_upload" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | EMPTY |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Disabling share api
		Given as an "admin"
		And parameter "shareapi_enabled" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | EMPTY |
			| files_sharing | public@@@enabled | EMPTY |
			| files_sharing | public@@@upload | EMPTY |
			| files_sharing | resharing | EMPTY |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Disabling public links
		Given as an "admin"
		And parameter "shareapi_allow_links" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | EMPTY |
			| files_sharing | public@@@upload | EMPTY |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing resharing
		Given as an "admin"
		And parameter "shareapi_allow_resharing" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | EMPTY |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing federation outgoing
		Given as an "admin"
		And parameter "outgoing_server2server_share_enabled" of app "files_sharing" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | EMPTY |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing federation incoming
		Given as an "admin"
		And parameter "incoming_server2server_share_enabled" of app "files_sharing" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | EMPTY |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing password enforce
		Given as an "admin"
		And parameter "shareapi_enforce_links_password" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | public@@@password@@@enforced | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing public notifications
		Given as an "admin"
		And parameter "shareapi_allow_public_notification" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | 1 |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing public social share
		Given as an "admin"
		And parameter "shareapi_allow_social_share" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | EMPTY |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing expire date
		Given as an "admin"
		And parameter "shareapi_default_expire_date" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | public@@@expire_date@@@enabled | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing expire date enforcing
		Given as an "admin"
		And parameter "shareapi_default_expire_date" of app "core" is set to "yes"
		And parameter "shareapi_enforce_expire_date" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | public@@@expire_date@@@enabled | 1 |
			| files_sharing | public@@@expire_date@@@enforced | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing group sharing allowed
		Given as an "admin"
		And parameter "shareapi_allow_group_sharing" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | EMPTY |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing only share with group member
		Given as an "admin"
		And parameter "shareapi_only_share_with_group_members" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | 1 |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing allow share dialog user enumeration
		Given as an "admin"
		And parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" is set to "no"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | EMPTY |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |

	Scenario: Changing allow share dialog user enumeration for group members only
		Given as an "admin"
		And parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" is set to "yes"
		When sending "GET" to "/cloud/capabilities"
		Then the HTTP status code should be "200"
		And fields of capabilities match with
			| capability | path_to_element | value |
			| core | pollinterval | 60 |
			| core | webdav-root | remote.php/webdav |
			| files_sharing | api_enabled | 1 |
			| files_sharing | public@@@enabled | 1 |
			| files_sharing | public@@@upload | 1 |
			| files_sharing | public@@@send_mail | EMPTY |
			| files_sharing | public@@@social_share | 1 |
			| files_sharing | resharing | 1 |
			| files_sharing | federation@@@outgoing | 1 |
			| files_sharing | federation@@@incoming | 1 |
			| files_sharing | group_sharing         | 1 |
			| files_sharing | share_with_group_members_only | EMPTY |
			| files_sharing | user_enumeration@@@enabled | 1 |
			| files_sharing | user_enumeration@@@group_members_only | 1 |
			| files | bigfilechunking | 1 |
			| files | undelete | 1 |
			| files | versioning | 1 |
