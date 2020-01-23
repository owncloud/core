@api @TestAlsoOnExternalUserBackend
Feature: copy file
  As a user
  I want to be able to copy files
  So that I can manage my files

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "user0" has uploaded file with content "ownCloud test text file 1" to "/textfile1.txt"
    And user "user0" has created folder "/FOLDER"

  @smokeTest
  Scenario Outline: Copying a file
    Given using <dav_version> DAV path
    When user "user0" copies file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/textfile0.txt" for user "user0" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Copying and overwriting a file
    Given using <dav_version> DAV path
    When user "user0" copies file "/textfile0.txt" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile1.txt" for user "user0" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Copying a file when 2 files exist with different case
    Given using <dav_version> DAV path
    # "/textfile1.txt" already exists in the skeleton, make another with only case differences in the file name
    When user "user0" copies file "/textfile0.txt" to "/TextFile1.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/textfile1.txt" for user "user0" should be "ownCloud test text file 1"
    And the content of file "/TextFile1.txt" for user "user0" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file to a folder with no permissions
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user1" has created folder "/testshare"
    And user "user1" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | user0     |
    When user "user0" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "user0" downloads file "/testshare/textfile0.txt" using the WebDAV API
    And the HTTP status code should be "404"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file to overwrite a file into a folder with no permissions
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user1" has created folder "/testshare"
    And user "user1" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | user0     |
    And user "user1" has copied file "textfile1.txt" to "/testshare/overwritethis.txt"
    When user "user0" copies file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "ownClou"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Copying file to a path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "user0" copies file "/textfile1.txt" to "/textfile1.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "user0" should see the following elements
      | /textfile1.txt |
    But user "user0" should not see the following elements
      | /textfile1.part |
    Examples:
      | dav_version |
      | old         |
      | new         |
