@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: enable user - current oC10 behavior for issue-31276
  As an admin
  I want to be able to enable a user
  So that I can give a user access to their files and resources again if they are now authorized for that

  @issue-31276
  Scenario: normal user tries to enable other user
    Given using OCS API version "2"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Brian" has been disabled
    When user "Alice" tries to enable user "Brian" using the provisioning API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Brian" should be disabled
