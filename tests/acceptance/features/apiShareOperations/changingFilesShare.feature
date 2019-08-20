@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  @smokeTest
  Scenario Outline: moving a file into a share as recipient
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" moves file "/textfile0.txt" to "/shared/shared_file.txt" using the WebDAV API
    Then as "user1" file "/shared/shared_file.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should exist
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @smokeTest @files_trashbin-app-required
  Scenario Outline: moving a file out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves file "/shared_renamed/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then as "user1" file "/taken_out.txt" should exist
    And as "user0" file "/shared/shared_file.txt" should not exist
    And as "user0" file "/shared_file.txt" should exist in trash
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @files_trashbin-app-required
  Scenario Outline: moving a folder out of a share as recipient creates a backup for the owner
    Given using <dav-path-version> DAV path
    And user "user0" has created folder "/shared"
    And user "user0" has created folder "/shared/sub"
    And user "user0" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "user0" has shared file "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/shared_renamed"
    When user "user1" moves folder "/shared_renamed/sub" to "/taken_out" using the WebDAV API
    Then as "user1" file "/taken_out" should exist
    And as "user0" folder "/shared/sub" should not exist
    And as "user0" folder "/sub" should exist in trash
    And as "user0" file "/sub/shared_file.txt" should exist in trash
    Examples:
      | dav-path-version |
      | old              |
      | new              |

  @public_link_share-feature-required
  @issue-36060
  Scenario Outline: Public can or can-not delete file through publicly shared link depending on having delete permissions
    Given user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT       |
      | permissions | <permissions> |
    When the public deletes file "welcome.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "<http-status-code>"
    And as "user0" file "PARENT/welcome.txt" <should-or-not> exist
    Examples:
      | public-webdav-api-version | permissions               | http-status-code | should-or-not |
      | old                       | read,update,create        | 403              | should        |
      | new                       | read,update,create        | 204              | should not    |
      #| new                       | read,update,create        | 403              | should        |
      | old                       | read,update,create,delete | 204              | should not    |
      | new                       | read,update,create,delete | 204              | should not    |

  @public_link_share-feature-required
  @issue-36060
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create
    Given user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/parent.txt" should exist
    And as "user0" file "/PARENT/newparent.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      #| new                       |

  @public_link_share-feature-required
  @issue-36060
  # After fixing the issue delete this scenario and use the one above to test both cases
  Scenario: Public link share permissions work correctly for renaming and share permissions read,update,create
    Given user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    And as "user0" file "/PARENT/newparent.txt" should exist

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create,delete
    Given user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    And as "user0" file "/PARENT/newparent.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create
    Given user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/lorem.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @public_link_share-feature-required
  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create,delete
    Given user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "PARENT/lorem.txt" for user "user0" should be "test"
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |