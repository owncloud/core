@api @files_sharing-app-required @notToImplementOnOCIS
Feature: resources shared with the same name are received with unique names

  Background:
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |

  @smokeTest
  Scenario: unique target names for incoming shares
    Given user "Alice" has created folder "/foo"
    And user "Brian" has created folder "/foo"
    When user "Alice" shares folder "/foo" with user "Carol" using the sharing API
    And user "Brian" shares folder "/foo" with user "Carol" using the sharing API
    Then user "Carol" should see the following elements
      | /foo/       |
      | /foo (2)/ |
