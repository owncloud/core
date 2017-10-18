Feature: Status

  Scenario: Status.php is correct
      When requesting status.php
      Then the status.php with versions fixed responded should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"$CURRENT_VERSION","versionstring":"$CURRENT_VERSION_STRING","edition":"Community","productname":"ownCloud"}
      """
