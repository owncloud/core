@api @files_versions-app-required @issue-36228 @notToImplementOnOCIS

Feature: dav-versions

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario: download old versions of a shared file as share receiver
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "uploaded content" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 1" to "textfile0.txt"
    And user "Alice" has uploaded file with content "version 2" to "textfile0.txt"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" downloads the version of file "/Shares/textfile0.txt" with the index "1"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                      |
      | Content-Disposition | attachment; filename*=UTF-8''; filename="" |
    And the downloaded content should be "version 1"
    When user "Brian" downloads the version of file "/Shares/textfile0.txt" with the index "2"
    Then the HTTP status code should be "200"
    And the following headers should be set
      | header              | value                                      |
      | Content-Disposition | attachment; filename*=UTF-8''; filename="" |
    And the downloaded content should be "uploaded content"
