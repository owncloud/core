@api @provisioning_api-app-required
Feature: edit users
  As an admin, subadmin or as myself
  I want to be able to edit user information
  So that I can keep the user information up-to-date

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: the administrator can edit a user email
    Given user "brand-new-user" has been created
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"

  @smokeTest
  Scenario: the administrator can edit a user display name
    Given user "brand-new-user" has been created
    When the administrator changes the display name of user "brand-new-user" to "A New User" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And the display name of user "brand-new-user" should be "A New User"

  @smokeTest
  Scenario: the administrator can edit a user quota
    Given user "brand-new-user" has been created
    When the administrator changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And the quota definition of user "brand-new-user" should be "12 MB"

  Scenario: the administrator can override an existing user email
    Given user "brand-new-user" has been created
    And the administrator has changed the email of user "brand-new-user" to "brand-new-user@gmail.com"
    And the OCS status code should be "100"
    And the HTTP status code should be "200"
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"

  @smokeTest
  Scenario: a subadmin should be able to edit the user information in their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    And user "subadmin" changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    And user "subadmin" changes the display name of user "brand-new-user" to "Anne Brown" using the provisioning API
    Then the display name of user "brand-new-user" should be "Anne Brown"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"
    And the quota definition of user "brand-new-user" should be "12 MB"

  Scenario: a normal user should be able to change their email address
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | email | brand-new-user@example.com |
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"

  Scenario: a normal user should be able to change their display name
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the display name of user "brand-new-user" to "Alan Border" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | displayname | Alan Border |
    And the display name of user "brand-new-user" should be "Alan Border"

  Scenario: a normal user should not be able to change their quota
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "brand-new-user" returned by the API should include
      | quota definition | default |
    And the quota definition of user "brand-new-user" should be "default"
