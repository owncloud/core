@api @notToImplementOnOCIS
Feature: current oC10 behavior for issue-38027

  Scenario Outline: sharee file favorite state should not change the favorite state of sharer
    Given using <dav_version> DAV path
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "/PARENT/parent.txt" with user "Brian"
    And user "Brian" has accepted share "/PARENT/parent.txt" offered by user "Alice"
    # Brian should not see the full path of the file on the sharer side
    # And user "Brian" has accepted share "/parent.txt" offered by user "Alice"
    When user "Brian" favorites element "/Shares/parent.txt" using the WebDAV API
    Then the HTTP status code should be "207"
    And as user "Alice" file "/PARENT/parent.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |
