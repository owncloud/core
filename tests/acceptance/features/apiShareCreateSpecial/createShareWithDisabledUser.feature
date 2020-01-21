@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: share resources with a disabled user

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  Scenario Outline: Creating a new share with a disabled user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has been disabled
    When user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "401"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 997             |

  @issue-32068
  Scenario: Creating a new share with a disabled user
    Given using OCS API version "2"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user0" has been disabled
    When user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"

