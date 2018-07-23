@api
Feature: webdav-related-old-endpoint
	Background:
		Given using OCS API version "1"
		And using old DAV path
		And user "user0" has been created

	Scenario: Setting custom DAV property using an old endpoint and reading it using a new endpoint
		Given user "user0" has uploaded file "data/textfile.txt" to "/testoldnew.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testoldnew.txt" to "constant"
		And using new DAV path
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testoldnew.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "constant"

	### Scenarios specific to old endpoint

	Scenario: Upload chunked file asc
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
			| 1 | AAAAA |
			| 2 | BBBBB |
			| 3 | CCCCC |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file desc
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
			| 3 | CCCCC |
			| 2 | BBBBB |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file random
		When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
			| 2 | BBBBB |
			| 3 | CCCCC |
			| 1 | AAAAA |
		Then as "user0" the file "/myChunkedFile.txt" should exist
		And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

	Scenario Outline: Chunked upload files with difficult name
		When user "user0" uploads the following "3" chunks to "/<file-name>" with old chunking and using the WebDAV API
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