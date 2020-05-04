@api @federation-app-required @TestAlsoOnExternalUserBackend @files_sharing-app-required @skipOnOcis
Feature: federated

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and skeleton files
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and skeleton files

  @smokeTest
  Scenario Outline: Federate share a file with another server
    Given using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | id                     | A_NUMBER          |
      | item_type              | file              |
      | item_source            | A_NUMBER          |
      | share_type             | federated         |
      | file_source            | A_NUMBER          |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | stime                  | A_NUMBER          |
      | storage                | A_NUMBER          |
      | mail_send              | 0                 |
      | uid_owner              | %username%        |
      | file_parent            | A_NUMBER          |
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
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Alice" sharing with user "Brian" should include
      | id                     | A_NUMBER          |
      | item_type              | file              |
      | item_source            | A_NUMBER          |
      | share_type             | federated         |
      | file_source            | A_NUMBER          |
      | path                   | /textfile0.txt    |
      | permissions            | share,read,update |
      | stime                  | A_NUMBER          |
      | storage                | A_NUMBER          |
      | mail_send              | 0                 |
      | uid_owner              | %username%        |
      | file_parent            | A_NUMBER          |
      | displayname_owner      | %displayname%     |
      | share_with             | %username%@LOCAL  |
      | share_with_displayname | %username%@LOCAL  |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Remote sharee can see the pending share
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_NUMBER                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | Alice                                      |
      | user        | Brian                                      |
      | mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
      | accepted    | 0                                          |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Remote sharee requests information of only one share
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                 |
      | remote      | REMOTE                   |
      | remote_id   | A_NUMBER                 |
      | share_token | A_TOKEN                  |
      | name        | /textfile0.txt           |
      | owner       | Alice                    |
      | user        | Brian                    |
      | mountpoint  | /textfile0 (2).txt       |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,read,update,delete |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcV10.4.1
  Scenario Outline: Remote sharee requests information of only one share before accepting it
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last pending federated cloud share using the sharing API
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs-status>"
    And the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_NUMBER                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | Alice                                      |
      | user        | Brian                                      |
      | mountpoint  | {{TemporaryMountPointName#/textfile0.txt}} |
      | accepted    | 0                                          |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: sending a GET request to a pending remote share is not valid
    Given using OCS API version "<ocs-api-version>"
    When user "Brian" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/remote_shares/pending/12"
    Then the HTTP status code should be "405"
    And the body of the response should be empty
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: sending a GET request to a not existing remote share
    Given using OCS API version "<ocs-api-version>"
    When user "Brian" sends HTTP method "GET" to OCS API endpoint "/apps/files_sharing/api/v1/remote_shares/9999999999"
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 404        | 200         |
      | 2               | 404        | 404         |

  Scenario Outline: accept a pending remote share
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Reshare a federated shared file
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and skeleton files
    And using OCS API version "<ocs-api-version>"
    When user "Brian" creates a share using the sharing API with settings
      | path        | /textfile0 (2).txt |
      | shareType   | user               |
      | shareWith   | Carol              |
      | permissions | share,read,update  |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Carol" should include
      | id                     | A_NUMBER           |
      | item_type              | file               |
      | item_source            | A_NUMBER           |
      | share_type             | user               |
      | file_source            | A_NUMBER           |
      | path                   | /textfile0 (2).txt |
      | permissions            | share,read,update  |
      | stime                  | A_NUMBER           |
      | storage                | A_NUMBER           |
      | mail_send              | 0                  |
      | uid_owner              | %username%         |
      | file_parent            | A_NUMBER           |
      | displayname_owner      | %displayname%      |
      | share_with             | %username%         |
      | share_with_displayname | %displayname%      |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a federated shared file as recipient - local server shares - remote server receives
    Given user "Brian" from server "LOCAL" has shared "/textfile0.txt" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/textfile0 (2).txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Brian" on server "LOCAL" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a federated shared file as recipient - remote server shares - local server receives
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/textfile0 (2).txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And the content of file "/textfile0.txt" for user "Alice" on server "REMOTE" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a file in a federated shared folder as recipient - local server shares - remote server receives
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/textfile0.txt" for user "Brian" on server "LOCAL" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a file in a federated shared folder as recipient - remote server shares - local server receives
    Given user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/PARENT/textfile0.txt" for user "Alice" on server "REMOTE" should be "BLABLABLA" plus end-of-line
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a federated shared file as recipient using old chunking
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads the following "3" chunks to "/textfile0 (2).txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the content of file "/textfile0 (2).txt" for user "Brian" should be "AAAAABBBBBCCCCC"
    And the content of file "/textfile0.txt" for user "Alice" on server "REMOTE" should be "AAAAABBBBBCCCCC"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Overwrite a file in a federated shared folder as recipient using old chunking
    Given user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" uploads the following "3" chunks to "/PARENT (2)/textfile0.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the content of file "/PARENT (2)/textfile0.txt" for user "Brian" should be "AAAAABBBBBCCCCC"
    And the content of file "/PARENT/textfile0.txt" for user "Alice" on server "REMOTE" should be "AAAAABBBBBCCCCC"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: Remote sharee deletes an accepted federated share
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /textfile0%20(2).txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the response should contain 0 entries
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-31276
  Scenario Outline: Remote sharee tries to delete an accepted federated share sending wrong password
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last federated cloud share with password "invalid" using the sharing API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Brian" should see the following elements
      | /textfile0%20(2).txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                 |
      | remote      | REMOTE                   |
      | remote_id   | A_NUMBER                 |
      | share_token | A_TOKEN                  |
      | name        | /textfile0.txt           |
      | owner       | Alice                    |
      | user        | Brian                    |
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

  Scenario Outline: Remote sharee deletes a pending federated share
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last pending federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And user "Brian" should not see the following elements
      | /textfile0%20(2).txt |
    When user "Brian" gets the list of federated cloud shares using the sharing API
    Then the response should contain 0 entries
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the response should contain 0 entries
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-31276
  Scenario Outline: Remote sharee tries to delete a pending federated share sending wrong password
    Given user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last pending federated cloud share with password "invalid" using the sharing API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Brian" should not see the following elements
      | /textfile0%20(2).txt |
    When user "Brian" gets the list of pending federated cloud shares using the sharing API
    Then the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                                   |
      | remote      | REMOTE                                     |
      | remote_id   | A_NUMBER                                   |
      | share_token | A_TOKEN                                    |
      | name        | /textfile0.txt                             |
      | owner       | Alice                                      |
      | user        | Brian                                      |
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
    Then the OCS status code should be "403"
    Examples:
      | ocs-api-version | http-status |
      | 1               | 200         |
      | 2               | 403         |

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on home storage
    Given user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/PARENT (2)/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    And as user "Alice" on server "REMOTE" the files uploaded to "/PARENT/testquota.txt" with all mechanisms should exist

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on remote storage - local server shares - remote server receives
    Given using server "LOCAL"
    And the quota of user "Brian" has been set to "20 B"
    And user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/PARENT (2)/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"

  @skipOnLDAP
  Scenario: Upload file to received federated share while quota is set on remote storage - remote server shares - local server receives
    Given using server "REMOTE"
    And the quota of user "Alice" has been set to "20 B"
    And user "Alice" from server "REMOTE" has shared "/PARENT" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/PARENT (2)/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"


  Scenario Outline: share of a folder to a remote user who already has a folder with the same name
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/Alice"
    And using server "LOCAL"
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/Brian"
    When user "Alice" from server "REMOTE" shares "zzzfolder" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" should include
      | id          | A_NUMBER       |
      | remote      | REMOTE         |
      | name        | /zzzfolder     |
      | owner       | Alice          |
      | user        | Brian          |
      | mountpoint  | /zzzfolder (2) |
      | type        | dir            |
      | permissions | all            |
    And as "Brian" folder "zzzfolder/Brian" should exist
    And as "Brian" folder "zzzfolder (2)/Alice" should exist
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  Scenario Outline: share of a file to the remote user who already has a file with the same name
    Given using server "REMOTE"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    When user "Alice" from server "REMOTE" shares "/randomfile.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" retrieves the information of the last federated cloud share using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" should include
      | id          | A_NUMBER                 |
      | remote      | REMOTE                   |
      | remote_id   | A_NUMBER                 |
      | share_token | A_TOKEN                  |
      | name        | /randomfile.txt          |
      | owner       | Alice                    |
      | user        | Brian                    |
      | mountpoint  | /randomfile (2).txt      |
      | accepted    | 1                        |
      | type        | file                     |
      | permissions | share,delete,update,read |
    And the content of file "/randomfile.txt" for user "Brian" on server "LOCAL" should be "local content"
    And the content of file "/randomfile (2).txt" for user "Brian" on server "LOCAL" should be "remote content"
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @issue-35154
  Scenario: receive a local share that has the same name as a previously received remote share
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/remote"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/local"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    When user "Alice" from server "REMOTE" shares "zzzfolder" with user "Carol" from server "LOCAL" using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Alice" from server "REMOTE" shares "randomfile.txt" with user "Carol" from server "LOCAL" using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Brian" shares folder "zzzfolder" with user "Carol" using the sharing API
    And user "Brian" shares folder "randomfile.txt" with user "Carol" using the sharing API
    # local shares are taking priority at the moment
    Then as "Carol" folder "zzzfolder (2)/remote" should exist
    And as "Carol" folder "zzzfolder/local" should exist
    And the content of file "/randomfile (2).txt" for user "Carol" on server "LOCAL" should be "remote content"
    And the content of file "/randomfile.txt" for user "Carol" on server "LOCAL" should be "local content"

  Scenario: receive a remote share that has the same name as a previously received local share
    Given using server "REMOTE"
    And user "Alice" has created folder "/zzzfolder"
    And user "Alice" has created folder "zzzfolder/remote"
    And user "Alice" has uploaded file with content "remote content" to "/randomfile.txt"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and skeleton files
    And user "Brian" has created folder "/zzzfolder"
    And user "Brian" has created folder "zzzfolder/local"
    And user "Brian" has uploaded file with content "local content" to "/randomfile.txt"
    When user "Brian" shares folder "zzzfolder" with user "Carol" using the sharing API
    And user "Brian" shares folder "randomfile.txt" with user "Carol" using the sharing API
    And user "Alice" from server "REMOTE" shares "zzzfolder" with user "Carol" from server "LOCAL" using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    And user "Alice" from server "REMOTE" shares "randomfile.txt" with user "Carol" from server "LOCAL" using the sharing API
    And user "Carol" from server "LOCAL" accepts the last pending share using the sharing API
    Then as "Carol" folder "zzzfolder/local" should exist
    And as "Carol" folder "zzzfolder (2)/remote" should exist
    And the content of file "/randomfile.txt" for user "Carol" on server "LOCAL" should be "local content"
    And the content of file "/randomfile (2).txt" for user "Carol" on server "LOCAL" should be "remote content"

  @issue-35839
  Scenario: "Auto accept from trusted servers" enabled with remote server
    Given the trusted server list is cleared
    # Remove this line once the issue is resolved
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When the administrator adds url "%remote_server%" as trusted server using the testing API
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then as "Brian" file "textfile1 (2).txt" should exist
    And url "%remote_server%" should be a trusted server

  @issue-35839
  Scenario: "Auto accept from trusted servers" disabled with remote server
    Given the trusted server list is cleared
    # Remove this line once the issue is resolved
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"
    When the administrator adds url "%remote_server%" as trusted server using the testing API
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then as "Brian" file "textfile1 (2).txt" should not exist
    And url "%remote_server%" should be a trusted server

  Scenario: Federated share with "Auto add server" enabled
    Given the trusted server list is cleared
    And using server "LOCAL"
    And parameter "autoAddServers" of app "federation" has been set to "1"
    When user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then as "Brian" file "textfile1 (2).txt" should exist
    And url "%remote_server%" should be a trusted server

  Scenario: Federated share with "Auto add server" disabled
    Given the trusted server list is cleared
    And parameter "autoAddServers" of app "federation" has been set to "0"
    When user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then as "Brian" file "textfile1 (2).txt" should exist
    And url "%remote_server%" should not be a trusted server

  @issue-35839
  Scenario: enable "Add server automatically" once a federated share was created successfully
    Given using server "LOCAL"
    And parameter "autoAddServers" of app "federation" has been set to "1"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then url "%remote_server%" should be a trusted server
    When user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    # Uncomment this line once the issue is resolved
    # Then as "Brian" file "textfile1 (2).txt" should exist
    Then as "Brian" file "textfile1 (2).txt" should not exist

  @issue-35839
  Scenario: disable "Add server automatically" once a federated share was created successfully
    Given using server "LOCAL"
    And the trusted server list is cleared
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    When user "Alice" from server "REMOTE" shares "/textfile0.txt" with user "Brian" from server "LOCAL" using the sharing API
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then url "%remote_server%" should not be a trusted server
    # Remove this line once the issue is resolved
    When the administrator sets parameter "autoAddServers" of app "federation" to "0"
    And user "Alice" from server "REMOTE" shares "/textfile1.txt" with user "Brian" from server "LOCAL" using the sharing API
    And as "Brian" file "textfile1 (2).txt" should not exist

  Scenario Outline: federated share receiver sees the original content of a received file
    Given using server "REMOTE"
    And user "Alice" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And user "Alice" from server "REMOTE" has shared "file-to-share" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When using server "LOCAL"
    Then the content of file "/file-to-share" for user "Brian" should be "thisContentIsVisible"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: federated share receiver sees the original content of a received file in multiple levels of folders
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has uploaded file with content "thisContentIsVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder/file-to-share" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When using server "LOCAL"
    Then the content of file "/file-to-share" for user "Brian" should be "thisContentIsVisible"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: remote federated share receiver adds files/folders in the federated share
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    When user "Alice" uploads file with content "thisContentIsFinal" to "/RandomFolder/new-file" using the WebDAV API
    And user "Alice" creates folder "/RandomFolder/sub-folder" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/PARENT/RandomFolder/new-file" should exist
    And as "Brian" file "/PARENT/RandomFolder/file-to-share" should exist
    And as "Brian" folder "/PARENT/RandomFolder/sub-folder" should exist
    And the content of file "/PARENT/RandomFolder/new-file" for user "Brian" should be "thisContentIsFinal"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: local federated share receiver adds files/folders in the federated share
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "LOCAL"
    When user "Brian" uploads file with content "thisContentIsFinal" to "/RandomFolder/new-file" using the WebDAV API
    And user "Brian" creates folder "/RandomFolder/sub-folder" using the WebDAV API
    And using server "REMOTE"
    Then as "Alice" file "/PARENT/RandomFolder/new-file" should exist
    And as "Alice" file "/PARENT/RandomFolder/file-to-share" should exist
    And as "Alice" folder "/PARENT/RandomFolder/sub-folder" should exist
    And the content of file "/PARENT/RandomFolder/new-file" for user "Alice" should be "thisContentIsFinal"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: local federated share receiver deletes files/folders of the received share
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "LOCAL"
    When user "Brian" deletes folder "/RandomFolder/sub-folder" using the WebDAV API
    And user "Brian" deletes file "/RandomFolder/file-to-share" using the WebDAV API
    And using server "REMOTE"
    Then as "Alice" file "/PARENT/RandomFolder/file-to-share" should not exist
    And as "Alice" folder "/PARENT/RandomFolder/sub-folder" should not exist
    But as "Alice" folder "/PARENT/RandomFolder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: remote federated share receiver deletes files/folders of the received share
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Brian" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    When user "Alice" deletes folder "/RandomFolder/sub-folder" using the WebDAV API
    And user "Alice" deletes file "/RandomFolder/file-to-share" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/PARENT/RandomFolder/file-to-share" should not exist
    And as "Brian" folder "/PARENT/RandomFolder/sub-folder" should not exist
    But as "Brian" folder "/PARENT/RandomFolder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: local federated share receiver renames files/folders of the received share
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "LOCAL"
    When user "Brian" moves folder "/RandomFolder/sub-folder" to "/RandomFolder/renamed-sub-folder" using the WebDAV API
    And user "Brian" moves file "/RandomFolder/file-to-share" to "/RandomFolder/renamedFile" using the WebDAV API
    And using server "REMOTE"
    Then as "Alice" file "/PARENT/RandomFolder/file-to-share" should not exist
    But as "Alice" file "/PARENT/RandomFolder/renamedFile" should exist
    And the content of file "/PARENT/RandomFolder/renamedFile" for user "Alice" should be "thisContentShouldBeVisible"
    And as "Alice" folder "/PARENT/RandomFolder/sub-folder" should not exist
    But as "Alice" folder "/PARENT/RandomFolder/renamed-sub-folder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: remote federated share receiver renames files/folders of the received share
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Brian" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    When user "Alice" moves folder "/RandomFolder/sub-folder" to "/RandomFolder/renamed-sub-folder" using the WebDAV API
    And user "Alice" moves file "/RandomFolder/file-to-share" to "/RandomFolder/renamedFile" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/PARENT/RandomFolder/file-to-share" should not exist
    But as "Brian" file "/PARENT/RandomFolder/renamedFile" should exist
    And the content of file "/PARENT/RandomFolder/renamedFile" for user "Brian" should be "thisContentShouldBeVisible"
    And as "Brian" folder "/PARENT/RandomFolder/sub-folder" should not exist
    But as "Brian" folder "/PARENT/RandomFolder/renamed-sub-folder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: sharer modifies the share which was shared to the federated share receiver
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has uploaded file with content "thisContentShouldBeChanged" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder/file-to-share" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file with content "thisContentIsFinal" to "/PARENT/RandomFolder/file-to-share" using the WebDAV API
    And using server "LOCAL"
    Then the content of file "/file-to-share" for user "Brian" should be "thisContentIsFinal"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: sharer adds files/folders in the share which was shared to the federated share receiver
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Alice" uploads file with content "thisContentIsFinal" to "/PARENT/RandomFolder/new-file" using the WebDAV API
    And user "Alice" creates folder "/PARENT/RandomFolder/sub-folder" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/RandomFolder/new-file" should exist
    And as "Brian" file "/RandomFolder/file-to-share" should exist
    And as "Brian" folder "/RandomFolder/sub-folder" should exist
    And the content of file "/RandomFolder/new-file" for user "Brian" should be "thisContentIsFinal"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: sharer deletes files/folders of the share which was shared to the federated share receiver
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Alice" deletes folder "/PARENT/RandomFolder/sub-folder" using the WebDAV API
    And user "Alice" deletes file "/PARENT/RandomFolder/file-to-share" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/RandomFolder/file-to-share" should not exist
    And as "Brian" folder "/RandomFolder/sub-folder" should not exist
    But as "Brian" folder "/RandomFolder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: sharer renames files/folders of the share which was shared to the federated share receiver
    Given using server "REMOTE"
    And user "Alice" has created folder "/PARENT/RandomFolder"
    And user "Alice" has created folder "/PARENT/RandomFolder/sub-folder"
    And user "Alice" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Alice" from server "REMOTE" has shared "/PARENT/RandomFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Alice" moves folder "/PARENT/RandomFolder/sub-folder" to "/PARENT/RandomFolder/renamed-sub-folder" using the WebDAV API
    And user "Alice" moves file "/PARENT/RandomFolder/file-to-share" to "/PARENT/RandomFolder/renamedFile" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/RandomFolder/file-to-share" should not exist
    But as "Brian" file "/RandomFolder/renamedFile" should exist
    And the content of file "/RandomFolder/renamedFile" for user "Brian" should be "thisContentShouldBeVisible"
    And as "Brian" folder "/RandomFolder/sub-folder" should not exist
    But as "Brian" folder "/RandomFolder/renamed-sub-folder" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: sharer unshares the federated share and the receiver no longer sees the files/folders
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has uploaded file with content "thisContentShouldBeVisible" to "/PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" deletes the last share using the sharing API
    And using server "REMOTE"
    Then as "Alice" file "/RandomFolder/file-to-share" should not exist
    And as "Alice" folder "/RandomFolder" should not exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: federated share receiver can move the location of the received share and changes are correctly seen at both ends
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    When user "Alice" creates folder "/CHILD" using the WebDAV API
    And user "Alice" creates folder "/CHILD/newRandomFolder" using the WebDAV API
    And user "Alice" moves folder "/RandomFolder" to "/CHILD/newRandomFolder/RandomFolder" using the WebDAV API
    Then as "Alice" file "/CHILD/newRandomFolder/RandomFolder/file-to-share" should exist
    When using server "LOCAL"
    Then as "Brian" file "/PARENT/RandomFolder/file-to-share" should exist
    When user "Brian" uploads file with content "thisIsTheContentOfNewFile" to "/PARENT/RandomFolder/newFile" using the WebDAV API
    And user "Brian" uploads file with content "theContentIsChanged" to "/PARENT/RandomFolder/file-to-share" using the WebDAV API
    And using server "REMOTE"
    Then as "Alice" file "/CHILD/newRandomFolder/RandomFolder/newFile" should exist
    And the content of file "/CHILD/newRandomFolder/RandomFolder/file-to-share" for user "Alice" should be "theContentIsChanged"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: federated sharer can move the location of the received share and changes are correctly seen at both ends
    Given user "Brian" has created folder "/PARENT/RandomFolder"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "PARENT/RandomFolder/file-to-share"
    And user "Brian" from server "LOCAL" has shared "/PARENT/RandomFolder" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using OCS API version "<ocs-api-version>"
    When user "Brian" creates folder "/CHILD" using the WebDAV API
    And user "Brian" creates folder "/CHILD/newRandomFolder" using the WebDAV API
    And user "Brian" moves folder "PARENT/RandomFolder" to "/CHILD/newRandomFolder/RandomFolder" using the WebDAV API
    Then as "Brian" file "/CHILD/newRandomFolder/RandomFolder/file-to-share" should exist
    When using server "REMOTE"
    Then as "Alice" file "/RandomFolder/file-to-share" should exist
    When user "Alice" uploads file with content "thisIsTheContentOfNewFile" to "/RandomFolder/newFile" using the WebDAV API
    And user "Alice" uploads file with content "theContentIsChanged" to "/RandomFolder/file-to-share" using the WebDAV API
    And using server "LOCAL"
    Then as "Brian" file "/CHILD/newRandomFolder/RandomFolder/newFile" should exist
    And the content of file "/CHILD/newRandomFolder/RandomFolder/file-to-share" for user "Brian" should be "theContentIsChanged"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Both Incoming and Outgoing federation shares are allowed
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And using OCS API version "<ocs-api-version>"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    When user "Brian" from server "LOCAL" shares "file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "Alice" file "/file-to-share" should exist
    And the content of file "/file-to-share" for user "Alice" should be "thisContentIsVisible"
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    When user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    Then as "Brian" file "/newFile" should exist
    And the content of file "/newFile" for user "Brian" should be "thisFileIsShared"
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Incoming federation shares are allowed but outgoing federation shares are restricted
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And using server "REMOTE"
    Then user "Alice" should not have any pending federated cloud share
    And as "Alice" file "/file-to-share" should not exist
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    When user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    Then as "Brian" file "/newFile" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Incoming federation shares are restricted but outgoing federation shares are allowed
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "/file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And using server "REMOTE"
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    Then as "Alice" file "/file-to-share" should exist
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then user "Brian" should not have any pending federated cloud share
    And as "Brian" file "/newFile" should not exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Both Incoming and outgoing federation shares are restricted
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "/file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And using server "REMOTE"
    Then user "Alice" should not have any pending federated cloud share
    And as "Alice" file "/file-to-share" should not exist
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then user "Brian" should not have any pending federated cloud share
    And as "Brian" file "/newFile" should not exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Incoming and outgoing federation shares are enabled for local server but incoming federation shares are restricted for remote server
    Given using server "REMOTE"
    And parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And using server "LOCAL"
    And parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "/file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And using server "REMOTE"
    Then user "Alice" should not have any pending federated cloud share
    And as "Alice" file "/file-to-share" should not exist
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    And user "Brian" from server "LOCAL" accepts the last pending share using the sharing API
    Then as "Brian" file "/newFile" should exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |

  Scenario Outline: Incoming and outgoing federation shares are enabled for local server but outgoing federation shares are restricted for remote server
    Given using server "REMOTE"
    And parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And using server "LOCAL"
    And parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And user "Brian" has uploaded file with content "thisContentIsVisible" to "/file-to-share"
    And using OCS API version "<ocs-api-version>"
    When user "Brian" from server "LOCAL" shares "/file-to-share" with user "Alice" from server "REMOTE" using the sharing API
    And using server "REMOTE"
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    Then as "Alice" file "/file-to-share" should exist
    When user "Alice" uploads file with content "thisFileIsShared" to "/newFile" using the WebDAV API
    And user "Alice" from server "REMOTE" shares "/newFile" with user "Brian" from server "LOCAL" using the sharing API
    And using server "LOCAL"
    Then user "Brian" should not have any pending federated cloud share
    And as "Brian" file "/newFile" should not exist
    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |
