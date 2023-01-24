@api @files_sharing-app-required
Feature: Exclude groups from receiving shares
  As an admin
  I want to exclude groups from receiving shares
  So that users do not mistakenly share with groups they should not e.g. huge meta groups

  Background:
    Given these users have been created with default attributes and without skeleton files:
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
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "fileToShare.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/fileToShare.txt" should not exist
    When user "Alice" shares folder "PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT" should not exist
    When user "Alice" shares file "fileToShare.txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then as "David" file "/fileToShare.txt" should exist
    And as "David" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |


  Scenario Outline: exclude multiple groups from receiving shares stops the user to share with any of them
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And the administrator adds group "grp2" to the exclude groups from receiving shares list using the occ command
    And the administrator adds group "grp3" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "fileToShare.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/fileToShare.txt" should not exist
    When user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT" should not exist
    When user "Alice" shares folder "PARENT/CHILD" with group "grp3" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/CHILD" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |


  Scenario Outline: user cannot reshare a received share with a group that is excluded from receiving shares but can share with other groups
    Given using OCS API version "<ocs_api_version>"
    And user "Carol" has created folder "PARENT"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And user "Carol" has shared file "fileToShare.txt" with user "Alice"
    And user "Carol" has shared folder "PARENT" with user "Alice"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "fileToShare.txt" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" file "/fileToShare.txt" should not exist
    When user "Alice" shares folder "PARENT" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And the OCS status message should be "The group is blacklisted for sharing"
    And as "Brian" folder "/PARENT" should not exist
    When user "Alice" shares file "fileToShare.txt" with group "grp2" using the sharing API
    And user "Alice" shares folder "PARENT" with group "grp2" using the sharing API
    Then as "David" file "/fileToShare.txt" should exist
    And as "David" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |


  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares still works
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "fileToShare.txt" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with user "Brian" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" file "/fileToShare.txt" should exist
    And as "Brian" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: sharing with a user that is part of a group that is excluded from receiving shares using an other group works
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And group "grp3" has been created
    And user "Brian" has been added to group "grp3"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Alice" shares file "fileToShare.txt" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Alice" shares folder "PARENT" with group "grp3" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" file "/fileToShare.txt" should exist
    And as "Brian" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: a user that is part of a group that is excluded from receiving shares still can initiate shares
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has created folder "PARENT"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    When the administrator adds group "grp1" to the exclude groups from receiving shares list using the occ command
    And user "Brian" shares file "fileToShare.txt" with user "Carol" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" shares folder "PARENT" with user "Carol" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Carol" file "/fileToShare.txt" should exist
    And as "Carol" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
