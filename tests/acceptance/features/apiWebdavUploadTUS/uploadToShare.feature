@api @files_sharing-app-required @skipOnOcV10

Feature: upload file to shared folder

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  Scenario Outline: Uploading file to a received share folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Uploading file to a user read/write share folder works
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian" with permissions "change"
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "200"
    And as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Uploading a file into a group share as share receiver
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has shared folder "FOLDER" with group "grp1" with permissions "change"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/FOLDER/textfile.txt" using the TUS protocol on the WebDAV API
    Then the HTTP status code should be "200"
    And as "Alice" file "/FOLDER/textfile.txt" should exist
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |
