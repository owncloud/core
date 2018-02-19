@insulated
Feature: File Upload

As a QA engineer
I would like to test uploads of all kind of funny filenames via the WebUI

These tests are written in a way that multiple file names are tested in one scenario
that is not academically correct but saves a lot of time

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		And I am on the login page
		And I login with username "user1" and password "1234"

	Scenario: simple upload of a file that does not exist before
		When I upload the file "new-'single'quotes.txt"
		Then the file "new-'single'quotes.txt" should be listed
		And the content of "new-'single'quotes.txt" should be the same as the local "new-'single'quotes.txt"

		When I upload the file "new-strängé filename (duplicate #2 &).txt"
		Then the file "new-strängé filename (duplicate #2 &).txt" should be listed
		And the content of "new-strängé filename (duplicate #2 &).txt" should be the same as the local "new-strängé filename (duplicate #2 &).txt"

		When I upload the file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"
		Then the file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be listed
		And the content of "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be the same as the local "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"

	Scenario Outline: upload a new file into a sub folder
		And a file with the size of "3000" bytes and the name "0" exists
		When I open the folder <folder-to-upload-to>
		And I upload the file "0"
		Then the file "0" should be listed
		And the content of "0" should be the same as the local "0"

		When I upload the file "new-'single'quotes.txt"
		Then the file "new-'single'quotes.txt" should be listed
		And the content of "new-'single'quotes.txt" should be the same as the local "new-'single'quotes.txt"

		When I upload the file "new-strängé filename (duplicate #2 &).txt"
		Then the file "new-strängé filename (duplicate #2 &).txt" should be listed
		And the content of "new-strängé filename (duplicate #2 &).txt" should be the same as the local "new-strängé filename (duplicate #2 &).txt"

		When I upload the file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"
		Then the file "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be listed
		And the content of "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt" should be the same as the local "zzzz-zzzz-will-be-at-the-end-of-the-folder-when-uploaded.txt"
		Examples:
		| folder-to-upload-to  |
		| "0"                  |
		| "'single'quotes"     |
		| "strängé नेपाली folder" |

	Scenario: overwrite an existing file
		When I upload overwriting the file "'single'quotes.txt" and retry if the file is locked
		Then the file "'single'quotes.txt" should be listed
		And the content of "'single'quotes.txt" should be the same as the local "'single'quotes.txt"

		When I upload overwriting the file "strängé filename (duplicate #2 &).txt" and retry if the file is locked
		Then the file "strängé filename (duplicate #2 &).txt" should be listed
		And the content of "strängé filename (duplicate #2 &).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"

		When I upload overwriting the file "zzzz-must-be-last-file-in-folder.txt" and retry if the file is locked
		Then the file "zzzz-must-be-last-file-in-folder.txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder.txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"

	Scenario: keep new and existing file
		When I upload the file "'single'quotes.txt" keeping both new and existing files
		Then the file "'single'quotes.txt" should be listed
		And the content of "'single'quotes.txt" should not have changed
		And the file "'single'quotes (2).txt" should be listed
		And the content of "'single'quotes (2).txt" should be the same as the local "'single'quotes.txt"

		When I upload the file "strängé filename (duplicate #2 &).txt" keeping both new and existing files
		Then the file "strängé filename (duplicate #2 &).txt" should be listed
		And the content of "strängé filename (duplicate #2 &).txt" should not have changed
		And the file "strängé filename (duplicate #2 &) (2).txt" should be listed
		And the content of "strängé filename (duplicate #2 &) (2).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"

		When I upload the file "zzzz-must-be-last-file-in-folder.txt" keeping both new and existing files
		Then the file "zzzz-must-be-last-file-in-folder.txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder.txt" should not have changed
		And the file "zzzz-must-be-last-file-in-folder (2).txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder (2).txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"

	Scenario Outline: chunking upload using difficult names
		And a file with the size of "30000000" bytes and the name <file-name> exists
		When I upload the file <file-name>
		Then the file <file-name> should be listed
		And the content of <file-name> should be the same as the local <file-name>
		Examples:
		|file-name|
		|"&#"     |
		|"TIÄFÜ"  |
		
	#this test should be intergrated into the previous scenario after fixing the issue
	#uploading into "simple-folder" because there is a folder called "0" in the root
	@skip @issue-29599
	Scenario: Upload a file called "0" using chunking
		And a file with the size of "30000000" bytes and the name "0" exists
		When I open the folder "simple-folder"
		And I upload the file "0"
		Then the file "0" should be listed
		And the content of "0" should be the same as the local "0"