@api
Feature: delete file
  As a user
  I want to be able to delete files
  So that I can remove unwanted data

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: delete a file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "to delete" to "/textfile0.txt"
    When user "Alice" deletes file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/textfile0.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete a file when 2 files exist with different case
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "to delete" to "/textfile1.txt"
    And user "Alice" has uploaded file with content "uploaded content" to "/TextFile1.txt"
    When user "Alice" deletes file "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/textfile1.txt" should not exist
    And as "Alice" file "/TextFile1.txt" should exist
    And the content of file "/TextFile1.txt" for user "Alice" should be "uploaded content"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: delete file from folder with dots in the path
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content for file name with dots" to "<folder_name>/<file_name>"
    When user "Alice" deletes file "<folder_name>/<file_name>" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "<folder_name>/<file_name>" should not exist
    Examples:
      | dav_version | folder_name   | file_name   |
      | old         | /upload.      | abc.        |
      | old         | /upload.      | abc .       |
      | old         | /upload.1     | abc.txt     |
      | old         | /upload...1.. | abc...txt.. |
      | old         | /...          | ...         |
      | new         | /upload.      | abc.        |
      | new         | /upload.      | abc .       |
      | new         | /upload.1     | abc.txt     |
      | new         | /upload...1.. | abc...txt.. |
      | new         | /...          | ...         |
      | new         | /..upload     | abc         |
      | new         | /..upload     | ..abc       |

  Scenario Outline: delete a file with comma in the filename
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "file with comma in filename" to <filename>
    When user "Alice" deletes file <filename> using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file <filename> should not exist
    Examples:
      | dav_version | filename       |
      | old         | "sample,1.txt" |
      | old         | ",,,.txt"      |
      | old         | ",,,.,"        |
      | new         | "sample,1.txt" |
      | new         | ",,,.txt"      |
      | new         | ",,,.,"        |

  @smokeTest
  Scenario Outline: delete a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "to delete" to "<path>"
    When user "Alice" deletes file "<path>" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "<path>" should not exist
    Examples:
      | dav_version | path                 |
      | old         | .hidden_file         |
      | old         | /FOLDER/.hidden_file |
      | new         | .hidden_file         |
      | new         | /FOLDER/.hidden_file |