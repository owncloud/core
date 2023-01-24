@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get user
  As an admin, subadmin or as myself
  I want to be able to retrieve user information
  So that I can see the information

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets an existing user
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname    |
      | brand-new-user | Brand New User |
    When the administrator retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "Brand New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario Outline: admin gets an existing user with special characters in the username
    Given these users have been created without skeleton files:
      | username   | displayname   | email   |
      | <username> | <displayname> | <email> |
    When the administrator retrieves the information of user "<username>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "<displayname>"
    And the email address returned by the API should be "<email>"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp
    Examples:
      | username | displayname  | email               |
      | a@-+_.b  | A weird b    | a.b@example.com     |
      | a space  | A Space Name | a.space@example.com |

 
  Scenario: admin gets an existing user, providing uppercase username in the URL
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname    |
      | brand-new-user | Brand New User |
    When the administrator retrieves the information of user "BRAND-NEW-USER" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "Brand New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario: admin tries to get a nonexistent user
    When the administrator retrieves the information of user "not-a-user" using the provisioning API
    Then the OCS status code should be "404"
    And the HTTP status code should be "404"
    And the API should not return any data

  @smokeTest
  Scenario: a subadmin gets information of a user in their group
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | subadmin       | Sub Admin   |
      | brand-new-user | New User    |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario: a subadmin tries to get information of a user not in their group
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data

  @issue-31276 @skipOnOcV10
  Scenario: a normal user tries to get information of another user
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    When user "another-new-user" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data

  @smokeTest
  Scenario: a normal user gets their own information
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | brand-new-user | New User    |
    When user "brand-new-user" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp

 
  Scenario: a normal user gets their own information, providing uppercase username as authentication
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | brand-new-user | New User    |
    When user "BRAND-NEW-USER" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp

 
  Scenario: a normal user gets their own information, providing uppercase username in the URL
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | brand-new-user | New User    |
    When user "brand-new-user" retrieves the information of user "BRAND-NEW-USER" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp

 
  Scenario: a mixed-case normal user gets their own information, providing lowercase username in the URL
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | Brand-New-User | New User    |
    When user "Brand-New-User" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp

 
  Scenario: a mixed-case normal user gets their own information, providing the mixed-case username in the URL
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | Brand-New-User | New User    |
    When user "brand-new-user" retrieves the information of user "Brand-New-User" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "New User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario: admin gets information of a user with admin permissions
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname    |
      | Alice          | Admin Alice    |
    And user "Alice" has been added to group "admin"
    When the administrator retrieves the information of user "Alice" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "Admin Alice"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario: a subadmin should be able to get information of a user with subadmin permissions in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "another-subadmin" has been added to group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" retrieves the information of user "another-subadmin" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the display name returned by the API should be "Regular User"
    And the quota definition returned by the API should be "default"
    And the free, used, total and relative quota returned by the API should exist and be valid numbers
    And the last login returned by the API should be a current Unix timestamp


  Scenario: a subadmin should not be able to get information of another subadmin of same group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" retrieves the information of user "another-subadmin" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the API should not return any data
