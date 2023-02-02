@api @files_sharing-app-required
Feature: resharing can be disabled

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: resharing a file is not allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian" with permissions "share,update,read"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "Brian" shares file "/textfile0.txt" with user "Carol" with permissions "share,update,read" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "Carol" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: ordinary sharing is allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "/textfile0.txt" with user "Brian" with permissions "share,update,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
