@api @notToImplementOnOCIS
Feature: usernames are case-insensitive in webDAV requests with app passwords

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"

  @skipOnOcV10.8 @skipOnOcV10.9 @skipOnOcV10.10.0
  Scenario: send PUT requests to webDav endpoints using app password token as password and lowercase of username
    Given token auth has been enforced
    And a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user "alice" requests these endpoints with "PUT" with body "doesnotmatter" using basic auth and generated app password about user "Alice"
      | endpoint                                           |
      | /remote.php/webdav/textfile0.txt                   |
      | /remote.php/dav/files/%username%/textfile1.txt     |
      | /remote.php/dav/files/%username%/PARENT/parent.txt |
    Then the HTTP status code of responses on all endpoints should be "204"
    When the user "alice" requests these endpoints with "PUT" with body "doesnotmatter" using basic auth and generated app password about user "Alice"
      | endpoint                                 |
      # this folder is created, so gives 201 - CREATED
      | /remote.php/webdav/PARENS                |
      | /remote.php/dav/files/%username%/FOLDERS |
    Then the HTTP status code of responses on all endpoints should be "201"
    When the user "alice" requests these endpoints with "PUT" with body "doesnotmatter" using basic auth and generated app password about user "Alice"
      | endpoint                                |
      # this folder already exists so gives 409 - CONFLICT
      | /remote.php/dav/files/%username%/FOLDER |
    Then the HTTP status code of responses on all endpoints should be "409"
