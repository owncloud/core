@api
Feature: refuse access
  As an administrator
  I want to refuse access to unauthenticated and disabled users
  So that I can secure the system

  Background:
    Given using OCS API version "1"

  @smokeTest @skipOnOcis
  Scenario Outline: Unauthenticated call
    Given using <dav_version> DAV path
    When an unauthenticated client connects to the dav endpoint using the WebDAV API
    Then the HTTP status code should be "401"
    And there should be no duplicate headers
    And the following headers should be set
      | header           | value                                        |
      | WWW-Authenticate | Basic realm="%productname%", charset="UTF-8" |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis
  Scenario Outline: A disabled user cannot use webdav
    Given using <dav_version> DAV path
    And user "Alice" has been created with default attributes and skeleton files
    And user "Alice" has been disabled
    When user "Alice" downloads file "/welcome.txt" using the WebDAV API
    Then the HTTP status code should be "401"
    Examples:
      | dav_version |
      | old         |
      | new         |
