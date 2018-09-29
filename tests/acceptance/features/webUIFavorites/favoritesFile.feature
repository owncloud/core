@webUI @insulated @disablePreviews
Feature: Mark file as favorite

  As a user
  I would like to mark any file/folder as favorite
  So that I can find my favorite file/folder easily

  Background:
    Given user "user1" has been created
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI
    And the user has browsed to the files page

  @smokeTest
  Scenario: mark a file as favorite and list it in favorites page
    When the user marks the file "data.zip" as favorite using the webUI
    Then the file "data.zip" should be marked as favorite on the webUI
    When the user reloads the current page of the webUI
    Then the file "data.zip" should be marked as favorite on the webUI
    And the file "data.zip" should be listed in the favorites page on the webUI
    And the file "lorem.txt" should not be listed in the favorites page on the webUI

  Scenario: mark a folder as favorite and list it in favorites page
    When the user marks the folder "simple-folder" as favorite using the webUI
    Then the folder "simple-folder" should be marked as favorite on the webUI
    When the user reloads the current page of the webUI
    Then the folder "simple-folder" should be marked as favorite on the webUI
    And the folder "simple-folder" should be listed in the favorites page on the webUI
    And the folder "simple-empty-folder" should not be listed in the favorites page on the webUI

  Scenario: mark files with same name and different path as favorites and list them in favourites page
    When the user marks the file "lorem.txt" as favorite using the webUI
    And the user marks the folder "simple-empty-folder" as favorite using the webUI
    And the user opens the folder "simple-folder" using the webUI
    And the user marks the file "lorem.txt" as favorite using the webUI
    And the user marks the folder "simple-empty-folder" as favorite using the webUI
    And the user browses to the files page
    And the user opens the folder "strängé नेपाली folder" using the webUI
    And the user marks the file "lorem.txt" as favorite using the webUI
    Then the file "lorem.txt" with the path "/" should be listed in the favorites page on the webUI
    And the file "lorem.txt" with the path "/simple-folder" should be listed in the favorites page on the webUI
    And the folder "simple-empty-folder" with the path "/" should be listed in the favorites page on the webUI
    And the file "simple-empty-folder" with the path "/simple-folder" should be listed in the favorites page on the webUI
    And the file "lorem.txt" with the path "/strängé नेपाली folder" should be listed in the favorites page on the webUI