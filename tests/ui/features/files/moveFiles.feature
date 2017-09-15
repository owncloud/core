Feature: moveFiles

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: move a file into a folder
		When I move the file "data.zip" into the folder "simple-empty-folder"
		Then the file "data.zip" should not be listed
		But the file "data.zip" should be listed in the folder "simple-empty-folder"
		When I am on the files page
		And I move the file "data.tar.gz" into the folder "strängé नेपाली folder empty"
		Then the file "data.tar.gz" should not be listed
		But the file "data.tar.gz" should be listed in the folder "strängé नेपाली folder empty"
		When I am on the files page
		And I move the file "strängé filename (duplicate #2).txt" into the folder "strängé नेपाली folder empty"
		Then the file "strängé filename (duplicate #2).txt" should not be listed
		But the file "strängé filename (duplicate #2).txt" should be listed in the folder "strängé नेपाली folder empty"

	Scenario: move a file into a folder where a file with the same name already exists
		When I move the file "data.zip" into the folder "simple-folder"
		And I move the file "data.zip" into the folder "strängé नेपाली folder"
		And I move the file "strängé filename (duplicate #2).txt" into the folder "strängé नेपाली folder"
		Then notifications should be displayed with the text
			|Could not move "data.zip", target exists|
			|Could not move "data.zip", target exists|
			|Could not move "strängé filename (duplicate #2).txt", target exists|
		And the file "data.zip" should be listed
		And the file "strängé filename (duplicate #2).txt" should be listed

	Scenario: Move multiple files at once
		When I batch move these files into the folder "simple-empty-folder"
		| name        |
		| data.zip    |
		| lorem.txt   |
		| testapp.zip |
		Then the moved elements should not be listed
		And the moved elements should not be listed after a page reload
		But the moved elements should be listed in the folder "simple-empty-folder"

	Scenario: move a file into a folder (problematic characters)
		When I rename the following file to
			| from-name-parts         | to-name-parts          |
			| lorem.txt               | 'single'               |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And I rename the following folder to
			| from-name-parts         |to-name-parts           |
			| simple-empty-folder     | folder-with'single'    |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And I move the following file to
			| item-to-move-name-parts | destination-name-parts |
			| 'single'                | folder-with'single'    |
			| "double" quotes         | "double" quotes        |
			| question?               | question?              |
			| &and#hash               | &and#hash              |
		Then the following item should be listed in the following folder
			| item-name-parts         | folder-name-parts      |
			| 'single'                | folder-with'single'    |
			| "double" quotes         | "double" quotes        |
			| question?               | question?              |
			| &and#hash               | &and#hash              |