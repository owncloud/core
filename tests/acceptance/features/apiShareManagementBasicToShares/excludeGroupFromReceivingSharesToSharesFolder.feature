@api @files_sharing-app-required @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
Feature: Exclude groups from receiving shares
  As an admin
  I want to exclude groups from receiving shares
  So that users do not mistakenly share with groups they should not e.g. huge meta groups

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
      | David    |
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been added to group "grp1"
    And user "David" has been added to group "grp2"

  @skipOnOcis
  Scenario Outline: user cannot share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    When user "Alice" shares file "fileToShare.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    When user "Alice" shares folder "PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    When user "Alice" shares file "fileToShare.txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    And user "David" accepts share "/fileToShare.txt" offered by user "Alice" using the sharing API
    And user "David" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then as "David" file "/Shares/fileToShare.txt" should exist
    And as "David" folder "/Shares/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  @skipOnOcis
  Scenario Outline: exclude multiple groups from receiving shares stops the user to share with any of them
    Given using OCS API version "<ocs_api_version>"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    And the administrator has added group "grp1, grp2, grp3" to the exclude group from sharing list
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    And the administrator has added group "grp2" to the exclude groups from receiving shares list
    And the administrator has added group "grp3" to the exclude groups from receiving shares list
    When user "Alice" shares file "fileToShare.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    When user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "David" that no shares are in the pending state
    When user "Alice" shares folder "PARENT/CHILD" with group "grp3" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  @skipOnOcis
  Scenario Outline: user cannot reshare a received share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has created folder "PARENT"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Carol" has shared file "textfile0.txt" with user "Alice"
    And user "Alice" has accepted share "/textfile0.txt" offered by user "Carol"
    And user "Carol" has shared folder "PARENT" with user "Alice"
    And user "Alice" has accepted share "/PARENT" offered by user "Carol"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    When user "Alice" shares file "/Shares/textfile0.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    When user "Alice" shares folder "/Shares/PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And the sharing API should report to user "Brian" that no shares are in the pending state
    When user "Alice" shares file "/Shares/textfile0.txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "/Shares/PARENT" with group "grp2" using the sharing API
    And user "David" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    And user "David" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then as "David" file "/Shares/textfile0.txt" should exist
    And as "David" folder "/Shares/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares still works
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    When user "Alice" shares file "fileToShare.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/fileToShare.txt" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then as "Brian" file "/Shares/fileToShare.txt" should exist
    And as "Brian" folder "/Shares/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares using an other group works
    Given using OCS API version "<ocs_api_version>"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    When user "Alice" shares file "fileToShare.txt" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" accepts share "/fileToShare.txt" offered by user "Alice" using the sharing API
    And user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then as "Brian" file "/Shares/fileToShare.txt" should exist
    And as "Brian" folder "/Shares/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: a user that is part of a group that is excluded from receiving shares still can initiate shares
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has created folder "PARENT"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And the administrator has added group "grp1" to the exclude groups from receiving shares list
    When user "Brian" shares file "fileToShare.txt" with user "Carol" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" shares folder "PARENT" with user "Carol" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Carol" accepts share "/fileToShare.txt" offered by user "Brian" using the sharing API
    And user "Carol" accepts share "/PARENT" offered by user "Brian" using the sharing API
    Then as "Carol" file "/Shares/fileToShare.txt" should exist
    And as "Carol" folder "/Shares/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
