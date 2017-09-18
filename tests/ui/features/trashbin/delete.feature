Feature: delete

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: Delete files & folders one by one and check its existence after page reload
		When I delete the elements
		| name                                |
		| simple-folder                       |
		| lorem.txt                           |
		| strängé नेपाली folder                  |
		| strängé filename (duplicate #2).txt |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload
		But the deleted elements should be listed in the trashbin

	Scenario: Delete a file with problematic characters
		When I rename the following file to
			| from-name-parts | to-name-parts   |
			| lorem.txt       | 'single'        |
			|                 | "double" quotes |
			|                 | question?       |
			|                 | &and#hash       |
		And the files page is reloaded
		Then the following file should be listed
			| name-parts      |
			| 'single'        |
			| "double" quotes |
			| question?       |
			| &and#hash       |
		And I delete the following file
			| name-parts      |
			| 'single'        |
			| "double" quotes |
			| question?       |
			| &and#hash       |
		Then the following file should not be listed
			| name-parts      |
			| 'single'        |
			| "double" quotes |
			| question?       |
			| &and#hash       |
		And the files page is reloaded
		Then the following file should not be listed
			| name-parts      |
			| 'single'        |
			| "double" quotes |
			| question?       |
			| &and#hash       |
		But the following file should be listed in the trashbin
			| name-parts      |
			| 'single'        |
			| "double" quotes |
			| question?       |
			| &and#hash       |
	
	Scenario: Delete multiple files at once
		When I batch delete these files
		| name          |
		| data.zip      |
		| lorem.txt     |
		| simple-folder |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload
		But the deleted elements should be listed in the trashbin