@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis
Feature: auth

  Background:
    Given user "newadmin" has been created with default attributes and without skeleton files
    And user "newadmin" has been added to group "admin"

  @skipOnOcis
  @issue-ocis-reva-30
  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send PUT request to OCS endpoints as admin with wrong password
    When user "newadmin" requests these endpoints with "PUT" including body using password "invalid" then the status codes should be as listed
      | endpoint                                         | ocs-code | http-code | body          |
      | /ocs/v1.php/cloud/users/user0                    | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0                    | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/user0/disable            | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0/disable            | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/user0/enable             | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0/enable             | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/123 | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123 | 997      | 401       | doesnotmatter |

  @skipOnOcV10
  @issue-ocis-reva-30
  @smokeTest
  #after fixing all issues delete this Scenario and use the one above
  Scenario: send PUT request to OCS endpoints as admin with wrong password
    When user "newadmin" requests these endpoints with "PUT" including body using password "invalid" then the status codes should be as listed
      | endpoint                                         | http-code | body          |
      | /ocs/v1.php/cloud/users/user0                    | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0                    | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/user0/disable            | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0/disable            | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/user0/enable             | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/user0/enable             | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/123 | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123 | 401       | doesnotmatter |
