@webUI @insulated @disablePreviews
Feature: Manually lock a file
  As a user
  I want to be able to manually lock a file
  So that other users cannot edit the file while I work with it

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has uploaded file with content "some content" to "/can-lock-a-file.txt"
    And user "Alice" has created folder "cannot-lock-a-folder"


  Scenario: Lock File option is not shown when the admin has disabled it
    Given the administrator has disabled the webUI lock file action
    When user "Alice" logs in using the webUI
    Then the option to lock file "can-lock-a-file.txt" should not be available on the webUI
    And the option to lock folder "cannot-lock-a-folder" should not be available on the webUI


  Scenario: Lock File option is shown only for a file when the admin has enabled it
    Given the administrator has enabled the webUI lock file action
    When user "Alice" logs in using the webUI
    Then the option to lock file "can-lock-a-file.txt" should be available on the webUI
    But the option to lock folder "cannot-lock-a-folder" should not be available on the webUI


  Scenario: Lock File option is shown for a file in a folder when the admin has enabled it
    Given the administrator has enabled the webUI lock file action
    And user "Alice" has uploaded file with content "some content" to "/cannot-lock-a-folder/can-lock-a-file.txt"
    And user "Alice" has logged in using the webUI
    When the user opens folder "cannot-lock-a-folder" using the webUI
    Then the option to lock file "can-lock-a-file.txt" should be available on the webUI
