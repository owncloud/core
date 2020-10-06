@api @provisioning_api-app-required @skipOnLDAP @notToImplementOnOCIS
Feature: delete groups
  As an admin
  I want to be able to delete groups
  So that I can remove unnecessary groups

  Background:
    Given using OCS API version "2"

  @issue-31015
  Scenario Outline: admin deletes a group that has a forward-slash in the group name
    # After fixing issue-31015, change the following step to "has been created"
    Given the administrator sends a group creation request for group "<group_id>" using the provisioning API
    #Given group "<group_id>" has been created
    When the administrator deletes group "<group_id>" using the provisioning API
    # After fixing issue-31015, change the expected status to "200"
    #Then the OCS status code should be "200"
    And the HTTP status code should be "404"
    #And the HTTP status code should be "200"
    And group "<group_id>" should not exist
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes group "<group_id>" using the occ command
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
