@api @skipOnOcV10
Feature: OPTIONS request

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario: send OPTIONS request to webDav endpoints using the TUS protocol with valid password and username
    When user "Alice" requests these endpoints with "OPTIONS" including body "doesnotmatter" using the password of user "Alice"
      | endpoint                          |
      | /remote.php/webdav/               |
      | /remote.php/dav/files/%username%/ |
    Then the HTTP status code should be "204"
    And the following headers should be set
      | header                 | value                                             |
      | Tus-Resumable          | 1.0.0                                             |
      | Tus-Version            | 1.0.0                                             |
      | Tus-Extension          | creation,creation-with-upload,checksum,expiration |
      | Tus-Checksum-Algorithm | md5,sha1,adler32                                  |


  Scenario: send OPTIONS request to webDav endpoints using the TUS protocol without any authentication
    When a user requests these endpoints with "OPTIONS" with body "doesnotmatter" and no authentication about user "Alice"
      | endpoint                          |
      | /remote.php/webdav/               |
      | /remote.php/dav/files/%username%/ |
    Then the HTTP status code should be "204"
    And the following headers should be set
      | header                 | value                                             |
      | Tus-Resumable          | 1.0.0                                             |
      | Tus-Version            | 1.0.0                                             |
      | Tus-Extension          | creation,creation-with-upload,checksum,expiration |
      | Tus-Checksum-Algorithm | md5,sha1,adler32                                  |


  Scenario: send OPTIONS request to webDav endpoints using the TUS protocol with valid username and wrong password
    When user "Alice" requests these endpoints with "OPTIONS" including body "doesnotmatter" using password "invalid" about user "Alice"
      | endpoint                          |
      | /remote.php/webdav/               |
      | /remote.php/dav/files/%username%/ |
    Then the HTTP status code should be "401"
    And the following headers should be set
      | header                 | value                                             |
      | Tus-Resumable          | 1.0.0                                             |
      | Tus-Version            | 1.0.0                                             |
      | Tus-Extension          | creation,creation-with-upload,checksum,expiration |
      | Tus-Checksum-Algorithm | md5,sha1,adler32                                  |


  Scenario: send OPTIONS requests to webDav endpoints using valid password and username of different user
    Given user "Brian" has been created with default attributes and without skeleton files
    When user "Brian" requests these endpoints with "OPTIONS" including body "doesnotmatter" using the password of user "Alice"
      | endpoint                          |
      | /remote.php/webdav/               |
      | /remote.php/dav/files/%username%/ |
    Then the HTTP status code should be "401"
    And the following headers should be set
      | header                 | value                                             |
      | Tus-Resumable          | 1.0.0                                             |
      | Tus-Version            | 1.0.0                                             |
      | Tus-Extension          | creation,creation-with-upload,checksum,expiration |
      | Tus-Checksum-Algorithm | md5,sha1,adler32                                  |
