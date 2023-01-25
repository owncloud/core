@api @smokeTest @public_link_share-feature-required @issue-ocis-reva-172
Feature: set timeouts of LOCKS

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"


  Scenario Outline: do not set timeout on folder and check the default timeout
    Given using <dav-path> DAV path
    And parameter "lock_timeout_default" of app "core" has been set to "<default-timeout>"
    And parameter "lock_timeout_max" of app "core" has been set to "<max-timeout>"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | exclusive |
    Then the HTTP status code should be "200"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/CHILD" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/parent.txt" should match "<result>"
    # consider a drift of up to 9 seconds between setting the lock and retrieving it
    Examples:
      | dav-path | default-timeout | max-timeout | result                     |
      | old      | 120             | 3600        | /Second-(120\|11[1-9])$/   |
      | old      | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |
      | new      | 120             | 3600        | /Second-(120\|11[1-9])$/   |
      | new      | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |


  Scenario Outline: set timeout on folder
    Given using <dav-path> DAV path
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    Then the HTTP status code should be "200"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/CHILD" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/parent.txt" should match "<result>"
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


  Scenario Outline: set timeout over the maximum on folder
    Given using <dav-path> DAV path
    And parameter "lock_timeout_default" of app "core" has been set to "<default-timeout>"
    And parameter "lock_timeout_max" of app "core" has been set to "<max-timeout>"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    Then the HTTP status code should be "200"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/CHILD" should match "<result>"
    And as user "Alice" the lock discovery property "//d:timeout" of the folder "PARENT/parent.txt" should match "<result>"
    Examples:
      | dav-path | timeout      | default-timeout | max-timeout | result                     |
      | old      | second-600   | 120             | 3600        | /Second-(600\|59[1-9])$/   |
      | old      | second-600   | 99999           | 3600        | /Second-(600\|59[1-9])$/   |
      | old      | second-10000 | 120             | 3600        | /Second-(3600\|359[1-9])$/ |
      | old      | second-10000 | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |
      | old      | infinite     | 120             | 3600        | /Second-(3600\|359[1-9])$/ |
      | old      | infinite     | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |
      | new      | second-600   | 120             | 3600        | /Second-(600\|59[1-9])$/   |
      | new      | second-600   | 99999           | 3600        | /Second-(600\|59[1-9])$/   |
      | new      | second-10000 | 120             | 3600        | /Second-(3600\|359[1-9])$/ |
      | new      | second-10000 | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |
      | new      | infinite     | 120             | 3600        | /Second-(3600\|359[1-9])$/ |
      | new      | infinite     | 99999           | 3600        | /Second-(3600\|359[1-9])$/ |

  @files_sharing-app-required
  Scenario Outline: as owner set timeout on folder as public check it
    Given using <dav-path> DAV path
    And user "Alice" has created a public link share of folder "PARENT"
    When user "Alice" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | shared    |
      | timeout   | <timeout> |
    Then the HTTP status code should be "200"
    And as a public the lock discovery property "//d:timeout" of the folder "/" should match "<result>"
    And as a public the lock discovery property "//d:timeout" of the folder "/CHILD" should match "<result>"
    And as a public the lock discovery property "//d:timeout" of the folder "/parent.txt" should match "<result>"
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
