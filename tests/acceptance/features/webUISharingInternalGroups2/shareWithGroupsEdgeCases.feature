@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Background:
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | Alice    |
	  | Brian    |
	And user "Carol" has been created with default attributes and skeleton files

  Scenario Outline: sharing  files and folder with an internal problematic group name
    Given these groups have been created:
      | groupname |
      | <group>   |
    And user "Alice" has been added to group "<group>"
    And user "Brian" has been added to group "<group>"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group>" using the webUI
    And the user shares file "testimage.jpg" with group "<group>" using the webUI
    And the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "Carol" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "Carol" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "Carol" on the webUI
    Examples:
      | group     |
      | ?\?@#%@,; |
      | नेपाली    |

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a user and a group with same name
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Alice" has been added to group "Alice"
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user shares folder "simple-folder" with group "Alice" using the webUI
    When the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a group and a user with same name
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Alice" has been added to group "Alice"
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    When the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI

  Scenario: Share file with a user and again with a group with same name but different case
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with user "Alice" using the webUI
    And the user shares folder "simple-folder" with group "Alice" using the webUI
    When the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI

  Scenario: Share file with a group and again with a user with same name but different case
    Given these groups have been created:
      | groupname |
      | Alice     |
    And user "Brian" has been added to group "Alice"
    And user "Carol" has logged in using the webUI
    When the user shares folder "simple-folder" with group "Alice" using the webUI
    And the user shares folder "simple-folder" with user "Alice" using the webUI
    When the user re-logs in as "Alice" using the webUI
    Then folder "simple-folder" should be marked as shared by "Carol" on the webUI
    When the user re-logs in as "Brian" using the webUI
    Then folder "simple-folder" should be marked as shared with "Alice" by "Carol" on the webUI

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions of the group
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
	  | delete | no |
	  | share  | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
	  | delete | yes |
	  | share  | yes |
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 31             |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
	  | delete | no |
	  | share  | no |
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 7              |

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions of the user
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
	  | delete | no |
	  | share  | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
	  | delete | no |
	  | share  | no |
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 7              |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
	  | delete | yes |
	  | share  | yes |
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 31             |

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions of both user and group
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
	  | edit    | no |
	  | create  | no |
	And the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
	  | delete | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
	  | edit    | no |
	  | create  | no |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
	  | delete | no |
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 17             |
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 23             |

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the group
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of group "Alice" to "+230 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
	  | share | no |
	And the expiration date input field should be "+230 days" for the group "Alice" in the share dialog
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 15             |
	  | expiration  | +230 days      |
	And the expiration date input field should be empty for the user "Alice" in the share dialog
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 31             |
	  | expiration  |                |

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the user
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of user "Alice" to "+5 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
	  | share | no |
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 15             |
	  | expiration  | +5 days        |
	And the expiration date input field should be "+5 days" for the user "Alice" in the share dialog
	And the expiration date input field should be empty for the group "Alice" in the share dialog
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 31             |
	  | expiration  |                |

  @skipOnOcV10.3
  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of both user and group
	Given these groups have been created:
	  | groupname |
	  | Alice     |
	And user "Brian" has been added to group "Alice"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "Alice"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
	  | edit    | no |
	  | create  | no |
	And the user changes expiration date for share of user "Alice" to "+5 days" in the share dialog
	And the user sets the sharing permissions of group "Alice" for "simple-folder" using the webUI to
	  | delete | no |
	And the user changes expiration date for share of group "Alice" to "+7 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "Alice"
	  | edit    | no |
	  | create  | no |
	And the expiration date input field should be "+5 days" for the user "Alice" in the share dialog
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | expiration  | +5 days        |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 17             |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "Alice"
	  | delete | no |
	And the expiration date input field should be "+7 days" for the group "Alice" in the share dialog
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | expiration  | +7 days        |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | permissions | 23             |

  @skipOnOcV10.3
  Scenario: Check share permissions and expiration date of a group and the member of the same group
	Given these groups have been created:
	  | groupname |
	  | grp1      |
	And user "Alice" has been added to group "grp1"
	And user "Brian" has been added to group "grp1"
	And user "Carol" has shared folder "/simple-folder" with user "Alice"
	And user "Carol" has shared folder "/simple-folder" with group "grp1"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of group "grp1" for "simple-folder" using the webUI to
	  | edit    | no |
	  | create  | no |
	And the user changes expiration date for share of group "grp1" to "+5 days" in the share dialog
	Then the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | grp1           |
	  | expiration  | +5 days        |
	  | permissions | 17             |
	And the information for user "Alice" about the received share of folder "simple-folder" shared with user should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | Carol          |
	  | share_with  | Alice          |
	  | expiration  |                |
	  | permissions | 31             |

  @skipOnOcV10.3
  Scenario: share with multiple groups and change the sharing permissions and expiration date
	Given these groups have been created:
	  | groupname |
	  | grp1      |
	  | grp2      |
	And user "Alice" has been added to group "grp1"
	And user "Brian" has been added to group "grp2"
	And user "Carol" has shared folder "/simple-folder" with group "grp1"
	And user "Carol" has shared folder "/simple-folder" with group "grp2"
	And user "Carol" has logged in using the webUI
	When the user sets the sharing permissions of group "grp1" for "simple-folder" using the webUI to
	  | edit    | no |
	  | create  | no |
	And the user changes expiration date for share of group "grp1" to "+5 days" in the share dialog
	And the user sets the sharing permissions of group "grp2" for "simple-folder" using the webUI to
	  | share    | no |
	  | delete   | no |
	And the user changes expiration date for share of group "grp2" to "+7 days" in the share dialog
	Then the information for user "Alice" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | expiration  | +5 days        |
	  | uid_owner   | Carol          |
	  | share_with  | grp1           |
	  | permissions | 17             |
	And the information for user "Brian" about the received share of folder "simple-folder" shared with group should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | expiration  | +7 days        |
	  | uid_owner   | Carol          |
	  | share_with  | grp2           |
	  | permissions | 7              |
