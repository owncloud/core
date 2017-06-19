Feature: quota
	Background:
		Given using api version "1"

	# Owner

	Scenario: Uploading a file as owner having enough quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user0" has a quota of "10 MB"
		When User "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file as owner having insufficient quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user0" has a quota of "20 B"
		When User "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" does not exist

	Scenario: Overwriting a file as owner having enough quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user0" has a quota of "10 MB"
		And User "user0" uploads file with content "test" to "/testquota.txt"
		When User "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file as owner having insufficient quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user0" has a quota of "20 B"
		And User "user0" uploads file with content "test" to "/testquota.txt"
		When User "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota.txt" does not exist

	# Received shared folder

	Scenario: Uploading a file in received folder having enough quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "20 B"
		And user "user1" has a quota of "10 MB"
		And As an "user1"
		And user "user1" created a folder "/testquota"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And As an "user0"
		When User "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "201"

	Scenario: Uploading a file in received folder having insufficient quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "10 MB"
		And user "user1" has a quota of "20 B"
		And As an "user1"
		And user "user1" created a folder "/testquota"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And As an "user0"
		When User "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" does not exist

	Scenario: Overwriting a file in received folder having enough quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "20 B"
		And user "user1" has a quota of "10 MB"
		And As an "user1"
		And user "user1" created a folder "/testquota"
		And User "user1" uploads file with content "test" to "/testquota/testquota.txt"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And As an "user0"
		When User "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a file in received folder having insufficient quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "10 MB"
		And user "user1" has a quota of "20 B"
		And As an "user1"
		And user "user1" created a folder "/testquota"
		And User "user1" uploads file with content "test" to "/testquota/testquota.txt"
		And folder "/testquota" of user "user1" is shared with user "user0" with permissions 31
		And As an "user0"
		When User "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"
		And as "user0" the file "/testquota/testquota.txt" does not exist

	# Received shared file

	Scenario: Overwriting a received file having enough quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "20 B"
		And user "user1" has a quota of "10 MB"
		And As an "user1"
		And User "user1" uploads file with content "test" to "/testquota.txt"
		And file "/testquota.txt" of user "user1" is shared with user "user0" with permissions 19
		And As an "user0"
		When User "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "204"

	Scenario: Overwriting a received file having insufficient quota
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has a quota of "10 MB"
		And user "user1" has a quota of "20 B"
		And As an "user1"
		And User "user1" moves file "/textfile0.txt" to "/testquota.txt"
		And file "/testquota.txt" of user "user1" is shared with user "user0" with permissions 19
		When User "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"

