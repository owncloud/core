@insulated
Feature: Sharing files and folders with internal users
As a user
I want to share files and folders with other users
So that those users can access the files and folders

	Background:
		Given these users exist:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
		And I am on the login page
		And I login with username "user2" and password "1234"

	@TestAlsoOnExternalUserBackend
	Scenario: share a file & folder with another internal user
		When the folder "simple-folder" is shared with the user "User One"
		And the file "testimage.jpg" is shared with the user "User One"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed
		And the folder "simple-folder (2)" should be marked as shared by "User Two"
		And the file "testimage (2).jpg" should be listed
		And the file "testimage (2).jpg" should be marked as shared by "User Two"
		When I open the folder "simple-folder (2)"
		Then the file "lorem.txt" should be listed
		But the folder "simple-folder (2)" should not be listed

	@TestAlsoOnExternalUserBackend
	Scenario: share a file with another internal user who overwrites and unshares the file
		When I rename the file "lorem.txt" to "new-lorem.txt"
		And the file "new-lorem.txt" is shared with the user "User One"
		And I relogin with username "user1" and password "1234"
		Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
		# overwrite the received shared file
		When I upload overwriting the file "new-lorem.txt"
		Then the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# unshare the received shared file
		When I unshare the file "new-lorem.txt"
		Then the file "new-lorem.txt" should not be listed
		# check that the original file owner can still see the file
		When I relogin with username "user2" and password "1234"
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with another internal user who uploads, overwrites and deletes files
		When I rename the folder "simple-folder" to "new-simple-folder"
		And the folder "new-simple-folder" is shared with the user "User One"
		And I relogin with username "user1" and password "1234"
		And I open the folder "new-simple-folder"
		Then the content of "lorem.txt" should not be the same as the local "lorem.txt"
		# overwrite an existing file in the received share
		When I upload overwriting the file "lorem.txt"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the local "lorem.txt"
		# upload a new file into the received share
		When I upload the file "new-lorem.txt"
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# delete a file in the received share
		When I delete the file "data.zip"
		Then the file "data.zip" should not be listed
		# check that the file actions by the sharee are visible for the share owner
		When I relogin with username "user2" and password "1234"
		And I open the folder "new-simple-folder"
		Then the file "lorem.txt" should be listed
		And the content of "lorem.txt" should be the same as the local "lorem.txt"
		And the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		And the file "data.zip" should not be listed

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with another internal user who unshares the folder
		When I rename the folder "simple-folder" to "new-simple-folder"
		And the folder "new-simple-folder" is shared with the user "User One"
		# unshare the received shared folder and check it is gone
		And I relogin with username "user1" and password "1234"
		And I unshare the folder "new-simple-folder"
		Then the folder "new-simple-folder" should not be listed
		# check that the folder is still visible for the share owner
		When I relogin with username "user2" and password "1234"
		Then the folder "new-simple-folder" should be listed
		When I open the folder "new-simple-folder"
		Then the file "lorem.txt" should be listed
		Then the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"

	@skipOnMICROSOFTEDGE @TestAlsoOnExternalUserBackend
	Scenario: share a folder with another internal user and prohibit deleting
		When the folder "simple-folder" is shared with the user "User One"
		And the sharing permissions of "User One" for "simple-folder" are set to
		| delete | no |
		And I relogin with username "user1" and password "1234"
		And I open the folder "simple-folder (2)"
		Then it should not be possible to delete the file "lorem.txt"
