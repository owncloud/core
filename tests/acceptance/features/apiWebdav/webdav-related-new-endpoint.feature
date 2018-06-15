@api
Feature: webdav-related-new-endpoint
	Background:
		Given using API version "1"

	## Specific Scenario Outlines for new endpoint	

	Scenario: Upload chunked file asc with new chunking
		Given using new DAV path
		And user "user0" has been created
		When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the API
			| 1 | AAAAA |
			| 2 | BBBBB |
			| 3 | CCCCC |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file desc with new chunking
		Given using new DAV path
		And user "user0" has been created
		When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the API
			| 3 | CCCCC |
			| 2 | BBBBB |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file random with new chunking
		Given using new DAV path
		And user "user0" has been created
		When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the API
			| 2 | BBBBB |
			| 3 | CCCCC |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Checking file id after a move overwrite using new chunking endpoint
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has copied file "/textfile0.txt" to "/existingFile.txt"
		And user "user0" has stored id of file "/existingFile.txt"
		When user "user0" uploads the following chunks to "/existingFile.txt" with new chunking and using the API
			| 1 | AAAAA |
			| 2 | BBBBB |
			| 3 | CCCCC |
		Then user "user0" file "/existingFile.txt" should have the previously stored id
		And the content of file "/existingFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Checking file id after a move between received shares
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/folderA"
		And user "user0" has created a folder "/folderB"
		And user "user0" has shared folder "/folderA" with user "user1"
		And user "user0" has shared folder "/folderB" with user "user1"
		And user "user1" has created a folder "/folderA/ONE"
		And user "user1" has stored id of file "/folderA/ONE"
		And user "user1" has created a folder "/folderA/ONE/TWO"
		When user "user1" moves folder "/folderA/ONE" to "/folderB/ONE" using the API
		Then as "user1" the folder "/folderA" should exist
		And as "user1" the folder "/folderA/ONE" should not exist
		# yes, a weird bug used to make this one fail
		And as "user1" the folder "/folderA/ONE/TWO" should not exist
		And as "user1" the folder "/folderB/ONE" should exist
		And as "user1" the folder "/folderB/ONE/TWO" should exist
		And user "user1" file "/folderB/ONE" should have the previously stored id

   ## Validation Plugin or Old Endpoint Specific

	Scenario: New chunked upload MKDIR using old DAV path should fail
		Given using old DAV path
		And user "user0" has been created
		When user "user0" creates a new chunking upload with id "chunking-42" using the API
		Then the HTTP status code should be "409"

	Scenario: New chunked upload PUT using old DAV path should fail
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a new chunking upload with id "chunking-42"
		When using old DAV path
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the API
		Then the HTTP status code should be "404"

	Scenario: New chunked upload MOVE using old DAV path should fail
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a new chunking upload with id "chunking-42"
		And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
		When using old DAV path
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" using the API
		Then the HTTP status code should be "404"

	Scenario: Upload to new dav path using old way should fail
		Given using new DAV path
		And user "user0" has been created
		When user "user0" uploads chunk file "1" of "3" with "AAAAA" to "/myChunkedFile.txt" using the API
		Then the HTTP status code should be "503"

	Scenario: Upload file via new chunking endpoint with wrong size header
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a new chunking upload with id "chunking-42"
		And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 5 using the API
		Then the HTTP status code should be "400"

	Scenario: Upload file via new chunking endpoint with correct size header
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a new chunking upload with id "chunking-42"
		And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 15 using the API
		Then the HTTP status code should be "201"
		And as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario Outline: Upload files with difficult names using new chunking
		Given using new DAV path
		And user "user0" has been created
		When user "user0" creates a new chunking upload with id "chunking-42" using the API
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the API
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the API
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the API
		And user "user0" moves new chunk file with id "chunking-42" to "/<file-name>" using the API
		Then as "user0" the file "/<file-name>" should exist
		And the content of file "/<file-name>" for user "user0" should be "AAAAABBBBBCCCCC"
		Examples:
			| file-name |
			| &#?       |
			| TIÄFÜ     |

	#this test should be integrated into the previous Scenario after fixing the issue
	@skip @issue-29599
	Scenario: Upload a file called "0" using new chunking
		Given using new DAV path
		And user "user0" has been created
		When user "user0" creates a new chunking upload with id "chunking-42" using the API
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the API
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the API
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the API
		And user "user0" moves new chunk file with id "chunking-42" to "/0" using the API
		And as "user0" the file "/0" should exist
		And the content of file "/0" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Retrieving private link
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/somefile.txt"
		When user "user0" gets the following properties of file "/somefile.txt" using the API
			|{http://owncloud.org/ns}privatelink|
		Then the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"

	Scenario: Copying file to a path with extension .part should not be possible
		Given using new DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/welcome.part" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |

	Scenario: Uploading file to path with extension .part should not be possible
		Given using new DAV path
		And user "user0" has been created
		When user "user0" uploads file "data/textfile.txt" to "/textfile.part" using the API
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /textfile.part |

	Scenario: Renaming a file to a path with extension .part should not be possible
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/welcome.part" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |

	Scenario: Creating a directory which contains .part should not be possible
		Given using new DAV path
		And user "user0" has been created
		When user "user0" creates a folder "/folder.with.ext.part" using the API
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /folder.with.ext.part |
