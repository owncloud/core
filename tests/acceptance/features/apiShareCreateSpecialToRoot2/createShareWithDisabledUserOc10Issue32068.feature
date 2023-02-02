@api @files_sharing-app-required
Feature: share resources with a disabled user - current oC10 behavior for issue-32068

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"

  @issue-32068
  Scenario: Creating a new share with a disabled user
    Given using OCS API version "2"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "fileToShare.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
