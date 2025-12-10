@api @files_sharing-app-required
Feature: cannot share resources with invalid permissions

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has created folder "/PARENT"


  Scenario Outline: Cannot create a share of a file or folder with invalid permissions
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | <item>        |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | <permissions> |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "<item>" should not exist
    And as "Brian" entry "/Shares/<item>" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | item          | permissions |
      | 1               | 400             | 200              | textfile0.txt | 0           |
      | 2               | 400             | 400              | textfile0.txt | 0           |
      | 1               | 400             | 200              | PARENT        | 0           |
      | 2               | 400             | 400              | PARENT        | 0           |
      | 1               | 404             | 200              | textfile0.txt | 32          |
      | 2               | 404             | 404              | textfile0.txt | 32          |
      | 1               | 404             | 200              | PARENT        | 32          |
      | 2               | 404             | 404              | PARENT        | 32          |


  Scenario Outline: Cannot create a share of a file with a user with only create permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | create        |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    And as "Brian" entry "/Shares/textfile0.txt" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |


  Scenario Outline: Cannot create a share of a file with a user with only (create,delete) permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | Brian         |
      | shareType   | user          |
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    And as "Brian" entry "/Shares/textfile0.txt" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |


  Scenario Outline: Cannot create a share of a file with a group with only create permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | grp1          |
      | shareType   | group         |
      | permissions | create        |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    And as "Brian" entry "/Shares/textfile0.txt" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 400              |


  Scenario Outline: Cannot create a share of a file with a group with only (create,delete) permission
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When user "Alice" creates a share using the sharing API with settings
      | path        | textfile0.txt |
      | shareWith   | grp1          |
      | shareType   | group         |
      | permissions | <permissions> |
    Then the OCS status code should be "400"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" entry "textfile0.txt" should not exist
    And as "Brian" entry "/Shares/textfile0.txt" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | http_status_code | permissions   |
      | 1               | 200              | delete        |
      | 2               | 400              | delete        |
      | 1               | 200              | create,delete |
      | 2               | 400              | create,delete |
