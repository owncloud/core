@api
Feature: set file properties
  As a user
  I want to be able to set meta-information about files
  So that I can reccord file meta-information (detailed requirement TBD)

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @issue-ocis-reva-276
  Scenario Outline: Setting custom DAV property and reading it
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/testcustomprop.txt"
    And user "Alice" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt" to "veryCustomPropValue"
    When user "Alice" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "veryCustomPropValue"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-217
  Scenario Outline: Setting custom complex DAV property and reading it
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/testcustomprop.txt"
    And user "Alice" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt" to "<foo xmlns='http://bar'/>"
    When user "Alice" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustomprop.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and complex value "<x2:foo xmlns:x2=\"http://bar\"/>"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-276
  Scenario Outline: Setting custom DAV property and reading it after the file is renamed
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/testcustompropwithmove.txt"
    And user "Alice" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropwithmove.txt" to "valueForMovetest"
    And user "Alice" has moved file "/testcustompropwithmove.txt" to "/catchmeifyoucan.txt"
    When user "Alice" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/catchmeifyoucan.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "valueForMovetest"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required @issue-ocis-reva-217
  Scenario Outline: Setting custom DAV property on a shared file as an owner and reading as a recipient
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/testcustompropshared.txt"
    And user "Alice" has created a share with settings
      | path        | testcustompropshared.txt |
      | shareType   | user                     |
      | permissions | all                      |
      | shareWith   | Brian                    |
    And user "Alice" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropshared.txt" to "valueForSharetest"
    When user "Brian" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testcustompropshared.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "valueForSharetest"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-ocis-reva-276
  Scenario Outline: Setting custom DAV property using one endpoint and reading it with other endpoint
    Given using <action_dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/testnewold.txt"
    And user "Alice" has set property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testnewold.txt" to "lucky"
    And using <other_dav_version> DAV path
    When user "Alice" gets a custom property "very-custom-prop" with namespace "x1='http://whatever.org/ns'" of file "/testnewold.txt"
    Then the response should contain a custom "very-custom-prop" property with namespace "x1='http://whatever.org/ns'" and value "lucky"
    Examples:
      | action_dav_version | other_dav_version |
      | old                | new               |
      | new                | old               |
