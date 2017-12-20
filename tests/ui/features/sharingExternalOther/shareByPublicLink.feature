@insulated
Feature: Share by public link
As a user
I want to share files through a publicly accessible link
So that users who do not have an account on my ownCloud server can access them

As an admin
I want to limit the ability of a user to share files/folders through a publicly accessible link
So that public sharing is limited according to organization policy

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario: simple sharing by public link
		When I create a new public link for the folder "simple-folder"
		And I access the last created public link
		Then the file "lorem.txt" should be listed

	@skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
	Scenario: creating a public link with read & write permissions makes it possible to delete files via the link
		When I create a new public link for the folder "simple-folder" with
		| permission | Read & Write |
		And I access the last created public link
		And I delete the elements
		| name                                 |
		| simple-empty-folder                  |
		| lorem.txt                            |
		| strängé filename (duplicate #2 &).txt  |
		| zzzz-must-be-last-file-in-folder.txt |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload

	@skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
	Scenario: creating a public link with read permissions only makes it impossible to delete files via the link
		When I create a new public link for the folder "simple-folder" with
		| permission | Read |
		And I access the last created public link
		Then it should not be possible to delete the file "lorem.txt"

	Scenario: mount public link
		Given these users exist:
		|username|password|displayname|email       |
		|user2   |1234    |User One   |u1@oc.com.np|
		When I create a new public link for the folder "simple-folder"
		And I logout
		And I access the last created public link
		And I add the public link to "http://%remote_server%" as user "user2" with the password "1234"
		And the offered remote shares are accepted
		Then the folder "simple-folder (2)" should be listed
		When I open the folder "simple-folder (2)"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
		And it should not be possible to delete the file "lorem.txt"

	Scenario: mount public link and overwrite file
		Given these users exist:
		|username|password|displayname|email       |
		|user2   |1234    |User One   |u1@oc.com.np|
		When I create a new public link for the folder "simple-folder" with
		| permission | Read & Write |
		And I logout
		And I access the last created public link
		And I add the public link to "http://%remote_server%" as user "user2" with the password "1234"
		And the offered remote shares are accepted
		Then the folder "simple-folder (2)" should be listed
		When I open the folder "simple-folder (2)"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
		When I upload overwriting the file "lorem.txt"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the local "lorem.txt"