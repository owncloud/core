@api @files_sharing-app-required
Feature: public share sharers groups setting
  As an admin
  I should be able to allow only certain groups to create public links
  So that random links are not generated on my file system

  Background:
    Given group "grp1" has been created
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "file to share with user" to "/fileToShare.txt"


  Scenario: users present in public share shares groups can create new public link shares
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has been added to group "grp1"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file             |
      | mimetype               | text/plain       |
      | file_target            | /fileToShare.txt |
      | path                   | /fileToShare.txt |
      | permissions            | read             |
      | share_type             | public_link      |
      | displayname_file_owner | %displayname%    |
      | displayname_owner      | %displayname%    |
      | uid_file_owner         | %username%       |
      | uid_owner              | %username%       |
      | name                   |                  |


  Scenario: users not present in public share shares groups cannot create a new public link share
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    When user "Alice" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    Then the OCS status code should be "403"
    And the HTTP status code should be "200"
    And the OCS status message should be "Public link creation is only possible for certain groups"


  Scenario: existing links can still be updated by sharers even if they are not present in public share sharers groups
    Given user "Alice" has created a public link share with settings
      | path        | /fileToShare.txt |
      | permissions | read             |
    And parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    When user "Alice" updates the last public link share using the sharing API with
      | expireDate | +3 days |
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And the fields of the last response to user "Alice" should include
      | expiration | +3 days |


  Scenario: existing links can still be deleted by sharers even if they are not present in public share sharers groups
    Given user "Alice" has created a public link share with settings
      | path        | /fileToShare.txt |
      | permissions | read             |
      | name        | shared-link       |
    And parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    When user "Alice" deletes public link share named "shared-link" in file "fileToShare.txt" using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "100"
    And as user "Alice" the file "fileToShare.txt" should not have any shares


  Scenario: creating a new link share is not restricted if no groups are inside the allowed public share sharers groups even if allowlist is enabled
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    When user "Alice" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" should include
      | item_type              | file             |
      | mimetype               | text/plain       |
      | file_target            | /fileToShare.txt |
      | path                   | /fileToShare.txt |
      | permissions            | read             |
      | share_type             | public_link      |
      | displayname_file_owner | %displayname%    |
      | displayname_owner      | %displayname%    |
      | uid_file_owner         | %username%       |
      | uid_owner              | %username%       |
      | name                   |                  |


  Scenario: multiple groups can be added to public share sharers groups allow list
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "file to share with user" to "/fileToShare.txt"
    And user "Carol" has uploaded file with content "file to share with user" to "/fileToShare.txt"
    And group "grp2" has been created
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp2"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1", "grp2"]'
    When user "Alice" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    And user "Brian" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    And user "Carol" creates a public link share using the sharing API with settings
      | path | fileToShare.txt |
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on each endpoint should be "100, 100, 403" respectively
    And the OCS status message should be "Public link creation is only possible for certain groups"
