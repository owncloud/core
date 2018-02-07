Feature: transfer-ownership

	@no_default_encryption
	Scenario: transferring ownership of a file
		Given user "user0" exists
		And user "user1" exists
		And user "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of a file after updating the file
		Given user "user0" exists
		And user "user1" exists
		And user "user0" uploads file "data/file_to_overwrite.txt" to "/PARENT/textfile0.txt"
		And user "user0" uploads chunk file "1" of "3" with "AA" to "/PARENT/textfile0.txt"
		And user "user0" uploads chunk file "2" of "3" with "BB" to "/PARENT/textfile0.txt"
		And user "user0" uploads chunk file "3" of "3" with "CC" to "/PARENT/textfile0.txt"
		When transferring ownership from "user0" to "user1"
		Then the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then downloaded content when downloading file "/PARENT/textfile0.txt" with range "bytes=0-5" should be "AABBCC"

	@no_default_encryption
	Scenario: transferring ownership of a folder
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of file shares
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		And file "/somefile.txt" of user "user0" is shared with user "user2" with permissions 19
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder shared with third user
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder shared with transfer recipient
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user1" with permissions 31
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user1"
		Then as "user1" the folder "/test" does not exist
		And using received transfer folder of "user1" as dav path
		And downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder doubly shared with third user
		Given group "group1" exists
		And user "user0" exists
		And user "user1" exists
		And user "user2" exists
    	And user "user2" belongs to group "group1"
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with group "group1" with permissions 31
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership does not transfer received shares
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user2" created a folder "/test"
		And folder "/test" of user "user2" is shared with user "user0" with permissions 31
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/test" does not exist

	@local_storage @no_default_encryption
	Scenario: transferring ownership does not transfer external storage
		Given user "user0" exists
		And user "user1" exists
		When transferring ownership from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/local_storage" does not exist

	@no_default_encryption
	Scenario: transferring ownership does not fail with shared trashed files
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" created a folder "/sub"
		And user "user0" created a folder "/sub/test"
		And folder "/sub/test" of user "user0" is shared with user "user2" with permissions 31
		And user "user0" deletes folder "/sub"
		When transferring ownership from "user0" to "user1"
		Then the command was successful

	Scenario: transferring ownership fails with invalid source user
		Given user "user0" exists
		When transferring ownership from "invalid_user" to "user0"
		Then the command output contains the text "Unknown source user"
		And the command failed with exit code 1

	Scenario: transferring ownership fails with invalid destination user
		Given user "user0" exists
		When transferring ownership from "user0" to "invalid_user"
		Then the command output contains the text "Unknown destination user"
		And the command failed with exit code 1

	@no_default_encryption
	Scenario: transferring ownership of a folder
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of file shares
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And file "/test/somefile.txt" of user "user0" is shared with user "user2" with permissions 19
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder shares which has public link
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		And as an "user1"
		And creating a share with
			| path | /test/somefile.txt |
			| shareType | 3 |
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder shared with third user
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder shared with transfer recipient
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user1" with permissions 31
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user1"
		Then as "user1" the folder "/test" does not exist
		And using received transfer folder of "user1" as dav path
		And downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	@no_default_encryption
	Scenario: transferring ownership of folder doubly shared with third user
		Given group "group1" exists
		And user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user2" belongs to group "group1"
		And user "user0" created a folder "/test"
		And user "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with group "group1" with permissions 31
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		When transferring ownership of path "test" from "user0" to "user1"
		And the command was successful
		And as an "user2"
		Then downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	Scenario: transferring ownership does not transfer received shares
		Given user "user0" exists
		And user "user1" exists
		And user "user2" exists
		And user "user2" created a folder "/test"
		And user "user0" created a folder "/sub"
		And folder "/test" of user "user2" is shared with user "user0" with permissions 31
		And user "user0" moved folder "/test" to "/sub/test"
		When transferring ownership of path "sub" from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/sub/test" does not exist

	@local_storage
	Scenario: transferring ownership does not transfer external storage
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/sub"
		When transferring ownership of path "sub" from "user0" to "user1"
		And the command was successful
		And as an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/local_storage" does not exist

	Scenario: transferring ownership fails with invalid source user
		Given user "user0" exists
		And user "user0" created a folder "/sub"
		When transferring ownership of path "sub" from "invalid_user" to "user0"
		Then the command output contains the text "Unknown source user"
		And the command failed with exit code 1

	Scenario: transferring ownership fails with invalid destination user
		Given user "user0" exists
		And user "user0" created a folder "/sub"
		When transferring ownership of path "sub" from "user0" to "invalid_user"
		Then the command output contains the text "Unknown destination user"
		And the command failed with exit code 1

	Scenario: transferring ownership fails with invalid path
		Given user "user0" exists
		And user "user1" exists
		When transferring ownership of path "test" from "user0" to "user1"
		Then the command output contains the text "Unknown path provided"
		And the command failed with exit code 1
