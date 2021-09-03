@cli
Feature: check file versions

  Scenario: the admin clears the versions of a file for single user
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    When the administrator deletes all the versions for user "Alice"
    Then the version folder of file "/sharingfolder/sharefile.txt" for user "Alice" should contain "0" element


  Scenario: the admin clears the versions of a file for specific users
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    And user "Brian" has created folder "/sharingfolder"
    And user "Brian" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Brian" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    When the administrator deletes all the versions for following users:
      | username |
      | Alice    |
      | Brian    |
    Then the version folder of file "/sharingfolder/sharefile.txt" for user "Alice" should contain "0" element
    And the version folder of file "/sharingfolder/sharefile.txt" for user "Brian" should contain "0" element


  Scenario: the admin tries to clear the versions of a file for invalid user
    When the administrator deletes all the versions for user "Alice"
    Then the command output should contain the text "Unknown user Alice"
