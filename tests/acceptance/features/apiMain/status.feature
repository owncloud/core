@api @issue-ocis-reva-65 @issue-ocis-reva-97
Feature: Status

  @smokeTest @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Status.php is correct
    When the administrator requests status.php
    Then the status.php response should match with
      """
      {"installed":true,"maintenance":false,"needsDbUpgrade":false,"version":"$CURRENT_VERSION","versionstring":"$CURRENT_VERSION_STRING","edition":"$EDITION","productname":"$PRODUCTNAME","product":"$PRODUCT"}
      """
