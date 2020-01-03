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

  @skipOnOcV10.3
  Scenario Outline: rename a folder to a folder name that matches (or not) blacklisted_files_regex
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    And the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" moves folder "/testshare" to these foldernames using the webDAV API then the results should be as listed
      | foldername                             | http-code | exists |
      | .ext                                   | 403       | no     |
      | filename.ext                           | 403       | no     |
      | bannedfilename.txt                     | 403       | no     |
      | containsbannedstring                   | 403       | no     |
      | this-ContainsBannedString.txt          | 403       | no     |
      | /FOLDER/.ext                           | 403       | no     |
      | /FOLDER/filename.ext                   | 403       | no     |
      | /FOLDER/bannedfilename.txt             | 403       | no     |
      | /FOLDER/containsbannedstring           | 403       | no     |
      | /FOLDER/this-ContainsBannedString.txt  | 403       | no     |
      | .extension                             | 201       | yes    |
      | filename.txt                           | 201       | yes    |
      | bannedfilename                         | 201       | yes    |
      | bannedfilenamewithoutdot               | 201       | yes    |
      | not-contains-banned-string.txt         | 201       | yes    |
      | /FOLDER/.extension                     | 201       | yes    |
      | /FOLDER/filename.txt                   | 201       | yes    |
      | /FOLDER/bannedfilename                 | 201       | yes    |
      | /FOLDER/bannedfilenamewithoutdot       | 201       | yes    |
      | /FOLDER/not-contains-banned-string.txt | 201       | yes    |
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

  @skipOnOcV10.3
  Scenario Outline: rename a folder to a folder name that matches (or not) excluded_directories_regex
    Given using <dav_version> DAV path
    And user "user0" has created folder "/testshare"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    And the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" moves folder "/testshare" to these foldernames using the webDAV API then the results should be as listed
      | foldername                                 | http-code | exists |
      | endswith.bad                               | 403       | no     |
      | thisendswith.bad                           | 403       | no     |
      | .git                                       | 403       | no     |
      | .github                                    | 403       | no     |
      | containsvirusinthename                     | 403       | no     |
      | this-containsvirusinthename.txt            | 403       | no     |
      | /FOLDER/endswith.bad                       | 403       | no     |
      | /FOLDER/thisendswith.bad                   | 403       | no     |
      | /FOLDER/.git                               | 403       | no     |
      | /FOLDER/.github                            | 403       | no     |
      | /FOLDER/containsvirusinthename             | 403       | no     |
      | /FOLDER/this-containsvirusinthename.txt    | 403       | no     |
      | endswith.badandotherstuff                  | 201       | yes    |
      | thisendswith.badandotherstuff              | 201       | yes    |
      | name.git                                   | 201       | yes    |
      | name.github                                | 201       | yes    |
      | not-contains-virus-in-the-name.txt         | 201       | yes    |
      | /FOLDER/endswith.badandotherstuff          | 201       | yes    |
      | /FOLDER/thisendswith.badandotherstuff      | 201       | yes    |
      | /FOLDER/name.git                           | 201       | yes    |
      | /FOLDER/name.github                        | 201       | yes    |
      | /FOLDER/not-contains-virus-in-the-name.txt | 201       | yes    |
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
