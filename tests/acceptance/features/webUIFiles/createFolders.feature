@webUI @insulated @disablePreviews
Feature: create folders
As a user
I want to create folders
So that I can organise my data structure

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the files page

	@smokeTest
	Scenario: Create a folder inside another folder
		When the user creates a folder with the name "top-folder" using the webUI
		And the user opens the folder "top-folder" using the webUI
		Then there should be no files/folders listed on the webUI
		When the user creates a folder with the name "sub-folder" using the webUI
		Then the folder "sub-folder" should be listed on the webUI
		When the user reloads the current page of the webUI
		Then the folder "sub-folder" should be listed on the webUI

	Scenario: Create a folder with existing name
		When the user creates a folder with the invalid name "simple-folder" using the webUI
		Then near the folder input field a tooltip with the text 'simple-folder already exists' should be displayed on the webUI
	