@api @federation-app-required @files_sharing-app-required @notToImplementOnOCIS
Feature: federated

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and skeleton files
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and skeleton files

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

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Federated share a file with another server with expiration date
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "7"
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
      | expiration             | +7 days           |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Federated sharing with default expiration date enabled but not enforced, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs-status |
      | 1               | 100        |
#      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Federated sharing with default expiration date enabled and enforced, user shares without specifying expireDate
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | expiration | +7days |
    Examples:
      | ocs_api_version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Federated sharing with default expiration date disabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "no"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | expiration |  |
    Examples:
      | ocs_api_version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Expiration date is enforced for federated share, user modifies expiration date
    Given using OCS API version "<ocs-api-version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "7"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    And user "Brian" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "200"
    And the fields of the last response to user "Brian" sharing with user "Alice" should include
      | expiration | +3 days |
    Examples:
      | ocs-api-version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: Federated sharing with default expiration date enabled and enforced, user shares with expiration date more than the default
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "7"
    When user "Brian" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    And user "Brian" updates the last share using the sharing API with
      | expireDate | +10 days |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"

    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: User modifies expiration date for federated reshare of a file with another server with default expiration date
    Given using OCS API version "<ocs_api_version>"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "7"
    And user "Brian" has shared file "/textfile0.txt" with user "Carol" with permissions "read,update,share"
    When user "Carol" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    And user "Carol" updates the last share using the sharing API with
      | expireDate | +3 days |
    Then the HTTP status code should be "200"
    And the OCS status code should be "<ocs-status>"
    And the fields of the last response to user "Carol" sharing with user "Alice" should include
      | expiration | +3 days |

    Examples:
      | ocs_api_version | ocs-status |
      | 1               | 100        |
      | 2               | 200        |

  @skipOnOcV10.3 @skipOnOcV10.4 @skipOnOcV10.5.0
  Scenario Outline: User modifies expiration date more than the default for federated reshare of a file
    Given using OCS API version "<ocs_api_version>"
    And using server "LOCAL"
    And user "Carol" has been created with default attributes and without skeleton files
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "7"
    And user "Brian" has shared file "/textfile0.txt" with user "Carol" with permissions "read,update,share"
    When user "Carol" from server "LOCAL" shares "/textfile0.txt" with user "Alice" from server "REMOTE" using the sharing API
    And user "Carol" updates the last share using the sharing API with
      | expireDate | +10 days |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And the information of the last share of user "Carol" should include
      | expiration | +7 days |

    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
