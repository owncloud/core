@api @files_sharing-app-required
Feature: the folder for received shares does not exist for a new user
  On ownCloud10 with the folder for received shares set, for example, to "Shares"
  A user should not see a "Shares" folder when the user is first created.

  Scenario: the Shares folder does not exist before the first share is received
    Given the administrator has set the default folder for received shares to "Shares"
    When the administrator creates user "Alice" using the provisioning API
    And the administrator creates user "Brian" using the provisioning API
    Then as "Alice" folder "/Shares" should not exist
    And as "Brian" folder "/Shares" should not exist
