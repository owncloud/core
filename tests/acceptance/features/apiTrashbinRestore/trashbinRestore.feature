@api @files_trashbin-app-required @issue-ocis-reva-52
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file to delete" to "/textfile0.txt"

  @smokeTest
  Scenario Outline: A deleted file can be restored
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "parent text" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "text file 1" to "/textfile1.txt"
    And user "Alice" has deleted file "/textfile0.txt"
    And as "Alice" file "/textfile0.txt" should exist in the trashbin
    When user "Alice" restores the file with original path "/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the file with original path "/textfile0.txt" should not exist in the trashbin
    And the content of file "/textfile0.txt" for user "Alice" should be "file to delete"
    And user "Alice" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile0.txt     |
      | /textfile1.txt     |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A file deleted from a folder can be restored to the original folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "Alice" has deleted file "/new-folder/new-file.txt"
    When user "Alice" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-folder/new-file.txt" should exist
    And the content of file "/new-folder/new-file.txt" for user "Alice" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and restored
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "Alice" has deleted file "/new-folder/new-file.txt"
    And user "Alice" has deleted folder "/new-folder"
    When user "Alice" restores the folder with original path "/new-folder" using the trashbin API
    And user "Alice" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-folder/new-file.txt" should exist
    And the content of file "/new-folder/new-file.txt" for user "Alice" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnFilesClassifier @issue-files-classifier-291
  Scenario Outline: a file is deleted and restored to a new destination
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/PARENT/CHILD"
    And user "Alice" has uploaded file with content "to delete" to "<delete-path>"
    And user "Alice" has deleted file "<delete-path>"
    When user "Alice" restores the file with original path "<delete-path>" to "<restore-path>" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the file with original path "<delete-path>" should not exist in the trashbin
    And as "Alice" file "<restore-path>" should exist
    And as "Alice" file "<delete-path>" should not exist
    And the content of file "<restore-path>" for user "Alice" should be "to delete"
    Examples:
      | dav-path | delete-path             | restore-path         |
      | old      | /PARENT/parent.txt      | parent.txt           |
      | new      | /PARENT/parent.txt      | parent.txt           |
      | old      | /PARENT/CHILD/child.txt | child.txt            |
      | new      | /PARENT/CHILD/child.txt | child.txt            |
      | old      | /textfile0.txt          | PARENT/textfile0.txt |
      | new      | /textfile0.txt          | PARENT/textfile0.txt |

  @skipOnOcV10 @issue-35974
  Scenario Outline: restoring a file to an already existing path overrides the file
    Given user "Alice" has uploaded file with content "file to delete" to "/.hiddenfile0.txt"
    And using <dav-path> DAV path
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "PARENT file content" to <upload-path>
    And user "Alice" has deleted file <delete-path>
    When user "Alice" restores the file with original path <delete-path> to <upload-path> using the trashbin API
    Then the HTTP status code should be "204"
    And as "Alice" file <upload-path> should exist
    And the content of file <upload-path> for user "Alice" should be "file to delete"
    Examples:
      | dav-path | upload-path                | delete-path        |
      | old      | "/PARENT/textfile0.txt"    | "/textfile0.txt"   |
      | new      | "/PARENT/textfile0.txt"    | "/textfile0.txt"   |
      | old      | "/PARENT/.hiddenfile0.txt" | ".hiddenfile0.txt" |
      | new      | "/PARENT/.hiddenfile0.txt" | ".hiddenfile0.txt" |


  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and recreated
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "Alice" has deleted file "/new-folder/new-file.txt"
    And user "Alice" has deleted folder "/new-folder"
    When user "Alice" creates folder "/new-folder" using the WebDAV API
    And user "Alice" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the file with original path "/new-folder/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-folder/new-file.txt" should exist
    And the content of file "/new-folder/new-file.txt" for user "Alice" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @local_storage @files_external-app-required
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario Outline: Deleting a file into external storage moves it to the trashbin and can be restored
    Given using <dav-path> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "Alice" has created folder "/local_storage/tmp"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "Alice" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in the trashbin
    When user "Alice" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in the trashbin
    And the content of file "/local_storage/tmp/textfile0.txt" for user "Alice" should be "file to delete"
    And user "Alice" should see the following elements
      | /local_storage/                  |
      | /local_storage/tmp/              |
      | /local_storage/tmp/textfile0.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @local_storage @files_external-app-required
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored
    Given using old DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "Alice" has created folder "/local_storage/tmp"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "Alice" has uploaded chunk file "1" of "1" with "AA" to "/local_storage/tmp/textfile0.txt"
    And user "Alice" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in the trashbin
    When user "Alice" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in the trashbin
    And the content of file "/local_storage/tmp/textfile0.txt" for user "Alice" should be "AA"

  @local_storage @files_external-app-required
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore @notToImplementOnOCIS @newChunking @issue-ocis-1321
  Scenario: Deleting an updated file into external storage moves it to the trashbin and can be restored with new chunking
    Given using new DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "Alice" has created folder "/local_storage/tmp"
    And user "Alice" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "Alice" has uploaded the following chunks to "/local_storage/tmp/textfile0.txt" with new chunking
      | number | content |
      | 1      | AA      |
    And user "Alice" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in the trashbin
    When user "Alice" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in the trashbin
    And the content of file "/local_storage/tmp/textfile0.txt" for user "Alice" should be "AA"

  @smokeTest @skipOnOcV10.3
  Scenario Outline: A deleted file cannot be restored by a different user
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    When user "Brian" tries to restore the file with original path "/textfile0.txt" from the trashbin of user "Alice" using the trashbin API
    Then the HTTP status code should be "<status-code>"
    And as "Alice" the folder with original path "/textfile0.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    @skipOnOcis
    Examples:
      | dav-path | status-code |
      | old      | 401         |
      | new      | 401         |
    @skipOnOcV10
    Examples:
      | dav-path | status-code |
      | old      | 404         |
      | new      | 404         |

  @smokeTest
  Scenario Outline: A deleted file cannot be restored with invalid password
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    When user "Alice" tries to restore the file with original path "/textfile0.txt" from the trashbin of user "Alice" using the password "invalid" and the trashbin API
    Then the HTTP status code should be "401"
    And as "Alice" the folder with original path "/textfile0.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @smokeTest
  Scenario Outline: A deleted file cannot be restored without using a password
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has deleted file "/textfile0.txt"
    When user "Alice" tries to restore the file with original path "/textfile0.txt" from the trashbin of user "Alice" using the password "" and the trashbin API
    Then the HTTP status code should be "401"
    And as "Alice" the folder with original path "/textfile0.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Files with strange names can be restored
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "file original content" to "<file-to-upload>"
    And user "Alice" has deleted file "<file-to-upload>"
    And user "Alice" restores the file with original path "<file-to-upload>" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "<file-to-upload>" should not exist in the trashbin
    And as "Alice" file "<file-to-upload>" should exist
    And the content of file "<file-to-upload>" for user "Alice" should be "file original content"
    Examples:
      | dav-path | file-to-upload          |
      | old      | 😛 😜 🐱 🐭 ⌚️ ♀️ 🚴‍♂️ |
      | new      | 😛 😜 🐱 🐭 ⌚️ ♀️ 🚴‍♂️ |
      | old      | strängé नेपाली file     |
      | new      | strängé नेपाली file     |
      | old      | sample,1.txt            |
      | new      | sample,1.txt            |


  Scenario Outline: A file deleted from a multi level sub-folder can be restored to the original folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has created folder "/new-folder/folder1/"
    And user "Alice" has created folder "/new-folder/folder1/folder2/"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/folder1/folder2/new-file.txt"
    And user "Alice" has deleted file "/new-folder/folder1/folder2/new-file.txt"
    When user "Alice" restores the file with original path "/new-folder/folder1/folder2/new-file.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/folder1/folder2/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-folder/folder1/folder2/new-file.txt" should exist
    And the content of file "/new-folder/folder1/folder2/new-file.txt" for user "Alice" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A deleted multi level folder can be restored including the content
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has created folder "/new-folder/folder1/"
    And user "Alice" has created folder "/new-folder/folder1/folder2/"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/folder1/folder2/new-file.txt"
    And user "Alice" has deleted folder "/new-folder/"
    When user "Alice" restores the folder with original path "/new-folder/" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/folder1/folder2/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-folder/folder1/folder2/new-file.txt" should exist
    And the content of file "/new-folder/folder1/folder2/new-file.txt" for user "Alice" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A subfolder from a deleted multi level folder can be restored including the content
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has created folder "/new-folder/folder1"
    And user "Alice" has created folder "/new-folder/folder1/folder2"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/folder1/folder2/new-file.txt"
    And user "Alice" has deleted folder "/new-folder"
    When user "Alice" restores the folder with original path "/new-folder/folder1" to "/folder1" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/folder1/folder2/new-file.txt" should not exist in the trashbin
    And as "Alice" the folder with original path "/new-folder/folder1" should not exist in the trashbin
    And as "Alice" file "/folder1/folder2/new-file.txt" should exist
    And the content of file "/folder1/folder2/new-file.txt" for user "Alice" should be "file to delete"
    But as "Alice" the folder with original path "/new-folder" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A file from a deleted multi level sub-folder can be restored
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/new-folder"
    And user "Alice" has created folder "/new-folder/folder1/"
    And user "Alice" has created folder "/new-folder/folder1/folder2/"
    And user "Alice" has moved file "/textfile0.txt" to "/new-folder/folder1/folder2/new-file.txt"
    And user "Alice" has uploaded file with content "to delete" to "/new-folder/folder1/folder2/not-restored.txt"
    And user "Alice" has deleted folder "/new-folder/"
    When user "Alice" restores the file with original path "/new-folder/folder1/folder2/new-file.txt" to "new-file.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And as "Alice" the file with original path "/new-folder/folder1/folder2/new-file.txt" should not exist in the trashbin
    And as "Alice" file "/new-file.txt" should exist
    And the content of file "/new-file.txt" for user "Alice" should be "file to delete"
    But as "Alice" the file with original path "/new-folder/folder1/folder2/not-restored.txt" should exist in the trashbin
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A deleted hidden file can be restored
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded the following files with content "hidden file"
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    And user "Alice" has deleted the following files
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    When user "Alice" restores the following files with original path
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the files with following original paths should not exist in the trashbin
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    And as "Alice" the following files should exist
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    And the content of the following files for user "Alice" should be "hidden file"
      | path                 |
      | .hidden_file         |
      | /FOLDER/.hidden_file |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: restoring files with special characters
    Given using <dav-path> DAV path
    And user "Alice" has uploaded the following files with content "special character file"
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    And user "Alice" has deleted the following files
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    When user "Alice" restores the following files with original path
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the files with following original paths should not exist in the trashbin
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    But as "Alice" the following files should exist
      | path             |
      | qa&dev.txt       |
      | !@tester$^.txt   |
      | %file *?2.txt    |
      | # %ab ab?=ed.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: restoring folders with special characters
    Given using <dav-path> DAV path
    And user "Alice" has created the following folders
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    And user "Alice" has deleted the following folders
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    When user "Alice" restores the following folders with original path
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the folders with following original paths should not exist in the trashbin
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    But as "Alice" the following folders should exist
      | path         |
      | qa&dev       |
      | !@tester$^   |
      | %file *?2    |
      | # %ab ab?=ed |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A deleted file inside a nested folder can be restored to a different location
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    And user "Alice" has uploaded file with content "parent text" to "/parent_folder/sub/parent.txt"
    And user "Alice" has deleted folder "parent_folder"
    When user "Alice" restores the folder with original path "/parent_folder/sub/parent.txt" to "parent.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the file with original path "/parent_folder/sub/parent.txt" should not exist in the trashbin
    And the content of file "parent.txt" for user "Alice" should be "parent text"
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A deleted file inside a nested folder cannot be restored to the original location if the location doesn't exist
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    And user "Alice" has uploaded file with content "parent text" to "/parent_folder/sub/parent.txt"
    And user "Alice" has deleted folder "parent_folder"
    When user "Alice" restores the folder with original path "/parent_folder/sub/parent.txt" to "/parent_folder/sub/parent.txt" using the trashbin API
    Then the HTTP status code should be "409"
    And as "Alice" the file with original path "/parent_folder/sub/parent.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /parent_folder/               |
      | /parent_folder/sub/           |
      | /parent_folder/sub/parent.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: A deleted file inside a nested folder can be restored to the original location if the location exists
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    And user "Alice" has uploaded file with content "parent text" to "/parent_folder/sub/parent.txt"
    And user "Alice" has deleted folder "parent_folder"
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    When user "Alice" restores the folder with original path "/parent_folder/sub/parent.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And as "Alice" the file with original path "/parent_folder/sub/parent.txt" should not exist in the trashbin
    And the content of file "/parent_folder/sub/parent.txt" for user "Alice" should be "parent text"
    And user "Alice" should see the following elements
      | /parent_folder/               |
      | /parent_folder/sub/           |
      | /parent_folder/sub/parent.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: A deleted file inside a nested folder cannot be restored without the destination
    Given using <dav-path> DAV path
    And user "Alice" has created folder "/parent_folder"
    And user "Alice" has created folder "/parent_folder/sub"
    And user "Alice" has uploaded file with content "parent text" to "/parent_folder/sub/parent.txt"
    And user "Alice" has deleted folder "parent_folder"
    When user "Alice" restores the folder with original path "/parent_folder/sub/parent.txt" without specifying the destination using the trashbin API
    Then the HTTP status code should be "400"
    And as "Alice" the file with original path "/parent_folder/sub/parent.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /parent_folder/               |
      | /parent_folder/sub/           |
      | /parent_folder/sub/parent.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: A deleted file cannot be restored without the destination
    Given using <dav-path> DAV path
    And user "Alice" has uploaded file with content "parent text" to "/parent.txt"
    And user "Alice" has deleted file "parent.txt"
    When user "Alice" restores the folder with original path "parent.txt" without specifying the destination using the trashbin API
    Then the HTTP status code should be "400"
    And as "Alice" the file with original path "parent.txt" should exist in the trashbin
    And user "Alice" should not see the following elements
      | /parent.txt |
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring folders with dot in the name
    Given using <dav-path> DAV path
    And user "Alice" has created the following folders
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    And user "Alice" has deleted the following folders
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    When user "Alice" restores the following folders with original path
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the folders with following original paths should not exist in the trashbin
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    But as "Alice" the following folders should exist
      | path      |
      | /fo.      |
      | /fo.1     |
      | /fo...1.. |
      | /...      |
      | /..fo     |
      | /fo.xyz   |
      | /fo.exe   |
    Examples:
      | dav-path |
      | old      |
      | new      |
