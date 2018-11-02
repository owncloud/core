@cli @skipOnLDAP
Feature: edit users
  As an admin
  I want to be able to edit user information
  So that I can keep the user information up-to-date

  Scenario: the administrator can edit a user email
    Given user "brand-new-user" has been created
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The email address of brand-new-user updated to brand-new-user@example.com'
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | email | brand-new-user@example.com |

  Scenario: the administrator can edit a user display name
    Given user "brand-new-user" has been created
    When the administrator changes the display name of user "brand-new-user" to "A New User" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The displayname of brand-new-user updated to A New User'
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | displayname | A New User |

  @skip @issue-33093
  Scenario: the administrator can edit a user quota
    Given user "brand-new-user" has been created
    When the administrator changes the quota of user "brand-new-user" to "12MB" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'The quota of brand-new-user updated to 12 MB'
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | quota definition | 12 MB |