@api @provisioning_api-app-required
Feature: enable user
  As an admin
  I want to be able to enable a user
  So that I can give a user access to their files and resources again if they are now authorized for that

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin enables an user
    Given user "user1" has been created
    And user "user1" has been disabled
    When user "%admin%" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/user1/enable"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "user1" should be enabled

  Scenario: admin enables another admin user
    Given user "another-admin" has been created
    And user "another-admin" has been added to group "admin"
    And user "another-admin" has been disabled
    When user "%admin%" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/another-admin/enable"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "another-admin" should be enabled

  Scenario: admin enables subadmins in the same group
    Given user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been added to group "new-group"
    And user "%admin%" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has been disabled
    When user "%admin%" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/subadmin/enable"
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And user "subadmin" should be enabled

  Scenario: admin tries to enable himself
    And user "another-admin" has been created
    And user "another-admin" has been added to group "admin"
    And user "another-admin" has been disabled
    When user "another-admin" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/another-admin/enable"
    Then user "another-admin" should be disabled

  @issue-31276
  Scenario: normal user tries to enable other user
    Given user "user1" has been created
    And user "user2" has been created
    And user "user2" has been disabled
    When user "user1" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/user2/enable"
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "user2" should be disabled

  Scenario: subadmin tries to enable himself
    Given user "subadmin" has been created
    And group "new-group" has been created
    And user "subadmin" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has been disabled
    When user "subadmin" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/subadmin/enabled"
    And user "subadmin" should be disabled

  Scenario: Making a web request with an enabled user
    Given user "user0" has been created
    When user "user0" sends HTTP method "GET" to URL "/index.php/apps/files"
    Then the HTTP status code should be "200"