@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get group
  As an admin
  I want to be able to get group details
  So that I can know which users are in a group

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin gets users in the group
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | brand-new-user |
      | 123            |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "123" has been added to group "brand-new-group"
    When the administrator gets all the members of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | brand-new-user |
      | 123            |


  Scenario: admin tries to get users in the empty group
    Given group "brand-new-group" has been created
    When the administrator gets all the members of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the list of users returned by the API should be empty


  Scenario: admin tries to get users in a nonexistent group
    Given group "brand-new-group" has been created
    When the administrator gets all the members of group "nonexistentgroup" using the provisioning API
    Then the OCS status code should be "998"
    And the HTTP status code should be "200"


  Scenario Outline: admin tries to get users in a group but using wrong case of the group name
    Given group "<group_id1>" has been created
    When the administrator gets all the members of group "<group_id2>" using the provisioning API
    Then the OCS status code should be "998"
    And the HTTP status code should be "200"
    Examples:
      | group_id1            | group_id2            |
      | case-sensitive-group | Case-Sensitive-Group |
      | case-sensitive-group | CASE-SENSITIVE-GROUP |
      | Case-Sensitive-Group | case-sensitive-group |
      | Case-Sensitive-Group | CASE-SENSITIVE-GROUP |
      | CASE-SENSITIVE-GROUP | Case-Sensitive-Group |
      | CASE-SENSITIVE-GROUP | case-sensitive-group |

  @smokeTest
  Scenario: subadmin gets users in a group they are responsible for
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | subadmin |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "Alice" has been added to group "brand-new-group"
    And user "Brian" has been added to group "brand-new-group"
    When user "subadmin" gets all the members of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | Alice |
      | Brian |


  Scenario: subadmin tries to get users in a group they are not responsible for
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" gets all the members of group "another-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"


  Scenario: normal user tries to get users in their group
    Given user "newuser" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    When user "newuser" gets all the members of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
