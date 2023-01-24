@api @federation-app-required @files_sharing-app-required
Feature: current oC10 behavior for issue-31276

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"

  @issue-31276
  Scenario Outline: Federated sharee tries to delete an accepted federated share sending wrong password
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last federated cloud share with password "invalid" using the sharing API
    #Then the OCS status code should be "401"
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Brian" should see the following elements
      | /textfile0 (2).txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                 |
      | remote      | REMOTE                   |
      | remote_id   | A_STRING                 |
      | share_token | A_TOKEN                  |
      | name        | /textfile0.txt           |
      | owner       | %username%               |
      | user        | %username%               |
      | mountpoint  | /textfile0 (2).txt       |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,delete,update,read |
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  @issue-31276
  Scenario Outline: Federated sharee tries to delete a pending federated share sending wrong password
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last pending federated cloud share with password "invalid" using the sharing API
    Then the OCS status code should be "997"
    #Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Brian" should not see the following elements
      | /textfile0 (2).txt |
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_STRING                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | %username%                                 |
      | user        | %username%                                 |
      | mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
      | accepted    | 0                                          |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |
