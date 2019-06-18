@cli @TestAlsoOnExternalUserBackend

Feature: poll incoming shares
  As an administrator of a ownCloud Server
  I want to be able to poll incoming shares manually
  So that I can make sure all shares are up-to-date

  Scenario: poll incoming share with a federation share of deep nested folders when there is a file change in remote end
    Given using server "REMOTE"
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/really/"
    And user "user0" has created folder "/really/very/"
    And user "user0" has created folder "/really/very/deeply/"
    And user "user0" has created folder "/really/very/deeply/nested/"
    And user "user0" has created folder "/really/very/deeply/nested/folder/"
    And user "user0" has created folder "/really/very/deeply/nested/folder/with/"
    And user "user0" has created folder "/really/very/deeply/nested/folder/with/sub/"
    And user "user0" has created folder "/really/very/deeply/nested/folder/with/sub/folders"
    And using server "LOCAL"
    And user "user1" has been created with default attributes and skeleton files
    And user "user1" has stored etag of element "/"
    And user "user0" from server "REMOTE" has shared "/really" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    When user "user0" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "/really/very/deeply/nested/folder/with/sub/folders/lorem.txt" using the WebDAV API
    And using server "LOCAL"
    Then the etag of element "/" of user "user1" should not have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should have changed

  Scenario: poll incoming share with a federation share and no file change
    Given using server "REMOTE"
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/shareFolder/"
    And using server "LOCAL"
    And user "user1" has been created with default attributes and skeleton files
    And user "user1" has stored etag of element "/"
    And user "user0" from server "REMOTE" has shared "/shareFolder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then the etag of element "/" of user "user1" should not have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should have changed

  Scenario: poll incoming share multiple times
    Given using server "REMOTE"
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/shareFolder/"
    And using server "LOCAL"
    And user "user1" has stored etag of element "/"
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" from server "REMOTE" has shared "/shareFolder" with user "user1" from server "LOCAL"
    And user "user1" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And the administrator has invoked occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should have changed
    When user "user1" stores etag of element "/" using the WebDAV API
    And the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should not have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should not have changed

  Scenario: poll incoming share when there is no share
    Given user "user1" has been created with default attributes and skeleton files
    And user "user1" has stored etag of element "/"
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "user1" should not have changed