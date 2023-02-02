@webUI @files_sharing-app-required
Feature: public share sharers groups setting
  As an admin
  I should be able to allow only certain groups to create public links
  So that random links are not generated on my file system

  Background:
    Given group "grp1" has been created
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FolderToShare"
    And user "Alice" has uploaded file with content "file to share with user" to "FolderToShare/fileToShare.txt"


  Scenario: users present in public share shares groups can create new public link shares using webUI
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has been added to group "grp1"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "FolderToShare" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "fileToShare.txt" should be listed on the webUI


  Scenario: users not present in public share shares groups cannot create a new public link share using webUI
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for folder "FolderToShare"
    Then the user should not see the public link share tab on the webUI


  Scenario: sharer not present in public share shares groups can still access existing share but cannot create new link share
    Given user "Alice" has created a public link share with settings
      | path        | /FolderToShare |
      | permissions | read           |
      | name        | shared-link    |
    And parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for folder "FolderToShare"
    And the user has opened the public link share tab
    Then the public link with name "shared-link" should be in the public links list on the webUI
    But the user should not see the create public link button on the webUI


  Scenario: existing links are still accessible for sharers even if not present in public share shares groups using webUI
    Given user "Alice" has created a public link share with settings
      | path        | /FolderToShare |
      | permissions | read,delete    |
      | name        | Public link    |
    And parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has logged in using the webUI
    And the user has opened the share dialog for folder "FolderToShare"
    And the user has opened the public link share tab
    When the user changes the permission of the public link named "Public link" to "read"
    And the public accesses the last created public link using the webUI
    Then file "fileToShare.txt" should be listed on the webUI
    And it should not be possible to delete file "fileToShare.txt" using the webUI


  Scenario: existing links can still be deleted by sharers even if not present in public share shares groups using webUI
    Given user "Alice" has created a public link share with settings
      | path        | /FolderToShare |
      | permissions | read,delete    |
      | name        | Public link    |
    And parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And parameter "public_share_sharers_groups_allowlist" of app "files_sharing" has been set to '["grp1"]'
    And user "Alice" has logged in using the webUI
    When the user removes the public link of folder "FolderToShare" using the webUI
    Then the public should see an error message "File not found" while accessing last created public link using the webUI


  Scenario: creating new link shares is not restricted if no groups are inside the allowed public share sharers groups even if allowlist is enabled
    Given parameter "public_share_sharers_groups_allowlist_enabled" of app "files_sharing" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "FolderToShare" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "fileToShare.txt" should be listed on the webUI
