@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: auth

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @skipOnOcis
  @issue-ocis-reva-30
  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send POST requests to OCS endpoints as normal user with wrong password
    When user "Alice" requests these endpoints with "POST" including body using password "invalid" then the status codes about user "Alice" should be as listed
      | endpoint                                                        | ocs-code | http-code | body          |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                    | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                    | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/apps/testing                                  | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/apps/testing                                  | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/groups                                        | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/groups                                        | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users                                         | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users                                         | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/groups                       | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/groups                       | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/subadmins                    | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/subadmins                    | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/person/check                                        | 101      | 200       | doesnotmatter |
      | /ocs/v2.php/person/check                                        | 400      | 400       | doesnotmatter |
      | /ocs/v1.php/privatedata/deleteattribute/testing/test            | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/privatedata/deleteattribute/testing/test            | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/privatedata/setattribute/testing/test               | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/privatedata/setattribute/testing/test               | 997      | 401       | doesnotmatter |

  @skipOnOcV10
  @issue-ocis-reva-30
  @smokeTest
  #after fixing all issues delete this Scenario and use the one above
  Scenario: send POST requests to OCS endpoints as normal user with wrong password
    When user "Alice" requests these endpoints with "POST" including body using password "invalid" then the status codes about user "Alice" should be as listed
      | endpoint                                                        | http-code | body          |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                    | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                    | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/pending/123        | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/pending/123        | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/apps/testing                                  | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/apps/testing                                  | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/groups                                        | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/groups                                        | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users                                         | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users                                         | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/groups                       | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/groups                       | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/subadmins                    | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/subadmins                    | 401       | doesnotmatter |
      | /ocs/v1.php/person/check                                        | 401       | doesnotmatter |
      | /ocs/v2.php/person/check                                        | 401       | doesnotmatter |
      | /ocs/v1.php/privatedata/deleteattribute/testing/test            | 401       | doesnotmatter |
      | /ocs/v2.php/privatedata/deleteattribute/testing/test            | 401       | doesnotmatter |
      | /ocs/v1.php/privatedata/setattribute/testing/test               | 401       | doesnotmatter |
      | /ocs/v2.php/privatedata/setattribute/testing/test               | 401       | doesnotmatter |
