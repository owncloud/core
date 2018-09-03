@api @TestAlsoOnExternalUserBackend
Feature: get quota
  As a user
  I want to be able to find out my available storage quota
  So that I can manage the use of my allocated storage

  Background:
    Given using OCS API version "1"
    And user "meta" has been created

  Scenario Outline: Retrieving folder quota when no quota is set
    Given using <dav_version> DAV path
    When the administrator gives unlimited quota to user "meta" using the provisioning API
    And user "meta" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "-3"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Retrieving folder quota when quota is set
    Given using <dav_version> DAV path
    When the administrator sets the quota of user "meta" to "10 MB" using the provisioning API
    And user "meta" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485406"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota of shared folder with quota when no quota is set for recipient
    Given using <dav_version> DAV path
    And user "user1" has been created
    And user "meta" has been given unlimited quota
    And the quota of user "user1" has been set to "10 MB"
    And user "user1" has created a folder "/testquota"
    And user "user1" has created a share with settings
      | path        | testquota |
      | shareType   | 0         |
      | permissions | 31        |
      | shareWith   | meta     |
    When user "meta" gets the following properties of folder "/testquota" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "10485406"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota when quota is set and a file was uploaded
    Given using <dav_version> DAV path
    And the quota of user "meta" has been set to "1 KB"
    And user "meta" has added file "/prueba.txt" of 93 bytes
    When user "meta" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "577"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota when quota is set and a file was recieved
    Given using <dav_version> DAV path
    And user "user1" has been created
    And the quota of user "user1" has been set to "1 KB"
    And user "meta" has added file "/meta.txt" of 93 bytes
    And user "meta" has shared file "meta.txt" with user "user1"
    When user "user1" gets the following properties of folder "/" using the WebDAV API
      | {DAV:}quota-available-bytes |
    Then the single response should contain a property "{DAV:}quota-available-bytes" with value "670"
    Examples:
      | dav_version |
      | old         |
      | new         |
