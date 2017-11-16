Feature: dav-versions
  Background:
    Given using api version "2"
    Given using new dav path

  Scenario: Upload file and no version is available
    Given user "user0" exists
    And as an "user0"
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then the version folder of file "/davtest.txt" for user "user0" contains "0" elements

  Scenario: Upload a file twice and versions are available
    Given user "user0" exists
    And as an "user0"
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    And the content length of file "/davtest.txt" with version index "1" for user "user0" in versions folder is "8"

  Scenario: Remove a file
    Given user "user0" exists
    And as an "user0"
    And user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    And user "user0" deletes file "/davtest.txt"
    When user "user0" uploads file "data/davtest.txt" to "/davtest.txt"
    Then the version folder of file "/davtest.txt" for user "user0" contains "0" elements

  Scenario: Restore a file and check, if the content is now in the current file
    Given user "user0" exists
    And as an "user0"
    And user "user0" uploads file with content "123" to "/davtest.txt"
    And user "user0" uploads file with content "12345" to "/davtest.txt"
    And the version folder of file "/davtest.txt" for user "user0" contains "1" elements
    When user "user0" restores version nr "1" of file "/davtest.txt"
    Then downloading file "davtest.txt"
    And downloaded content should be "123"