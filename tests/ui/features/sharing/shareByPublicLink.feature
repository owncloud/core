@insulated
Feature: Share by public link

As an user
I would like to share files through a public link
So that users, who do not have an account on my oC server can access them

As an admin
I would like to limit the ability of a user to share files/folders through a public link
So that the user is forced to obey the policies of the server operator

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario: simple sharing by public link
		And I create a new public link for the folder "simple-folder"
		And I access the last created public link
		Then the file "lorem.txt" should be listed

	Scenario: creating a public link with read & write permissions makes it possible to delete files via the link
		And I create a new public link for the folder "simple-folder" with
		| permission | Read & Write |
		And I access the last created public link
		And I delete the elements
		| name                                 |
		| simple-empty-folder                  |
		| lorem.txt                            |
		| strängé filename (duplicate #2).txt  |
		| zzzz-must-be-last-file-in-folder.txt |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload

	Scenario: creating a public link with read permissions only makes it impossible to delete files via the link
		And I create a new public link for the folder "simple-folder" with
		| permission | Read |
		And I access the last created public link
		Then it should not be possible to delete the file "lorem.txt"
