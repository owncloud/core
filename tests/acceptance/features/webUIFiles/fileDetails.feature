@webUI @insulated @disablePreviews
Feature: User can open the details panel for any file or folder
  As a user
  I want to be able to open the details panel of any file or folder
  So that the details of the file or folder are visible to me

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user1    |

  @comments-app-required @files_versions-app-required
  Scenario: View different areas of the details panel in files page
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And user "user1" has logged in using the webUI
    When the user opens the file action menu of file "randomfile.txt" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to "versions" tab in details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @files_versions-app-required
  Scenario: View different areas of the details panel in favorites page
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And user "user1" has logged in using the webUI
    When the user marks file "randomfile.txt" as favorite using the webUI
    And the user browses to the favorites page
    And the user opens the file action menu of file "randomfile.txt" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to "versions" tab in details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @public_link_share-feature-required
  Scenario: user shares a file through public link and then the details dialog should work in a Shared by link page
    Given user "user1" has created folder "a-folder"
    And user "user1" has logged in using the webUI
    And the user has created a new public link for folder "a-folder" using the webUI
    When the user browses to the shared-by-link page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: user shares a file and then the details dialog should work in a Shared with others page
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user1" has created folder "a-folder"
    And user "user1" has logged in using the webUI
    And the user has shared folder "a-folder" with user "User Two" using the webUI
    When the user browses to the shared-with-others page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: the recipient user should be able to view different areas of details panel in Shared with you page
    Given user "user2" has been created with default attributes and skeleton files
    And user "user1" has created folder "a-folder"
    And user "user1" has logged in using the webUI
    And the user has shared folder "a-folder" with user "User Two" using the webUI
    And the user re-logs in as "user2" using the webUI
    When the user browses to the shared-with-you page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: View different areas of details panel for the folder with given tag in Tags page
    Given user "user1" has created a "normal" tag with name "simple"
    And user "user1" has created folder "a-folder"
    And user "user1" has added tag "simple" to folder "a-folder"
    And user "user1" has logged in using the webUI
    When the user browses to the tags page
    And the user searches for tag "simple" using the webUI
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible