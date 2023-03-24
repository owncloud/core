@api @files_sharing-app-required
Feature: sharing

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"

  @smokeTest
  Scenario: Merging shares for recipient when shared from outside with group and member
    Given user "Alice" has created folder "/merge-test-outside"
    When user "Alice" shares folder "/merge-test-outside" with group "grp1" using the sharing API
    And user "Alice" shares folder "/merge-test-outside" with user "Brian" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as "Brian" folder "/merge-test-outside" should exist
    And as "Brian" folder "/merge-test-outside (2)" should not exist


  Scenario: Merging shares for recipient when shared from outside with group and member with different permissions
    Given user "Alice" has created folder "/merge-test-outside-perms"
    When user "Alice" shares folder "/merge-test-outside-perms" with group "grp1" with permissions "read" using the sharing API
    And user "Alice" shares folder "/merge-test-outside-perms" with user "Brian" with permissions "all" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-outside-perms" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "Brian" folder "/merge-test-outside-perms (2)" should not exist


  Scenario: Merging shares for recipient when shared from outside with two groups
    Given group "grp2" has been created
    And user "Brian" has been added to group "grp2"
    And user "Alice" has created folder "/merge-test-outside-twogroups"
    When user "Alice" shares folder "/merge-test-outside-twogroups" with group "grp1" using the sharing API
    And user "Alice" shares folder "/merge-test-outside-twogroups" with group "grp2" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as "Brian" folder "/merge-test-outside-twogroups" should exist
    And as "Brian" folder "/merge-test-outside-twogroups (2)" should not exist


  Scenario: Merging shares for recipient when shared from outside with two groups with different permissions
    Given group "grp2" has been created
    And user "Brian" has been added to group "grp2"
    And user "Alice" has created folder "/merge-test-outside-twogroups-perms"
    When user "Alice" shares folder "/merge-test-outside-twogroups-perms" with group "grp1" with permissions "read" using the sharing API
    And user "Alice" shares folder "/merge-test-outside-twogroups-perms" with group "grp2" with permissions "all" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-outside-twogroups-perms" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "Brian" folder "/merge-test-outside-twogroups-perms (2)" should not exist


  Scenario: Merging shares for recipient when shared from outside with two groups and member
    Given group "grp2" has been created
    And user "Brian" has been added to group "grp2"
    And user "Alice" has created folder "/merge-test-outside-twogroups-member-perms"
    When user "Alice" shares folder "/merge-test-outside-twogroups-member-perms" with group "grp1" with permissions "read" using the sharing API
    And user "Alice" shares folder "/merge-test-outside-twogroups-member-perms" with group "grp2" with permissions "all" using the sharing API
    And user "Alice" shares folder "/merge-test-outside-twogroups-member-perms" with user "Brian" with permissions "read" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-outside-twogroups-member-perms" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "Brian" folder "/merge-test-outside-twogroups-member-perms (2)" should not exist


  Scenario: Merging shares for recipient when shared from inside with group
    Given user "Brian" has created folder "/merge-test-inside-group"
    When user "Brian" shares folder "/merge-test-inside-group" with group "grp1" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as "Brian" folder "/merge-test-inside-group" should exist
    And as "Brian" folder "/merge-test-inside-group (2)" should not exist


  Scenario: Merging shares for recipient when shared from inside with two groups
    Given group "grp2" has been created
    And user "Brian" has been added to group "grp2"
    And user "Brian" has created folder "/merge-test-inside-twogroups"
    When user "Brian" shares folder "/merge-test-inside-twogroups" with group "grp1" using the sharing API
    And user "Brian" shares folder "/merge-test-inside-twogroups" with group "grp2" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as "Brian" folder "/merge-test-inside-twogroups" should exist
    And as "Brian" folder "/merge-test-inside-twogroups (2)" should not exist
    And as "Brian" folder "/merge-test-inside-twogroups (3)" should not exist


  Scenario: Merging shares for recipient when shared from inside with group with less permissions
    Given group "grp2" has been created
    And user "Brian" has been added to group "grp2"
    And user "Brian" has created folder "/merge-test-inside-twogroups-perms"
    When user "Brian" shares folder "/merge-test-inside-twogroups-perms" with group "grp1" using the sharing API
    And user "Brian" shares folder "/merge-test-inside-twogroups-perms" with group "grp2" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-inside-twogroups-perms" should contain a property "oc:permissions" with value "RDNVCK" or with value "RMDNVCK"
    And as "Brian" folder "/merge-test-inside-twogroups-perms (2)" should not exist
    And as "Brian" folder "/merge-test-inside-twogroups-perms (3)" should not exist


  Scenario: Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "Alice" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "Alice" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    And user "Brian" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    And user "Alice" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "Brian" using the sharing API
    Then the HTTP status code of responses on each endpoint should be "200, 201, 200" respectively
    #OCS status code is checked only for Sharing API request
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "Brian" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist


  Scenario: Merging shares for recipient when shared from outside with user then group and recipient renames in between
    Given user "Alice" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "Alice" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "Brian" using the sharing API
    And user "Brian" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    And user "Alice" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    Then the HTTP status code of responses on each endpoint should be "200, 201, 200" respectively
    And the OCS status code of responses on all endpoints should be "100"
    And as user "Brian" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "Brian" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist
