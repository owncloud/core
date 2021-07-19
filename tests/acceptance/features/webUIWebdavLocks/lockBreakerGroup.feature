@webUI @insulated @disablePreviews
Feature: Unlock locked files and folders
  As a member of a lock breaker group
  I would like to be able to unlock files and folders
  So that I can access them


  Scenario: Add a group to lock breakers group
    Given group "grp1" has been created
    And the administrator has browsed to the admin general settings page
    When the administrator adds group "grp1" to the lock breakers groups using the webUI
    Then group "grp1" should be listed in the lock breakers groups on the webUI
    And group "grp1" should exist as a lock breaker group


  Scenario: Add multiple groups to lock breakers group
    Given group "grp1" has been created
    And group "grp2" has been created
    And group "grp3" has been created
    And the administrator has browsed to the admin general settings page
    When the administrator adds group "grp1" to the lock breakers groups using the webUI
    And the administrator adds group "grp2" to the lock breakers groups using the webUI
    Then the following groups should be listed in the lock breakers groups on the webUI
      | groups |
      | grp1   |
      | grp2   |
    And following groups should exist as lock breaker groups
      | groups |
      | grp1   |
      | grp2   |


  Scenario Outline: members from lock breaker groups can unlock a locked folder/file shared to them
    Given group "grp1" has been created
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked folder "simple-folder" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has locked file "lorem.txt" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has shared folder "simple-folder" with user "Brian"
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And user "Brian" has logged in using the webUI
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of folder "simple-folder" on the webUI
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for file "lorem.txt" of user "Brian" by the WebDAV API
    And 0 locks should be reported for file "lorem.txt" of user "Alice" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder" of user "Brain" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder" of user "Alice" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |


  Scenario Outline:  as a member of lock breaker group unlocking a folder/file in a share locked by the folder owner is possible
    Given group "grp1" has been created
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And user "Brian" has been added to group "grp1"
    And user "Alice" has locked folder "simple-folder/sub-folder" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has locked file "simple-folder/lorem.txt" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has shared folder "simple-folder" with user "Brian"
    And user "Brian" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of folder "sub-folder" on the webUI
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "sub-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for folder "simple-folder" of user "Brain" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder" of user "Alice" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |


  Scenario Outline: user that isn't member of lock breakers group cannot unlock a file/folder shared to them
    Given group "grp1" has been created
    And parameter "lock-breaker-groups" of app "core" has been set to '["grp1"]'
    And these users have been created without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has been added to group "grp1"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has locked folder "FOLDER" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has locked file "lorem.txt" setting the following properties
      | lockscope | <lockscope> |
    And user "Alice" has shared folder "FOLDER" with user "Brian"
    And user "Alice" has shared file "lorem.txt" with user "Brian"
    And user "Brian" has logged in using the webUI
    When the user unlocks the lock no 1 of folder "FOLDER" on the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not unlock, please contact the lock owner Alice |
    And the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And notifications should be displayed on the webUI with the text
      | Could not unlock, please contact the lock owner Alice |
    And the user reloads the current page of the webUI
    And file "lorem.txt" should be marked as locked on the webUI
    And folder "FOLDER" should be marked as locked on the webUI
    Examples:
      | lockscope |
      | exclusive |
      | shared    |
