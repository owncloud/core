Feature: transfer-ownership

	Scenario: transfering ownership of a file to another user
		Given user "user0" exists
		Given user "user1" exists
		When User "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		And transfering ownership from "user0" to "user1"
		And As an "user1"
		And using received transfer folder of "user1" as dav path
		Then Downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	Scenario: transfering ownership of a folder to another user
		Given user "user0" exists
		Given user "user1" exists
		When User "user0" created a folder "/test"
		And User "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And transfering ownership from "user0" to "user1"
		And As an "user1"
		And using received transfer folder of "user1" as dav path
		Then Downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	Scenario: transfering ownership of file shares to another user
		Given user "user0" exists
		Given user "user1" exists
		Given user "user2" exists
		When User "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		And file "/somefile.txt" of user "user0" is shared with user "user2" with permissions 19
		And transfering ownership from "user0" to "user1"
		And As an "user2"
		Then Downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	Scenario: transfering ownership of folder shares to another user
		Given user "user0" exists
		Given user "user1" exists
		Given user "user2" exists
		When User "user0" created a folder "/test"
		And User "user0" uploads file "data/textfile.txt" to "/test/somefile.txt"
		And folder "/test" of user "user0" is shared with user "user2" with permissions 31
		And transfering ownership from "user0" to "user1"
		And As an "user2"
		Then Downloaded content when downloading file "/test/somefile.txt" with range "bytes=0-6" should be "This is"

	Scenario: transfering ownership does not transfer received shares
		Given user "user0" exists
		Given user "user1" exists
		Given user "user2" exists
		When User "user2" created a folder "/test"
		And folder "/test" of user "user2" is shared with user "user0" with permissions 31
		And transfering ownership from "user0" to "user1"
		And As an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/test" does not exist

	@local_storage
	Scenario: transfering ownership does not transfer external storage
		Given user "user0" exists
		Given user "user1" exists
		When transfering ownership from "user0" to "user1"
		And As an "user1"
		And using received transfer folder of "user1" as dav path
		Then as "user1" the folder "/local_storage" does not exist

