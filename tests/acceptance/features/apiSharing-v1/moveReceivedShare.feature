@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: Keep usergroup shares (#22143)
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And group "group" has been created
		And user "user1" has been added to group "group"
		And user "user2" has been added to group "group"
		And user "user0" has created a folder "/TMP"
		When user "user0" shares file "TMP" with group "group" using the API
		And user "user1" creates a folder "/myFOLDER" using the API
		And user "user1" moves file "/TMP" to "/myFOLDER/myTMP" using the API
		And the administrator deletes user "user2" using the API
		Then user "user1" should see the following elements
			| /myFOLDER/myTMP/ |