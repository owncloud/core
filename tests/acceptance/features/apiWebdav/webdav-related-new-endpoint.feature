@api
Feature: webdav-related-new-endpoint
	Background:
		Given using API version "1"

	Scenario: Unauthenticated call
		Given using new DAV path
		When an unauthenticated client connects to the dav endpoint using the API
		Then the HTTP status code should be "401"
		And there should be no duplicate headers
		And the following headers should be set
			| WWW-Authenticate | Basic realm="ownCloud", charset="UTF-8" |

	Scenario: Moving a file
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt" using the API
		Then the HTTP status code should be "201"
		And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving and overwriting a file
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/textfile0.txt" using the API
		Then the HTTP status code should be "204"
		And the downloaded content when downloading file "/textfile0.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving a file to a folder with no permissions
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		When user "user0" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the API
		Then the HTTP status code should be "403"
		When user "user0" downloads the file "/testshare/textfile0.txt" using the API
 		Then the HTTP status code should be "404"

	Scenario: Moving a file to overwrite a file in a folder with no permissions
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		And user "user1" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
		When user "user0" moves file "/textfile0.txt" to "/testshare/overwritethis.txt" using the API
		Then the HTTP status code should be "403"
		And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: move file into a not-existing folder
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/not-existing/welcome.txt" using the API
		Then the HTTP status code should be "409"

	Scenario: rename a file into an invalid filename
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/a\\a" using the API
		Then the HTTP status code should be "400"

	Scenario: rename a file into a banned filename
		Given using new DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/.htaccess" using the API
		Then the HTTP status code should be "403"

	Scenario: Copying a file
		Given using new DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/FOLDER/welcome.txt" using the API
		Then the HTTP status code should be "201"
		And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying and overwriting a file
		Given using new DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/textfile1.txt" using the API
		Then the HTTP status code should be "204"
		And the downloaded content when downloading file "/textfile1.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying a file to a folder with no permissions
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		When user "user0" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the API
		Then the HTTP status code should be "403"
		And user "user0" downloads the file "/testshare/textfile0.txt" using the API
		And the HTTP status code should be "404"

	Scenario: Copying a file to overwrite a file into a folder with no permissions
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		And user "user1" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
		When user "user0" copies file "/textfile0.txt" to "/testshare/overwritethis.txt" using the API
		Then the HTTP status code should be "403"
		And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "Welcome"

	Scenario: download a file with range
		Given using new DAV path
		And user "user0" has been created
		When user "user0" downloads file "/welcome.txt" with range "bytes=51-77" using the API
		Then the downloaded content should be "example file for developers"

	Scenario: Retrieving folder quota when no quota is set
		Given using new DAV path
		And user "user0" has been created
		When the administrator gives unlimited quota to user "user0" using the API
		And user "user0" gets the following properties of folder "/" using the API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "-3"

	Scenario: Retrieving folder quota when quota is set
		Given using new DAV path
		And user "user0" has been created
		When the administrator sets the quota of user "user0" to "10 MB" using the API
		And user "user0" gets the following properties of folder "/" using the API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota of shared folder with quota when no quota is set for recipient
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has been given unlimited quota
		And the quota of user "user1" has been set to "10 MB"
		And user "user1" has created a folder "/testquota"
		And user "user1" has created a share with settings
			| path        | testquota |
			| shareType   | 0         |
			| permissions | 31        |
			| shareWith   | user0     |
		When user "user0" gets the following properties of folder "/testquota" using the API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota when quota is set and a file was uploaded
		Given using new DAV path
		And user "user0" has been created
		And the quota of user "user0" has been set to "1 KB"
		And user "user0" has added file "/prueba.txt" of 93 bytes
		When user "user0" gets the following properties of folder "/" using the API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "529"

	Scenario: Retrieving folder quota when quota is set and a file was recieved
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user1" has been set to "1 KB"
		And user "user0" has added file "/user0.txt" of 93 bytes
		And user "user0" has shared file "user0.txt" with user "user1"
		When user "user1" gets the following properties of folder "/" using the API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "622"

	Scenario: download a public shared file with range
		Given using new DAV path
		And user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path      | welcome.txt |
			| shareType | 3           |
		And the public downloads the last public shared file with range "bytes=51-77" using the API
		Then the downloaded content should be "example file for developers"

	Scenario: download a public shared file inside a folder with range
		Given using new DAV path
		And user "user0" has been created
		When user "user0" creates a share using the API with settings
			| path      | PARENT |
			| shareType | 3      |
		And the public downloads file "/parent.txt" from inside the last public shared folder with range "bytes=1-7" using the API
		Then the downloaded content should be "wnCloud"

	Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new DAV path
		And user "user0" has been created
		When user "user0" downloads the file "/welcome.txt" using the API
		Then the following headers should be set
			| Content-Disposition               | attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt" |
			| Content-Security-Policy           | default-src 'none';                                              |
			| X-Content-Type-Options            | nosniff                                                          |
			| X-Download-Options                | noopen                                                           |
			| X-Frame-Options                   | SAMEORIGIN                                                       |
			| X-Permitted-Cross-Domain-Policies | none                                                             |
			| X-Robots-Tag                      | none                                                             |
			| X-XSS-Protection                  | 1; mode=block                                                    |
		And the downloaded content should start with "Welcome to your ownCloud account!"

	Scenario: A file that is not shared does not have a share-types property
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test"
		When user "user0" gets the following properties of folder "/test" using the API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain an empty property "{http://owncloud.org/ns}share-types"

	Scenario: A file that is shared to a user has a share-types property
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test  |
			| shareType   | 0     |
			| permissions | 31    |
			| shareWith   | user1 |
		When user "user0" gets the following properties of folder "/test" using the API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |

	Scenario: A file that is shared to a group has a share-types property
		Given using new DAV path
		And user "user0" has been created
		And group "group1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test   |
			| shareType   | 1      |
			| permissions | 31     |
			| shareWith   | group1 |
		When user "user0" gets the following properties of folder "/test" using the API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 1 |

	Scenario: A file that is shared by link has a share-types property
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test |
			| shareType   | 3    |
			| permissions | 31   |
		When user "user0" gets the following properties of folder "/test" using the API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 3 |

	Scenario: A file that is shared by user,group and link has a share-types property
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And group "group2" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test  |
			| shareType   | 0     |
			| permissions | 31    |
			| shareWith   | user1 |
		And user "user0" has created a share with settings
			| path        | test   |
			| shareType   | 1      |
			| permissions | 31     |
			| shareWith   | group2 |
		And user "user0" has created a share with settings
			| path        | test  |
			| shareType   | 3     |
			| permissions | 31    |
		When user "user0" gets the following properties of folder "/test" using the API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |
			| 1 |
			| 3 |

	Scenario: A disabled user cannot use webdav
		Given using new DAV path
		And user "userToBeDisabled" has been created
		And user "userToBeDisabled" has been disabled
		When user "userToBeDisabled" downloads the file "/welcome.txt" using the API
		Then the HTTP status code should be "401"

	Scenario: Creating a folder
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test_folder"
		When user "user0" gets the following properties of folder "/test_folder" using the API
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"

	Scenario: Creating a folder with special chars
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test_folder:5"
		When user "user0" gets the following properties of folder "/test_folder:5" using the API
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"

	Scenario: Removing everything of a folder
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has moved file "/welcome.txt" to "/FOLDER/welcome.txt"
		And user "user0" has created a folder "/FOLDER/SUBFOLDER"
		And user "user0" has copied file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
		When user "user0" deletes everything from folder "/FOLDER/" using the API
		Then user "user0" should see the following elements
			| /FOLDER/           |
			| /PARENT/           |
			| /PARENT/parent.txt |
			| /textfile0.txt     |
			| /textfile1.txt     |
			| /textfile2.txt     |
			| /textfile3.txt     |
			| /textfile4.txt     |
		And user "user0" should not see the following elements
			| /FOLDER/SUBFOLDER/              |
			| /FOLDER/welcome.txt             |
			| /FOLDER/SUBFOLDER/testfile0.txt |

	Scenario: Checking file id after a move
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has stored id of file "/textfile0.txt"
		When user "user0" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the API
		Then user "user0" file "/FOLDER/textfile0.txt" should have the previously stored id
		And user "user0" should not see the following elements
			| /textfile0.txt |

	Scenario: Renaming a folder to a backslash encoded should return an error using new endpoint
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5C" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |

	Scenario: Renaming a folder beginning with a backslash encoded should return an error using new endpoint
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5Ctestshare" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |

	Scenario: Renaming a folder including a backslash encoded should return an error using new endpoint
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/hola%5Chola" using the API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |

	Scenario: Renaming a folder into a banned name
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/.htaccess" using the API
		Then the HTTP status code should be "403"
		And user "user0" should see the following elements
			| /testshare/ |

	Scenario: Move a folder into a not existing one
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/not-existing/testshare" using the API
		Then the HTTP status code should be "409"
		And user "user0" should see the following elements
			| /testshare/ |

	Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new DAV path
		And user "user0" has been created
		When user "user0" downloads the file "/welcome.txt" using the API
		Then the following headers should be set
			| Content-Disposition               | attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt" |
			| Content-Security-Policy           | default-src 'none';                                              |
			| X-Content-Type-Options            | nosniff                                                          |
			| X-Download-Options                | noopen                                                           |
			| X-Frame-Options                   | SAMEORIGIN                                                       |
			| X-Permitted-Cross-Domain-Policies | none                                                             |
			| X-Robots-Tag                      | none                                                             |
			| X-XSS-Protection                  | 1; mode=block                                                    |
		And the downloaded content should start with "Welcome to your ownCloud account!"

	Scenario: Doing a GET with a web login should work without CSRF token on the new backend
		Given user "user0" has been created
		And user "user0" has logged in to a web-style session using the API
		When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" without requesttoken using the API
		Then the downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"

	Scenario: Doing a GET with a web login should work with CSRF token on the new backend
		Given user "user0" has been created
		And user "user0" has logged in to a web-style session using the API
		When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken using the API
		Then the downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"

	Scenario: Doing a PROPFIND with a web login should work with CSRF token on the new backend
		Given user "user0" has been created
		And user "user0" has logged in to a web-style session using the API
		When the client sends a "PROPFIND" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken using the API
		Then the HTTP status code should be "207"

	Scenario: Setting custom DAV property and reading it
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testcustomprop.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt" to "veryCustomPropValue"
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "veryCustomPropValue"

	Scenario: Setting custom DAV property and reading it after the file is renamed
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testcustompropwithmove.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropwithmove.txt" to "valueForMovetest"
		And user "user0" has moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/catchmeifyoucan.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForMovetest"

	Scenario: Setting custom DAV property on a shared file as an owner and reading as a recipient
		Given using new DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testcustompropshared.txt"
		And user "user0" has created a share with settings
			| path        | testcustompropshared.txt |
			| shareType   | 0                        |
			| permissions | 31                       |
			| shareWith   | user1                    |
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt" to "valueForSharetest"
		When user "user1" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForSharetest"

	Scenario: Setting custom DAV property using a new endpoint and reading it using an old endpoint
		Given using new DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testnewold.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt" to "lucky"
		And using old DAV path
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "lucky"

	## Specific scenarios for new endpoint	

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

	#this test should be integrated into the previous scenario after fixing the issue
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
