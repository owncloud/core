@api @files_sharing-app-required
Feature: resources shared with the same name are received with unique names

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |

  @smokeTest @issue-ocis-2131
  Scenario Outline: unique target names for incoming shares
    Given user "Alice" has created folder "/foo"
    And user "Brian" has created folder "/foo"
    When user "Alice" shares folder "/foo" with user "Carol" using the sharing API
    And user "Carol" accepts share "/foo" offered by user "Alice" using the sharing API
    And user "Brian" shares folder "/foo" with user "Carol" using the sharing API
    And user "Carol" accepts share "/foo" offered by user "Brian" using the sharing API
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And user "Carol" should see the following elements
      | Shares/foo/ |
      | <share>     |
    Examples:
      | share            |
      | /Shares/foo (2)/ |