@webUI @insulated @disablePreviews
Feature: Hide file/folders

  As a user
  I would like to display hidden files/folders
  So that I can choose to see the files that I want.

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page

  @smokeTest @mobileResolutionTest
  Scenario: create a hidden folder
    When the user creates a folder with the name ".xyz" using the webUI
    Then folder ".xyz" should not be listed on the webUI
    When the user enables the setting to view hidden folders on the webUI
    Then folder ".xyz" should be listed on the webUI

  Scenario: create a hidden file
    Given user "Alice" has uploaded file with content "some content" to "/.lorem.txt"
    When the user browses to the files page
    Then file ".lorem.txt" should not be listed on the webUI
    When the user enables the setting to view hidden files on the webUI
    Then folder ".lorem.txt" should be listed on the webUI

  Scenario: Delete and restore a hidden file from trashbin
    Given user "Alice" has uploaded file with content "some content" to "/.lorem.txt"
    When the user browses to the files page
    And the user enables the setting to view hidden files on the webUI
    And the user deletes file ".lorem.txt" using the webUI
    Then file ".lorem.txt" should be listed in the trashbin on the webUI
    When the user restores file ".lorem.txt" from the trashbin using the webUI
    And the user browses to the files page
    Then file ".lorem.txt" should be listed on the webUI
