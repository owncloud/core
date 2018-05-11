@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: Uploading same file to a public upload-only share multiple times
		Given user "user0" has been created
		And as user "user0"
		And the user has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		And the public has uploaded file "test.txt" with content "test"
		And the public has uploaded file "test.txt" with content "test2" with autorename mode
		When the user downloads the file "/FOLDER/test.txt" using the API
		Then the downloaded content should be "test"
		And the user downloads the file "/FOLDER/test (2).txt" using the API
		And the downloaded content should be "test2"

	Scenario: Uploading file to a public upload-only share that was deleted does not work
		Given user "user0" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When user "user0" deletes file "/FOLDER" using the API
		Then publicly uploading a file should not work
		And the HTTP status code should be "404"

	Scenario: Uploading file to a public read-only share does not work
		Given user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 1      |
		Then publicly uploading a file should not work
		And the HTTP status code should be "403"

	Scenario: Uploading to a public upload-only share
		Given user "user0" has been created
		And as user "user0"
		And the user has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		And the public has uploaded file "test.txt" with content "test"
		When the user downloads the file "/FOLDER/test.txt" using the API
		Then the downloaded content should be "test"

	Scenario: Uploading to a public upload-only share with password
		Given user "user0" has been created
		And as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 4        |
		And the public has uploaded file "test.txt" with password "publicpw" and content "test"
		When the user downloads the file "/FOLDER/test.txt" using the API
		Then the downloaded content should be "test"

	Scenario: Check quota of owners parent directory of a shared file
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user1" has been set to "0"
		And user "user0" has moved file "/welcome.txt" to "/myfile.txt"
		And user "user0" has shared file "myfile.txt" with user "user1"
		When user "user1" uploads file "data/textfile.txt" to "/myfile.txt" using the API
		Then the HTTP status code should be "204"