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
		When I rename the file <from_name> to <to_name>
		|from_name            |to_name                |
		|"simple-folder"          |"लोरेम।तयक्स्त $%&" |
		|"लोरेम।तयक्स्त $%&" |'"double"quotes'   |
		|'"double"quotes' |"no-double-quotes" |
		And the page is reloaded
		Then the file <to_name> should be listed
		|"लोरेम।तयक्स्त $%&" |
		|'"double"quotes' |
		|"no-double-quotes" |

	Scenario: Rename a folder using forbidden characters
		When I rename the folder "simple-folder" to one of these names
		|simple/folder   |
		|.htaccess       |
		|simple\folder   |
		|\\simple/folder |
		|../simple-folder|
		Then notifications should be displayed with the text
		|Could not rename "simple-folder"|
		|Could not rename "simple-folder"|
		|Could not rename "simple-folder"|
		|Could not rename "simple-folder"|
		|Could not rename "simple-folder"|
		And the folder "simple-folder" should be listed

	Scenario: Rename a folder putting a name of a file which already exists
		When I rename the folder "simple-folder" to "lorem.txt"
		Then near the folder "simple-folder" a tooltip with the text 'lorem.txt already exists' should be displayed
