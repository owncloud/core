@insulated
Feature: Renaming files inside a folder with problematic name
As a user
I want to rename a file
So that I can recognize my file easily

	Background:
Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario: Create a problematic file inside a folder
		When I open the folder "0"
		And I rename the file "lorem.txt" to "???.txt"
		Then the file "???.txt" should be listed
		And the files page is reloaded
		Then the file "???.txt" should be listed
