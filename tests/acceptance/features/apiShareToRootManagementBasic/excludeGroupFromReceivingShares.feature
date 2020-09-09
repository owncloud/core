@api @files_sharing-app-required @toImplementOnOCIS @issue-ocis-reva-41
Feature: Exclude groups from receiving shares
  As an admin
  I want to exclude groups from receiving shares
  So that users do not mistakenly share with groups they should not e.g. huge meta groups

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been added to group "grp1"
    And user "David" has been added to group "grp2"

  Scenario Outline: user cannot share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/welcome (2).txt" should not exist
    When user "Alice" shares folder "PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT (2)" should not exist
    When user "Alice" shares file "welcome.txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then as "David" file "/welcome (2).txt" should exist
    And as "David" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: exclude multiple groups from receiving shares stops the user to share with any of them
    Given using OCS API version "<ocs_api_version>"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And the administrator adds group "grp2" to the exclude groups from receiving shares list using the occ command
    And the administrator adds group "grp3" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/welcome (2).txt" should not exist
    When user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT (2)" should not exist
    When user "Alice" shares folder "PARENT/CHILD" with group "grp3" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/CHILD" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  @issue-ocis-reva-243
  Scenario Outline: user cannot reshare a received share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has shared file "textfile0.txt" with user "Alice"
    And user "Carol" has shared folder "PARENT" with user "Alice"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "textfile0 (2).txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/textfile0 (2).txt" should not exist
    When user "Alice" shares folder "PARENT (2)" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT (2)" should not exist
    When user "Alice" shares file "textfile0 (2).txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "PARENT (2)" with group "grp2" using the sharing API
    Then as "David" file "/textfile0 (2).txt" should exist
    And as "David" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  @issue-ocis-reva-243
  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares still works
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "welcome.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "Brian" file "/welcome (2).txt" should exist
    And as "Brian" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares using an other group works
    Given using OCS API version "<ocs_api_version>"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "welcome.txt" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "Brian" file "/welcome (2).txt" should exist
    And as "Brian" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-reva-243
  Scenario Outline: a user that is part of a group that is excluded from receiving shares still can initiate shares
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Brian" shares file "welcome.txt" with user "Carol" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" shares folder "PARENT" with user "Carol" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "Carol" file "/welcome (2).txt" should exist
    And as "Carol" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
