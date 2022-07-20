@api @files_sharing-app-required @issue-ocis-reva-41 @skipOnOcis
Feature: cannot share resources when in a group that is excluded from sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"

  Scenario Outline: user who is excluded from sharing tries to share a file with another user
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/fileToShare.txt"
    When user "Brian" shares file "fileToShare.txt" with user "Alice" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report to user "Alice" that no shares are in the pending state
    And as "Alice" file "Shares/fileToShare.txt" should not exist
    And as "Alice" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a file with a group
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp2" has been created
    And user "Carol" has been added to group "grp2"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/fileToShare.txt"
    When user "Brian" shares file "fileToShare.txt" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report to user "Carol" that no shares are in the pending state
    And as "Carol" file "Shares/fileToShare.txt" should not exist
    And as "Carol" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a folder with another user
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has created folder "folderToShare"
    When user "Brian" shares folder "folderToShare" with user "Alice" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report to user "Alice" that no shares are in the pending state
    And as "Alice" folder "Shares/folderToShare" should not exist
    And as "Alice" folder "folderToShare" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a folder with a group
    Given using OCS API version "<ocs_api_version>"
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp0"]'
    And user "Alice" has created folder "folderToShare"
    When user "Alice" shares folder "folderToShare" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    And as "Brian" folder "Shares/folderToShare" should not exist
    And as "Brian" folder "folderToShare" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |
