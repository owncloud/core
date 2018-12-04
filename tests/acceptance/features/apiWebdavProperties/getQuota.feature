@api @TestAlsoOnExternalUserBackend
Feature: get quota
  As a user
  I want to be able to find out my available storage quota
  So that I can manage the use of my allocated storage

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  Scenario Outline: Retrieving folder quota when no quota is set
    Given using <dav_version> DAV path
    When the administrator gives unlimited quota to user "user0" using the provisioning API
    Then as user "user0" folder "/" should contain a property "{DAV:}quota-available-bytes" with value "-3"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Retrieving folder quota when quota is set
    Given using <dav_version> DAV path
    When the administrator sets the quota of user "user0" to "10 MB" using the provisioning API
    Then as user "user0" folder "/" should contain a property "{DAV:}quota-available-bytes" with value "10485406"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota of shared folder with quota when no quota is set for recipient
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has been given unlimited quota
    And the quota of user "user1" has been set to "10 MB"
    And user "user1" has created folder "/testquota"
    And user "user1" has created a share with settings
      | path        | testquota |
      | shareType   | 0         |
      | permissions | 31        |
      | shareWith   | user0     |
    When user "user0" gets the following properties of folder "/testquota" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485406"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota when quota is set and a file was uploaded
    Given using <dav_version> DAV path
    And the quota of user "user0" has been set to "1 KB"
    And user "user0" has uploaded file "/prueba.txt" of 93 bytes
    When user "user0" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "577"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota when quota is set and a file was recieved
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And the quota of user "user1" has been set to "1 KB"
    And user "user0" has uploaded file "/user0.txt" of 93 bytes
    And user "user0" has shared file "user0.txt" with user "user1"
    When user "user1" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "670"
    Examples:
      | dav_version |
      | old         |
      | new         |
