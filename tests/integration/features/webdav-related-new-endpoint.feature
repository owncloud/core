Feature: webdav-related-new-endpoint
	Background:
		Given using api version "1"

	Scenario: Unauthenticated call
		Given using new dav path
		When connecting to dav endpoint
		Then the HTTP status code should be "401"
		And there are no duplicate headers
		And The following headers should be set
			|WWW-Authenticate|Basic realm="ownCloud"|

	Scenario: Moving a file
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		When User "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt"
		Then the HTTP status code should be "201"
		And Downloaded content when downloading file "/FOLDER/welcome.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving and overwriting a file
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		When User "user0" moves file "/welcome.txt" to "/textfile0.txt"
		Then the HTTP status code should be "204"
		And Downloaded content when downloading file "/textfile0.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Moving a file to a folder with no permissions
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And As an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And As an "user0"
		And User "user0" moves file "/textfile0.txt" to "/testshare/textfile0.txt"
		And the HTTP status code should be "403"
		When Downloading file "/testshare/textfile0.txt"
 		Then the HTTP status code should be "404"

	Scenario: Moving a file to overwrite a file in a folder with no permissions
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And As an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And User "user1" copies file "/welcome.txt" to "/testshare/overwritethis.txt"
		And As an "user0"
		When User "user0" moves file "/textfile0.txt" to "/testshare/overwritethis.txt"
		Then the HTTP status code should be "403"
		And Downloaded content when downloading file "/testshare/overwritethis.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: move file into a not-existing folder
		Given using new dav path
		And user "user0" exists
		And As an "user0"
		When User "user0" moves file "/welcome.txt" to "/not-existing/welcome.txt"
		Then the HTTP status code should be "409"

	Scenario: rename a file into an invalid filename
		Given using new dav path
		And user "user0" exists
		And As an "user0"
		When User "user0" moves file "/welcome.txt" to "/a\\a"
		Then the HTTP status code should be "400"

	@skip @issue-28441
	Scenario: rename a file into a banned filename
		Given using new dav path
		And user "user0" exists
		And As an "user0"
		When User "user0" moves file "/welcome.txt" to "/.htaccess"
		Then the HTTP status code should be "403"

	Scenario: Copying a file
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		When User "user0" copies file "/welcome.txt" to "/FOLDER/welcome.txt"
		Then the HTTP status code should be "201"
		And Downloaded content when downloading file "/FOLDER/welcome.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying and overwriting a file
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		When User "user0" copies file "/welcome.txt" to "/textfile1.txt"
		Then the HTTP status code should be "204"
		And Downloaded content when downloading file "/textfile1.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: Copying a file to a folder with no permissions
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And As an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And As an "user0"
		When User "user0" copies file "/textfile0.txt" to "/testshare/textfile0.txt"
		Then the HTTP status code should be "403"
		And Downloading file "/testshare/textfile0.txt"
		And the HTTP status code should be "404"

	Scenario: Copying a file to overwrite a file into a folder with no permissions
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And As an "user1"
		And user "user1" created a folder "/testshare"
		And as "user1" creating a share with
		  | path | testshare |
		  | shareType | 0 |
		  | permissions | 1 |
		  | shareWith | user0 |
		And User "user1" copies file "/welcome.txt" to "/testshare/overwritethis.txt"
		And As an "user0"
		When User "user0" copies file "/textfile0.txt" to "/testshare/overwritethis.txt"
		Then the HTTP status code should be "403"
		And Downloaded content when downloading file "/testshare/overwritethis.txt" with range "bytes=0-6" should be "Welcome"

	Scenario: download a file with range
		Given using new dav path
		And As an "admin"
		When Downloading file "/welcome.txt" with range "bytes=51-77"
		Then Downloaded content should be "example file for developers"

	Scenario: Retrieving folder quota when no quota is set
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		When user "user0" has unlimited quota
		Then as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		And the single response should contain a property "{DAV:}quota-available-bytes" with value "-3"

	Scenario: Retrieving folder quota when quota is set
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		When user "user0" has a quota of "10 MB"
		Then as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		And the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota of shared folder with quota when no quota is set for recipient
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" has unlimited quota
		And user "user1" has a quota of "10 MB"
		And As an "user1"
		And user "user1" created a folder "/testquota"
		And as "user1" creating a share with
		  | path | testquota |
		  | shareType | 0 |
		  | permissions | 31 |
		  | shareWith | user0 |
		Then as "user0" gets properties of folder "/testquota" with
		  |{DAV:}quota-available-bytes|
		And the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"

	Scenario: Retrieving folder quota when quota is set and a file was uploaded
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user0" has a quota of "1 KB"
		And user "user0" adds a file of 93 bytes to "/prueba.txt"
		When as "user0" gets properties of folder "/" with
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "529"

	Scenario: Retrieving folder quota when quota is set and a file was recieved
		Given using new dav path
		And As an "admin"
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
		And As an "user0"
		When creating a share with
			| path | welcome.txt |
			| shareType | 3 |
		And Downloading last public shared file with range "bytes=51-77"
		Then Downloaded content should be "example file for developers"

	Scenario: download a public shared file inside a folder with range
		Given using new dav path
		And user "user0" exists
		And As an "user0"
		When creating a share with
			| path | PARENT |
			| shareType | 3 |
		And Downloading last public shared file inside a folder "/parent.txt" with range "bytes=1-7"
		Then Downloaded content should be "wnCloud"

	Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new dav path
		And As an "admin"
		When Downloading file "/welcome.txt"
		Then The following headers should be set
			|Content-Disposition|attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt"|
			|Content-Security-Policy|default-src 'none';|
			|X-Content-Type-Options |nosniff|
			|X-Download-Options|noopen|
			|X-Frame-Options|SAMEORIGIN|
			|X-Permitted-Cross-Domain-Policies|none|
			|X-Robots-Tag|none|
			|X-XSS-Protection|1; mode=block|
		And Downloaded content should start with "Welcome to your ownCloud account!"

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
		And As an "admin"
		And assure user "userToBeDisabled" is disabled
		When Downloading file "/welcome.txt" as "userToBeDisabled"
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
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		And User "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt"
		And user "user0" created a folder "/FOLDER/SUBFOLDER"
		And User "user0" copies file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
		When User "user0" deletes everything from folder "/FOLDER/"
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
		And User "user0" stores id of file "/textfile0.txt"
		When User "user0" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt"
		Then User "user0" checks id of file "/FOLDER/textfile0.txt"

	Scenario: Renaming a folder to a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When User "user0" moves folder "/testshare" to "/%5C"
		Then the HTTP status code should be "400"

	Scenario: Renaming a folder beginning with a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When User "user0" moves folder "/testshare" to "/%5Ctestshare"
		Then the HTTP status code should be "400"

	Scenario: Renaming a folder including a backslash encoded should return an error using new endpoint
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When User "user0" moves folder "/testshare" to "/hola%5Chola"
		Then the HTTP status code should be "400"

	@skip @issue-28441
	Scenario: Renaming a folder into a banned name
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When User "user0" moves folder "/testshare" to "/.htaccess"
		Then the HTTP status code should be "403"

	Scenario: Move a folder into a not existing one
		Given using new dav path
		And user "user0" exists
		And user "user0" created a folder "/testshare"
		When User "user0" moves folder "/testshare" to "/not-existing/testshare"
		Then the HTTP status code should be "409"

		Scenario: Downloading a file on the new endpoint should serve security headers
		Given using new dav path
		And As an "admin"
		When Downloading file "/welcome.txt"
		Then The following headers should be set
			|Content-Disposition|attachment; filename*=UTF-8''welcome.txt; filename="welcome.txt"|
			|Content-Security-Policy|default-src 'none';|
			|X-Content-Type-Options |nosniff|
			|X-Download-Options|noopen|
			|X-Frame-Options|SAMEORIGIN|
			|X-Permitted-Cross-Domain-Policies|none|
			|X-Robots-Tag|none|
			|X-XSS-Protection|1; mode=block|
		And Downloaded content should start with "Welcome to your ownCloud account!"

	Scenario: Doing a GET with a web login should work without CSRF token on the new backend
		Given Logging in using web as "admin"
		When Sending a "GET" to "/remote.php/dav/files/admin/welcome.txt" without requesttoken
		Then Downloaded content should start with "Welcome to your ownCloud account!"
		Then the HTTP status code should be "200"

	Scenario: Doing a GET with a web login should work with CSRF token on the new backend
		Given Logging in using web as "admin"
		When Sending a "GET" to "/remote.php/dav/files/admin/welcome.txt" with requesttoken
		Then Downloaded content should start with "Welcome to your ownCloud account!"
		Then the HTTP status code should be "200"

	Scenario: Doing a PROPFIND with a web login should not work without CSRF token on the new backend
		Given Logging in using web as "admin"
		When Sending a "PROPFIND" to "/remote.php/dav/files/admin/welcome.txt" without requesttoken
		Then the HTTP status code should be "401"

	Scenario: Doing a PROPFIND with a web login should work with CSRF token on the new backend
		Given Logging in using web as "admin"
		When Sending a "PROPFIND" to "/remote.php/dav/files/admin/welcome.txt" with requesttoken
		Then the HTTP status code should be "207"

	Scenario: Setting custom DAV property and reading it
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		And User "user0" uploads file "data/textfile.txt" to "/testcustomprop.txt"
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt" to "veryCustomPropValue"
		When as "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "veryCustomPropValue"

	Scenario: Setting custom DAV property and reading it after the file is renamed
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And As an "user0"
		And User "user0" uploads file "data/textfile.txt" to "/testcustompropwithmove.txt"
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropwithmove.txt" to "valueForMovetest"
		And User "user0" moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
		When as "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/catchmeifyoucan.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForMovetest"
		
	Scenario: Setting custom DAV property on a shared file as an owner and reading as a recipient
		Given using new dav path
		And As an "admin"
		And user "user0" exists
		And user "user1" exists
		And As an "user0"
		And User "user0" uploads file "data/textfile.txt" to "/testcustompropshared.txt"
		And as "user0" creating a share with
		  | path | testcustompropshared.txt |
		  | shareType | 0 |
		  | permissions | 31 |
		  | shareWith | user1 |
		And "user0" sets property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt" to "valueForSharetest"
		And As an "user1"
		When as "user1" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropshared.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForSharetest"

	## Specific scenarios for new endpoint	

	Scenario: Upload chunked file asc with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When As an "user0"
		And Downloading file "/myChunkedFile.txt"
		Then Downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file desc with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When As an "user0"
		And Downloading file "/myChunkedFile.txt"
		Then Downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Upload chunked file random with new chunking
		Given using new dav path
		And user "user0" exists
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt"
		When As an "user0"
		And Downloading file "/myChunkedFile.txt"
		Then Downloaded content should be "AAAAABBBBBCCCCC"

	Scenario: Checking file id after a move overwrite using new chunking endpoint
		Given using new dav path
		And user "user0" exists
		And User "user0" copies file "/textfile0.txt" to "/existingFile.txt"
		And User "user0" stores id of file "/existingFile.txt"
		And user "user0" creates a new chunking upload with id "chunking-42"
		And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42"
		And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42"
		And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42"
		When user "user0" moves new chunk file with id "chunking-42" to "/existingFile.txt"
		Then User "user0" checks id of file "/existingFile.txt"

	Scenario: Checking file id after a move between received shares
		Given using new dav path
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/folderA"
		And user "user0" created a folder "/folderB"
		And folder "/folderA" of user "user0" is shared with user "user1"
		And folder "/folderB" of user "user0" is shared with user "user1"
		And user "user1" created a folder "/folderA/ONE"
		And User "user1" stores id of file "/folderA/ONE"
		And user "user1" created a folder "/folderA/ONE/TWO"
		When User "user1" moves folder "/folderA/ONE" to "/folderB/ONE"
		Then as "user1" the folder "/folderA" exists
		And as "user1" the folder "/folderA/ONE" does not exist
		# yes, a weird bug used to make this one fail
		And as "user1" the folder "/folderA/ONE/TWO" does not exist
		And as "user1" the folder "/folderB/ONE" exists
		And as "user1" the folder "/folderB/ONE/TWO" exists
		And User "user1" checks id of file "/folderB/ONE"

