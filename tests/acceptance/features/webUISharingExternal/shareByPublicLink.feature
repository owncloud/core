@webUI @insulated @disablePreviews @mailhog
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

	@smokeTest
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

	@skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
	Scenario: mount public link
		Given using server "REMOTE"
		And these users have been created:
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

	@skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
	Scenario: mount public link and overwrite file
		Given using server "REMOTE"
		And these users have been created:
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

	Scenario: public should be able to access a public link with correct password
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| password | pass123 |
		And the public accesses the last created public link with password "pass123" using the webUI
		Then the file "lorem.txt" should be listed on the webUI

	Scenario: public should not be able to access a public link with wrong password
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| password | pass123 |
		And the public tries to access the last created public link with wrong password "pass12" using the webUI
		Then the public should not get access to the publicly shared file

	Scenario: user tries to create a public link with name longer than 64 chars
		Given user "user1" has moved file "/lorem.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
		And the user has reloaded the current page of the webUI
		When the user tries to create a new public link for the file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" using the webUI
		Then the user should see a error message on public dialog saying "Share name cannot be more than 64 characters"
		And public link should not be generated

	Scenario: user shares a public link with folder longer than 64 chars and shorter link name
		Given user "user1" has moved folder "simple-folder" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
		And the user has reloaded the current page of the webUI
		When the user creates a new public link for the folder "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" using the webUI with
		|name | short_linkname |
		And the public accesses the last created public link using the webUI
		Then the file "lorem.txt" should be listed on the webUI

	Scenario: user tries to create a public link with read only permission without entering share password while enforce password on read only public share is enforced
		Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
		When the user tries to create a new public link for the folder "simple-folder" using the webUI
		Then the user should see a error message on public dialog saying "Passwords are enforced for link shares"
		And public link should not be generated

	Scenario: user tries to create a public link with read-write permission without entering share password while enforce password on read-write public share is enforced
		Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "yes"
		When the user tries to create a new public link for the folder "simple-folder" using the webUI with
			| permission | read-write |
		Then the user should see a error message on public dialog saying "Passwords are enforced for link shares"
		And public link should not be generated

	Scenario: user tries to create a public link with write only permission without entering share password while enforce password on write only public share is enforced
		Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "yes"
		When the user tries to create a new public link for the folder "simple-folder" using the webUI with
			| permission | upload |
		Then the user should see a error message on public dialog saying "Passwords are enforced for link shares"
		And public link should not be generated

	Scenario: user creates a public link with read-write permission without entering share password while enforce password on read only public share is enforced
		Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
		When the user creates a new public link for the folder "simple-folder" using the webUI with
			| permission | read-write |
		And the public accesses the last created public link using the webUI
		Then the file "lorem.txt" should be listed on the webUI

	Scenario: public should be able to access the shared file through public link
		When the user creates a new public link for the file 'lorem.txt' using the webUI
		And the public accesses the last created public link using the webUI
		Then the text preview of the public link should contain "Lorem ipsum dolor sit amet, consectetur"
		And the content of the file shared by last public link should be the same as "lorem.txt"

	Scenario: user shares a public link via email
		Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
		And the user has reloaded the current page of the webUI
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| email | foo@bar.co |
		Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
		And the email address "foo@bar.co" should have received an email containing last shared public link

	Scenario: user shares a public link via email and sends a copy to self
		Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
		And the user has reloaded the current page of the webUI
		When the user creates a new public link for the folder "simple-folder" using the webUI with
		| email | foo@bar.co |
		| emailToSelf | true |
		Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
		And the email address "u1@oc.com.np" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
		And the email address "foo@bar.co" should have received an email containing last shared public link
		And the email address "u1@oc.com.np" should have received an email containing last shared public link