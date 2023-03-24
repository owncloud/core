@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: misc scenarios on sharing with internal users

  @issue-35787
  Scenario: share a file after changing its content to a user before the user has logged in
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Brian" has logged in using the webUI
    And user "Brian" has uploaded file with content "edited original content" to "/lorem.txt"
    When the user shares file "lorem.txt" with user "Alice" using the webUI
    Then the content of file "lorem.txt" for user "Brian" should be "edited original content"
    When the user re-logs in as "Alice" using the webUI
    Then the content of "lorem.txt" should be the same as the local "lorem.txt"
#   And the content of file "lorem.txt" for user "Alice" should be "edited original content"
