@api @issue-ocis-2413
Feature: UNLOCK locked items

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: a group can be added as a lock breaker group
    Given using <dav-path> DAV path
    And group "grp1" has been created
    When the administrator sets parameter "lock-breaker-groups" of app "core" to '["grp1"]'
    Then the HTTP status code should be "200"
    And group "grp1" should exist as a lock breaker group
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: more than one group can be added as a lock breaker group
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And group "grp2" has been created
    When the administrator sets parameter "lock-breaker-groups" of app "core" to '["grp1","grp2"]'
    Then the HTTP status code should be "200"
    And following groups should exist as lock breaker groups
      | groups |
      | grp1   |
      | grp2   |
    Examples:
      | dav-path |
      | old      |
      | new      |


  Scenario Outline: member of the lock breakers group can unlock a locked folder shared with them
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    When user "Brian" unlocks folder "FOLDER" with the last created lock of folder "FOLDER" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for folder "FOLDER" of user "Brian" by the WebDAV API
    And 0 locks should be reported for folder "FOLDER" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of the lock breakers group can lock shared folder that was unlocked by the lock breaker group before
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Brian" has unlocked folder "FOLDER" with the last created lock of folder "FOLDER" of user "Alice" using the WebDAV API
    When user "Brian" locks folder "FOLDER" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for folder "FOLDER" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of the lock breakers group can unlock a locked file shared with them
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked file "textfile0.txt" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Brian" unlocks file "textfile0.txt" with the last created lock of file "textfile0.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for file "textfile0.txt" of user "Brian" by the WebDAV API
    And 0 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of the lock breakers group can lock shared file that was unlocked by the lock breaker group before
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked file "textfile0.txt" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has unlocked file "textfile0.txt" with the last created lock of folder "textfile0.txt" of user "Alice" using the WebDAV API
    When user "Brian" locks file "textfile0.txt" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    Then the HTTP status code should be "200"
    And 1 locks should be reported for file "textfile0.txt" of user "Brian" by the WebDAV API
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: as a member of lock breaker group unlocking a file in a share locked by the file owner is possible
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Alice" has locked file "PARENT/parent.txt" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "PARENT" with user "Brian"
    When user "Brian" unlocks file "PARENT/parent.txt" with the last created lock of file "PARENT/parent.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for file "PARENT/parent.txt" of user "Alice" by the WebDAV API
    And 0 locks should be reported for file "PARENT/parent.txt" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: as a member of lock breaker group unlocking a folder in a share locked by the folder owner is possible
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "CHILD"
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "PARENT" with user "Brian"
    When user "Brian" unlocks folder "PARENT/CHILD" with the last created lock of folder "PARENT/CHILD" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for folder "PARENT/CHILD" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "PARENT/CHILD" of user "Brian" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of different lock breaker groups can lock and unlock same folder shared to them
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1","grp2"]'
    And user "Carol" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "PARENT" with user "Brian"
    And user "Alice" has shared folder "PARENT" with user "Carol"
    When user "Brian" unlocks folder "PARENT" with the last created lock of file "PARENT" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Brian" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Carol" by the WebDAV API
    When user "Brian" locks folder "PARENT" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    And 1 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 1 locks should be reported for folder "PARENT" of user "Brian" by the WebDAV API
    And 1 locks should be reported for folder "PARENT" of user "Carol" by the WebDAV API
    Then the HTTP status code should be "200"
    When user "Carol" unlocks folder "PARENT" with the last created lock of folder "PARENT" of user "Brian" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Brian" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Carol" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of different lock breaker groups can lock and unlock same file shared to them
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1","grp2"]'
    And user "Carol" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" has locked file "textfile.txt" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared file "textfile.txt" with user "Brian"
    And user "Alice" has shared file "textfile.txt" with user "Carol"
    When user "Brian" unlocks file "textfile.txt" with the last created lock of file "textfile.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for file "textfile.txt" of user "Alice" by the WebDAV API
    And 0 locks should be reported for file "textfile.txt" of user "Brian" by the WebDAV API
    And 0 locks should be reported for file "textfile.txt" of user "Carol" by the WebDAV API
    When user "Brian" locks file "textfile.txt" using the WebDAV API setting the following properties
      | lockscope | <lock-scope> |
    And 1 locks should be reported for file "textfile.txt" of user "Alice" by the WebDAV API
    And 1 locks should be reported for file "textfile.txt" of user "Brian" by the WebDAV API
    And 1 locks should be reported for file "textfile.txt" of user "Carol" by the WebDAV API
    Then the HTTP status code should be "200"
    When user "Carol" unlocks file "textfile.txt" with the last created lock of file "textfile.txt" of user "Brian" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for file "textfile.txt" of user "Alice" by the WebDAV API
    And 0 locks should be reported for file "textfile.txt" of user "Brian" by the WebDAV API
    And 0 locks should be reported for file "textfile.txt" of user "Carol" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of lock breaker group can unlock a folder in group sharing
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Carol" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared folder "PARENT" with group "grp2"
    When user "Carol" unlocks folder "PARENT" with the last created lock of folder "PARENT" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And 1 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 1 locks should be reported for folder "PARENT" of user "Brian" by the WebDAV API
    And 1 locks should be reported for folder "PARENT" of user "Carol" by the WebDAV API
    When user "Brian" unlocks folder "PARENT" with the last created lock of file "PARENT" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for folder "PARENT" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Brian" by the WebDAV API
    And 0 locks should be reported for folder "PARENT" of user "Carol" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |


  Scenario Outline: members of lock breaker group can unlock a file in group sharing
    Given using <dav-path> DAV path
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Carol" has been added to group "grp2"
    And user "Brian" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" has locked file "textfile0.txt" setting the following properties
      | lockscope | <lock-scope> |
    And user "Alice" has shared file "textfile0.txt" with group "grp2"
    When user "Carol" unlocks file "textfile0.txt" with the last created lock of file "textfile0.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "403"
    And 1 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    And 1 locks should be reported for file "textfile0.txt" of user "Brian" by the WebDAV API
    And 1 locks should be reported for file "textfile0.txt" of user "Carol" by the WebDAV API
    When user "Brian" unlocks file "textfile0.txt" with the last created lock of file "textfile0.txt" of user "Alice" using the WebDAV API
    Then the HTTP status code should be "204"
    And 0 locks should be reported for file "textfile0.txt" of user "Alice" by the WebDAV API
    And 0 locks should be reported for file "textfile0.txt" of user "Brian" by the WebDAV API
    And 0 locks should be reported for file "textfile0.txt" of user "Carol" by the WebDAV API
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |
