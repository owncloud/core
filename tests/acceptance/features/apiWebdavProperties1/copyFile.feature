@api
Feature: copy file
  As a user
  I want to be able to copy files
  So that I can manage my files

  Background:
    Given using OCS API version "1"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
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

  @files_sharing-app-required @issue-ocis-reva-11
  Scenario Outline: Copying a file to a folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Alice" copies file "/textfile0.txt" to "/Shares/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And user "Alice" should not be able to download file "/Shares/testshare/textfile0.txt"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required @issue-ocis-reva-11
  Scenario Outline: Copying a file to overwrite a file into a folder with no permissions
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "ownCloud test text file 1" to "textfile1.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | read      |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    And user "Brian" has copied file "textfile1.txt" to "/testshare/overwritethis.txt"
    When user "Alice" copies file "/textfile0.txt" to "/Shares/testshare/overwritethis.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And the content of file "/Shares/testshare/overwritethis.txt" for user "Alice" should be "ownCloud test text file 1"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-15
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

  @issue-ocis-reva-387
  Scenario Outline: copy a file over the top of an existing folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies file "/textfile1.txt" to "/FOLDER" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/FOLDER" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" folder "/FOLDER/sample-folder" should not exist
    And as "Alice" file "/textfile1.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-387
  Scenario Outline: copy a folder over the top of an existing file
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies folder "/FOLDER" to "/textfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/FOLDER/sample-folder" should exist
    And as "Alice" folder "/textfile1.txt/sample-folder" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-387
  Scenario Outline: copy a folder into another folder at different level
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b/sample-folder-c"
    When user "Alice" copies folder "Sample-Folder-A/sample-folder-b" to "FOLDER/second-level-folder/third-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/Sample-Folder-A/sample-folder-b/sample-folder-c" should exist
    And as "Alice" folder "/FOLDER/second-level-folder/third-level-folder/sample-folder-c" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-387
  Scenario Outline: copy a file into a folder at different level
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "FOLDER/second-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should not exist
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "FOLDER/second-level-folder" should exist
    And the content of file "FOLDER/second-level-folder" for user "Alice" should be "sample file-c"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-387
  Scenario Outline: copy a file into a file at different level
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "file at second level" to "FOLDER/second-level-file.txt"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "FOLDER/second-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "FOLDER/second-level-file.txt" should exist
    And as "Alice" file "FOLDER/textfile-c.txt" should not exist
    And the content of file "FOLDER/second-level-file.txt" for user "Alice" should be "sample file-c"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-387
  Scenario Outline: copy a folder into a file at different level
    Given using <dav_version> DAV path
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies folder "FOLDER/second-level-folder" to "Sample-Folder-A/sample-folder-b/textfile-c.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should exist
    And as "Alice" folder "Sample-Folder-A/sample-folder-b/textfile-c.txt/third-level-folder" should exist
    And as "Alice" folder "Sample-Folder-A/sample-folder-b/second-level-folder" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file over the top of an existing folder received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/BRIAN-Folder"
    And user "Brian" has created folder "BRIAN-Folder/sample-folder"
    And user "Brian" has shared folder "BRIAN-Folder" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-Folder" offered by user "Brian"
    When user "Alice" copies file "/textfile1.txt" to "/Shares/BRIAN-Folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/Shares/BRIAN-Folder" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" folder "/Shares/BRIAN-Folder/sample-folder" should not exist
    And as "Alice" file "/textfile1.txt" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder over the top of an existing file received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "file to share" to "/sharedfile1.txt"
    And user "Brian" has shared file "/sharedfile1.txt" with user "Alice"
    And user "Alice" has accepted share "/sharedfile1.txt" offered by user "Brian"
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies folder "/FOLDER" to "/Shares/sharedfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/FOLDER/sample-folder" should exist
    And as "Alice" folder "/Shares/sharedfile1.txt/sample-folder" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder into another folder at different level which is received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b/sample-folder-c"
    When user "Alice" copies folder "Sample-Folder-A/sample-folder-b" to "Shares/BRIAN-FOLDER/second-level-folder/third-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/Sample-Folder-A/sample-folder-b/sample-folder-c" should exist
    And as "Alice" folder "/Shares/BRIAN-FOLDER/second-level-folder/third-level-folder/sample-folder-c" should exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file into a folder at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "Shares/BRIAN-FOLDER/second-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-folder" should not exist
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/second-level-folder" should exist
    And the content of file "Shares/BRIAN-FOLDER/second-level-folder" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file into a file at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has uploaded file with content "file at second level" to "BRIAN-FOLDER/second-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "Shares/BRIAN-FOLDER/second-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/second-level-file.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/textfile-c.txt" should not exist
    And the content of file "Shares/BRIAN-FOLDER/second-level-file.txt" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder into a file at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has uploaded file with content "file at third level" to "BRIAN-FOLDER/second-level-folder/third-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    When user "Alice" copies folder "FOLDER/second-level-folder" to "/Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt" should exist
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should exist
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt/third-level-folder" should exist
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/second-level-folder" should not exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file over the top of an existing folder received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "/BRIAN-Folder"
    And user "Brian" has created folder "BRIAN-Folder/sample-folder"
    And user "Brian" has shared folder "BRIAN-Folder" with group "grp1" with permissions "15"
    And user "Alice" has accepted share "/BRIAN-Folder" offered by user "Brian"
    When user "Alice" copies file "/textfile1.txt" to "/Shares/BRIAN-Folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/Shares/BRIAN-Folder" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" folder "/Shares/BRIAN-Folder/sample-folder" should not exist
    And as "Alice" file "/textfile1.txt" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder over the top of an existing file received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has uploaded file with content "file to share" to "/sharedfile1.txt"
    And user "Brian" has shared file "/sharedfile1.txt" with group "grp1"
    And user "Alice" has accepted share "/sharedfile1.txt" offered by user "Brian"
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies folder "/FOLDER" to "/Shares/sharedfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/FOLDER/sample-folder" should exist
    And as "Alice" folder "/Shares/sharedfile1.txt/sample-folder" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder into another folder at different level which is received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with group "grp1"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b/sample-folder-c"
    When user "Alice" copies folder "Sample-Folder-A/sample-folder-b" to "Shares/BRIAN-FOLDER/second-level-folder/third-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/Sample-Folder-A/sample-folder-b/sample-folder-c" should exist
    And as "Alice" folder "/Shares/BRIAN-FOLDER/second-level-folder/third-level-folder/sample-folder-c" should exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file into a folder at different level received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with group "grp1"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "Shares/BRIAN-FOLDER/second-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-folder" should not exist
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/second-level-folder" should exist
    And the content of file "Shares/BRIAN-FOLDER/second-level-folder" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a file into a file at different level received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has uploaded file with content "file at second level" to "BRIAN-FOLDER/second-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with group "grp1"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "Shares/BRIAN-FOLDER/second-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/second-level-file.txt" should exist
    And as "Alice" file "Shares/BRIAN-FOLDER/textfile-c.txt" should not exist
    And the content of file "Shares/BRIAN-FOLDER/second-level-file.txt" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-1239
  Scenario Outline: copy a folder into a file at different level received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has uploaded file with content "file at third level" to "BRIAN-FOLDER/second-level-folder/third-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with group "grp1"
    And user "Alice" has accepted share "/BRIAN-FOLDER" offered by user "Brian"
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    When user "Alice" copies folder "FOLDER/second-level-folder" to "Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt" should exist
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should exist
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/third-level-file.txt/third-level-folder" should exist
    And as "Alice" folder "Shares/BRIAN-FOLDER/second-level-folder/second-level-folder" should not exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /Shares/BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: copy a file of size zero byte
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/zerobyte.txt" to "/zerobyte.txt"
    And user "Alice" has created folder "/testZeroByte"
    When user "Alice" copies file "/zerobyte.txt" to "/testZeroByte/zerobyte.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/testZeroByte/zerobyte.txt" should exist
    And as "Alice" file "/zerobyte.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copy file into a nonexistent folder
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToCopy.txt"
    When user "Alice" copies file "/fileToCopy.txt" to "/not-existing-folder/fileToCopy.txt" using the WebDAV API
    Then the HTTP status code should be "409"
    And as "Alice" file "/fileToCopy.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copy a nonexistent file into a folder
    Given using <dav_version> DAV path
    When user "Alice" copies file "/doesNotExist.txt" to "/FOLDER/doesNotExist.txt" using the WebDAV API
    Then the HTTP status code should be "404"
    And as "Alice" file "/FOLDER/doesNotExist.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copy a folder into a nonexistent one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    When user "Alice" copies folder "/testshare" to "/not-existing/testshare" using the WebDAV API
    Then the HTTP status code should be "409"
    And user "Alice" should see the following elements
      | /testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file into a shared folder as the sharee
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Alice" copies file "/textfile0.txt" to "/Shares/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/Shares/testshare/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    And the content of file "/testshare/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file into a shared folder as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Brian" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/Shares/testshare/textfile0.txt" for user "Alice" should be "ownCloud test text file 0"
    And the content of file "/testshare/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file out of a shared folder as the sharee
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    And user "Alice" has uploaded file with content "ownCloud test text file inside share" to "/Shares/testshare/fileInsideShare.txt"
    When user "Alice" copies file "/Shares/testshare/fileInsideShare.txt" to "/fileInsideShare.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/fileInsideShare.txt" should exist
    And the content of file "/fileInsideShare.txt" for user "Alice" should be "ownCloud test text file inside share"
    And the content of file "/testshare/fileInsideShare.txt" for user "Brian" should be "ownCloud test text file inside share"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file out of a shared folder as the sharer
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare"
    And user "Brian" has uploaded file with content "ownCloud test text file inside share" to "/testshare/fileInsideShare.txt"
    And user "Brian" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Alice     |
    And user "Alice" has accepted share "/testshare" offered by user "Brian"
    When user "Brian" copies file "testshare/fileInsideShare.txt" to "/fileInsideShare.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/fileInsideShare.txt" should exist
    And the content of file "/Shares/testshare/fileInsideShare.txt" for user "Alice" should be "ownCloud test text file inside share"
    And the content of file "/fileInsideShare.txt" for user "Brian" should be "ownCloud test text file inside share"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copying a hidden file
    Given using <dav_version> DAV path
    And user "Alice" has uploaded the following files with content "hidden file"
      | path                    |
      | .hidden_file101         |
      | /FOLDER/.hidden_file102 |
    When user "Alice" copies file ".hidden_file101" to "/FOLDER/.hidden_file101" using the WebDAV API
    And user "Alice" copies file "/FOLDER/.hidden_file102" to ".hidden_file102" using the WebDAV API
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

  @files_sharing-app-required
  Scenario Outline: Copying a file between shares received from different users
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare0"
    And user "Brian" has uploaded file with content "content inside testshare0" to "/testshare0/testshare0.txt"
    And user "Carol" has created folder "/testshare1"
    And user "Brian" has created a share with settings
      | path        | testshare0 |
      | shareType   | user       |
      | permissions | change     |
      | shareWith   | Alice      |
    And user "Carol" has created a share with settings
      | path        | testshare1 |
      | shareType   | user       |
      | permissions | change     |
      | shareWith   | Alice      |
    And user "Alice" has accepted share "/testshare0" offered by user "Brian"
    And user "Alice" has accepted share "/testshare1" offered by user "Carol"
    When user "Alice" copies file "/Shares/testshare0/testshare0.txt" to "/Shares/testshare1/testshare0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "testshare1/testshare0.txt" should exist
    And as "Alice" file "Shares/testshare1/testshare0.txt" should exist
    And the content of file "/testshare1/testshare0.txt" for user "Carol" should be "content inside testshare0"
    And the content of file "/Shares/testshare1/testshare0.txt" for user "Alice" should be "content inside testshare0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a folder between shares received from different users
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/testshare0"
    And user "Brian" has created folder "/testshare0/folder_to_copy/"
    And user "Brian" has uploaded file with content "content inside testshare0" to "/testshare0/folder_to_copy/testshare0.txt"
    And user "Carol" has created folder "/testshare1"
    And user "Brian" has created a share with settings
      | path        | testshare0 |
      | shareType   | user       |
      | permissions | change     |
      | shareWith   | Alice      |
    And user "Carol" has created a share with settings
      | path        | testshare1 |
      | shareType   | user       |
      | permissions | change     |
      | shareWith   | Alice      |
    And user "Alice" has accepted share "/testshare0" offered by user "Brian"
    And user "Alice" has accepted share "/testshare1" offered by user "Carol"
    When user "Alice" copies file "/Shares/testshare0/folder_to_copy/" to "/Shares/testshare1/folder_to_copy/" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Carol" file "testshare1/folder_to_copy/testshare0.txt" should exist
    And as "Alice" file "/Shares/testshare1/folder_to_copy/testshare0.txt" should exist
    And the content of file "testshare1/folder_to_copy/testshare0.txt" for user "Carol" should be "content inside testshare0"
    And the content of file "/Shares/testshare1/folder_to_copy/testshare0.txt" for user "Alice" should be "content inside testshare0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Copying a file to a folder that is shared with multiple users
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Brian     |
    And user "Brian" has accepted share "/testshare" offered by user "Alice"
    And user "Alice" has created a share with settings
      | path        | testshare |
      | shareType   | user      |
      | permissions | change    |
      | shareWith   | Carol     |
    And user "Carol" has accepted share "/testshare" offered by user "Alice"
    When user "Alice" copies file "/textfile0.txt" to "/testshare/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/testshare/textfile0.txt" should exist
    And as "Carol" file "/Shares/testshare/textfile0.txt" should exist
    And the content of file "/Shares/testshare/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"
    And the content of file "/Shares/testshare/textfile0.txt" for user "Carol" should be "ownCloud test text file 0"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copy a folder into another one
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/testshare"
    And user "Alice" has created folder "/an-other-folder"
    When user "Alice" copies folder "/testshare" to "/an-other-folder/testshare" using the WebDAV API
    Then the HTTP status code should be "201"
    And user "Alice" should see the following elements
      | /testshare/ |
    And user "Alice" should see the following elements
      | /an-other-folder/testshare/ |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-3023
  Scenario Outline: Copying a folder into a sub-folder of itself
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/PARENT/CHILD"
    And user "Alice" has uploaded file with content "parent text" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "child text" to "/PARENT/CHILD/child.txt"
    When user "Alice" copies folder "/PARENT" to "/PARENT/CHILD/PARENT" using the WebDAV API
    Then the HTTP status code should be "409"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "parent text"
    And the content of file "/PARENT/CHILD/child.txt" for user "Alice" should be "child text"
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Copying a folder with a file into another folder
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/FOLDER1"
    And user "Alice" has created folder "/FOLDER2"
    And user "Alice" has uploaded file with content "Folder 1 text" to "/FOLDER1/textfile.txt"
    When user "Alice" copies folder "/FOLDER1" to "/FOLDER2/FOLDER1" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "/FOLDER2/FOLDER1" should exist
    And as "Alice" file "/FOLDER2/FOLDER1/textfile.txt" should exist
    And as "Alice" folder "/FOLDER1" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |
