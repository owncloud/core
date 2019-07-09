@api @TestAlsoOnExternalUserBackend
Feature: set file properties
  As a user
  I want to be able to set meta-information about files
  So that I can reccord file meta-information (detailed requirement TBD)

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: Setting custom DAV property and reading it
    Given using <dav_version> DAV path
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testcustomprop.txt"
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt" to "veryCustomPropValue"
    When user "user0" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "veryCustomPropValue"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-32670
  Scenario Outline: Setting custom complex DAV property and reading it
    Given using <dav_version> DAV path
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testcustomprop.txt"
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt" to "<foo xmlns='http://bar'/>"
    When user "user0" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "Object"
    #Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "<foo xmlns='http://bar'/>"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Setting custom DAV property and reading it after the file is renamed
    Given using <dav_version> DAV path
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testcustompropwithmove.txt"
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropwithmove.txt" to "valueForMovetest"
    And user "user0" has moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
    When user "user0" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/catchmeifyoucan.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "valueForMovetest"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Setting custom DAV property on a shared file as an owner and reading as a recipient
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testcustompropshared.txt"
    And user "user0" has created a share with settings
      | path        | testcustompropshared.txt |
      | shareType   | 0                        |
      | permissions | 31                       |
      | shareWith   | user1                    |
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropshared.txt" to "valueForSharetest"
    When user "user1" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropshared.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "valueForSharetest"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Setting custom DAV property using one endpoint and reading it with other endpoint
    Given using <action_dav_version> DAV path
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testnewold.txt"
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testnewold.txt" to "lucky"
    And using <other_dav_version> DAV path
    When user "user0" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testnewold.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "lucky"
    Examples:
      | action_dav_version | other_dav_version |
      | old                | new               |
      | new                | old               |

  Scenario: Setting custom DAV property using an old endpoint and reading it using a new endpoint
    Given using old DAV path
    Given user "user0" has uploaded file "filesForUpload/textfile.txt" to "/testoldnew.txt"
    And user "user0" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testoldnew.txt" to "constant"
    And using new DAV path
    When user "user0" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testoldnew.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "constant"
