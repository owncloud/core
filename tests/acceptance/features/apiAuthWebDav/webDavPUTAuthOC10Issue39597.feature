@api @issue-39597
Feature: get file info using PUT

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"


  Scenario: send PUT requests to another user's webDav endpoints as normal user
    When user "Brian" requests these endpoints with "PUT" including body "doesnotmatter" about user "Alice"
      | endpoint                                       |
      | /remote.php/dav/files/%username%/textfile1.txt |
      | /remote.php/dav/files/%username%/PARENT        |
    Then the HTTP status code of responses on all endpoints should be "403"
    When user "Brian" requests these endpoints with "PUT" including body "doesnotmatter" about user "Alice"
      | endpoint                                           |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "409"
