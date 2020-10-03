@api @notToImplementOnOCIS
Feature: CORS headers current oC10 behavior for issue-34664

  @issue-34664
  Scenario Outline: CORS headers should be returned when setting CORS domain sending Origin header
    Given user "Alice" has been created with default attributes and skeleton files
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has added "https://aphno.badal" to the list of personal CORS domains
    When user "Alice" sends HTTP method "GET" to OCS API endpoint "<endpoint>" with headers
      | header | value               |
      | Origin | https://aphno.badal |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Then the following headers should not be set
      | header                        |
      | Access-Control-Allow-Headers  |
      | Access-Control-Expose-Headers |
      | Access-Control-Allow-Origin   |
      | Access-Control-Allow-Methods  |
    Examples:
      | ocs_api_version | endpoint | ocs-code | http-code |
      | 1               | /config  | 100      | 200       |
      | 2               | /config  | 200      | 200       |
