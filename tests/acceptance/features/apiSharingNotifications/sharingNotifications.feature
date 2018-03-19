@api
Feature: check notifications when receiving a share
As a user
I want to ....
So that ....

	Background:
		Given using API version "1"
		And using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And these groups have been created:
			|groupname|
			|grp1     |
		And user "user1" has been added to group "grp1"
		And user "user2" has been added to group "grp1"

	Scenario: share to user sends notification
		Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
		When user "user0" shares folder "/PARENT" with user "user1" using the API
		And user "user0" shares file "/textfile0.txt" with user "user1" using the API
		Then user "user1" should have 2 notification
		And the last notification of user "user1" should match these regular expressions
			| app         | /^files_sharing$/                       |
			| subject     | /^User user0 shared "PARENT" with you$/ |
			| message     | /^$/                                    |
			| link        | /^%base_url%\/index.php\/f\/(\d+)$/     |
			| object_type | /^local_share$/                         |

	Scenario: share to group sends notification to every member
		Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
		When user "user0" shares folder "/PARENT" with group "grp1" using the API
		And user "user0" shares file "/textfile0.txt" with group "grp1" using the API
		Then user "user1" should have 2 notification
		And the last notification of user "user1" should match these regular expressions
			| app         | /^files_sharing$/                       |
			| subject     | /^User user0 shared "PARENT" with you$/ |
			| message     | /^$/                                    |
			| link        | /^%base_url%\/index.php\/f\/(\d+)$/     |
			| object_type | /^local_share$/                         |
		And user "user2" should have 2 notification
		And the last notification of user "user2" should match these regular expressions
			| app         | /^files_sharing$/                       |
			| subject     | /^User user0 shared "PARENT" with you$/ |
			| message     | /^$/                                    |
			| link        | /^%base_url%\/index.php\/f\/(\d+)$/     |
			| object_type | /^local_share$/                         |

	Scenario: when autoaccepting is enabeled no notifications are send 
		Given parameter "shareapi_auto_accept_share" of app "core" has been set to "yes"
		When user "user0" shares folder "/PARENT" with user "user1" using the API
		And user "user0" shares file "/textfile0.txt" with user "user1" using the API
		Then user "user1" should have 0 notification

	Scenario: discard notification if target user is not member of the group anymore
		Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
		When user "user0" shares folder "/PARENT" with group "grp1" using the API
		And the administrator removes user "user1" from group "grp1" using the API
		Then user "user1" should have 0 notifications
		Then user "user2" should have 1 notification

	Scenario: discard notification if group is deleted
		Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
		When user "user0" shares folder "/PARENT" with group "grp1" using the API
		And the administrator deletes group "grp1" using the API
		Then user "user1" should have 0 notifications
		Then user "user2" should have 0 notification