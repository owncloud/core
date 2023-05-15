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
    And user "Alice" has created folder "/FOLDER"

  Scenario Outline: copy a folder over the top of an existing folder received as a user share
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/BRIAN-Folder"
    And user "Brian" has created folder "BRIAN-Folder/sample-folder"
    And user "Brian" has shared folder "BRIAN-Folder" with user "Alice"
    And user "Alice" has accepted share "/BRIAN-Folder" offered by user "Brian"
    And user "Alice" has created folder "FOLDER/ALICE-folder"
    When user "Alice" copies folder "/FOLDER" to "/Shares/BRIAN-Folder" using the WebDAV API
    Then the HTTP status code should be "204"
    # Alice now sees the content of "her" folder as folder "/Shares/BRIAN-Folder"
    # The share that she received from Brian has "automatically" gone into the "declined" state
    And as "Alice" folder "/FOLDER/ALICE-folder" should exist
    And as "Alice" folder "/Shares/BRIAN-Folder/ALICE-folder" should exist
    And user "Alice" should not have any received shares
    And the sharing API should report to user "Alice" that these shares are in the declined state
      | path                 |
      | /Shares/BRIAN-Folder |
    # Brian still has his original BRIAN-Folder and can see that it is shared with Alice
    And as "Brian" folder "BRIAN-Folder" should exist
    And as "Brian" folder "BRIAN-Folder/sample-folder" should exist
    When user "Brian" gets all shares shared by him using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And file "/Shares/BRIAN-Folder" should be included in the response
    When user "Alice" accepts share "/BRIAN-Folder" offered by user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    # now Alice has "her" folder as "/Shares/BRIAN-Folder"
    # and has the shared file from Brian as "/Shares/BRIAN-Folder (2)"
    And as "Alice" folder "/Shares/BRIAN-Folder" should exist
    And as "Alice" folder "/Shares/BRIAN-Folder/ALICE-folder" should exist
    And as "Alice" folder "/Shares/BRIAN-Folder (2)" should exist
    And as "Alice" folder "/Shares/BRIAN-Folder (2)/sample-folder" should exist
    # Alice can add content to both folders
    # Brian sees what Alice puts into "/Shares/BRIAN-Folder (2)"
    And user "Alice" has created folder "/Shares/BRIAN-Folder/new-folder1"
    And user "Alice" has created folder "/Shares/BRIAN-Folder (2)/new-folder2"
    And user "Alice" has uploaded file with content "new content 1" to "/Shares/BRIAN-Folder/new-folder1/file1.txt"
    And user "Alice" has uploaded file with content "new content 2" to "/Shares/BRIAN-Folder (2)/new-folder2/file2.txt"
    And the content of file "/Shares/BRIAN-Folder/new-folder1/file1.txt" for user "Alice" should be "new content 1"
    And the content of file "/Shares/BRIAN-Folder (2)/new-folder2/file2.txt" for user "Alice" should be "new content 2"
    And the content of file "/BRIAN-Folder/new-folder2/file2.txt" for user "Brian" should be "new content 2"
    Examples:
      | dav_version |
      | old         |
      | new         |
