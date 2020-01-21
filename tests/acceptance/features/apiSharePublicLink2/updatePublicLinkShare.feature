@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @public_link_share-feature-required
Feature: update a public link share

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

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
    And the fields of the last response should include
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
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share with password and adding an expiration date
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path     | randomfile.txt |
      | password | %public%       |
    And user "user0" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download the last publicly shared file using the old public WebDAV API with password "%public%" and the content should be "user0 file"
    And the public should be able to download the last publicly shared file using the new public WebDAV API with password "%public%" and the content should be "user0 file"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

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
    And the fields of the last response should include
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
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

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
    And the fields of the last response should include
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
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its permissions and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
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
      | uid_owner         | user0                     |
      | file_parent       | A_NUMBER                  |
      | displayname_owner | User Zero                 |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share, updating its permissions to view download and upload and getting its info
    Given using OCS API version "<ocs_api_version>"
    And as user "user0"
    When the user creates a public link share using the sharing API with settings
      | path | FOLDER |
    And the user updates the last share using the sharing API with
      | permissions | read,update,create |
    And the user gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
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
      | uid_owner         | user0                |
      | file_parent       | A_NUMBER             |
      | displayname_owner | User Zero            |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

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
    And the fields of the last response should include
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
      | uid_owner         | user0                     |
      | file_parent       | A_NUMBER                  |
      | displayname_owner | User Zero                 |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions "share,read"
    And as user "user1"
    And the user has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When the user updates the last share using the sharing API with
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
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions "all"
    And as user "user1"
    And the user has created a public link share with settings
      | path         | /test |
      | publicUpload | false |
    When the user updates the last share using the sharing API with
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
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions "share,read"
    And as user "user1"
    And the user has created a public link share with settings
      | path        | /test |
      | permissions | read  |
    When the user updates the last share using the sharing API with
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
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions "all"
    And as user "user1"
    And the user has created a public link share with settings
      | path        | /test |
      | permissions | read  |
    When the user updates the last share using the sharing API with
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
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When user "user0" updates the last share using the sharing API with
      | permissions | read,update,create |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "user0" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | permissions | read,update,create |
    When the public deletes file "CHILD/child.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "403"
    When the public deletes file "CHILD/child.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "PARENT/CHILD/child.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Updating share permissions from read/update/create to change allows public to delete files
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When user "user0" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "user0" gets the info of the last share using the sharing API
    Then the fields of the last response should include
      | permissions | read,update,create,delete |
    When the public deletes file "CHILD/child.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" file "PARENT/CHILD/child.txt" should not exist
    When the public deletes file "parent.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" file "PARENT/parent.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
