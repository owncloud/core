@api
Feature: sharing
	Background:
		Given using OCS API version "1"
		And using old DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created

	Scenario: Keep usergroup shares (#22143)
		Given group "group" has been created
		And user "user1" has been added to group "group"
		And user "user2" has been added to group "group"
		And user "user0" has created a folder "/TMP"
		When user "user0" shares folder "TMP" with group "group" using the sharing API
		And user "user1" creates a folder "/myFOLDER" using the WebDAV API
		And user "user1" moves folder "/TMP" to "/myFOLDER/myTMP" using the WebDAV API
		And the administrator deletes user "user2" using the provisioning API
		Then user "user1" should see the following elements
			| /myFOLDER/myTMP/ |

	Scenario: keep user shared file name same after one of recipient has renamed the file
		Given user "user0" has uploaded file with content "foo" to "/sharefile.txt"
		And user "user0" has shared file "/sharefile.txt" with user "user1"
		And user "user0" has shared file "/sharefile.txt" with user "user2"
		When user "user2" moves file "/sharefile.txt" to "/renamedsharefile.txt" using the WebDAV API
		Then as "user2" the file "/renamedsharefile.txt" should exist
		And as "user0" the file "/sharefile.txt" should exist
		And as "user1" the file "/sharefile.txt" should exist

	Scenario: keep user shared file directory same in respect to respective user if one of the recipient has moved the file
		Given user "user0" has uploaded file with content "foo" to "/sharefile.txt"
		And user "user0" has shared file "/sharefile.txt" with user "user1"
		And user "user0" has shared file "/sharefile.txt" with user "user2"
		And user "user2" has created a folder "newfolder"
		When user "user2" moves file "/sharefile.txt" to "/newfolder/sharefile.txt" using the WebDAV API
		Then as "user2" the file "/newfolder/sharefile.txt" should exist
		And as "user0" the file "/sharefile.txt" should exist
		And as "user1" the file "/sharefile.txt" should exist