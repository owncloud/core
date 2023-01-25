@api @files_external-app-required
Feature: auth

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @issue-32068 @skipOnOcV10 @smokeTest
  Scenario: using OCS anonymously
    When a user requests these endpoints with "GET" and no authentication
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "401"

  @issue-32068 @skipOnOcV10
  Scenario: using OCS with non-admin basic auth
    When the user "Alice" requests these endpoints with "GET" with basic auth
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When the user "Alice" requests these endpoints with "GET" with basic auth
      | endpoint                                                    |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"

  @issue-32068 @skipOnOcV10 @smokeTest @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: using OCS as normal user with wrong password
    When user "Alice" requests these endpoints with "GET" using password "invalid"
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "401"


  Scenario: using OCS as admin user with wrong password
    Given user "another-admin" has been created with default attributes and without skeleton files
    And user "another-admin" has been added to group "admin"
    When user "another-admin" requests these endpoints with "GET" using password "invalid"
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"


  Scenario: using OCS with token auth of a normal user
    Given a new client token for "Alice" has been generated
    When user "Alice" requests these endpoints with "GET" using basic token auth
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When user "Alice" requests these endpoints with "GET" using basic token auth
      | endpoint                                                    |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"


  Scenario: using OCS with browser session of normal user
    Given a new browser session for "Alice" has been started
    When the user requests these endpoints with "GET" using a new browser session
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When the user requests these endpoints with "GET" using a new browser session
      | endpoint                                                    |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"


  Scenario: using OCS with an app password of a normal user
    Given a new browser session for "Alice" has been started
    And the user has generated a new app password named "my-client"
    When the user requests these endpoints with "GET" using the generated app password
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When the user requests these endpoints with "GET" using the generated app password
      | endpoint                                                    |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"
