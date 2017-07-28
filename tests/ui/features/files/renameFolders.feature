Feature: renameFolders

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario Outline: Rename a folder using special characters
		When I rename the folder "simple-folder" to <to_folder_name>
		Then the folder <to_folder_name> should be listed
		Examples:
		|to_folder_name|
		|'सिमप्ले फोल्देर'    |
		|'"quotes1"'   |
		|"'quotes2'"   |

	Scenario Outline: Rename a folder that has special characters in its name
		When I rename the folder <from_name> to <to_name>
		Then the folder <to_name> should be listed
		Examples:
		|from_name           |to_name               |
		|"strängé नेपाली folder"|"strängé नेपाली folder-2"|
		|"'single'quotes"    |"single-quotes"       |

	Scenario: Rename a folder using special characters and check its existence after page reload
		When I rename the folder "simple-folder" to "लोरेम।तयक्स्त $%&"
		And the page is reloaded
		Then the folder "लोरेम।तयक्स्त $%&" should be listed
		When I rename the folder "लोरेम।तयक्स्त $%&" to '"double"quotes'
		And the page is reloaded
		Then the folder '"double"quotes' should be listed
		When I rename the folder '"double"quotes' to "no-double-quotes"
		And the page is reloaded
		Then the folder "no-double-quotes" should be listed

	Scenario: Rename a folder using forbidden characters
		When I rename the folder "simple-folder" to one of these names
		|simple\folder   |
		|\\simple-folder |
		Then notifications should be displayed with the text
		|Could not rename "simple-folder"|
		|Could not rename "simple-folder"|
		And the folder "simple-folder" should be listed

	@skip @issue-28441
	Scenario: Rename a folder to a forbidden name
		When I rename the folder "simple-folder" to one of these names
		|.htaccess       |
		Then notifications should be displayed with the text
		|Could not rename "simple-folder"|
		And the folder "simple-folder" should be listed

	Scenario: Rename a folder putting a name of a file which already exists
		When I rename the folder "simple-folder" to "lorem.txt"
		Then near the folder "simple-folder" a tooltip with the text 'lorem.txt already exists' should be displayed

	Scenario: Rename a folder using forward slash
		When I rename the folder "simple-folder" to "simple/folder"
		Then near the folder "simple-folder" a tooltip with the text 'File name cannot contain "/".' should be displayed

	Scenario: Rename a folder to ..
		When I rename the folder "simple-folder" to ".."
		Then near the folder "simple-folder" a tooltip with the text '".." is an invalid file name.' should be displayed

	Scenario: Rename a folder to .
		When I rename the folder "simple-folder" to "."
		Then near the folder "simple-folder" a tooltip with the text '"." is an invalid file name.' should be displayed

	Scenario: Rename a folder to .part
		When I rename the folder "simple-folder" to "simple.part"
		Then near the folder "simple-folder" a tooltip with the text '"simple.part" has a forbidden file type/extension.' should be displayed

