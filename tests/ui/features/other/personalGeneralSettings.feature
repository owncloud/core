Feature: personalGeneralSettings

	Scenario: change language
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the personal general settings page
		When I change the language to "Русский"
		Then I should be redirected to a page with the title "Настройки - ownCloud"