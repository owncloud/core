@api @federation-app-required @files_sharing-app-required @toImplementOnOCIS
Feature: propagation of etags between federated and local server

  Background:
    Given using OCS API version "1"
    And using server "REMOTE"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and skeleton files
    And using server "LOCAL"
    And the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and skeleton files

  Scenario: Overwrite a federated shared folder as sharer propagates etag for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/Shares/PARENT"
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the etag of element "/Shares/PARENT" of user "Alice" on server "REMOTE" should have changed

  @issue-enterprise-2848
  Scenario: Overwrite a federated shared folder as sharer propagates etag to root folder for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/"
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    # After fixing issue-enterprise-2848, change the following step to "should have changed"
    And the etag of element "/" of user "Alice" on server "REMOTE" should not have changed
    #And the etag of element "/" of user "Alice" on server "REMOTE" should have changed

  @issue-enterprise-2848
  Scenario: Adding a file to a federated shared folder as sharer propagates etag to root folder for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/"
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/lorem.txt" to "/PARENT/new-textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    # After fixing issue-enterprise-2848, change the following step to "should have changed"
    And the etag of element "/" of user "Alice" on server "REMOTE" should not have changed
    #And the etag of element "/" of user "Alice" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/Shares/PARENT"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/Shares/PARENT" of user "Alice" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Alice" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/PARENT"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT" of user "Brian" on server "LOCAL" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/Shares/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Brian" on server "LOCAL" should have changed

  Scenario: Adding a file to a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/Shares/PARENT/new-textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Brian" on server "LOCAL" should have changed
