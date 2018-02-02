@insulated
Feature: Sharing files and folders with internal groups
As a user
I want to share files and folders with groups
So that those groups can access the files and folders

	Background:
		Given these users exist:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
		And these groups exist:
			|groupname|
			|grp1     |
		And the user "user1" is in the group "grp1"
		And the user "user2" is in the group "grp1"
		And I am on the login page
		And I login with username "user3" and password "1234"

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with an internal group
		When the folder "simple-folder" is shared with the group "grp1"
		And the file "testimage.jpg" is shared with the group "grp1"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed
		And the folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three"
		And the file "testimage (2).jpg" should be listed
		And the file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three"
		When I relogin with username "user2" and password "1234"
		Then the folder "simple-folder (2)" should be listed
		And the folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three"
		And the file "testimage (2).jpg" should be listed
		And the file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three"

	@TestAlsoOnExternalUserBackend
	Scenario: share a file with an internal group a member overwrites and unshares the file
		When I rename the file "lorem.txt" to "new-lorem.txt"
		And the file "new-lorem.txt" is shared with the group "grp1"
		And I relogin with username "user1" and password "1234"
		Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
		# overwrite the received shared file
		When I upload overwriting the file "new-lorem.txt"
		Then the file "new-lorem.txt" should be listed
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# unshare the received shared file
		When I unshare the file "new-lorem.txt"
		Then the file "new-lorem.txt" should not be listed
		# check that another group member can still see the file
		When I relogin with username "user2" and password "1234"
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# check that the original file owner can still see the file
		When I relogin with username "user2" and password "1234"
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with an internal group and a member uploads, overwrites and deletes files
		When I rename the folder "simple-folder" to "new-simple-folder"
		And the folder "new-simple-folder" is shared with the group "grp1"
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
		# check that the file actions by the sharee are visible to another group member
		When I relogin with username "user2" and password "1234"
		And I open the folder "new-simple-folder"
		Then the content of "lorem.txt" should be the same as the local "lorem.txt"
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		And the file "data.zip" should not be listed
		# check that the file actions by the sharee are visible for the share owner
		When I relogin with username "user3" and password "1234"
		And I open the folder "new-simple-folder"
		Then the content of "lorem.txt" should be the same as the local "lorem.txt"
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		And the file "data.zip" should not be listed

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with an internal group and a member unshares the folder
		When I rename the folder "simple-folder" to "new-simple-folder"
		And the folder "new-simple-folder" is shared with the group "grp1"
		# unshare the received shared folder and check it is gone
		And I relogin with username "user1" and password "1234"
		And I unshare the folder "new-simple-folder"
		Then the folder "new-simple-folder" should not be listed
		# check that the folder is still visible to another group member
		When I relogin with username "user2" and password "1234"
		Then the folder "new-simple-folder" should be listed
		When I open the folder "new-simple-folder"
		Then the file "lorem.txt" should be listed
		Then the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
		# check that the folder is still visible for the share owner
		When I relogin with username "user3" and password "1234"
		Then the folder "new-simple-folder" should be listed
		When I open the folder "new-simple-folder"
		Then the file "lorem.txt" should be listed
		Then the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
