@api
Feature: auth

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @smokeTest
  Scenario: using WebDAV anonymously
    When a user requests "/remote.php/webdav" with "PROPFIND" and no authentication
    Then the HTTP status code should be "401"

  @smokeTest
  Scenario: using WebDAV with basic auth
    When user "Alice" requests "/remote.php/webdav" with "PROPFIND" using basic auth
    Then the HTTP status code should be "207"

  @smokeTest @skipOnOcis @notToImplementOnOCIS @issue-ocis-reva-28
  Scenario: using WebDAV with token auth
    Given a new client token for "Alice" has been generated
    When user "Alice" requests "/remote.php/webdav" with "PROPFIND" using basic token auth
    Then the HTTP status code should be "207"

	# DAV token auth is not possible yet
	#Scenario: using WebDAV with a client token
	#	When requesting "/remote.php/webdav" with "PROPFIND" using a client token
	#	Then the HTTP status code should be "207"

  @smokeTest  @skipOnOcis @toImplementOnOCIS
  Scenario: using WebDAV with browser session
    Given a new browser session for "Alice" has been started
    When the user requests "/remote.php/webdav" with "PROPFIND" using the browser session
    Then the HTTP status code should be "207"
