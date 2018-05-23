@webUI @insulated @disablePreviews
Feature: move folders
As a user
I want to move folders
So that I can organise my data structure

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the files page

	Scenario: An attempt to move a folder into a sub-folder using rename is not allowed
		When the user renames the folder "simple-empty-folder" to "simple-folder/simple-empty-folder" using the webUI
		Then near the folder "simple-empty-folder" a tooltip with the text 'File name cannot contain "/".' should be displayed on the webUI

	@skipOnFIREFOX
	Scenario: move a folder into another folder
		When the user moves the folder "simple-folder" into the folder "simple-empty-folder" using the webUI
		Then the folder "simple-folder" should not be listed on the webUI
		But the folder "simple-folder" should be listed in the folder "simple-empty-folder" on the webUI
		When the user browses to the files page
		And the user moves the folder "strängé नेपाली folder" into the folder "strängé नेपाली folder empty" using the webUI
		Then the folder "strängé नेपाली folder" should not be listed on the webUI
		But the folder "strängé नेपाली folder" should be listed in the folder "strängé नेपाली folder empty" on the webUI

	@skipOnFIREFOX
	Scenario: move a folder into another folder where a folder with the same name already exists
		When the user moves the folder "simple-empty-folder" into the folder "simple-folder" using the webUI
		Then notifications should be displayed on the webUI with the text
			|Could not move "simple-empty-folder", target exists|
		And the folder "simple-empty-folder" should be listed on the webUI

	@skipOnFIREFOX
	Scenario: Move multiple folders at once
		When the user batch moves these folders into the folder "simple-empty-folder" using the webUI
		| name               |
		| simple-folder      |
		| strängé नेपाली folder |
		Then the moved elements should not be listed on the webUI
		And the moved elements should not be listed on the webUI after a page reload
		But the moved elements should be listed in the folder "simple-empty-folder" on the webUI

	@skipOnFIREFOX
	Scenario: move a folder into another folder (problematic characters)
		When the user renames the following folder using the webUI
			| from-name-parts         | to-name-parts          |
			| simple-folder           | 'single'               |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And the user renames the following folder using the webUI
			| from-name-parts         |to-name-parts           |
			| simple-empty-folder     | folder-with'single'    |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And the user moves the following folder using the webUI
			| item-to-move-name-parts | destination-name-parts |
			| 'single'                | folder-with'single'    |
			| "double" quotes         | "double" quotes        |
			| question?               | question?              |
			| &and#hash               | &and#hash              |
		Then the following item should be listed in the following folder on the webUI
			| item-name-parts         | folder-name-parts      |
			| 'single'                | folder-with'single'    |
			| "double" quotes         | "double" quotes        |
			| question?               | question?              |
			| &and#hash               | &and#hash              |