@api @files_sharing-app-required @issue-ocis-1328 @issue-ocis-1289
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has uploaded file with content "ownCloud test text file 0" to "/textfile0.txt"


  Scenario Outline: Delete all group shares
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    And user "Brian" has moved file "/Shares/textfile0.txt" to "/Shares/anotherName.txt"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the share id of the last share
    And as "Brian" file "/Shares/textfile0.txt" should not exist
    And as "Brian" file "/Shares/anotherName.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: delete a share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share id should not be included in the response
    And as "Brian" file "/Shares/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: orphaned shares
    Given using OCS API version "1"
    And user "Alice" has created folder "/common"
    And user "Alice" has created folder "/common/sub"
    And user "Alice" has shared folder "/common/sub" with user "Brian"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Alice"
    When user "Alice" deletes folder "/common" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/Shares/sub" should not exist
    And as "Brian" folder "/sub" should not exist
    Examples:
      | pending_share_path |
      | /sub               |

  @smokeTest @files_trashbin-app-required
  Scenario: deleting a file out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Brian" deletes file "/Shares/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "/Shares/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared_file.txt" should exist in the trashbin
    And as "Brian" file "/shared_file.txt" should exist in the trashbin

  @files_trashbin-app-required
  Scenario: deleting a folder out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/sub"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Brian" deletes folder "/Shares/shared/sub" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/Shares/shared/sub" should not exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    And as "Brian" folder "/sub" should exist in the trashbin
    And as "Brian" file "/sub/shared_file.txt" should exist in the trashbin

  @smokeTest
  Scenario Outline: unshare from self
    And group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Carol    |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has created folder "PARENT"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"
    And user "Carol" has shared file "/PARENT/parent.txt" with group "grp1"
    And user "Brian" has accepted share "<pending_share_path>" offered by user "Carol"
    And user "Carol" has stored etag of element "/PARENT"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    When user "Brian" unshares file "/Shares/parent.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the etag of element "/" of user "Brian" should have changed
    And the etag of element "/Shares" of user "Brian" should have changed
    And the etag of element "/PARENT" of user "Carol" should not have changed
    Examples:
      | pending_share_path |
      | /parent.txt        |


  Scenario: sharee of a read-only share folder tries to delete the shared folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "read"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Brian" deletes file "/Shares/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/shared_file.txt" should exist
    And as "Brian" file "/Shares/shared/shared_file.txt" should exist


  Scenario: sharee of a upload-only shared folder tries to delete a file in the shared folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    When user "Brian" deletes file "/Shares/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/shared_file.txt" should exist
    # Note: for Brian, the file does not "exist" because he only has "create" permission, not "read"
    And as "Brian" file "/Shares/shared/shared_file.txt" should not exist


  Scenario: sharee of an upload-only shared folder tries to delete their file in the folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    And user "Brian" has accepted share "/shared" offered by user "Alice"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/Shares/shared/textfile.txt"
    When user "Brian" deletes file "/Shares/shared/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/textfile.txt" should exist
    # Note: for Brian, the file does not "exist" because he only has "create" permission, not "read"
    And as "Brian" file "/Shares/shared/textfile.txt" should not exist


  Scenario Outline: A Group share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Carol    |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared entry "<entry_to_share>" with group "grp1"
    And user "Brian" has accepted share "<pending_entry>" offered by user "Alice"
    And user "Carol" has accepted share "<pending_entry>" offered by user "Alice"
    When user "Brian" deletes the last share of user "Alice" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "Alice" entry "<entry_to_share>" should exist
    And as "Brian" entry "<received_entry>" should exist
    And as "Carol" entry "<received_entry>" should exist
    Examples:
      | entry_to_share          | ocs_api_version | http_status_code | received_entry          | pending_entry           |
      | /shared/shared_file.txt | 1               | 200              | /Shares/shared_file.txt | /Shares/shared_file.txt |
      | /shared/shared_file.txt | 2               | 404              | /Shares/shared_file.txt | /Shares/shared_file.txt |
      | /shared                 | 1               | 200              | /Shares/shared          | /Shares/shared          |
      | /shared                 | 2               | 404              | /Shares/shared          | /Shares/shared          |


  Scenario Outline: An individual share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared entry "<entry_to_share>" with user "Brian"
    And user "Brian" has accepted share "<pending_entry>" offered by user "Alice"
    When user "Brian" deletes the last share of user "Alice" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "Alice" entry "<entry_to_share>" should exist
    And as "Brian" entry "<received_entry>" should exist
    Examples:
      | entry_to_share          | ocs_api_version | http_status_code | received_entry          | pending_entry           |
      | /shared/shared_file.txt | 1               | 200              | /Shares/shared_file.txt | /Shares/shared_file.txt |
      | /shared/shared_file.txt | 2               | 404              | /Shares/shared_file.txt | /Shares/shared_file.txt |
      | /shared                 | 1               | 200              | /Shares/shared          | /Shares/shared          |
      | /shared                 | 2               | 404              | /Shares/shared          | /Shares/shared          |

  @issue-ocis-720
  Scenario Outline: request PROPFIND after sharer deletes the collaborator
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When user "Brian" requests "/remote.php/dav/files/%username%" with "PROPFIND" using basic auth
    Then the HTTP status code should be "207"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-ocis-1229
  Scenario Outline: delete a share with wrong authentication
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When user "Brian" tries to delete the last share of user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 404             | 200              |
      | 2               | 404             | 404              |
