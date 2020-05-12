@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required @skipOnOcV10.0 @skipOnOcis @issue-ocis-reva-172
Feature: set timeouts of LOCKS

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  Scenario Outline: set timeout on folder
    Given using <dav-path> DAV path
    When user "Alice" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "Alice" gets the following properties of folder "PARENT" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Alice" gets the following properties of folder "PARENT/CHILD" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Alice" gets the following properties of folder "PARENT/parent.txt" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "user0" should match "<result>"
    Examples:
      | dav-path | timeout         | result          |
      | old      | second-999      | /Second-\d{3}$/ |
      | old      | second-99999999 | /Second-\d{5}$/ |
      | old      | infinite        | /Second-\d{5}$/ |
      | old      | second--1       | /Second-\d{5}$/ |
      | old      | second-0        | /Second-\d{4}$/ |
      | new      | second-999      | /Second-\d{3}$/ |
      | new      | second-99999999 | /Second-\d{5}$/ |
      | new      | infinite        | /Second-\d{5}$/ |
      | new      | second--1       | /Second-\d{5}$/ |
      | new      | second-0        | /Second-\d{4}$/ |

  @files_sharing-app-required
  Scenario Outline: as owner set timeout on folder as receiver check it
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has shared folder "PARENT" with user "Brian"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "Brian" gets the following properties of folder "PARENT (2)" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Brian" gets the following properties of folder "PARENT (2)/CHILD" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Brian" gets the following properties of folder "PARENT (2)/parent.txt" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "user0" should match "<result>"
    Examples:
      | dav-path | timeout         | result          |
      | old      | second-999      | /Second-\d{3}$/ |
      | old      | second-99999999 | /Second-\d{5}$/ |
      | old      | infinite        | /Second-\d{5}$/ |
      | old      | second--1       | /Second-\d{5}$/ |
      | old      | second-0        | /Second-\d{4}$/ |
      | new      | second-999      | /Second-\d{3}$/ |
      | new      | second-99999999 | /Second-\d{5}$/ |
      | new      | infinite        | /Second-\d{5}$/ |
      | new      | second--1       | /Second-\d{5}$/ |
      | new      | second-0        | /Second-\d{4}$/ |

  @files_sharing-app-required
  Scenario Outline: as share receiver set timeout on folder as owner check it
    Given using <dav-path> DAV path
    And user "Brian" has been created with default attributes and skeleton files
    And user "Alice" has shared folder "PARENT" with user "Brian"
    When user "Brian" locks folder "PARENT (2)" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "Alice" gets the following properties of folder "PARENT" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Alice" gets the following properties of folder "PARENT/CHILD" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When user "Alice" gets the following properties of folder "PARENT/parent.txt" using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "user0" should match "<result>"
    Examples:
      | dav-path | timeout         | result          |
      | old      | second-999      | /Second-\d{3}$/ |
      | old      | second-99999999 | /Second-\d{5}$/ |
      | old      | infinite        | /Second-\d{5}$/ |
      | old      | second--1       | /Second-\d{5}$/ |
      | old      | second-0        | /Second-\d{4}$/ |
      | new      | second-999      | /Second-\d{3}$/ |
      | new      | second-99999999 | /Second-\d{5}$/ |
      | new      | infinite        | /Second-\d{5}$/ |
      | new      | second--1       | /Second-\d{5}$/ |
      | new      | second-0        | /Second-\d{4}$/ |

  @files_sharing-app-required
  Scenario Outline: as owner set timeout on folder as public check it
    Given using <dav-path> DAV path
    And user "Alice" has created a public link share of folder "PARENT"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    When the public gets the following properties of entry "/parent.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response to user "Alice" should match "<result>"
    Examples:
      | dav-path | timeout         | result          |
      | old      | second-999      | /Second-\d{3}$/ |
      | old      | second-99999999 | /Second-\d{5}$/ |
      | old      | infinite        | /Second-\d{5}$/ |
      | old      | second--1       | /Second-\d{5}$/ |
      | old      | second-0        | /Second-\d{4}$/ |
      | new      | second-999      | /Second-\d{3}$/ |
      | new      | second-99999999 | /Second-\d{5}$/ |
      | new      | infinite        | /Second-\d{5}$/ |
      | new      | second--1       | /Second-\d{5}$/ |
      | new      | second-0        | /Second-\d{4}$/ |
