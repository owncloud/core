@api
Feature: sharing
As an admin
I want to be able to disable sharing functionality 
So that ownCloud users cannot share file or folder

	Background:
		Given using API version "1"
		And using old DAV path
		And user "user0" has been created
		And user "user1" has been created
		
	Scenario: user tries to share a file with another user when the sharing api has been disabled
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with user "user1" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a folder with another user when the sharing api has been disabled
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share folder "/FOLDER" with user "user1" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a file with group when the sharing api has been disabled
		Given group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a folder with group when the sharing api has been disabled
		Given group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share folder "/FOLDER" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to create public share of a file when the sharing api has been disabled
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to create public share of file "welcome.txt" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to create public share of a folder when the sharing api has been disabled
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to create public share of folder "/FOLDER" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a file with user who is not in his group when sharing outside the group has been restricted
		Given group "sharinggroup" has been created
		And user "user0" has been added to group "sharinggroup"
		When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
		Then user "user0" should not be able to share file "welcome.txt" with user "user1" using the API
		And the OCS status code should be "403"
		And the HTTP status code should be "200"

	Scenario: user shares a file with user who is in his group when sharing outside the group has been restricted
		Given group "sharinggroup" has been created
		And user "user0" has been added to group "sharinggroup"
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
		Then user "user0" should be able to share file "welcome.txt" with user "user1" using the API
		And the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: user shares a file with the group he is not member of when sharing outside the group has been restricted
		Given group "sharinggroup" has been created
		And group "anothersharinggroup" has been created
		And user "user0" has been added to group "sharinggroup"
		And user "user1" has been added to group "anothersharinggroup"
		When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
		Then user "user0" should be able to share file "welcome.txt" with group "anothersharinggroup" using the API
		And the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: user who is not a member of a group tries to share a file in the group when group sharing has been disabled
		Given group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user who is a member of a group tries to share a file in the group when group sharing has been disabled
		Given group "sharinggroup" has been created
		And user "user0" has been added to group "sharinggroup"
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"