@webUI @insulated @disablePreviews @admin_settings-feature-required @local_storage @files_external-app-required
Feature: admin storage settings
  As an admin
  I want to be able to manage external storages on the ownCloud server
  So that owncloud users can link external storages into the owncloud server


  Scenario: administrator enables the external storage
    Given the administrator has browsed to the admin storage settings page
    When the administrator enables the external storage using the webUI
    Then the external storage form should be displayed on the storage settings page


  Scenario: administrator disables the external storage
    Given the administrator has browsed to the admin storage settings page
    When the administrator disables the external storage using the webUI
    Then the external storage form should not be displayed on the storage settings page


  Scenario: administrator creates a local storage mount
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    When the administrator creates the local storage mount "local_storage1" using the webUI
    And the administrator uploads file with content "this is a file in local storage" to "/local_storage1/file-in-local-storage.txt" using the WebDAV API
    And the user re-logs in as "Alice" using the webUI
    And user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/local_storage1/textfile.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    And as "Alice" the files uploaded to "/local_storage1/textfile.txt" with all mechanisms should exist
    And as "Alice" file "local_storage1/file-in-local-storage.txt" should exist
    And the content of file "/local_storage1/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And user "Alice" should be able to rename file "/local_storage1/file-in-local-storage.txt" to "/local_storage1/another-name.txt"
    And user "Alice" should be able to delete file "/local_storage1/another-name.txt"
    And folder "local_storage1" should be listed on the webUI


  Scenario: administrator creates a read-only local storage mount
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    When the administrator creates the local storage mount "local_storage1" using the webUI
    And the administrator uploads file with content "this is a file in local storage" to "/local_storage1/file-in-local-storage.txt" using the WebDAV API
    And the administrator enables read-only for the last created local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    And user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/local_storage1/textfile.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "403"
    And as "Alice" the files uploaded to "/local_storage1/textfile.txt" with all mechanisms should not exist
    And as "Alice" file "local_storage1/file-in-local-storage.txt" should exist
    And user "Alice" should not be able to rename file "/local_storage1/file-in-local-storage.txt" to "/local_storage1/another-name.txt"
    And user "Alice" should not be able to delete file "/local_storage1/file-in-local-storage.txt"
    And the content of file "/local_storage1/file-in-local-storage.txt" for user "Alice" should be "this is a file in local storage"
    And folder "local_storage1" should be listed on the webUI


  Scenario: administrator assigns an applicable user to a local storage mount
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    When the administrator creates the local storage mount "local_storage1" using the webUI
    And the administrator adds user "Alice" as the applicable user for the last local storage mount using the webUI
    And the administrator creates the local storage mount "local_storage2" using the webUI
    And the administrator adds user "Brian" as the applicable user for the last local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "local_storage1" should be listed on the webUI
    And folder "local_storage2" should not be listed on the webUI
    And the user re-logs in as "Brian" using the webUI
    And folder "local_storage1" should not be listed on the webUI
    And folder "local_storage2" should be listed on the webUI

  @files_sharing-app-required
  Scenario: user should get access if the user is removed from the applicable user and the user was the only applicable user
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added user "Alice" as the applicable user for the last local storage mount from the admin storage settings page
    When the administrator removes user "Alice" from the applicable user for the last local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "local_storage1" should be listed on the webUI
    And the user re-logs in as "Brian" using the webUI
    And folder "local_storage1" should be listed on the webUI


  Scenario: administrator should be able to create a local mount for a specific group
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "brand-new-group" has been created
    And user "Alice" has been added to group "brand-new-group"
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    When the administrator adds group "brand-new-group" as the applicable group for the last local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "local_storage1" should be listed on the webUI
    And the user re-logs in as "Brian" using the webUI
    And folder "local_storage1" should not be listed on the webUI


  Scenario: removing group from applicable group of a local mount
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "brand-new-group" has been created
    And user "Alice" has been added to group "brand-new-group"
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added group "brand-new-group" as the applicable group for the last local storage mount from the admin storage settings page
    When the administrator removes group "brand-new-group" from the applicable group for the last local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "local_storage1" should be listed on the webUI
    And the user re-logs in as "Brian" using the webUI
    And folder "local_storage1" should be listed on the webUI


  Scenario: administrator deletes local storage mount
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    When the administrator deletes the last created local storage mount using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "local_storage1" should not be listed on the webUI


  Scenario: local storage mount is deleted when the last user applicable to it is deleted
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added user "Alice" as the applicable user for the last local storage mount from the admin storage settings page
    And user "Alice" has been deleted
    When the administrator reloads the current page of the webUI
    Then the last created local storage mount should not be listed on the webUI


  Scenario: local storage mount is not deleted when the last group applicable to it is deleted but the member of the deleted group should not have access to it
    Given user "Alice" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "Alice" has been added to group "brand-new-group"
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added group "brand-new-group" as the applicable group for the last local storage mount from the admin storage settings page
    And group "brand-new-group" has been deleted
    When the administrator reloads the current page of the webUI
    Then the last created local storage mount should be listed on the webUI
    And the user re-logs in as "Alice" using the webUI
    And folder "local_storage1" should not be listed on the webUI


  Scenario: local storage mount is not deleted when the one of two users applicable to the mount is deleted
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has enabled the external storage
    And the administrator has browsed to the admin storage settings page
    And the administrator has created the local storage mount "local_storage1" from the admin storage settings page
    And the administrator has added user "Alice" as the applicable user for the last local storage mount from the admin storage settings page
    And the administrator has added user "Brian" as the applicable user for the last local storage mount from the admin storage settings page
    And user "Alice" has been deleted
    When the administrator reloads the current page of the webUI
    Then the last created local storage mount should be listed on the webUI
    And the user re-logs in as "Brian" using the webUI
    And folder "local_storage1" should be listed on the webUI

  @issue-36803 @skipOnOcV10 @issue-files_primary_s3-351 @skipOnStorage:ceph @skipOnStorage:scality
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
    And as "Brian" folder "local_storage1" should exist
