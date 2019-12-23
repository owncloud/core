@api @skipOnOcV10.3
Feature: Users sync

  Background:
    Given these users have been created with default attributes and without skeleton files:
    | username |
    | user0    |
    | user1    |

  Scenario Outline: Trying to sync a user when there is no external user backend
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "user0" using the OCS API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs-status-code>"
    And the OCS status message should be ""
    Examples:
    | ocs-api-version | ocs-status-code |
    | 1               | 100             |
    | 2               | 200             |

  @TestAlsoOnExternalUserBackend
  Scenario Outline: Trying to sync a user which does not exist
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "user10" using the OCS API
    Then the HTTP status code should be "<http-status-code>"
    And the OCS status code should be "404"
    And the OCS status message should be "User is not known in any user backend: user10"
    Examples:
      | ocs-api-version | http-status-code |
      | 1               | 200              |
      | 2               | 404              |

  @TestAlsoOnExternalUserBackend
  Scenario Outline: Trying to sync a user as another user which does not exist
    Given using OCS API version "<ocs-api-version>"
    When user "user20" tries to sync user "user1" using the OCS API
    Then the HTTP status code should be "401"
    And the OCS status code should be "997"
    And the OCS status message should be "Unauthorised"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  @TestAlsoOnExternalUserBackend
  Scenario Outline: Trying to sync a user by non admin user
    Given using OCS API version "<ocs-api-version>"
    When user "user0" tries to sync user "user1" using the OCS API
    Then the HTTP status code should be "<http-status-code>"
    And the OCS status code should be "<ocs-status-code>"
    And the OCS status message should be "Logged in user must be an admin"
    Examples:
      | ocs-api-version | ocs-status-code | http-status-code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  @TestAlsoOnExternalUserBackend
  Scenario Outline: Trying to sync a user by admin using an incorrect password
    Given using OCS API version "<ocs-api-version>"
    When the administrator tries to sync user "user1" using password "invalid" and the OCS API
    Then the HTTP status code should be "401"
    And the OCS status code should be "997"
    And the OCS status message should be "Unauthorised"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |
