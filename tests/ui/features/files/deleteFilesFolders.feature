@insulated
Feature: deleting files and folders
As a user
I want to delete files and folders
So that I can keep my filing system clean and tidy

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
		| strängé filename (duplicate #2 &).txt |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload

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

	Scenario: Delete multiple files at once
		When I batch delete these files
		| name          |
		| data.zip      |
		| lorem.txt     |
		| simple-folder |
		Then the deleted elements should not be listed
		And the deleted elements should not be listed after a page reload

	Scenario: Delete an empty folder
		When I create a folder with the name "my-empty-folder"
		And I create a folder with the name "my-other-empty-folder"
		And I delete the folder "my-empty-folder"
		Then the folder "my-other-empty-folder" should be listed
		But the folder "my-empty-folder" should not be listed

	Scenario: Delete the last file in a folder
		When I delete the file "zzzz-must-be-last-file-in-folder.txt"
		Then the file "zzzz-must-be-last-file-in-folder.txt" should not be listed
