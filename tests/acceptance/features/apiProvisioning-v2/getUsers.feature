@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get users
  As an admin
  I want to be able to list the users that exist
  So that I can see who has access to ownCloud

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin gets all users where default admin user exists
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator gets the list of all users using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | brand-new-user |
      | admin          |


  Scenario: admin gets all users
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator gets the list of all users using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should include
      | brand-new-user |

  @smokeTest
  Scenario: subadmin gets the users in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And group "brand-new-group" has been created
    And user "brand-new-user" has been added to group "brand-new-group"
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    When user "brand-new-user" gets the list of all users using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the users returned by the API should be
      | brand-new-user |

  @issue-31276 @skipOnOcV10
  Scenario: normal user tries to get other users
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    When user "brand-new-user" gets the list of all users using the provisioning API
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And the API should not return any data
