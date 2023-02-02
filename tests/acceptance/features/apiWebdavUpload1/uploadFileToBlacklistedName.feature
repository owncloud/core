@api
Feature: users cannot upload a file to a blacklisted name
  As an administrator
  I want to be able to prevent users from uploading files to specified file names
  So that I can prevent unwanted file names existing in the cloud storage

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-ocis-reva-15
  Scenario Outline: upload a file to a filename that is banned by default
    Given using <dav_version> DAV path
    When user "Alice" uploads file with content "uploaded content" to ".htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file ".htaccess" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-54
  Scenario Outline: upload a file to a banned filename
    Given using <dav_version> DAV path
    And the administrator has updated system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json"
    When user "Alice" uploads file with content "uploaded content" to "blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "blacklisted-file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-54
  Scenario Outline: upload a file to a filename that matches (or not) blacklisted_files_regex
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER"
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    And the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "Alice" uploads to these filenames with content "uploaded content" using the webDAV API then the results should be as listed
      | filename                               | http-code | exists |
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
