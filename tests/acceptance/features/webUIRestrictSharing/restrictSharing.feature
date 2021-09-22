@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: restrict Sharing
  As an admin
  I want to be able to restrict the sharing function
  So that users can only share files with specific users and groups

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And user "Alice" has created folder "simple-folder"
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has logged in using the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with users in their groups
    Given the setting "Restrict users to only share with users in their groups" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with user "Carol" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with groups they are member of
    Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Forbid sharing with groups
    Given the setting "Allow sharing with groups" in the section "Sharing" has been disabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp1" using the webUI
    And it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with users in their groups
    Given the setting "Restrict users to only share with users in their groups" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with user "Carol" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with groups they are member of
    Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Forbid sharing with groups
    Given the setting "Allow sharing with groups" in the section "Sharing" has been disabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp1" using the webUI
    And it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with users in their groups
    Given the setting "Restrict users to only share with users in their groups" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with user "Carol" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Restrict users to only share with groups they are member of
    Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @smokeTest @issue-38908
  Scenario: Forbid sharing with groups
    Given the setting "Allow sharing with groups" in the section "Sharing" has been disabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with group "grp1" using the webUI
    And it should not be possible to share folder "simple-folder" with group "grp2" using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
