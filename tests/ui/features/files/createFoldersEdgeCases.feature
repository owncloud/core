@insulated
Feature: create folder
As a user
I want to create folders
So that I can organise my data structure

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario Outline: Create a folder using special characters
		When I create a folder with the name <folder_name>
		Then the folder <folder_name> should be listed
		And the files page is reloaded
		Then the folder <folder_name> should be listed
		Examples:
		|folder_name    |
		|'सिमप्ले फोल्देर $%#?&@'|
		|'"somequotes1"'|
		|"'somequotes2'"|
		|"^#29][29@({"|
		|"+-{$(882)"|
		
	Scenario Outline: Create a sub-folder inside a folder with problematic name
	# First try and create a folder with problematic name
	# Then try and create a sub-folder inside the folder with problematic name
		When I create a folder with the name <folder>
		And I open the folder <folder>
		Then there are no files/folders listed
		When I create a folder with the name "sub-folder"
		Then the folder "sub-folder" should be listed
		And the files page is reloaded
		Then the folder "sub-folder" should be listed
		Examples:
		|folder|
		|"?&%0"|
		|"^#2929@"|
		
	Scenario Outline: Create a sub-folder inside an existing folder with problematic name
	# Use an existing folder with problematic name to create a sub-folder
	# Uses the folder created by skeleton
		When I open the folder <folder>
		And I create a folder with the name "sub-folder"
		Then the folder "sub-folder" should be listed
		And the files page is reloaded
		Then the folder "sub-folder" should be listed
		Examples:
		|folder|
		|"0"|
		|"'single'quotes"|
		|"strängé नेपाली folder"|