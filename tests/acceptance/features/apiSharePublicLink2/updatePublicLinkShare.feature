@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @public_link_share-feature-required @skipOnOcis @issue-ocis-reva-49
Feature: update a public link share

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: Creating a new public link share, updating its expiration date and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | expireDate | +3 days |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | public_link          |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | Alice                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share with password and adding an expiration date
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path     | randomfile.txt |
      | password | %public%       |
    And user "Alice" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download the last publicly shared file using the old public WebDAV API with password "%public%" and the content should be "Random data"
    And the public should be able to download the last publicly shared file using the new public WebDAV API with password "%public%" and the content should be "Random data"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its expiration date and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | expireDate | +3 days |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | public_link          |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | Alice                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its password and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | password | %public% |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | public_link          |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | Alice                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its permissions and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER                  |
      | item_type         | folder                    |
      | item_source       | A_NUMBER                  |
      | share_type        | public_link               |
      | file_source       | A_NUMBER                  |
      | file_target       | /FOLDER                   |
      | permissions       | read,update,create,delete |
      | stime             | A_NUMBER                  |
      | token             | A_TOKEN                   |
      | storage           | A_NUMBER                  |
      | mail_send         | 0                         |
      | uid_owner         | Alice                     |
      | file_parent       | A_NUMBER                  |
      | displayname_owner | %displayname%             |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its permissions to view download and upload and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER             |
      | item_type         | folder               |
      | item_source       | A_NUMBER             |
      | share_type        | public_link          |
      | file_source       | A_NUMBER             |
      | file_target       | /FOLDER              |
      | permissions       | read,update,create   |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_NUMBER             |
      | mail_send         | 0                    |
      | uid_owner         | Alice                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating publicUpload option and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | publicUpload | true |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_NUMBER                  |
      | item_type         | folder                    |
      | item_source       | A_NUMBER                  |
      | share_type        | public_link               |
      | file_source       | A_NUMBER                  |
      | file_target       | /FOLDER                   |
      | permissions       | read,update,create,delete |
      | stime             | A_NUMBER                  |
      | token             | A_TOKEN                   |
      | storage           | A_NUMBER                  |
      | mail_send         | 0                         |
      | uid_owner         | Alice                     |
      | file_parent       | A_NUMBER                  |
      | displayname_owner | %displayname%             |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "share,read"
    And user "Brian" has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When user "Brian" updates the last share using the sharing API with
      | publicUpload | true |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And uploading a file should not work using the old public WebDAV API
    And uploading a file should not work using the new public WebDAV API
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "all"
    And user "Brian" has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When user "Brian" updates the last share using the sharing API with
      | publicUpload | true |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And uploading a file should work using the old public WebDAV API
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "share,read"
    And user "Brian" has created a public link share with settings
      | path        | /test |
      | permissions | read  |
    When user "Brian" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And uploading a file should not work using the old public WebDAV API
    And uploading a file should not work using the new public WebDAV API
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has shared folder "/test" with user "Brian" with permissions "all"
    And user "Brian" has created a public link share with settings
      | path        | /test |
      | permissions | read  |
    When user "Brian" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And uploading a file should work using the old public WebDAV API
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Updating share permissions from change to read/update/create restricts public from deleting files
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read,update,create |
    When the public deletes file "CHILD/child.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "403"
    When the public deletes file "CHILD/child.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "PARENT/CHILD/child.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Updating share permissions from read/update/create to change allows public to delete files
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read,update,create,delete |
    When the public deletes file "CHILD/child.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/CHILD/child.txt" should not exist
    When the public deletes file "parent.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/parent.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
