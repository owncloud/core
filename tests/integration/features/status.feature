Feature: Status

  Scenario: Status.php is correct
      When requesting status.php
      Then the json responded should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"10.0.3.3","versionstring":"10.0.3","edition":"Community","productname":"ownCloud"}
      """
