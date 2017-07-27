Feature: login

	Scenario: simple user login
		Given a regular user exists
		And I am on the login page
		When I login as a regular user with a correct password
		Then I should be redirected to a page with the title "Files - ownCloud"

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
