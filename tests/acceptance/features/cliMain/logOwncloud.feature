@cli @skipOnLDAP
Feature: manipulate ownCloud logging backend
  As an admin
  I want to be able to manipulate ownCloud logging backend
  So that I set the loggging backend configuration suitable for each situation
  Scenario: Admin enables ownCloud logging backend
    When the administrator enables the ownCloud backend using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log backend ownCloud: enabled'
  Scenario Outline: Admin sets the log file path
    When the administrator sets the log file path to "<path>" using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log file: <path>'
      Examples:
      | path |
      | /mnt/data/files/owncloud.log |
      | file.log |
  Scenario Outline: Admin sets the file size for log rotation
    When the administrator sets the file size to <size> for using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Rotate at: <output>'
    Examples:
      | size | output |
      | 100 | 100 B |
      | 100MB | 100 MB |