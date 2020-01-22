@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: cannot share resources when in a group that is excluded from sharing

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  Scenario Outline: user who is excluded from sharing tries to share a file with another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and skeleton files
    And group "grp1" has been created
    # Note: in user_ldap, user1 is already in grp1
    And user "user1" has been added to group "grp1"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "user1" has moved file "welcome.txt" to "fileToShare.txt"
    When user "user1" shares file "fileToShare.txt" with user "user0" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And as "user0" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a file with a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and skeleton files
    And user "user3" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    # Note: in user_ldap, user1 is already in grp1, user3 is already in grp2
    And user "user1" has been added to group "grp1"
    And user "user3" has been added to group "grp2"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "user1" has moved file "welcome.txt" to "fileToShare.txt"
    When user "user1" shares file "fileToShare.txt" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And as "user3" file "fileToShare.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a folder with another user
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    # Note: in user_ldap, user1 is already in grp1
    And user "user1" has been added to group "grp1"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "user1" has created folder "folderToShare"
    When user "user1" shares folder "folderToShare" with user "user0" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And as "user0" folder "folderToShare" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user who is excluded from sharing tries to share a folder with a group
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And user "user3" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    # Note: in user_ldap, user1 is already in grp1, user3 is already in grp2
    And user "user1" has been added to group "grp1"
    And user "user3" has been added to group "grp2"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "user1" has created folder "folderToShare"
    When user "user1" shares folder "folderToShare" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "folderToShare" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

