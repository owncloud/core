Feature: Status

  Scenario: Status.php is correct
      When requesting status.php
      Then the status.php with versions fixed responded should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"X.X.X.X","versionstring":"X.X.X","edition":"Community","productname":"ownCloud"}
      """
