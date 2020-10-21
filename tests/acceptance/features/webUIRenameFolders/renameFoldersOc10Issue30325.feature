@webUI @insulated @disablePreviews
Feature: rename folders
  As a user
  I want to rename folders
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @issue-30325 @notToImplementOnOCIS
  Scenario: Rename a folder which is received as a share (without change permission)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "RandomFolder"
    And user "Brian" has uploaded file with content "thisIsFileInsideFolder" to "/RandomFolder/newFile"
    And user "Brian" has shared folder "RandomFolder" with user "Alice" with permissions "read, share"
    And user "Alice" has logged in using the webUI
    When the user renames folder "RandomFolder" to "renamedFolder" using the webUI
#   Then folder "renamedFolder" should be listed on the webUI
    Then a notification should be displayed on the webUI with the text 'Could not rename "RandomFolder"'
    When the user opens folder "/RandomFolder" using the webUI
#   When the user opens folder "/renamedFolder" using the webUI
    Then the option to rename file "newFile" should not be available on the webUI
