@api @issue-ocis-reva-14
Feature: move (rename) file
  As a user
  I want to be able to move and rename files
  So that I can manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: Moving a file
    Given using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/textfile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving and overwriting a file
    Given using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/textfile1.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving (renaming) a file to be only different case
    Given using <dav_version> DAV path
    When user "Alice" moves file "/textfile0.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/textfile0.txt" should not exist
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving (renaming) a file to a file with only different case to an existing file
    Given using <dav_version> DAV path
    When user "Alice" moves file "/textfile1.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/textfile0.txt" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 1" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Moving (renaming) a file to a file in a folder with only different case to an existing file
    Given using <dav_version> DAV path
    When user "Alice" moves file "/textfile1.txt" to "/PARENT/Parent.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent" plus end-of-line
    And the content of file "/PARENT/Parent.txt" for user "Alice" should be "ownCloud test text file 1" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Moving a file into a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "<mover>" has uploaded file with content "test data" to "/testfile.txt"
    When user "<mover>" moves file "/testfile.txt" to "/testshare/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testshare/testfile.txt" for user "Alice" should be "test data"
    And the content of file "/testshare/testfile.txt" for user "Brian" should be "test data"
    And as "<mover>" file "/testfile.txt" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required
  Scenario Outline: Moving a file out of a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "test data" to "/testshare/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    When user "<mover>" moves file "/testshare/testfile.txt" to "/testfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testfile.txt" for user "<mover>" should be "test data"
    And as "Alice" file "/testshare/testfile.txt" should not exist
    And as "Brian" file "/testshare/testfile.txt" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required
  Scenario Outline: Moving a folder into a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "<mover>" has created folder "/testsubfolder"
    And user "<mover>" has uploaded file with content "test data" to "/testsubfolder/testfile.txt"
    When user "<mover>" moves folder "/testsubfolder" to "/testshare/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testshare/testsubfolder/testfile.txt" for user "Alice" should be "test data"
    And the content of file "/testshare/testsubfolder/testfile.txt" for user "Brian" should be "test data"
    And as "<mover>" file "/testsubfolder" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required
  Scenario Outline: Moving a folder out of a shared folder as the sharee and as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created folder "/testshare/testsubfolder"
    And user "Brian" has uploaded file with content "test data" to "/testshare/testsubfolder/testfile.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    When user "<mover>" moves folder "/testshare/testsubfolder" to "/testsubfolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testsubfolder/testfile.txt" for user "<mover>" should be "test data"
    And as "Alice" folder "/testshare/testsubfolder" should not exist
    And as "Brian" folder "/testshare/testsubfolder" should not exist
    Examples:
      | dav_version | mover |
      | old         | Alice |
      | new         | Alice |
      | old         | Brian |
      | new         | Brian |

  @files_sharing-app-required
  Scenario Outline: Moving a file to a shared folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    When user "Alice" downloads file "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Moving a file to overwrite a file in a shared folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Brian" has copied file "/welcome.txt" to "/testshare/overwritethis.txt"
    When user "Alice" moves file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the downloaded content when downloading file "/testshare/overwritethis.txt" for user "Alice" with range "bytes=0-6" should be "Welcome"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: move file into a not-existing folder
    Given using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/not-existing/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211
  Scenario Outline: rename a file into an invalid filename
    Given using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Checking file id after a move
    Given using <dav_version> DAV path
    And user "Alice" has stored id of file "/textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then user "Alice" file "/FOLDER/textfile0.txt" should have the previously stored id
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Checking file id after a move between received shares
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has created folder "/folderA"
    And user "Alice" has created folder "/folderB"
    And user "Alice" has shared folder "/folderA" with user "Brian"
    And user "Alice" has shared folder "/folderB" with user "Brian"
    And user "Brian" has created folder "/folderA/ONE"
    And user "Brian" has stored id of file "/folderA/ONE"
    And user "Brian" has created folder "/folderA/ONE/TWO"
    When user "Brian" moves folder "/folderA/ONE" to "/folderB/ONE" using the WebDAV API
    Then as "Brian" folder "/folderA" should exist
    And as "Brian" folder "/folderA/ONE" should not exist
		# yes, a weird bug used to make this one fail
    And as "Brian" folder "/folderA/ONE/TWO" should not exist
    And as "Brian" folder "/folderB/ONE" should exist
    And as "Brian" folder "/folderB/ONE/TWO" should exist
    And user "Brian" file "/folderB/ONE" should have the previously stored id
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211
  Scenario Outline: Renaming a file to a path with extension .part should not be possible
    Given using <dav_version> DAV path
    When user "Alice" moves file "/welcome.txt" to "/welcome.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "Alice" should see the following elements
      | /welcome.txt |
    But user "Alice" should not see the following elements
      | /welcome.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: renaming to a file with special characters
    When user "Alice" moves file "/textfile0.txt" to "/<renamed_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/<renamed_file>" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | renamed_file  |
      | *a@b#c$e%f&g* |
      | 1 2 3##.##    |

  @issue-ocis-reva-265
  #after fixing the issues merge this Scenario into the one above
  Scenario Outline: renaming to a file with special characters
    When user "Alice" moves file "/textfile0.txt" to "/<renamed_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/<renamed_file>" for user "Alice" should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | renamed_file  |
      | #oc ab?cd=ef# |

  Scenario Outline: renaming file with dots in the path
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    When user "Alice" uploads file with content "uploaded content for file name ending with a dot" to "<folder_name>/<file_name>" using the WebDAV API
    And user "Alice" moves file "<folder_name>/<file_name>" to "<folder_name>/abc.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "<folder_name>/abc.txt" should exist
    Examples:
      | dav_version | folder_name   | file_name   |
      | old         | /upload.      | abc.        |
      | old         | /upload.      | abc .       |
      | old         | /upload.1     | abc         |
      | old         | /upload...1.. | abc...txt.. |
      | old         | /...          | abcd.txt    |
      | old         | /..upload     | ..abc       |
      | new         | /upload.      | abc.        |
      | new         | /upload.      | abc .       |
      | new         | /upload.1     | ..abc.txt   |
      | new         | /upload...1.. | abc...txt.. |
      | new         | /...          | ...         |
      | new         | /..upload     | ..abc       |

  @smokeTest
  Scenario Outline: user tries to move a file that doesnt exist into a folder
    Given using <dav_version> DAV path
    When user "Alice" moves file "/doesNotExist.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    And as "Alice" file "/FOLDER/textfile0.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: user tries to rename a file that doesnt exist
    Given using <dav_version> DAV path
    When user "Alice" moves file "/doesNotExist.txt" to "/exist.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    And as "Alice" file "/exist.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "I am a hidden file" to "<file_name_from>"
    When user "Alice" moves file "<file_name_from>" to "<file_name_to>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "<file_name_to>" for user "Alice" should be "I am a hidden file"
    Examples:
      | dav_version | file_name_from         | file_name_to          |
      | old         | .hidden_file           | /FOLDER/.hidden_file  |
      | old         | /FOLDER/.hidden_file   | .hidden_file          |
      | new         | .hidden_file           | /FOLDER/.hidden_file  |
      | new         | /FOLDER/.hidden_file   | .hidden_file          |

  @smokeTest
  Scenario Outline: Renaming to/from a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "I am a hidden file" to "<file_name_from>"
    When user "Alice" moves file "<file_name_from>" to "<file_name_to>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "<file_name_to>" for user "Alice" should be "I am a hidden file"
    Examples:
      | dav_version | file_name_from  | file_name_to    |
      | old         | .hidden_file    | hidden_file.txt |
      | old         | hidden_file.txt | .hidden_file    |
      | new         | .hidden_file    | hidden_file.txt |
      | new         | hidden_file.txt | .hidden_file    |