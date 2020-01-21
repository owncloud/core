@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: share with groups, group names are case-sensitive

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @skipOnLDAP @issue-ldap-250
  Scenario Outline: group names are case-sensitive, sharing with groups with different upper and lower case names
    Given using OCS API version "<ocs_api_version>"
    And group "<group_id1>" has been created
    And group "<group_id2>" has been created
    And group "<group_id3>" has been created
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
      | user3    |
    And user "user1" has been added to group "<group_id1>"
    And user "user2" has been added to group "<group_id2>"
    And user "user3" has been added to group "<group_id3>"
    When user "user0" shares file "textfile1.txt" with group "<group_id1>" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "textfile1.txt" for user "user1" should be "ownCloud test text file 1" plus end-of-line
    When user "user0" shares folder "textfile2.txt" with group "<group_id2>" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "textfile2.txt" for user "user2" should be "ownCloud test text file 2" plus end-of-line
    When user "user0" shares folder "textfile3.txt" with group "<group_id3>" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the content of file "textfile3.txt" for user "user3" should be "ownCloud test text file 3" plus end-of-line
    Examples:
      | ocs_api_version | group_id1            | group_id2            | group_id3            | ocs_status_code |
      | 1               | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | 100             |
      | 1               | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group | 100             |
      | 1               | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group | 100             |
      | 2               | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | 200             |
      | 2               | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group | 200             |
      | 2               | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group | 200             |

  @skipOnLDAP @issue-ldap-250
  Scenario Outline: group names are case-sensitive, sharing with non-existent groups with different upper and lower case names
    Given using OCS API version "<ocs_api_version>"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
    And group "<group_id1>" has been created
    And user "user1" has been added to group "<group_id1>"
    When user "user0" shares file "textfile1.txt" with group "<group_id1>" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | <group_id1>       |
      | file_target | /textfile1.txt    |
      | path        | /textfile1.txt    |
      | permissions | share,read,update |
      | uid_owner   | user0             |
    And the content of file "textfile1.txt" for user "user1" should be "ownCloud test text file 1" plus end-of-line
    When user "user0" shares file "textfile2.txt" with group "<group_id2>" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    When user "user0" shares file "textfile3.txt" with group "<group_id3>" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | group_id1            | group_id2            | group_id3            | ocs_status_code | http_status_code |
      | 1               | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | 100             | 200              |
      | 1               | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group | 100             | 200              |
      | 1               | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group | 100             | 200              |
      | 2               | case-sensitive-group | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | 200             | 404              |
      | 2               | Case-Sensitive-Group | CASE-SENSITIVE-GROUP | case-sensitive-group | 200             | 404              |
      | 2               | CASE-SENSITIVE-GROUP | case-sensitive-group | Case-Sensitive-Group | 200             | 404              |

