@webUI @insulated @disablePreviews @admin_settings-feature-required @files_sharing-app-required
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


  Scenario: enable enforce password protection for read and write and delete links
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables enforce password protection for read and write and delete links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_write_delete" capability of files sharing app should be "1"


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


  Scenario: disable enforce password protection for read and write and delete links
    Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "no"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables enforce password protection for read and write and delete links using the webUI
    Then the "public@@@password@@@enforced_for@@@read_write_delete" capability of files sharing app should be "EMPTY"


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


  Scenario: enable Add server automatically once a federated share was created successfully
    Given parameter "autoAddServers" of app "federation" has been set to "0"
    And the administrator has browsed to the admin sharing settings page
    When the administrator enables add server automatically once a federation share was created successfully using the webUI
    Then the config key "autoAddServers" of app "federation" should have value "1"


  Scenario: disable Add server automatically once a federated share was created successfully
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables add server automatically once a federation share was created successfully using the webUI
    Then the config key "autoAddServers" of app "federation" should have value "0"


  Scenario: enable default expiration date for user shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for user shares using the webUI
    Then the config key "shareapi_default_expire_date_user_share" of app "core" should have value "yes"


  Scenario: enable default expiration date for group shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for group shares using the webUI
    Then the config key "shareapi_default_expire_date_group_share" of app "core" should have value "yes"


  Scenario: enable default expiration date for federated shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for federated shares using the webUI
    Then the config key "shareapi_default_expire_date_remote_share" of app "core" should have value "yes"


  Scenario: set a different default expiration days for user shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for user shares using the webUI
    And the administrator updates the user share expiration date to "4" days using the webUI
    Then the config key "shareapi_expire_after_n_days_user_share" of app "core" should have value "4"


  Scenario: set a different default expiration days for group shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for group shares using the webUI
    And the administrator updates the group share expiration date to "11" days using the webUI
    Then the config key "shareapi_expire_after_n_days_group_share" of app "core" should have value "11"


  Scenario: set a different default expiration days for federated shares
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for federated shares using the webUI
    And the administrator updates the federated share expiration date to "18" days using the webUI
    Then the config key "shareapi_expire_after_n_days_remote_share" of app "core" should have value "18"


  Scenario: set default expiration days for user shares and enforce as maximum expiration days
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for user shares using the webUI
    And the administrator enforces maximum expiration date for user shares using the webUI
    Then the config key "shareapi_enforce_expire_date_user_share" of app "core" should have value "yes"


  Scenario: set default expiration days for group shares and enforce as maximum expiration days
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for group shares using the webUI
    And the administrator enforces maximum expiration date for group shares using the webUI
    Then the config key "shareapi_enforce_expire_date_group_share" of app "core" should have value "yes"


  Scenario: set default expiration days for federated shares and enforce as maximum expiration days
    Given the administrator has browsed to the admin sharing settings page
    When the administrator enables default expiration date for federated shares using the webUI
    And the administrator enforces maximum expiration date for federated shares using the webUI
    Then the config key "shareapi_enforce_expire_date_remote_share" of app "core" should have value "yes"


  Scenario: check previously set default expiration days for user shares
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the default expiration date checkbox for user shares should be enabled on the webUI
    And the expiration date for user shares should set to "7" days on the webUI


  Scenario: check previously set default expiration days for group shares
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the default expiration date checkbox for group shares should be enabled on the webUI
    And the expiration date for group shares should set to "7" days on the webUI


  Scenario: check previously set default expiration days for federated shares
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the default expiration date checkbox for federated shares should be enabled on the webUI
    And the expiration date for federated shares should set to "7" days on the webUI


  Scenario: check previously enforced maximum expiration days for user shares
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the enforce maximum expiration date checkbox for user shares should be enabled on the webUI


  Scenario: check previously enforced maximum expiration days for group shares
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the enforce maximum expiration date checkbox for group shares should be enabled on the webUI


  Scenario: check previously enforced maximum expiration days for federated shares
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    When the administrator browses to the admin sharing settings page
    Then the enforce maximum expiration date checkbox for federated shares should be enabled on the webUI


  Scenario: check previously set expiration days for user shares
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "5"
    When the administrator browses to the admin sharing settings page
    Then the expiration date for user shares should set to "5" days on the webUI


  Scenario: check previously set expiration days for group shares
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "5"
    When the administrator browses to the admin sharing settings page
    Then the expiration date for group shares should set to "5" days on the webUI


  Scenario: check previously set expiration days for federated shares
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "5"
    When the administrator browses to the admin sharing settings page
    Then the expiration date for federated shares should set to "5" days on the webUI
