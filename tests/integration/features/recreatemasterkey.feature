Feature: recreate-master-key

	@masterkey_encryption
	Scenario: recreate masterkey
		Given user "admin" has been created
		And user "admin" uploads file "data/textfile.txt" to "/somefile.txt"
		When recreating masterkey by deleting old one and encrypting the filesystem
		Then the command was successful
		And logging in using web as "admin"
		And logging in using web as "admin"
		And as an "admin"
		And downloaded content when downloading file "/somefile.txt" with range "bytes=0-6" should be "This is"

	@masterkey_encryption
	Scenario: recreate masterkey and upload data
		Given user "user0" has been created
		And user "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		And recreating masterkey by deleting old one and encrypting the filesystem
		And the command was successful
		And logging in using web as "admin"
		And logging in using web as "user0"
		And as an "user0"
		When user "user0" uploads chunk file "1" of "1" with "AA" to "/somefile.txt"
		Then downloaded content when downloading file "/somefile.txt" with range "bytes=0-3" should be "AA"

