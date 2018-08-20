@webUI @insulated
Feature: Change own full name on the personal settings page
As a user
I would like to change my own full name
So that other users can recognize me by it

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the personal general settings page

	@smokeTest
	Scenario: Change full name 
		When the user changes the full name to "my#very&weird?नेपालि%name" using the webUI
		And the user reloads the current page of the webUI
		Then "my#very&weird?नेपालि%name" should be shown as the name of the current user on the WebUI
		And the attributes of user "user1" returned by the API should include
			| displayname | my#very&weird?नेपालि%name |