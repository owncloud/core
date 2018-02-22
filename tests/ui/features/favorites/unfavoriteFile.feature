@insulated @disablePreviews
Feature: Unmark file/folder as favorite

As a user
I would like to unmark any file/folder
So that I can remove my favorite file/folder from favorite page

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: unmark a file as favorite from files page 
		Given the file "data.zip" is marked as favorite 
		When I unmark the file "data.zip"
		Then the file "data.zip" should not be marked as favorite
		And I am on the favorites page
		Then the file "data.zip" should not be listed in the favorites page

	Scenario: unmark a folder as favorite from files page 
		Given the folder "simple-folder" is marked as favorite 
		When I unmark the folder "simple-folder"
		Then the folder "simple-folder" should not be marked as favorite
		And I am on the favorites page
		Then the folder "simple-folder" should not be listed in the favorites page
	
	Scenario: unmark a file as favorite from favorite page 
		Given the file "data.zip" is marked as favorite 
		And I am on the favorites page
		When I unmark the file "data.zip"
		And the favorites page is reloaded
		Then the file "data.zip" should not be listed in the favorites page
		And I am on the files page
		Then the file "data.zip" should not be marked as favorite
	

	Scenario: unmark a folder as favorite from files page 
		Given the folder "simple-folder" is marked as favorite 
		And I am on the favorites page
		When I unmark the folder "simple-folder"
		And the favorites page is reloaded
		Then the folder "simple-folder" should not be listed in the favorites page
		And I am on the files page
		Then the folder "simple-folder" should not be marked as favorite