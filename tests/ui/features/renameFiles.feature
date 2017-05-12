Feature: renameFiles

	Scenario: Rename a file using special characters
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page
		When I rename the file "lorem.txt" to "लोरेम।तयक्स्त $%&"
		Then the file "लोरेम।तयक्स्त $%&" should be listed

	Scenario: Rename a file using special characters check its existence after page reload
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page
		When I rename the file "lorem.txt" to "लोरेम।तयक्स्त $%&"
		And the page is reloaded
		Then the file "लोरेम।तयक्स्त $%&" should be listed

	Scenario: Rename a file using forbidden characters
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page
		When I rename the file "data.zip" to one of these names
		|lorem/txt  |
		|.htaccess  |
		|lorem\txt  |
		|\\.txt     |
		Then notifications should be displayed with the text
		|Could not rename "data.zip"|
		|Could not rename "data.zip"|
		|Could not rename "data.zip"|
		|Could not rename "data.zip"|
		And the file "data.zip" should be listed

	Scenario: Rename a file putting a name of a file which already exists
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page
		When I rename the file "data.zip" to "lorem.txt"
		Then near the file "data.zip" a tooltip with the text 'lorem.txt already exists' should be displayed