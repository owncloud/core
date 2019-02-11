@cli @skipOnLDAP
Feature: change background jobs mode
  As an admin
  I want to be able to change background jobs modes
  So that I use different background jobs

  Scenario: change background jobs mode to cron
    Given the administrator has changed the background jobs mode to "ajax"
    When the administrator changes the background jobs mode to "cron" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Set mode for background jobs to 'cron'"
    And the background jobs mode should be "cron"

  Scenario: change background jobs mode to ajax
    Given the administrator has changed the background jobs mode to "cron"
    When the administrator changes the background jobs mode to "ajax" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Set mode for background jobs to 'ajax'"
    And the background jobs mode should be "ajax"

  Scenario: change background jobs mode to webcron
    Given the administrator has changed the background jobs mode to "cron"
    When the administrator changes the background jobs mode to "webcron" using the occ command
    Then the command should have been successful
    And the command output should contain the text "Set mode for background jobs to 'webcron'"
    And the background jobs mode should be "webcron"

  Scenario: admin tries to change background jobs to an invalid mode
    Given the administrator has changed the background jobs mode to "cron"
    When the administrator changes the background jobs mode to "new-mode" using the occ command
    Then the command should have failed with exit code 1
    And the background jobs mode should be "cron"