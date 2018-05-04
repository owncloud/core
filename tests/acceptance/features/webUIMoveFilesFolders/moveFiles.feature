@webUI @insulated @disablePreviews
Feature: move files
As a user
I want to move files
So that I can organise my data structure

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the files page

	Scenario: An attempt to move a file into a sub-folder using rename is not allowed
		When the user renames the file "data.zip" to "simple-folder/data.zip" using the webUI
		Then near the file "data.zip" a tooltip with the text 'File name cannot contain "/".' should be displayed on the webUI

	@skipOnFIREFOX
	Scenario: move a file into a folder
		When the user moves the file "data.zip" into the folder "simple-empty-folder" using the webUI
		Then the file "data.zip" should not be listed on the webUI
		But the file "data.zip" should be listed in the folder "simple-empty-folder" on the webUI
		When the user browses to the files page
		And the user moves the file "data.tar.gz" into the folder "strängé नेपाली folder empty" using the webUI
		Then the file "data.tar.gz" should not be listed on the webUI
		But the file "data.tar.gz" should be listed in the folder "strängé नेपाली folder empty" on the webUI
		When the user browses to the files page
		And the user moves the file "strängé filename (duplicate #2 &).txt" into the folder "strängé नेपाली folder empty" using the webUI
		Then the file "strängé filename (duplicate #2 &).txt" should not be listed on the webUI
		But the file "strängé filename (duplicate #2 &).txt" should be listed in the folder "strängé नेपाली folder empty" on the webUI

	@skipOnFIREFOX
	Scenario: move a file into a folder where a file with the same name already exists
		When the user moves the file "data.zip" into the folder "simple-folder" using the webUI
		And the user moves the file "data.zip" into the folder "strängé नेपाली folder" using the webUI
		Then notifications should be displayed on the webUI with the text
			|Could not move "data.zip", target exists|
			|Could not move "data.zip", target exists|
		And the file "data.zip" should be listed on the webUI

	@skipOnFIREFOX
	Scenario: move a file into a folder where a file with the same name already exists
		When the user moves the file "strängé filename (duplicate #2 &).txt" into the folder "strängé नेपाली folder" using the webUI
		Then notifications should be displayed on the webUI with the text
			|Could not move "strängé filename (duplicate #2 &).txt", target exists|
		And the file "strängé filename (duplicate #2 &).txt" should be listed on the webUI

	@skipOnFIREFOX
	Scenario: Move multiple files at once
		When the user batch moves these files into the folder "simple-empty-folder" using the webUI
		| name        |
		| data.zip    |
		| lorem.txt   |
		| testapp.zip |
		Then the moved elements should not be listed on the webUI
		And the moved elements should not be listed on the webUI after a page reload
		But the moved elements should be listed in the folder "simple-empty-folder" on the webUI

	@skipOnFIREFOX
	Scenario: move a file into a folder (problematic characters)
		When the user renames the following file using the webUI
			| from-name-parts         | to-name-parts          |
			| lorem.txt               | 'single'               |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And the user renames the following folder using the webUI
			| from-name-parts         |to-name-parts           |
			| simple-empty-folder     | folder-with'single'    |
			|                         | "double" quotes        |
			|                         | question?              |
			|                         | &and#hash              |
		And the user moves the following file using the webUI
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