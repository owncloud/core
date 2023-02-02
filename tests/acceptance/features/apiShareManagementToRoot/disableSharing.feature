@api @files_sharing-app-required
Feature: sharing
  As an admin
  I want to be able to disable sharing functionality
  So that ownCloud users cannot share file or folder

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: user tries to share a file with another user when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to share file "fileToShare.txt" with user "Brian" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: user tries to share a folder with another user when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/FOLDER"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to share folder "/FOLDER" with user "Brian" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: user tries to share a file with group when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to share file "fileToShare.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: user tries to share a folder with group when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/FOLDER"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to share folder "/FOLDER" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: user tries to create public link share of a file when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to create a public link share of file "fileToShare.txt" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @smokeTest
  Scenario Outline: user tries to create public link share of a folder when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/FOLDER"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "Alice" should not be able to create a public link share of folder "/FOLDER" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @smokeTest
  Scenario Outline: user tries to share a file with user who is not in their group when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "Brian" should not be able to share file "fileToShare.txt" with user "Alice" using the sharing API
    And the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |


  Scenario Outline: user shares a file with user who is in their group when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "Carol" should be able to share file "fileToShare.txt" with user "Brian" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: user shares a file with the group they are not member of when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp2" has been created
    And group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "Carol" should be able to share file "fileToShare.txt" with group "grp1" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: user who is not a member of a group tries to share a file in the group when group sharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    Then user "Alice" should not be able to share file "fileToShare.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario Outline: user who is a member of a group tries to share a file in the group when group sharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    Then user "Carol" should not be able to share file "fileToShare.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
