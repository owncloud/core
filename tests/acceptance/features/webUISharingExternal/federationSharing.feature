@webUI @insulated @disablePreviews @TestAlsoOnExternalUserBackend
Feature: Federation Sharing - sharing with users on other cloud storages
As a user
I want to share files with any users on other cloud storages
So that other users have access to these files

	Background:
		Given using server "REMOTE"
		And these users have been created:
			|username|password|displayname|email       |
			|meta   |1234    |User One   |u1@oc.com.np|
		And using server "LOCAL"
		And these users have been created:
			|username|password|displayname|email       |
			|meta   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "meta" and password "1234" using the webUI

	Scenario: test the single steps of sharing a folder to a remote server
		When the user shares the folder "simple-folder" with the remote user "meta@%remote_server_without_scheme%" using the webUI
		And the user shares the folder "simple-empty-folder" with the remote user "meta@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And using server "REMOTE"
		Then as "meta" the folder "/simple-folder (2)" should exist
		And as "meta" the file "/simple-folder (2)/lorem.txt" should exist
		And as "meta" the folder "/simple-empty-folder (2)" should exist

	Scenario: test the single steps of receiving a federation share
		Given using server "REMOTE"
		And these users have been created:
			|username|password|displayname|email       |
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Two   |u2@oc.com.np|
		And user "meta" from server "REMOTE" has shared "simple-folder" with user "meta" from server "LOCAL"
		And user "user2" from server "REMOTE" has shared "simple-empty-folder" with user "meta" from server "LOCAL"
		And user "user3" from server "REMOTE" has shared "lorem.txt" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		Then dialogs should be displayed on the webUI
			| title        | content                                                                                              |
			| Remote share | Do you want to add the remote share /simple-folder from meta@%remote_server_without_scheme%/?       |
			| Remote share | Do you want to add the remote share /simple-empty-folder from user2@%remote_server_without_scheme%/? |
			| Remote share | Do you want to add the remote share /lorem.txt from user3@%remote_server_without_scheme%/?           |
		When the user accepts the offered remote shares using the webUI
		Then the file "lorem (2).txt" should be listed on the webUI
		And the content of "lorem (2).txt" on the local server should be the same as the original "lorem.txt"
		And the folder "simple-folder (2)" should be listed on the webUI
		And the file "lorem.txt" should be listed in the folder "simple-folder (2)" on the webUI
		And the content of "lorem.txt" on the local server should be the same as the original "simple-folder/lorem.txt"
		And the file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
		And the folder "simple-folder (2)" should be listed in the shared-with-you page on the webUI
		And the folder "simple-empty-folder (2)" should be listed in the shared-with-you page on the webUI

	Scenario: declining a federation share on the webUI
		Given user "meta" from server "REMOTE" has shared "/lorem.txt" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user declines the offered remote shares using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

	@skipOnMICROSOFTEDGE
	Scenario: share a folder with an remote user and prohibit deleting - local server shares - remote server receives
		When the user shares the folder "simple-folder" with the remote user "meta@%remote_server_without_scheme%" using the webUI
		And the user sets the sharing permissions of "meta@%remote_server_without_scheme% (federated)" for "simple-folder" using the webUI to
		| delete | no |
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		Then it should not be possible to delete the file "lorem.txt" using the webUI

	@skipOnMICROSOFTEDGE
	Scenario: share a folder with an remote user and prohibit deleting - remote server shares - local server receives
		When the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user shares the folder "simple-folder" with the remote user "meta@%local_server_without_scheme%" using the webUI
		And the user sets the sharing permissions of "meta@%local_server_without_scheme% (federated)" for "simple-folder" using the webUI to
		| delete | no |
		And the user re-logs in with username "meta" and password "1234" to "%local_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		Then it should not be possible to delete the file "lorem.txt" using the webUI

	Scenario: overwrite a file in a received share - local server shares - remote server receives
		Given user "meta" from server "LOCAL" has shared "simple-folder" with user "meta" from server "REMOTE"
		And user "meta" from server "REMOTE" has accepted the last pending share
		When user "meta" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "simple-folder (2)/lorem.txt" using the WebDAV API
		And the user re-logs in with username "meta" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the local server should be the same as the local "lorem.txt"

	Scenario: overwrite a file in a received share - remote server shares - local server receives
		Given user "meta" from server "REMOTE" has shared "simple-folder" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user uploads overwriting the file "lorem.txt" using the webUI and retries if the file is locked
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the remote server should be the same as the local "lorem.txt"

	Scenario: upload a new file in a received share - local server shares - remote server receives
		Given user "meta" from server "LOCAL" has shared "simple-folder" with user "meta" from server "REMOTE"
		And user "meta" from server "REMOTE" has accepted the last pending share
		When user "meta" on "REMOTE" uploads file "filesForUpload/new-lorem.txt" to "simple-folder (2)/new-lorem.txt" using the WebDAV API
		And the user re-logs in with username "meta" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "new-lorem.txt" should be listed on the webUI
		And the content of "new-lorem.txt" on the local server should be the same as the local "new-lorem.txt"

	Scenario: upload a new file in a received share - remote server shares - local server receives
		Given user "meta" from server "REMOTE" has shared "simple-folder" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user uploads the file "new-lorem.txt" using the webUI
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "new-lorem.txt" should be listed on the webUI
		And the content of "new-lorem.txt" on the remote server should be the same as the local "new-lorem.txt"

	Scenario: rename a file in a received share - local server shares - remote server receives
		Given user "meta" from server "LOCAL" has shared "simple-folder" with user "meta" from server "REMOTE"
		And user "meta" from server "REMOTE" has accepted the last pending share
		When user "meta" on "REMOTE" moves file "/simple-folder%20(2)/lorem-big.txt" to "/simple-folder%20(2)/renamed%20file.txt" using the WebDAV API
		When the user re-logs in with username "meta" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "renamed file.txt" should be listed on the webUI
		But the file "lorem-big.txt" should not be listed on the webUI
		And the content of "renamed file.txt" on the local server should be the same as the original "simple-folder/lorem-big.txt"

	Scenario: rename a file in a received share - remote server shares - local server receives
		Given user "meta" from server "REMOTE" has shared "simple-folder" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		When the user opens the folder "simple-folder (2)" using the webUI
		And the user renames the file "lorem-big.txt" to "renamed file.txt" using the webUI
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "renamed file.txt" should be listed on the webUI
		And the content of "renamed file.txt" on the remote server should be the same as the original "simple-folder/lorem-big.txt"
		But the file "lorem-big.txt" should not be listed on the webUI

	Scenario: delete a file in a received share - local server shares - remote server receives
		Given user "meta" from server "LOCAL" has shared "simple-folder" with user "meta" from server "REMOTE"
		And user "meta" from server "REMOTE" has accepted the last pending share
		When user "meta" on "REMOTE" deletes file "simple-folder (2)/data.zip" using the WebDAV API
		And the user re-logs in with username "meta" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "data.zip" should not be listed on the webUI

	Scenario: delete a file in a received share - remote server shares - local server receives
		Given user "meta" from server "REMOTE" has shared "simple-folder" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user deletes the file "data.zip" using the webUI
		And the user re-logs in with username "meta" and password "1234" to "%remote_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "data.zip" should not be listed on the webUI

	Scenario: receive same name federation share from two users
		Given using server "REMOTE"
		And these users have been created:
			|username|password|displayname|email       |
			|user2   |1234    |User Two   |u2@oc.com.np|
		And user "meta" from server "REMOTE" has shared "/lorem.txt" with user "meta" from server "LOCAL"
		And user "user2" from server "REMOTE" has shared "/lorem.txt" with user "meta" from server "LOCAL"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		Then the file "lorem (2).txt" should be listed on the webUI
		And the file "lorem (3).txt" should be listed on the webUI
		And the file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
		And the file "lorem (3).txt" should be listed in the shared-with-you page on the webUI

	Scenario: unshare a federation share
		Given user "meta" from server "REMOTE" has shared "/lorem.txt" with user "meta" from server "LOCAL"
		And user "meta" from server "LOCAL" has accepted the last pending share
		And the user has reloaded the current page of the webUI
		When the user unshares the file "lorem (2).txt" using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		When the user has reloaded the current page of the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

	Scenario: unshare a federation share from "share-with-you" page
		Given user "meta" from server "REMOTE" has shared "/lorem.txt" with user "meta" from server "LOCAL"
		And user "meta" from server "LOCAL" has accepted the last pending share
		And the user has reloaded the current page of the webUI
		When the user unshares the file "lorem (2).txt" using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the files page on the webUI
