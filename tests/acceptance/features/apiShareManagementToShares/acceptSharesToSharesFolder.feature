@api @files_sharing-app-required
Feature: accept/decline shares coming from internal users to the Shares folder
  As a user
  I want to have control of which received shares I accept
  So that I can keep my file system clean

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using OCS API version "1"
    And using new DAV path
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: When accepting a share of a file, the received file is accessible
    Given user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"


  Scenario: When accepting a share of a folder, the received folder is accessible
    Given user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "ownCloud test text file parent" to "PARENT/parent.txt"
    And user "Alice" has shared file "/PARENT" with user "Brian"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the content of file "/Shares/PARENT/parent.txt" for user "Brian" should be "ownCloud test text file parent"


  Scenario: When accepting a share of a file, the response is valid
    Given user "Alice" has uploaded file with content "ownCloud test text file 0" to "textfile0.txt"
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When user "Brian" accepts share "/textfile0.txt" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
      | file_target            | /Shares/textfile0.txt |
      | path                   | /Shares/textfile0.txt |
      | permissions            | share,read,update     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | item_type              | file                  |
      | mimetype               | text/plain            |
      | storage_id             | ANY_VALUE             |
      | share_type             | user                  |
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "ownCloud test text file 0"


  Scenario: When accepting a share of a folder, the response is valid
    Given user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "ownCloud test text file parent" to "PARENT/parent.txt"
    And user "Alice" has shared file "/PARENT" with user "Brian"
    When user "Brian" accepts share "/PARENT" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | share_with             | %username%           |
      | share_with_displayname | %displayname%        |
      | file_target            | /Shares/PARENT       |
      | path                   | /Shares/PARENT       |
      | permissions            | all                  |
      | uid_owner              | %username%           |
      | displayname_owner      | %displayname%        |
      | item_type              | folder               |
      | mimetype               | httpd/unix-directory |
      | storage_id             | ANY_VALUE            |
      | share_type             | user                 |
    And the content of file "/Shares/PARENT/parent.txt" for user "Brian" should be "ownCloud test text file parent"
