@api @files_sharing-app-required @issue-ocis-reva-243
Feature: share resources with a disabled user

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and skeleton files

  Scenario Outline: Creating a new share with a disabled user
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "welcome.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "401"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 997             |

  @issue-32068
  Scenario: Creating a new share with a disabled user
    Given using OCS API version "2"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "welcome.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
