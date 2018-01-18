@insulated
Feature: Federation Sharing - sharing with users on other cloud storages
As a user
I want to share files with any users on other cloud storages
So that other users have access to these files

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		|user2   |1234    |User Two   |u2@oc.com.np|
		And I am on the login page
		And I login with username "user2" and password "1234"

	Scenario: test the single steps of federation sharing
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And the folder "simple-empty-folder" is shared with the remote user "user1@%remote_server%"
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		Then dialogs should be displayed
		| title        | content                                                                              |
		| Remote share | Do you want to add the remote share /simple-folder from user2@%local_server%/?       |
		| Remote share | Do you want to add the remote share /simple-empty-folder from user2@%local_server%/? |
		When the offered remote shares are accepted
		Then the folder "simple-folder (2)" should be listed
		When I open the folder "simple-folder (2)"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"

	@skipOnMICROSOFTEDGE
	Scenario: share a folder with an remote user and prohibit deleting
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And the sharing permissions of "user1@%remote_server% (remote)" for "simple-folder" are set to
		| delete | no |
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		And the offered remote shares are accepted
		And I open the folder "simple-folder (2)"
		Then it should not be possible to delete the file "lorem.txt"

	Scenario: overwrite a file in a received share
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		And the offered remote shares are accepted
		And I open the folder "simple-folder (2)"
		And I upload overwriting the file "lorem.txt"
		And I relogin with username "user2" and password "1234" to "%base_url%"
		And I open the folder "simple-folder"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the local "lorem.txt"

	Scenario: upload a new file in a received share
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		And the offered remote shares are accepted
		And I open the folder "simple-folder (2)"
		And I upload the file "new-lorem.txt"
		And I relogin with username "user2" and password "1234" to "%base_url%"
		And I open the folder "simple-folder"
		And the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	Scenario: rename a file in a received share
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		And the offered remote shares are accepted
		And I open the folder "simple-folder (2)"
		And I rename the file "lorem-big.txt" to "renamed file.txt"
		And I relogin with username "user2" and password "1234" to "%base_url%"
		And I open the folder "simple-folder"
		And the file "renamed file.txt" should be listed
		And the content of "renamed file.txt" should be the same as the original "simple-folder/lorem-big.txt"
		But the file "lorem-big.txt" should not be listed

	Scenario: delete a file in a received share
		When the folder "simple-folder" is shared with the remote user "user1@%remote_server%"
		And I relogin with username "user1" and password "1234" to "http://%remote_server%"
		And the offered remote shares are accepted
		And I open the folder "simple-folder (2)"
		And I delete the file "data.zip"
		And I relogin with username "user2" and password "1234" to "%base_url%"
		And I open the folder "simple-folder"
		And the file "data.zip" should not be listed
