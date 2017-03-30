Feature: login

	Scenario: simple login
		Given I am on login page
		When I login with username "admin" and password "admin"
		Then I should be redirected to a page with the title "Files - ownCloud"