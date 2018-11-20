@api @TestAlsoOnExternalUserBackend
Feature: move (rename) file
  As a user
  I want to be able to move and rename files
  So that I can manage my file system

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  @smokeTest
  Scenario Outline: Moving a file
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/FOLDER/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the downloaded content when downloading file "/FOLDER/welcome.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving and overwriting a file
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the downloaded content when downloading file "/textfile0.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving (renaming) a file to be only different case
    Given using <dav_version> DAV path
    When user "user0" moves file "/textfile0.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/textfile0.txt" should not exist
    And the content of file "/TextFile0.txt" for user "user0" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving (renaming) a file to a file with only different case to an existing file
    Given using <dav_version> DAV path
    When user "user0" moves file "/textfile1.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/textfile0.txt" for user "user0" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "/TextFile0.txt" for user "user0" should be "ownCloud test text file 1" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving (renaming) a file to a file in a folder with only different case to an existing file
    Given using <dav_version> DAV path
    When user "user0" moves file "/textfile1.txt" to "/PARENT/Parent.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "ownCloud test text file parent" plus end-of-line
    And the content of file "/PARENT/Parent.txt" for user "user0" should be "ownCloud test text file 1" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving a file to a folder with no permissions
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And user "user1" has created a folder "/testshare"
    And user "user1" has created a share with settings
      | path        | testshare |
      | shareType   | 0         |
      | permissions | 1         |
      | shareWith   | user0     |
    When user "user0" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    When user "user0" downloads file "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving a file to overwrite a file in a folder with no permissions
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And user "user1" has created a folder "/testshare"
    And user "user1" has created a share with settings
      | path        | testshare |
      | shareType   | 0         |
      | permissions | 1         |
      | shareWith   | user0     |
    And user "user1" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
    When user "user0" moves file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "user0" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: move file into a not-existing folder
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/not-existing/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: rename a file into an invalid filename
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: rename a file into a banned filename
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Checking file id after a move
    Given using <dav_version> DAV path
    And user "user0" has stored id of file "/textfile0.txt"
    When user "user0" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then user "user0" file "/FOLDER/textfile0.txt" should have the previously stored id
    And user "user0" should not see the following elements
      | /textfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Checking file id after a move between received shares
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has created a folder "/folderA"
    And user "user0" has created a folder "/folderB"
    And user "user0" has shared folder "/folderA" with user "user1"
    And user "user0" has shared folder "/folderB" with user "user1"
    And user "user1" has created a folder "/folderA/ONE"
    And user "user1" has stored id of file "/folderA/ONE"
    And user "user1" has created a folder "/folderA/ONE/TWO"
    When user "user1" moves folder "/folderA/ONE" to "/folderB/ONE" using the WebDAV API
    Then as "user1" folder "/folderA" should exist
    And as "user1" folder "/folderA/ONE" should not exist
		# yes, a weird bug used to make this one fail
    And as "user1" folder "/folderA/ONE/TWO" should not exist
    And as "user1" folder "/folderB/ONE" should exist
    And as "user1" folder "/folderB/ONE/TWO" should exist
    And user "user1" file "/folderB/ONE" should have the previously stored id
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Renaming a file to a path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "user0" moves file "/welcome.txt" to "/welcome.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "user0" should see the following elements
      | /welcome.txt |
    But user "user0" should not see the following elements
      | /welcome.part |
    Examples:
      | dav_version |
      | old         |
      | new         |
