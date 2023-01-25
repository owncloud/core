@api @files_sharing-app-required
Feature: cannot share resources with invalid permissions

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Cannot create a share of a file with invalid permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | <permissions> |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | permissions |
      | 1               | 400             | 200              | 0           |
      | 2               | 400             | 400              | 0           |
      | 1               | 404             | 200              | 32          |
      | 2               | 404             | 404              | 32          |


  Scenario Outline: Cannot create a share of a folder with invalid permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    When user "Alice" creates a share using the sharing API with settings
      | path        | PARENT        |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | <permissions> |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | permissions |
      | 1               | 400             | 200              | 0           |
      | 2               | 400             | 400              | 0           |
      | 1               | 404             | 200              | 32          |
      | 2               | 404             | 404              | 32          |


  Scenario Outline: Cannot create a share of a file with a user with only create permission
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | create        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 400             | 200              |
      | 2               | 400             | 400              |


  Scenario Outline: Cannot create a share of a file with a user with only (create,delete) permission
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | <permissions> |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | permissions   |
      | 1               | 400             | 200              | delete        |
      | 2               | 400             | 400              | delete        |
      | 1               | 400             | 200              | create,delete |
      | 2               | 400             | 400              | create,delete |

  @issue-ocis-reva-34
  Scenario Outline: Cannot create a share of a file with a group with only create permission
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | grp1          |
      | shareType   | group         |
      | permissions | create        |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 400             | 200              |
      | 2               | 400             | 400              |

  @issue-ocis-reva-34
  Scenario Outline: Cannot create a share of a file with a group with only (create,delete) permission
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | grp1          |
      | shareType   | group         |
      | permissions | <permissions> |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | permissions   |
      | 1               | 400             | 200              | delete        |
      | 2               | 400             | 400              | delete        |
      | 1               | 400             | 200              | create,delete |
      | 2               | 400             | 400              | create,delete |
