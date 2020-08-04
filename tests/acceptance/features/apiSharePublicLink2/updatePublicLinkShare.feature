@api @files_sharing-app-required @public_link_share-feature-required @issue-ocis-reva-252
Feature: update a public link share

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @toFixOnOcV10 @issue-ocis-reva-243 @issue-ocis-reva-349 @issue-37653
  #after fixing all the issues merge this scenario with the one below
  Scenario Outline: API responds with a full set of parameters when owner changes the expireDate of a public share
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs_status_code>"
    And the OCS status message should be ""
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                         | A_STRING             |
      | share_type                 | public_link          |
      | uid_owner                  | %username%           |
      | displayname_owner          | %displayname%        |
      | permissions                | read                 |
      | stime                      | A_NUMBER             |
      | parent                     |                      |
      | expiration                 | A_STRING             |
      | token                      | A_STRING             |
      | uid_file_owner             | %username%           |
      | displayname_file_owner     | %displayname%        |
      | additional_info_owner      |                      |
      | additional_info_file_owner |                      |
      | item_type                  | folder               |
      | item_source                | A_STRING             |
      | path                       | /FOLDER              |
      | mimetype                   | httpd/unix-directory |
      | storage_id                 | A_STRING             |
      | storage                    | A_NUMBER             |
      | file_source                | A_STRING             |
      | file_target                | /FOLDER              |
      | mail_send                  | 0                    |
      | name                       |                      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @issue-ocis-reva-336
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
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | public_link          |
      | file_source       | A_STRING             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Creating a new public link share with password and adding an expiration date using the old public API
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
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Creating a new public link share with password and adding an expiration date using the new public API
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "Random data" to "/randomfile.txt"
    When user "Alice" creates a public link share using the sharing API with settings
      | path     | randomfile.txt |
      | password | %public%       |
    And user "Alice" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download the last publicly shared file using the new public WebDAV API with password "%public%" and the content should be "Random data"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-336
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
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | public_link          |
      | file_source       | A_STRING             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | expiration        | +3 days              |
      | token             | A_TOKEN              |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-336
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
      | id                | A_STRING             |
      | item_type         | folder               |
      | item_source       | A_STRING             |
      | share_type        | public_link          |
      | file_source       | A_STRING             |
      | file_target       | /FOLDER              |
      | permissions       | read                 |
      | stime             | A_NUMBER             |
      | token             | A_TOKEN              |
      | storage           | A_STRING             |
      | mail_send         | 0                    |
      | uid_owner         | %username%           |
      | displayname_owner | %displayname%        |
      | url               | AN_URL               |
      | mimetype          | httpd/unix-directory |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-336
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
      | id                | A_STRING                  |
      | item_type         | folder                    |
      | item_source       | A_STRING                  |
      | share_type        | public_link               |
      | file_source       | A_STRING                  |
      | file_target       | /FOLDER                   |
      | permissions       | read,update,create,delete |
      | stime             | A_NUMBER                  |
      | token             | A_TOKEN                   |
      | storage           | A_STRING                  |
      | mail_send         | 0                         |
      | uid_owner         | %username%                |
      | displayname_owner | %displayname%             |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-336
  Scenario Outline: Creating a new public link share, updating its permissions to view download and upload and getting its info
    Given using OCS API version "<ocs_api_version>"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | FOLDER |
    And user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    And user "Alice" gets the info of the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | id                | A_STRING                  |
      | item_type         | folder                    |
      | item_source       | A_STRING                  |
      | share_type        | public_link               |
      | file_source       | A_STRING                  |
      | file_target       | /FOLDER                   |
      | permissions       | read,update,create,delete |
      | stime             | A_NUMBER                  |
      | token             | A_TOKEN                   |
      | storage           | A_STRING                  |
      | mail_send         | 0                         |
      | uid_owner         | %username%                |
      | displayname_owner | %displayname%             |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-336
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
      | id                | A_STRING                  |
      | item_type         | folder                    |
      | item_source       | A_STRING                  |
      | share_type        | public_link               |
      | file_source       | A_STRING                  |
      | file_target       | /FOLDER                   |
      | permissions       | read,update,create,delete |
      | stime             | A_NUMBER                  |
      | token             | A_TOKEN                   |
      | storage           | A_STRING                  |
      | mail_send         | 0                         |
      | uid_owner         | %username%                |
      | displayname_owner | %displayname%             |
      | url               | AN_URL                    |
      | mimetype          | httpd/unix-directory      |
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed using the old public API
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
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed using the new public API
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
    And uploading a file should not work using the new public WebDAV API
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcis
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions using the old public API
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
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions using the new public API
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
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed using the old public API
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
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Adding public upload to a read only shared folder as recipient is not allowed using the new public API
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
    And uploading a file should not work using the new public WebDAV API
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcis
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions using the old public API
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
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: Adding public upload to a shared folder as recipient is allowed with permissions using the new public API
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
    And uploading a file should work using the new public WebDAV API
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Updating share permissions from change to read restricts public from deleting files using the old public API
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read |
    When the public deletes file "CHILD/child.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "PARENT/CHILD/child.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis @issue-ocis-reva-292
  Scenario Outline: Updating share permissions from change to read restricts public from deleting files using the new public API
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read |
    When the public deletes file "CHILD/child.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "PARENT/CHILD/child.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcis
  Scenario Outline: Updating share permissions from read to change allows public to delete files using the old public API
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
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
    When the public deletes file "parent.txt" from the last public share using the old public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/parent.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Updating share permissions from read to change allows public to delete files using the new public API
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    When user "Alice" updates the last share using the sharing API with
      | permissions | read,update,create,delete |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" gets the info of the last share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | permissions | read,update,create,delete |
    When the public deletes file "CHILD/child.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/CHILD/child.txt" should not exist
    When the public deletes file "parent.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/parent.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

