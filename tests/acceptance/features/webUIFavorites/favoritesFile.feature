@webUI @insulated @disablePreviews
Feature: Mark file as favorite

As a user
I would like to mark any file/folder as favorite
So that I can find my favorite file/folder easily

	Background:
		Given a regular user has been created
		And the regular user has logged in using the webUI
		And the user has browsed to the files page

	Scenario: mark a file as favorite and list it in favorites page
		When the user marks the file "data.zip" as favorite using the webUI
		Then the file "data.zip" should be marked as favorite on the webUI
		When the user reloads the current page of the webUI
		Then the file "data.zip" should be marked as favorite on the webUI
		And the file "data.zip" should be listed in the favorites page on the webUI
		And the file "lorem.txt" should not be listed in the favorites page on the webUI

	Scenario: mark a folder as favorite and list it in favorites page
		When the user marks the folder "simple-folder" as favorite using the webUI
		Then the folder "simple-folder" should be marked as favorite on the webUI
		When the user reloads the current page of the webUI
		Then the folder "simple-folder" should be marked as favorite on the webUI
		And the folder "simple-folder" should be listed in the favorites page on the webUI
		And the folder "simple-empty-folder" should not be listed in the favorites page on the webUI
