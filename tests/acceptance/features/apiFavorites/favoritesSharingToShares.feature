@api @files_sharing-app-required
Feature: favorite

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"


  Scenario Outline: favorite a file inside of a received share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" favorites element "/Shares/PARENT/parent.txt" using the WebDAV API
    Then the HTTP status code should be "207"
    And as user "Brian" file "/Shares/PARENT/parent.txt" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: favorite a folder inside of a received share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT/sub-folder"
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" favorites element "/Shares/PARENT/sub-folder" using the WebDAV API
    Then the HTTP status code should be "207"
    And as user "Brian" folder "/Shares/PARENT/sub-folder" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: favorite a received share itself
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" favorites element "/Shares/PARENT" using the WebDAV API
    Then the HTTP status code should be "207"
    And as user "Brian" folder "/Shares/PARENT" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: moving a favorite file out of a share keeps favorite state
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Brian" has favorited element "/Shares/PARENT/parent.txt"
    When user "Brian" moves file "/Shares/PARENT/parent.txt" to "/taken_out.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/taken_out.txt" should exist
    And as user "Brian" file "/taken_out.txt" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: sharee file favorite state should not change the favorite state of sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "/PARENT/parent.txt" with user "Brian"
    And user "Brian" has accepted share "/parent.txt" offered by user "Alice"
    When user "Brian" favorites element "/Shares/parent.txt" using the WebDAV API
    Then the HTTP status code should be "207"
    And as user "Brian" file "/Shares/parent.txt" should be favorited
    And as user "Alice" file "/PARENT/parent.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |
