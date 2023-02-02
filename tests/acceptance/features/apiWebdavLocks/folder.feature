@api @issue-ocis-reva-172
Feature: lock folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: upload to a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/FOLDER/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: upload to a subfolder of a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/PARENT/CHILD/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/CHILD/textfile.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @smokeTest
  Scenario Outline: create folder in a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" creates folder "/FOLDER/new-folder" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" folder "/FOLDER/new-folder" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: create folder in a subfolder of a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" creates folder "/PARENT/CHILD/new-folder" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" folder "/PARENT/CHILD/new-folder" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: Move file out of a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" moves file "/PARENT/parent.txt" to "/parent.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/parent.txt" should not exist
    But as "Alice" file "/PARENT/parent.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: Move file out of a locked sub folder one level higher into locked parent folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/CHILD/child.txt"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" moves file "/PARENT/CHILD/child.txt" to "/PARENT/child.txt" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/child.txt" should not exist
    But as "Alice" file "/PARENT/CHILD/child.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: lockdiscovery of a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" gets the following properties of folder "PARENT" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response to user "Alice" should match "<lock-root>"
    And the value of the item "//d:locktoken/d:href" in the response to user "Alice" should match "/^opaquelocktoken:[a-z0-9-]+$/"
    Examples:
      | dav-path | lock-scope | lock-root                                                  |
      | old      | shared     | /%base_path%\/remote.php\/webdav\/PARENT$/                 |
      | old      | exclusive  | /%base_path%\/remote.php\/webdav\/PARENT$/                 |
      | new      | shared     | /%base_path%\/remote.php\/dav\/files\/%username%\/PARENT$/ |
      | new      | exclusive  | /%base_path%\/remote.php\/dav\/files\/%username%\/PARENT$/ |