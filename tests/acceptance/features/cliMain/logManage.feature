@cli @skipOnLDAP
Feature: set log level
  As an admin
  I want to be able to manage the log level
  So that I set the log level suitable for each situation

  Scenario: Admin set the log level to Debug
    When the administrator sets the log level to "debug" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: Debug'

  Scenario: Admin set the log level to Info
    When the administrator sets the log level to "info" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: Info'

  Scenario: Admin set the log level to Warning
    When the administrator sets the log level to "warning" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: Warning'

  Scenario: Admin set the log level to Error
    When the administrator sets the log level to "error" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: Error'

  Scenario: Admin set the log level to Fatal
    When the administrator sets the log level to "fatal" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: Fatal'

  Scenario: Admin tries to set the log level to a non-valid value
    When the administrator sets the log level to "non-valid-value" using the occ command
    Then the command should have failed with exit code 1

  Scenario: Admin sets the timezone to GMT
    When the administrator sets the timezone to "GMT" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log timezone: GMT'

  Scenario: Admin sets the timezone to UTC
    When the administrator sets the timezone to "UTC" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log timezone: UTC'

  Scenario: Admin sets the timezone to a non-valid zone
    When the administrator sets the timezone to "non-valid-zone" using the occ command
Then the command should have failed with exit code 1