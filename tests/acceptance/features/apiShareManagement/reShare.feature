@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes

  Scenario Outline: User is not allowed to reshare file
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user0" has created a share with settings
      | path        | /textfile0.txt |
      | shareType   | 0              |
      | shareWith   | user1          |
      | permissions | 8              |
    When user "user1" creates a share using the sharing API with settings
      | path        | /textfile0 (2).txt |
      | shareType   | 0                  |
      | shareWith   | user2              |
      | permissions | 31                 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is not allowed to reshare file with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user0" has created a share with settings
      | path        | /textfile0.txt |
      | shareType   | 0              |
      | shareWith   | user1          |
      | permissions | 16             |
    When user "user1" creates a share using the sharing API with settings
      | path        | /textfile0 (2).txt |
      | shareType   | 0                  |
      | shareWith   | user2              |
      | permissions | 31                 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Do not allow reshare to exceed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user0" has created a folder "/TMP"
    And user "user0" has created a share with settings
      | path        | /TMP  |
      | shareType   | 0     |
      | shareWith   | user1 |
      | permissions | 21    |
    And as user "user1"
    And the user has created a share with settings
      | path        | /TMP  |
      | shareType   | 0     |
      | shareWith   | user2 |
      | permissions | 21    |
    When the user updates the last share using the sharing API with
      | permissions | 31 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario: Reshared files can be still accessed if a user in the middle removes it.
    Given user "user2" has been created with default attributes
    And user "user3" has been created with default attributes
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has moved file "/textfile0 (2).txt" to "/textfile0_shared.txt"
    And user "user1" has shared file "textfile0_shared.txt" with user "user2"
    And user "user2" has shared file "textfile0_shared.txt" with user "user3"
    When user "user1" deletes file "/textfile0_shared.txt" using the WebDAV API
    And user "user3" downloads file "/textfile0_shared.txt" with range "bytes=1-7" using the WebDAV API
    Then the downloaded content should be "wnCloud"

  @public_link_share-feature-required
  Scenario Outline: resharing using a public link with read only permissions is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 1
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | false |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: resharing using a public link with read and write permissions only is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created a folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 15
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | false |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: resharing a file is not allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes
    And user "user0" has created a share with settings
      | path        | /textfile0.txt |
      | shareType   | 0              |
      | shareWith   | user1          |
      | permissions | 31             |
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user1" creates a share using the sharing API with settings
      | path        | /textfile0 (2).txt |
      | shareType   | 0                  |
      | shareWith   | user2              |
      | permissions | 31                 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0 (2).txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
