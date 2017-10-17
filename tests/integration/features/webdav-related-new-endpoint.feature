Feature: webdav-related-new-endpoint
	Background:
		Given using api version "1"

	Scenario: Unauthenticated call
		Given using new dav path
		When connecting to dav endpoint
		Then the HTTP status code should be "401"
		And there are no duplicate headers
		And the following headers should be set
			|WWW-Authenticate|Basic realm="ownCloud"|

	Scenario: Moving a file
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt"
		Then the HTTP status code should be "201"
		And downloaded content when downloading file "/FOLDER/welcome.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving and overwriting a file
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/textfile0.txt"
		Then the HTTP status code should be "204"
		And downloaded content when downloading file "/textfile0.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving a file to a folder with no permissions
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And as an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And as an "user0"
		And user "user0" moves file "/textfile0.txt" to "/testshare/textfile0.txt"
		And the HTTP status code should be "403"
		When downloading file "/testshare/textfile0.txt"
 		Then the HTTP status code should be "404"

	Scenario: Moving a file to overwrite a file in a folder with no permissions
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And as an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And user "user1" copies file "/welcome.txt" to "/testshare/overwritethis.txt"
		And as an "user0"
		When user "user0" moves file "/textfile0.txt" to "/testshare/overwritethis.txt"
		Then the HTTP status code should be "403"
		And downloaded content when downloading file "/testshare/overwritethis.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: move file into a not-existing folder
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/not-existing/welcome.txt"
		Then the HTTP status code should be "409"

	Scenario: rename a file into an invalid filename
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/a\\a"
		Then the HTTP status code should be "400"

	Scenario: rename a file into a banned filename
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/.htaccess"
		Then the HTTP status code should be "403"

	Scenario: Copying a file
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" copies file "/welcome.txt" to "/FOLDER/welcome.txt"
		Then the HTTP status code should be "201"
		And downloaded content when downloading file "/FOLDER/welcome.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying and overwriting a file
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" copies file "/welcome.txt" to "/textfile1.txt"
		Then the HTTP status code should be "204"
		And downloaded content when downloading file "/textfile1.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying a file to a folder with no permissions
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And as an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And as an "user0"
		When user "user0" copies file "/textfile0.txt" to "/testshare/textfile0.txt"
		Then the HTTP status code should be "403"
		And downloading file "/testshare/textfile0.txt"
		And the HTTP status code should be "404"

	Scenario: Copying a file to overwrite a file into a folder with no permissions
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And as an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And user "user1" copies file "/welcome.txt" to "/testshare/overwritethis.txt"
		And as an "user0"
		When user "user0" copies file "/textfile0.txt" to "/testshare/overwritethis.txt"
		Then the HTTP status code should be "403"
		And downloaded content when downloading file "/testshare/overwritethis.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: download a file with range
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When downloading file "/welcome.txt" with range "bytes=51-77"
		Then downloaded content should be "example file for developers"

	Scenario: Retrieving folder quota when no quota is set
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		When user "user0" has unlimited quota
		Then as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		And the single response should contain a property "{DAV:}quota-available-bytes" with value "-3"

	Scenario: Retrieving folder quota when quota is set
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		When user "user0" has a quota of "10 MB"
		Then as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		And the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota of shared folder with quota when no quota is set for recipient
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has unlimited quota
		And user "user1" has a quota of "10 MB"
		And as an "user1"
		And user "user1" created a folder "/testquota"
		And as "user1" creating a share with
		  | path | testquota |
		  | shareType | 0 |
		  | permissions | 31 |
		  | shareWith | user0 |
		When as "user0" gets properties of folder "/testquota" with
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota when quota is set and a file was uploaded
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user0" has a quota of "1 KB"
		And user "user0" adds a file of 93 bytes to "/prueba.txt"
		When as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "529"

	Scenario: Retrieving folder quota when quota is set and a file was recieved
		Given using new dav path
		And as an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user1" has a quota of "1 KB"
		And user "user0" adds a file of 93 bytes to "/user0.txt"
		And file "user0.txt" of user "user0" is shared with user "user1"
		When as "user1" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "622"

	Scenario: download a public shared file with range
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When creating a share with
			| path | welcome.txt |
			| shareType | 3 |
		And downloading last public shared file with range "bytes=51-77"
		Then downloaded content should be "example file for developers"

	Scenario: download a public shared file inside a folder with range
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When creating a share with
			| path | PARENT |
			| shareType | 3 |
		And downloading last public shared file inside a folder "/parent.txt" with range "bytes=1-7"
		Then downloaded content should be "wnCloud"

	Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When downloading file "/welcome.txt"
		Then the following headers should be set
			|Content-Disposition|attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt"|
			|Content-Security-Policy|default-src 'none';|
			|X-Content-Type-Options |nosniff|
			|X-Download-Options|noopen|
			|X-Frame-Options|SAMEORIGIN|
			|X-Permitted-Cross-Domain-Policies|none|
			|X-Robots-Tag|none|
			|X-XSS-Protection|1; mode=block|
		And downloaded content should start with "Welcome to your ownCloud account!"

	Scenario: A file that is not shared does not have a share-types property
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/test"
		When as "user0" gets properties of folder "/test" with
			|{http://owncloud.org/ns}share-types|
		Then the response should contain an empty property "{http://owncloud.org/ns}share-types"

	Scenario: A file that is shared to a user has a share-types property
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/test"
		And as "user0" creating a share with
			| path | test |
			| shareType | 0 |
			| permissions | 31 |
			| shareWith | user1 |
		When as "user0" gets properties of folder "/test" with
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |

	Scenario: A file that is shared to a group has a share-types property
		Given using new dav path
		And user "user0" exists
		And group "group1" exists
		And user "user0" created a folder "/test"
		And as "user0" creating a share with
			| path | test |
			| shareType | 1 |
			| permissions | 31 |
			| shareWith | group1 |
		When as "user0" gets properties of folder "/test" with
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 1 |

	Scenario: A file that is shared by link has a share-types property
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/test"
		And as "user0" creating a share with
			| path | test |
			| shareType | 3 |
			| permissions | 31 |
		When as "user0" gets properties of folder "/test" with
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 3 |

	Scenario: A file that is shared by user,group and link has a share-types property
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And group "group2" exists
		And user "user0" created a folder "/test"
		And as "user0" creating a share with
			| path        | test  |
			| shareType   | 0     |
			| permissions | 31    |
			| shareWith   | user1 |
		And as "user0" creating a share with
			| path        | test  |
			| shareType   | 1     |
			| permissions | 31    |
			| shareWith   | group2 |
		And as "user0" creating a share with
			| path        | test  |
			| shareType   | 3     |
			| permissions | 31    |
		When as "user0" gets properties of folder "/test" with
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |
			| 1 |
			| 3 |

	Scenario: A disabled user cannot use webdav
		Given using new dav path
		And user "userToBeDisabled" exists
		And as an "admin"
		And assure user "userToBeDisabled" is disabled
		When downloading file "/welcome.txt" as "userToBeDisabled"
		Then the HTTP status code should be "503"

	Scenario: Creating a folder
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/test_folder"
		When as "user0" gets properties of folder "/test_folder" with
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"

	Scenario: Creating a folder with special chars
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/test_folder:5"
		When as "user0" gets properties of folder "/test_folder:5" with
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"

	Scenario: Removing everything of a folder
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt"
		And user "user0" created a folder "/FOLDER/SUBFOLDER"
		And user "user0" copies file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
		When user "user0" deletes everything from folder "/FOLDER/"
		Then user "user0" should see following elements
			| /FOLDER/ |
			| /PARENT/ |
			| /PARENT/parent.txt |
			| /textfile0.txt |
			| /textfile1.txt |
			| /textfile2.txt |
			| /textfile3.txt |
			| /textfile4.txt |

	Scenario: Checking file id after a move
		Given using new dav path
		And user "user0" exists
		And user "user0" stores id of file "/textfile0.txt"
		When user "user0" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt"
		Then user "user0" checks id of file "/FOLDER/textfile0.txt"

	Scenario: Renaming a folder to a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5C"
		Then the HTTP status code should be "400"

	Scenario: Renaming a folder beginning with a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5Ctestshare"
		Then the HTTP status code should be "400"

	Scenario: Renaming a folder including a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/hola%5Chola"
		Then the HTTP status code should be "400"

	Scenario: Renaming a folder into a banned name
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/.htaccess"
		Then the HTTP status code should be "403"

	Scenario: Move a folder into a not existing one
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/not-existing/testshare"
		Then the HTTP status code should be "409"

	Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When downloading file "/welcome.txt"
		Then the following headers should be set
			|Content-Disposition|attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt"|
			|Content-Security-Policy|default-src 'none';|
			|X-Content-Type-Options |nosniff|
			|X-Download-Options|noopen|
			|X-Frame-Options|SAMEORIGIN|
			|X-Permitted-Cross-Domain-Policies|none|
			|X-Robots-Tag|none|
			|X-XSS-Protection|1; mode=block|
		And downloaded content should start with "Welcome to your ownCloud account!"

	Scenario: Doing a GET with a web login should work without CSRF token on the new backend
		Given user "user0" exists
		And logging in using web as "user0"
		When sending a "GET" to "/remote.php/dav/files/user0/welcome.txt" without requesttoken
		Then downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"

	Scenario: Doing a GET with a web login should work with CSRF token on the new backend
		Given user "user0" exists
		And logging in using web as "user0"
		When sending a "GET" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
		Then downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"

	Scenario: Doing a PROPFIND with a web login should not work without CSRF token on the new backend
		Given user "user0" exists
		And logging in using web as "user0"
		When sending a "PROPFIND" to "/remote.php/dav/files/user0/welcome.txt" without requesttoken
		Then the HTTP status code should be "401"

	Scenario: Doing a PROPFIND with a web login should work with CSRF token on the new backend
		Given user "user0" exists
		And logging in using web as "user0"
		When sending a "PROPFIND" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
		Then the HTTP status code should be "207"

	Scenario: Setting custom DAV property and reading it
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/testcustomprop.txt"
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt" to "veryCustomPropValue"
		When as "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "veryCustomPropValue"

	Scenario: Setting custom DAV property and reading it after the file is renamed
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/testcustompropwithmove.txt"
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropwithmove.txt" to "valueForMovetest"
		And user "user0" moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
		When as "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/catchmeifyoucan.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForMovetest"

	Scenario: Setting custom DAV property on a shared file as an owner and reading as a recipient
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/testcustompropshared.txt"
		And as "user0" creating a share with
		  | path | testcustompropshared.txt |
		  | shareType | 0 |
		  | permissions | 31 |
		  | shareWith | user1 |
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt" to "valueForSharetest"
		And as an "user1"
		When as "user1" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForSharetest"

	Scenario: Setting custom DAV property using a new endpoint and reading it using an old endpoint
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/testnewold.txt"
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt" to "lucky"
		And using old dav path
		When as "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "lucky"

	## Specific scenarios for new endpoint	

	Scenario: Upload chunked file asc with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When as an "user0"
		And downloading file "/myChunkedFile.txt"
		Then downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file desc with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When as an "user0"
		And downloading file "/myChunkedFile.txt"
		Then downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file random with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When as an "user0"
		And downloading file "/myChunkedFile.txt"
		Then downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Checking file id after a move overwrite using new chunking endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" copies file "/textfile0.txt" to "/existingFile.txt"
		And user "user0" stores id of file "/existingFile.txt"
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/existingFile.txt"
		Then user "user0" checks id of file "/existingFile.txt"

	Scenario: Checking file id after a move between received shares
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/folderA"
		And user "user0" created a folder "/folderB"
		And folder "/folderA" of user "user0" is shared with user "user1"
		And folder "/folderB" of user "user0" is shared with user "user1"
		And user "user1" created a folder "/folderA/ONE"
		And user "user1" stores id of file "/folderA/ONE"
		And user "user1" created a folder "/folderA/ONE/TWO"
		When user "user1" moves folder "/folderA/ONE" to "/folderB/ONE"
		Then as "user1" the folder "/folderA" exists
		And as "user1" the folder "/folderA/ONE" does not exist
		# yes, a weird bug used to make this one fail
		And as "user1" the folder "/folderA/ONE/TWO" does not exist
		And as "user1" the folder "/folderB/ONE" exists
		And as "user1" the folder "/folderB/ONE/TWO" exists
		And user "user1" checks id of file "/folderB/ONE"

   ## Validation Plugin or Old Endpoint Specific

	Scenario: New chunked upload MKDIR using old dav path should fail
		Given using old dav path
		And user "user0" exists
		When user "user0" creates a new chunking upload with id "chunking-42"
		Then the HTTP status code should be "409"

	Scenario: New chunked upload PUT using old dav path should fail
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		When using old dav path
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		Then the HTTP status code should be "404"

	Scenario: New chunked upload MOVE using old dav path should fail
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		When using old dav path
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		Then the HTTP status code should be "404"

	Scenario: Upload to new dav path using old way should fail
		Given using new dav path
		And user "user0" exists
		When user "user0" uploads chunk file "1" of "3" with "AAAAA" to "/myChunkedFile.txt"
		Then the HTTP status code should be "503"

	Scenario: Upload file via new chunking endpoint with wrong size header
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 5
		Then the HTTP status code should be "400"

	Scenario: Upload file via new chunking endpoint with correct size header
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 15
		Then the HTTP status code should be "201"

	Scenario: Retrieving private link
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/somefile.txt"
		Then as "user0" gets properties of file "/somefile.txt" with
			|{http://owncloud.org/ns}privatelink|
		And the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "/(\/index.php\/f\/[0-9]*)/"

	Scenario: Copying file to a path with extension .part should not be possible
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" copies file "/welcome.txt" to "/welcome.part"
		Then the HTTP status code should be "400"

	Scenario: Uploading file to path with extension .part should not be possible
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		And user "user0" uploads file "data/textfile.txt" to "/textfile.part"
		Then the HTTP status code should be "400"

	Scenario: Renaming a file to a path with extension .part should not be possible
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/welcome.part"
		Then the HTTP status code should be "400"
		And as an "user0"
		When user "user0" moves file "/welcome.txt" to "/welcome.part"
		Then the HTTP status code should be "400"

	Scenario: Creating a directory which contains .part should not be possible
		Given using new dav path
		And user "user0" exists
		And as an "user0"
		When user "user0" created a folder "/folder.with.ext.part"
		Then the HTTP status code should be "400"
