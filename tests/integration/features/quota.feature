Feature: quota
	Background:
		Given using API version "1"

	# Owner

	Scenario: Uploading a file as owner having enough quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And the quota of user "user0" has been set to "10 MB"
		When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file as owner having insufficient quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And the quota of user "user0" has been set to "20 B"
		When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" should not exist

	Scenario: Overwriting a file as owner having enough quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And the quota of user "user0" has been set to "10 MB"
		And user "user0" has uploaded file with content "test" to "/testquota.txt"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file as owner having insufficient quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And the quota of user "user0" has been set to "20 B"
		And user "user0" has uploaded file with content "test" to "/testquota.txt"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" should not exist

	# Received shared folder

	Scenario: Uploading a file in received folder having enough quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as user "user1"
		And user "user1" has created a folder "/testquota"
		And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
		And as user "user0"
		When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file in received folder having insufficient quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as user "user1"
		And user "user1" has created a folder "/testquota"
		And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
		And as user "user0"
		When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" should not exist

	Scenario: Overwriting a file in received folder having enough quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as user "user1"
		And user "user1" has created a folder "/testquota"
		And user "user1" has uploaded file with content "test" to "/testquota/testquota.txt"
		And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
		And as user "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file in received folder having insufficient quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as user "user1"
		And user "user1" has created a folder "/testquota"
		And user "user1" has uploaded file with content "test" to "/testquota/testquota.txt"
		And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
		And as user "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" should not exist

	# Received shared file

	Scenario: Overwriting a received file having enough quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as user "user1"
		And user "user1" has uploaded file with content "test" to "/testquota.txt"
		And user "user1" has shared file "/testquota.txt" with user "user0" with permissions 19
		And as user "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a received file having insufficient quota
		Given using new DAV path
		And as user "admin"
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as user "user1"
		And user "user1" has moved file "/textfile0.txt" to "/testquota.txt"
		And user "user1" has shared file "/testquota.txt" with user "user0" with permissions 19
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"

