@webUI @insulated @disablePreviews
Feature: Unmark file/folder as favorite

As a user
I would like to unmark any file/folder
So that I can remove my favorite file/folder from favorite page

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the files page

	@smokeTest
	Scenario: unmark a file as favorite from files page 
		Given the user has marked the file "data.zip" as favorite using the webUI
		When the user unmarks the favorited file "data.zip" using the webUI
		Then the file "data.zip" should not be marked as favorite on the webUI
		When the user browses to the favorites page
		Then the file "data.zip" should not be listed in the favorites page on the webUI

	Scenario: unmark a folder as favorite from files page 
		Given the user has marked the folder "simple-folder" as favorite using the webUI
		When the user unmarks the favorited folder "simple-folder" using the webUI
		Then the folder "simple-folder" should not be marked as favorite on the webUI
		When the user browses to the favorites page
		Then the folder "simple-folder" should not be listed in the favorites page on the webUI

	@smokeTest
	Scenario: unmark a file as favorite from favorite page 
		Given the user has marked the file "data.zip" as favorite using the webUI
		And the user has browsed to the favorites page
		When the user unmarks the favorited file "data.zip" using the webUI
		And the user reloads the current page of the webUI
		Then the file "data.zip" should not be listed in the favorites page on the webUI
		When the user browses to the files page
		Then the file "data.zip" should not be marked as favorite on the webUI

	Scenario: unmark a folder as favorite from files page 
		Given the user has marked the folder "simple-folder" as favorite using the webUI
		And the user has browsed to the favorites page
		When the user unmarks the favorited folder "simple-folder" using the webUI
		And the user reloads the current page of the webUI
		Then the folder "simple-folder" should not be listed in the favorites page on the webUI
		When the user browses to the files page
		Then the folder "simple-folder" should not be marked as favorite on the webUI