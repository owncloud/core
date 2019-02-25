@api @federation-app-required @TestAlsoOnExternalUserBackend
Feature: federated

  Background:
    Given using OCS API version "1"
    And using server "REMOTE"
    And user "user0" has been created with default attributes
    And using server "LOCAL"
    And user "user1" has been created with default attributes

  Scenario: Federate share a file with another server
    When user "user1" from server "LOCAL" shares "/textfile0.txt" with user "user0" from server "REMOTE" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the share fields of the last share should include
      | id                     | A_NUMBER       |
      | item_type              | file           |
      | item_source            | A_NUMBER       |
      | share_type             | 6              |
      | file_source            | A_NUMBER       |
      | path                   | /textfile0.txt |
      | permissions            | 19             |
      | stime                  | A_NUMBER       |
      | storage                | A_NUMBER       |
      | mail_send              | 0              |
      | uid_owner              | user1          |
      | file_parent            | A_NUMBER       |
      | displayname_owner      | User One       |
      | share_with             | user0@REMOTE   |
      | share_with_displayname | user0@REMOTE   |

  Scenario: Overwrite a federated shared file as recipient - local server shares - remote server receives
    Given user "user1" from server "LOCAL" has shared "/textfile0.txt" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/textfile0 (2).txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "user1" on server "LOCAL" should be "BLABLABLA" plus end-of-line
