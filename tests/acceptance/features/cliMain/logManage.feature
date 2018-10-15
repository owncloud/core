@cli @skipOnLDAP
Feature: manage logging configuration
  As an admin
  I want to be able to manage the logging configuration
  So that I set the logging configuration suitable for each situation

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

  Scenario: Admin sets the backend to owncloud
    When the administrator sets the backend to "owncloud" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Enabled logging backend: owncloud'

  Scenario: Admin sets the backend to syslog
    When the administrator sets the backend to "syslog" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Enabled logging backend: syslog'

  Scenario: Admin sets the backend to errorlog
    When the administrator sets the backend to "errorlog" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Enabled logging backend: errorlog'

  Scenario: Admin sets the backend to a non-valid backend
    When the administrator sets the backend to "non-valid-backend" using the occ command
    Then the command should have failed with exit code 1