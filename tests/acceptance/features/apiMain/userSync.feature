@api @issue-ocis-1241
Feature: Users sync

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Trying to sync a user when there is no external user backend
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "Alice" using the OCS API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs-status-code>"
    And the OCS status message should be ""
    Examples:
      | ocs-api-version | ocs-status-code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Trying to sync a user which does not exist
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "nonexistentuser" using the OCS API
    Then the HTTP status code should be "<http-status-code>"
    And the OCS status code should be "404"
    And the OCS status message should be "User is not known in any user backend: nonexistentuser"
    Examples:
      | ocs-api-version | http-status-code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: Trying to sync a user as another user which does not exist
    Given using OCS API version "<ocs-api-version>"
    When user "nonexistentuser" tries to sync user "Brian" using the OCS API
    Then the HTTP status code should be "401"
    And the OCS status code should be "997"
    And the OCS status message should be "Unauthorised"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  @smokeTest
  Scenario Outline: Trying to sync a user by non admin user
    Given using OCS API version "<ocs-api-version>"
    When user "Alice" tries to sync user "Brian" using the OCS API
    Then the HTTP status code should be "<http-status-code>"
    And the OCS status code should be "<ocs-status-code>"
    And the OCS status message should be "Logged in user must be an admin"
    Examples:
      | ocs-api-version | ocs-status-code | http-status-code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |


  Scenario Outline: Trying to sync a user by admin using an incorrect password
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "Brian" using password "invalid" and the OCS API
    Then the HTTP status code should be "401"
    And the OCS status code should be "997"
    And the OCS status message should be "Unauthorised"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |
