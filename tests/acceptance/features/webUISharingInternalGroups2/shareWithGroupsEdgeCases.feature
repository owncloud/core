@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  Scenario Outline: sharing  files and folder with an internal problematic group name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | <group>   |
    And user "user1" has been added to group "<group>"
    And user "user2" has been added to group "<group>"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "<group>" using the webUI
    And the user shares file "testimage.jpg" with group "<group>" using the webUI
    And the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "User Three" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be listed on the webUI
    And folder "simple-folder" should be marked as shared with "<group>" by "User Three" on the webUI
    And file "testimage.jpg" should be listed on the webUI
    And file "testimage.jpg" should be marked as shared with "<group>" by "User Three" on the webUI
    Examples:
      | group     |
      | ?\?@#%@,; |
      | नेपाली    |

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a user and a group with same name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | user1     |
    And user "user1" has been added to group "user1"
    And user "user2" has been added to group "user1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user shares folder "simple-folder" with group "user1" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "user1" by "User Three" on the webUI

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: Share file with a group and a user with same name
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | user1     |
    And user "user1" has been added to group "user1"
    And user "user2" has been added to group "user1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "user1" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "user1" by "User Three" on the webUI

  Scenario: Share file with a user and again with a group with same name but different case
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | User1     |
    And user "user2" has been added to group "User1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with user "User One" using the webUI
    And the user shares folder "simple-folder" with group "User1" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "User1" by "User Three" on the webUI

  Scenario: Share file with a group and again with a user with same name but different case
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | User1     |
    And user "user2" has been added to group "User1"
    And user "user3" has logged in using the webUI
    When the user shares folder "simple-folder" with group "User1" using the webUI
    And the user shares folder "simple-folder" with user "User One" using the webUI
    When the user re-logs in as "user1" using the webUI
    Then folder "simple-folder" should be marked as shared by "User Three" on the webUI
    When the user re-logs in as "user2" using the webUI
    Then folder "simple-folder" should be marked as shared with "User1" by "User Three" on the webUI

  Scenario: Share file with a user and a group with same name and change sharing permissions of the group
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of group "user1" for "simple-folder" using the webUI to
	  | delete | no |
	  | share  | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
	  | delete | yes |
	  | share  | yes |
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 31             |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "user1"
	  | delete | no |
	  | share  | no |
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 7              |

  Scenario: Share file with a user and a group with same name and change sharing permissions of the user
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
	  | delete | no |
	  | share  | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
	  | delete | no |
	  | share  | no |
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 7              |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "user1"
	  | delete | yes |
	  | share  | yes |
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 31             |

  Scenario: Share file with a user and a group with same name and change sharing permissions of the both user and group
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
	  | edit    | no |
	  | create  | no |
	And the user sets the sharing permissions of group "user1" for "simple-folder" using the webUI to
	  | delete | no |
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
	  | edit    | no |
	  | create  | no |
	And the following permissions are seen for "simple-folder" in the sharing dialog for group "user1"
	  | delete | no |
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 17             |
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 23             |

  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the group
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of group "user1" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of group "user1" to "+230 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for group "user1"
	  | share | no |
	And the expiration date input field should be "+230 days" for the group "user1" in the share dialog
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 15             |
	  | expiration  | +230 days      |
	And the expiration date input field should be empty for the user "User One" in the share dialog
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 31             |
	  | expiration  |                |

  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of the user
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of user "User One" to "+5 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
	  | share | no |
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 15             |
	  | expiration  | +5 days        |
	And the expiration date input field should be "+5 days" for the user "User One" in the share dialog
	And the expiration date input field should be empty for the group "user1" in the share dialog
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 31             |
	  | expiration  |                |

  Scenario: Share file with a user and a group with same name and change sharing permissions and expiration date of both user and group
	Given these users have been created with default attributes and without skeleton files:
	  | username |
	  | user1    |
	And user "user2" has been created with default attributes and skeleton files
	And these groups have been created:
	  | groupname |
	  | user1     |
	And user "user1" has been added to group "user1"
	And user "user2" has shared folder "/simple-folder" with user "user1"
	And user "user2" has shared folder "/simple-folder" with group "user1"
	And user "user2" has logged in using the webUI
	When the user sets the sharing permissions of user "User One" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of user "User One" to "+5 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for user "User One"
	  | share | no |
	And the expiration date input field should be "+5 days" for the user "User One" in the share dialog
	And the information for user "user1" about the received share of folder "simple-folder" should include
	  | share_type  | user           |
	  | file_target | /simple-folder |
	  | expiration  | +5 days        |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 15             |
	When the user sets the sharing permissions of group "user1" for "simple-folder" using the webUI to
	  | share | no |
	And the user changes expiration date for share of group "user1" to "+7 days" in the share dialog
	Then the following permissions are seen for "simple-folder" in the sharing dialog for group "user1"
	  | share | no |
	And the expiration date input field should be "+7 days" for the group "user1" in the share dialog
	And the information for group "user1" about the received share of folder "simple-folder" should include
	  | share_type  | group          |
	  | file_target | /simple-folder |
	  | expiration  | +7 days        |
	  | uid_owner   | user2          |
	  | share_with  | user1          |
	  | permissions | 15             |