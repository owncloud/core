@webUI @insulated @disablePreviews
Feature: Unmark file/folder as favorite

  As a user
  I would like to unmark any file/folder
  So that I can remove my favorite file/folder from favorite page

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario: unmark a file as favorite from files page
    Given the user has marked file "data.zip" as favorite using the webUI
    When the user unmarks the favorited file "data.zip" using the webUI
    Then file "data.zip" should not be marked as favorite on the webUI
    When the user browses to the favorites page
    Then file "data.zip" should not be listed in the favorites page on the webUI

  Scenario: unmark a folder as favorite from files page
    Given the user has marked folder "simple-folder" as favorite using the webUI
    When the user unmarks the favorited folder "simple-folder" using the webUI
    Then folder "simple-folder" should not be marked as favorite on the webUI
    When the user browses to the favorites page
    Then folder "simple-folder" should not be listed in the favorites page on the webUI

  @smokeTest
  Scenario: unmark a file as favorite from favorite page
    Given the user has marked file "data.zip" as favorite using the webUI
    And the user has browsed to the favorites page
    When the user unmarks the favorited file "data.zip" using the webUI
    And the user reloads the current page of the webUI
    Then file "data.zip" should not be listed in the favorites page on the webUI
    When the user browses to the files page
    Then file "data.zip" should not be marked as favorite on the webUI

  Scenario: unmark a folder as favorite from files page
    Given the user has marked folder "simple-folder" as favorite using the webUI
    And the user has browsed to the favorites page
    When the user unmarks the favorited folder "simple-folder" using the webUI
    And the user reloads the current page of the webUI
    Then folder "simple-folder" should not be listed in the favorites page on the webUI
    When the user browses to the files page
    Then folder "simple-folder" should not be marked as favorite on the webUI