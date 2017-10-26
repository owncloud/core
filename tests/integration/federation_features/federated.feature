Feature: federated
	Background:
		Given using api version "1"

	Scenario: Federate share a file with another server
		Given using server "REMOTE"
		And user "user1" exists
		And using server "LOCAL"
		And user "user0" exists
		When user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And share fields of last share match with
			| id | A_NUMBER |
			| item_type | file |
			| item_source | A_NUMBER |
			| share_type | 6 |
			| file_source | A_NUMBER |
			| path | /textfile0.txt |
			| permissions | 19 |
			| stime | A_NUMBER |
			| storage | A_NUMBER |
			| mail_send | 0 |
			| uid_owner | user0 |
			| storage_id | home::user0 |
			| file_parent | A_NUMBER |
			| displayname_owner | user0 |
			| share_with | user1@REMOTE |
			| share_with_displayname | user1@REMOTE |

	Scenario: Federate share a file with local server
		Given using server "LOCAL"
		And user "user0" exists
		And using server "REMOTE"
		And user "user1" exists
		When user "user1" from server "REMOTE" shares "/textfile0.txt" with user "user0" from server "LOCAL"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And share fields of last share match with
			| id | A_NUMBER |
			| item_type | file |
			| item_source | A_NUMBER |
			| share_type | 6 |
			| file_source | A_NUMBER |
			| path | /textfile0.txt |
			| permissions | 19 |
			| stime | A_NUMBER |
			| storage | A_NUMBER |
			| mail_send | 0 |
			| uid_owner | user1 |
			| storage_id | home::user1 |
			| file_parent | A_NUMBER |
			| displayname_owner | user1 |
			| share_with | user0@LOCAL |
			| share_with_displayname | user0@LOCAL |

	Scenario: Remote sharee can see the pending share
		Given using server "REMOTE"
		And user "user1" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		And using server "REMOTE"
		And as an "user1"
		When sending "GET" to "/apps/files_sharing/api/v1/remote_shares/pending"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And share fields of last share match with
			| id | A_NUMBER |
			| remote | LOCAL |
			| remote_id | A_NUMBER |
			| share_token | A_TOKEN |
			| name | /textfile0.txt |
			| owner | user0 |
			| user | user1 |
			| mountpoint | {{TemporaryMountPointName#/textfile0.txt}} |
			| accepted | 0 |

	Scenario: accept a pending remote share
		Given using server "REMOTE"
		And user "user1" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		When user "user1" from server "REMOTE" accepts last pending share
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: Reshare a federated shared file
		Given using server "REMOTE"
		And user "user1" exists
		And user "user2" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		When creating a share with
			| path | /textfile0 (2).txt |
			| shareType | 0 |
			| shareWith | user2 |
			| permissions | 19 |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And share fields of last share match with
			| id | A_NUMBER |
			| item_type | file |
			| item_source | A_NUMBER |
			| share_type | 0 |
			| file_source | A_NUMBER |
			| path | /textfile0 (2).txt |
			| permissions | 19 |
			| stime | A_NUMBER |
			| storage | A_NUMBER |
			| mail_send | 0 |
			| uid_owner | user1 |
			| file_parent | A_NUMBER |
			| displayname_owner | user1 |
			| share_with | user2 |
			| share_with_displayname | user2 |

	Scenario: Overwrite a federated shared file as recipient
		Given using server "REMOTE"
		And user "user1" exists
		And user "user2" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/textfile0 (2).txt"
		And using server "LOCAL"
		And as an "user0"
		And downloading file "/textfile0.txt" with range "bytes=0-8"
		Then downloaded content should be "BLABLABLA"

	Scenario: Overwrite a federated shared folder as recipient
		Given using server "REMOTE"
		And user "user1" exists
		And user "user2" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt"
		And using server "LOCAL"
		And as an "user0"
		And downloading file "/PARENT/textfile0.txt" with range "bytes=0-8"
		Then downloaded content should be "BLABLABLA"

	Scenario: Overwrite a federated shared file as recipient using old chunking
		Given using server "REMOTE"
		And user "user1" exists
		And user "user2" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/textfile0.txt" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		And user "user1" uploads chunk file "1" of "3" with "AAAAA" to "/textfile0 (2).txt"
		And user "user1" uploads chunk file "2" of "3" with "BBBBB" to "/textfile0 (2).txt"
		And user "user1" uploads chunk file "3" of "3" with "CCCCC" to "/textfile0 (2).txt"
		When downloading file "/textfile0 (2).txt" with range "bytes=0-4"
		Then downloaded content should be "AAAAA"

	Scenario: Overwrite a federated shared folder as recipient using old chunking
		Given using server "REMOTE"
		And user "user1" exists
		And user "user2" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		And user "user1" uploads chunk file "1" of "3" with "AAAAA" to "/PARENT (2)/textfile0.txt"
		And user "user1" uploads chunk file "2" of "3" with "BBBBB" to "/PARENT (2)/textfile0.txt"
		And user "user1" uploads chunk file "3" of "3" with "CCCCC" to "/PARENT (2)/textfile0.txt"
		When downloading file "/PARENT (2)/textfile0.txt" with range "bytes=3-13"
		Then downloaded content should be "AABBBBBCCCC"

	Scenario: Trusted server handshake does not require authenticated requests - we force 403 by sending an empty body
		Given using server "LOCAL"
		And using api version "2"
		And as an "UNAUTHORIZED_USER"
		When sending "POST" to "/apps/federation/api/v1/request-shared-secret"
		Then the HTTP status code should be "403"

	Scenario: Overwrite a federated shared folder as recipient propagates etag for recipient
		Given using server "REMOTE"
		And user "user1" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And user "user1" stores etag of element "/PARENT (2)"
		And using server "LOCAL"
		And as an "user0"
		When User "user0" uploads file "data/file_to_overwrite.txt" to "/PARENT/textfile0.txt"
		Then using server "REMOTE"
		And as an "user1"
		And etag of element "/PARENT (2)" of user "user1" has changed

	Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
		Given using server "REMOTE"
		And user "user1" exists
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user0" stores etag of element "/PARENT"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		And as an "user1"
		When user "user1" uploads file "data/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt"
		Then using server "LOCAL"
		And as an "user0"
		And etag of element "/PARENT" of user "user0" has changed

	Scenario: Upload file to received federated share while quota is set on home storage
		Given using server "REMOTE"
		And as an "admin"
		And user "user1" exists
		And user "user1" has a quota of "20 B"
		And using server "LOCAL"
		And user "user0" exists
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/textfile.txt" to "/PARENT (2)/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "201"
		And using server "LOCAL"
		And as "user0" the file "/PARENT (2)/textquota.txt" exists

	Scenario: Upload file to received federated share while quota is set on remote storage
		Given using server "REMOTE"
		And as an "admin"
		And user "user1" exists
		And using server "LOCAL"
		And as an "admin"
		And user "user0" exists
		And user "user0" has a quota of "20 B"
		And user "user0" from server "LOCAL" shares "/PARENT" with user "user1" from server "REMOTE"
		And user "user1" from server "REMOTE" accepts last pending share
		And using server "REMOTE"
		When user "user1" uploads file "data/textfile.txt" to "/PARENT (2)/testquota.txt" with all mechanisms
		Then the HTTP status code of all upload responses should be "507"

