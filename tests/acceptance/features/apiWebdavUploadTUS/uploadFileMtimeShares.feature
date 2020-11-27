@api @files_sharing-app-required @skipOnOcV10
Feature: upload file
  As a user
  I want the mtime of an uploaded file to be the creation date on upload source not the upload date
  So that I can find files by their real creation date

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: upload file with mtime to a received share
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/toShare"
    And user "Alice" has shared folder "/toShare" with user "Brian"
    And user "Brian" has accepted share "/toShare" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/toShare/file.txt" with mtime "Thu, 08 Aug 2012 04:18:13 GMT" using the TUS protocol on the WebDAV API
    Then as "Alice" the mtime of the file "/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    And as "Brian" the mtime of the file "/Shares/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: upload file with mtime to a send share
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/toShare"
    And user "Alice" has shared folder "/toShare" with user "Brian"
    And user "Brian" has accepted share "/toShare" offered by user "Alice"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/toShare/file.txt" with mtime "Thu, 08 Aug 2012 04:18:13 GMT" using the TUS protocol on the WebDAV API
    Then as "Alice" the mtime of the file "/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    And as "Brian" the mtime of the file "/Shares/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: overwriting a file with mtime in a received share
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/toShare"
    And user "Alice" has shared folder "/toShare" with user "Brian"
    And user "Brian" has accepted share "/toShare" offered by user "Alice"
    And user "Alice" has uploaded file with content "uploaded content" to "/toShare/file.txt"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/toShare/file.txt" with mtime "Thu, 08 Aug 2012 04:18:13 GMT" using the TUS protocol on the WebDAV API
    Then as "Alice" the mtime of the file "/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    And as "Brian" the mtime of the file "/Shares/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: overwriting a file with mtime in a send share
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/toShare"
    And user "Alice" has shared folder "/toShare" with user "Brian"
    And user "Brian" has accepted share "/toShare" offered by user "Alice"
    And user "Brian" has uploaded file with content "uploaded content" to "/Shares/toShare/file.txt"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to "/toShare/file.txt" with mtime "Thu, 08 Aug 2012 04:18:13 GMT" using the TUS protocol on the WebDAV API
    Then as "Alice" the mtime of the file "/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    And as "Brian" the mtime of the file "/Shares/toShare/file.txt" should be "Thu, 08 Aug 2012 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |
