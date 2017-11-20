Feature: dav-versions
  Background:
    Given using api version "2"
    And using new dav path
    And user "user0" exists
    And file "/davtest.txt"  does not exist for user "user0"
    And as an "user0"

  Scenario: Upload file and no version is available
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then the version folder of file "/davtest.txt" for user "user0" contains "0" elements

  Scenario: Upload a file twice and versions are available
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    And the content length of file "/davtest.txt" with version index "1" for user "user0" in versions folder is "8"

  Scenario: Remove a file
    Given user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    And user "user0" deletes file "/davtest.txt"
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then the version folder of file "/davtest.txt" for user "user0" contains "0" elements

  Scenario: Restore a file and check, if the content is now in the current file
    Given user "user0" uploads file with content "123" to "/davtest.txt"
    And user "user0" uploads file with content "12345" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    When user "user0" restores version index "1" of file "/davtest.txt"
    Then downloading file "davtest.txt"
    And downloaded content should be "123"

  Scenario: User cannot access meta folder of a file which is owned by somebody else
    Given user "user1" exists
    And user "user0" uploads file with content "123" to "/davtest.txt"
    And we save it into "FILEID"
    And as an "user1"
    When sending "PROPFIND" with exact url to "/remote.php/dav/meta/<<FILEID>>"
    Then the HTTP status code should be "404"

  Scenario: User can access meta folder of a file which is owned by somebody else but shared with that user
    Given user "user1" exists
    And user "user0" uploads file with content "123" to "/davtest.txt"
    And user "user0" uploads file with content "123456" to "/davtest.txt"
    And we save it into "FILEID"
    And as an "user0"
    And creating a share with
      | path | /davtest.txt |
      | shareType | 0 |
      | shareWith | user1 |
      | permissions | 8 |
    When as an "user1"
    Then the version folder of fileId "<<FILEID>>" contains "1" elements
