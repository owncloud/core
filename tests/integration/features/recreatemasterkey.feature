Feature: recreate-master-key

	@masterkey_encryption
	Scenario: recreate masterkey
		Given user "admin" has been created
		And user "admin" has uploaded file "data/textfile.txt" to "/somefile.txt"
		And the administrator has successfully recreated the encryption masterkey using the occ command
		When user "admin" logs in to a web-style session using the API
		And user "admin" logs in to a web-style session using the API
		Then the downloaded content when downloading file "/somefile.txt" for user "admin" with range "bytes=0-6" should be "This is"

	@masterkey_encryption
	Scenario: recreate masterkey and upload data
		Given user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/somefile.txt"
		And the administrator has successfully recreated the encryption masterkey using the occ command
		When user "admin" logs in to a web-style session using the API
		And user "user0" logs in to a web-style session using the API
		And user "user0" uploads chunk file "1" of "1" with "AA" to "/somefile.txt" using the API
		Then the downloaded content when downloading file "/somefile.txt" for user "user0" with range "bytes=0-3" should be "AA"

