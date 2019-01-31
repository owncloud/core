@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes

  @smokeTest @public_link_share-feature-required
  Scenario: Downloading from upload-only share is forbidden
    Given user "user0" has moved file "/textfile0.txt" to "/FOLDER/test.txt"
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | create |
    Then the public shared file "test.txt" should not be able to be downloaded
    And the HTTP status code should be "404"

  Scenario: Share a file by multiple channels and download from sub-folder and direct file share
    Given user "user1" has been created with default attributes
    And user "user2" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"
    And user "user0" has created folder "/common"
    And user "user0" has created folder "/common/sub"
    And user "user0" has shared folder "common" with group "grp1"
    And user "user1" has shared file "textfile0.txt" with user "user2"
    And user "user1" has moved file "/textfile0.txt" to "/common/textfile0.txt"
    And user "user1" has moved file "/common/textfile0.txt" to "/common/sub/textfile0.txt"
    When user "user2" uploads file "filesForUpload/file_to_overwrite.txt" to "/textfile0 (2).txt" using the WebDAV API
    And user "user2" downloads file "/common/sub/textfile0.txt" with range "bytes=0-8" using the WebDAV API
    Then the downloaded content should be "BLABLABLA"
    And the downloaded content when downloading file "/textfile0 (2).txt" for user "user2" with range "bytes=0-8" should be "BLABLABLA"
    And user "user2" should see the following elements
      | /common/sub/textfile0.txt |
      | /textfile0%20(2).txt      |

  @smokeTest
  Scenario: Download a file that is in a folder contained in a folder that has been shared with a user with default permissions
    Given user "user1" has been created with default attributes
    When user "user0" creates a share using the sharing API with settings
      | path      | PARENT |
      | shareType | user   |
      | shareWith | user1  |
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  Scenario: Download a file that is in a folder contained in a folder that has been shared with a group with default permissions
    Given user "user1" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When user "user0" has shared folder "PARENT" with group "grp1"
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  @smokeTest @public_link_share-feature-required
  Scenario: Download a file that is in a folder contained in a folder that has been shared with public with default permissions
    When user "user0" creates a public link share using the sharing API with settings
      | path     | PARENT   |
      | password | %public% |
    Then the public should be able to download the range "bytes=1-7" of file "/CHILD/child.txt" from inside the last public shared folder with password "%public%" and the content should be "wnCloud"

  Scenario: Download a file that is in a folder contained in a folder that has been shared with a user with Read/Write permission
    Given user "user1" has been created with default attributes
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT |
      | shareType   | user   |
      | shareWith   | user1  |
      | permissions | change |
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  Scenario: Download a file that is in a folder contained in a folder that has been shared with a group with Read/Write permission
    Given user "user1" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT |
      | shareType   | group  |
      | shareWith   | grp1   |
      | permissions | change |
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  @public_link_share-feature-required
  Scenario: Download a file that is in a folder contained in a folder that has been shared with public with Read/Write permission
    When user "user0" creates a public link share using the sharing API with settings
      | path        | PARENT   |
      | password    | %public% |
      | permissions | change   |
    Then the public should be able to download the range "bytes=1-7" of file "/CHILD/child.txt" from inside the last public shared folder with password "%public%" and the content should be "wnCloud"

  Scenario: Download a file that is in a folder contained in a folder that has been shared with a user with Read only permission
    Given user "user1" has been created with default attributes
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT |
      | shareType   | user   |
      | shareWith   | user1  |
      | permissions | read   |
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  Scenario: Download a file that is in a folder contained in a folder that has been shared with a group with Read only permission
    Given user "user1" has been created with default attributes
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When user "user0" creates a share using the sharing API with settings
      | path        | PARENT |
      | shareType   | group  |
      | shareWith   | grp1   |
      | permissions | read   |
    Then user "user1" should be able to download the range "bytes=1-7" of file "/PARENT (2)/CHILD/child.txt" using the sharing API and the content should be "wnCloud"

  @public_link_share-feature-required
  Scenario: Download a file that is in a folder contained in a folder that has been shared with public with Read only permission
    When user "user0" creates a public link share using the sharing API with settings
      | path        | PARENT   |
      | password    | %public% |
      | permissions | read     |
    Then the public should be able to download the range "bytes=1-7" of file "/CHILD/child.txt" from inside the last public shared folder with password "%public%" and the content should be "wnCloud"