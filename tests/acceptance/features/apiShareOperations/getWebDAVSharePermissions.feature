@api @TestAlsoOnExternalUserBackend
Feature: sharing
	Background:
		Given using OCS API version "1"
		And using old DAV path
		And user "user0" has been created
		And user "user1" has been created

	@smokeTest
	Scenario: Correct webdav share-permissions for owned file
		Given user "user0" has uploaded file with content "foo" to "/tmp.txt"
		When user "user0" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "19"

	Scenario: Correct webdav share-permissions for received file with edit and reshare permissions
		Given user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has shared file "/tmp.txt" with user "user1"
		When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "19"

	Scenario: Correct webdav share-permissions for received group shared file with edit and reshare permissions
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has created a share with settings
			| path        | /tmp.txt   |
			| shareType   | 1          |
			| permissions | 19         |
			| shareWith   | grp1       |
		When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "19"

	Scenario: Correct webdav share-permissions for received file with edit permissions but no reshare permissions
		Given user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has shared file "tmp.txt" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 3 |
		And user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "3"

	Scenario: Correct webdav share-permissions for received group shared file with edit permissions but no reshare permissions
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has created a share with settings
			| path        | /tmp.txt   |
			| shareType   | 1          |
			| permissions | 3          |
			| shareWith   | grp1       |
		When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "3"

	Scenario: Correct webdav share-permissions for received file with reshare permissions but no edit permissions
		Given user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has shared file "tmp.txt" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 17 |
		And user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "17"

	Scenario: Correct webdav share-permissions for received group shared file with reshare permissions but no edit permissions
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has uploaded file with content "foo" to "/tmp.txt"
		And user "user0" has created a share with settings
			| path        | /tmp.txt   |
			| shareType   | 1          |
			| permissions | 17         |
			| shareWith   | grp1       |
		When user "user1" gets the following properties of file "/tmp.txt" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "17"

	Scenario: Correct webdav share-permissions for owned folder
		Given user "user0" has created a folder "/tmp"
		When user "user0" gets the following properties of folder "/" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "31"

	Scenario: Correct webdav share-permissions for received folder with all permissions
		Given user "user0" has created a folder "/tmp"
		And user "user0" has shared file "/tmp" with user "user1"
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "31"

	Scenario: Correct webdav share-permissions for received group shared folder with all permissions
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a folder "/tmp"
		And user "user0" has created a share with settings
			| path        | tmp        |
			| shareType   | 1          |
			| shareWith   | grp1       |
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "31"

	Scenario: Correct webdav share-permissions for received folder with all permissions but edit
		Given user "user0" has created a folder "/tmp"
		And user "user0" has shared file "/tmp" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 29 |
		And user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "29"

	Scenario: Correct webdav share-permissions for received group shared folder with all permissions but edit
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a folder "/tmp"
		And user "user0" has created a share with settings
			| path        | tmp        |
			| shareType   | 1          |
			| shareWith   | grp1       |
			| permissions | 29         |
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "29"

	Scenario: Correct webdav share-permissions for received folder with all permissions but create
		Given user "user0" has created a folder "/tmp"
		And user "user0" has shared file "/tmp" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 27 |
		And user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "27"

	Scenario: Correct webdav share-permissions for received group shared folder with all permissions but create
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a folder "/tmp"
		And user "user0" has created a share with settings
			| path        | tmp        |
			| shareType   | 1          |
			| shareWith   | grp1       |
			| permissions | 27         |
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "27"

	Scenario: Correct webdav share-permissions for received folder with all permissions but delete
		Given user "user0" has created a folder "/tmp"
		And user "user0" has shared file "/tmp" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 23 |
		And user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "23"

	Scenario: Correct webdav share-permissions for received group shared folder with all permissions but delete
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a folder "/tmp"
		And user "user0" has created a share with settings
			| path        | tmp        |
			| shareType   | 1          |
			| shareWith   | grp1       |
			| permissions | 23         |
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "23"

	Scenario: Correct webdav share-permissions for received folder with all permissions but share
		Given user "user0" has created a folder "/tmp"
		And user "user0" has shared file "/tmp" with user "user1"
		When user "user0" updates the last share using the sharing API with
			| permissions | 15 |
		And user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "15"

	Scenario: Correct webdav share-permissions for received group shared folder with all permissions but share
		Given group "grp1" has been created
		And user "user1" has been added to group "grp1"
		And user "user0" has created a folder "/tmp"
		And user "user0" has created a share with settings
			| path        | tmp        |
			| shareType   | 1          |
			| shareWith   | grp1       |
			| permissions | 15         |
		When user "user1" gets the following properties of folder "/tmp" using the WebDAV API
			|{http://open-collaboration-services.org/ns}share-permissions |
		Then the single response should contain a property "{http://open-collaboration-services.org/ns}share-permissions" with value "15"