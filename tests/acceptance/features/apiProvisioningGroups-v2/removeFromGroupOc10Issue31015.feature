@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: remove a user from a group
  As an admin
  I want to be able to remove a user from a group
  So that I can manage user access to group resources

  Background:
    Given using OCS API version "2"

  @issue-31015
  Scenario: admin removes a user from a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
      # After fixing issue-31015, change the following step to "has been created"
    And the administrator sends a group creation request for the following groups using the provisioning API
      | groupname        | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
    #And group "<group_id>" has been created
    And the following users have been added to the following groups
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | var/../etc       |
      | brand-new-user | priv/subadmins/1 |
    When the administrator removes the following users from the following groups using the provisioning API
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | var/../etc       |
      | brand-new-user | priv/subadmins/1 |
    Then the OCS status code of responses on all endpoints should be "200"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not belong to the following groups
      | username       | groupname        |
      | brand-new-user | Mgmt/Sydney      |
      | brand-new-user | Mgmt//NSW/Sydney |
      | brand-new-user | var/../etc       |
      | brand-new-user | priv/subadmins/1 |
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes the following groups using the occ command
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | var/../etc       |
      | priv/subadmins/1 |
