Feature: trashbin-new-endpoint
	Background:
		Given using api version "1"
		And using old dav path
		And as an "admin"

	Scenario: deleting a file moves it to trashbin
		Given user "user0" exists
		When user "user0" deletes file "/textfile0.txt"
		Then as "user0" the file "/textfile0.txt" exists in trash

	Scenario: deleting a folder moves it to trashbin
		Given user "user0" exists
		And user "user0" created a folder "/tmp"
		When user "user0" deletes folder "/tmp"
		Then as "user0" the folder "/tmp" exists in trash

	Scenario: deleting a file of a shared folder moves it to trashbin
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And user "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When user "user0" deletes file "/shared/shared_file.txt"
		Then as "user0" the folder with original path "/shared/shared_file.txt" exists in trash

	Scenario: deleting a shared folder moves it to trashbin
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And user "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		When user "user0" deletes folder "/shared"
		Then as "user0" the folder with original path "/shared" exists in trash

	Scenario: deleting a received folder doesn't move it to trashbin
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And user "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		And user "user1" moved folder "/shared" to "/renamed_shared"
		When user "user1" deletes folder "/renamed_shared"
		Then as "user1" the folder with original path "/renamed_shared" does not exist in trash

	Scenario: deleting a file in a received folder moves it to trashbin
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And user "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		And user "user1" moved file "/shared" to "/renamed_shared"
		When user "user1" deletes file "/renamed_shared/shared_file.txt"
		Then as "user1" the file with original path "/renamed_shared/shared_file.txt" exists in trash

	Scenario: deleting a file in a received folder when restored it comes back to the original path
		Given user "user0" exists
		And user "user1" exists
		And user "user0" created a folder "/shared"
		And user "user0" moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And folder "/shared" of user "user0" is shared with user "user1"
		And user "user1" moved file "/shared" to "/renamed_shared"
		And user "user1" deletes file "/renamed_shared/shared_file.txt"
		And logging in using web as "user1"
		When as "user1" the file with original path "/renamed_shared/shared_file.txt" is restored
		Then as "user1" the file with original path "/renamed_shared/shared_file.txt" does not exist in trash
		And user "user1" should see following elements
			| /renamed_shared/ |
			| /renamed_shared/shared_file.txt |

	Scenario: Trashbin can be emptied
		Given user "user0" exists
		And user "user0" deletes file "/textfile0.txt"
		And user "user0" deletes file "/textfile1.txt"
		And as "user0" the file "/textfile0.txt" exists in trash
		And as "user0" the file "/textfile0.txt" exists in trash
		When user "user0" empties the trashbin
		Then as "user0" the file with original path "/textfile0.txt" does not exist in trash
		And as "user0" the file with original path "/textfile1.txt" does not exist in trash

	Scenario: A deleted file can be restored
		Given user "user0" exists
		And user "user0" deletes file "/textfile0.txt"
		And as "user0" the file "/textfile0.txt" exists in trash
		And logging in using web as "user0"
		When as "user0" the folder with original path "/textfile0.txt" is restored
		Then as "user0" the folder with original path "/textfile0.txt" does not exist in trash
		And user "user0" should see following elements
			| /FOLDER/ |
			| /PARENT/ |
			| /PARENT/parent.txt |
			| /textfile0.txt |
			| /textfile1.txt |
			| /textfile2.txt |
			| /textfile3.txt |
			| /textfile4.txt |

	@skip
	Scenario: trashbin can store two files with same name but different origins
		Given user "user0" exists
		And user "user0" created a folder "/folderA"
		And user "user0" created a folder "/folderB"
		And user "user0" copies file "/textfile0.txt" to "/folderA/textfile0.txt"
		And user "user0" copies file "/textfile0.txt" to "/folderB/textfile0.txt"
		When user "user0" deletes file "/folderA/textfile0.txt"
		And user "user0" deletes file "/folderB/textfile0.txt"
		And user "user0" deletes file "/textfile0.txt"
		Then as "user0" the folder with original path "/folderA/textfile0.txt" exists in trash
		And as "user0" the folder with original path "/folderB/textfile0.txt" exists in trash
		And as "user0" the folder with original path "/textfile0.txt" exists in trash

	@local_storage
	@no_default_encryption
	Scenario: Deleting a folder into external storage moves it to the trashbin
		Given invoking occ with "files:scan --all"
		And user "user0" exists
		And user "user0" created a folder "/local_storage/tmp"
		And user "user0" moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		When user "user0" deletes folder "/local_storage/tmp"
		Then as "user0" the folder with original path "/local_storage/tmp" exists in trash

	@local_storage
	@no_default_encryption
	Scenario: Deleting a file into external storage moves it to the trashbin and can be restored
		Given invoking occ with "files:scan --all"
		And user "user0" exists
		And user "user0" created a folder "/local_storage/tmp"
		And user "user0" moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		And user "user0" deletes file "/local_storage/tmp/textfile0.txt"
		And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" exists in trash
		And logging in using web as "user0"
		When as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" is restored
		Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" does not exist in trash
		And user "user0" should see following elements
			| /local_storage/ |
			| /local_storage/tmp/ |
			| /local_storage/tmp/textfile0.txt |

	@local_storage
	@no_default_encryption
	Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored
		Given invoking occ with "files:scan --all"
		And user "user0" exists
		And user "user0" created a folder "/local_storage/tmp"
		And user "user0" moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		And user "user0" uploads chunk file "1" of "1" with "AA" to "/local_storage/tmp/textfile0.txt"
		And user "user0" deletes file "/local_storage/tmp/textfile0.txt"
		And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" exists in trash
		And logging in using web as "user0"
		When as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" is restored
		Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" does not exist in trash
		And downloaded content when downloading file "/local_storage/tmp/textfile0.txt" with range "bytes=0-1" should be "AA"
