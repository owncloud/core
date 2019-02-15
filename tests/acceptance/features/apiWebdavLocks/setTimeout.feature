@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required @skipOnOcV10.0
Feature: set timeouts of LOCKS

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: set timeout on folder
    Given using <dav-path> DAV path
    When user "user0" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "user0" gets the following properties of folder "PARENT" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user0" gets the following properties of folder "PARENT/CHILD" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user0" gets the following properties of folder "PARENT/parent.txt" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
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

  Scenario Outline: as owner set timeout on folder as receiver check it
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared folder "PARENT" with user "user1"
    When user "user0" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "user1" gets the following properties of folder "PARENT (2)" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user1" gets the following properties of folder "PARENT (2)/CHILD" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user1" gets the following properties of folder "PARENT (2)/parent.txt" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
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

  Scenario Outline: as share receiver set timeout on folder as owner check it
    Given using <dav-path> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has shared folder "PARENT" with user "user1"
    When user "user1" locks folder "PARENT (2)" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And user "user0" gets the following properties of folder "PARENT" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user0" gets the following properties of folder "PARENT/CHILD" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When user "user0" gets the following properties of folder "PARENT/parent.txt" using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
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

  Scenario Outline: as owner set timeout on folder as public check it
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT"
    When user "user0" locks folder "PARENT" using the WebDAV API setting following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    And the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
    When the public gets the following properties of entry "/parent.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:timeout" in the response should match "<result>"
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

