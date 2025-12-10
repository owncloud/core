@cli
Feature: check file versions

  Scenario: the admin clears the file versions for a user
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    When the administrator deletes all the versions for user "Alice"
    Then the version folder of file "/sharingfolder/sharefile.txt" for user "Alice" should contain "0" elements


  Scenario: the admin clears the file versions for multiple users
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
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
    And user "Carol" has created folder "/sharingfolder"
    And user "Carol" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Carol" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Carol" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Carol" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    When the administrator deletes all the versions for the following users:
      | username |
      | Alice    |
      | Brian    |
    Then the version folder of file "/sharingfolder/sharefile.txt" for user "Alice" should contain "0" elements
    And the version folder of file "/sharingfolder/sharefile.txt" for user "Brian" should contain "0" elements
    And the version folder of file "/sharingfolder/sharefile.txt" for user "Carol" should contain "3" elements


  Scenario: the admin clears the file versions for all users
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "old content" to "/textfile.txt"
    And user "Alice" has uploaded file with content "version 1" to "/textfile.txt"
    And user "Alice" has uploaded file with content "version 2" to "/textfile.txt"
    And user "Brian" has uploaded file with content "old content" to "/textfile.txt"
    And user "Brian" has uploaded file with content "version 1" to "/textfile.txt"
    And user "Brian" has uploaded file with content "version 2" to "/textfile.txt"
    And user "Carol" has uploaded file with content "old content" to "/textfile.txt"
    And user "Carol" has uploaded file with content "version 1" to "/textfile.txt"
    And user "Carol" has uploaded file with content "version 2" to "/textfile.txt"
    When the administrator deletes the file versions for all users
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "0" elements
    And the version folder of file "/textfile.txt" for user "Brian" should contain "0" elements
    And the version folder of file "/textfile.txt" for user "Carol" should contain "0" elements


  Scenario: the admin tries to clear the versions of a file for an invalid user
    When the administrator tries to delete all the versions for user "Alice"
    Then the command output should contain the text "Unknown user Alice"


  Scenario: the admin clears the expired versions for a user
    Given the administrator has added system config key "versions_retention_obligation" with value "auto, 10"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "2" elements
    When the administrator deletes the expired versions for user "Alice"
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "1" elements


  Scenario: the admin clears the expired versions for multiple users
    Given the administrator has added system config key "versions_retention_obligation" with value "auto, 10"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "2" elements
    And the version folder of file "/textfile.txt" for user "Brian" should contain "2" elements
    And the version folder of file "/textfile.txt" for user "Carol" should contain "2" elements
    When the administrator deletes the expired versions for the following users:
      | username |
      | Alice    |
      | Brian    |
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "1" elements
    And the version folder of file "/textfile.txt" for user "Brian" should contain "1" elements
    And the version folder of file "/textfile.txt" for user "Carol" should contain "2" elements


  Scenario: the admin clears the expired versions for all users
    Given the administrator has added system config key "versions_retention_obligation" with value "auto, 10"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Alice" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Brian" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "some content" and mtime of "11" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "version 1" and mtime of "5" days ago using the WebDAV API
    And user "Carol" has uploaded file "/textfile.txt" with content "version 2" and mtime of "2" days ago using the WebDAV API
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "2" elements
    And the version folder of file "/textfile.txt" for user "Brian" should contain "2" elements
    And the version folder of file "/textfile.txt" for user "Carol" should contain "2" elements
    When the administrator deletes the expired versions for all users
    Then the version folder of file "/textfile.txt" for user "Alice" should contain "1" elements
    And the version folder of file "/textfile.txt" for user "Brian" should contain "1" elements
    And the version folder of file "/textfile.txt" for user "Carol" should contain "1" elements


  Scenario: the admin tries to clear the expired versions for an invalid user
    Given the administrator has added system config key "versions_retention_obligation" with value "auto, 10"
    When the administrator tries to delete the expired versions for user "Alice"
    Then the command output should contain the text "Unknown user Alice"