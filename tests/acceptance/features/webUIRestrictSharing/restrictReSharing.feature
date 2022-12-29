@webUI @insulated @disablePreviews
Feature: restrict resharing
  As an admin
  I want to be able to forbid the sharing of a received share globally
  As a user
  I want to be able to forbid a user that received a share from me to share it further

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "simple-folder"
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has logged in using the webUI

  @skipOnMICROSOFTEDGE @skipOnFIREFOX @files_sharing-app-required @smokeTest
  Scenario: share a folder with another internal user and prohibit resharing
    Given the setting "Allow resharing" in the section "Sharing" has been enabled
    And the user has browsed to the files page
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | share | no |
    And the user re-logs in as "Alice" using the webUI
    Then it should not be possible to share folder "simple-folder (2)" using the webUI

  @files_sharing-app-required @smokeTest
  Scenario: forbid resharing globally
    Given the setting "Allow resharing" in the section "Sharing" has been disabled
    And the user has browsed to the files page
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then it should not be possible to share folder "simple-folder (2)" using the webUI
