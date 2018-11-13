@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created
    And user "user1" has been created
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"

  @smokeTest
  Scenario: Merging shares for recipient when shared from outside with group and member
    Given user "user0" has created a folder "/merge-test-outside"
    When user "user0" shares folder "/merge-test-outside" with group "grp1" using the sharing API
    And user "user0" shares folder "/merge-test-outside" with user "user1" using the sharing API
    Then as "user1" the folder "/merge-test-outside" should exist
    And as "user1" the folder "/merge-test-outside (2)" should not exist

  Scenario: Merging shares for recipient when shared from outside with group and member with different permissions
    Given user "user0" has created a folder "/merge-test-outside-perms"
    When user "user0" shares folder "/merge-test-outside-perms" with group "grp1" with permissions 1 using the sharing API
    And user "user0" shares folder "/merge-test-outside-perms" with user "user1" with permissions 31 using the sharing API
    Then as user "user1" the folder "/merge-test-outside-perms" should contain a property "{http://owncloud.org/ns}permissions" with value "SRDNVCK"
    And as "user1" the folder "/merge-test-outside-perms (2)" should not exist

  Scenario: Merging shares for recipient when shared from outside with two groups
    Given group "grp4" has been created
    And user "user1" has been added to group "grp4"
    And user "user0" has created a folder "/merge-test-outside-twogroups"
    When user "user0" shares folder "/merge-test-outside-twogroups" with group "grp1" using the sharing API
    And user "user0" shares folder "/merge-test-outside-twogroups" with group "grp4" using the sharing API
    Then as "user1" the folder "/merge-test-outside-twogroups" should exist
    And as "user1" the folder "/merge-test-outside-twogroups (2)" should not exist

  Scenario: Merging shares for recipient when shared from outside with two groups with different permissions
    Given group "grp4" has been created
    And user "user1" has been added to group "grp4"
    And user "user0" has created a folder "/merge-test-outside-twogroups-perms"
    When user "user0" shares folder "/merge-test-outside-twogroups-perms" with group "grp1" with permissions 1 using the sharing API
    And user "user0" shares folder "/merge-test-outside-twogroups-perms" with group "grp4" with permissions 31 using the sharing API
    Then as user "user1" the folder "/merge-test-outside-twogroups-perms" should contain a property "{http://owncloud.org/ns}permissions" with value "SRDNVCK"
    And as "user1" the folder "/merge-test-outside-twogroups-perms (2)" should not exist

  Scenario: Merging shares for recipient when shared from outside with two groups and member
    Given group "grp4" has been created
    And user "user1" has been added to group "grp4"
    And user "user0" has created a folder "/merge-test-outside-twogroups-member-perms"
    When user "user0" shares folder "/merge-test-outside-twogroups-member-perms" with group "grp1" with permissions 1 using the sharing API
    And user "user0" shares folder "/merge-test-outside-twogroups-member-perms" with group "grp4" with permissions 31 using the sharing API
    And user "user0" shares folder "/merge-test-outside-twogroups-member-perms" with user "user1" with permissions 1 using the sharing API
    Then as user "user1" the folder "/merge-test-outside-twogroups-member-perms" should contain a property "{http://owncloud.org/ns}permissions" with value "SRDNVCK"
    And as "user1" the folder "/merge-test-outside-twogroups-member-perms (2)" should not exist

  Scenario: Merging shares for recipient when shared from inside with group
    Given user "user1" has created a folder "/merge-test-inside-group"
    When user "user1" shares folder "/merge-test-inside-group" with group "grp1" using the sharing API
    Then as "user1" the folder "/merge-test-inside-group" should exist
    And as "user1" the folder "/merge-test-inside-group (2)" should not exist

  Scenario: Merging shares for recipient when shared from inside with two groups
    Given group "grp4" has been created
    And user "user1" has been added to group "grp4"
    And user "user1" has created a folder "/merge-test-inside-twogroups"
    When user "user1" shares folder "/merge-test-inside-twogroups" with group "grp1" using the sharing API
    And user "user1" shares folder "/merge-test-inside-twogroups" with group "grp4" using the sharing API
    Then as "user1" the folder "/merge-test-inside-twogroups" should exist
    And as "user1" the folder "/merge-test-inside-twogroups (2)" should not exist
    And as "user1" the folder "/merge-test-inside-twogroups (3)" should not exist

  Scenario: Merging shares for recipient when shared from inside with group with less permissions
    Given group "grp4" has been created
    And user "user1" has been added to group "grp4"
    And user "user1" has created a folder "/merge-test-inside-twogroups-perms"
    When user "user1" shares folder "/merge-test-inside-twogroups-perms" with group "grp1" using the sharing API
    And user "user1" shares folder "/merge-test-inside-twogroups-perms" with group "grp4" using the sharing API
    Then as user "user1" the folder "/merge-test-inside-twogroups-perms" should contain a property "{http://owncloud.org/ns}permissions" with value "RDNVCK" or with value "RMDNVCK"
    And as "user1" the folder "/merge-test-inside-twogroups-perms (2)" should not exist
    And as "user1" the folder "/merge-test-inside-twogroups-perms (3)" should not exist

  @skip @issue-29016 @skipOnLDAP
  Scenario: Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created a folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    And user "user1" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    And user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    Then as user "user1" the folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "{http://owncloud.org/ns}permissions" with value "SRDNVCK"
    And as "user1" the folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP @user_ldap-issue-274
  Scenario: Merging shares for recipient when shared from outside with user then group and recipient renames in between
    Given user "user0" has created a folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And user "user1" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    And user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    Then as user "user1" the folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "{http://owncloud.org/ns}permissions" with value "SRDNVCK"
    And as "user1" the folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist