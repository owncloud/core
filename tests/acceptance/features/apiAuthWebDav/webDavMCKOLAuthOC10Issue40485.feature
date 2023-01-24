@api
Feature: create folder using MKCOL

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"

  Scenario: send MKCOL requests to another user's webDav endpoints as normal user
    Given user "Brian" has been created with default attributes and without skeleton files
    When user "Brian" requests these endpoints with "MKCOL" including body "" about user "Alice"
      | endpoint                                        |
      | /remote.php/dav/files/%username%/textfile0.txt  |
      | /remote.php/dav/files/%username%/PARENT         |
      | /remote.php/dav/files/%username%/does-not-exist |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on each endpoint should be "403, 403, 403, 409" respectively


  Scenario: send MKCOL requests to non-existent user's webDav endpoints as normal user
    Given user "Brian" has been created with default attributes and without skeleton files
    When user "Brian" requests these endpoints with "MKCOL" including body "" about user "non-existent-user"
      | endpoint                                                  |
      | /remote.php/dav/files/non-existent-user/textfile0.txt     |
      | /remote.php/dav/files/non-existent-user/PARENT            |
      | /remote.php/dav/files/non-existent-user/does-not-exist    |
      | /remote.php/dav/files/non-existent-user/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "409"