@webUI @insulated @disablePreviews
Feature: manage user quota
  As an admin
  I want to manage user quota
  So that users can only take up a certain amount of storage space

  Background:
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user1    |
    And the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario Outline: change quota to a valid value
    Given the administrator has set the quota of user "user1" to "<start_quota>" using the webUI
    When the administrator changes the quota of user "user1" to "<wished_quota>" using the webUI
    And the administrator reloads the users page
    Then the quota of user "user1" should be set to "<expected_quota>" on the webUI
    Examples:
      | start_quota | wished_quota | expected_quota |
      | Unlimited   | 5 GB         | 5 GB           |
      | 1 GB        | 5 GB         | 5 GB           |
      | 5 GB        | Unlimited    | Unlimited      |
      | 1 GB        | Unlimited    | Unlimited      |
      | Unlimited   | 5.5 GB       | 5.5 GB         |
      | Unlimited   | 5B           | 5 B            |
      | Unlimited   | 55kB         | 55 KB          |
      | Unlimited   | 45Kb         | 45 KB          |

  @skipOnOcV10.0.3
  Scenario: change quota to a valid value that do not work on 10.0.3
    Given the administrator has set the quota of user "user1" to "Unlimited" using the webUI
    When the administrator changes the quota of user "user1" to "0 Kb" using the webUI
    And the administrator reloads the users page
    Then the quota of user "user1" should be set to "0 B" on the webUI

  Scenario Outline: change quota to an invalid value
    When the administrator changes the quota of user "user1" to the invalid string "<wished_quota>" using the webUI
    Then a notification should be displayed on the webUI with the text 'Invalid quota value "<wished_quota>"'
    And the quota of user "user1" should be set to "Default" on the webUI
    Examples:
      | wished_quota |
      | stupidtext   |
      | 34,54GB      |
      | 30/40GB      |
      | 30/40        |
      | 3+56 B       |
      | -1 B         |
