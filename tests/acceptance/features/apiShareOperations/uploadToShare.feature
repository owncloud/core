@api @TestAlsoOnExternalUserBackend
Feature: sharing
	Background:
		Given using OCS API version "1"
		And using old DAV path
		And user "user0" has been created

	@smokeTest
	Scenario: Uploading same file to a public upload-only share multiple times
		Given as user "user0"
		And the user has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When the public uploads file "test.txt" with content "test" using the old WebDAV API
		And the public uploads file "test.txt" with content "test2" with autorename mode using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"
		And the content of file "/FOLDER/test (2).txt" for user "user0" should be "test2"

	Scenario: Uploading file to a public upload-only share that was deleted does not work
		Given user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When user "user0" deletes file "/FOLDER" using the WebDAV API
		Then publicly uploading a file should not work
		And the HTTP status code should be "404"

	Scenario: Uploading file to a public read-only share folder does not work
		When user "user0" creates a share using the sharing API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 1      |
		Then publicly uploading a file should not work
		And the HTTP status code should be "403"

	Scenario: Uploading file to a user read-only share folder does not work
		Given user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 1      |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "403"

	Scenario: Uploading file to a group read-only share folder does not work
		Given user "user1" has been created
		And group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 1          |
			| shareWith   | grp1       |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "403"

	Scenario: Uploading to a public upload-only share
		Given as user "user0"
		And the user has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When the public uploads file "test.txt" with content "test" using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"

	Scenario: Uploading to a public upload-only share with password
		Given as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 4        |
		When the public uploads file "test.txt" with password "publicpw" and content "test" using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"

	Scenario: Uploading file to a user upload-only share folder works
		Given user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 4      |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "201"

	Scenario: Uploading file to a group upload-only share folder works
		Given user "user1" has been created
		And group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 4          |
			| shareWith   | grp1       |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "201"

	Scenario: Uploading to a public read/write share with password
		Given as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 15       |
		When the public uploads file "test.txt" with password "publicpw" and content "test" using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"

	@smokeTest
	Scenario: Uploading file to a user read/write share folder works
		Given user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 0      |
			| permissions | 15     |
			| shareWith   | user1  |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "201"

	Scenario: Uploading file to a group read/write share folder works
		Given user "user1" has been created
		And group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 1          |
			| permissions | 15         |
			| shareWith   | grp1       |
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/textfile.txt" using the WebDAV API
		Then the HTTP status code should be "201"

	@smokeTest
	Scenario: Check quota of owners parent directory of a shared file
		Given user "user1" has been created
		And the quota of user "user1" has been set to "0"
		And user "user0" has moved file "/welcome.txt" to "/myfile.txt"
		And user "user0" has shared file "myfile.txt" with user "user1"
		When user "user1" uploads file "data/textfile.txt" to "/myfile.txt" using the WebDAV API
		Then the HTTP status code should be "204"

	@smokeTest
	Scenario: Uploading to a public read/write share with password
		Given as user "user0"
		And the user has created a share with settings
			| path        | FOLDER   |
			| shareType   | 3        |
			| password    | publicpw |
			| permissions | 15       |
		When the public uploads file "test.txt" with password "publicpw" and content "test" using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"

	Scenario: Uploading to a user shared folder with read/write permission when the sharer has unsufficient quota does not work
		Given user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 0          |
			| permissions | 15         |
			| shareWith   | user1      |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the WebDAV API
		Then the HTTP status code should be "507"

	Scenario: Uploading to a group shared folder with read/write permission when the sharer has unsufficient quota does not work
		Given user "user1" has been created
		And group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a share with settings
			| path        | FOLDER       |
			| shareType   | 1            |
			| permissions | 15           |
			| shareWith   | grp1         |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the WebDAV API
		Then the HTTP status code should be "507"

	Scenario: Uploading file to a public shared folder with read/write permission when the sharer has unsufficient quota does not work
		When user "user0" creates a share using the sharing API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 15     |
		When the quota of user "user0" has been set to "0"
		Then publicly uploading a file should not work
		And the HTTP status code should be "507"

	Scenario: Uploading to a user shared folder with upload-only permission when the sharer has unsufficient quota does not work
		Given user "user1" has been created
		And user "user0" has created a share with settings
			| path        | FOLDER     |
			| shareType   | 0          |
			| permissions | 4          |
			| shareWith   | user1      |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the WebDAV API
		Then the HTTP status code should be "507"

	Scenario: Uploading to a group shared folder with upload-only permission when the sharer has unsufficient quota does not work
		Given user "user1" has been created
		And group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a share with settings
			| path        | FOLDER      |
			| shareType   | 1           |
			| permissions | 4           |
			| shareWith   | grp1        |
		And the quota of user "user0" has been set to "0"
		When user "user1" uploads file "data/textfile.txt" to "FOLDER (2)/myfile.txt" using the WebDAV API
		Then the HTTP status code should be "507"

	Scenario: Uploading file to a public shared folder with upload-only permission when the sharer has unsufficient quota does not work
		When user "user0" creates a share using the sharing API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When the quota of user "user0" has been set to "0"
		Then publicly uploading a file should not work
		And the HTTP status code should be "507"

	Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled after sharing the folder
		Given user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "no"
		Then publicly uploading a file should not work
		And the HTTP status code should be "403"

	Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled before sharing and again enabled after sharing the folder
		Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
		And user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 31     |
		When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "yes"
		Then publicly uploading a file should not work
		And the HTTP status code should be "403"

	Scenario: Uploading file to a public shared folder works when allow public uploads has been disabled and again enabled after sharing the folder
		Given user "user0" has created a share with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
		And parameter "shareapi_allow_public_upload" of app "core" has been set to "yes"
		When the public uploads file "test.txt" with content "test" using the old WebDAV API
		Then the content of file "/FOLDER/test.txt" for user "user0" should be "test"
