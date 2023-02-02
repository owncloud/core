@api
Feature: move (rename) file
  As a user
  I want to be able to move and rename files
  So that I can manage my file system

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: Moving a file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving and overwriting a file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    When user "Alice" moves file "/textfile0.txt" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/textfile1.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Moving (renaming) a file to be only different case
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/textfile0.txt" should not exist
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Moving (renaming) a file to a file with only different case to an existing file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    When user "Alice" moves file "/textfile1.txt" to "/TextFile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    And the content of file "/TextFile0.txt" for user "Alice" should be "ownCloud test text file 1"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Moving (renaming) a file to a file in a folder with only different case to an existing file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file with content "ownCloud test text file parent" to "PARENT/parent.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    When user "Alice" moves file "/textfile1.txt" to "/PARENT/Parent.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent"
    And the content of file "/PARENT/Parent.txt" for user "Alice" should be "ownCloud test text file 1"
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
  Scenario Outline: Moving a file to a shared folder with no permissions
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    When user "Alice" moves file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should not be able to download file "/testshare/textfile0.txt"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Moving a file to overwrite a file in a shared folder with no permissions
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "Welcome to ownCloud" to "fileToCopy.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Brian" has copied file "/fileToCopy.txt" to "/testshare/overwritethis.txt"
    When user "Alice" moves file "/textfile0.txt" to "/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the content of file "/testshare/overwritethis.txt" for user "Alice" should be "Welcome to ownCloud"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: move file into a not-existing folder
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToMove.txt"
    When user "Alice" moves file "/fileToMove.txt" to "/not-existing/fileToMove.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211
  Scenario Outline: rename a file into an invalid filename
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToRename.txt"
    When user "Alice" moves file "/fileToRename.txt" to "/a\\a" using the WebDAV API
    Then the HTTP status code should be "400"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Checking file id after a move
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" has stored id of file "/textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" to "/FOLDER/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" file "/FOLDER/textfile0.txt" should have the previously stored id
    And user "Alice" should not see the following elements
      | /textfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Checking file id after a move between received shares
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/folderA"
    And user "Alice" has created folder "/folderB"
    And user "Alice" has shared folder "/folderA" with user "Brian"
    And user "Alice" has shared folder "/folderB" with user "Brian"
    And user "Brian" has created folder "/folderA/ONE"
    And user "Brian" has stored id of folder "/folderA/ONE"
    And user "Brian" has created folder "/folderA/ONE/TWO"
    When user "Brian" moves folder "/folderA/ONE" to "/folderB/ONE" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/folderA" should exist
    And as "Brian" folder "/folderA/ONE" should not exist
		# yes, a weird bug used to make this one fail
    And as "Brian" folder "/folderA/ONE/TWO" should not exist
    And as "Brian" folder "/folderB/ONE" should exist
    And as "Brian" folder "/folderB/ONE/TWO" should exist
    And user "Brian" folder "/folderB/ONE" should have the previously stored id
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-211
  Scenario Outline: Renaming a file to a path with extension .part should not be possible
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToRename.txt"
    When user "Alice" moves file "/fileToRename.txt" to "/welcome.part" using the WebDAV API
    Then the HTTP status code should be "400"
    And the DAV exception should be "OCA\DAV\Connector\Sabre\Exception\InvalidPath"
    And the DAV message should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And the DAV reason should be "Can`t upload files with extension .part because these extensions are reserved for internal use."
    And user "Alice" should see the following elements
      | /fileToRename.txt |
    But user "Alice" should not see the following elements
      | /fileToRename.part |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @sqliteDB
  Scenario Outline: renaming to a file with special characters
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 2" to "textfile2.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 3" to "textfile3.txt"
    When user "Alice" moves the following file using the WebDAV API
      | source         | destination   |
      | /textfile0.txt | *a@b#c$e%f&g* |
      | /textfile1.txt | 1 2 3##.##    |
      | /textfile2.txt | file[2]       |
      | /textfile3.txt | file [ 3 ]    |
    Then the HTTP status code of responses on all endpoints should be "201"
    And the content of file "*a@b#c$e%f&g*" for user "Alice" should be "ownCloud test text file 0"
    And the content of file "1 2 3##.##" for user "Alice" should be "ownCloud test text file 1"
    And the content of file "file[2]" for user "Alice" should be "ownCloud test text file 2"
    And the content of file "file [ 3 ]" for user "Alice" should be "ownCloud test text file 3"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-265
  #after fixing the issues merge this Scenario into the one above
  Scenario Outline: renaming to a file with question mark in its name
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    When user "Alice" moves file "/textfile0.txt" to "/<renamed_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/<renamed_file>" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version | renamed_file  |
      | old         | #oc ab?cd=ef# |
      | new         | #oc ab?cd=ef# |


  Scenario Outline: renaming file with dots in the path
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content for file name ending with a dot" to "<folder_name>/<file_name>"
    When user "Alice" moves file "<folder_name>/<file_name>" to "<folder_name>/abc.txt" using the WebDAV API
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
    And user "Alice" has created folder "FOLDER"
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


  Scenario Outline: Moving a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded the following files with content "hidden file"
      | path                    |
      | .hidden_file101         |
      | /FOLDER/.hidden_file102 |
    When user "Alice" moves the following files using the WebDAV API
      | from                    | to                      |
      | .hidden_file101         | /FOLDER/.hidden_file101 |
      | /FOLDER/.hidden_file102 | .hidden_file102         |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the following files should exist
      | path                    |
      | .hidden_file102         |
      | /FOLDER/.hidden_file101 |
    And the content of the following files for user "Alice" should be "hidden file"
      | path                    |
      | .hidden_file102         |
      | /FOLDER/.hidden_file101 |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Renaming to/from a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded the following files with content "hidden file"
      | path                    |
      | .hidden_file101         |
      | hidden_file101.txt      |
    When user "Alice" moves the following files using the WebDAV API
      | from               | to                 |
      | .hidden_file101    | hidden_file102.txt |
      | hidden_file101.txt | .hidden_file102    |
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" the following files should exist
      | path               |
      | .hidden_file102    |
      | hidden_file102.txt |
    And the content of the following files for user "Alice" should be "hidden file"
      | path               |
      | .hidden_file102    |
      | hidden_file102.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Moving a file (deep moves with various folder and file names)
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<source_folder>"
    And user "Alice" has created folder "<target_folder>"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/<source_folder>/<source_file>"
    When user "Alice" moves file "/<source_folder>/<source_file>" to "/<target_folder>/<target_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/<target_folder>/<target_file>" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version | source_folder | source_file | target_folder | target_file |
      | old         | text          | file.txt    | 0             | file.txt    |
      | old         | text          | file.txt    | 1             | file.txt    |
      | old         | 0             | file.txt    | text          | file.txt    |
      | old         | 1             | file.txt    | text          | file.txt    |
      | old         | texta         | 0           | textb         | file.txt    |
      | old         | texta         | 1           | textb         | file.txt    |
      | old         | texta         | file.txt    | textb         | 0           |
      | old         | texta         | file.txt    | textb         | 1           |
      | new         | text          | file.txt    | 0             | file.txt    |
      | new         | text          | file.txt    | 1             | file.txt    |
      | new         | 0             | file.txt    | text          | file.txt    |
      | new         | 1             | file.txt    | text          | file.txt    |
      | new         | texta         | 0           | textb         | file.txt    |
      | new         | texta         | 1           | textb         | file.txt    |
      | new         | texta         | file.txt    | textb         | 0           |
      | new         | texta         | file.txt    | textb         | 1           |


  Scenario Outline: Moving a file from a folder to the root
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<source_folder>"
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/<source_folder>/<source_file>"
    When user "Alice" moves file "/<source_folder>/<source_file>" to "/<target_file>" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Alice"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/<target_file>" for user "Alice" should be "ownCloud test text file 0"
    Examples:
      | dav_version | source_folder | source_file | target_file |
      | old         | 0             | file.txt    | file.txt    |
      | old         | 1             | file.txt    | file.txt    |
      | old         | texta         | 0           | file.txt    |
      | old         | texta         | 1           | file.txt    |
      | old         | texta         | file.txt    | 0           |
      | old         | texta         | file.txt    | 1           |
      | new         | 0             | file.txt    | file.txt    |
      | new         | 1             | file.txt    | file.txt    |
      | new         | texta         | 0           | file.txt    |
      | new         | texta         | 1           | file.txt    |
      | new         | texta         | file.txt    | 0           |
      | new         | texta         | file.txt    | 0           |


  Scenario Outline: move a file of size zero byte
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/zerobyte.txt" to "/zerobyte.txt"
    And user "Alice" has created folder "/testZeroByte"
    When user "Alice" moves file "/zerobyte.txt" to "/testZeroByte/zerobyte.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/testZeroByte/zerobyte.txt" should exist
    And as "Alice" file "/zerobyte.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: rename a file of size zero byte
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/zerobyte.txt" to "/zerobyte.txt"
    When user "Alice" moves file "/zerobyte.txt" to "/rename_zerobyte.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/rename_zerobyte.txt" should exist
    And as "Alice" file "/zerobyte.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |