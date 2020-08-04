@api @files_sharing-app-required @toFixOnOCIS @issue-ocis-reva-243
Feature: sharing

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194
  Scenario Outline: Delete all group shares
    Given these users have been created with default attributes and skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Brian" has been added to group "grp1"
    And user "Alice" has shared file "textfile0.txt" with group "grp1"
    And user "Brian" has moved file "/textfile0 (2).txt" to "/FOLDER/textfile0.txt"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And user "Brian" should not see share_id of last share
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest @skipOnOcis @toFixOnOCIS @issue-ocis-reva-356
  Scenario Outline: delete a share
    Given user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And using OCS API version "<ocs_api_version>"
    And user "Alice" has shared file "textfile0.txt" with user "Brian"
    When user "Alice" deletes the last share using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario: orphaned shares
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "/common"
    And user "Alice" has created folder "/common/sub"
    And user "Alice" has shared folder "/common/sub" with user "Brian"
    When user "Alice" deletes folder "/common" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/sub" should not exist

  @smokeTest @files_trashbin-app-required @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: deleting a file out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared/shared_file.txt" should not exist
    And as "Alice" file "/shared_file.txt" should exist in the trashbin
    And as "Brian" file "/shared_file.txt" should exist in the trashbin

  @files_trashbin-app-required @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: deleting a folder out of a share as recipient creates a backup for the owner
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/shared"
    And user "Alice" has created folder "/shared/sub"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/sub/shared_file.txt"
    And user "Alice" has shared folder "/shared" with user "Brian"
    When user "Brian" deletes folder "/shared/sub" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/shared/sub" should not exist
    And as "Alice" folder "/shared/sub" should not exist
    And as "Alice" folder "/sub" should exist in the trashbin
    And as "Alice" file "/sub/shared_file.txt" should exist in the trashbin
    And as "Brian" folder "/sub" should exist in the trashbin
    And as "Brian" file "/sub/shared_file.txt" should exist in the trashbin

  @smokeTest @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194
  Scenario: unshare from self
    And group "grp1" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Carol" has been created with default attributes and skeleton files
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Carol" has shared file "/PARENT/parent.txt" with group "grp1"
    And user "Carol" has stored etag of element "/PARENT"
    And user "Brian" has stored etag of element "/"
    When user "Brian" unshares file "parent.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the etag of element "/" of user "Brian" should have changed
    And the etag of element "/PARENT" of user "Carol" should not have changed

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: sharee of a read-only share folder tries to delete the shared folder
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "read"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Brian" file "/shared/shared_file.txt" should exist

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: sharee of a upload-only shared folder tries to delete a file in the shared folder
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/shared"
    And user "Alice" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    When user "Brian" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/shared_file.txt" should exist

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243
  Scenario: sharee of an upload-only shared folder tries to delete their file in the folder
    Given using OCS API version "1"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And user "Alice" has created folder "/shared"
    And user "Alice" has shared folder "shared" with user "Brian" with permissions "create"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to "shared/textfile.txt" using the WebDAV API
    And user "Brian" deletes file "/shared/textfile.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/shared/textfile.txt" should exist

  @skipOnOcis @toImplementOnOCIS @issue-ocis-reva-194
  Scenario Outline: A Group share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "Alice" has been created with default attributes and skeleton files
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Brian" has been added to group "grp1"
    And user "Carol" has been added to group "grp1"
    And user "Alice" has shared entry "<entry_to_share>" with group "grp1"
    When user "Brian" deletes the last share using the sharing API
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

  @skipOnOcis @toImplementOnOCIS @toFixOnOCIS @issue-ocis-reva-243 @issue-ocis-reva-364
  Scenario Outline: An individual share recipient tries to delete the share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has been created with default attributes and skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared entry "<entry_to_share>" with user "Brian"
    When user "Brian" deletes the last share using the sharing API
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
