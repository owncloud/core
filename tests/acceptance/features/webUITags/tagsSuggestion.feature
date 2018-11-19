@webUI @insulated @systemtags-app-required
Feature: Suggestion for matching tag names
  As a user
  I want to get suggestions for adding tags from already existing tags
  So that I can easily categorize the files

  Background:
    Given these users have been created:
      | username |
      | user1    |
    Given user "user1" has created a "normal" tag with name "spam"
    And user "user1" has created a "normal" tag with name "ham"
    And user "user1" has created a "normal" tag with name "notspam"
    And user "user1" has created a "normal" tag with name "gham"
    And user "user1" has created a "normal" tag with name "special"
    And user "user1" has created a "normal" tag with name "specification"
    And the administrator has created a "not user-assignable" tag with name "Violates T&C"
    And the administrator has created a "not user-assignable" tag with name "sponsored"
    And user "user1" has logged in using the webUI

  Scenario: User should get suggestion from already existing tags
    When the user browses directly to display the details of file "lorem.txt" in folder "simple-folder"
    And the user types "sp" in the collaborative tags field using the webUI
    Then all the tags starting with "sp" in their name should be listed in the dropdown list on the webUI
    But tag "gham" should not be listed in the dropdown list on the webUI
    But tag "notspam" should not be listed in the dropdown list on the webUI
    And tag "Violates T&C" should not be listed in the dropdown list on the webUI
    And tag "sponsored" should not be listed in the dropdown list on the webUI
