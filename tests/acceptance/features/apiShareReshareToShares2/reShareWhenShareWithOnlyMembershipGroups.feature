@api @files_sharing-app-required @issue-ocis-1289 @issue-ocis-reva-194 @issue-ocis-1328
Feature: resharing a resource with an expiration date

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: User should not be able to re-share a folder to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has shared folder "/PARENT" with user "Brian"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When user "Brian" shares folder "/Shares/PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Carol" folder "/Shares/PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |


  Scenario Outline: User should not be able to re-share a file to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Carol" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" shares folder "/Shares/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Carol" folder "/Shares/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |
