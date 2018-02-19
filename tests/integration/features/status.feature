Feature: Status

  Scenario: Status.php is correct
      When the admin requests status.php using the API
      Then the status.php response should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"$CURRENT_VERSION","versionstring":"$CURRENT_VERSION_STRING","edition":"Community","productname":"ownCloud"}
      """
