@webUI @insulated @disablePreviews
Feature: User can open the details panel for any file or folder
  As a user
  I want to be able to open the details panel of any file or folder
  So that the details of the file or folder are visible to me

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @comments-app-required @files_versions-app-required @files_sharing-app-required
  Scenario: View different areas of the details panel in files page
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user opens the file action menu of file "randomfile.txt" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to the "versions" tab in the details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @files_versions-app-required @files_sharing-app-required
  Scenario: View different areas of the details panel in favorites page
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    When the user marks file "randomfile.txt" as favorite using the webUI
    And the user browses to the favorites page
    And the user opens the file action menu of file "randomfile.txt" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible
    When the user switches to the "versions" tab in the details panel using the webUI
    Then the "versions" details panel should be visible

  @comments-app-required @public_link_share-feature-required @files_sharing-app-required
  Scenario: user shares a file through public link and then the details dialog should work in a Shared by link page
    Given user "Alice" has created folder "a-folder"
    And user "Alice" has created a public link share of folder "a-folder" with read permissions
    And user "Alice" has logged in using the webUI
    When the user browses to the shared-by-link page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required @files_sharing-app-required
  Scenario: user shares a file and then the details dialog should work in a Shared with others page
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "a-folder"
    And user "Alice" has shared folder "a-folder" with user "Brian"
    And user "Alice" has logged in using the webUI
    When the user browses to the shared-with-others page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required @files_sharing-app-required
  Scenario: the recipient user should be able to view different areas of details panel in Shared with you page
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "a-folder"
    And user "Alice" has shared folder "a-folder" with user "Brian"
    And user "Brian" has logged in using the webUI
    When the user browses to the shared-with-you page
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible

  @comments-app-required @files_sharing-app-required
  Scenario: View different areas of details panel for the folder with given tag in Tags page
    Given user "Alice" has created a "normal" tag with name "simple"
    And user "Alice" has created folder "a-folder"
    And user "Alice" has added tag "simple" to folder "a-folder"
    And user "Alice" has logged in using the webUI
    When the user browses to the tags page
    And the user searches for tag "simple" using the webUI
    Then folder "a-folder" should be listed on the webUI
    When the user opens the file action menu of folder "a-folder" on the webUI
    And the user clicks the details file action on the webUI
    Then the details dialog should be visible on the webUI
    And the thumbnail should be visible in the details panel
    When the user switches to the "sharing" tab in the details panel using the webUI
    Then the "sharing" details panel should be visible
    When the user switches to the "comments" tab in the details panel using the webUI
    Then the "comments" details panel should be visible


  Scenario Outline: Breadcrumb through folders
    Given user "Alice" has created folder "<grand-parent>"
    And user "Alice" has created folder "<grand-parent>/<parent>"
    And user "Alice" has created folder "<grand-parent>/<parent>/<child>"
    And user "Alice" has created folder "<grand-parent>/<parent>/<child>/<grand-child>"
    And user "Alice" has logged in using the webUI
    When the user opens folder "<grand-parent>" using the webUI
    Then folder "<parent>" should be listed on the webUI
    When the user browses to the home page
    Then folder "<grand-parent>" should be listed on the webUI
    When the user opens folder "<grand-parent>" using the webUI
    And the user opens folder "<parent>" using the webUI
    And the user opens folder "<child>" using the webUI
    And the user opens folder "<grand-child>" using the webUI
    And the user selects the breadcrumb for folder "<grand-parent>/<parent>"
    Then folder "<child>" should be listed on the webUI
    When the user selects the breadcrumb for folder "<grand-parent>"
    Then folder "<parent>" should be listed on the webUI
    Examples:
      | grand-parent | parent      | child       | grand-child |
      | grand-parent | parent      | child       | grand-child |
      | SAMENAME     | SAMENAME    | SAMENAME    | SAMENAME    |
      | Grand parent | grand child | grand child | grand child |
      | Folder12     | #fol3der    | FOL DER     | FoLdEr      |
