@api @provisioning_api-app-required @skipOnLDAP @notToImplementOnOCIS
Feature: add users to group
  As a admin
  I want to be able to add users to a group
  So that I can give a user access to the resources of the group

  Background:
    Given using OCS API version "2"

  @issue-31015 @skipOnLDAP
  Scenario Outline: adding a user to a group that has a forward-slash in the group name
    Given user "brand-new-user" has been created with default attributes and skeleton files
    # After fixing issue-31015, change the following step to "has been created"
    And the administrator sends a group creation request for group "<group_id>" using the provisioning API
    #And group "<group_id>" has been created
    When the administrator adds user "brand-new-user" to group "<group_id>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    # The following step is needed so that the group does get cleaned up.
    # After fixing issue-31015, remove the following step:
    And the administrator deletes group "<group_id>" using the occ command
    Examples:
      | group_id         | comment                            |
      | Mgmt/Sydney      | Slash (special escaping happens)   |
      | Mgmt//NSW/Sydney | Multiple slash                     |
      | var/../etc       | using slash-dot-dot                |
      | priv/subadmins/1 | Subadmins mentioned not at the end |
