@webUI @insulated @disablePreviews
Feature: Mark file as favorite

  As a user
  I would like to mark any file/folder as favorite
  So that I can find my favorite file/folder easily

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: mark a file as favorite and list it in favorites page
    Given user "Alice" has uploaded file "filesForUpload/data.zip" to "/data.zip"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has uploaded file with content "file with comma" to "s,a,m,p,l,e.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user marks file "data.zip" as favorite using the webUI
    And the user marks file "s,a,m,p,l,e.txt" as favorite using the webUI
    Then file "data.zip" should be marked as favorite on the webUI
    And file "s,a,m,p,l,e.txt" should be marked as favorite on the webUI
    When the user reloads the current page of the webUI
    Then file "data.zip" should be marked as favorite on the webUI
    And file "s,a,m,p,l,e.txt" should be marked as favorite on the webUI
    And file "data.zip" should be listed in the favorites page on the webUI
    And file "lorem.txt" should not be listed in the favorites page on the webUI


  Scenario: mark a folder as favorite and list it in favorites page
    Given user "Alice" has created the following folders
      | path                              |
      | simple-folder                     |
      | simple-folder/simple-empty-folder |
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user marks folder "simple-folder" as favorite using the webUI
    Then folder "simple-folder" should be marked as favorite on the webUI
    When the user reloads the current page of the webUI
    Then folder "simple-folder" should be marked as favorite on the webUI
    And folder "simple-folder" should be listed in the favorites page on the webUI
    And folder "simple-empty-folder" should not be listed in the favorites page on the webUI


  Scenario: mark files with same name and different path as favorites and list them in favourites page
    Given user "Alice" has created the following folders
      | path                              |
      | simple-folder                     |
      | simple-empty-folder               |
      | strängé नेपाली folder               |
      | simple-folder/simple-empty-folder |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "strängé नेपाली folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user marks file "lorem.txt" as favorite using the webUI
    And the user marks folder "simple-empty-folder" as favorite using the webUI
    And the user opens folder "simple-folder" using the webUI
    And the user marks file "lorem.txt" as favorite using the webUI
    And the user marks folder "simple-empty-folder" as favorite using the webUI
    And the user browses to the files page
    And the user opens folder "strängé नेपाली folder" using the webUI
    And the user marks file "lorem.txt" as favorite using the webUI
    Then file "lorem.txt" with path "/" should be listed in the favorites page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the favorites page on the webUI
    And folder "simple-empty-folder" with path "/" should be listed in the favorites page on the webUI
    And file "simple-empty-folder" with path "/simple-folder" should be listed in the favorites page on the webUI
    And file "lorem.txt" with path "/strängé नेपाली folder" should be listed in the favorites page on the webUI
