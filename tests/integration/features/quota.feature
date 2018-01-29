Feature: quota
	Background:
		Given using api version "1"

	# Owner

	Scenario: Uploading a file as owner having enough quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And the quota of user "user0" has been set to "10 MB"
		When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file as owner having insufficient quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And the quota of user "user0" has been set to "20 B"
		When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" does not exist

	Scenario: Overwriting a file as owner having enough quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And the quota of user "user0" has been set to "10 MB"
		And user "user0" uploads file with content "test" to "/testquota.txt"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file as owner having insufficient quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And the quota of user "user0" has been set to "20 B"
		And user "user0" uploads file with content "test" to "/testquota.txt"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" does not exist

	# Received shared folder

	Scenario: Uploading a file in received folder having enough quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as an "user1"
		And user "user1" created a folder "/testquota"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And as an "user0"
		When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file in received folder having insufficient quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as an "user1"
		And user "user1" created a folder "/testquota"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And as an "user0"
		When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" does not exist

	Scenario: Overwriting a file in received folder having enough quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as an "user1"
		And user "user1" created a folder "/testquota"
		And user "user1" uploads file with content "test" to "/testquota/testquota.txt"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And as an "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file in received folder having insufficient quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as an "user1"
		And user "user1" created a folder "/testquota"
		And user "user1" uploads file with content "test" to "/testquota/testquota.txt"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And as an "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" does not exist

	# Received shared file

	Scenario: Overwriting a received file having enough quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "20 B"
		And the quota of user "user1" has been set to "10 MB"
		And as an "user1"
		And user "user1" uploads file with content "test" to "/testquota.txt"
		And file "/testquota.txt" of user "user1" is shared with user "user0" with permissions 19
		And as an "user0"
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a received file having insufficient quota
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And the quota of user "user0" has been set to "10 MB"
		And the quota of user "user1" has been set to "20 B"
		And as an "user1"
		And user "user1" moves file "/textfile0.txt" to "/testquota.txt"
		And file "/testquota.txt" of user "user1" is shared with user "user0" with permissions 19
		When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"

