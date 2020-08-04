@api @files_sharing-app-required
Feature: auth

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @skipOnOcis @issue-ocis-reva-30
  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send POST requests to OCS endpoints as normal user with wrong password
    When user "Alice" requests these endpoints with "POST" including body "doesnotmatter" using password "invalid" about user "Alice"
      | endpoint                                                        |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/123 |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending/123 |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                    |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                    |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/pending/123        |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/pending/123        |
      | /ocs/v1.php/cloud/apps/testing                                  |
      | /ocs/v2.php/cloud/apps/testing                                  |
      | /ocs/v1.php/cloud/groups                                        |
      | /ocs/v2.php/cloud/groups                                        |
      | /ocs/v1.php/cloud/users                                         |
      | /ocs/v2.php/cloud/users                                         |
      | /ocs/v1.php/cloud/users/%username%/groups                       |
      | /ocs/v2.php/cloud/users/%username%/groups                       |
      | /ocs/v1.php/cloud/users/%username%/subadmins                    |
      | /ocs/v2.php/cloud/users/%username%/subadmins                    |
      | /ocs/v1.php/privatedata/deleteattribute/testing/test            |
      | /ocs/v2.php/privatedata/deleteattribute/testing/test            |
      | /ocs/v1.php/privatedata/setattribute/testing/test               |
      | /ocs/v2.php/privatedata/setattribute/testing/test               |
    Then the HTTP status code of responses on all endpoints should be "401"
    And the OCS status code of responses on all endpoints should be "997"
    When user "Alice" requests these endpoints with "POST" including body "doesnotmatter" using password "invalid" about user "Alice"
      | endpoint                 |
      | /ocs/v1.php/person/check |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "101"
    When user "Alice" requests these endpoints with "POST" including body "doesnotmatter" using password "invalid" about user "Alice"
      | endpoint                 |
      | /ocs/v2.php/person/check |
    Then the HTTP status code of responses on all endpoints should be "400"
    And the OCS status code of responses on all endpoints should be "400"
