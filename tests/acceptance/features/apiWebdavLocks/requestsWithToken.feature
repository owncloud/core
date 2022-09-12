@api @issue-ocis-reva-172
Feature: actions on a locked item are possible if the token is sent with the request

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @notToImplementOnOCIS
  Scenario Outline: rename a file in a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" moves file "/PARENT/parent.txt" to "/PARENT/renamed-file.txt" sending the locktoken of folder "PARENT" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/parent.txt" should not exist
    But as "Alice" file "/PARENT/renamed-file.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @smokeTest @notToImplementOnOCIS
  Scenario Outline: move a file into a locked folder
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" moves file "/PARENT/parent.txt" to "/FOLDER/moved-file.txt" sending the locktoken of folder "FOLDER" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/parent.txt" should not exist
    But as "Alice" file "/FOLDER/moved-file.txt" should exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @smokeTest @notToImplementOnOCIS
  Scenario Outline: move a file into a locked folder is impossible when using the wrong token
    Given using <dav-path> DAV path
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    When user "Alice" moves file "/PARENT/parent.txt" to "/FOLDER/moved-file.txt" sending the locktoken of folder "PARENT/CHILD" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/parent.txt" should exist
    But as "Alice" file "/FOLDER/moved-file.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @skipOnOcV10 @issue-34338 @files_sharing-app-required @notToImplementOnOCIS
  Scenario Outline: share receiver cannot rename a file in a folder locked by the owner even when sending the locktoken
    Given using <dav-path> DAV path
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/parent.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When user "Brian" moves file "Shares/PARENT/parent.txt" to "Shares/PARENT/renamed-file.txt" sending the locktoken of file "PARENT" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "423"
    And as "Alice" file "/PARENT/parent.txt" should exist
    But as "Alice" file "/PARENT/renamed-file.txt" should not exist
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  @files_sharing-app-required @notToImplementOnOCIS
  Scenario Outline: public cannot overwrite a file in a folder locked by the owner even when sending the locktoken
    Given user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file with content "ownCloud test text file parent" to "PARENT/parent.txt"
    And user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" sending the locktoken of file "PARENT" of user "Alice" using the <webdav_api_version> public WebDAV API
    Then the HTTP status code should be "<http_status_code>"
    And the content of file "/PARENT/parent.txt" for user "Alice" should be "ownCloud test text file parent"
    Examples:
      | lock-scope | webdav_api_version | http_status_code |
      | shared     | old                | 423              |
      | exclusive  | old                | 423              |

    @skipOnOcV10.6 @skipOnOcV10.7
    Examples:
      | lock-scope | webdav_api_version | http_status_code |
      | shared     | new                | 423              |
      | exclusive  | new                | 423              |

  @skipOnOcV10 @issue-34360 @files_sharing-app-required
  Scenario Outline: two users having both a shared lock can use the resource
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "textfile0.txt"
    And user "Brian" has uploaded file with content "some data" to "textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Alice" has locked file "textfile0.txt" setting the following properties
      | lockscope | shared |
    And user "Brian" has locked file "Shares/textfile0.txt" setting the following properties
      | lockscope | shared |
    When user "Alice" uploads file with content "from user 0" to "textfile0.txt" sending the locktoken of file "textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "textfile0.txt" for user "Alice" should be "from user 0"
    And the content of file "Shares/textfile0.txt" for user "Brian" should be "from user 0"
    When user "Brian" uploads file with content "from user 1" to "Shares/textfile0.txt" sending the locktoken of file "Shares/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "textfile0.txt" for user "Alice" should be "from user 1"
    And the content of file "Shares/textfile0.txt" for user "Brian" should be "from user 1"
    Examples:
      | dav-path |
      | old      |
      | new      |

    @personalSpace
    Examples:
      | dav-path |
      | spaces   |
