@api
Feature: sharing
As an admin
I want to be able to disable sharing functionality 
So that ownCloud users cannot share file or folder

	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: user tries to share a file with another user when the sharing api has been disabled
		Given as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with user "user1" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a folder with another user when the sharing api has been disabled
		Given as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share folder "/FOLDER" with user "user1" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a file with group when the sharing api has been disabled
		Given as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to share a folder with group when the sharing api has been disabled
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to share folder "/FOLDER" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to create public share of a file when the sharing api has been disabled
		Given user "user0" has been created
		And as user "admin"
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to create public share of file "welcome.txt" using the API
		Then the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user tries to create public share of a folder when the sharing api has been disabled
		Given user "user0" has been created
		When parameter "shareapi_enabled" of app "core" has been set to "no"
		Then user "user0" should not be able to create public share of folder "/FOLDER" using the API
		Then the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user who is not a member of a group tries to share a file in the group when group sharing has been disabled
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: user who is a member of a group tries to share a file in the group when group sharing has been disabled
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user0" has been added to group "sharinggroup"
		And user "user1" has been added to group "sharinggroup"
		When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
		Then user "user0" should not be able to share file "welcome.txt" with group "sharinggroup" using the API
		And the OCS status code should be "404"
		And the HTTP status code should be "200"