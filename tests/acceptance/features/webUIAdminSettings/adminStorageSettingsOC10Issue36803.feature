@webUI @insulated @disablePreviews @admin_settings-feature-required @local_storage @files_external-app-required
Feature: admin storage settings
  As an admin
  I want to be able to manage external storages on the ownCloud server
  So that owncloud users can link external storages into the owncloud server

  @issue-36803 @issue-files_primary_s3-351 @skipOnStorage:ceph @skipOnStorage:scality
  Scenario: applicable user is not able to share top-level of read-only storage
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added user "Alice" as the applicable user for the last local storage mount from the admin storage settings page
    And the administrator has enabled read-only for the last created local storage mount using the webUI
    And the administrator has enabled sharing for the last created local storage mount using the webUI
    And the user has re-logged in as "Alice" using the webUI
    When the user tries to share folder "local_storage1" with user "Brian" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Cannot set the requested share permissions for local_storage1 |
   # And as "Brian" folder "local_storage1" should exist
    And as "Brian" folder "local_storage1" should not exist
