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