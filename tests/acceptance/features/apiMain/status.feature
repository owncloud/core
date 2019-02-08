@api
Feature: Status

  @smokeTest
  Scenario: Status.php is correct
    When the administrator requests status.php
    Then the status.php response should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"$CURRENT_VERSION","versionstring":"$CURRENT_VERSION_STRING","edition":"$EDITION","productname":"$PRODUCTNAME"}
      """
