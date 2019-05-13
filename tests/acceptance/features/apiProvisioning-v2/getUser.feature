@api @provisioning_api-app-required
Feature: get user
  As an admin, subadmin or as myself
  I want to be able to retrieve user information
  So that I can see the information

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets an existing user
    Given these users have been created with default attributes:
      | username       | displayname    |
      | brand-new-user | Brand New User |
    When the administrator retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "Brand New User"
    And the quota definition returned by the API should be "default"

  Scenario: admin tries to get a not existing user
    When the administrator retrieves the information of user "not-a-user" using the provisioning API
    Then the OCS status code should be "404"
    And the HTTP status code should be "404"
    And the API should not return any data

  @smokeTest
  Scenario: a subadmin gets information of a user in their group
    Given these users have been created with default attributes:
      | username | displayname |
      | subadmin | Sub Admin   |
      | newuser  | New User    |
    And group "newgroup" has been created
    And user "newuser" has been added to group "newgroup"
    And user "subadmin" has been made a subadmin of group "newgroup"
    When user "subadmin" retrieves the information of user "newuser" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"

  Scenario: a subadmin tries to get information of a user not in their group
    Given user "subadmin" has been created with default attributes
    And user "newuser" has been created with default attributes
    And group "newgroup" has been created
    And user "subadmin" has been made a subadmin of group "newgroup"
    When user "subadmin" retrieves the information of user "newuser" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

  @issue-31276
  Scenario: a normal user tries to get information of another user
    Given user "newuser" has been created with default attributes
    And user "anotheruser" has been created with default attributes
    When user "anotheruser" retrieves the information of user "newuser" using the provisioning API
    Then the OCS status code should be "997"
    #And the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

  @smokeTest
  Scenario: a normal user gets their own information
    Given these users have been created with default attributes:
      | username | displayname |
      | newuser  | New User    |
    When user "newuser" retrieves the information of user "newuser" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
