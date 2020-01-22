@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: updating shares to users and groups that have the same name

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user0    |
      | user1    |
      | user2    |
    And group "user1" has been created
    And user "user2" has been added to group "user1"
    And user "user0" has created folder "/TMP"
    And user "user0" has uploaded file with content "user0 file" to "/TMP/randomfile.txt"

  @skipOnLDAP
  Scenario Outline: update permissions of a user share with a user and a group having the same name
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared folder "/TMP" with group "user1"
    And user "user0" has shared folder "/TMP" with user "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the content of file "/TMP/randomfile.txt" for user "user1" should be "user0 file"
    And the content of file "/TMP/randomfile.txt" for user "user2" should be "user0 file"
    And user "user2" should be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile-by-user2.txt"
    But user "user1" should not be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile-by-user1.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnLDAP
  Scenario Outline: update permissions of a group share with a user and a group having the same name
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared folder "/TMP" with user "user1"
    And user "user0" has shared folder "/TMP" with group "user1"
    When user "user0" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the content of file "/TMP/randomfile.txt" for user "user1" should be "user0 file"
    And the content of file "/TMP/randomfile.txt" for user "user2" should be "user0 file"
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile-by-user2.txt"
    But user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "TMP/textfile-by-user1.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
