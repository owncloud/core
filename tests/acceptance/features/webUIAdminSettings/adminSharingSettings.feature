@webUI @insulated @disablePreviews @admin_settings-feature-required
Feature: admin sharing settings
  As an admin
  I want to be able to manage sharing settings on the ownCloud server
  So that I can enable, disable, allow or restrict different sharing behaviour

  @smokeTest
  Scenario: disable share API
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables the share API using the webUI
    Then the "api_enabled" capability of files sharing app should be "EMPTY"

  Scenario: disable public sharing
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables share via link using the webUI
    Then the "public@@@enabled" capability of files sharing app should be "EMPTY"

  Scenario: disable public upload
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables public uploads using the webUI
    Then the "public@@@upload" capability of files sharing app should be "EMPTY"

  Scenario: enable mail notification on public link share
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables mail notification on public link share using the webUI
    Then the "public@@@send_mail" capability of files sharing app should be "1"

  Scenario: disable social media share on public link share
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables social media share on public link share using the webUI
    Then the "public@@@social_share" capability of files sharing app should be "EMPTY"

  Scenario: enable enforce password protection for read-only links
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables enforce password protection for read-only links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_only" capability of files sharing app should be "1"


  Scenario: enable enforce password protection for read and write links
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables enforce password protection for read and write links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_write" capability of files sharing app should be "1"

  Scenario: enable enforce password protection for upload-only links
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables enforce password protection for upload only links using the webUI
    Then the "public@@@password@@@enforced_for@@@upload_only" capability of files sharing app should be "1"

  Scenario: disable resharing
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables resharing using the webUI
    And the user retrieves the capabilities using the capabilities API
    Then the "resharing" capability of files sharing app should be "EMPTY"

  Scenario: disable sharing with groups
    Given the administrator has browsed to the admin sharing settings page
    When the administrator disables sharing with groups using the webUI
    Then the "group_sharing" capability of files sharing app should be "EMPTY"

  Scenario: enable restrict users to only share with users in their groups
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables restrict users to only share with their group members using the webUI
    Then the "share_with_group_members_only" capability of files sharing app should be "1"

  @smokeTest
  Scenario: enable share API
    Given parameter "shareapi_enabled" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables the share API using the webUI
    Then the "api_enabled" capability of files sharing app should be "1"


  Scenario: enable public sharing
    Given parameter "shareapi_allow_links" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables share via link using the webUI
    Then the "public@@@enabled" capability of files sharing app should be "1"

  Scenario: enable public upload
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables public uploads using the webUI
    Then the "public@@@upload" capability of files sharing app should be "1"

  Scenario: disable mail notification on public link share
    Given parameter "shareapi_allow_public_send_mail" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables mail notification on public link share using the webUI
    Then the "public@@@send_mail" capability of files sharing app should be "EMPTY"

  Scenario: enable social media share on public link share
    Given parameter "shareapi_allow_social_share" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables social media share on public link share using the webUI
    Then the "public@@@social_share" capability of files sharing app should be "1"

  Scenario: disable enforce password protection for read-only links
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables enforce password protection for read-only links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_only" capability of files sharing app should be "EMPTY"

  Scenario: disable enforce password protection for read and write links
    Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables enforce password protection for read and write links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_write" capability of files sharing app should be "EMPTY"

  Scenario: disable enforce password protection for upload-only links
    Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables enforce password protection for upload only links using the webUI
    Then the "public@@@password@@@enforced_for@@@upload_only" capability of files sharing app should be "EMPTY"

  Scenario: enable resharing
    Given parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables resharing using the webUI
    Then the "resharing" capability of files sharing app should be "1"

  Scenario: enable sharing with groups
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables sharing with groups using the webUI
    Then the "group_sharing" capability of files sharing app should be "1"

  Scenario: disable restrict users to only share with users in their groups
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables restrict users to only share with their group members using the webUI
    Then the "share_with_group_members_only" capability of files sharing app should be "EMPTY"