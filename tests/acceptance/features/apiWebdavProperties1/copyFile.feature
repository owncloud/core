@api @TestAlsoOnExternalUserBackend
Feature: copy file
  As a user
  I want to be able to copy files
  So that I can manage my files

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "/textfile1.txt"
    And user "Alice" has created folder "/FOLDER"

  @smokeTest
  Scenario Outline: Copying a file
    Given using <dav_version> DAV path
    When user "Alice" copies file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Copying and overwriting a file
    Given using <dav_version> DAV path
    When user "Alice" copies file "/textfile0.txt" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile1.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Copying a file when 2 files exist with different case
    Given using <dav_version> DAV path
    # "/textfile1.txt" already exists in the skeleton, make another with only case differences in the file name
    When user "Alice" copies file "/textfile0.txt" to "/TextFile1.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/textfile1.txt" for user "Alice" should be "ownCloud test text file 1"
    And the content of file "/TextFile1.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Copying a file to a folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" downloads file "/testshare/textfile0.txt" using the WebDAV API
    And the HTTP status code should be "404"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Copying a file to overwrite a file into a folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Brian" has copied file "textfile1.txt" to "/testshare/overwritethis.txt"
    When user "Alice" copies file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "Alice" with range "bytes=0-6" should be "ownClou"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-15
  Scenario Outline: Copying file to a path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "Alice" copies file "/textfile1.txt" to "/textfile1.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "Alice" should see the following elements
      | /textfile1.txt |
    But user "Alice" should not see the following elements
      | /textfile1.part |
    Examples:
      | dav_version |
      | old         |
      | new         |
