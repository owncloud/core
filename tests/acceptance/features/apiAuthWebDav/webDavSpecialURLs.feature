@api @skipOnOcV10.10.0
Feature: make webdav request with special urls

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some data" to "/textfile0.txt"
    And user "Alice" has uploaded file with content "some data" to "/textfile1.txt"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/parent.txt"


  Scenario: send DELETE requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "DELETE" using password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER          |
    Then the HTTP status code of responses on all endpoints should be "204"


  Scenario: send GET requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "GET" using password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER          |
    Then the HTTP status code of responses on all endpoints should be "200"


  Scenario: send LOCK requests to webDav endpoints with 2 slashes
    When the user "Alice" requests these endpoints with "LOCK" to get property "d:shared" with password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER          |
    Then the HTTP status code of responses on all endpoints should be "200"


  Scenario: send MKCOL requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "MKCOL" using password "%regular%" about user "Alice"
      | endpoint                                   |
      | //remote.php/webdav/PARENT1                |
      | /remote.php//webdav/PARENT2                |
      | //remote.php//webdav/PARENT3               |
      | //remote.php/dav//files/%username%/PARENT4 |
      | /remote.php/dav/files/%username%//PARENT5  |
      | /remote.php/dav//files/%username%/PARENT6  |
    Then the HTTP status code of responses on all endpoints should be "201"


  Scenario: send MOVE requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "MOVE" using password "%regular%" about user "Alice"
      | endpoint                                             | destination                                          |
      | //remote.php/webdav/textfile0.txt                    | /remote.php/webdav/textfileZero.txt                  |
      | /remote.php//dav/files/%username%/textfile1.txt      | /remote.php/dav/files/%username%/textfileOne.txt     |
      | /remote.php/webdav//PARENT                           | /remote.php/webdav/PARENT1                           |
      | //remote.php/dav/files/%username%//PARENT1           | /remote.php/dav/files/%username%/PARENT2             |
      | /remote.php/dav//files/%username%/PARENT2/parent.txt | /remote.php/dav/files/%username%/PARENT2/parent1.txt |
    Then the HTTP status code of responses on all endpoints should be "201"


  Scenario: send POST requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "POST" including body "doesnotmatter" using password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER          |
    Then the HTTP status code of responses on all endpoints should be "500" or "501"


  Scenario: send PROPFIND requests to webDav endpoints with 2 slashes
    When the user "Alice" requests these endpoints with "PROPFIND" to get property "d:href" with password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER           |
    Then the HTTP status code of responses on all endpoints should be "207"


  Scenario: send PROPPATCH requests to webDav endpoints with 2 slashes
    When the user "Alice" requests these endpoints with "PROPPATCH" to set property "d:getlastmodified" with password "%regular%" about user "Alice"
      | endpoint                                            |
      | //remote.php/webdav/textfile0.txt                   |
      | //remote.php//dav/files/%username%/textfile1.txt    |
      | /remote.php//dav/files/%username%/PARENT/parent.txt |
      | /remote.php//webdav/PARENT                          |
      | //remote.php/dav//files/%username%//FOLDER           |
    Then the HTTP status code of responses on all endpoints should be "207"


  Scenario: send PUT requests to webDav endpoints with 2 slashes
    When user "Alice" requests these endpoints with "PUT" including body "doesnotmatter" using password "%regular%" about user "Alice"
      | endpoint                                             |
      | //remote.php/webdav/textfile0.txt                    |
      | /remote.php//webdav/textfile1.txt                    |
      | //remote.php//dav/files/%username%/textfile1.txt     |
      | /remote.php/dav/files/%username%/textfile7.txt       |
      | //remote.php/dav/files/%username%/PARENT//parent.txt |
    Then the HTTP status code of responses on all endpoints should be "204" or "201"
