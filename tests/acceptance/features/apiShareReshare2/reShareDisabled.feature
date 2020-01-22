@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: resharing can be disabled

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario Outline: resharing a file is not allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions "share,update,read"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions "share,update,read" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: ordinary sharing is allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user0" shares file "/textfile0.txt" with user "user1" with permissions "share,update,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
