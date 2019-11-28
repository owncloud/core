@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: Exclude groups from receiving shares
  As an admin
  I want to exclude groups from receiving shares
  So that users do not mistakenly share with groups they should not e.g. huge meta groups

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
      | user3    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "user1" has been added to group "grp1"
    And user "user3" has been added to group "grp2"

  Scenario Outline: user cannot share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And user "user0" shares file "welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" file "/welcome (2).txt" should not exist
    When user "user0" shares folder "PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" folder "/PARENT (2)" should not exist
    When user "user0" shares file "welcome.txt" with group "grp2" using the sharing API
    And user "user0" shares folder "PARENT" with group "grp2" using the sharing API
    Then as "user3" file "/welcome (2).txt" should exist
    And as "user3" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: exclude multiple groups from receiving shares stops the user to share with any of them
    Given using OCS API version "<ocs_api_version>"
    And group "grp4" has been created
    And user "user1" has been added to group "grp4"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And the administrator adds group "grp2" to the exclude group from sharing list using the occ command
    And the administrator adds group "grp4" to the exclude group from sharing list using the occ command
    And user "user0" shares file "welcome.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" file "/welcome (2).txt" should not exist
    When user "user0" shares folder "PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" folder "/PARENT (2)" should not exist
    When user "user0" shares folder "PARENT/CHILD" with group "grp4" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" folder "/CHILD" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user cannot reshare a received share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has shared file "textfile0.txt" with user "user0"
    And user "user2" has shared folder "PARENT" with user "user0"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And user "user0" shares file "textfile0 (2).txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" file "/textfile0 (2).txt" should not exist
    When user "user0" shares folder "PARENT (2)" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "user1" folder "/PARENT (2)" should not exist
    When user "user0" shares file "textfile0 (2).txt" with group "grp2" using the sharing API
    And user "user0" shares folder "PARENT (2)" with group "grp2" using the sharing API
    Then as "user3" file "/textfile0 (2).txt" should exist
    And as "user3" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares still works
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And user "user0" shares file "welcome.txt" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "user0" shares folder "PARENT" with user "user1" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "user1" file "/welcome (2).txt" should exist
    And as "user1" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares using an other group works
    Given using OCS API version "<ocs_api_version>"
    And group "grp4" has been created
    And user "user1" has been added to group "grp4"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And user "user0" shares file "welcome.txt" with group "grp4" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "user0" shares folder "PARENT" with group "grp4" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "user1" file "/welcome (2).txt" should exist
    And as "user1" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: a user that is part of a group that is excluded from receiving shares still can initiate shares
    Given using OCS API version "<ocs_api_version>"
    When the administrator adds group "grp1" to the exclude group from sharing list using the occ command
    And user "user1" shares file "welcome.txt" with user "user2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user1" shares folder "PARENT" with user "user2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Then as "user2" file "/welcome (2).txt" should exist
    And as "user2" folder "/PARENT (2)" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
