@cli @files_trashbin-app-required @preview-extension-required @skipOnOcV10.11 @skipOnOcV10.12
Feature: orphaned previews can be deleted
  As an admin
  I want to delete previews whose original file no longer exists
  So that I can save storage space

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "text file zero" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "text file one" to "/textfile1.txt"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file with content "folder text" to "/FOLDER/folder.txt"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file with content "parent text" to "/PARENT/parent.txt"
    And user "Alice" has uploaded file with content "child text" to "/PARENT/CHILD/child.txt"
    And user "Alice" has downloaded the preview of "/textfile0.txt" with width "32" and height "32"
    And user "Alice" has downloaded the preview of "/textfile1.txt" with width "32" and height "32"
    And user "Alice" has downloaded the preview of "/FOLDER/folder.txt" with width "32" and height "32"
    And user "Alice" has downloaded the preview of "/PARENT/parent.txt" with width "32" and height "32"
    And user "Alice" has downloaded the preview of "/PARENT/CHILD/child.txt" with width "32" and height "32"
    And user "Alice" has deleted file "/textfile1.txt"
    And user "Alice" has deleted folder "/PARENT"


  Scenario: previews of existing files in regular storage or the trashbin are not deleted
    When the administrator cleans up previews using the occ command
    Then the command should have been successful
    And the command output should contain the text '0 orphaned previews deleted'


  Scenario: after a file is deleted from the trashbin, its preview is cleaned up
    When user "Alice" deletes the file with original path "textfile1.txt" from the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    And the command output should contain the text '1 orphaned previews deleted'


  Scenario: after a folder is deleted from the trashbin, the previews are cleaned up
    When user "Alice" deletes the folder with original path "PARENT" from the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    And the command output should contain the text '2 orphaned previews deleted'


  Scenario: after the trashbin has been emptied, the previews are cleaned up
    When user "Alice" empties the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    And the command output should contain the text '3 orphaned previews deleted'


  Scenario: the previews of multiple users are cleaned up
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "text file zero" to "/textfile0.txt"
    And user "Brian" has uploaded file with content "text file one" to "/textfile1.txt"
    And user "Brian" has downloaded the preview of "/textfile0.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "/textfile1.txt" with width "32" and height "32"
    And user "Brian" has deleted file "/textfile1.txt"
    When user "Alice" empties the trashbin using the trashbin API
    And user "Brian" empties the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    And the command output should contain the text '4 orphaned previews deleted'


  Scenario: the previews from shared files are cleaned up
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "text file zero" to "/textfile0.txt"
    And user "Brian" has downloaded the preview of "/textfile0.txt" with width "32" and height "32"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has uploaded file with content "text from Brian" to "/FOLDER/fromBrian.txt"
    And user "Brian" has downloaded the preview of "/FOLDER/folder.txt" with width "32" and height "32"
    And user "Brian" has downloaded the preview of "/FOLDER/fromBrian.txt" with width "32" and height "32"
    And user "Alice" has downloaded the preview of "/FOLDER/fromBrian.txt" with width "32" and height "32"
    And user "Brian" has deleted file "/FOLDER/folder.txt"
    And user "Brian" has deleted file "/FOLDER/fromBrian.txt"
    When user "Brian" deletes the file with original path "FOLDER/folder.txt" from the trashbin using the trashbin API
    And user "Brian" deletes the file with original path "FOLDER/fromBrian.txt" from the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    # The files are still in Alice's trashbin.
    # Preview cleanup could delete the preview that is in Brian's file-system.
    # But it does not do that level of optimization.
    And the command output should contain the text '0 orphaned previews deleted'
    When user "Alice" deletes the file with original path "FOLDER/folder.txt" from the trashbin using the trashbin API
    And user "Alice" deletes the file with original path "FOLDER/fromBrian.txt" from the trashbin using the trashbin API
    And the administrator cleans up previews using the occ command
    Then the command should have been successful
    # The two files have been deleted from both trashbins, so now there are four
    # previews to delete (2 stored for Brian, 2 stored for Alice)
    And the command output should contain the text '4 orphaned previews deleted'
