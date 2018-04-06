@webUI @insulated @disablePreviews @TestAlsoOnExternalUserBackend
Feature: Federation Sharing - sharing with users on other cloud storages
As a user
I want to share files with any users on other cloud storages
So that other users have access to these files

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		|user2   |1234    |User Two   |u2@oc.com.np|
		|user3   |1234    |User Two   |u2@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user2" and password "1234" using the webUI

	Scenario: test the single steps of federation sharing
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user shares the folder "simple-empty-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		Then dialogs should be displayed on the webUI
		| title        | content                                                                              |
		| Remote share | Do you want to add the remote share /simple-folder from user2@%local_server_without_scheme%/?       |
		| Remote share | Do you want to add the remote share /simple-empty-folder from user2@%local_server_without_scheme%/? |
		When the user accepts the offered remote shares using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		And the file "lorem.txt" should be listed in the folder "simple-folder (2)" on the webUI
		And the content of "lorem.txt" on the remote server should be the same as the original "simple-folder/lorem.txt"
		And the folder "simple-folder (2)" should be listed in the shared-with-you page on the webUI
		And the folder "simple-empty-folder (2)" should be listed in the shared-with-you page on the webUI

	Scenario: declining a federation share on the webUI
		Given user "user1" from server "LOCAL" has shared "/lorem.txt" with user "user2" from server "REMOTE"
		And the user has reloaded the current page of the webUI
		When the user declines the offered remote shares using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

	@skipOnMICROSOFTEDGE
	Scenario: share a folder with an remote user and prohibit deleting
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user sets the sharing permissions of "user1@%remote_server_without_scheme% (federated)" for "simple-folder" using the webUI to
		| delete | no |
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		Then it should not be possible to delete the file "lorem.txt" using the webUI

	Scenario: overwrite a file in a received share
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user uploads overwriting the file "lorem.txt" using the webUI and retries if the file is locked
		And the user re-logs in with username "user2" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the local server should be the same as the local "lorem.txt"

	Scenario: upload a new file in a received share
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user uploads the file "new-lorem.txt" using the webUI
		And the user re-logs in with username "user2" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "new-lorem.txt" should be listed on the webUI
		And the content of "new-lorem.txt" on the local server should be the same as the local "new-lorem.txt"

	Scenario: rename a file in a received share
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user renames the file "lorem-big.txt" to "renamed file.txt" using the webUI
		And the user re-logs in with username "user2" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "renamed file.txt" should be listed on the webUI
		And the content of "renamed file.txt" on the local server should be the same as the original "simple-folder/lorem-big.txt"
		But the file "lorem-big.txt" should not be listed on the webUI

	Scenario: delete a file in a received share
		When the user shares the folder "simple-folder" with the remote user "user1@%remote_server_without_scheme%" using the webUI
		And the user re-logs in with username "user1" and password "1234" to "%remote_server%" using the webUI
		And the user accepts the offered remote shares using the webUI
		And the user opens the folder "simple-folder (2)" using the webUI
		And the user deletes the file "data.zip" using the webUI
		And the user re-logs in with username "user2" and password "1234" to "%local_server%" using the webUI
		And the user opens the folder "simple-folder" using the webUI
		Then the file "data.zip" should not be listed on the webUI

	Scenario: receive same name federation share from two users
		Given user "user1" from server "LOCAL" has shared "/lorem.txt" with user "user2" from server "REMOTE"
		And user "user3" from server "LOCAL" has shared "/lorem.txt" with user "user2" from server "REMOTE"
		And the user has reloaded the current page of the webUI
		When the user accepts the offered remote shares using the webUI
		Then the file "lorem (2).txt" should be listed on the webUI
		And the file "lorem (3).txt" should be listed on the webUI
		And the file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
		And the file "lorem (3).txt" should be listed in the shared-with-you page on the webUI

	Scenario: unshare a federation share
		Given user "user1" from server "LOCAL" has shared "/lorem.txt" with user "user2" from server "REMOTE"
		And user "user2" from server "REMOTE" has accepted the last pending share
		And the user has reloaded the current page of the webUI
		When the user unshares the file "lorem (2).txt" using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		When the user has reloaded the current page of the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI

	Scenario: unshare a federation share from "share-with-you" page
		Given user "user1" from server "LOCAL" has shared "/lorem.txt" with user "user2" from server "REMOTE"
		And user "user2" from server "REMOTE" has accepted the last pending share
		And the user has browsed to the shared-with-you page
		When the user unshares the file "lorem (2).txt" using the webUI
		Then the file "lorem (2).txt" should not be listed on the webUI
		And the file "lorem (2).txt" should not be listed in the files page on the webUI
