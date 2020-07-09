@api @files_sharing-app-required @skipOnOcis @issue-ocis-reva-41
Feature: cannot share resources when in a group that is excluded from sharing

  Background:
    Given using the OCS API version defined externally
    And user "Alice" has been created with default attributes and skeleton files

  Scenario: user who is excluded from sharing tries to share a file with another user
    Given user "Brian" has been created with default attributes and skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has moved file "welcome.txt" to "fileToShare.txt"
    When user "Brian" shares file "fileToShare.txt" with user "Alice" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "200" for OCS API version 1 or "403" for OCS API version 2
    And as "Alice" file "fileToShare.txt" should not exist

  Scenario: user who is excluded from sharing tries to share a file with a group
    Given user "Brian" has been created with default attributes and skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And group "grp2" has been created
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp2"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has moved file "welcome.txt" to "fileToShare.txt"
    When user "Brian" shares file "fileToShare.txt" with group "grp2" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "200" for OCS API version 1 or "403" for OCS API version 2
    And as "Carol" file "fileToShare.txt" should not exist

  Scenario: user who is excluded from sharing tries to share a folder with another user
    Given user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp1"]'
    And user "Brian" has created folder "folderToShare"
    When user "Brian" shares folder "folderToShare" with user "Alice" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "200" for OCS API version 1 or "403" for OCS API version 2
    And as "Alice" folder "folderToShare" should not exist

  Scenario: user who is excluded from sharing tries to share a folder with a group
    Given user "Brian" has been created with default attributes and without skeleton files
    And group "grp0" has been created
    And group "grp1" has been created
    And user "Alice" has been added to group "grp0"
    And user "Brian" has been added to group "grp1"
    And parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["grp0"]'
    And user "Alice" has created folder "folderToShare"
    When user "Alice" shares folder "folderToShare" with group "grp1" using the sharing API
    Then the OCS status code should be "403"
    And the HTTP status code should be "200" for OCS API version 1 or "403" for OCS API version 2
    And as "Brian" folder "folderToShare" should not exist
