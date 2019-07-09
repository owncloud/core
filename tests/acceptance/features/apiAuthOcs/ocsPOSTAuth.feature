@api @TestAlsoOnExternalUserBackend
Feature: auth

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  Scenario: send POST requests to OCS endpoints as normal user with wrong password
      When user "user0" requests these endpoints with "POST" including body using password "invalid" then the status codes should be as listed
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
       | /ocs/v1.php/cloud/users/user0/groups                            | 997      | 401       | doesnotmatter |
       | /ocs/v2.php/cloud/users/user0/groups                            | 997      | 401       | doesnotmatter |
       | /ocs/v1.php/cloud/users/user0/subadmins                         | 997      | 401       | doesnotmatter |
       | /ocs/v2.php/cloud/users/user0/subadmins                         | 997      | 401       | doesnotmatter |
       | /ocs/v1.php/person/check                                        | 101      | 200       | doesnotmatter |
       | /ocs/v2.php/person/check                                        | 400      | 400       | doesnotmatter |
       | /ocs/v1.php/privatedata/deleteattribute/testing/test            | 997      | 401       | doesnotmatter |
       | /ocs/v2.php/privatedata/deleteattribute/testing/test            | 997      | 401       | doesnotmatter |
       | /ocs/v1.php/privatedata/setattribute/testing/test               | 997      | 401       | doesnotmatter |
       | /ocs/v2.php/privatedata/setattribute/testing/test               | 997      | 401       | doesnotmatter |
