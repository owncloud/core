@api @files_sharing-app-required @public_link_share-feature-required @skipOnOcis-EOS-Storage @issue-ocis-reva-315 @issue-ocis-reva-316

Feature: create a public link share

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @smokeTest @skipOnOcis
  Scenario Outline: Creating a new public link share of a file, the default permissions are read (1) using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | randomfile.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    When the public downloads the last public shared file with range "bytes=0-9" using the old public WebDAV API
    Then the downloaded content should be "Random dat"
    And the public upload to the last publicly shared file using the old public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-12
  Scenario Outline: Creating a new public link share of a file, the default permissions are read (1) using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | randomfile.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    When the public downloads the last public shared file with range "bytes=0-9" using the new public WebDAV API
    Then the downloaded content should be "Random dat"
    And the public upload to the last publicly shared file using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcis
  Scenario Outline: Creating a new public link share of a file with password using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path     | randomfile.txt |
      | password | %public%       |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    And the public should be able to download the last publicly shared file using the old public WebDAV API with password "%public%" and the content should be "Random data"
    And the HTTP status code should be "200"
    And the public download of the last publicly shared file using the old public WebDAV API with password "%regular%" should fail with HTTP status code "401"
    And the value of the item "//s:message" in the response should be "Cannot authenticate over ajax calls"
    And the public download of the last publicly shared file using the old public WebDAV API without a password should fail with HTTP status code "401"
    And the value of the item "//s:message" in the response should be "Cannot authenticate over ajax calls"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcis @issue-ocis-reva-199
  Scenario Outline: Creating a new public link share of a file with password using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path     | randomfile.txt |
      | password | %public%       |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    And the public should be able to download the last publicly shared file using the new public WebDAV API with password "%public%" and the content should be "Random data"
    And the HTTP status code should be "200"
    And the public download of the last publicly shared file using the new public WebDAV API with password "%regular%" should fail with HTTP status code "401"
    And the value of the item "//s:message" in the response should match "/Username or password was incorrect/"
    And the public download of the last publicly shared file using the new public WebDAV API without a password should fail with HTTP status code "401"
    And the value of the item "//s:message" in the response should match "/No 'Authorization: Basic' header found/"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Trying to create a new public link share of a file with edit permissions results in a read-only share using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | randomfile.txt |
      | permissions | all            |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    And the public should be able to download the last publicly shared file using the old public WebDAV API without a password and the content should be "Random data"
    And the public upload to the last publicly shared file using the old public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-292
  Scenario Outline: Trying to create a new public link share of a file with edit permissions results in a read-only share using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | randomfile.txt |
      | permissions | all            |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file            |
      | mimetype               | text/plain      |
      | file_target            | /randomfile.txt |
      | path                   | /randomfile.txt |
      | permissions            | read            |
      | share_type             | public_link     |
      | displayname_file_owner | %displayname%   |
      | displayname_owner      | %displayname%   |
      | uid_file_owner         | %username%      |
      | uid_owner              | %username%      |
      | name                   |                 |
    And the public should be able to download the last publicly shared file using the new public WebDAV API without a password and the content should be "Random data"
    And the public upload to the last publicly shared file using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Creating a new public link share of a folder, the default permissions are read (1) and can be accessed with no password or any password using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file with content "Random data" to "/PARENT/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | PARENT |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | file_target            | /PARENT              |
      | path                   | /PARENT              |
      | permissions            | read                 |
      | share_type             | public_link          |
      | displayname_file_owner | %displayname%        |
      | displayname_owner      | %displayname%        |
      | uid_file_owner         | %username%           |
      | uid_owner              | %username%           |
      | name                   |                      |
    When the public downloads file "/randomfile.txt" from inside the last public shared folder with range "bytes=1-7" using the old public WebDAV API
    Then the downloaded content should be "andom d"
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the old public WebDAV API with password "%regular%"
    And the downloaded content should be "Random data"
    And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-12
  Scenario Outline: Creating a new public link share of a folder, the default permissions are read (1) and can be accessed with no password or any password using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file with content "Random data" to "/PARENT/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | PARENT |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | file_target            | /PARENT              |
      | path                   | /PARENT              |
      | permissions            | read                 |
      | share_type             | public_link          |
      | displayname_file_owner | %displayname%        |
      | displayname_owner      | %displayname%        |
      | uid_file_owner         | %username%           |
      | uid_owner              | %username%           |
      | name                   |                      |
    When the public downloads file "/randomfile.txt" from inside the last public shared folder with range "bytes=2-7" using the new public WebDAV API
    Then the downloaded content should be "ndom d"
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the new public WebDAV API with password "%regular%"
    And the downloaded content should be "Random data"
    And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Creating a new public link share of a folder, with a password using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/PARENT/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | PARENT   |
      | password    | %public% |
      | permissions | change   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | file_target            | /PARENT              |
      | path                   | /PARENT              |
      | permissions            | change               |
      | share_type             | public_link          |
      | displayname_file_owner | %displayname%        |
      | displayname_owner      | %displayname%        |
      | uid_file_owner         | %username%           |
      | uid_owner              | %username%           |
      | name                   |                      |
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the old public WebDAV API with password "%public%"
    And the downloaded content should be "Random data"
    But the public should not be able to download file "/randomfile.txt" from inside the last public shared folder using the old public WebDAV API without a password
    And the public should not be able to download file "/randomfile.txt" from inside the last public shared folder using the old public WebDAV API with password "%regular%"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-292
  Scenario Outline: Creating a new public link share of a folder, with a password using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/PARENT/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | PARENT   |
      | password    | %public% |
      | permissions | change   |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | file_target            | /PARENT              |
      | path                   | /PARENT              |
      | permissions            | change               |
      | share_type             | public_link          |
      | displayname_file_owner | %displayname%        |
      | displayname_owner      | %displayname%        |
      | uid_file_owner         | %username%           |
      | uid_owner              | %username%           |
      | name                   |                      |
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the new public WebDAV API with password "%public%"
    And the downloaded content should be "Random data"
    And the public should not be able to download file "/randomfile.txt" from inside the last public shared folder using the new public WebDAV API without a password
    And the public should not be able to download file "/randomfile.txt" from inside the last public shared folder using the new public WebDAV API with password "%regular%"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @issue-ocis-reva-294
  Scenario Outline: Getting the share information of public link share from the OCS API does not expose sensitive information
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path     | welcome.txt |
      | password | %public%    |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | file_target            | /welcome.txt   |
      | path                   | /welcome.txt   |
      | item_type              | file           |
      | share_type             | public_link    |
      | permissions            | read           |
      | uid_owner              | Alice          |
      | share_with             | ***redacted*** |
      | share_with_displayname | ***redacted*** |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Getting the share information of passwordless public-links hides credential placeholders
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | welcome.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | file_target | /welcome.txt |
      | path        | /welcome.txt |
      | item_type   | file         |
      | share_type  | public_link  |
      | permissions | read         |
      | uid_owner   | %username%   |
    And the fields of the last response should not include
      | share_with             | ANY_VALUE |
      | share_with_displayname | ANY_VALUE |

    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Creating a link share with no specified permissions defaults to read permissions when public upload disabled globally using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /afolder |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING    |
      | share_type  | public_link |
      | permissions | read        |
    And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a link share with no specified permissions defaults to read permissions when public upload disabled globally using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /afolder |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING    |
      | share_type  | public_link |
      | permissions | read        |
    And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-36442 @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a public link share with read+create permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder    |
      | permissions | read,create |
    # And the fields of the last response to user "Alice" should include
    #  | id          | A_STRING    |
    #  | share_type  | public_link |
    #  | permissions | read        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "Public upload not allowed"
    # And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    # And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      #| 1               | 100             | 200              |
      | 2               | 403             | 403              |
      #| 2               | 200             | 200              |

  @issue-36442 @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a public link share with create permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder |
      | permissions | create   |
    # And the fields of the last response to user "Alice" should include
    #  | id          | A_STRING    |
    #  | share_type  | public_link |
    #  | permissions | read        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "Public upload disabled by the administrator"
    # And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    # And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      #| 1               | 100             | 200              |
      | 2               | 403             | 403              |
      #| 2               | 200             | 200              |

  @issue-36442 @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a public link share with read+create permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    And user "Alice" has created a public link share with settings
      | path        | /afolder |
      | permissions | read     |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When user "Alice" tries to update the last share using the sharing API with
      | permissions | read,create |
    # And the fields of the last response to user "Alice" should include
    #  | id          | A_STRING    |
    #  | share_type  | public_link |
    #  | permissions | read        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "Public upload not allowed"
    # And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    # And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 400             | 200              |
      #| 1               | 100             | 200              |
      | 2               | 400             | 400              |
      #| 2               | 200             | 200              |

  @issue-36442 @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a public link share with read+create permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    And user "Alice" has created a public link share with settings
      | path        | /afolder |
      | permissions | read     |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When user "Alice" tries to update the last share using the sharing API with
      | permissions | <permission> |
    # And the fields of the last response to user "Alice" should include
    #  | id          | A_STRING    |
    #  | share_type  | public_link |
    #  | permissions | read        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "Public upload disabled by the administrator"
    # And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    # And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | permission                |
      | 1               | 403             | 200              | create                    |
      #| 1               | 100             | 200              | create                     |
      | 2               | 403             | 403              | create                    |
      #| 2               | 200             | 200              | create                     |
      | 1               | 403             | 200              | create,read,update        |
      #| 1               | 100             | 200              | create,read,update         |
      | 2               | 403             | 403              | create,read,update        |
      #| 2               | 200             | 200              | create,read,update         |
      | 1               | 403             | 200              | read,create,update,delete |
      #| 1               | 100             | 200              | read,create,update,delete  |
      | 2               | 403             | 403              | read,create,update,delete |
      #| 2               | 200             | 200              | read,create,update,delete  |

  @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a link share with read+update+create permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder           |
      | permissions | read,update,create |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING    |
      | share_type  | public_link |
      | permissions | read        |
    And the public upload to the last publicly shared folder using the old public WebDAV API should fail with HTTP status code "403"
    And the public upload to the last publicly shared folder using the new public WebDAV API should fail with HTTP status code "403"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Creating a link share with update permissions defaults to read permissions when public upload disabled globally
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder                  |
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the last response should be empty
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  @skipOnOcis
  Scenario Outline: Creating a link share with edit permissions keeps it using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder                  |
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING                  |
      | share_type  | public_link               |
      | permissions | read,update,create,delete |
    And uploading a file should work using the old public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a link share with edit permissions keeps it using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder                  |
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING                  |
      | share_type  | public_link               |
      | permissions | read,update,create,delete |
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Creating a link share with upload permissions keeps it using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder    |
      | permissions | read,create |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING    |
      | share_type  | public_link |
      | permissions | read,create |
    And uploading a file should work using the old public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a link share with upload permissions keeps it using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/afolder"
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /afolder    |
      | permissions | read,create |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id          | A_STRING    |
      | share_type  | public_link |
      | permissions | read,create |
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-283
  Scenario Outline: Do not allow public sharing of the root
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | / |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  @skipOnOcis
  Scenario Outline: user creates a public link share of a file with file name longer than 64 chars using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "long file" to "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download the last publicly shared file using the old public WebDAV API without a password and the content should be "long file"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user creates a public link share of a file with file name longer than 64 chars using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "long file" to "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download the last publicly shared file using the new public WebDAV API without a password and the content should be "long file"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: user creates a public link share of a folder with folder name longer than 64 chars using the old public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "Alice" has uploaded file with content "Random data" to "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the old public WebDAV API
    And the downloaded content should be "Random data"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user creates a public link share of a folder with folder name longer than 64 chars using the new public WebDAV API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "Alice" has uploaded file with content "Random data" to "/aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | /aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download file "/randomfile.txt" from inside the last public shared folder using the new public WebDAV API
    And the downloaded content should be "Random data"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-41
  Scenario Outline: Create a public link with default expiration date set and max expiration date enforced
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | randomfile.txt |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | file_target | /randomfile.txt |
      | path        | /randomfile.txt |
      | item_type   | file            |
      | share_type  | public_link     |
      | permissions | read            |
      | uid_owner   | %username%      |
      | expiration  | +7 days         |
    When user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And the fields of the last response to user "Alice" should include
      | file_target | /randomfile.txt |
      | path        | /randomfile.txt |
      | item_type   | file            |
      | share_type  | public_link     |
      | permissions | read            |
      | uid_owner   | %username%      |
      | expiration  | +7 days         |
    And the public should be able to download the last publicly shared file using the old public WebDAV API without a password and the content should be "Random data"
    And the public should be able to download the last publicly shared file using the new public WebDAV API without a password and the content should be "Random data"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 100             | 200              |
      | 2               | 200             | 200              |

  @skipOnOcis @issue-ocis-reva-199
  Scenario: Deleting a folder that has been publicly shared
    Given user "Alice" has created a public link share with settings
      | path        | PARENT |
      | permissions | read   |
    When user "Alice" deletes folder "PARENT" using the WebDAV API
    Then the public download of file "/parent.txt" from inside the last public shared folder using the old public WebDAV API should fail with HTTP status code "404"
    And the public download of file "/parent.txt" from inside the last public shared folder using the new public WebDAV API should fail with HTTP status code "404"

  @skipOnOcis @issue-ocis-reva-292
  Scenario: try to download from a public share that has upload only permissions
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has created a public link share with settings
      | path        | PARENT          |
      | permissions | uploadwriteonly |
    When the public downloads file "parent.txt" from inside the last public shared folder using the new public WebDAV API
    Then the value of the item "//s:message" in the response should be "File not found: parent.txt"
    And the HTTP status code should be "404"
    When the public downloads file "parent.txt" from inside the last public shared folder using the old public WebDAV API
    Then the value of the item "//s:message" in the response should be ""
    And the HTTP status code should be "404"

  @skipOnOcV10.3
  Scenario: Get the size of a file shared by public link
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file with content "This is a test file" to "test-file.txt"
    And user "Alice" has created a public link share with settings
      | path        | test-file.txt |
      | permissions | read          |
    When the public gets the size of the last shared public link using the WebDAV API
    Then the HTTP status code should be "207"
    And the size of the file should be "19"

  Scenario Outline: Get the mtime of a file shared by public link
    Given using <dav_version> DAV path
    And user "Alice" has uploaded a file to "file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | file.txt |
      | permissions | read     |
    Then the HTTP status code should be "200"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Get the mtime of a file inside a folder shared by public link
    Given using <dav_version> DAV path
    And user "Alice" has created folder "testFolder"
    And user "Alice" has uploaded a file to "testFolder/file.txt" with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the WebDAV API
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | /testFolder |
      | permissions | read        |
    Then the HTTP status code should be "200"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-37605
  #after fixing all issues make this scenario like the one in OCIS, and delete the one in OCIS
  Scenario: Get the mtime of a file inside a folder shared by public link using new webDAV version
    Given user "Alice" has created folder "testFolder"
    And user "Alice" has created a public link share with settings
      | path        | /testFolder               |
      | permissions | read,update,create,delete |
    When the public uploads file "file.txt" to the last shared folder with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the new public WebDAV API
    Then as "Alice" file "testFolder/file.txt" should exist
    And as "Alice" the mtime of the file "testFolder/file.txt" should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And as "Alice" the mtime of the file "testFolder/file.txt" should be "Thu, 08 Aug 2019 04:18:13 GMT"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"

  @skipOnOcis @issue-37605
  #after fixing all issues make this scenario like the one in OCIS, and delete the one in OCIS
  Scenario: overwriting a file changes its mtime (new public webDAV API)
    Given user "Alice" has created folder "testFolder"
    When user "Alice" uploads file with content "uploaded content for file name ending with a dot" to "testFolder/file.txt" using the WebDAV API
    And user "Alice" has created a public link share with settings
      | path        | /testFolder |
      | permissions | read,update,create,delete |
    And the public uploads file "file.txt" to the last shared folder with mtime "Thu, 08 Aug 2019 04:18:13 GMT" using the new public WebDAV API
    Then as "Alice" file "/testFolder/file.txt" should exist
    And as "Alice" the mtime of the file "testFolder/file.txt" should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And as "Alice" the mtime of the file "testFolder/file.txt" should be "Thu, 08 Aug 2019 04:18:13 GMT"
    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should not be "Thu, 08 Aug 2019 04:18:13 GMT"
#    And the mtime of file "file.txt" in the last shared public link using the WebDAV API should be "Thu, 08 Aug 2019 04:18:13 GMT"
