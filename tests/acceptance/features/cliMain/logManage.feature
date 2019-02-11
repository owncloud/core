@cli @skipOnLDAP
Feature: manage logging configuration
  As an admin
  I want to be able to manage the logging configuration
  So that I set the logging configuration suitable for each situation

  Scenario Outline: Admin sets a valid log level
    When the administrator sets the log level to <loglevel> using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log level: <loglevel>'
    Examples:
      | loglevel |
      | Debug    |
      | Info     |
      | Warning  |
      | Error    |
      | Fatal    |

  Scenario Outline: Admin sets a non-valid log level
    When the administrator sets the log level to <loglevel> using the occ command
    Then the command should have failed with exit code 1
    Examples:
      | loglevel |
      | nonvalid |

  Scenario Outline: Admin sets a valid timezone
    When the administrator sets the timezone to <timezone> using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Log timezone: <timezone>'
    Examples:
      | timezone |
      | GMT      |
      | UTC      |

  Scenario Outline: Admin sets a non-valid timezone
    When the administrator sets the timezone to <timezone> using the occ command
    Then the command should have failed with exit code 1
    Examples:
      | timezone |
      | nonvalid |

  Scenario Outline: Admin sets the backend to a valid backend
    When the administrator sets the backend to <backend> using the occ command
    Then the command should have been successful
    And the command output should contain the text 'Enabled logging backend: <backend>'
    Examples:
      | backend  |
      | owncloud |
      | syslog   |
      | errorlog |

  Scenario Outline: Admin sets the backend to a non-valid backend
    When the administrator sets the backend to <backend> using the occ command
    Then the command should have failed with exit code 1
    Examples:
      | backend  |
      | nonvalid |
