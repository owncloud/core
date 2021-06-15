@api @files_sharing-app-required
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"

  @smokeTest
  Scenario Outline: Sharee can see the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" gets all the shares shared with him using the sharing API
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
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Brian" has accepted share "/textfile1.txt" offered by user "Alice"
    When user "Brian" gets all the shares shared with him that are received as file "/Shares/textfile1.txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @issue-ocis-reva-260
  Scenario Outline: Sharee can't see the share that is filtered out
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Brian" has accepted share "/textfile1.txt" offered by user "Alice"
    When user "Brian" gets all the shares shared with him that are received as file "/Shares/textfile0.txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @issue-ocis-reva-34 @issue-ocis-reva-194
  Scenario Outline: Sharee can see the group share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
