@api
Feature: PROPFIND

  @issue-ocis-751
  Scenario: PROPFIND to "/remote.php/dav/files"
    Given user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" requests "/remote.php/dav/files" with "PROPFIND" using basic auth
    Then the HTTP status code should be "405"

  Scenario: PROPFIND to "/remote.php/dav/files" with depth header
    Given user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" requests "/remote.php/dav/files" with "PROPFIND" using basic auth and with headers
      | header | value |
      | depth  | 0     |
    Then the HTTP status code should be "207"
