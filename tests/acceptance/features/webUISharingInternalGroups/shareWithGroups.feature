@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal groups
As a user
I want to share files and folders with groups
So that those groups can access the files and folders

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
		And these groups have been created:
			|groupname|
			|grp1     |
		And user "user1" has been added to group "grp1"
		And user "user2" has been added to group "grp1"
		And the user has browsed to the login page
		And the user has logged in with username "user3" and password "1234" using the webUI

	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: share a folder with an internal group
		When the user shares the folder "simple-folder" with the group "grp1" using the webUI
		And the user shares the file "testimage.jpg" with the group "grp1" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		And the folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three" on the webUI
		And the file "testimage (2).jpg" should be listed on the webUI
		And the file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three" on the webUI
		When the user re-logs in with username "user2" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		And the folder "simple-folder (2)" should be marked as shared with "grp1" by "User Three" on the webUI
		And the file "testimage (2).jpg" should be listed on the webUI
		And the file "testimage (2).jpg" should be marked as shared with "grp1" by "User Three" on the webUI

	@TestAlsoOnExternalUserBackend
	Scenario: share a file with an internal group a member overwrites and unshares the file
		When the user renames the file "lorem.txt" to "new-lorem.txt" using the webUI
		And the user shares the file "new-lorem.txt" with the group "grp1" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the content of "new-lorem.txt" should not be the same as the local "new-lorem.txt"
		# overwrite the received shared file
		When the user uploads overwriting the file "new-lorem.txt" using the webUI and retries if the file is locked
		Then the file "new-lorem.txt" should be listed on the webUI
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# unshare the received shared file
		When the user unshares the file "new-lorem.txt" using the webUI
		Then the file "new-lorem.txt" should not be listed on the webUI
		# check that another group member can still see the file
		When the user re-logs in with username "user2" and password "1234" using the webUI
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# check that the original file owner can still see the file
		When the user re-logs in with username "user2" and password "1234" using the webUI
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"

	@TestAlsoOnExternalUserBackend
	Scenario: share a folder with an internal group and a member uploads, overwrites and deletes files
		When the user renames the folder "simple-folder" to "new-simple-folder" using the webUI
		And the user shares the folder "new-simple-folder" with the group "grp1" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		And the user opens the folder "new-simple-folder" using the webUI
		Then the content of "lorem.txt" should not be the same as the local "lorem.txt"
		# overwrite an existing file in the received share
		When the user uploads overwriting the file "lorem.txt" using the webUI and retries if the file is locked
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" should be the same as the local "lorem.txt"
		# upload a new file into the received share
		When the user uploads the file "new-lorem.txt" using the webUI
		Then the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		# delete a file in the received share
		When the user deletes the file "data.zip" using the webUI
		Then the file "data.zip" should not be listed on the webUI
		# check that the file actions by the sharee are visible to another group member
		When the user re-logs in with username "user2" and password "1234" using the webUI
		And the user opens the folder "new-simple-folder" using the webUI
		Then the content of "lorem.txt" should be the same as the local "lorem.txt"
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		And the file "data.zip" should not be listed on the webUI
		# check that the file actions by the sharee are visible for the share owner
		When the user re-logs in with username "user3" and password "1234" using the webUI
		And the user opens the folder "new-simple-folder" using the webUI
		Then the content of "lorem.txt" should be the same as the local "lorem.txt"
		And the content of "new-lorem.txt" should be the same as the local "new-lorem.txt"
		And the file "data.zip" should not be listed on the webUI

	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: share a folder with an internal group and a member unshares the folder
		When the user renames the folder "simple-folder" to "new-simple-folder" using the webUI
		And the user shares the folder "new-simple-folder" with the group "grp1" using the webUI
		# unshare the received shared folder and check it is gone
		And the user re-logs in with username "user1" and password "1234" using the webUI
		And the user unshares the folder "new-simple-folder" using the webUI
		Then the folder "new-simple-folder" should not be listed on the webUI
		# check that the folder is still visible to another group member
		When the user re-logs in with username "user2" and password "1234" using the webUI
		Then the folder "new-simple-folder" should be listed on the webUI
		When the user opens the folder "new-simple-folder" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
		# check that the folder is still visible for the share owner
		When the user re-logs in with username "user3" and password "1234" using the webUI
		Then the folder "new-simple-folder" should be listed on the webUI
		When the user opens the folder "new-simple-folder" using the webUI
		Then the file "lorem.txt" should be listed on the webUI
		And the content of "lorem.txt" should be the same as the original "simple-folder/lorem.txt"
