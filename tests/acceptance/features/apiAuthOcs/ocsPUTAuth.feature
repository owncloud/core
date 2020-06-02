@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis
Feature: auth

  Background:
    Given user "another-admin" has been created with default attributes and without skeleton files
    And user "another-admin" has been added to group "admin"

  @skipOnOcis
  @issue-ocis-reva-30
  @smokeTest
  @skipOnBruteForceProtection @issue-brute_force_protection-112
  Scenario: send PUT request to OCS endpoints as admin with wrong password
    When user "another-admin" requests these endpoints with "PUT" including body using password "invalid" then the status codes about user "Alice" should be as listed
      | endpoint                                         | ocs-code | http-code | body          |
      | /ocs/v1.php/cloud/users/%username%               | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%               | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/disable       | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/disable       | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/enable        | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/enable        | 997      | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/123 | 997      | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123 | 997      | 401       | doesnotmatter |

  @skipOnOcV10
  @issue-ocis-reva-30
  @smokeTest
  #after fixing all issues delete this Scenario and use the one above
  Scenario: send PUT request to OCS endpoints as admin with wrong password
    When user "another-admin" requests these endpoints with "PUT" including body using password "invalid" then the status codes about user "Alice" should be as listed
      | endpoint                                         | http-code | body          |
      | /ocs/v1.php/cloud/users/%username%               | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%               | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/disable       | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/disable       | 401       | doesnotmatter |
      | /ocs/v1.php/cloud/users/%username%/enable        | 401       | doesnotmatter |
      | /ocs/v2.php/cloud/users/%username%/enable        | 401       | doesnotmatter |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares/123 | 401       | doesnotmatter |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares/123 | 401       | doesnotmatter |
