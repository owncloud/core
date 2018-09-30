@webUI @insulated @disablePreviews
Feature: Search

  As a user
  I would like to be able to search for files
  So that I can find needed files quickly

  Background:
    Given user "user1" has been created
    And the user has browsed to the login page
    And the user has logged in with username "user1" and password "%alt1%" using the webUI

  @smokeTest
  Scenario: Simple search
    When the user searches for "lorem" using the webUI
    Then the file "lorem.txt" should be listed on the webUI
    And the file "lorem-big.txt" should be listed on the webUI
    And the file "lorem.txt" with the path "/simple-folder" should be listed in the search results in other folders section on the webUI
    And the file "lorem-big.txt" with the path "/simple-folder" should be listed in the search results in other folders section on the webUI
    And the file "lorem.txt" with the path "/0" should be listed in the search results in other folders section on the webUI
    And the file "lorem.txt" with the path "/strängé नेपाली folder" should be listed in the search results in other folders section on the webUI
    And the file "lorem-big.txt" with the path "/strängé नेपाली folder" should be listed in the search results in other folders section on the webUI

  Scenario: search for folders
    When the user searches for "folder" using the webUI
    Then the folder "simple-folder" should be listed on the webUI
    And the folder "strängé नेपाली folder" should be listed on the webUI
    And the file "zzzz-must-be-last-file-in-folder.txt" should be listed on the webUI
    And the folder "simple-empty-folder" with the path "/'single'quotes" should be listed in the search results in other folders section on the webUI
    And the file "zzzz-must-be-last-file-in-folder.txt" with the path "/simple-folder" should be listed in the search results in other folders section on the webUI
    And the file "zzzz-must-be-last-file-in-folder.txt" with the path "/strängé नेपाली folder" should be listed in the search results in other folders section on the webUI
    But the file "lorem.txt" should not be listed on the webUI
    And the file "lorem.txt" should not be listed in the search results in other folders section on the webUI

  Scenario: search in sub folder
    When the user opens the folder "simple-folder" using the webUI
    And the user searches for "lorem" using the webUI
    Then the file "lorem.txt" should be listed on the webUI
    And the file "lorem-big.txt" should be listed on the webUI
    And the file "lorem.txt" with the path "/" should be listed in the search results in other folders section on the webUI
    And the file "lorem-big.txt" with the path "/" should be listed in the search results in other folders section on the webUI
    And the file "lorem.txt" with the path "/0" should be listed in the search results in other folders section on the webUI
    And the file "lorem.txt" with the path "/strängé नेपाली folder" should be listed in the search results in other folders section on the webUI
    And the file "lorem-big.txt" with the path "/strängé नेपाली folder" should be listed in the search results in other folders section on the webUI
    But the file "lorem.txt" with the path "/simple-folder" should not be listed in the search results in other folders section on the webUI
