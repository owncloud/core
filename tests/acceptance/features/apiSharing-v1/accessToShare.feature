@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path
		And user "user0" has been created
		And user "user1" has been created

	Scenario: Sharee can see the share
		Given user "user0" has shared file "textfile0.txt" with user "user1"
		When user "user1" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last share_id should be included in the response

	Scenario: Sharee can see the filtered share
		Given user "user0" has shared file "textfile0.txt" with user "user1"
		And user "user0" has shared file "textfile1.txt" with user "user1"
		When user "user1" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true&path=textfile1 (2).txt"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last share_id should be included in the response

	Scenario: Sharee can't see the share that is filtered out
		Given user "user0" has shared file "textfile0.txt" with user "user1"
		And user "user0" has shared file "textfile1.txt" with user "user1"
		When user "user1" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true&path=textfile0 (2).txt"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last share_id should not be included in the response

	Scenario: Sharee can see the group share
		Given group "group0" has been created
		And user "user1" has been added to group "group0"
		And user "user0" has shared file "textfile0.txt" with group "group0"
		When user "user1" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last share_id should be included in the response
