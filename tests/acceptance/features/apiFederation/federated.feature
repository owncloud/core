@api
Feature: federated
	Background:
		Given using API version "1"
		And parameter "shareapi_enabled" of app "core" has been set to "yes"
		And parameter "shareapi_allow_resharing" of app "core" has been set to "yes"
		And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
		And parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"

	Scenario: Federate share a file with another server
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		When user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                     | A_NUMBER       |
			| item_type              | file           |
			| item_source            | A_NUMBER       |
			| share_type             | 6              |
			| file_source            | A_NUMBER       |
			| path                   | /textfile0.txt |
			| permissions            | 19             |
			| stime                  | A_NUMBER       |
			| storage                | A_NUMBER       |
			| mail_send              | 0              |
			| uid_owner              | user0          |
			| file_parent            | A_NUMBER       |
			| displayname_owner      | user0          |
			| share_with             | user1@REMOTE   |
			| share_with_displayname | user1@REMOTE   |

	Scenario: Federate share a file with local server
		Given using server "LOCAL"
		And user "user0" has been created
		And using server "REMOTE"
		And user "user1" has been created
		When user "user1" from server "REMOTE" shares "/textfile0.txt" with user "user0" from server "LOCAL" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                     | A_NUMBER       |
			| item_type              | file           |
			| item_source            | A_NUMBER       |
			| share_type             | 6              |
			| file_source            | A_NUMBER       |
			| path                   | /textfile0.txt |
			| permissions            | 19             |
			| stime                  | A_NUMBER       |
			| storage                | A_NUMBER       |
			| mail_send              | 0              |
			| uid_owner              | user1          |
			| file_parent            | A_NUMBER       |
			| displayname_owner      | user1          |
			| share_with             | user0@LOCAL    |
			| share_with_displayname | user0@LOCAL    |

	Scenario: Remote sharee can see the pending share
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/textfile0.txt" with user "user1" from server "REMOTE"
		And using server "REMOTE"
		When user "user1" sends HTTP method "GET" to API endpoint "/apps/files_sharing/api/v1/remote_shares/pending"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id          | A_NUMBER                                   |
			| remote      | LOCAL                                      |
			| remote_id   | A_NUMBER                                   |
			| share_token | A_TOKEN                                    |
			| name        | /textfile0.txt                             |
			| owner       | user0                                      |
			| user        | user1                                      |
			| mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
			| accepted    | 0                                          |

	Scenario: accept a pending remote share
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/textfile0.txt" with user "user1" from server "REMOTE"
		When user "user1" from server "REMOTE" accepts the last pending share using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: Reshare a federated shared file
		Given using server "REMOTE"
		And user "user1" has been created
		And user "user2" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" creates a share using the API with settings
			| path        | /textfile0 (2).txt |
			| shareType   | 0                  |
			| shareWith   | user2              |
			| permissions | 19                 |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the share fields of the last share should include
			| id                     | A_NUMBER           |
			| item_type              | file               |
			| item_source            | A_NUMBER           |
			| share_type             | 0                  |
			| file_source            | A_NUMBER           |
			| path                   | /textfile0 (2).txt |
			| permissions            | 19                 |
			| stime                  | A_NUMBER           |
			| storage                | A_NUMBER           |
			| mail_send              | 0                  |
			| uid_owner              | user1              |
			| file_parent            | A_NUMBER           |
			| displayname_owner      | user1              |
			| share_with             | user2              |
			| share_with_displayname | user2              |

	Scenario: Overwrite a federated shared file as recipient
		Given using server "REMOTE"
		And user "user1" has been created
		And user "user2" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/textfile0 (2).txt" using the API
		And using server "LOCAL"
		And user "user0" downloads file "/textfile0.txt" with range "bytes=0-8" using the API
		Then the downloaded content should be "BLABLABLA"

	Scenario: Overwrite a federated shared folder as recipient
		Given using server "REMOTE"
		And user "user1" has been created
		And user "user2" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the API
		And using server "LOCAL"
		And user "user0" downloads file "/PARENT/textfile0.txt" with range "bytes=0-8" using the API
		Then the downloaded content should be "BLABLABLA"

	Scenario: Overwrite a federated shared file as recipient using old chunking
		Given using server "REMOTE"
		And user "user1" has been created
		And user "user2" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		And user "user1" has uploaded chunk file "1" of "3" with "AAAAA" to "/textfile0 (2).txt"
		And user "user1" has uploaded chunk file "2" of "3" with "BBBBB" to "/textfile0 (2).txt"
		And user "user1" has uploaded chunk file "3" of "3" with "CCCCC" to "/textfile0 (2).txt"
		When user "user1" downloads file "/textfile0 (2).txt" with range "bytes=0-4" using the API
		Then the downloaded content should be "AAAAA"

	Scenario: Overwrite a federated shared folder as recipient using old chunking
		Given using server "REMOTE"
		And user "user1" has been created
		And user "user2" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		And user "user1" has uploaded chunk file "1" of "3" with "AAAAA" to "/PARENT (2)/textfile0.txt"
		And user "user1" has uploaded chunk file "2" of "3" with "BBBBB" to "/PARENT (2)/textfile0.txt"
		And user "user1" has uploaded chunk file "3" of "3" with "CCCCC" to "/PARENT (2)/textfile0.txt"
		When user "user1" downloads file "/PARENT (2)/textfile0.txt" with range "bytes=3-13" using the API
		Then the downloaded content should be "AABBBBBCCCC"

	Scenario: Trusted server handshake does not require authenticated requests - we force 403 by sending an empty body
		Given using server "LOCAL"
		And using API version "2"
		When user "UNAUTHORIZED_USER" sends HTTP method "POST" to API endpoint "/apps/federation/api/v1/request-shared-secret"
		Then the HTTP status code should be "403"

	Scenario: Overwrite a federated shared folder as recipient propagates etag for recipient
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		And user "user1" has stored etag of element "/PARENT (2)"
		And using server "LOCAL"
		When user "user0" uploads file "data/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the API
		Then using server "REMOTE"
		And the etag of element "/PARENT (2)" of user "user1" should have changed

	Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user0" has stored etag of element "/PARENT"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the API
		Then using server "LOCAL"
		And the etag of element "/PARENT" of user "user0" should have changed

	Scenario: Upload file to received federated share while quota is set on home storage
		Given using server "REMOTE"
		And user "user1" has been created
		And the quota of user "user1" has been set to "20 B"
		And using server "LOCAL"
		And user "user0" has been created
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/textfile.txt" to "/PARENT (2)/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "201"
		And using server "LOCAL"
		And as "user0" the files uploaded to "/PARENT/testquota.txt" with all mechanisms should exist

	Scenario: Upload file to received federated share while quota is set on remote storage
		Given using server "REMOTE"
		And user "user1" has been created
		And using server "LOCAL"
		And user "user0" has been created
		And the quota of user "user0" has been set to "20 B"
		And user "user0" from server "LOCAL" has shared "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" has accepted the last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/textfile.txt" to "/PARENT (2)/testquota.txt" with all mechanisms using the API
		Then the HTTP status code of all upload responses should be "507"

