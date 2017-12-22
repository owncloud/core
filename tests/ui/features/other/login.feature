@insulated
Feature: login users
As a user
I want to be able to log into my account
So that I have access to my files

As an admin
I want only authorised users to log in
So that unauthorised access is impossible

	Scenario: simple user login
		Given a regular user exists but is not initialized
		And I am on the login page
		When I login as a regular user with a correct password
		Then I should be redirected to a page with the title "Files - ownCloud"

	Scenario: use the webUI to create a simple user
		Given I am logged in as admin
		And I am on the users page
		When I create a user with the name "guiusr1" and the password "pwd"
		And I logout
		And I login with username "guiusr1" and password "pwd"
		Then I should be redirected to a page with the title "Files - ownCloud"

	Scenario: use the webUI to create a user with special valid characters
		Given I am logged in as admin
		And I am on the users page
		When I create a user with the name "@-_.'" and the password "pwd"
		And I logout
		And I login with username "@-_.'" and password "pwd"
		Then I should be redirected to a page with the title "Files - ownCloud"

	Scenario Outline: use the webUI to create a user with special invalid characters
		Given I am logged in as admin
		And I am on the users page
		When I create a user with the name <user> and the password <pwd>
		Then notifications should be displayed with the text
			|Error creating user: Only the following characters are allowed in a username: "a-z", "A-Z", "0-9", and "_.@-'"|
		And I should be redirected to a page with the title "Users - ownCloud"
		Examples:
		| user | pwd |
		|"a#%"|"pwd1"|
		|"a+^"|"pwd2"|
		|"a)~"|"pwd2"|
		|"a(="|"pwd2"|
		|"a`*^"|"pwd2"|

	Scenario: use the webUI to create a user with empty password
		Given I am logged in as admin
		And I am on the users page
		When I create a user with the name "bijay" and the password ""
		Then notifications should be displayed with the text
			|Error creating user: A valid password must be provided|
		And I should be redirected to a page with the title "Users - ownCloud"

	Scenario Outline: use the webUI to create a user with less than 3 characters
		Given I am logged in as admin
		And I am on the users page
		When I create a user with the name <user> and the password <pwd>
		Then notifications should be displayed with the text
		|Error creating user: The username must be at least 3 characters long|
		Examples:
		|user|  pwd |
		|"a" | "abc"|
		|"a1"|"abcd"|

	Scenario: admin login
		Given I am on the login page
		When I login with username "admin" and password "admin"
		Then I should be redirected to a page with the title "Files - ownCloud"

	Scenario: admin login with invalid password
		Given I am on the login page
		When I login with username "admin" and invalid password "invalidpassword"
		Then I should be redirected to a page with the title "ownCloud"

	Scenario: access the personal general settings page when not logged in
		Given I go to the personal general settings page
		Then I should be redirected to a page with the title "ownCloud"
		When I login with username "admin" and password "admin" after a redirect from the "personal general settings" page
		Then I should be redirected to a page with the title "Settings - ownCloud"

	Scenario: access the personal general settings page when not logged in using incorrect then correct password
		Given I go to the personal general settings page
		Then I should be redirected to a page with the title "ownCloud"
		When I login with username "admin" and invalid password "qwerty"
		Then I should be redirected to a page with the title "ownCloud"
		When I login with username "admin" and password "admin" after a redirect from the "personal general settings" page
		Then I should be redirected to a page with the title "Settings - ownCloud"
