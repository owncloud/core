@api
Feature: lock folders

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: upload to a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "FOLDER" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/FOLDER/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: upload to a subfolder of a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/PARENT/CHILD/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/CHILD/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |
      
  Scenario Outline: create folder in a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "FOLDER" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" creates folder "/FOLDER/new-folder" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" folder "/FOLDER/new-folder" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: create folder in a subfolder of a locked folder
    Given using <dav-path> DAV path
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When user "user0" creates folder "/PARENT/CHILD/new-folder" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" folder "/PARENT/CHILD/new-folder" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |