Feature: renameFiles

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: Rename a file that has special characters in its name
		When I rename the file "'single'quotes.txt" to "single-quotes.txt"
		Then the file "single-quotes.txt" should be listed

	Scenario: Rename a file using special characters and check its existence after page reload
		When I rename the file "lorem.txt" to "लोरेम।तयक्स्त $%&"
		And the files page is reloaded
		Then the file "लोरेम।तयक्स्त $%&" should be listed
