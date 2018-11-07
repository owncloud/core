@webUI @insulated  @files_versions-app-required
Feature: Versions of a file

  As a user
  I would like to see different versions of a file and delete and restore them
  So that I can have more control over the files

  Background:
    Given these users have been created:
      | username |
      | user0    |
      | user1    |

  @skipOnStorage:ceph @files_primary_s3-issue-67
  Scenario: upload new file with same name to see if different versions are shown
    Given user "user0" has logged in using the webUI
    And the user has browsed to the files page
    And user "user0" has uploaded file with content "lorem content" to "/lorem.txt"
    And user "user0" has uploaded file with content "new lorem content" to "/lorem.txt"
    When the user browses directly to display the "versions" details of file "lorem.txt" in folder "/"
    Then the content of file "lorem.txt" for user "user0" should be "new lorem content"
    And the versions list should contain 2 entries

  Scenario: restoring file to old version changes the content of the file
    Given user "user0" has logged in using the webUI
    And the user has browsed to the files page
    And user "user0" has uploaded file with content "lorem content" to "/lorem-file.txt"
    And user "user0" has uploaded file with content "new lorem content" to "/lorem-file.txt"
    When the user browses directly to display the "versions" details of file "lorem-file.txt" in folder "/"
    And the user restores the file to last version using the webUI
    Then the content of file "lorem-file.txt" for user "user0" should be "lorem content"

  Scenario: sharee can see the versions of a file
    Given user "user0" has uploaded file with content "lorem content" to "/lorem-file.txt"
    And user "user0" has uploaded file with content "lorem" to "/lorem-file.txt"
    And user "user0" has uploaded file with content "new lorem content" to "/lorem-file.txt"
    And user "user0" has shared file "lorem-file.txt" with user "user1"
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page
    When the user browses directly to display the "versions" details of file "lorem-file.txt" in folder "/"
    Then the content of file "lorem-file.txt" for user "user1" should be "new lorem content"
    And the versions list should contain 2 entries
