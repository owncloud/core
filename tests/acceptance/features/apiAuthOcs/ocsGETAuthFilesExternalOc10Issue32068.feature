@api @files_external-app-required @issue-32068
Feature: current oC10 behavior for issue-32068

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario: using OCS anonymously
    When a user requests these endpoints with "GET" and no authentication
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    #And the OCS status code of responses on all endpoints should be "401"


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

  @smokeTest @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: using OCS as normal user with wrong password
    When user "Alice" requests these endpoints with "GET" using password "invalid"
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    #And the OCS status code of responses on all endpoints should be "401"
