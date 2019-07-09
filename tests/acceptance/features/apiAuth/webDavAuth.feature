@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And a new client token for "user0" has been generated

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
