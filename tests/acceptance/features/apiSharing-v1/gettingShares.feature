@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: getting all shares of a user using that user
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has moved file "/textfile0.txt" to "/file_to_share.txt"
		And user "user0" has shared file "file_to_share.txt" with user "user1"
		When user "user0" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And file "file_to_share.txt" should be included in the response

	Scenario: getting all shares of a user using another user
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has shared file "textfile0.txt" with user "user1"
		When user "admin" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And file "textfile0.txt" should not be included in the response

	Scenario: getting all shares of a file
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user3" has been created
		And user "user0" has shared file "textfile0.txt" with user "user1"
		And user "user0" has shared file "textfile0.txt" with user "user2"
		When user "user0" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?path=textfile0.txt"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "user1" should be included in the response
		And user "user2" should be included in the response
		And user "user3" should not be included in the response

	Scenario: getting all shares of a file with reshares
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user3" has been created
		And user "user0" has shared file "textfile0.txt" with user "user1"
		And user "user1" has shared file "textfile0 (2).txt" with user "user2"
		When user "user0" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?reshares=true&path=textfile0.txt"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "user1" should be included in the response
		And user "user2" should be included in the response
		And user "user3" should not be included in the response

	Scenario: User's own shares reshared to him don't appear when getting "shared with me" shares
		Given user "user0" has been created
		And user "user1" has been created
		And group "group0" has been created
		And user "user0" has been added to group "group0"
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		And user "user1" has shared folder "/shared" with group "group0"
		When user "user0" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last share_id should not be included in the response

	Scenario: getting share info of a share
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has moved file "/textfile0.txt" to "/file_to_share.txt"
		And user "user0" has shared file "file_to_share.txt" with user "user1"
		When user "user0" gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                     | A_NUMBER           |
			| item_type              | file               |
			| item_source            | A_NUMBER           |
			| share_type             | 0                  |
			| share_with             | user1              |
			| file_source            | A_NUMBER           |
			| file_target            | /file_to_share.txt |
			| path                   | /file_to_share.txt |
			| permissions            | 19                 |
			| stime                  | A_NUMBER           |
			| storage                | A_NUMBER           |
			| mail_send              | 0                  |
			| uid_owner              | user0              |
			| file_parent            | A_NUMBER           |
			| share_with_displayname | user1              |
			| displayname_owner      | user0              |
			| mimetype               | text/plain         |

	Scenario: Get a share with a user that didn't receive the share
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user0" has shared file "textfile0.txt" with user "user1"
		When user "user2" gets the info of the last share using the API
		Then the OCS status code should be "404"
		And the HTTP status code should be "200"

Scenario: Share of folder to a group, remove user from that group
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And group "group0" has been created
		And user "user1" has been added to group "group0"
		And user "user2" has been added to group "group0"
		And user "user0" shares file "/PARENT" with group "group0" using the API
		And the administrator removes user "user2" from group "group0" using the API
		Then user "user1" should see the following elements
			| /FOLDER/                 |
			| /PARENT/                 |
			| /PARENT/parent.txt       |
			| /PARENT%20(2)/           |
			| /PARENT%20(2)/parent.txt |
		And user "user2" should see the following elements
			| /FOLDER/                 |
			| /PARENT/                 |
			| /PARENT/parent.txt       |
		But user "user2" should not see the following elements
			| /PARENT%20(2)/           |
			| /PARENT%20(2)/parent.txt |
