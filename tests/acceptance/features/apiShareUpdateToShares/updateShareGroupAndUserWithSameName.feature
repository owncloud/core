@api @files_sharing-app-required @issue-ocis-1289 @issue-ocis-1328
Feature: updating shares to users and groups that have the same name

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And group "Brian" has been created
    And user "Carol" has been added to group "Brian"
    And user "Alice" has created folder "/TMP"
    And user "Alice" has uploaded file with content "Random data" to "/TMP/randomfile.txt"

  @skipOnLDAP
  Scenario Outline: update permissions of a user share with a user and a group having the same name
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared folder "/TMP" with group "Brian"
    And user "Alice" has shared folder "/TMP" with user "Brian"
    And user "Carol" has accepted share "/TMP" offered by user "Alice"
    And user "Brian" has accepted share "/TMP" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the content of file "/Shares/TMP/randomfile.txt" for user "Brian" should be "Random data"
    And the content of file "/Shares/TMP/randomfile.txt" for user "Carol" should be "Random data"
    And user "Carol" should be able to upload file "filesForUpload/textfile.txt" to "Shares/TMP/textfile-by-Carol.txt"
    But user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "Shares/TMP/textfile-by-Brian.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @skipOnLDAP
  Scenario Outline: update permissions of a group share with a user and a group having the same name
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has shared folder "/TMP" with user "Brian"
    And user "Alice" has shared folder "/TMP" with group "Brian"
    And user "Carol" has accepted share "/TMP" offered by user "Alice"
    And user "Brian" has accepted share "/TMP" offered by user "Alice"
    When user "Alice" updates the last share using the sharing API with
      | permissions | read |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs_status_code>"
    And the content of file "/Shares/TMP/randomfile.txt" for user "Brian" should be "Random data"
    And the content of file "/Shares/TMP/randomfile.txt" for user "Carol" should be "Random data"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "Shares/TMP/textfile-by-Carol.txt"
    But user "Carol" should not be able to upload file "filesForUpload/textfile.txt" to "Shares/TMP/textfile-by-Brian.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
