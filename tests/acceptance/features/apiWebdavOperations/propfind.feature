@api
Feature: PROPFIND

  @issue-ocis-751
  Scenario Outline: PROPFIND to "/remote.php/dav/(files|spaces)"
    Given user "Alice" has been created with default attributes and without skeleton files
    When user "Alice" requests "<dav_path>" with "PROPFIND" using basic auth
    Then the HTTP status code should be "405"
    Examples:
      | dav_path                      |
      | /remote.php/dav/files         |


  Scenario Outline: PROPFIND to "/remote.php/dav/(files|spaces)" with depth header
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set depth_infinity_allowed to <depth_infinity_allowed>
    When user "Alice" requests "<dav_path>" with "PROPFIND" using basic auth and with headers
      | header | value   |
      | depth  | <depth> |
    Then the HTTP status code should be "<http_status>"
    @depthInfinityPropfindEnabled
    Examples:
      | dav_path                    | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/files/alice | 1                      | 0        | 207         |
      | /remote.php/dav/files/alice | 1                      | infinity | 207         |
    @depthInfinityPropfindDisabled
    Examples:
      | dav_path                    | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/files/alice | 0                      | 0        | 207         |
      | /remote.php/dav/files/alice | 0                      | infinity | 412         |


  Scenario: send PROPFIND request to a public link
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    When the public sends "PROPFIND" request to the last public link share using the new public WebDAV API
    Then the HTTP status code should be "207"
    And the value of the item "//d:href" in the response should match "/%base_path%\/remote.php\/dav\/public-files\/%public_token%\/$/"
    And the value of the item "//oc:public-link-share-owner" in the response should be "Alice"


  Scenario: send PROPFIND request to a public link shared with password
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
      | password    | 1111    |
    When the public sends "PROPFIND" request to the last public link share using the new public WebDAV API with password "1111"
    Then the HTTP status code should be "207"
    And the value of the item "//d:href" in the response should match "/%base_path%\/remote.php\/dav\/public-files\/%public_token%\/$/"
    And the value of the item "//oc:public-link-share-owner" in the response should be "Alice"


  Scenario: send PROPFIND request to a public link shared with password (request without password)
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
      | password    | 1111    |
    When the public sends "PROPFIND" request to the last public link share using the new public WebDAV API
    Then the HTTP status code should be "401"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotAuthenticated"


  Scenario: send PROPFIND request to a public link shared with password (request with incorrect password)
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
      | password    | 1111    |
    When the public sends "PROPFIND" request to the last public link share using the new public WebDAV API with password "1234"
    Then the HTTP status code should be "401"
    And the value of the item "/d:error/s:exception" in the response should be "Sabre\DAV\Exception\NotAuthenticated"
