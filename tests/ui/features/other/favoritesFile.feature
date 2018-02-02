@insulated
Feature: Mark file as favorite

As a user
I would like to mark any file/folder as favorite
So that I can find my favorite file/folder easily

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: mark a file as favorite and list it in favorites page
		When I mark the file "data.zip" as favorite 
		Then the file "data.zip" should be marked as favorite
		And the files page is reloaded
		Then the file "data.zip" should be marked as favorite
		And the file "data.zip" should be listed in the favorites page
		And the file "lorem.txt" should not be listed in the favorites page

	Scenario: mark a folder as favorite and list it in favorites page
		When I mark the folder "simple-folder" as favorite 
		Then the folder "simple-folder" should be marked as favorite
		And the files page is reloaded
		Then the folder "simple-folder" should be marked as favorite
		And the folder "simple-folder" should be listed in the favorites page
		And the folder "simple-empty-folder" should not be listed in the favorites page
