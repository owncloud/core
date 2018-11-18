@webUI @insulated @disablePreviews
Feature: restrict resharing
  As an admin
  I want to be able to forbid the sharing of a received share globally
  As a user
  I want to be able to forbid a user that received a share from me to share it further

  Background:
    Given these users have been created:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user2" has logged in using the webUI

  @skipOnMICROSOFTEDGE @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: share a folder with another internal user and prohibit resharing
    Given the setting "Allow resharing" in the section "Sharing" has been enabled
    And the user has browsed to the files page
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user sets the sharing permissions of "User One" for "simple-folder" using the webUI to
      | share | no |
    And the user re-logs in as "user1" using the webUI
    Then it should not be possible to share folder "simple-folder (2)" using the webUI

  @TestAlsoOnExternalUserBackend
  @smokeTest
  Scenario: forbid resharing globally
    Given the setting "Allow resharing" in the section "Sharing" has been disabled
    And the user has browsed to the files page
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then it should not be possible to share folder "simple-folder (2)" using the webUI
