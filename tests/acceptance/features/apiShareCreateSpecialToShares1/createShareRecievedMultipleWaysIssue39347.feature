@api @files_sharing-app-required @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @notToImplementOnOCIS
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
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |


  Scenario Outline: Share receiver renames the received group share and declines another share of same folder through user share again
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" using the sharing API
    And user "Brian" declines share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should not exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  Scenario Outline: Share receiver renames a group share and receives same resource through user share with additional permissions
    Given using OCS API version "<ocs_api_version>"
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    And as "Brian" file "Shares/parent/child/lorem.txt" should exist
    And user "Brian" should not be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  Scenario Outline:Share receiver renames a group share and receives same resource through user share with additional permissions
    Given using OCS API version "<ocs_api_version> "
    And group "grp" has been created
    And user "Brian" has been added to group "grp"
    And user "Alice" has been added to group "grp"
    And user "Alice" has created folder "parent"
    And user "Alice" has created folder "parent/child"
    And user "Alice" has uploaded file with content "Share content" to "parent/child/lorem.txt"
    When user "Alice" shares folder "parent" with group "grp" with permissions "all" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    And user "Brian" moves folder "/Shares/parent" to "/Shares/sharedParent" using the WebDAV API
    And user "Alice" shares folder "parent" with user "Brian" with permissions "read" using the sharing API
    And user "Brian" accepts share "/parent" offered by user "Alice" using the sharing API
    Then as "Brian" folder "Shares/parent" should exist
    And as "Brian" folder "Shares/sharedParent" should not exist
    And as "Brian" file "Shares/sharedParent/child/lorem.txt" should not exist
    And as "Brian" file "Shares/parent/child/lorem.txt" should exist
    And user "Brian" should not be able to delete file "Shares/parent/child/lorem.txt"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |
