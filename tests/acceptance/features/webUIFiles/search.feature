@webUI @insulated @disablePreviews
Feature: Search

  As a user
  I would like to be able to search for files
  So that I can find needed files quickly

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @mobileResolutionTest
  Scenario: Simple search
    Given user "Alice" has created the following folders
      | path                  |
      | 0                     |
      | simple-folder         |
      | strängé नेपाली folder   |
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "lorem-big.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "simple-folder/lorem-big.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "0/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "strängé नेपाली folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "strängé नेपाली folder/lorem-big.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "lorem" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem-big.txt" should be listed on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the search results in the other folders section on the webUI
    And file "lorem-big.txt" with path "/simple-folder" should be listed in the search results in the other folders section on the webUI
    And file "lorem.txt" with path "/0" should be listed in the search results in the other folders section on the webUI
    And file "lorem.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI
    And file "lorem-big.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI


  Scenario: search for folders
    Given user "Alice" has created the following folders
      | path                               |
      | simple-folder                      |
      | 'single'quotes                     |
      | 'single'quotes/simple-empty-folder |
      | strängé नेपाली folder                |
    And user "Alice" has uploaded file "filesForUpload/zzzz-must-be-last-file-in-folder.txt" to "zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has uploaded file "filesForUpload/zzzz-must-be-last-file-in-folder.txt" to "simple-folder/zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has uploaded file "filesForUpload/zzzz-must-be-last-file-in-folder.txt" to "strängé नेपाली folder/zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "strängé नेपाली folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "folder" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "strängé नेपाली folder" should be listed on the webUI
    And file "zzzz-must-be-last-file-in-folder.txt" should be listed on the webUI
    And folder "simple-empty-folder" with path "/'single'quotes" should be listed in the search results in the other folders section on the webUI
    And file "zzzz-must-be-last-file-in-folder.txt" with path "/simple-folder" should be listed in the search results in the other folders section on the webUI
    And file "zzzz-must-be-last-file-in-folder.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI
    But file "lorem.txt" should not be listed on the webUI
    And file "lorem.txt" should not be listed in the search results in the other folders section on the webUI


  Scenario: search in sub folder
    Given user "Alice" has created the following folders
      | path                  |
      | 0                     |
      | simple-folder         |
      | strängé नेपाली folder   |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "lorem-big.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "0/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "simple-folder/lorem-big.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "strängé नेपाली folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "strängé नेपाली folder/lorem-big.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user opens folder "simple-folder" using the webUI
    And the user searches for "lorem" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem-big.txt" should be listed on the webUI
    And file "lorem.txt" with path "/" should be listed in the search results in the other folders section on the webUI
    And file "lorem-big.txt" with path "/" should be listed in the search results in the other folders section on the webUI
    And file "lorem.txt" with path "/0" should be listed in the search results in the other folders section on the webUI
    And file "lorem.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI
    And file "lorem-big.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI
    But file "lorem.txt" with path "/simple-folder" should not be listed in the search results in the other folders section on the webUI

  @systemtags-app-required
  Scenario: search for a file using a tag
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has created a "normal" tag with name "ipsum"
    And user "Alice" has added tag "ipsum" to file "/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "ipsum" using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @systemtags-app-required
  Scenario: search for a file with multiple tags
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "testimage.jpg"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has created a "normal" tag with name "lorem"
    And user "Alice" has created a "normal" tag with name "ipsum"
    And user "Alice" has added tag "lorem" to file "/lorem.txt"
    And user "Alice" has added tag "lorem" to file "/testimage.jpg"
    And user "Alice" has added tag "ipsum" to file "/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "lorem" using the webUI
    And the user searches for tag "ipsum" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "testimage.jpg" should not be listed on the webUI

  @systemtags-app-required
  Scenario: search for a file with tags
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has created a "normal" tag with name "lorem"
    And user "Alice" has added tag "lorem" to file "/lorem.txt"
    And user "Alice" has added tag "lorem" to file "/simple-folder/lorem.txt"
    When the user browses to the tags page
    And the user searches for tag "lorem" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" with path "" should be listed in the tags page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the tags page on the webUI

  @files_sharing-app-required
  Scenario: Search for a shared file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "lorem" using the webUI
    Then file "lorem (2).txt" should be listed on the webUI

  @files_sharing-app-required
  Scenario: Search for a re-shared file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And these users have been created without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    When user "Brian" shares file "/lorem.txt" with user "Carol" using the sharing API
    And user "Carol" shares file "/lorem.txt" with user "Alice" using the sharing API
    And the user reloads the current page of the webUI
    And the user searches for "lorem" using the webUI
    Then file "lorem (2).txt" should be listed on the webUI

  @files_sharing-app-required
  Scenario: Search for a shared folder
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has shared folder "simple-folder" with user "Alice"
    And the user has reloaded the current page of the webUI
    When the user searches for "simple" using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI

  @skipOnFIREFOX
  Scenario: Search for a file after name is changed
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user renames file "lorem.txt" to "torem.txt" using the webUI
    And the user searches for "torem" using the webUI
    Then file "lorem.txt" should not be listed on the webUI
    And file "torem.txt" should be listed on the webUI

  @issue-38641
  Scenario: Search for a newly uploaded file
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has uploaded file with content "does-not-matter" to "torem.txt"
    And user "Alice" has uploaded file with content "does-not-matter" to "simple-folder/another-torem.txt"
    When the user searches for "torem" using the webUI
    Then file "torem.txt" with path "/" should be listed in the search results in the other folders section on the webUI
#    Then file "torem.txt" with path "/" should not be listed in the search results in the other folders section on the webUI
    And file "another-torem.txt" with path "/simple-folder" should be listed in the search results in the other folders section on the webUI
#    And file "another-torem.txt" with path "/simple-folder" should not be listed in the search results in the other folders section on the webUI


  Scenario: Search for files with difficult names
    Given user "Alice" has created folder "strängé नेपाली folder"
    And user "Alice" has uploaded file with content "does-not-matter" to "/strängéनेपालीloremfile.txt"
    And user "Alice" has uploaded file with content "does-not-matter" to "/strängé नेपाली folder/strängéनेपालीloremfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "lorem" using the webUI
    Then file "strängéनेपालीloremfile.txt" should be listed on the webUI
    And file "strängéनेपालीloremfile.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI


  Scenario: Search for files with difficult names and difficult search phrase
    Given user "Alice" has created folder "strängé नेपाली folder"
    And user "Alice" has uploaded file with content "does-not-matter" to "/strängéनेपालीloremfile.txt"
    And user "Alice" has uploaded file with content "does-not-matter" to "/strängé नेपाली folder/strängéनेपालीloremfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "strängéनेपाली" using the webUI
    Then file "strängéनेपालीloremfile.txt" should be listed on the webUI
    And file "strängéनेपालीloremfile.txt" with path "/strängé नेपाली folder" should be listed in the search results in the other folders section on the webUI


  Scenario: search for file and folder with an emoji in the name
    Given user "Alice" has created the following folders
      | path              |
      | my album          |
      | ⛹ game day video |
      | skiing photos ⛷  |
    And user "Alice" has uploaded file with content "share photo with all" to "/my album/skiing photos list ⛷.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user searches for "skiing photos" using the webUI
    Then folder "skiing photos ⛷" should be listed on the webUI
    And file "skiing photos list ⛷.txt" with path "/my album" should be listed in the search results in the other folders section on the webUI
    But folder "⛹ game day video" should not be listed on the webUI

