@api @files_sharing-app-required
Feature: sharing

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |


  Scenario Outline: Delete all group shares
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And user "Alice" has shared file "fileToShare.txt" with group "grp1"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the share id of the last share
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: delete a share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And user "Alice" has shared file "fileToShare.txt" with user "Brian"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario: orphaned shares
    Given using OCS API version "1"
    And user "Alice" has created folder "/common"
    And user "Alice" has created folder "/common/sub"
    And user "Alice" has shared folder "/common/sub" with user "Brian"
    When user "Alice" deletes folder "/common" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/sub" should not exist

  @smokeTest @files_trashbin-app-required
  Scenario: deleting a file out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And user "Alice" has moved file "/fileToShare.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared_file.txt" should exist in the trashbin
    And as "Brian" file "/shared_file.txt" should exist in the trashbin

  @files_trashbin-app-required
  Scenario: deleting a folder out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/sub"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "shared/sub/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" deletes folder "/shared/sub" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/shared/sub" should not exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    And as "Brian" folder "/sub" should exist in the trashbin
    And as "Brian" file "/sub/shared_file.txt" should exist in the trashbin

  @smokeTest
  Scenario: unshare from self
    And group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Carol    |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has created folder "/PARENT"
    And user "Carol" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/parent.txt"
    And user "Carol" has shared file "/PARENT/parent.txt" with group "grp1"
    And user "Carol" has stored etag of element "/PARENT"
    And user "Brian" has stored etag of element "/"
    When user "Brian" unshares file "parent.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the etag of element "/" of user "Brian" should have changed
    And the etag of element "/PARENT" of user "Carol" should not have changed


  Scenario: sharee of a read-only share folder tries to delete the shared folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "read"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" file "/shared/shared_file.txt" should exist


  Scenario: sharee of a upload-only shared folder tries to delete a file in the shared folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/shared_file.txt" should exist


  Scenario: sharee of an upload-only shared folder tries to delete their file in the folder
    Given using OCS API version "1"
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "shared/textfile.txt"
    When user "Brian" deletes file "/shared/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/textfile.txt" should exist


  Scenario Outline: A Group share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Carol    |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/parent.txt"
    And user "Alice" has shared entry "<entry_to_share>" with group "grp1"
    When user "Brian" deletes the last share of user "Alice" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "Alice" entry "<entry_to_share>" should exist
    And as "Brian" entry "<received_entry>" should exist
    And as "Carol" entry "<received_entry>" should exist
    Examples:
      | entry_to_share     | ocs_api_version | http_status_code | received_entry |
      | /PARENT/parent.txt | 1               | 200              | parent.txt     |
      | /PARENT/parent.txt | 2               | 404              | parent.txt     |
      | /PARENT            | 1               | 200              | PARENT         |
      | /PARENT            | 2               | 404              | PARENT         |


  Scenario Outline: An individual share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/PARENT/parent.txt"
    And user "Alice" has shared entry "<entry_to_share>" with user "Brian"
    When user "Brian" deletes the last share of user "Alice" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "Alice" entry "<entry_to_share>" should exist
    And as "Brian" entry "<received_entry>" should exist
    Examples:
      | entry_to_share     | ocs_api_version | http_status_code | received_entry |
      | /PARENT/parent.txt | 1               | 200              | parent.txt     |
      | /PARENT/parent.txt | 2               | 404              | parent.txt     |
      | /PARENT            | 1               | 200              | PARENT         |
      | /PARENT            | 2               | 404              | PARENT         |


  Scenario Outline: delete a share with wrong authentication
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "fileToShare.txt"
    And user "Alice" has shared file "fileToShare.txt" with user "Brian"
    When user "Brian" tries to delete the last share of user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 404             | 200              |
      | 2               | 404             | 404              |
