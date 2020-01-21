@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: resharing a resource with an expiration date

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario Outline: User should not be able to re-share a folder to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "user3" has been created with default attributes and skeleton files
    And group "grp2" has been created
    # Note: in the user_ldap test environment user3 is in grp2
    And user "user3" has been added to group "grp2"
    And user "user0" has shared folder "/PARENT" with user "user1"
    When user "user1" shares folder "/PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user3" folder "/PARENT (2)" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  Scenario Outline: User should not be able to re-share a file to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "user3" has been created with default attributes and skeleton files
    And group "grp2" has been created
    # Note: in the user_ldap test environment user3 is in grp2
    And user "user3" has been added to group "grp2"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" shares folder "/textfile0.txt" with group "grp2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user3" folder "/textfile0 (2).txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |
