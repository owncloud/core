Feature: delete

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: Delete files & folders one by one and check its existence after page reload
		When I delete the folder "simple-folder"
		Then the folder "simple-folder" should not be listed
		When I delete the file "lorem.txt"
		Then the file "lorem.txt" should not be listed
		When I delete the folder "strängé नेपाली folder"
		Then the folder "strängé नेपाली folder" should not be listed
		When I delete the file "strängé filename (duplicate #2).txt"
		Then the file "strängé filename (duplicate #2).txt" should not be listed
		When the files page is reloaded
		Then the folder "simple-folder" should not be listed
		And the folder "strängé नेपाली folder" should not be listed
		And the file "lorem.txt" should not be listed
		And the file "strängé filename (duplicate #2).txt" should not be listed

	Scenario: Delete a file with problematic characters
		When I rename the following file to
			|from-name-parts |to-name-parts  |
			|lorem.txt       |'single'       |
			|                |"double" quotes|
			|                |question?      |
			|                |&and#hash      |
		And the files page is reloaded
		Then the following file should be listed
			|name-parts     |
			|'single'       |
			|"double" quotes|
			|question?      |
			|&and#hash      |
		And I delete the following file
			|name-parts     |
			|'single'       |
			|"double" quotes|
			|question?      |
			|&and#hash      |
		Then the following file should not be listed
			|name-parts     |
			|'single'       |
			|"double" quotes|
			|question?      |
			|&and#hash      |
		And the files page is reloaded
		Then the following file should not be listed
			|name-parts     |
			|'single'       |
			|"double" quotes|
			|question?      |
			|&and#hash      |
	
	Scenario: Delete multiple files at once
		When I mark these files for batch action
		|name     |
		|data.zip|
		|lorem.txt|
		|simple-folder|
		And I batch delete the marked files
		Then the folder "simple-folder" should not be listed
		And the file "data.zip" should not be listed
		And the file "lorem.txt" should not be listed
		When the files page is reloaded
		Then the folder "simple-folder" should not be listed
		And the file "data.zip" should not be listed
		And the file "lorem.txt" should not be listed
		