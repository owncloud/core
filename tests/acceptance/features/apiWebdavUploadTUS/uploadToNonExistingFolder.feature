@api @skipOnOcV10
Feature: upload file
  As a user
  I want to try uploading files to a nonexistent folder
  So that I can check if the uploading works in such case

  Background:
    Given using OCS API version "1"
    And the administrator has set the default folder for received shares to "Shares"
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: attempt to upload a file into a nonexistent folder inside shares
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" folder "/Shares/FOLDER/" should not exist
    And as "Alice" file "/Shares/FOLDER/textfile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: attempt to upload a file into a nonexistent folder
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to "/nonExistentFolder/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" folder "/nonExistentFolder" should not exist
    And as "Alice" file "/nonExistentFolder/textfile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

    @personalSpace
    Examples:
      | dav_version |
      | spaces      |


  Scenario Outline: attempt to upload a file into a nonexistent folder within correctly received share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/nonExistentFolder/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Brian" folder "/Shares/FOLDER/nonExistentFolder" should not exist
    And as "Brian" file "/Shares/FOLDER/nonExistentFolder/textfile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: attempt to upload a file into a nonexistent folder within correctly received read only share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian" with permissions "read"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/nonExistentFolder/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Brian" folder "/Shares/FOLDER/nonExistentFolder" should not exist
    And as "Brian" file "/Shares/FOLDER/nonExistentFolder/textfile.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |
