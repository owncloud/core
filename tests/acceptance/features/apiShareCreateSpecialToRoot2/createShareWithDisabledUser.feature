@api @files_sharing-app-required
Feature: share resources with a disabled user

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"


  Scenario Outline: Creating a new share with a disabled user
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "fileToShare.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "401"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 997             |

  @issue-32068 @skipOnOcV10
  Scenario: Creating a new share with a disabled user
    Given using OCS API version "2"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "fileToShare.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
