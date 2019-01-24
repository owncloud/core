@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"

  @skipOnLDAP
  Scenario: 01 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    Then the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    And as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 02 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 03 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 04 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 05 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 06 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 07 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 08 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 09 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 10 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 11 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 12 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 13 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 14 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 15 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 16 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 17 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 18 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 19 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: 20 Merging shares for recipient when shared from outside with group then user and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    And user "user0" has shared folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1"
    And user "user1" has moved folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And the HTTP status code should be "200"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare"
    And as "user1" report existence of folder "/merge-test-outside-groups-renamebeforesecondshare-renamed"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should exist
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP
  Scenario: shared from outside with group and recipient renames
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    And user "user1" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    #And user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist

  @skipOnLDAP @user_ldap-issue-274
  Scenario: Merging shares for recipient when shared from outside with user then group and recipient renames in between
    Given user "user0" has created folder "/merge-test-outside-groups-renamebeforesecondshare"
    When user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with user "user1" using the sharing API
    And user "user1" moves folder "/merge-test-outside-groups-renamebeforesecondshare" to "/merge-test-outside-groups-renamebeforesecondshare-renamed" using the WebDAV API
    And user "user0" shares folder "/merge-test-outside-groups-renamebeforesecondshare" with group "grp1" using the sharing API
    Then as user "user1" folder "/merge-test-outside-groups-renamebeforesecondshare-renamed" should contain a property "oc:permissions" with value "SRDNVCK"
    And as "user1" folder "/merge-test-outside-groups-renamebeforesecondshare" should not exist