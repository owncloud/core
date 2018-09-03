@api @TestAlsoOnExternalUserBackend
Feature: move (rename) folder
  As a user
  I want to be able to move and rename folders
  So that I can quickly manage my file system

  Background:
    Given using OCS API version "1"
    And user "meta" has been created

  Scenario Outline: Renaming a folder to a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "meta" has created a folder "/testshare"
    When user "meta" moves folder "/testshare" to "/%5C" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "meta" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder beginning with a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "meta" has created a folder "/testshare"
    When user "meta" moves folder "/testshare" to "/%5Ctestshare" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "meta" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder including a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "meta" has created a folder "/testshare"
    When user "meta" moves folder "/testshare" to "/hola%5Chola" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "meta" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder into a banned name
    Given using <dav_version> DAV path
    And user "meta" has created a folder "/testshare"
    When user "meta" moves folder "/testshare" to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "meta" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move a folder into a not existing one
    Given using <dav_version> DAV path
    And user "meta" has created a folder "/testshare"
    When user "meta" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "meta" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |
