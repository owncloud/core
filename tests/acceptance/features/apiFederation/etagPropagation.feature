@api @federation-app-required @TestAlsoOnExternalUserBackend
Feature: propagation of etags between federated and local server

  Background:
    Given using OCS API version "1"
    And using server "REMOTE"
    And user "user0" has been created with default attributes
    And using server "LOCAL"
    And user "user1" has been created with default attributes

  Scenario: Overwrite a federated shared folder as sharer propagates etag for recipient
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "user0" has stored etag of element "/PARENT (2)"
    And using server "LOCAL"
    When user "user1" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the etag of element "/PARENT (2)" of user "user0" on server "REMOTE" should have changed

  @issue-enterprise-2848
  Scenario: Overwrite a federated shared folder as sharer propagates etag to root folder for recipient
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "user0" has stored etag of element "/"
    And using server "LOCAL"
    When user "user1" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    # After fixing issue-enterprise-2848, change the following step to "should have changed"
    And the etag of element "/" of user "user0" on server "REMOTE" should not have changed
    #And the etag of element "/" of user "user0" on server "REMOTE" should have changed

  @issue-enterprise-2848
  Scenario: Adding a file to a federated shared folder as sharer propagates etag to root folder for recipient
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "user0" has stored etag of element "/"
    And using server "LOCAL"
    When user "user1" uploads file "filesForUpload/lorem.txt" to "/PARENT/new-textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    # After fixing issue-enterprise-2848, change the following step to "should have changed"
    And the etag of element "/" of user "user0" on server "REMOTE" should not have changed
    #And the etag of element "/" of user "user0" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag for recipient
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "user0" has stored etag of element "/PARENT (2)"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT (2)" of user "user0" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for recipient
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    And user "user0" has stored etag of element "/"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "user0" on server "REMOTE" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user1" has stored etag of element "/PARENT"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/PARENT" of user "user1" on server "LOCAL" should have changed

  Scenario: Overwrite a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user1" has stored etag of element "/"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "user1" on server "LOCAL" should have changed

  Scenario: Adding a file to a federated shared folder as recipient propagates etag to root folder for sharer
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user1" has stored etag of element "/"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user0" uploads file "filesForUpload/lorem.txt" to "/PARENT (2)/new-textfile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the etag of element "/" of user "user1" on server "LOCAL" should have changed