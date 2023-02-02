@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: get user groups
  As an admin
  I want to be able to get groups
  So that I can manage group membership

  Background:
    Given using OCS API version "1"

  @issue-31015
  Scenario: admin gets groups of an user, including groups containing a slash
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "unused-group" has been created
    # After fixing issue-31015, change the following steps to "has been created"
    And the administrator sends a group creation request for group "Mgmt/Sydney" using the provisioning API
    And the administrator sends a group creation request for group "var/../etc" using the provisioning API
    And the administrator sends a group creation request for group "priv/subadmins/1" using the provisioning API
    #And group "Mgmt/Sydney" has been created
    #And group "var/../etc" has been created
    #And group "priv/subadmins/1" has been created
    And user "brand-new-user" has been added to group "Mgmt/Sydney"
    And user "brand-new-user" has been added to group "var/../etc"
    And user "brand-new-user" has been added to group "priv/subadmins/1"
    When the administrator gets all the groups of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the groups returned by the API should be
      | Mgmt/Sydney      |
      | var/../etc       |
      | priv/subadmins/1 |
    # The following steps are needed so that the groups do get cleaned up.
    # After fixing issue-31015, remove the following steps:
    And the administrator deletes group "Mgmt/Sydney" using the occ command
    And the administrator deletes group "var/../etc" using the occ command
    And the administrator deletes group "priv/subadmins/1" using the occ command
