@api
Feature:
  Scenario Outline: sharing again an own file while belonging to a group
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |
