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

	Scenario: Uploading file to a public read-only share folder does not work
		Given user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 1      |
		Then publicly uploading a file should not work
		And the HTTP status code should be "403"

	Scenario: Uploading file to a user read-only share folder does not work
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 1      |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "403"

	Scenario: Uploading file to a group read-only share folder does not work
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharegroup" has been created
		And user "user1" has been added to group "sharegroup"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 1          |
			| shareWith   | sharegroup |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "403"

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

	Scenario: Uploading file to a user upload-only share folder works
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 4      |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "201"

	Scenario: Uploading file to a group upload-only share folder works
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharegroup" has been created
		And user "user1" has been added to group "sharegroup"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 4          |
			| shareWith   | sharegroup |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "201"

	Scenario: Uploading to a public read/write share with password
		Given user "user0" has been created
		And as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 15       |
		And the public has uploaded file "test.txt" with password "publicpw" and content "test"
		When the user downloads the file "/FOLDER/test.txt" using the API
		Then the downloaded content should be "test"

	Scenario: Uploading file to a user read/write share folder works
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 15     |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "201"

	Scenario: Uploading file to a group read/write share folder works
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharegroup" has been created
		And user "user1" has been added to group "sharegroup"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 15         |
			| shareWith   | sharegroup |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the API
		Then the HTTP status code should be "201"

	Scenario: Check quota of owners parent directory of a shared file
		Given user "user0" has been created
		And user "user1" has been created
		And the quota of user "user1" has been set to "0"
		And user "user0" has moved file "/welcome.txt" to "/myfile.txt"
		And user "user0" has shared file "myfile.txt" with user "user1"
		When user "user1" uploads file "data/textfile.txt" to "/myfile.txt" using the API
		Then the HTTP status code should be "204"

	Scenario: Uploading to a public read/write share with password
		Given user "user0" has been created
		And as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 15       |
		And the public has uploaded file "test.txt" with password "publicpw" and content "test"
		When the user downloads the file "/FOLDER/test.txt" using the API
		Then the downloaded content should be "test"

	Scenario: Uploading to a user shared folder with read/write permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 0          |
			| permissions | 15         |
			| shareWith   | user1      |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the API
		Then the HTTP status code should be "507"

	Scenario: Uploading to a group shared folder with read/write permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		And user "user0" has created a share with settings
			| path        | FOLDER       |
			| shareType   | 1            |
			| permissions | 15           |
			| shareWith   | sharinggroup |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the API
		Then the HTTP status code should be "507"

	Scenario: Uploading file to a public shared folder with read/write permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 15      |
		When the quota of user "user0" has been set to "0"
		Then publicly uploading a file should not work
		And the HTTP status code should be "507"

	Scenario: Uploading to a user shared folder with upload-only permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 0          |
			| permissions | 4         |
			| shareWith   | user1      |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the API
		Then the HTTP status code should be "507"

	Scenario: Uploading to a group shared folder with upload-only permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		And user "user1" has been created
		And group "sharinggroup" has been created
		And user "user1" has been added to group "sharinggroup"
		And user "user0" has created a share with settings
			| path        | FOLDER       |
			| shareType   | 1            |
			| permissions | 4           |
			| shareWith   | sharinggroup |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the API
		Then the HTTP status code should be "507"

	Scenario: Uploading file to a public shared folder with upload-only permission when the sharer has unsufficient quota does not work
		Given user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When the quota of user "user0" has been set to "0"
		Then publicly uploading a file should not work
		And the HTTP status code should be "507"