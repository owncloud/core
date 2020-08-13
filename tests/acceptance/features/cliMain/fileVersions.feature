@cli
Feature: check file versions

  Scenario: user clears the versions of a file
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/sharingfolder"
    And user "Alice" has uploaded file with content "old content" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 1" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 2" to "/sharingfolder/sharefile.txt"
    And user "Alice" has uploaded file with content "version 3" to "/sharingfolder/sharefile.txt"
    Then the version folder of file "sharingfolder/sharefile.txt" for user "Alice" should contain "3" element
    When the administrator deletes all the versions for user "Alice"
    Then the version folder of file "/sharingfolder/sharefile.txt" for user "Alice" should contain "0" element
