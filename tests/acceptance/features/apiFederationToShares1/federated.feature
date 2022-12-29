@api @federation-app-required @files_sharing-app-required
Feature: federated

  Background:
    Given using server "REMOTE"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: Federate share a file with another server
    Given using OCS API version "<ocs-api-version>"
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | id                     | A_STRING          |
      | item_type              | file              |
      | item_source            | A_STRING          |
      | share_type             | federated         |
      | file_source            | A_STRING          |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | stime                  | A_NUMBER          |
      | storage                | A_STRING          |
      | mail_send              | 0                 |
      | uid_owner              | %username%        |
      | displayname_owner      | %displayname%     |
      | share_with             | %username%@REMOTE |
      | share_with_displayname | %username%@REMOTE |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @smokeTest
  Scenario Outline: Federate share a file with local server
    Given using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | id                     | A_STRING          |
      | item_type              | file              |
      | item_source            | A_STRING          |
      | share_type             | federated         |
      | file_source            | A_STRING          |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | stime                  | A_NUMBER          |
      | storage                | A_STRING          |
      | mail_send              | 0                 |
      | uid_owner              | %username%        |
      | displayname_owner      | %displayname%     |
      | share_with             | %username%@LOCAL  |
      | share_with_displayname | %username%@LOCAL  |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Federated sharee can see the pending share
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_STRING                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | %username%                                 |
      | user        | %username%                                 |
      | mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
      | accepted    | 0                                          |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Federated sharee requests information of only one share
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                 |
      | remote      | REMOTE                   |
      | remote_id   | A_STRING                 |
      | share_token | A_TOKEN                  |
      | name        | /textfile0.txt           |
      | owner       | %username%               |
      | user        | %username%               |
      | mountpoint  | /Shares/textfile0.txt    |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,read,update,delete |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Federated sharee requests information of only one share before accepting it
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last pending federated cloud share using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs-status>"
    And the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_STRING                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | %username%                                 |
      | user        | %username%                                 |
      | mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
      | accepted    | 0                                          |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: sending a GET request to a pending federated share is not valid
    Given using OCS API version "<ocs-api-version>"
    When user "Brian" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/remote_shares/pending/12"
    Then the HTTP status code should be "405"
    And the body of the response should be empty
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: sending a GET request to a nonexistent federated share
    Given using OCS API version "<ocs-api-version>"
    When user "Brian" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/remote_shares/9999999999"
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 404        | 200         |
      | 2               | 404        | 404         |


  Scenario Outline: accept a pending federated share
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Reshare a federated shared file
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and small skeleton files
    And using OCS API version "<ocs-api-version>"
    When user "Brian" creates a share using the sharing API with settings
      | path        | /Shares/textfile0.txt |
      | shareType   | user                  |
      | shareWith   | Carol                 |
      | permissions | share,read,update     |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Carol" should include
      | id                     | A_STRING              |
      | item_type              | file                  |
      | item_source            | A_STRING              |
      | share_type             | user                  |
      | file_source            | A_STRING              |
      | path                   | /Shares/textfile0.txt |
      | permissions            | share,read,update     |
      | stime                  | A_NUMBER              |
      | storage                | A_STRING              |
      | mail_send              | 0                     |
      | uid_owner              | %username%            |
      | displayname_owner      | %displayname%         |
      | share_with             | %username%            |
      | share_with_displayname | %displayname%         |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a federated shared file as recipient - local server shares - remote server receives
    Given user "Brian" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Brian" from server "LOCAL" has shared "/textfile0.txt" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Brian" on server "LOCAL" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a federated shared file as recipient - remote server shares - local server receives
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Alice" on server "REMOTE" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a file in a federated shared folder as recipient - local server shares - remote server receives
    Given user "Brian" has created folder "PARENT"
    And user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/textfile0.txt" for user "Brian" on server "LOCAL" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a file in a federated shared folder as recipient - remote server shares - local server receives
    Given using server "REMOTE"
    And user "Alice" has created folder "PARENT"
    And user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/textfile0.txt" for user "Alice" on server "REMOTE" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a federated shared file as recipient using old chunking
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads the following "3" chunks to "/Shares/textfile0.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "AAAAABBBBBCCCCC"
    And the content of file "/textfile0.txt" for user "Alice" on server "REMOTE" should be "AAAAABBBBBCCCCC"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Overwrite a file in a federated shared folder as recipient using old chunking
    Given using server "REMOTE"
    And user "Alice" has created folder "PARENT"
    And user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads the following "3" chunks to "/Shares/PARENT/textfile0.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the content of file "/Shares/PARENT/textfile0.txt" for user "Brian" should be "AAAAABBBBBCCCCC"
    And the content of file "/PARENT/textfile0.txt" for user "Alice" on server "REMOTE" should be "AAAAABBBBBCCCCC"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: Federated sharee deletes an accepted federated share
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the response should contain 0 entries
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-31276 @skipOnOcV10
  Scenario Outline: Federated sharee tries to delete an accepted federated share sending wrong password
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last federated cloud share with password "invalid" using the sharing API
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Brian" should see the following elements
      | /Shares/textfile0.txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                 |
      | remote      | REMOTE                   |
      | remote_id   | A_STRING                 |
      | share_token | A_TOKEN                  |
      | name        | /textfile0.txt           |
      | owner       | %username%               |
      | user        | %username%               |
      | mountpoint  | /Shares/textfile0.txt    |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,delete,update,read |
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |


  Scenario Outline: Federated sharee deletes a pending federated share
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last pending federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the response should contain 0 entries
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-31276 @skipOnOcV10
  Scenario Outline: Federated sharee tries to delete a pending federated share sending wrong password
    Given using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last pending federated cloud share with password "invalid" using the sharing API
    Then the OCS status code should be "401"
    And the HTTP status code should be "401"
    And user "Brian" should not see the following elements
      | /Shares/textfile0.txt |
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


  Scenario Outline: Trusted server handshake does not require authenticated requests - we force 403 by sending an empty body
    Given using server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "UNAUTHORIZED_USER" requests shared secret using the federation API
    Then the HTTP status code should be "<http-status>"
    And the OCS status code should be "403"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on home storage
    Given using server "REMOTE"
    And user "Alice" has created folder "PARENT"
    And user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/Shares/PARENT/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    And as user "Alice" on server "REMOTE" the files uploaded to "/PARENT/testquota.txt" with all mechanisms should exist

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on remote storage - local server shares - remote server receives
    Given using server "LOCAL"
    And the quota of user "Brian" has been set to "20 B"
    And user "Brian" has created folder "PARENT"
    And user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/Shares/PARENT/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on remote storage - remote server shares - local server receives
    Given using server "REMOTE"
    And the quota of user "Alice" has been set to "20 B"
    And user "Alice" has created folder "PARENT"
    And user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/Shares/PARENT/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"


  Scenario Outline: share of a folder to a federated user who already has a folder with the same name
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/Alice"
    And using server "LOCAL"
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/Brian"
    When user "Alice" from server "REMOTE" shares "zzzfolder" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING          |
      | remote      | REMOTE            |
      | name        | /zzzfolder        |
      | owner       | %username%        |
      | user        | %username%        |
      | mountpoint  | /Shares/zzzfolder |
      | type        | dir               |
      | permissions | all               |
    And as "Brian" folder "zzzfolder/Brian" should exist
    And as "Brian" folder "Shares/zzzfolder/Alice" should exist
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |


  Scenario Outline: share of a file to the federated user who already has a file with the same name
    Given using server "REMOTE"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    When user "Alice" from server "REMOTE" shares "/randomfile.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response about user "Alice" sharing with user "Brian" should include
      | id          | A_STRING                 |
      | remote      | REMOTE                   |
      | remote_id   | A_STRING                 |
      | share_token | A_TOKEN                  |
      | name        | /randomfile.txt          |
      | owner       | %username%               |
      | user        | %username%               |
      | mountpoint  | /Shares/randomfile.txt   |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,delete,update,read |
    And the content of file "/randomfile.txt" for user "Brian" on server "LOCAL" should be "local content"
    And the content of file "/Shares/randomfile.txt" for user "Brian" on server "LOCAL" should be "remote content"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-35154
  Scenario: receive a local share that has the same name as a previously received federated share
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/remote"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/local"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    And user "Alice" from server "REMOTE" has shared "zzzfolder" with user "Carol" from server "LOCAL"
    And user "Alice" from server "REMOTE" has shared "randomfile.txt" with user "Carol" from server "LOCAL"
    And user "Brian" has shared folder "zzzfolder" with user "Carol"
    And user "Brian" has shared folder "randomfile.txt" with user "Carol"
    When user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Carol" accepts share "/zzzfolder" offered by user "Brian" using the sharing API
    And user "Carol" accepts share "/randomfile.txt" offered by user "Brian" using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    # local shares are taking priority at the moment
    And as "Carol" folder "/Shares/zzzfolder/remote" should exist
    And as "Carol" folder "/Shares/zzzfolder (2)/local" should exist
    And the content of file "/Shares/randomfile.txt" for user "Carol" on server "LOCAL" should be "remote content"
    And the content of file "/Shares/randomfile (2).txt" for user "Carol" on server "LOCAL" should be "local content"


  Scenario: receive a federated share that has the same name as a previously received local share
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/remote"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and small skeleton files
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/local"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    And user "Brian" has shared folder "zzzfolder" with user "Carol"
    And user "Brian" has shared folder "randomfile.txt" with user "Carol"
    And user "Alice" from server "REMOTE" has shared "zzzfolder" with user "Carol" from server "LOCAL"
    And user "Alice" from server "REMOTE" has shared "randomfile.txt" with user "Carol" from server "LOCAL"
    When user "Carol" accepts share "/zzzfolder" offered by user "Brian" using the sharing API
    And user "Carol" accepts share "/randomfile.txt" offered by user "Brian" using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    Then the HTTP status code of responses on all endpoints should be "200"
    And the OCS status code of responses on all endpoints should be "100"
    And as "Carol" folder "Shares/zzzfolder/local" should exist
    And as "Carol" folder "Shares/zzzfolder (2)/remote" should exist
    And the content of file "/Shares/randomfile.txt" for user "Carol" on server "LOCAL" should be "local content"
    And the content of file "/Shares/randomfile (2).txt" for user "Carol" on server "LOCAL" should be "remote content"
