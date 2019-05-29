@webUI @insulated @enablePreviews
Feature: browse directly to details tab
  As a user
  I want to be able to browse directly to display the details about a file
  So that I can see the details immediately without needing to click in the UI

  Background:
    Given user "user1" has been created with default attributes
    And user "user1" has logged in using the webUI

  @smokeTest
  Scenario Outline: Browse directly to the sharing details of a file
    When the user browses directly to display the "sharing" details of file "<file>" in folder "<folder>"
    Then the thumbnail should be visible in the details panel
    And the "sharing" details panel should be visible
    And the share-with field should be visible in the details panel
    Examples:
      | file                                 | folder        | comment                     |
      | block-aligned.txt                    | /             | one of the first files      |
      | block-aligned.txt                    | simple-folder | one of the first files      |
      | lorem.txt                            | /             | a file somewhere in between |
      | lorem.txt                            | simple-folder | a file somewhere in between |
      | zzzz-must-be-last-file-in-folder.txt | /             | last file                   |
      | zzzz-must-be-last-file-in-folder.txt | simple-folder | last file                   |

  @comments-app-required
  Scenario Outline: Browse directly to the comments details of a file
    When the user browses directly to display the "comments" details of file "<file>" in folder "<folder>"
    Then the thumbnail should be visible in the details panel
    And the "comments" details panel should be visible
    Examples:
      | file                                 | folder        | comment                     |
      | block-aligned.txt                    | /             | one of the first files      |
      | block-aligned.txt                    | simple-folder | one of the first files      |
      | lorem.txt                            | /             | a file somewhere in between |
      | lorem.txt                            | simple-folder | a file somewhere in between |
      | zzzz-must-be-last-file-in-folder.txt | /             | last file                   |
      | zzzz-must-be-last-file-in-folder.txt | simple-folder | last file                   |

  @files_versions-app-required
  Scenario Outline: Browse directly to the versions details of a file
    When the user browses directly to display the "versions" details of file "<file>" in folder "<folder>"
    Then the thumbnail should be visible in the details panel
    And the "versions" details panel should be visible
    Examples:
      | file                                 | folder        | comment                     |
      | block-aligned.txt                    | /             | one of the first files      |
      | block-aligned.txt                    | simple-folder | one of the first files      |
      | lorem.txt                            | /             | a file somewhere in between |
      | lorem.txt                            | simple-folder | a file somewhere in between |
      | zzzz-must-be-last-file-in-folder.txt | /             | last file                   |
      | zzzz-must-be-last-file-in-folder.txt | simple-folder | last file                   |
