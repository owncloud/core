@webUI @insulated @disablePreviews
Feature: manage user quota
  As an admin
  I want to manage user quota
  So that users can only take up a certain amount of storage space

  Background:
    Given these users have been created without skeleton files and not initialized:
      | username |
      | Alice    |
    And the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario Outline: change quota to a valid value
    Given the administrator has set the quota of user "Alice" to "<start_quota>"
    When the administrator changes the quota of user "Alice" to "<wished_quota>" using the webUI
    And the administrator reloads the users page
    Then the quota of user "Alice" should be set to "<expected_quota>" on the webUI
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

  Scenario: change quota to a valid value that do not work on 10.0.3
    Given the administrator has set the quota of user "Alice" to "Unlimited"
    When the administrator changes the quota of user "Alice" to "0 Kb" using the webUI
    And the administrator reloads the users page
    Then the quota of user "Alice" should be set to "0 B" on the webUI

  Scenario Outline: change quota to an invalid value
    When the administrator changes the quota of user "Alice" to the invalid string "<wished_quota>" using the webUI
    Then a notification should be displayed on the webUI with the text 'Invalid quota value "<wished_quota>"'
    And the quota of user "Alice" should be set to "Default" on the webUI
    Examples:
      | wished_quota |
      | stupidtext   |
      | 34,54GB      |
      | 30/40GB      |
      | 30/40        |
      | 3+56 B       |
      | -1 B         |
