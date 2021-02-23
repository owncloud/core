@api @files_sharing-app-required @notToImplementOnOCIS
Feature: sharing - current oC10 behavior for issue-30325

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |

  @issue-30325
  Scenario: receiver tries to rename a received share with share, read permissions
    Given user "Alice" has created folder "folderToShare"
    And user "Alice" has uploaded file with content "thisIsAFileInsideTheSharedFolder" to "/folderToShare/fileInside"
    And user "Alice" has shared folder "folderToShare" with user "Brian" with permissions "share,read"
    When user "Brian" moves folder "folderToShare" to "myFolder" using the WebDAV API
    Then the HTTP status code should be "403"
#    Then the HTTP status code should be "201"
    And as "Brian" folder "myFolder" should not exist
#    And as "Brian" folder "myFolder" should exist
    But as "Alice" folder "myFolder" should not exist
#    When user "Brian" moves file "/myFolder/fileInside" to "/myFolder/renamedFile" using the WebDAV API
    When user "Brian" moves file "/folderToShare/fileInside" to "/folderToShare/renamedFile" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" file "/folderToShare/renamedFile" should not exist
#    And as "Brian" file "/myFolder/renamedFile" should not exist
    But as "Brian" file "/folderToShare/fileInside" should exist
#    But as "Brian" file "/myFolder/fileInside" should exist
