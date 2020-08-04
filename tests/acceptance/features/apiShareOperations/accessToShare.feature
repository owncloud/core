@api @files_sharing-app-required
Feature: sharing

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |

  @smokeTest
  Scenario Outline: Sharee can see the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
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
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    When user "Brian" gets all the shares shared with him that are received as file "textfile1 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcis @issue-ocis-reva-260
  Scenario Outline: Sharee can't see the share that is filtered out
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Alice" has shared file "textfile1.txt" with user "Brian"
    When user "Brian" gets all the shares shared with him that are received as file "textfile0 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcis @issue-ocis-reva-34 @issue-ocis-reva-194
  Scenario Outline: Sharee can see the group share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    When user "Brian" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
