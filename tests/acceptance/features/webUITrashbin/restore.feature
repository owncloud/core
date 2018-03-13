@webUI @insulated @disablePreviews
Feature: Restore deleted files/folders
As a user
I would like to restore files/folders
So that I can recover accidentally deleted files/folders in ownCloud

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the files page

	Scenario: Restore files
		When the user deletes the file "data.zip" using the webUI
		Then the file "data.zip" should be listed in the trashbin on the webUI
		When the user restores the file "data.zip" from the trashbin using the webUI
		Then the file "data.zip" should not be listed on the webUI
		When the user browses to the files page
		Then the file "data.zip" should be listed on the webUI

	Scenario: Restore folder
		When the user deletes the folder "folder with space" using the webUI
		Then the folder "folder with space" should be listed in the trashbin on the webUI
		When the user restores the folder "folder with space" from the trashbin using the webUI
		Then the file "folder with space" should not be listed on the webUI
		When the user browses to the files page
		Then the folder "folder with space" should be listed on the webUI