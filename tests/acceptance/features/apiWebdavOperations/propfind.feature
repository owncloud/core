@api
Feature: PROPFIND

  @issue-ocis-751
  Scenario: PROPFIND to "/remote.php/dav/files"
    Given user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" requests "/remote.php/dav/files" with "PROPFIND" using basic auth
    Then the HTTP status code should be "405"

  Scenario Outline: PROPFIND to "/remote.php/dav/files" with depth header
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set depth_infinity_allowed to <depth_infinity_allowed>
    When user "Alice" requests "/remote.php/dav/files/alice" with "PROPFIND" using basic auth and with headers
      | header | value   |
      | depth  | <depth> |
    Then the HTTP status code should be "<http_status>"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @notToImplementOnOCIS
    Examples:
      | depth_infinity_allowed | depth    | http_status |
      | 1                      | 0        | 207         |
      | 1                      | infinity | 207         |
      | 0                      | 0        | 207         |
      | 0                      | infinity | 412         |
    @skipOnOcV10
    Examples:
      | depth_infinity_allowed | depth    | http_status |
      | 1                      | 0        | 207         |
      | 1                      | infinity | 207         |