@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created

  @smokeTest
  Scenario Outline: Allow modification of reshare
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user2" has been created
    And user "user0" has created a folder "/TMP"
    And user "user0" has shared file "TMP" with user "user1"
    And user "user1" has shared file "TMP" with user "user2"
    When user "user1" updates the last share using the sharing API with
      | permissions | 1 |
    Then the OCS status code should be "<ocs_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share, updating its expiration date and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | expireDate | +3 days |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 3                    |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | 1                    |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share with password and adding an expiration date
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path     | welcome.txt |
      | password | %public%    |
    And the user updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last public shared file should be able to be downloaded with password "%public%"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share, updating its expiration date and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | expireDate | +3 days |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 3                    |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | 1                    |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share, updating its password and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | password | %public% |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 3                    |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | 1                    |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share, updating its permissions and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | permissions | 7 |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 3                    |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | 15                   |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Creating a new public link share, updating publicUpload option and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | publicUpload | true |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 3                    |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | 15                   |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: keep group permissions in sync
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    And user "user1" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
    And as user "user0"
    When the user updates the last share using the sharing API with
      | permissions | 1 |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                | A_NUMBER       |
      | item_type         | file           |
      | item_source       | A_NUMBER       |
      | share_type        | 1              |
      | file_source       | A_NUMBER       |
      | file_target       | /textfile0.txt |
      | permissions       | 1              |
      | stime             | A_NUMBER       |
      | storage           | A_NUMBER       |
      | mail_send         | 0              |
      | uid_owner         | user0          |
      | file_parent       | A_NUMBER       |
      | displayname_owner | User Zero      |
      | mimetype          | text/plain     |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    And as user "user1"
    And the user has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When the user updates the last share using the sharing API with
      | publicUpload | true |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Cannot set permissions to zero
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user0" has shared folder "/FOLDER" with group "grp1"
    When user "user0" updates the last share using the sharing API with
      | permissions | 0 |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |

  Scenario: Share ownership change after moving a shared file outside of an outer share
    Given user "user1" has been created
    And user "user2" has been created
    And user "user0" has created a folder "/folder1"
    And user "user0" has created a folder "/folder1/folder2"
    And user "user1" has created a folder "/moved-out"
    And user "user0" has shared folder "/folder1" with user "user1" with permissions 31
    And user "user1" has shared folder "/folder1/folder2" with user "user2" with permissions 31
    When user "user1" moves folder "/folder1/folder2" to "/moved-out/folder2" using the WebDAV API
    And user "user1" gets the info of the last share using the sharing API
    Then the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 0                    |
      | file_source       | A_NUMBER             |
      | file_target       | /folder2             |
      | permissions       | 31                   |
      | stime             | A_NUMBER             |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user1                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User One             |
      | mimetype          | httpd/unix-directory |
    And as "user0" the folder "/folder1/folder2" should not exist
    And as "user2" the folder "/folder2" should exist

  Scenario: Share ownership change after moving a shared file to another share
    Given user "user1" has been created
    And user "user2" has been created
    And user "user0" has created a folder "/user0-folder"
    And user "user0" has created a folder "/user0-folder/folder2"
    And user "user2" has created a folder "/user2-folder"
    And user "user0" has shared folder "/user0-folder" with user "user1" with permissions 31
    And user "user2" has shared folder "/user2-folder" with user "user1" with permissions 31
    When user "user1" moves folder "/user0-folder/folder2" to "/user2-folder/folder2" using the WebDAV API
    And user "user1" gets the info of the last share using the sharing API
    Then the share fields of the last share should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | 0                    |
      | file_source       | A_NUMBER             |
      | file_target       | /user2-folder        |
      | permissions       | 31                   |
      | stime             | A_NUMBER             |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | user2                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Two             |
      | mimetype          | httpd/unix-directory |
    And as "user0" the folder "/user0-folder/folder2" should not exist
    And as "user2" the folder "/user2-folder/folder2" should exist

  @public_link_share-feature-required
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 31
    And as user "user1"
    And the user has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When the user updates the last share using the sharing API with
      | publicUpload | true |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    And as user "user1"
    And the user has created a public link share with settings
      | path        | /test |
      | permissions | 1     |
    When the user updates the last share using the sharing API with
      | permissions | 15 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 31
    And as user "user1"
    And the user has created a public link share with settings
      | path        | /test |
      | permissions | 1     |
    When the user updates the last share using the sharing API with
      | permissions | 15 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Increasing permissions is allowed for owner
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created
    And user "user2" has been created
    And group "grp1" has been created
    And user "user2" has been added to group "grp1"
    And user "user1" has been added to group "grp1"
    And as user "user2"
    And the user has shared folder "/FOLDER" with group "grp1"
    And the user has updated the last share with
      | permissions | 1 |
    When the user updates the last share using the sharing API with
      | permissions | 31 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |