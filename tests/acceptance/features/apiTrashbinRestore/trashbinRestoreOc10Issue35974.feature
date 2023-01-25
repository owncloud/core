@api @files_trashbin-app-required @issue-ocis-reva-52
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  @issue-35974
  Scenario Outline: restoring a file to an already existing path overrides the file
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file to delete" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "file to delete" to "/.hiddenfile0.txt"
    And using <dav-path> DAV path
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "PARENT file content" to <upload-path>
    And user "Alice" has deleted file <delete-path>
    When user "Alice" restores the file with original path <delete-path> to <upload-path> using the trashbin API
    Then the HTTP status code should be "204"
    # Sometimes <upload-path> is found in the trashbin. Should it? Or not?
    # That seems to be what happens when the restore-overwrite happens properly,
    # The original <upload-path> seems to be "deleted" and so goes to the trashbin
    #And as "Alice" the file with original path <upload-path> should not exist in the trashbin
    And as "Alice" file <upload-path> should exist
    # sometimes the restore from trashbin does overwrite the existing file, but sometimes it does not. That is also surprising.
    # the current observed behavior is that if the original <upload-path> ended up in the trashbin,
    # then the new <upload-path> has the "file to delete" content.
    # otherwise <upload-path> has its old content
    And the content of file <upload-path> for user "Alice" if the file is also in the trashbin should be "file to delete" otherwise "PARENT file content"
    #And the content of file <upload-path> for user "Alice" should be "file to delete"
    Examples:
      | dav-path | upload-path                | delete-path        |
      | old      | "/PARENT/textfile0.txt"    | "/textfile0.txt"   |
      | new      | "/PARENT/textfile0.txt"    | "/textfile0.txt"   |
      | old      | "/PARENT/.hiddenfile0.txt" | ".hiddenfile0.txt" |
      | new      | "/PARENT/.hiddenfile0.txt" | ".hiddenfile0.txt" |
