@api @files_sharing-app-required @issue-ocis-1328
Feature: cannot share resources outside the group when share with membership groups is enabled

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files

  @issue-ocis-1328 @skipOnOcis
  Scenario Outline: sharer should not be able to share a folder to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And group "grp1" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "PARENT"
    When user "Alice" shares folder "/PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" folder "/PARENT" should not exist
    And as "Brian" folder "/Shares/PARENT" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: sharer should be able to share a folder to a user who is not member of sharer group when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Alice" has created folder "PARENT"
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" folder "/Shares/PARENT" should exist
    But as "Brian" folder "/PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: sharer should be able to share a folder to a group which he/she is member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp0"
    And user "Alice" has created folder "PARENT"
    When user "Alice" shares folder "/PARENT" with group "grp0" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" folder "/Shares/PARENT" should exist
    But as "Brian" folder "/PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1328 @skipOnOcis
  Scenario Outline: sharer should not be able to share a file to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And group "grp1" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares file "/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "Brian" file "/textfile0.txt" should not exist
    And as "Brian" file "/Shares/textfile0.txt" should not exist
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: sharer should be able to share a file to a group which he/she is member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp0"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares folder "/textfile0.txt" with group "grp0" using the sharing API
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" file "/Shares/textfile0.txt" should exist
    But as "Brian" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: sharer should be able to share a file to a user who is not a member of sharer group when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And user "Alice" has been added to group "grp0"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    When user "Alice" shares folder "/textfile0.txt" with user "Brian" using the sharing API
    And user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "<ocs_status_code>"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" file "/Shares/textfile0.txt" should exist
    But as "Brian" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
