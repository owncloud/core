@api
Feature: copy file
  As a user
  I want to be able to copy files
  So that I can manage my files

  # When fixing this issue, delete this bug-demo feature file.
  # And unskip the corresponding scenario in copyFile.feature and make it pass.
  Background:
    Given using OCS API version "1"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "ownCloud test text file 1" to "/textfile1.txt"

  @issue-40787 @files_sharing-app-required
  Scenario Outline: copy a file over the top of an existing file received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "file to share" to "/sharedfile1.txt"
    And user "Brian" has shared file "/sharedfile1.txt" with user "Alice"
    And user "Alice" has accepted share "/sharedfile1.txt" offered by user "Brian"
    When user "Alice" copies file "/textfile1.txt" to "/Shares/sharedfile1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    # Alice now sees the content of "her" file in /Shares/sharedfile1.txt
    # The share that she received from Brian has "automatically" gone into the "declined" state
    And as "Alice" file "/Shares/sharedfile1.txt" should exist
    And the content of file "/Shares/sharedfile1.txt" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" file "/textfile1.txt" should exist
    And user "Alice" should not have any received shares
    And the sharing API should report to user "Alice" that these shares are in the declined state
      | path                    |
      | /Shares/sharedfile1.txt |
    # Brian still has his original "/sharedfile1.txt" and can see that it is shared with Alice
    And as "Brian" file "/sharedfile1.txt" should exist
    And the content of file "/sharedfile1.txt" for user "Brian" should be "file to share"
    # Alice can accept the share from Brian again
    When user "Alice" accepts share "/sharedfile1.txt" offered by user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    # now Alice has "her" text file as "/Shares/sharedfile1.txt"
    # and has the shared folder from Brian as "/Shares/sharedfile1 (2).txt"
    And as "Alice" file "/Shares/sharedfile1.txt" should exist
    And the content of file "/Shares/sharedfile1.txt" for user "Alice" should be "ownCloud test text file 1"
    And as "Alice" file "/Shares/sharedfile1 (2).txt" should exist
    And the content of file "/Shares/sharedfile1 (2).txt" for user "Alice" should be "file to share"
    Examples:
      | dav_version |
      | old         |
      | new         |
