@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis @issue-ocis-reva-11
Feature: resources shared with the same name are received with unique names

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |

  @smokeTest
  Scenario: unique target names for incoming shares
    Given user "user0" has created folder "/foo"
    And user "user1" has created folder "/foo"
    When user "user0" shares folder "/foo" with user "user2" using the sharing API
    And user "user1" shares folder "/foo" with user "user2" using the sharing API
    Then user "user2" should see the following elements
      | /foo/       |
      | /foo%20(2)/ |
