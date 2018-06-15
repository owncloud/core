@api
Feature: webdav-related-old-endpoint
	Background:
		Given using API version "1"

	Scenario: Setting custom DAV property using an old endpoint and reading it using a new endpoint
		Given using old DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testoldnew.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testoldnew.txt" to "constant"
		And using new DAV path
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testoldnew.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "constant"

	### Scenarios specific to old endpoint

	Scenario: Upload chunked file asc
		Given user "user0" has been created
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the API
			| 1 | AAAAA |
			| 2 | BBBBB |
			| 3 | CCCCC |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file desc
		Given user "user0" has been created
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the API
			| 3 | CCCCC |
			| 2 | BBBBB |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file random
		Given user "user0" has been created
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the API
			| 2 | BBBBB |
			| 3 | CCCCC |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario Outline: Chunked upload files with difficult name
		Given user "user0" has been created
		When user "user0" uploads the following "3" chunks to "/<file-name>" with old chunking and using the API
			| 1 | AAAAA |
			| 2 | BBBBB |
			| 3 | CCCCC |
		Then as "user0" the file "/<file-name>" should exist
		And the content of file "/<file-name>" for user "user0" should be "AAAAABBBBBCCCCC"
		Examples:
			| file-name |
			| 0         |
			| &#?       |
			| TIÄFÜ     |

	Scenario: Checking file id after a move between received shares
		Given using old DAV path
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

	Scenario: Retrieving private link
		Given using old DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/somefile.txt"
		When user "user0" gets the following properties of file "/somefile.txt" using the API
			|{http://owncloud.org/ns}privatelink|
		Then the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"

	Scenario: Copying file to a path with extension .part should not be possible
		Given using old DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/welcome.part" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |

	Scenario: Uploading file to path with extension .part should not be possible
		Given using old DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/textfile.part"
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /textfile.part |

	Scenario: Renaming a file to a path with extension .part should not be possible
		Given using old DAV path
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

