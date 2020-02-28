@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: auth

  @smokeTest @issue-32068 @skipOnOcis @issue-ocis-reva-30 @issue-ocis-reva-65
  Scenario: send DELETE requests to OCS endpoints as admin with wrong password
    When the administrator requests these endpoints with "DELETE" using password "invalid" then the status codes should be as listed
      | endpoint                                                        | ocs-code | http-code |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123                | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | /ocs/v1.php/cloud/apps/testing                                  | 997      | 401       |
      | /ocs/v2.php/cloud/apps/testing                                  | 997      | 401       |
      | /ocs/v1.php/cloud/groups/group1                                 | 997      | 401       |
      | /ocs/v2.php/cloud/groups/group1                                 | 997      | 401       |
      | /ocs/v1.php/cloud/users/user0                                   | 997      | 401       |
      | /ocs/v2.php/cloud/users/user0                                   | 997      | 401       |
      | /ocs/v1.php/cloud/users/user0/groups                            | 997      | 401       |
      | /ocs/v2.php/cloud/users/user0/groups                            | 997      | 401       |
      | /ocs/v1.php/cloud/users/user0/subadmins                         | 997      | 401       |
      | /ocs/v2.php/cloud/users/user0/subadmins                         | 997      | 401       |

  @smokeTest @skipOnOcV10 @issue-ocis-reva-30 @issue-ocis-reva-65
   #after fixing all issues delete this Scenario and use the one above
  Scenario: send DELETE requests to OCS endpoints as admin with wrong password
    When the administrator requests these endpoints with "DELETE" using password "invalid" then the status codes should be as listed
      | endpoint                                                        | http-code |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending/123 | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/123         | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/123         | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123                | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/pending/123        | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/pending/123        | 401       |
      | /ocs/v1.php/cloud/apps/testing                                  | 401       |
      | /ocs/v2.php/cloud/apps/testing                                  | 401       |
      | /ocs/v1.php/cloud/groups/group1                                 | 401       |
      | /ocs/v2.php/cloud/groups/group1                                 | 401       |
      | /ocs/v1.php/cloud/users/user0                                   | 401       |
      | /ocs/v2.php/cloud/users/user0                                   | 401       |
      | /ocs/v1.php/cloud/users/user0/groups                            | 401       |
      | /ocs/v2.php/cloud/users/user0/groups                            | 401       |
      | /ocs/v1.php/cloud/users/user0/subadmins                         | 401       |
      | /ocs/v2.php/cloud/users/user0/subadmins                         | 401       |
