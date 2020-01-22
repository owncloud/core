@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: resources shared with the same name are received with unique names

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario: unique target names for incoming shares
    Given using OCS API version "1"
    And these users have been created with default attributes and skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user0" has created folder "/foo"
    And user "user1" has created folder "/foo"
    When user "user0" shares folder "/foo" with user "user2" using the sharing API
    And user "user1" shares folder "/foo" with user "user2" using the sharing API
    Then user "user2" should see the following elements
      | /foo/       |
      | /foo%20(2)/ |

