@api @federation-app-required @files_sharing-app-required
Feature: propagation of etags between federated and local server

  Background:
    Given using OCS API version "1"
    And using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "PARENT"


  Scenario: Overwrite a federated shared folder as sharer propagates etag for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/PARENT (2)"
    And using server "LOCAL"
    When user "Brian" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT (2)" of user "Alice" on server "REMOTE" should have changed

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
    And user "Alice" has stored etag of element "/PARENT (2)"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT (2)" of user "Alice" on server "REMOTE" should have changed


  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for recipient
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "Alice" has stored etag of element "/"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Alice" on server "REMOTE" should have changed


  Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/PARENT"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT" of user "Brian" on server "LOCAL" should have changed


  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Brian" on server "LOCAL" should have changed


  Scenario: Adding a file to a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "Brian" from server "LOCAL" has shared "/PARENT" with user "Alice" from server "REMOTE"
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "Alice" uploads file "filesForUpload/lorem.txt" to "/PARENT (2)/new-textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "Brian" on server "LOCAL" should have changed
