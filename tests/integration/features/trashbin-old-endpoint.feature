Feature: trashbin
	Background:
		Given using api version "1"
		And using old dav path
		And As an "admin"
		And app "files_trashbin" is enabled

	Scenario: deleting a file moves it to trashbin
		Given As an "admin"
		And user "user0" exists
		When User "user0" deletes file "/textfile0.txt"
		Then as "user0" the file "/textfile0.txt" exists in trash

	Scenario: deleting a folder moves it to trashbin
		Given As an "admin"
		And user "user0" exists
		And user "user0" created a folder "/tmp"
		When User "user0" deletes folder "/tmp"
		Then as "user0" the folder "/tmp" exists in trash

	Scenario: deleting a file of a shared folder moves it to trashbin
		Given As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And User "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When User "user0" deletes file "/shared/shared_file.txt"
		Then as "user0" the folder with original path "/shared/shared_file.txt" exists in trash

	Scenario: deleting a shared folder moves it to trashbin
		Given As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And User "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When User "user0" deletes folder "/shared"
		Then as "user0" the folder with original path "/shared" exists in trash

	Scenario: deleting a received folder doesn't move it to trashbin
		Given As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And User "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When User "user1" deletes folder "/shared"
		Then as "user1" the folder with original path "/shared" does not exist in trash

	Scenario: deleting a file in a recieved folder doesn't moves it to trashbin
		Given As an "admin"
		And user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And User "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When User "user1" deletes file "/shared/shared_file.txt"
		Then as "user1" the folder with original path "/shared/shared_file.txt" does not exist in trash

	Scenario: Trashbin can be emptied
		Given As an "admin"
		And user "user0" exists
		And User "user0" deletes file "/textfile0.txt"
		And User "user0" deletes file "/textfile1.txt"
		And as "user0" the file "/textfile0.txt" exists in trash
		And as "user0" the file "/textfile0.txt" exists in trash
		When user "user0" empties the trashbin
		Then as "user0" the file with original path "/textfile0.txt" does not exist in trash
		And as "user0" the file with original path "/textfile1.txt" does not exist in trash

	Scenario: A deleted file can be restored
		Given As an "admin"
		And user "user0" exists
		And User "user0" deletes file "/textfile0.txt"
		And as "user0" the file "/textfile0.txt" exists in trash
		When as "user0" the folder with original path "/textfile0.txt" is restored
		Then as "user0" the folder with original path "/textfile0.txt" does not exist in trash
		Then user "user0" should see following elements
			| /FOLDER/ |
			| /PARENT/ |
			| /PARENT/parent.txt |
			| /textfile0.txt |
			| /textfile1.txt |
			| /textfile2.txt |
			| /textfile3.txt |
			| /textfile4.txt |

	Scenario: trashbin can store two files with same name but different origins
		Given As an "admin"
		And user "user0" exists
		And user "user0" created a folder "/folderA"
		And user "user0" created a folder "/folderB"
		And User "user0" copies file "/textfile0.txt" to "/folderA/textfile0.txt"
		And User "user0" copies file "/textfile0.txt" to "/folderB/textfile0.txt"
		When User "user0" deletes file "/folderA/textfile0.txt"
		And User "user0" deletes file "/folderB/textfile0.txt"
		And User "user0" deletes file "/textfile0.txt"
		Then as "user0" the folder with original path "/folderA/textfile0.txt" exists in trash
		And as "user0" the folder with original path "/folderB/textfile0.txt" exists in trash
		And as "user0" the folder with original path "/textfile0.txt" exists in trash

