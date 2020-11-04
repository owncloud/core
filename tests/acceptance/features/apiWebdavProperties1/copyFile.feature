@api
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
  @issue-ocis-reva-11
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
  @issue-ocis-reva-11
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

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a file over the top of an existing folder received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/BRIAN-Folder"
    And user "Brian" has created folder "BRIAN-Folder/sample-folder"
    And user "Brian" has shared folder "BRIAN-Folder" with user "Alice"
    When user "Alice" copies file "/textfile1.txt" to "/BRIAN-Folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/BRIAN-Folder" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" folder "/BRIAN-Folder/sample-folder" should not exist
    And as "Alice" file "/textfile1.txt" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a folder over the top of an existing file received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "file to share" to "/sharedfile1.txt"
    And user "Brian" has shared file "/sharedfile1.txt" with user "Alice"
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies folder "/FOLDER" to "/sharedfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/FOLDER/sample-folder" should exist
    And as "Alice" folder "/sharedfile1.txt/sample-folder" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a folder into another folder at different level which is received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b/sample-folder-c"
    When user "Alice" copies folder "Sample-Folder-A/sample-folder-b" to "BRIAN-FOLDER/second-level-folder/third-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/Sample-Folder-A/sample-folder-b/sample-folder-c" should exist
    And as "Alice" folder "/BRIAN-FOLDER/second-level-folder/third-level-folder/sample-folder-c" should exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a file into a folder at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder/third-level-folder"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "BRIAN-FOLDER/second-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-folder" should not exist
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/second-level-folder" should exist
    And the content of file "BRIAN-FOLDER/second-level-folder" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a file into a file at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has uploaded file with content "file at second level" to "BRIAN-FOLDER/second-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "BRIAN-FOLDER/second-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/second-level-file.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/textfile-c.txt" should not exist
    And the content of file "BRIAN-FOLDER/second-level-file.txt" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-243 @issue-ocis-reva-387
  Scenario Outline: copy a folder into a file at different level received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has created folder "BRIAN-FOLDER/second-level-folder"
    And user "Brian" has uploaded file with content "file at third level" to "BRIAN-FOLDER/second-level-folder/third-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with user "Alice"
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    When user "Alice" copies folder "FOLDER/second-level-folder" to "BRIAN-FOLDER/second-level-folder/third-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-file.txt" should exist
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should exist
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-file.txt/third-level-folder" should exist
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/second-level-folder" should not exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
  Scenario Outline: copy a file over the top of an existing folder received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "/BRIAN-Folder"
    And user "Brian" has created folder "BRIAN-Folder/sample-folder"
    And user "Brian" has shared folder "BRIAN-Folder" with group "grp1"
    When user "Alice" copies file "/textfile1.txt" to "/BRIAN-Folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/BRIAN-Folder" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" folder "/BRIAN-Folder/sample-folder" should not exist
    And as "Alice" file "/textfile1.txt" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
  Scenario Outline: copy a folder over the top of an existing file received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has uploaded file with content "file to share" to "/sharedfile1.txt"
    And user "Brian" has shared file "/sharedfile1.txt" with group "grp1"
    And user "Alice" has created folder "FOLDER/sample-folder"
    When user "Alice" copies folder "/FOLDER" to "/sharedfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/FOLDER/sample-folder" should exist
    And as "Alice" folder "/sharedfile1.txt/sample-folder" should exist
    And user "Alice" should not have any received shares
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
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
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b/sample-folder-c"
    When user "Alice" copies folder "Sample-Folder-A/sample-folder-b" to "BRIAN-FOLDER/second-level-folder/third-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/Sample-Folder-A/sample-folder-b/sample-folder-c" should exist
    And as "Alice" folder "/BRIAN-FOLDER/second-level-folder/third-level-folder/sample-folder-c" should exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
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
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "BRIAN-FOLDER/second-level-folder" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-folder" should not exist
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/second-level-folder" should exist
    And the content of file "BRIAN-FOLDER/second-level-folder" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
  Scenario Outline: copy a file into a file at different level received as a group share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has created folder "BRIAN-FOLDER"
    And user "Brian" has uploaded file with content "file at second level" to "BRIAN-FOLDER/second-level-file.txt"
    And user "Brian" has shared folder "BRIAN-FOLDER" with group "grp1"
    And user "Alice" has created folder "Sample-Folder-A"
    And user "Alice" has created folder "Sample-Folder-A/sample-folder-b"
    And user "Alice" has uploaded file with content "sample file-c" to "Sample-Folder-A/sample-folder-b/textfile-c.txt"
    When user "Alice" copies file "Sample-Folder-A/sample-folder-b/textfile-c.txt" to "BRIAN-FOLDER/second-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "Sample-Folder-A/sample-folder-b/textfile-c.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/second-level-file.txt" should exist
    And as "Alice" file "BRIAN-FOLDER/textfile-c.txt" should not exist
    And the content of file "BRIAN-FOLDER/second-level-file.txt" for user "Alice" should be "sample file-c"
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-34 @issue-ocis-reva-387
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
    And user "Alice" has created folder "FOLDER/second-level-folder"
    And user "Alice" has created folder "FOLDER/second-level-folder/third-level-folder"
    When user "Alice" copies folder "FOLDER/second-level-folder" to "BRIAN-FOLDER/second-level-folder/third-level-file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-file.txt" should exist
    And as "Alice" folder "FOLDER/second-level-folder/third-level-folder" should exist
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/third-level-file.txt/third-level-folder" should exist
    And as "Alice" folder "BRIAN-FOLDER/second-level-folder/second-level-folder" should not exist
    And the response when user "Alice" gets the info of the last share should include
      | file_target | /BRIAN-FOLDER |
    Examples:
      | dav_version |
      | old         |
      | new         |
