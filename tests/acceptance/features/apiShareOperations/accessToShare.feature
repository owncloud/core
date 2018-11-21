@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes

  @smokeTest
  Scenario Outline: Sharee can see the share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When user "user1" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the filtered share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has shared file "textfile1.txt" with user "user1"
    When user "user1" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true&path=textfile1 (2).txt"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can't see the share that is filtered out
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has shared file "textfile1.txt" with user "user1"
    When user "user1" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true&path=textfile0 (2).txt"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the group share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    When user "user1" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?shared_with_me=true"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |