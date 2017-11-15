@insulated
Feature: File Upload

As a user
I would like to be able to upload files via the WebUI
So that I can store files in ownCloud

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario: simple upload of a file that does not exist before
		When I upload the file "new-lorem.txt"
		Then the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	Scenario: upload a new file into a sub folder
		When I open the folder "simple-folder"
		And I upload the file "new-lorem.txt"
		Then the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	Scenario: overwrite an existing file
		When I upload the file "lorem.txt"
		And I choose to keep the new files
		And I click the "Continue" button
		Then no dialog should be displayed
		And the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the local "lorem.txt"
		But the file "lorem (2).txt" should not be listed

	Scenario: keep new and existing file
		When I upload the file "lorem.txt"
		And I choose to keep the new files
		And I choose to keep the existing files
		And I click the "Continue" button
		Then no dialog should be displayed
		And the file "lorem.txt" should be listed
		And the content of "lorem.txt" should not have changed
		And the file "lorem (2).txt" should be listed
		And the content of "lorem (2).txt" should be the same as the local "lorem.txt"
		
	Scenario: cancel conflict dialog
		When I upload the file "lorem.txt"
		And I click the "Cancel" button
		Then no dialog should be displayed
		And the file "lorem.txt" should be listed
		And the content of "lorem.txt" should not have changed
		And the file "lorem (2).txt" should not be listed