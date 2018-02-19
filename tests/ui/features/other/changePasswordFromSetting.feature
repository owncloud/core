@insulated
Feature: Change Login Password
As a user
I would like to change my login password
So that I can login with my new password

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"
		And I go to the personal general settings page

	Scenario: Change password 
		When I change the password to "passcode"
		And I relogin with username "user1" and password "passcode"
		Then I should be redirected to a page with the title "Files - ownCloud"

	Scenario: Password change with wrong current password
		When I change the password to "passcode" using wrong current password
		Then a password error message should be displayed with the text "Wrong password"

	Scenario: New password is same as current password
		When I change the password to "1234"
		Then a password error message should be displayed with the text "The new password can not be the same as the previous one"