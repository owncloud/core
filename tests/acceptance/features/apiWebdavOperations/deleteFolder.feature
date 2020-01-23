@api @TestAlsoOnExternalUserBackend
Feature: delete folder
  As a user
  I want to be able to delete folders
  So that I can quickly remove unwanted data

  Background:
    Given user "user0" has been created with default attributes and without skeleton files
    And user "user0" creates folder "/PARENT" using the WebDAV API

  Scenario Outline: delete a folder
    Given using <dav_version> DAV path
    When user "user0" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a folder when 2 folder exist with different case
    Given using <dav_version> DAV path
    And user "user0" creates folder "/parent" using the WebDAV API
    When user "user0" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT" should not exist
    But as "user0" folder "/parent" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a sub-folder
    Given using <dav_version> DAV path
    And user "user0" creates folder "/PARENT/CHILD" using the WebDAV API
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/PARENT/parent.txt"
    When user "user0" deletes folder "/PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" folder "/PARENT/CHILD" should not exist
    But as "user0" folder "/PARENT" should exist
    And as "user0" file "/PARENT/parent.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: delete a folder when there is a default folder for received shares
    Given using <dav_version> DAV path
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has created folder "/Received"
    And user "user1" has created folder "/Top"
    And user "user1" has created folder "/Top/ReceivedShares"
    And user "user0" has shared folder "/PARENT" with user "user1"
    When user "user1" deletes folder "<share_folder>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user1" folder "<share_folder>/PARENT" should exist
    And user "user1" should be able to delete folder "/Received"
    And user "user1" should be able to delete folder "/Top/ReceivedShares"
    And user "user1" should be able to delete folder "/Top"
    Examples:
      | dav_version | share_folder    |
      | old         | /ReceivedShares |
      | new         | /ReceivedShares |
      | old         | ReceivedShares  |
      | new         | ReceivedShares  |

  @files_sharing-app-required
  Scenario Outline: delete a folder when there is a default folder for received shares that is a multi-level path
    Given using <dav_version> DAV path
    And the administrator has set the default folder for received shares to "/My/Received/Shares"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user1" has created folder "/M"
    And user "user1" has created folder "/Received"
    And user "user1" has created folder "/Received/Shares"
    And user "user0" has shared folder "/PARENT" with user "user1"
    When user "user1" deletes folder "/My/Received/Shares" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user1" should not be able to delete folder "/My/Received"
    And user "user1" should not be able to delete folder "/My"
    And as "user1" folder "/My/Received/Shares/PARENT" should exist
    But user "user1" should be able to delete folder "/M"
    And user "user1" should be able to delete folder "/Received/Shares"
    And user "user1" should be able to delete folder "/Received"
    Examples:
      | dav_version |
      | old         |
      | new         |
