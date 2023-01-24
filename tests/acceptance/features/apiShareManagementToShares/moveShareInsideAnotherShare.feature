@api @files_sharing-app-required
Feature: moving a share inside another share
  As a user
  I want to move a shared resource inside another shared resource
  Because I need full flexibility when managing resources.

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "folderA"
    And user "Alice" has created folder "folderB"
    And user "Alice" has uploaded file with content "text A" to "/folderA/fileA.txt"
    And user "Alice" has uploaded file with content "text B" to "/folderB/fileB.txt"
    And user "Alice" has shared folder "folderA" with user "Brian"
    And user "Alice" has shared folder "folderB" with user "Brian"
    And user "Brian" has accepted share "/folderA" offered by user "Alice"
    And user "Brian" has accepted share "/folderB" offered by user "Alice"


  Scenario: share receiver cannot move a whole share inside another share
    When user "Brian" moves folder "Shares/folderB" to "Shares/folderA/folderB" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" folder "/folderB" should exist
    And as "Brian" folder "/Shares/folderB" should exist
    And as "Alice" file "/folderB/fileB.txt" should exist
    And as "Brian" file "/Shares/folderB/fileB.txt" should exist


  Scenario: share owner moves a whole share inside another share
    When user "Alice" moves folder "folderB" to "folderA/folderB" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "/folderB" should not exist
    And as "Alice" folder "/folderA/folderB" should exist
    And as "Brian" folder "/Shares/folderB" should exist
    And as "Alice" file "/folderA/folderB/fileB.txt" should exist
    And as "Brian" file "/Shares/folderA/folderB/fileB.txt" should exist
    And as "Brian" file "/Shares/folderB/fileB.txt" should exist


  Scenario: share receiver moves a whole share inside a local folder
    Given user "Brian" has created folder "localFolder"
    And user "Brian" has uploaded file with content "local text" to "/localFolder/localFile.txt"
    When user "Brian" moves folder "Shares/folderB" to "localFolder/folderB" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" folder "/localFolder/folderB" should exist
    And as "Brian" file "/localFolder/folderB/fileB.txt" should exist
    And as "Brian" file "/localFolder/localFile.txt" should exist
    But as "Brian" file "/Shares/folderB/fileB.txt" should not exist


  Scenario: share receiver moves a whole share inside a local folder then moves the local folder inside a received share
    Given user "Brian" has created folder "localFolder"
    And user "Brian" has uploaded file with content "local text" to "/localFolder/localFile.txt"
    When user "Brian" moves folder "Shares/folderB" to "localFolder/folderB" using the WebDAV API
    And user "Brian" moves folder "localFolder" to "Shares/folderA/localFolder" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Alice" folder "/folderA/localFolder" should exist
    And as "Brian" folder "/Shares/folderA/localFolder" should exist
    And as "Alice" file "/folderA/localFolder/localFile.txt" should exist
    And as "Brian" file "/Shares/folderA/localFolder/localFile.txt" should exist
    # folderB now exists separately, and is no longer inside localFolder
    And as "Alice" file "/folderB/fileB.txt" should exist
    And as "Brian" file "/Shares/folderB/fileB.txt" should exist
    But as "Alice" folder "/folderA/localFolder/folderB" should not exist
    And as "Brian" folder "/Shares/folderA/localFolder/folderB" should not exist


  Scenario: share receiver moves a whole share inside a local folder then tries to move the share inside a received share
    Given user "Brian" has created folder "localFolder"
    And user "Brian" has uploaded file with content "local text" to "/localFolder/localFile.txt"
    When user "Brian" moves folder "Shares/folderB" to "localFolder/folderB" using the WebDAV API
    And user "Brian" moves folder "localFolder/folderB" to "Shares/folderA/folderB" using the WebDAV API
    Then the HTTP status code of responses on each endpoint should be "201, 403" respectively
    And as "Alice" file "/folderB/fileB.txt" should exist
    And as "Brian" folder "/localFolder/folderB" should exist
    And as "Brian" file "/localFolder/folderB/fileB.txt" should exist
    But as "Alice" folder "/folderA/folderB" should not exist
    And as "Brian" folder "/Shares/folderA/folderB" should not exist


  Scenario: share receiver moves a local folder inside a received share (local folder does not have a share in it)
    Given user "Brian" has created folder "localFolder"
    And user "Brian" has created folder "localFolder/subFolder"
    And user "Brian" has uploaded file with content "local text" to "/localFolder/localFile.txt"
    When user "Brian" moves folder "localFolder" to "Shares/folderA/localFolder" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "/folderA/localFolder" should exist
    And as "Brian" folder "/Shares/folderA/localFolder" should exist
    And as "Alice" folder "/folderA/localFolder/subFolder" should exist
    And as "Brian" folder "/Shares/folderA/localFolder/subFolder" should exist
    And as "Alice" file "/folderA/localFolder/localFile.txt" should exist
    And as "Brian" file "/Shares/folderA/localFolder/localFile.txt" should exist
