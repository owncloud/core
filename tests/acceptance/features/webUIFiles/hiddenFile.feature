@webUI @insulated @disablePreviews
Feature: Hide file/folders

As a user
I would like to display hidden files/folders
So that I can choose to see the files that I want.

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: create a hidden folder
		When I create a folder with the name ".xyz"
		Then the folder ".xyz" should not be listed
		When I enable the setting to view hidden folders
		Then the folder ".xyz" should be listed
