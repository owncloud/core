@webUI @insulated @disablePreviews
Feature: Search

  As a user
  I would like to be able to search for files
  So that I can find needed files quickly

  Background:
    Given user "user1" has been created
    And user "user1" has logged in using the webUI

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

  @systemtags-app-required
  Scenario: search for a file using a tag
    Given user "user1" has created a "normal" tag with name "ipsum"
    And user "user1" has added the tag "ipsum" to "/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "ipsum" using the webUI
    Then the file "lorem.txt" should be listed on the webUI

  @systemtags-app-required
  Scenario: search for a file with multiple tags
    Given user "user1" has created a "normal" tag with name "lorem"
    And user "user1" has created a "normal" tag with name "ipsum"
    And user "user1" has added the tag "lorem" to "/lorem.txt"
    And user "user1" has added the tag "lorem" to "/testimage.jpg"
    And user "user1" has added the tag "ipsum" to "/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "lorem" using the webUI
    And the user searches for tag "ipsum" using the webUI
    Then the file "lorem.txt" should be listed on the webUI
    And the file "testimage.jpg" should not be listed on the webUI