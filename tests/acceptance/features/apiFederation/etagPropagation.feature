@api @federation-app-required @TestAlsoOnExternalUserBackend
Feature: propagation of etags between federated an local server

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

  Scenario: Overwrite a federated shared folder as recipient propagates etag for sharer
    Given user "user1" from server "LOCAL" has shared "/PARENT" with user "user0" from server "REMOTE"
    And user "user1" has stored etag of element "/PARENT"
    And user "user0" from server "REMOTE" has accepted the last pending share
    And using server "REMOTE"
    When user "user0" uploads file "filesForUpload/file_to_overwrite.txt" to "/PARENT (2)/textfile0.txt" using the WebDAV API
    Then the etag of element "/PARENT" of user "user1" on server "LOCAL" should have changed
