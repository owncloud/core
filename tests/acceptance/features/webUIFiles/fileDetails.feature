@webUI @insulated @disablePreviews
Feature: User can open the details panel for any file or folder
  As a user
  I want to be able to open the details panel of any file or folder
  So that the details of the file or folder are visible to me

  Background:
    Given these users have been created:
      | username |
      | user1    |
      | user2    |
    And user "user1" has logged in using the webUI
    And the user has browsed to the files page

  @comments-app-required @files_versions-app-required
  Scenario: View different areas of the details panel in files page
    When the user opens the file action menu of the file "lorem.txt" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to "versions" tab in details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @files_versions-app-required
  Scenario: View different areas of the details panel in favorites page
    When the user marks the file "lorem.txt" as favorite using the webUI
    And the user browses to the favorites page
    And the user opens the file action menu of the file "lorem.txt" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to "versions" tab in details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @public_link_share-feature-required
  Scenario: user shares a file through public link and then the details dialog should work in a Shared by link page
    Given the user has created a new public link for the folder "simple-folder" using the webUI
    When the user browses to the shared-by-link page
    Then the folder "simple-folder" should be listed on the webUI
    When the user opens the file action menu of the folder "simple-folder" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: user shares a file and then the details dialog should work in a Shared with others page
    Given the user has shared the folder "simple-folder" with the user "User Two" using the webUI
    When the user browses to the shared-with-others page
    Then the folder "simple-folder" should be listed on the webUI
    When the user opens the file action menu of the folder "simple-folder" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: the recipient user should be able to view different areas of details panel in Shared with you page
    Given the user has shared the folder "simple-folder" with the user "User Two" using the webUI
    And the user re-logs in as "user2" using the webUI
    When the user browses to the shared-with-you page
    Then the folder "simple-folder (2)" should be listed on the webUI
    When the user opens the file action menu of the folder "simple-folder (2)" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required
  Scenario: View different areas of details panel for the folder with given tag in Tags page
    Given user "user1" has created a "normal" tag with name "simple"
    And user "user1" has added the tag "simple" to "simple-folder"
    When the user browses to the tags page
    And the user searches for tag "simple" using the webUI
    Then the folder "simple-folder" should be listed on the webUI
    When the user opens the file action menu of the folder "simple-folder" in the webUI
    And the user clicks the details file action in the webUI
    Then the details dialog should be visible in the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to "sharing" tab in details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to "comments" tab in details panel using the webUI
    Then the "comments" details panel should be visible