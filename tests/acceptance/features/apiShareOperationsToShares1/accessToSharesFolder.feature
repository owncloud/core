@api @files_sharing-app-required
Feature: write directly into the folder for received shares
  On ownCloud10 with the folder for received shares set, for example, to "Shares"
  A user should see a "Shares" folder when they have received a share.
  A user should be able to add their own resources into the "Shares" folder
  and those resources will act like any resource that is local to the user.
  Even if the user has no more received shares, the "Shares" folder is still there.

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario: the Shares folder does not exist before the first share is received
    Then as "Alice" folder "/Shares" should not exist
    And as "Brian" folder "/Shares" should not exist


  Scenario: the Shares folder does not exist if no share has been accepted
    Given user "Alice" has created folder "/shared"
    When user "Alice" shares folder "/shared" with user "Brian" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares" should not exist
    And as "Alice" folder "/Shares" should not exist


  Scenario: the Shares folder exists for the sharee after a share is accepted
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" accepts share "/shared" offered by user "Alice" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares" should exist
    But as "Alice" folder "/Shares" should not exist


  Scenario: the Shares folder exists after a share is received, accepted and deleted
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And as "Brian" folder "/Shares" should exist
    But as "Alice" folder "/Shares" should not exist


  Scenario: the Shares folder can be created first by the user
    Given user "Alice" has created folder "/shared"
    When user "Brian" creates folder "/Shares" using the WebDAV API
    And user "Brian" creates folder "/Shares/aFolder" using the WebDAV API
    And user "Alice" shares folder "/shared" with user "Brian" using the sharing API
    And user "Brian" accepts share "/shared" offered by user "Alice" using the sharing API
    # OCS status code is available only for the Sharing API request
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on each endpoint should be "201, 201, 200, 200" respectively
    And as "Brian" folder "/Shares" should exist
    And as "Brian" folder "/Shares/shared" should exist


  Scenario: the user can have created a matching resource in Shares before receiving a share
    Given user "Alice" has created folder "/shared"
    And user "Alice" has uploaded file with content "shared data" to "/shared/aFile.txt"
    And user "Brian" has created folder "/Shares"
    And user "Brian" has created folder "/Shares/shared"
    And user "Brian" has uploaded file with content "data of Brian" to "/Shares/shared/aFile.txt"
    When user "Alice" shares folder "/shared" with user "Brian" using the sharing API
    And user "Brian" accepts share "/shared" offered by user "Alice" using the sharing API
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And as "Brian" folder "/Shares" should exist
    And as "Brian" folder "/Shares/shared" should exist
    And as "Brian" folder "/Shares/shared (2)" should exist
    And the content of file "/Shares/shared/aFile.txt" for user "Brian" should be "data of Brian"
    And the content of file "/Shares/shared (2)/aFile.txt" for user "Brian" should be "shared data"


  Scenario: the user can write directly into the Shares folder
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Brian" uploads file with content "some data" to "/Shares/textfile.txt" using the WebDAV API
    And user "Brian" creates folder "/Shares/aFolder" using the WebDAV API
    And user "Brian" uploads file with content "more data" to "/Shares/aFolder/aFile.txt" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "201"
    And as "Brian" file "/Shares/textfile.txt" should exist
    And the content of file "/Shares/textfile.txt" for user "Brian" should be "some data"
    And as "Brian" file "/Shares/aFolder/aFile.txt" should exist
    And the content of file "Shares/aFolder/aFile.txt" for user "Brian" should be "more data"


  Scenario: the user can move files directly into the Shares folder
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has uploaded file with content "some data" to "/textfile.txt"
    When user "Brian" moves file "/textfile.txt" to "/Shares/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Brian" file "/Shares/textfile.txt" should exist
    And the content of file "Shares/textfile.txt" for user "Brian" should be "some data"


  Scenario: the user can delete files that they wrote into the Shares folder
    Given user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has uploaded file with content "some data" to "/Shares/textfile.txt"
    And user "Brian" has created folder "/Shares/aFolder"
    When user "Brian" deletes file "/Shares/textfile.txt" using the WebDAV API
    And user "Brian" deletes folder "/Shares/aFolder" using the WebDAV API
    Then the HTTP status code of responses on all endpoints should be "204"
    And as "Brian" folder "/Shares" should exist
    But as "Brian" file "/Shares/textfile.txt" should not exist
    And as "Brian" folder "/Shares/aFolder" should not exist
