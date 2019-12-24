@api @TestAlsoOnExternalUserBackend
Feature: move (rename) folder
  As a user
  I want to be able to move and rename folders
  So that I can quickly manage my file system

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  Scenario Outline: Renaming a folder to a backslash should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "\" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder beginning with a backslash should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "\testshare" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a folder including a backslash encoded should return an error
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "/hola\hola" using the WebDAV API
    Then the HTTP status code should be "400"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Rename a folder to a name that is banned by default
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Rename a folder to a banned name
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "user0" moves folder "/testshare" to "/blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Rename a folder to an excluded directory name
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" moves folder "/testshare" to "/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Rename a folder to an excluded directory name inside a parent directory
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" moves folder "/testshare" to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Move a folder into a not existing one
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    When user "user0" moves folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "user0" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |
