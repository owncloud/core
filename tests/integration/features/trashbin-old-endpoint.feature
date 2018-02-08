Feature: trashbin-new-endpoint
	Background:
		Given using API version "1"
		And using old DAV path
		And as user "admin"

	Scenario: deleting a file moves it to trashbin
		Given user "user0" has been created
		When user "user0" deletes file "/textfile0.txt" using the API
		Then as "user0" the file "/textfile0.txt" should exist in trash

	Scenario: deleting a folder moves it to trashbin
		Given user "user0" has been created
		And user "user0" has created a folder "/tmp"
		When user "user0" deletes folder "/tmp" using the API
		Then as "user0" the folder "/tmp" should exist in trash

	Scenario: deleting a file in a folder moves it to the trashbin root
		Given user "user0" has been created
		And user "user0" has created a folder "/new-folder"
		And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
		When user "user0" deletes file "/new-folder/new-file.txt" using the API
		Then as "user0" the file with original path "/new-folder/new-file.txt" should exist in trash
		And as "user0" the file "/new-file.txt" should exist in trash
		But as "user0" the file "/new-folder/new-file.txt" should not exist

	Scenario: deleting a file in a shared folder moves it to the trashbin root
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		When user "user0" deletes file "/shared/shared_file.txt" using the API
		Then as "user0" the file with original path "/shared/shared_file.txt" should exist in trash
		And as "user0" the file "/shared_file.txt" should exist in trash
		But as "user0" the file "/shared/shared_file.txt" should not exist

	Scenario: deleting a shared folder moves it to trashbin
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		When user "user0" deletes folder "/shared" using the API
		Then as "user0" the folder with original path "/shared" should exist in trash

	Scenario: deleting a received folder doesn't move it to trashbin
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		And user "user1" has moved folder "/shared" to "/renamed_shared"
		When user "user1" deletes folder "/renamed_shared" using the API
		Then as "user1" the folder with original path "/renamed_shared" should not exist in trash

	Scenario: deleting a file in a received folder moves it to trashbin
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		And user "user1" has moved file "/shared" to "/renamed_shared"
		When user "user1" deletes file "/renamed_shared/shared_file.txt" using the API
		Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should exist in trash

	Scenario: deleting a file in a received folder when restored it comes back to the original path
		Given user "user0" has been created
		And user "user1" has been created
		And user "user0" has created a folder "/shared"
		And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
		And user "user0" has shared folder "/shared" with user "user1"
		And user "user1" has moved file "/shared" to "/renamed_shared"
		And user "user1" has deleted file "/renamed_shared/shared_file.txt"
		And user "user1" has logged in to a web-style session using the API
		When user "user1" restores the file with original path "/renamed_shared/shared_file.txt" using the API
		Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should not exist in trash
		And user "user1" should see the following elements
			| /renamed_shared/                |
			| /renamed_shared/shared_file.txt |

	Scenario: Trashbin can be emptied
		Given user "user0" has been created
		And user "user0" has deleted file "/textfile0.txt"
		And user "user0" has deleted file "/textfile1.txt"
		And as "user0" the file "/textfile0.txt" should exist in trash
		And as "user0" the file "/textfile0.txt" should exist in trash
		When user "user0" empties the trashbin using the API
		Then as "user0" the file with original path "/textfile0.txt" should not exist in trash
		And as "user0" the file with original path "/textfile1.txt" should not exist in trash

	Scenario: A deleted file can be restored
		Given user "user0" has been created
		And user "user0" has deleted file "/textfile0.txt"
		And as "user0" the file "/textfile0.txt" should exist in trash
		And user "user0" has logged in to a web-style session using the API
		When user "user0" restores the folder with original path "/textfile0.txt" using the API
		Then as "user0" the folder with original path "/textfile0.txt" should not exist in trash
		And user "user0" should see the following elements
			| /FOLDER/           |
			| /PARENT/           |
			| /PARENT/parent.txt |
			| /textfile0.txt     |
			| /textfile1.txt     |
			| /textfile2.txt     |
			| /textfile3.txt     |
			| /textfile4.txt     |

	Scenario: A file deleted from a folder can be restored to the original folder
		Given user "user0" has been created
		And user "user0" has created a folder "/new-folder"
		And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
		And user "user0" has deleted file "/new-folder/new-file.txt"
		When user "user0" restores the file with original path "/new-folder/new-file.txt" using the API
		Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
		And as "user0" the file "/new-folder/new-file.txt" should exist

	Scenario: A file deleted from a folder is restored to root if the original folder does not exist
		Given user "user0" has been created
		And user "user0" has created a folder "/new-folder"
		And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
		And user "user0" has deleted file "/new-folder/new-file.txt"
		And user "user0" has deleted folder "/new-folder"
		When user "user0" restores the file with original path "/new-folder/new-file.txt" using the API
		Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
		And as "user0" the file "/new-file.txt" should exist

	Scenario: A file deleted from a folder is restored to the original folder if the original folder was deleted and restored
		Given user "user0" has been created
		And user "user0" has created a folder "/new-folder"
		And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
		And user "user0" has deleted file "/new-folder/new-file.txt"
		And user "user0" has deleted folder "/new-folder"
		When user "user0" restores the folder with original path "/new-folder" using the API
		And user "user0" restores the file with original path "/new-folder/new-file.txt" using the API
		Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
		And as "user0" the file "/new-folder/new-file.txt" should exist

	Scenario: A file deleted from a folder is restored to the original folder if the original folder was deleted and recreated
		Given user "user0" has been created
		And user "user0" has created a folder "/new-folder"
		And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
		And user "user0" has deleted file "/new-folder/new-file.txt"
		And user "user0" has deleted folder "/new-folder"
		When user "user0" creates a folder "/new-folder" using the API
		And user "user0" restores the file with original path "/new-folder/new-file.txt" using the API
		Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
		And as "user0" the file "/new-folder/new-file.txt" should exist

	@skip
	Scenario: trashbin can store two files with same name but different origins
		Given user "user0" has been created
		And user "user0" has created a folder "/folderA"
		And user "user0" has created a folder "/folderB"
		And user "user0" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
		And user "user0" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
		When user "user0" deletes file "/folderA/textfile0.txt" using the API
		And user "user0" deletes file "/folderB/textfile0.txt" using the API
		And user "user0" deletes file "/textfile0.txt" using the API
		Then as "user0" the folder with original path "/folderA/textfile0.txt" should exist in trash
		And as "user0" the folder with original path "/folderB/textfile0.txt" should exist in trash
		And as "user0" the folder with original path "/textfile0.txt" should exist in trash

	@local_storage
	@no_default_encryption
	Scenario: Deleting a folder into external storage moves it to the trashbin
		Given the administrator has invoked occ command "files:scan --all"
		And user "user0" has been created
		And user "user0" has created a folder "/local_storage/tmp"
		And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		When user "user0" deletes folder "/local_storage/tmp" using the API
		Then as "user0" the folder with original path "/local_storage/tmp" should exist in trash

	@local_storage
	@no_default_encryption
	Scenario: Deleting a file into external storage moves it to the trashbin and can be restored
		Given the administrator has invoked occ command "files:scan --all"
		And user "user0" has been created
		And user "user0" has created a folder "/local_storage/tmp"
		And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
		And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
		And user "user0" has logged in to a web-style session using the API
		When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the API
		Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
		And user "user0" should see the following elements
			| /local_storage/                  |
			| /local_storage/tmp/              |
			| /local_storage/tmp/textfile0.txt |

	@local_storage
	@no_default_encryption
	Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored
		Given the administrator has invoked occ command "files:scan --all"
		And user "user0" has been created
		And user "user0" has created a folder "/local_storage/tmp"
		And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
		And user "user0" has uploaded chunk file "1" of "1" with "AA" to "/local_storage/tmp/textfile0.txt"
		And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
		And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
		And user "user0" has logged in to a web-style session using the API
		When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the API
		Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
		And the downloaded content when downloading file "/local_storage/tmp/textfile0.txt" for user "user0" with range "bytes=0-1" should be "AA"
