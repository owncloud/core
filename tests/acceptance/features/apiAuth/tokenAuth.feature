@api @issue-ocis-reva-28 @issue-ocis-reva-37
Feature: tokenAuth

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files
    And token auth has been enforced


  Scenario: creating a user with basic auth should be blocked when token auth is enforced
    Given user "brand-new-user" has been deleted
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"


  Scenario: moving a file should be blocked when token auth is enforced
    Given using new DAV path
    When user "Alice" moves file "/textfile0.txt" to "/renamed_textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"

  @smokeTest
  Scenario: can access files app with an app password when token auth is enforced
    Given a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/index.php/apps/files" with "GET" using the generated app password
    Then the HTTP status code should be "200"


  Scenario: cannot access files app with an app password that is deleted when token auth is enforced
    Given a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    And the user has deleted the app password named "my-client"
    When the user requests "/index.php/apps/files" with "GET" using the generated app password
    Then the HTTP status code should be "401"


  Scenario: Access files app with when there are multiple tokens generated
    Given a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    And the user has generated a new app password named "my-new-client"
    When the user requests "/index.php/apps/files" with "GET" using app password named "my-client"
    Then the HTTP status code should be "200"
    When the user requests "/index.php/apps/files" with "GET" using app password named "my-new-client"
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: cannot access files app with basic auth when token auth is enforced
    When user "Alice" requests "/index.php/apps/files" with "GET" using basic auth
    Then the HTTP status code should be "401"


  Scenario: using WebDAV with basic auth should be blocked when token auth is enforced
    When user "Alice" requests "/remote.php/webdav" with "PROPFIND" using basic auth
    Then the HTTP status code should be "401"

  @files_sharing-app-required
  Scenario: using OCS with basic auth should be blocked when token auth is enforced
    When user "Alice" requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using basic auth
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
