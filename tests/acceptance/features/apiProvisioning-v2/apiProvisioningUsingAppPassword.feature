@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: access user provisioning API using app password
  As an ownCloud user
  I want to be able to use the provisioning API with an app password
  So that I can make a client app or script for provisioning users/groups that can use an app password instead of my real password.

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: admin deletes the user
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And a new client token for the administrator has been generated
    And a new browser session for the administrator has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v2.php/cloud/users/brand-new-user" with "DELETE" using the generated app password
    Then the HTTP status code should be "200"
    And user "brand-new-user" should not exist


  Scenario: subadmin gets users in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And group "brand-new-group" has been created
    And user "another-new-user" has been added to group "brand-new-group"
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    And a new client token for "brand-new-user" has been generated
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v2.php/cloud/users" with "GET" using the generated app password
    Then the users returned by the API should be
      | another-new-user |
    And the HTTP status code should be "200"

  @smokeTest
  Scenario: normal user gets their own information using the app password
    Given these users have been created with default attributes and without skeleton files:
      | username       | displayname |
      | brand-new-user | New User    |
    And a new client token for "brand-new-user" has been generated
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v2.php/cloud/users/brand-new-user" with "GET" using the generated app password
    Then the HTTP status code should be "200"
    And the display name returned by the API should be "New User"


  Scenario: subadmin tries to get users of other group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And group "brand-new-group" has been created
    And group "another-new-group" has been created
    And user "another-new-user" has been added to group "another-new-group"
    And user "brand-new-user" has been made a subadmin of group "brand-new-group"
    And a new client token for "brand-new-user" has been generated
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v2.php/cloud/users" with "GET" using the generated app password
    Then the users returned by the API should not include "another-new-user"
    And the HTTP status code should be "200"


  Scenario: normal user tries to get other user information using the app password
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | brand-new-user   |
      | another-new-user |
    And a new client token for "brand-new-user" has been generated
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "/ocs/v2.php/cloud/users/another-new-user" with "GET" using the generated app password
    Then the HTTP status code should be "401"
    And the API should not return any data


  Scenario: normal user gets his own resources using the app password
    Given these users have been created with small skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    When the user "brand-new-user" requests these endpoints with "PROPFIND" to get property "d:getetag" using basic auth and generated app password about user "brand-new-user"
      | endpoint                                       |
      | /remote.php/dav/files/%username%/textfile0.txt |
    Then the HTTP status code should be "207"
