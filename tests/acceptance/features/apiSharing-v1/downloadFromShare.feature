@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: Downloading from upload-only share is forbidden
		Given user "user0" has been created
		And user "user0" has moved file "/textfile0.txt" to "/FOLDER/test.txt"
		When user "user0" creates a share using the API with settings
			| path        | FOLDER |
			| shareType   | 3      |
			| permissions | 4      |
		Then the public shared file "test.txt" should not be able to be downloaded
		And the HTTP status code should be "404"

	Scenario: Share a file by multiple channels and download from sub-folder and direct file share
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And group "group0" has been created
		And user "user1" has been added to group "group0"
		And user "user2" has been added to group "group0"
		And user "user0" has created a folder "/common"
		And user "user0" has created a folder "/common/sub"
		And user "user0" has shared folder "common" with group "group0"
		And user "user1" has shared file "textfile0.txt" with user "user2"
		And user "user1" has moved file "/textfile0.txt" to "/common/textfile0.txt"
		And user "user1" has moved file "/common/textfile0.txt" to "/common/sub/textfile0.txt"
		And user "user2" uploads file "data/file_to_overwrite.txt" to "/textfile0 (2).txt" using the API
		When user "user2" downloads file "/common/sub/textfile0.txt" with range "bytes=0-8" using the API
		Then the downloaded content should be "BLABLABLA"
		And the downloaded content when downloading file "/textfile0 (2).txt" for user "user2" with range "bytes=0-8" should be "BLABLABLA"
		And user "user2" should see the following elements
			| /common/sub/textfile0.txt |
			| /textfile0%20(2).txt      |