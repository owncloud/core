@cli @skipOnLDAP
Feature: edit users
  As an admin
  I want to be able to edit user information
  So that I can keep the user information up-to-date

  @issue-23603
  Scenario: the administrator can edit a user quota
    Given user "brand-new-user" has been created with default attributes and small skeleton files
    When the administrator changes the quota of user "brand-new-user" to "12MB" using the occ command
    Then the command should have failed with exit code 1
    #Then the command should have been successful
    And the command output should contain the text 'Supported keys are email, displayname'
    #And the command output should contain the text 'The quota of brand-new-user updated to 12 MB'
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | quota definition | default |
    #And the user attributes returned by the API should include
    #  | quota definition | 12 MB |
