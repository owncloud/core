@api @provisioning_api-app-required @skipOnLDAP @notToImplementOnOCIS
Feature: disable user
  As an admin
  I want to be able to disable a user
  So that I can remove access to files and resources for a user, without actually deleting the files and resources

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin disables an user
    Given user "Alice" has been created with default attributes and skeleton files
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled

  @skipOnOcV10.3
  Scenario Outline: admin disables an user with special characters in the username
    Given these users have been created with skeleton files:
      | username   | email   |
      | <username> | <email> |
    When the administrator disables user "<username>" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "<username>" should be disabled
    Examples:
      | username | email               |
      | a@-+_.b  | a.b@example.com     |
      | a space  | a.space@example.com |

  @smokeTest
  Scenario: Subadmin should be able to disable an user in their group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | subadmin |
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "Alice" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled

  Scenario: Subadmin should not be able to disable an user not in their group
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | subadmin |
    And group "brand-new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "Alice" has been added to group "another-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "Alice" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Alice" should be enabled

  Scenario: Subadmins should not be able to disable users that have admin permissions in their group
    Given these users have been created with default attributes and skeleton files:
      | username      |
      | subadmin      |
      | another-admin |
    And group "brand-new-group" has been created
    And user "another-admin" has been added to group "admin"
    And user "subadmin" has been added to group "brand-new-group"
    And user "another-admin" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "another-admin" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "another-admin" should be enabled

  Scenario: Admin can disable another admin user
    Given user "another-admin" has been created with default attributes and skeleton files
    And user "another-admin" has been added to group "admin"
    When the administrator disables user "another-admin" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "another-admin" should be disabled

  Scenario: Admin can disable subadmins in the same group
    Given user "subadmin" has been created with default attributes and skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And the administrator has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When the administrator disables user "subadmin" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "subadmin" should be disabled

  Scenario: Admin user cannot disable himself
    Given user "another-admin" has been created with default attributes and skeleton files
    And user "another-admin" has been added to group "admin"
    When user "another-admin" disables user "another-admin" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "another-admin" should be enabled

  Scenario: disable an user with a regular user
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
    When user "Alice" disables user "Brian" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Brian" should be enabled

  Scenario: Subadmin should not be able to disable himself
    Given user "subadmin" has been created with default attributes and skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "subadmin" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "subadmin" should be enabled

  @smokeTest
  Scenario: Making a web request with a disabled user
    Given user "Alice" has been created with default attributes and skeleton files
    And user "Alice" has been disabled
    When user "Alice" sends HTTP method "GET" to URL "/index.php/apps/files"
    Then the HTTP status code should be "403"
