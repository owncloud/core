@webUI @insulated @disablePreviews
Feature: Share by public link
As a user
I want to share files through a publicly accessible link
So that users who do not have an account on my ownCloud server can access them

As an admin
I want to limit the ability of a user to share files/folders through a publicly accessible link
So that public sharing is limited according to organization policy

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI

	Scenario: simple sharing by public link
		When the user creates a new public link for the folder "simple-folder" using the webUI
		And the public accesses the last created public link using the webUI
		Then the file "lorem.txt" should be listed on the webUI

	@skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
	Scenario: creating a public link with read & write permissions makes it possible to delete files via the link
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| permission | read-write |
		And the public accesses the last created public link using the webUI
		And the user deletes the following elements using the webUI
		| name                                 |
		| simple-empty-folder                  |
		| lorem.txt                            |
		| strängé filename (duplicate #2 &).txt  |
		| zzzz-must-be-last-file-in-folder.txt |
		Then the deleted elements should not be listed on the webUI
		And the deleted elements should not be listed on the webUI after a page reload

	@skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
	Scenario: creating a public link with read permissions only makes it impossible to delete files via the link
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| permission | read |
		And the public accesses the last created public link using the webUI
		Then it should not be possible to delete the file "lorem.txt" using the webUI

	@skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue_30392
	Scenario: mount public link
		Given these users have been created:
		|username|password|displayname|email       |
		|user2   |1234    |User One   |u1@oc.com.np|
		When the user creates a new public link for the folder "simple-folder" using the webUI
		And the user logs out of the webUI
		And the public accesses the last created public link using the webUI
		And the public adds the public link to "%remote_server%" as user "user2" with the password "1234" using the webUI
		And the user accepts the offered remote shares using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		When the user opens the folder "simple-folder (2)" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the remote server should be the same as the original "simple-folder/lorem.txt"
		And it should not be possible to delete the file "lorem.txt" using the webUI

	@skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue_30392
	Scenario: mount public link and overwrite file
		Given these users have been created:
		|username|password|displayname|email       |
		|user2   |1234    |User One   |u1@oc.com.np|
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| permission | read-write |
		And the user logs out of the webUI
		And the public accesses the last created public link using the webUI
		And the public adds the public link to "%remote_server%" as user "user2" with the password "1234" using the webUI
		And the user accepts the offered remote shares using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		When the user opens the folder "simple-folder (2)" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the remote server should be the same as the original "simple-folder/lorem.txt"
		When the user uploads overwriting the file "lorem.txt" using the webUI and retries if the file is locked
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" on the remote server should be the same as the local "lorem.txt"