Feature: moveFolders

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario: move a folder into another folder
		When I move the folder "simple-folder" into the folder "simple-empty-folder"
		Then the folder "simple-folder" should not be listed
		But the folder "simple-folder" should be listed in the folder "simple-empty-folder"
		When I am on the files page
		And I move the folder "strängé नेपाली folder" into the folder "strängé नेपाली folder empty"
		Then the folder "strängé नेपाली folder" should not be listed
		But the folder "strängé नेपाली folder" should be listed in the folder "strängé नेपाली folder empty"

	Scenario: move a folder into another folder where a folder with the same name already exists
		When I move the folder "simple-empty-folder" into the folder "simple-folder"
		Then notifications should be displayed with the text
			|Could not move "simple-empty-folder", target exists|
		And the folder "simple-empty-folder" should be listed

	Scenario: Move multiple folders at once
		When I batch move these folders into the folder "simple-empty-folder"
		| name               |
		| simple-folder      |
		| strängé नेपाली folder |
		Then the moved elements should not be listed
		And the moved elements should not be listed after a page reload
		But the moved elements should be listed in the folder "simple-empty-folder"

	Scenario: move a folder into another folder (problematic characters)
		When I rename the following folder to
			| from-name-parts         | to-name-parts          |
			| simple-folder           | 'single'               |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And I rename the following folder to
			| from-name-parts         |to-name-parts           |
			| simple-empty-folder     | folder-with'single'    |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And I move the following folder to
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