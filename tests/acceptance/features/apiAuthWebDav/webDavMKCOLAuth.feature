@api
Feature: create folder using MKCOL

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"
    And user "Brian" has been created with default attributes and without skeleton files

  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send MKCOL requests to webDav endpoints as normal user with wrong password
    When user "Alice" sends "MKCOL" request on these endpoints with body "doesnotmatter" using password "invalid" about user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send MKCOL requests to webDav endpoints as normal user with no password
    When user "Alice" sends "MKCOL" request on these endpoints with body "doesnotmatter" using password "" about user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  @skipOnOcis @issue-ocis-reva-9 @issue-ocis-reva-197
  Scenario: send MKCOL requests to another user's webDav endpoints as normal user
    When user "Brian" sends "MKCOL" request on these endpoints with body "" about user "Alice"
#    When user "Brian" requests these endpoints with "MKCOL" including body then the status codes about user "Alice" should be as listed
      | endpoint                                           |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
      | /remote.php/dav/files/%username%/does-not-exist    |
    Then the HTTP status code of responses on all endpoints should be "403 409"

  Scenario: send MKCOL requests to webDav endpoints using invalid username but correct password
    When user "usero" sends "MKCOL" request on these endpoints with body "doesnotmatter" using password of the user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  Scenario: send MKCOL requests to webDav endpoints using valid password and username of different user
    When user "Brian" sends "MKCOL" request on these endpoints with body "doesnotmatter" using password of the user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send MKCOL requests to webDav endpoints without any authentication
    When a user sends "MKCOL" request on these endpoints with body "doesnotmatter" and no authentication about user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  @skipOnOcis @issue-ocis-reva-37
  Scenario: send MKCOL requests to webDav endpoints using token authentication should not work
    Given token auth has been enforced
    And a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user sends "MKCOL" request on these endpoints using the generated app password about user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile0.txt     |
      | /remote.php/webdav/PARENT                          |
      | /remote.php/dav/files/%username%/PARENT            |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "401"

  @skipOnOcis @issue-ocis-reva-37
  Scenario: send MKCOL requests to webDav endpoints using app password token as password
    Given token auth has been enforced
    And a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user "Alice" sends "MKCOL" request on these endpoints using the basic auth and generated app password about user "Alice"
      | endpoint                                       |
      | /remote.php/webdav/newCol                      |
      | /remote.php/dav/files/%username%/newCol1       |
      | /remote.php/dav/files/%username%/PARENT/newCol |
      | /remote.php/webdav/COL                         |
      | /remote.php/dav/files/%username%/FOLDER/newCol |
    Then the HTTP status code of responses on all endpoints should be "201"
