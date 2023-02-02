@api @files_sharing-app-required
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: Uploading file to a user read-only share folder does not work
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | read   |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/FOLDER/textfile.txt" should not exist


  Scenario Outline: Uploading file to a group read-only share folder does not work
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | group  |
      | permissions | read   |
      | shareWith   | grp1   |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/FOLDER/textfile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Uploading file to a user upload-only share folder works
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | create |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Brian"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be:
    """
    This is a testfile.

    Cheers.
    """
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Uploading file to a group upload-only share folder works
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | group  |
      | permissions | create |
      | shareWith   | grp1   |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions for user "Brian"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be:
    """
    This is a testfile.

    Cheers.
    """
    Examples:
      | dav-path |
      | old      |
      | new      |

  @smokeTest
  Scenario Outline: Uploading file to a user read/write share folder works
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | change |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be:
    """
    This is a testfile.

    Cheers.
    """
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: Uploading file to a group read/write share folder works
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | group  |
      | permissions | change |
      | shareWith   | grp1   |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/textfile.txt" for user "Alice" should be:
    """
    This is a testfile.

    Cheers.
    """
    Examples:
      | dav-path |
      | old      |
      | new      |

  @smokeTest @skipOnGraph
  Scenario Outline: Check quota of owners parent directory of a shared file
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "0"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/myfile.txt"
    And user "Alice" has shared file "myfile.txt" with user "Brian"
    And user "Brian" has accepted share "/myfile.txt" offered by user "Alice"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/myfile.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the following headers should match these regular expressions for user "Brian"
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/myfile.txt" for user "Alice" should be:
    """
    This is a testfile.

    Cheers.
    """
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnGraph
  Scenario Outline: Uploading to a user shared folder with read/write permission when the sharer has unsufficient quota does not work
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | change |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And the quota of user "Alice" has been set to "0"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/myfile.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And as "Alice" file "/FOLDER/myfile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  
  Scenario Outline: Uploading to a group shared folder with read/write permission when the sharer has unsufficient quota does not work
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | group  |
      | permissions | change |
      | shareWith   | grp1   |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And the quota of user "Alice" has been set to "0"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/myfile.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And as "Alice" file "/FOLDER/myfile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnGraph
  Scenario Outline: Uploading to a user shared folder with upload-only permission when the sharer has insufficient quota does not work
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | user   |
      | permissions | create |
      | shareWith   | Brian  |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And the quota of user "Alice" has been set to "0"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/myfile.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And as "Alice" file "/FOLDER/myfile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @skipOnGraph
  Scenario Outline: Uploading to a group shared folder with upload-only permission when the sharer has insufficient quota does not work
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER |
      | shareType   | group  |
      | permissions | create |
      | shareWith   | grp1   |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    And the quota of user "Alice" has been set to "0"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "/Shares/FOLDER/myfile.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And as "Alice" file "/FOLDER/myfile.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @newChunking @issue-ocis-1321
  Scenario: Uploading a file in to a shared folder without edit permissions
    Given using new DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/READ_ONLY"
    And user "Alice" has created a share with settings
      | path        | /READ_ONLY |
      | shareType   | user       |
      | permissions | read       |
      | shareWith   | Brian      |
    And user "Brian" has accepted share "/READ_ONLY" offered by user "Alice"
    When user "Brian" uploads the following chunks to "/Shares/READ_ONLY/myfile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | hallo   |
      | 2      | welt    |
    Then the HTTP status code should be "403"
    And as "Alice" file "/FOLDER/myfile.txt" should not exist


  Scenario Outline: Sharer can download file uploaded with different permission by sharee to a shared folder
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created a share with settings
      | path        | FOLDER        |
      | shareType   | user          |
      | permissions | <permissions> |
      | shareWith   | Brian         |
    And user "Brian" has accepted share "/FOLDER" offered by user "Alice"
    When user "Brian" uploads file with content "some content" to "/Shares/FOLDER/textFile.txt" using the WebDAV API
    And user "Alice" downloads file "/FOLDER/textFile.txt" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded content should be "some content"
    Examples:
      | dav-path | permissions |
      | old      | change      |
      | new      | create      |


  Scenario Outline: upload an empty file (size zero byte) to a shared folder
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/folder-to-share"
    And user "Brian" has shared folder "/folder-to-share" with user "Alice"
    And user "Alice" has accepted share "/folder-to-share" offered by user "Brian"
    When user "Alice" uploads file "filesForUpload/zerobyte.txt" to "/Shares/folder-to-share/zerobyte.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/Shares/folder-to-share/zerobyte.txt" should exist
    And the content of file "/Shares/folder-to-share/zerobyte.txt" for user "Alice" should be ""
    Examples:
      | dav_version |
      | old         |
      | new         |