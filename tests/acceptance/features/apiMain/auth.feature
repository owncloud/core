@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes
    And a new client token for "user0" has been generated

	# FILES APP
  @smokeTest
  Scenario: access files app anonymously
    When a user requests "/index.php/apps/files" with "GET" and no authentication
    Then the HTTP status code should be "401"

  @smokeTest
  Scenario: access files app with basic auth
    When user "user0" requests "/index.php/apps/files" with "GET" using basic auth
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with basic token auth
    When user "user0" requests "/index.php/apps/files" with "GET" using basic token auth
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with a client token
    When the user requests "/index.php/apps/files" with "GET" using the generated client token
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with browser session
    Given a new browser session for "user0" has been started
    When the user requests "/index.php/apps/files" with "GET" using the browser session
    Then the HTTP status code should be "200"

  @smokeTest
  Scenario: access files app with an app password
    Given a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/index.php/apps/files" with "GET" using the generated app password
    Then the HTTP status code should be "200"

	# WebDAV

  Scenario: using WebDAV anonymously
    When a user requests "/remote.php/webdav" with "PROPFIND" and no authentication
    Then the HTTP status code should be "401"

  Scenario: using WebDAV with basic auth
    When user "user0" requests "/remote.php/webdav" with "PROPFIND" using basic auth
    Then the HTTP status code should be "207"

  Scenario: using WebDAV with token auth
    When user "user0" requests "/remote.php/webdav" with "PROPFIND" using basic token auth
    Then the HTTP status code should be "207"

	# DAV token auth is not possible yet
	#Scenario: using WebDAV with a client token
	#	When requesting "/remote.php/webdav" with "PROPFIND" using a client token
	#	Then the HTTP status code should be "207"

  Scenario: using WebDAV with browser session
    Given a new browser session for "user0" has been started
    When the user requests "/remote.php/webdav" with "PROPFIND" using the browser session
    Then the HTTP status code should be "207"


	# OCS

  Scenario: using OCS anonymously
    When a user requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" and no authentication
    Then the OCS status code should be "997"

  Scenario: using OCS with basic auth
    When user "user0" requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using basic auth
    Then the OCS status code should be "100"

  Scenario: using OCS with token auth
    When user "user0" requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using basic token auth
    Then the OCS status code should be "100"

  Scenario: using OCS with client token
    When the user requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using the generated client token
    Then the OCS status code should be "100"

  Scenario: using OCS with browser session
    Given a new browser session for "user0" has been started
    When the user requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using the browser session
    Then the OCS status code should be "100"

  Scenario: using OCS with an app password
    Given a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v1.php/apps/files_sharing/api/v1/remote_shares" with "GET" using the generated app password
    Then the HTTP status code should be "200"
