@api @TestAlsoOnExternalUserBackend
Feature: upload file
  As a user
  I want to be able to upload files
  So that I can store and share files between multiple client systems

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: upload a file and check download content
    Given using <dav_version> DAV path
    When user "user0" uploads file with content "uploaded content" to "<file_name>" using the WebDAV API
    Then the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    And the content of file "<file_name>" for user "user0" should be "uploaded content"
    Examples:
      | dav_version | file_name         |
      | old         | /upload.txt       |
      | old         | /नेपाली.txt       |
      | old         | /strängé file.txt |
      | new         | /upload.txt       |
      | new         | /strängé file.txt |
      | new         | /नेपाली.txt       |

  Scenario Outline: upload a file and check download content
    Given using <dav_version> DAV path
    When user "user0" uploads file with content "uploaded content" to <file_name> using the WebDAV API
    Then the content of file <file_name> for user "user0" should be "uploaded content"
    Examples:
      | dav_version | file_name           |
      | old         | "C++ file.cpp"      |
      | old         | "file #2.txt"       |
      | old         | "file ?2.txt"       |
      | old         | " ?fi=le&%#2 . txt" |
      | old         | " # %ab ab?=ed "    |
      | new         | "C++ file.cpp"      |
      | new         | "file #2.txt"       |
      | new         | "file ?2.txt"       |
      | new         | " ?fi=le&%#2 . txt" |
      | new         | " # %ab ab?=ed "    |

  Scenario Outline: upload a file into a folder and check download content
    Given using <dav_version> DAV path
    And user "user0" has created folder "<folder_name>"
    When user "user0" uploads file with content "uploaded content" to "<folder_name>/<file_name>" using the WebDAV API
    Then the content of file "<folder_name>/<file_name>" for user "user0" should be "uploaded content"
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /upload                          | abc.txt                       |
      | old         | /strängé folder                  | strängé file.txt              |
      | old         | /C++ folder                      | C++ file.cpp                  |
      | old         | /नेपाली                          | नेपाली                        |
      | old         | /folder #2.txt                   | file #2.txt                   |
      | old         | /folder ?2.txt                   | file ?2.txt                   |
      | old         | /?fi=le&%#2 . txt                | # %ab ab?=ed                  |
      | new         | /upload                          | abc.txt                       |
      | new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
      | new         | /C++ folder                      | C++ file.cpp                  |
      | new         | /नेपाली                          | नेपाली                        |
      | new         | /folder #2.txt                   | file #2.txt                   |
      | new         | /folder ?2.txt                   | file ?2.txt                   |
      | new         | /?fi=le&%#2 . txt                | # %ab ab?=ed                  |

  Scenario Outline: Uploading file to path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/textfile.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "user0" should not see the following elements
      | /textfile.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: upload a file to a filename that is banned by default
    Given using <dav_version> DAV path
    When user "user0" uploads file with content "uploaded content" to ".htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file ".htaccess" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: upload a file to a banned filename
    Given using <dav_version> DAV path
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "user0" uploads file with content "uploaded content" to "blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "blacklisted-file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches (or not) blacklisted_files_regex
    Given using <dav_version> DAV path
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    And the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" uploads to these filenames with content "uploaded content" using the webDAV API then the results should be as listed
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

  Scenario Outline: upload a file to an excluded directory name
    Given using <dav_version> DAV path
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" uploads file with content "uploaded content" to ".github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file ".github" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: upload a file to an excluded directory name inside a parent directory
    Given using <dav_version> DAV path
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" uploads file with content "uploaded content" to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" folder "/FOLDER" should exist
    But as "user0" file "/FOLDER/.github" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches (or not) excluded_directories_regex
    Given using <dav_version> DAV path
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    And the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" uploads to these filenames with content "uploaded content" using the webDAV API then the results should be as listed
      | filename                                   | http-code | exists |
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
