@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: delete groups
  As an admin
  I want to be able to delete groups
  So that I can remove unnecessary groups

  Background:
    Given using OCS API version "1"

  @issue-31015
  Scenario: admin deletes a group that has a forward-slash in the group name
    # After fixing issue-31015, change the following step to "has been created"
    Given the administrator sends a group creation request for the following groups using the provisioning API
      | groupname        | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
    When the administrator deletes the following groups using the provisioning API
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | var/../etc       |
      | priv/subadmins/1 |
    # After fixing issue-31015, change the expected status to "100"
    #Then the OCS status code should be "100"
    Then the HTTP status code of responses on all endpoints should be "404"
    #And the HTTP status code should be "200"
    And the following groups should not exist
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | var/../etc       |
      | priv/subadmins/1 |
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes the following groups using the occ command
      | groupname        |
      | Mgmt/Sydney      |
      | Mgmt//NSW/Sydney |
      | var/../etc       |
      | priv/subadmins/1 |
