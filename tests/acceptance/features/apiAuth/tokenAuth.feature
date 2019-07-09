@api
Feature: tokenAuth

  Background:
    Given using OCS API version "1"
    And user "user1" has been created with default attributes and skeleton files
    And token auth has been enforced

  Scenario: creating a user with basic auth should be blocked when token auth is enforced
    Given user "brand-new-user" has been deleted
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"

  Scenario: moving a file should be blocked when token auth is enforced
    Given using new DAV path
    When user "user1" moves file "/textfile0.txt" to "/renamed_textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"

  @smokeTest
  Scenario: can access files app with an app password when token auth is enforced
    Given a new browser session for "user1" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/index.php/apps/files" with "GET" using the generated app password
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: cannot access files app with basic auth when token auth is enforced
    When user "user1" requests "/index.php/apps/files" with "GET" using basic auth
    Then the HTTP status code should be "401"

  Scenario: using WebDAV with basic auth should be blocked when token auth is enforced
    When user "user1" requests "/remote.php/webdav" with "PROPFIND" using basic auth
    Then the HTTP status code should be "401"

  Scenario: using OCS with basic auth should be blocked when token auth is enforced
    When user "user1" requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using basic auth
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
