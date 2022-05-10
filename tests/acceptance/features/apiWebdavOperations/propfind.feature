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

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_path                      |
      | /remote.php/dav/spaces        |


  Scenario Outline: PROPFIND to "/remote.php/dav/(files|spaces)" with depth header
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set depth_infinity_allowed to <depth_infinity_allowed>
    When user "Alice" requests "<dav_path>" with "PROPFIND" using basic auth and with headers
      | header | value   |
      | depth  | <depth> |
    Then the HTTP status code should be "<http_status>"
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @notToImplementOnOCIS @depthInfinityPropfindEnabled
    Examples:
      | dav_path                    | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/files/alice | 1                      | 0        | 207         |
      | /remote.php/dav/files/alice | 1                      | infinity | 207         |
    @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0 @notToImplementOnOCIS @depthInfinityPropfindDisabled
    Examples:
      | dav_path                    | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/files/alice | 0                      | 0        | 207         |
      | /remote.php/dav/files/alice | 0                      | infinity | 412         |
    @skipOnOcV10 @depthInfinityPropfindEnabled
    Examples:
      | dav_path                    | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/files/alice | 1                      | 0        | 207         |
      | /remote.php/dav/files/alice | 1                      | infinity | 207         |
    @skipOnOcV10 @personalSpace @depthInfinityPropfindDisabled
    Examples:
      | dav_path                         | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/spaces/%spaceid% | 0                      | 0        | 207         |
      | /remote.php/dav/spaces/%spaceid% | 0                      | infinity | 207         |
    @skipOnOcV10 @personalSpace @depthInfinityPropfindEnabled
    Examples:
      | dav_path                         | depth_infinity_allowed | depth    | http_status |
      | /remote.php/dav/spaces/%spaceid% | 1                      | 0        | 207         |
      | /remote.php/dav/spaces/%spaceid% | 1                      | infinity | 207         |