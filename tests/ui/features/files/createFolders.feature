@insulated
Feature: create folders
As a user
I want to create folders
So that I can organise my data structure

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"
		And I am on the files page

	Scenario: Create a folder inside another folder
		When I create a folder with the name "top-folder"
		And I open the folder "top-folder"
		Then there are no files/folders listed
		When I create a folder with the name "sub-folder"
		Then the folder "sub-folder" should be listed
		And the files page is reloaded
		Then the folder "sub-folder" should be listed

	Scenario: Create a folder with existing name
		When I create a folder with the invalid name "simple-folder"
		Then near the folder input field a tooltip with the text 'simple-folder already exists' should be displayed
	