Feature: login

	Scenario: simple login
		Given I am on login page
		When I login with username "admin" and password "admin"
		Then a file with the name "welcome.txt" should be listed