@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: current oC10 behavior for issue-31276
  As an admin
  I want to be able to make a user the subadmin of a group
  So that I can give administrative privilege of a group to a user

  @issue-31276
  Scenario: subadmin of a group tries to make another user subadmin of their group
    Given using OCS API version "2"
    And these users have been created with default attributes and without skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "brand-new-group" has been created
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    And user "brand-new-user" has been added to group "brand-new-group"
    When user "subadmin" makes user "brand-new-user" a subadmin of group "brand-new-group" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "brand-new-user" should not be a subadmin of group "brand-new-group"
