@webUI @insulated @disablePreviews
Feature: restrict Sharing
  As an admin
  I want to be able to restrict the sharing function
  So that users can only share files with specific users and groups

  Background:
    Given these users have been created:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user3" has been added to group "grp2"
    And user "user2" has logged in using the webUI

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: Restrict users to only share with users in their groups
    Given the setting "Restrict users to only share with users in their groups" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with "User Three" using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: Restrict users to only share with groups they are member of
    Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been enabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with "grp2" using the webUI
    When the user shares folder "simple-folder" with group "grp1" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @TestAlsoOnExternalUserBackend
  Scenario: Do not restrict users to only share with groups they are member of
    Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been disabled
    And the user browses to the files page
    When the user shares folder "simple-folder" with group "grp2" using the webUI
    And the user re-logs in as "user3" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: Forbid sharing with groups
    Given the setting "Allow sharing with groups" in the section "Sharing" has been disabled
    When the user browses to the files page
    Then it should not be possible to share folder "simple-folder" with "grp1" using the webUI
    And it should not be possible to share folder "simple-folder" with "grp2" using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
