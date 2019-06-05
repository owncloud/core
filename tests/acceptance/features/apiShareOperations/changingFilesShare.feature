@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files

  @smokeTest
  Scenario: moving a file into a share as recipient
    Given user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" moves file "/textfile0.txt" to "/shared/shared_file.txt" using the WebDAV API
    Then as "user1" file "/shared/shared_file.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should exist

  @smokeTest @files_trashbin-app-required
  Scenario: moving a file out of a share as recipient creates a backup for the owner
    Given user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves file "/shared_renamed/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then as "user1" file "/taken_out.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should not exist
    And as "user0" file "/shared_file.txt" should exist in trash

  @files_trashbin-app-required
  Scenario: moving a folder out of a share as recipient creates a backup for the owner
    Given user "user0" has created folder "/shared"
    And user "user0" has created folder "/shared/sub"
    And user "user0" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves folder "/shared_renamed/sub" to "/taken_out" using the WebDAV API
    Then as "user1" file "/taken_out" should exist
    And as "user0" folder "/shared/sub" should not exist
    And as "user0" folder "/sub" should exist in trash
    And as "user0" file "/sub/shared_file.txt" should exist in trash

  @public_link_share-feature-required
  Scenario Outline: Public can delete file through publicly shared link having delete permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /PARENT       |
      | permissions | <permissions> |
    And the public deletes file "welcome.txt" from the last public share using the public WebDAV API
    Then the HTTP status code should be "<http-status-code>"
    And as "user0" file "PARENT/welcome.txt" <should-or-not> exist
    Examples:
      | ocs_api_version | permissions               | http-status-code | should-or-not |
      | 1               | read,update,create        | 403              | should        |
      | 2               | read,update,create        | 403              | should        |
      | 1               | read,update,create,delete | 204              | should not    |
      | 2               | read,update,create,delete | 204              | should not    |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    And the public renames file "parent.txt" to "newparent.txt" from the last public share using the public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/parent.txt" should exist
    And as "user0" file "/PARENT/newparent.txt" should not exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions 15
    Given using OCS API version "<ocs_api_version>"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And the public renames file "parent.txt" to "newparent.txt" from the last public share using the public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    And as "user0" file "/PARENT/newparent.txt" should exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    And the public uploads file "lorem.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/lorem.txt" should not exist
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create,delete
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And the public uploads file "lorem.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "PARENT/lorem.txt" for user "user0" should be "test"
    Examples:
      | ocs_api_version |
      | 1               |
      | 2               |