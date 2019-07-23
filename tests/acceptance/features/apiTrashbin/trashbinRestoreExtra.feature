@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: Restore deleted files/folders
  As a user
  I would like to restore files/folders
  So that I can recover accidentally deleted files/folders in ownCloud

  Background:
    Given using OCS API version "1"
    And as the administrator

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: restoring a file to an already existing path overrides the file
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has moved file "textfile0.txt" to "parent.txt"
    And user "user0" has uploaded file with content "file to delete" to "/parent.txt"
    And user "user0" has deleted file "parent.txt"
    When user "user0" restores the file with original path "/parent.txt" to "/PARENT/parent.txt" using the trashbin API
    Then the HTTP status code should be "204"
    And as "user0" the file with original path "/parent.txt" should not exist in trash
    And as "user0" the file with original path "/PARENT/parent.txt" should not exist in trash
    And as "user0" file "/PARENT/parent.txt" should exist
    And the content of file "/PARENT/parent.txt" for user "user0" should be "file to delete"
    Examples:
      | dav-path |
      | old      |
      | new      |
