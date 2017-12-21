@insulated
Feature: rename files
As a user
I want to rename files
So that I can organise my data structure

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	Scenario Outline: Rename a file using special characters
		When I rename the file "lorem.txt" to <to_file_name>
		Then the file <to_file_name> should be listed
		And the files page is reloaded
		Then the file <to_file_name> should be listed
		Examples:
		|to_file_name |
		|'लोरेम।तयक्स्त? $%#&@' |
		|'"quotes1"'  |
		|"'quotes2'"  |

	Scenario Outline: Rename a file that has special characters in its name
		When I rename the file <from_name> to <to_name>
		Then the file <to_name> should be listed
		And the files page is reloaded
		Then the file <to_name> should be listed
		Examples:
		|from_name                            |to_name                              |
		|"strängé filename (duplicate #2 &).txt"|"strängé filename (duplicate #3).txt"|
		|"'single'quotes.txt"                 |"single-quotes.txt"                  |

	Scenario: Rename a file using special characters and check its existence after page reload
		When I rename the file "lorem.txt" to "लोरेम।तयक्स्त $%&"
		And the files page is reloaded
		Then the file "लोरेम।तयक्स्त $%&" should be listed
		When I rename the file "लोरेम।तयक्स्त $%&" to '"double"quotes.txt'
		And the files page is reloaded
		Then the file '"double"quotes.txt' should be listed
		When I rename the file '"double"quotes.txt' to "no-double-quotes.txt"
		And the files page is reloaded
		Then the file "no-double-quotes.txt" should be listed
		When I rename the file 'no-double-quotes.txt' to "hash#And&QuestionMark?At@Filename.txt"
		And the files page is reloaded
		Then the file "hash#And&QuestionMark?At@Filename.txt" should be listed
		When I rename the file 'zzzz-must-be-last-file-in-folder.txt' to "aaaaaa.txt"
		And the files page is reloaded
		Then the file "aaaaaa.txt" should be listed

	Scenario: Rename a file using spaces at front and/or back of file name and type
		When I rename the file "lorem.txt" to " space at start"
		And the files page is reloaded
		Then the file " space at start" should be listed
		When I rename the file " space at start" to "space at end "
		And the files page is reloaded
		Then the file "space at end " should be listed
		When I rename the file "space at end " to "space at end .txt"
		And the files page is reloaded
		Then the file "space at end .txt" should be listed
		When I rename the file "space at end .txt" to "space at end. lis"
		And the files page is reloaded
		Then the file "space at end. lis" should be listed
		When I rename the file "space at end. lis" to "space at end.log "
		And the files page is reloaded
		Then the file "space at end.log " should be listed
		When I rename the file "space at end.log " to "  multiple   space    all     over   .  dat  "
		And the files page is reloaded
		Then the file "  multiple   space    all     over   .  dat  " should be listed

	Scenario: Rename a file using both double and single quotes
		When I rename the following file to
			|from-name-parts |to-name-parts         |
			|lorem.txt       |First 'single' quotes |
			|                |-then "double".txt    |
		And the files page is reloaded
		Then the following file should be listed
			|name-parts            |
			|First 'single' quotes |
			|-then "double".txt    |
		When I rename the following file to
			|from-name-parts       |to-name-parts |
			|First 'single' quotes |loremz.dat    |
			|-then "double".txt    |              |
		And the files page is reloaded
		Then the file "loremz.dat" should be listed

	Scenario: Rename a file using forbidden characters
		When I rename the file "data.zip" to one of these names
		|lorem\txt  |
		|\\.txt     |
		|.htaccess  |
		Then notifications should be displayed with the text
		|Could not rename "data.zip"|
		|Could not rename "data.zip"|
		|Could not rename "data.zip"|
		And the file "data.zip" should be listed

	Scenario: Rename the last file in a folder
		When I rename the file "zzzz-must-be-last-file-in-folder.txt" to "a-file.txt"
		And the files page is reloaded
		Then the file "a-file.txt" should be listed

	Scenario: Rename a file to become the last file in a folder
		When I rename the file "lorem.txt" to "zzzz-z-this-is-now-the-last-file.txt"
		And the files page is reloaded
		Then the file "zzzz-z-this-is-now-the-last-file.txt" should be listed

	Scenario: Rename a file putting a name of a file which already exists
		When I rename the file "data.zip" to "lorem.txt"
		Then near the file "data.zip" a tooltip with the text 'lorem.txt already exists' should be displayed

	Scenario: Rename a file using forward slash
		When I rename the file "data.zip" to "lorem/txt"
		Then near the file "data.zip" a tooltip with the text 'File name cannot contain "/".' should be displayed

	Scenario: Rename a file to ..
		When I rename the file "data.zip" to ".."
		Then near the file "data.zip" a tooltip with the text '".." is an invalid file name.' should be displayed

	Scenario: Rename a file to .
		When I rename the file "data.zip" to "."
		Then near the file "data.zip" a tooltip with the text '"." is an invalid file name.' should be displayed

	Scenario: Rename a file to .part
		When I rename the file "data.zip" to "data.part"
		Then near the file "data.zip" a tooltip with the text '"data.part" has a forbidden file type/extension.' should be displayed
