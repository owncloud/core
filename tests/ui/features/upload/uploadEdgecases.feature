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
		When I open the folder <folder-to-upload-to>
		When I upload the file "0"
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
		When I upload the file "'single'quotes.txt"
		And I choose to keep the new files
		And I click the "Continue" button
		Then the file "'single'quotes.txt" should be listed
		And the content of "'single'quotes.txt" should be the same as the local "'single'quotes.txt"
		When I upload the file "strängé filename (duplicate #2 &).txt"
		And I choose to keep the new files
		And I click the "Continue" button
		Then the file "strängé filename (duplicate #2 &).txt" should be listed
		And the content of "strängé filename (duplicate #2 &).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"
		When I upload the file "zzzz-must-be-last-file-in-folder.txt"
		And I choose to keep the new files
		And I click the "Continue" button
		Then the file "zzzz-must-be-last-file-in-folder.txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder.txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"

	Scenario: keep new and existing file
		When I upload the file "'single'quotes.txt"
		And I choose to keep the new files
		And I choose to keep the existing files
		And I click the "Continue" button
		Then the file "'single'quotes.txt" should be listed
		And the content of "'single'quotes.txt" should not have changed
		And the file "'single'quotes (2).txt" should be listed
		And the content of "'single'quotes (2).txt" should be the same as the local "'single'quotes.txt"
		When I upload the file "strängé filename (duplicate #2 &).txt"
		And I choose to keep the new files
		And I choose to keep the existing files
		And I click the "Continue" button
		Then the file "strängé filename (duplicate #2 &).txt" should be listed
		And the content of "strängé filename (duplicate #2 &).txt" should not have changed
		And the file "strängé filename (duplicate #2 &) (2).txt" should be listed
		And the content of "strängé filename (duplicate #2 &) (2).txt" should be the same as the local "strängé filename (duplicate #2 &).txt"
		
		When I upload the file "zzzz-must-be-last-file-in-folder.txt"
		And I choose to keep the new files
		And I choose to keep the existing files
		And I click the "Continue" button
		Then the file "zzzz-must-be-last-file-in-folder.txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder.txt" should not have changed
		And the file "zzzz-must-be-last-file-in-folder (2).txt" should be listed
		And the content of "zzzz-must-be-last-file-in-folder (2).txt" should be the same as the local "zzzz-must-be-last-file-in-folder.txt"