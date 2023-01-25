@api @files_sharing-app-required
Feature: share resources where the sharee receives the share in multiple ways

  # These are the bug demonstration scenarios for https://github.com/owncloud/core/issues/39347
  # Once the issue is fixed, delete this file and unskip all the respective tests tagged with @issue-39347
  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Share receiver renames the received group share and shares same folder through user share again
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    And user "Alice" has created a share with settings
      | path        | parent |
      | shareType   | group  |
      | shareWith   | grp    |
      | permissions | read   |
    When user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Brian" should be able to rename folder "/Shares/parent" to "/Shares/sharedParent"
    And user "Alice" should be able to share folder "parent" with user "Brian" with permissions "read" using the sharing API
    And user "Brian" should be able to accept pending share "/parent" offered by user "Alice"
    And as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  # Note: after fixing the bug, this scenario is no longer relevant.
  #       Brian should not get a chance to decline (or accept) the 2nd share of the resource from Alice
  Scenario Outline: Share receiver renames the received group share and declines another share of same folder through user share again
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    And user "Alice" has created a share with settings
      | path        | parent |
      | shareType   | group  |
      | shareWith   | grp    |
      | permissions | read   |
    When user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Brian" should be able to rename folder "/Shares/parent" to "/Shares/sharedParent"
    And user "Alice" should be able to share folder "parent" with user "Brian" with permissions "read" using the sharing API
    And user "Brian" should be able to decline pending share "/parent" offered by user "Alice"
    And as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Share receiver renames a group share and receives same resource through user share with additional permissions
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    And user "Alice" has created a share with settings
      | path        | parent |
      | shareType   | group  |
      | shareWith   | grp    |
      | permissions | read   |
    When user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Brian" should be able to rename folder "/Shares/parent" to "/Shares/sharedParent"
    And user "Alice" should be able to share folder "parent" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" should be able to accept pending share "/parent" offered by user "Alice"
    And as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    And as "Brian" file "Shares/parent/child/lorem.txt" should exist
    And user "Brian" should be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Share receiver renames a group share and receives same resource through user share with less permissions
    Given using OCS API version "<ocs_api_version> "
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    And user "Alice" has created a share with settings
      | path        | parent |
      | shareType   | group  |
      | shareWith   | grp    |
      | permissions | all    |
    When user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And user "Brian" should be able to rename folder "/Shares/parent" to "/Shares/sharedParent"
    And user "Alice" should be able to share folder "parent" with user "Brian" with permissions "read" using the sharing API
    And user "Brian" should be able to accept pending share "/parent" offered by user "Alice"
    And as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    And as "Brian" file "Shares/parent/child/lorem.txt" should exist
    And user "Brian" should be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
