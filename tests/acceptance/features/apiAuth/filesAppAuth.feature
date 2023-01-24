@api @issue-ocis-reva-28
Feature: auth

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario: access files app anonymously
    When a user requests "/index.php/apps/files" with "GET" and no authentication
    Then the HTTP status code should be "401"

  @smokeTest
  Scenario: access files app with basic auth
    When user "Alice" requests "/index.php/apps/files" with "GET" using basic auth
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with basic token auth
    Given a new client token for "Alice" has been generated
    When user "Alice" requests "/index.php/apps/files" with "GET" using basic token auth
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with a client token
    Given a new client token for "Alice" has been generated
    When the user requests "/index.php/apps/files" with "GET" using the generated client token
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with browser session
    Given a new browser session for "Alice" has been started
    When the user requests "/index.php/apps/files" with "GET" using the browser session
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with an app password
    Given a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/index.php/apps/files" with "GET" using the generated app password
    Then the HTTP status code should be "200"
