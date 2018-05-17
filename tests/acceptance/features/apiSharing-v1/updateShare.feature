@api
Feature: sharing
	Background:
		Given using API version "1"
		And using old DAV path

	Scenario: Allow modification of reshare
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user0" has created a folder "/TMP"
		And user "user0" has shared file "TMP" with user "user1"
		And user "user1" has shared file "TMP" with user "user2"
		When user "user1" updates the last share using the API with
			| permissions | 1 |
		Then the OCS status code should be "100"

	Scenario: Creating a new public share, updating its expiration date and getting its info
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | FOLDER |
			| shareType | 3      |
		And the user updates the last share using the API with
			| expireDate | +3 days |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 3                    |
			| file_source       | A_NUMBER             |
			| file_target       | /FOLDER              |
			| permissions       | 1                    |
			| stime             | A_NUMBER             |
			| expiration        | +3 days              |
			| token             | A_TOKEN              |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user0                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user0                |
			| url               | AN_URL               |
			| mimetype          | httpd/unix-directory |

	Scenario: Creating a new public share with password and adding an expiration date
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | welcome.txt |
			| shareType | 3           |
			| password  | publicpw    |
		And the user updates the last share using the API with
			| expireDate | +3 days |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the last public shared file should be able to be downloaded with password "publicpw"

	Scenario: Creating a new public share, updating its expiration date and getting its info
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | FOLDER |
			| shareType | 3      |
		And the user updates the last share using the API with
			| expireDate | +3 days |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 3                    |
			| file_source       | A_NUMBER             |
			| file_target       | /FOLDER              |
			| permissions       | 1                    |
			| stime             | A_NUMBER             |
			| expiration        | +3 days              |
			| token             | A_TOKEN              |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user0                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user0                |
			| url               | AN_URL               |
			| mimetype          | httpd/unix-directory |

	Scenario: Creating a new public share, updating its password and getting its info
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | FOLDER |
			| shareType | 3      |
		And the user updates the last share using the API with
			| password | publicpw |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 3                    |
			| file_source       | A_NUMBER             |
			| file_target       | /FOLDER              |
			| permissions       | 1                    |
			| stime             | A_NUMBER             |
			| token             | A_TOKEN              |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user0                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user0                |
			| url               | AN_URL               |
			| mimetype          | httpd/unix-directory |

	Scenario: Creating a new public share, updating its permissions and getting its info
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | FOLDER |
			| shareType | 3      |
		And the user updates the last share using the API with
			| permissions | 7 |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 3                    |
			| file_source       | A_NUMBER             |
			| file_target       | /FOLDER              |
			| permissions       | 15                   |
			| stime             | A_NUMBER             |
			| token             | A_TOKEN              |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user0                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user0                |
			| url               | AN_URL               |
			| mimetype          | httpd/unix-directory |

	Scenario: Creating a new public share, updating publicUpload option and getting its info
		Given user "user0" has been created
		And as user "user0"
		When the user creates a share using the API with settings
			| path      | FOLDER |
			| shareType | 3      |
		And the user updates the last share using the API with
			| publicUpload | true |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 3                    |
			| file_source       | A_NUMBER             |
			| file_target       | /FOLDER              |
			| permissions       | 15                   |
			| stime             | A_NUMBER             |
			| token             | A_TOKEN              |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user0                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user0                |
			| url               | AN_URL               |
			| mimetype          | httpd/unix-directory |

				Scenario: keep group permissions in sync
		Given user "user0" has been created
		And user "user1" has been created
		And group "group1" has been created
		And user "user1" has been added to group "group1"
		And user "user0" has shared file "textfile0.txt" with group "group1"
		And user "user1" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
		And as user "user0"
		When the user updates the last share using the API with
			| permissions | 1 |
		And the user gets the info of the last share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                | A_NUMBER       |
			| item_type         | file           |
			| item_source       | A_NUMBER       |
			| share_type        | 1              |
			| file_source       | A_NUMBER       |
			| file_target       | /textfile0.txt |
			| permissions       | 1              |
			| stime             | A_NUMBER       |
			| storage           | A_NUMBER       |
			| mail_send         | 0              |
			| uid_owner         | user0          |
			| file_parent       | A_NUMBER       |
			| displayname_owner | user0          |
			| mimetype          | text/plain     |

	Scenario: Adding public upload to a read only shared folder as recipient is not allowed
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has shared folder "/test" with user "user1" with permissions 17
		And as user "user1"
		And the user has created a share with settings
			| path         | /test |
			| shareType    | 3     |
			| publicUpload | false |
		When the user updates the last share using the API with
			| publicUpload | true |
		Then the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: Cannot set permissions to zero
		Given user "user0" has been created
		And user "user1" has been created
		And group "new-group" has been created
		And user "user0" has been added to group "new-group"
		And user "user1" has been added to group "new-group"
		And user "user0" has been made a subadmin of group "new-group"
		And user "user0" has shared folder "/FOLDER" with group "new-group"
		When user "user0" updates the last share using the API with
			| permissions | 0 |
		Then the OCS status code should be "400"

	Scenario: Share ownership change after moving a shared file outside of an outer share
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user0" has created a folder "/folder1"
		And user "user0" has created a folder "/folder1/folder2"
		And user "user1" has created a folder "/moved-out"
		And user "user0" has shared folder "/folder1" with user "user1" with permissions 31
		And user "user1" has shared folder "/folder1/folder2" with user "user2" with permissions 31
		When user "user1" moves folder "/folder1/folder2" to "/moved-out/folder2" using the API
		And user "user1" gets the info of the last share using the API
		Then the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 0                    |
			| file_source       | A_NUMBER             |
			| file_target       | /folder2             |
			| permissions       | 31                   |
			| stime             | A_NUMBER             |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user1                |
			| storage_id        | home::user1          |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user1                |
			| mimetype          | httpd/unix-directory |
		And as "user0" the folder "/folder1/folder2" should not exist
		And as "user2" the folder "/folder2" should exist

	Scenario: Share ownership change after moving a shared file to another share
		Given user "user0" has been created
		And user "user1" has been created
		And user "user2" has been created
		And user "user0" has created a folder "/user0-folder"
		And user "user0" has created a folder "/user0-folder/folder2"
		And user "user2" has created a folder "/user2-folder"
		And user "user0" has shared folder "/user0-folder" with user "user1" with permissions 31
		And user "user2" has shared folder "/user2-folder" with user "user1" with permissions 31
		When user "user1" moves folder "/user0-folder/folder2" to "/user2-folder/folder2" using the API
		And user "user1" gets the info of the last share using the API
		Then the share fields of the last share should include
			| id                | A_NUMBER             |
			| item_type         | folder               |
			| item_source       | A_NUMBER             |
			| share_type        | 0                    |
			| file_source       | A_NUMBER             |
			| file_target       | /user2-folder        |
			| permissions       | 31                   |
			| stime             | A_NUMBER             |
			| storage           | A_NUMBER             |
			| mail_send         | 0                    |
			| uid_owner         | user2                |
			| file_parent       | A_NUMBER             |
			| displayname_owner | user2                |
			| mimetype          | httpd/unix-directory |
		And as "user0" the folder "/user0-folder/folder2" should not exist
		And as "user2" the folder "/user2-folder/folder2" should exist

	Scenario: Adding public upload to a shared folder as recipient is allowed with permissions
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has shared folder "/test" with user "user1" with permissions 31
		And as user "user1"
		And the user has created a share with settings
			| path         | /test |
			| shareType    | 3     |
			| publicUpload | false |
		When the user updates the last share using the API with
			| publicUpload | true |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: Adding public upload to a read only shared folder as recipient is not allowed
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has shared folder "/test" with user "user1" with permissions 17
		And as user "user1"
		And the user has created a share with settings
			| path        | /test |
			| shareType   | 3     |
			| permissions | 1     |
		When the user updates the last share using the API with
			| permissions | 15 |
		Then the OCS status code should be "404"
		And the HTTP status code should be "200"

	Scenario: Adding public upload to a shared folder as recipient is allowed with permissions
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/test"
		And user "user0" has shared folder "/test" with user "user1" with permissions 31
		And as user "user1"
		And the user has created a share with settings
			| path        | /test |
			| shareType   | 3     |
			| permissions | 1     |
		When the user updates the last share using the API with
			| permissions | 15 |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: Increasing permissions is allowed for owner
		Given user "user0" has been created
		And user "user1" has been created
		And group "new-group" has been created
		And user "user0" has been added to group "new-group"
		And user "user1" has been added to group "new-group"
		And user "user0" has been made a subadmin of group "new-group"
		And as user "user0"
		And the user has shared folder "/FOLDER" with group "new-group"
		And the user has updated the last share with
			| permissions | 1 |
		When the user updates the last share using the API with
			| permissions | 31 |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"