@api @issue-40140 @notToImplementOnOCIS
Feature: quota

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @files_sharing-app-required
  Scenario: share receiver with insufficient quota should not be able to copy received shared file to home folder
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "10 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Alice" has uploaded file with content "test-content-15" to "/testquota.txt"
    And user "Alice" has shared file "/testquota.txt" with user "Brian"
    And user "Brian" has accepted share "/testquota.txt" offered by user "Alice"
    When user "Brian" copies file "/Shares/testquota.txt" to "/testquota.txt" using the WebDAV API
    # The status indicates that the copy was successful, but actually the copied file does not exist
    # The status is misleading
    Then the HTTP status code should be "201"
    #Then the HTTP status code should be "507"
    #And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"
    And as "Brian" file "/testquota.txt" should not exist

  @files_sharing-app-required
  Scenario: share receiver with insufficient quota should not be able to copy file from shared folder to home folder
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "10 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Alice" has created folder "shareFolder"
    And user "Alice" has uploaded file with content "test-content-15" to "/shareFolder/testquota.txt"
    And user "Alice" has shared folder "/shareFolder" with user "Brian"
    And user "Brian" has accepted share "/shareFolder" offered by user "Alice"
    When user "Brian" copies file "/Shares/shareFolder/testquota.txt" to "/testquota.txt" using the WebDAV API
    # The status indicates that the copy was successful, but actually the copied file does not exist
    # The status is misleading
    Then the HTTP status code should be "201"
    #Then the HTTP status code should be "507"
    #And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"
    And as "Brian" file "/testquota.txt" should not exist

  @files_sharing-app-required
  Scenario: share receiver of a share with insufficient quota should not be able to copy from home folder to the received shared file
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "10 MB"
    And the quota of user "Alice" has been set to "10 B"
    And user "Alice" has uploaded file with content "short" to "/testquota.txt"
    And user "Brian" has uploaded file with content "longer line of text" to "/testquota.txt"
    And user "Alice" has shared file "/testquota.txt" with user "Brian"
    And user "Brian" has accepted share "/testquota.txt" offered by user "Alice"
    When user "Brian" copies file "/testquota.txt" to "/Shares/testquota.txt" using the WebDAV API
    # The status indicates that the copy was successful, but actually the copied file does not exist
    # The status is misleading
    Then the HTTP status code should be "204"
    #Then the HTTP status code should be "507"
    #And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"
    And as "Brian" file "/Shares/testquota.txt" should exist
    And as "Alice" file "/testquota.txt" should exist
    # The copy should have failed, so Alice should still see the original content
    And the content of file "/testquota.txt" for user "Alice" should be "short"

  @files_sharing-app-required
  Scenario: share receiver of a share with insufficient quota should not be able to copy file from home folder to the received shared folder
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "10 MB"
    And the quota of user "Alice" has been set to "10 B"
    And user "Alice" has created folder "shareFolder"
    And user "Alice" has shared folder "/shareFolder" with user "Brian"
    And user "Brian" has accepted share "/shareFolder" offered by user "Alice"
    And user "Brian" has uploaded file with content "test-content-15" to "/testquota.txt"
    When user "Brian" copies file "/testquota.txt" to "/Shares/shareFolder/testquota.txt" using the WebDAV API
    # The status indicates that the copy was successful, but actually the copied file does not exist
    # The status is misleading
    Then the HTTP status code should be "201"
    #Then the HTTP status code should be "507"
    #And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"
    And as "Brian" file "/testquota.txt" should exist
    # The copy should have failed, so Alice should not see the file
    And as "Alice" file "/shareFolder/testquota.txt" should not exist
