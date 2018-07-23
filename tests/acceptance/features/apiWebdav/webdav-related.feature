@api
Feature: webdav-related
	Background:
		Given using OCS API version "1"

	Scenario Outline: Unauthenticated call
		Given using <dav_version> DAV path
		When an unauthenticated client connects to the dav endpoint using the WebDAV API
		Then the HTTP status code should be "401"
		And there should be no duplicate headers
		And the following headers should be set
			| WWW-Authenticate | Basic realm="ownCloud", charset="UTF-8" |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Moving a file
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt" using the WebDAV API
		Then the HTTP status code should be "201"
		And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Moving and overwriting a file
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/textfile0.txt" using the WebDAV API
		Then the HTTP status code should be "204"
		And the downloaded content when downloading file "/textfile0.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Moving a file to a folder with no permissions
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		When user "user0" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
		Then the HTTP status code should be "403"
		When user "user0" downloads the file "/testshare/textfile0.txt" using the WebDAV API
 		Then the HTTP status code should be "404"
 		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Moving a file to overwrite a file in a folder with no permissions
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		And user "user1" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
		When user "user0" moves file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
		Then the HTTP status code should be "403"
		And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: move file into a not-existing folder
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/not-existing/welcome.txt" using the WebDAV API
		Then the HTTP status code should be "409"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: rename a file into an invalid filename
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/a\\a" using the WebDAV API
		Then the HTTP status code should be "400"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: rename a file into a banned filename
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/.htaccess" using the WebDAV API
		Then the HTTP status code should be "403"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying a file
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/FOLDER/welcome.txt" using the WebDAV API
		Then the HTTP status code should be "201"
		And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying and overwriting a file
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/textfile1.txt" using the WebDAV API
		Then the HTTP status code should be "204"
		And the downloaded content when downloading file "/textfile1.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying a file to a folder with no permissions
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		When user "user0" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
		Then the HTTP status code should be "403"
		And user "user0" downloads the file "/testshare/textfile0.txt" using the WebDAV API
		And the HTTP status code should be "404"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying a file to overwrite a file into a folder with no permissions
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user1" has created a folder "/testshare"
		And user "user1" has created a share with settings
			| path        | testshare |
			| shareType   | 0         |
			| permissions | 1         |
			| shareWith   | user0     |
		And user "user1" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
		When user "user0" copies file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
		Then the HTTP status code should be "403"
		And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: download a file
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" downloads the file "/textfile0.txt" using the WebDAV API
		Then the downloaded content should be "ownCloud test text file" plus end-of-line
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: download a file with range
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" downloads file "/welcome.txt" with range "bytes=51-77" using the WebDAV API
		Then the downloaded content should be "example file for developers"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: upload a file and check download content
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" uploads file with content "uploaded content" to "<file_name>" using the WebDAV API
		Then the content of file "<file_name>" for user "user0" should be "uploaded content"
		Examples:
			| dav_version | file_name         |
			| old         | /upload.txt       |
			| old         | /strängé file.txt |
			| old         | /C++ file.cpp     |
			| old         | /नेपाली.txt       |
			| old         | /file #2.txt      |
			| old         | /file ?2.txt      |
			| new         | /upload.txt       |
			| new         | /strängé file.txt |
			| new         | /C++ file.cpp     |
			| new         | /नेपाली.txt       |
			| new         | /file #2.txt      |
			| new         | /file ?2.txt      |

	Scenario Outline: create a folder
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" creates a folder "<folder_name>" using the WebDAV API
		Then as "user0" the folder "<folder_name>" should exist
		Examples:
			| dav_version | folder_name     |
			| old         | /upload         |
			| old         | /strängé folder |
			| old         | /C++ folder.cpp |
			| old         | /नेपाली         |
			| old         | /folder #2      |
			| old         | /folder ?2      |
			| new         | /upload         |
			| new         | /strängé folder |
			| new         | /C++ folder.cpp |
			| new         | /नेपाली         |
			| new         | /folder #2      |
			| new         | /folder ?2      |

	Scenario Outline: upload a file into a folder and check download content
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "<folder_name>"
		When user "user0" uploads file with content "uploaded content" to "<folder_name>/<file_name>" using the WebDAV API
		Then the content of file "<folder_name>/<file_name>" for user "user0" should be "uploaded content"
		Examples:
			| dav_version | folder_name                      | file_name                     |
			| old         | /upload                          | abc.txt                       |
			| old         | /strängé folder                  | strängé file.txt              |
			| old         | /C++ folder                      | C++ file.cpp                  |
			| old         | /नेपाली                          | नेपाली                        |
			| old         | /folder #2.txt                   | file #2.txt                   |
			| old         | /folder ?2.txt                   | file ?2.txt                   |
			| new         | /upload                          | abc.txt                       |
			| new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
			| new         | /C++ folder                      | C++ file.cpp                  |
			| new         | /नेपाली                          | नेपाली                        |
			| new         | /folder #2.txt                   | file #2.txt                   |
			| new         | /folder ?2.txt                   | file ?2.txt                   |

	Scenario Outline: Do a PROPFIND of various file names
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file with content "uploaded content" to "<file_name>"
		When user "user0" gets the properties of file "<file_name>" using the WebDAV API
		Then the properties response should contain an etag
		Examples:
			| dav_version | file_name         |
			| old         | /upload.txt       |
			| old         | /strängé file.txt |
			| old         | /C++ file.cpp     |
			| old         | /नेपाली.txt       |
			| old         | /file #2.txt      |
			| old         | /file ?2.txt      |
			| new         | /upload.txt       |
			| new         | /strängé file.txt |
			| new         | /C++ file.cpp     |
			| new         | /नेपाली.txt       |
			| new         | /file #2.txt      |
			| new         | /file ?2.txt      |

	Scenario Outline: Do a PROPFIND of various folder/file names
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "<folder_name>"
		And user "user0" has uploaded file with content "uploaded content" to "<folder_name>/<file_name>"
		When user "user0" gets the properties of file "<folder_name>/<file_name>" using the WebDAV API
		Then the properties response should contain an etag
		Examples:
			| dav_version | folder_name                      | file_name                     |
			| old         | /upload                          | abc.txt                       |
			| old         | /strängé folder                  | strängé file.txt              |
			| old         | /C++ folder                      | C++ file.cpp                  |
			| old         | /नेपाली                          | नेपाली                        |
			| old         | /folder #2.txt                   | file #2.txt                   |
			| old         | /folder ?2.txt                   | file ?2.txt                   |
			| new         | /upload                          | abc.txt                       |
			| new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
			| new         | /C++ folder                      | C++ file.cpp                  |
			| new         | /नेपाली                          | नेपाली                        |
			| new         | /folder #2.txt                   | file #2.txt                   |
			| new         | /folder ?2.txt                   | file ?2.txt                   |

	Scenario Outline: Retrieving folder quota when no quota is set
		Given using <dav_version> DAV path
		And user "user0" has been created
		When the administrator gives unlimited quota to user "user0" using the provisioning API
		And user "user0" gets the following properties of folder "/" using the WebDAV API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "-3"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving folder quota when quota is set
		Given using <dav_version> DAV path
		And user "user0" has been created
		When the administrator sets the quota of user "user0" to "10 MB" using the provisioning API
		And user "user0" gets the following properties of folder "/" using the WebDAV API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving folder quota of shared folder with quota when no quota is set for recipient
		Given using <dav_version> DAV path
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
		When user "user0" gets the following properties of folder "/testquota" using the WebDAV API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485358"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving folder quota when quota is set and a file was uploaded
		Given using <dav_version> DAV path
		And user "user0" has been created
		And the quota of user "user0" has been set to "1 KB"
		And user "user0" has added file "/prueba.txt" of 93 bytes
		When user "user0" gets the following properties of folder "/" using the WebDAV API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "529"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving folder quota when quota is set and a file was recieved
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And the quota of user "user1" has been set to "1 KB"
		And user "user0" has added file "/user0.txt" of 93 bytes
		And user "user0" has shared file "user0.txt" with user "user1"
		When user "user1" gets the following properties of folder "/" using the WebDAV API
		  |{DAV:}quota-available-bytes|
		Then the single response should contain a property "{DAV:}quota-available-bytes" with value "622"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: download a public shared file with range
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" creates a share using the sharing API with settings
			| path      | welcome.txt |
			| shareType | 3           |
		And the public downloads the last public shared file with range "bytes=51-77" using the old WebDAV API
		Then the downloaded content should be "example file for developers"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: download a public shared file inside a folder with range
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" creates a share using the sharing API with settings
			| path      | PARENT |
			| shareType | 3      |
		And the public downloads file "/parent.txt" from inside the last public shared folder with range "bytes=1-7" using the old WebDAV API
		Then the downloaded content should be "wnCloud"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Downloading a file should serve security headers
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" downloads the file "/welcome.txt" using the WebDAV API
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
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A file that is not shared does not have a share-types property
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test"
		When user "user0" gets the following properties of folder "/test" using the WebDAV API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain an empty property "{http://owncloud.org/ns}share-types"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A file that is shared to a user has a share-types property
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test  |
			| shareType   | 0     |
			| permissions | 31    |
			| shareWith   | user1 |
		When user "user0" gets the following properties of folder "/test" using the WebDAV API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A file that is shared to a group has a share-types property
		Given using <dav_version> DAV path
		And user "user0" has been created
		And group "group1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test   |
			| shareType   | 1      |
			| permissions | 31     |
			| shareWith   | group1 |
		When user "user0" gets the following properties of folder "/test" using the WebDAV API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 1 |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A file that is shared by link has a share-types property
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has created a share with settings
			| path        | test |
			| shareType   | 3    |
			| permissions | 31   |
		When user "user0" gets the following properties of folder "/test" using the WebDAV API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 3 |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A file that is shared by user,group and link has a share-types property
		Given using <dav_version> DAV path
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
		When user "user0" gets the following properties of folder "/test" using the WebDAV API
			|{http://owncloud.org/ns}share-types|
		Then the response should contain a share-types property with
			| 0 |
			| 1 |
			| 3 |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: A disabled user cannot use webdav
		Given using <dav_version> DAV path
		And user "userToBeDisabled" has been created
		And user "userToBeDisabled" has been disabled
		When user "userToBeDisabled" downloads the file "/welcome.txt" using the WebDAV API
		Then the HTTP status code should be "401"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Creating a folder
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test_folder"
		When user "user0" gets the following properties of folder "/test_folder" using the WebDAV API
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Creating a folder with special chars
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/test_folder:5"
		When user "user0" gets the following properties of folder "/test_folder:5" using the WebDAV API
		  |{DAV:}resourcetype|
		Then the single response should contain a property "{DAV:}resourcetype" with value "{DAV:}collection"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Removing everything of a folder
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has moved file "/welcome.txt" to "/FOLDER/welcome.txt"
		And user "user0" has created a folder "/FOLDER/SUBFOLDER"
		And user "user0" has copied file "/textfile0.txt" to "/FOLDER/SUBFOLDER/testfile0.txt"
		When user "user0" deletes everything from folder "/FOLDER/" using the WebDAV API
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
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Checking file id after a move
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has stored id of file "/textfile0.txt"
		When user "user0" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
		Then user "user0" file "/FOLDER/textfile0.txt" should have the previously stored id
		And user "user0" should not see the following elements
			| /textfile0.txt |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a folder to a backslash encoded should return an error
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5C" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a folder beginning with a backslash encoded should return an error
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/%5Ctestshare" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a folder including a backslash encoded should return an error
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/hola%5Chola" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /testshare/ |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a folder into a banned name
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/.htaccess" using the WebDAV API
		Then the HTTP status code should be "403"
		And user "user0" should see the following elements
			| /testshare/ |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Move a folder into a not existing one
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has created a folder "/testshare"
		When user "user0" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
		Then the HTTP status code should be "409"
		And user "user0" should see the following elements
			| /testshare/ |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Downloading a file should serve security headers
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" downloads the file "/welcome.txt" using the WebDAV API
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
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Doing a GET with a web login should work without CSRF token on the new backend
		Given user "user0" has been created
		And using <dav_version> DAV path
		And user "user0" has logged in to a web-style session
		When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" without requesttoken
		Then the downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Doing a GET with a web login should work with CSRF token on the new backend
		Given user "user0" has been created
		And using <dav_version> DAV path
		And user "user0" has logged in to a web-style session
		When the client sends a "GET" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
		Then the downloaded content should start with "Welcome to your ownCloud account!"
		And the HTTP status code should be "200"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Doing a PROPFIND with a web login should work with CSRF token on the new backend
		Given user "user0" has been created
		And using <dav_version> DAV path
		And user "user0" has logged in to a web-style session
		When the client sends a "PROPFIND" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
		Then the HTTP status code should be "207"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Setting custom DAV property and reading it
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testcustomprop.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt" to "veryCustomPropValue"
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testcustomprop.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "veryCustomPropValue"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Setting custom DAV property and reading it after the file is renamed
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/testcustompropwithmove.txt"
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testcustompropwithmove.txt" to "valueForMovetest"
		And user "user0" has moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/catchmeifyoucan.txt"
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "valueForMovetest"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Setting custom DAV property on a shared file as an owner and reading as a recipient
		Given using <dav_version> DAV path
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
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Setting custom DAV property using one endpoint and reading it with other endpoint
		Given using <action_dav_version> DAV path	
		And user "user0" has been created	
		And user "user0" has uploaded file "data/textfile.txt" to "/testnewold.txt"	
		And user "user0" has set property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt" to "lucky"	
		And using <other_dav_version> DAV path	
		When user "user0" gets a custom property "{http://whatever.org/ns}very-custom-prop" of file "/testnewold.txt"	
		Then the response should contain a custom "{http://whatever.org/ns}very-custom-prop" property with "lucky"
		Examples:
		| action_dav_version | other_dav_version |
		| old                | new               |
		| new                | old               |

	Scenario Outline: Checking file id after a move between received shares
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/folderA"
		And user "user0" has created a folder "/folderB"
		And user "user0" has shared folder "/folderA" with user "user1"
		And user "user0" has shared folder "/folderB" with user "user1"
		And user "user1" has created a folder "/folderA/ONE"
		And user "user1" has stored id of file "/folderA/ONE"
		And user "user1" has created a folder "/folderA/ONE/TWO"
		When user "user1" moves folder "/folderA/ONE" to "/folderB/ONE" using the WebDAV API
		Then as "user1" the folder "/folderA" should exist
		And as "user1" the folder "/folderA/ONE" should not exist
		# yes, a weird bug used to make this one fail
		And as "user1" the folder "/folderA/ONE/TWO" should not exist
		And as "user1" the folder "/folderB/ONE" should exist
		And as "user1" the folder "/folderB/ONE/TWO" should exist
		And user "user1" file "/folderB/ONE" should have the previously stored id
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving private link
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/somefile.txt"
		When user "user0" gets the following properties of file "/somefile.txt" using the WebDAV API
			|{http://owncloud.org/ns}privatelink|
		Then the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying file to a path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/welcome.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Uploading file to path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/textfile.part"
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /textfile.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a file to a path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/welcome.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Creating a directory which contains .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" creates a folder "/folder.with.ext.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /folder.with.ext.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Retrieving private link
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user0" has uploaded file "data/textfile.txt" to "/somefile.txt"
		When user "user0" gets the following properties of file "/somefile.txt" using the WebDAV API
			|{http://owncloud.org/ns}privatelink|
		Then the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Copying file to a path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" copies file "/welcome.txt" to "/welcome.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Uploading file to path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" uploads file "data/textfile.txt" to "/textfile.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /textfile.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Renaming a file to a path with extension .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" moves file "/welcome.txt" to "/welcome.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should see the following elements
			| /welcome.txt |
		But user "user0" should not see the following elements
			| /welcome.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: Creating a directory which contains .part should not be possible
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" creates a folder "/folder.with.ext.part" using the WebDAV API
		Then the HTTP status code should be "400"
		And user "user0" should not see the following elements
			| /folder.with.ext.part |
		Examples:
			| dav_version   |
			| old           |
			| new           |