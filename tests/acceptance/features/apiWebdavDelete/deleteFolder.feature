@api
Feature: delete folder
  As a user
  I want to be able to delete folders
  So that I can quickly remove unwanted data

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" creates folder "/PARENT" using the WebDAV API

  @smokeTest
  Scenario Outline: delete a folder
    Given using <dav_version> DAV path
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/PARENT" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-269
  Scenario Outline: delete a folder when 2 folder exist with different case
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/parent"
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/PARENT" should not exist
    But as "Alice" folder "/parent" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-269
  Scenario Outline: delete a sub-folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/PARENT/parent.txt"
    When user "Alice" deletes folder "/PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/PARENT/CHILD" should not exist
    But as "Alice" folder "/PARENT" should exist
    And as "Alice" file "/PARENT/parent.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: delete a folder when there is a default folder for received shares
    Given using <dav_version> DAV path
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/Received"
    And user "Brian" has created folder "/Top"
    And user "Brian" has created folder "/Top/ReceivedShares"
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    When user "Brian" deletes folder "<share_folder>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" folder "<share_folder>/PARENT" should exist
    And user "Brian" should be able to delete folder "/Received"
    And user "Brian" should be able to delete folder "/Top/ReceivedShares"
    And user "Brian" should be able to delete folder "/Top"
    Examples:
      | dav_version | share_folder    |
      | old         | ReceivedShares  |
      | old         | /ReceivedShares |
      | new         | ReceivedShares  |
      | new         | /ReceivedShares |

  @files_sharing-app-required
  Scenario Outline: delete a folder when there is a default folder for received shares that is a multi-level path
    Given using <dav_version> DAV path
    And the administrator has set the default folder for received shares to "/My/Received/Shares"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/M"
    And user "Brian" has created folder "/Received"
    And user "Brian" has created folder "/Received/Shares"
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    When user "Brian" deletes folder "/My/Received/Shares" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Brian" should not be able to delete folder "/My/Received"
    And user "Brian" should not be able to delete folder "/My"
    And as "Brian" folder "/My/Received/Shares/PARENT" should exist
    But user "Brian" should be able to delete folder "/M"
    And user "Brian" should be able to delete folder "/Received/Shares"
    And user "Brian" should be able to delete folder "/Received"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: deleting folder with dot in the name
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    When user "Alice" deletes folder "<folder_name>" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "<folder_name>" should not exist
    Examples:
      | dav_version | folder_name |
      | old         | /fo.        |
      | old         | /fo.1       |
      | old         | /fo...1..   |
      | old         | /...        |
      | old         | /..fo       |
      | old         | /fo.xyz     |
      | old         | /fo.exe     |
      | new         | /fo.        |
      | new         | /fo.1       |
      | new         | /fo...1..   |
      | new         | /...        |
      | new         | /..fo       |
      | new         | /fo.xyz     |
      | new         | /fo.exe     |
