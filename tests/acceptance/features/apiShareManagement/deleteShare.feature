@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created
    And user "user1" has been created

  Scenario Outline: Delete all group shares
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    And user "user1" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
    When user "user0" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "user1" should not see share_id of last share
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: delete a share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When user "user0" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: orphaned shares
    Given using OCS API version "1"
    And a new browser session for "user0" has been started
    And user "user0" has created a folder "/common"
    And user "user0" has created a folder "/common/sub"
    And user "user0" has shared folder "/common/sub" with user "user1"
    When user "user0" deletes folder "/common" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user1" folder "/sub" should not exist

  Scenario Outline: sharing subfolder of already shared folder, GET result is correct
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created
    And user "user3" has been created
    And user "user4" has been created
    And user "user0" has created a folder "/folder1"
    And user "user0" has shared file "/folder1" with user "user1"
    And user "user0" has shared file "/folder1" with user "user2"
    And user "user0" has created a folder "/folder1/folder2"
    And user "user0" has shared file "/folder1/folder2" with user "user3"
    And user "user0" has shared file "/folder1/folder2" with user "user4"
    And as user "user0"
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 4 entries
    And file "/folder1" should be included as path in the response
    And file "/folder1/folder2" should be included as path in the response
    When the user sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/shares?path=/folder1/folder2"
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the response should contain 2 entries
    And file "/folder1" should not be included as path in the response
    And file "/folder1/folder2" should be included as path in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @files_trashbin-app-required
  Scenario: deleting a file out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user1" file "/shared/shared_file.txt" should not exist
    And as "user0" file "/shared/shared_file.txt" should not exist
    And as "user0" file "/shared_file.txt" should exist in trash
    And as "user1" file "/shared_file.txt" should exist in trash

  @files_trashbin-app-required
  Scenario: deleting a folder out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "user0" has created a folder "/shared"
    And user "user0" has created a folder "/shared/sub"
    And user "user0" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user1" deletes folder "/shared/sub" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "user1" folder "/shared/sub" should not exist
    And as "user0" folder "/shared/sub" should not exist
    And as "user0" folder "/sub" should exist in trash
    And as "user0" file "/sub/shared_file.txt" should exist in trash
    And as "user1" folder "/sub" should exist in trash
    And as "user1" file "/sub/shared_file.txt" should exist in trash

  @smokeTest
  Scenario Outline: unshare from self
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user2" has been created
    And user "user2" has been added to group "grp1"
    And user "user1" has been added to group "grp1"
    And user "user2" has shared file "/PARENT/parent.txt" with group "grp1"
    And user "user2" has stored etag of element "/PARENT"
    And user "user1" has stored etag of element "/"
    When user "user1" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the etag of element "/" of user "user1" should have changed
    And the etag of element "/PARENT" of user "user2" should not have changed
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: sharee of a read-only share folder tries to delete the shared folder
    Given using OCS API version "1"
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has sent HTTP method "POST" to OCS API endpoint "/apps/files_sharing/api/v1/shares" with body
      | path        | shared |
      | shareWith   | user1  |
      | shareType   | 0      |
      | permissions | 1      |
    When user "user1" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user1" file "/shared/shared_file.txt" should exist

  Scenario: sharee of a upload-only shared folder tries to delete a file in the shared folder
    Given using OCS API version "1"
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has sent HTTP method "POST" to OCS API endpoint "/apps/files_sharing/api/v1/shares" with body
      | path        | shared |
      | shareWith   | user1  |
      | shareType   | 0      |
      | permissions | 4      |
    When user "user1" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/shared/shared_file.txt" should exist

  Scenario: sharee of an upload-only shared folder tries to delete their file in the folder
    Given using OCS API version "1"
    And user "user0" has created a folder "/shared"
    And user "user0" has sent HTTP method "POST" to OCS API endpoint "/apps/files_sharing/api/v1/shares" with body
      | path        | shared |
      | shareWith   | user1  |
      | shareType   | 0      |
      | permissions | 4      |
    When user "user1" uploads file "filesForUpload/textfile.txt" to "shared/textfile.txt" using the WebDAV API
    And user "user1" deletes file "/shared/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/shared/textfile.txt" should exist
