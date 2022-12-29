@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal users where admin disables different share permissions
  As a user
  I want to share files and folders with other users
  So that those users can access the files and folders


  Scenario: Create share when admin disables delete in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the user re-logs in as "Brian" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | change | yes |
      | create | yes |
      | delete | no  |
      | share  | yes |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    And the option to rename file "lorem.txt" should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    And the option to upload file should be available on the webUI
    # Go back to the home page so that the "user shares file" step can navigate its own way
    # into simple-folder and will "know where it is"
    When the user browses to the home page
    And the user shares file "simple-folder/lorem.txt" with user "Carol" using the webUI
    Then as "Carol" file "lorem.txt" should exist


  Scenario: Create share when admin disables change in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission change for default user and group share using the webUI
    And the user re-logs in as "Brian" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
      | change | no  |
      | create | yes |
      | delete | yes |
      | share  | yes |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    And the option to rename file "lorem.txt" should not be available on the webUI
    And the option to upload file should be available on the webUI
    # Go back to the home page so that the "user shares file" step can navigate its own way
    # into simple-folder and will "know where it is"
    When the user browses to the home page
    And the user shares file "simple-folder/lorem.txt" with user "Carol" using the webUI
    Then as "Carol" file "lorem.txt" should exist
    And the option to delete file "lorem.txt" should be available on the webUI


  Scenario: Create share when admin disables create and share in share permissions
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission create for default user and group share using the webUI
    And the administrator disables permission share for default user and group share using the webUI
    And the user re-logs in as "Brian" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice Hansen"
      | change | yes |
      | create | no  |
      | delete | yes |
      | share  | no  |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    And it should not be possible to share file "lorem.txt" using the webUI
    And the option to upload file should not be available on the webUI
    And the option to rename file "lorem.txt" should be available on the webUI
    And it should be possible to delete file "lorem.txt" using the webUI


  Scenario: Create share when admin disables delete in share permissions but then user enables the permission
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the user re-logs in as "Brian" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | delete | yes |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    And it should not be possible to share file "lorem.txt" using the webUI
    And the option to delete file "lorem.txt" should be available on the webUI


  Scenario: Create share when admin disables multiple default share permissions but then user enables a disabled permission
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "simple-folder"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And the administrator has browsed to the admin sharing settings page
    When the administrator disables permission delete for default user and group share using the webUI
    And the administrator disables permission share for default user and group share using the webUI
    And the user re-logs in as "Brian" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | share | yes |
    And the user re-logs in as "Alice" using the webUI
    And the user opens folder "simple-folder" using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    # Go back to the home page so that the "user shares file" step can navigate its own way
    # into simple-folder and will "know where it is"
    When the user browses to the home page
    When the user shares file "simple-folder/lorem.txt" with user "Carol" using the webUI
    Then as "Carol" file "lorem.txt" should exist
