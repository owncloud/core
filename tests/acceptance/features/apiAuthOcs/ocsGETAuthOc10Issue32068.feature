@api @files_sharing-app-required @issue-32068
Feature: current oC10 behavior for issue-32068

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @issue-32068 @issue-ocis-reva-30 @smokeTest
  Scenario: using OCS anonymously
    When a user requests these endpoints with "GET" and no authentication
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v1.php/cloud/apps                                      |
      | /ocs/v2.php/cloud/apps                                      |
      | /ocs/v1.php/cloud/groups                                    |
      | /ocs/v2.php/cloud/groups                                    |
      | /ocs/v1.php/cloud/users                                     |
      | /ocs/v2.php/cloud/users                                     |
      | /ocs/v1.php/privatedata/getattribute                        |
      | /ocs/v2.php/privatedata/getattribute                        |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    #And the OCS status code of responses on all endpoints should be "401"

  @issue-32068 @issue-ocis-reva-11 @issue-ocis-reva-30 @issue-ocis-reva-31 @issue-ocis-reva-32 @issue-ocis-reva-33 @issue-ocis-reva-34 @issue-ocis-reva-35
  Scenario: using OCS with non-admin basic auth
    When the user "Alice" requests these endpoints with "GET" with basic auth
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v1.php/config                                          |
      | /ocs/v1.php/privatedata/getattribute                        |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When the user "Alice" requests these endpoints with "GET" with basic auth
      | endpoint                                                    |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v2.php/config                                          |
      | /ocs/v2.php/privatedata/getattribute                        |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"
    When the user "Alice" requests these endpoints with "GET" with basic auth
      | endpoint                 |
      | /ocs/v1.php/cloud/apps   |
      | /ocs/v1.php/cloud/groups |
      | /ocs/v1.php/cloud/users  |
      | /ocs/v2.php/cloud/apps   |
      | /ocs/v2.php/cloud/groups |
      | /ocs/v2.php/cloud/users  |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    #And the OCS status code of responses on all endpoints should be "401"

  @issue-32068 @issue-ocis-reva-29 @issue-ocis-reva-30 @smokeTest @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: using OCS as normal user with wrong password
    When user "Alice" requests these endpoints with "GET" using password "invalid"
      | endpoint                                                    |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                |
      | /ocs/v1.php/cloud/apps                                      |
      | /ocs/v2.php/cloud/apps                                      |
      | /ocs/v1.php/cloud/groups                                    |
      | /ocs/v2.php/cloud/groups                                    |
      | /ocs/v1.php/cloud/users                                     |
      | /ocs/v2.php/cloud/users                                     |
      | /ocs/v1.php/privatedata/getattribute                        |
      | /ocs/v2.php/privatedata/getattribute                        |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    #And the OCS status code of responses on all endpoints should be "401"
    When user "Alice" requests these endpoints with "GET" using password "invalid"
      | endpoint           |
      | /ocs/v1.php/config |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    When user "Alice" requests these endpoints with "GET" using password "invalid"
      | endpoint           |
      | /ocs/v2.php/config |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "200"
