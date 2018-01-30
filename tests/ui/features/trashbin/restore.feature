@insulated
Feature: Restore deleted files/folders
As a user
I would like to restore files/folders
So that I can recover accidentally deleted files/folders in ownCloud

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"
		And I am on the files page

	Scenario: Restore files
		When I delete the file "data.zip" 
		Then the file "data.zip" should be listed in the trashbin
		When I restore the file "data.zip"
		Then the file "data.zip" should not be listed 
		When I am on the files page
		Then the file "data.zip" should be listed 

	Scenario: Restore folder
		When I delete the folder "folder with space" 
		Then the folder "folder with space" should be listed in the trashbin 
		When I restore the folder "folder with space"
		Then the file "folder with space" should not be listed 
		When I am on the files page
		Then the folder "folder with space" should be listed 