@cli
Feature: poll incoming shares
  As an administrator of a ownCloud Server
  I want to be able to poll incoming shares manually
  So that I can make sure all shares are up-to-date

  @files_sharing-app-required
  Scenario: poll incoming share with a federation share of deep nested folders when there is a file change in remote end
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/really/"
    And user "Alice" has created folder "/really/very/"
    And user "Alice" has created folder "/really/very/deeply/"
    And user "Alice" has created folder "/really/very/deeply/nested/"
    And user "Alice" has created folder "/really/very/deeply/nested/folder/"
    And user "Alice" has created folder "/really/very/deeply/nested/folder/with/"
    And user "Alice" has created folder "/really/very/deeply/nested/folder/with/sub/"
    And user "Alice" has created folder "/really/very/deeply/nested/folder/with/sub/folders"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has shared "/really" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    When user "Alice" on "REMOTE" uploads file "filesForUpload/lorem.txt" to "/really/very/deeply/nested/folder/with/sub/folders/lorem.txt" using the WebDAV API
    And using server "LOCAL"
    Then the etag of element "/" of user "Brian" should have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should have changed

  @files_sharing-app-required
  Scenario: poll incoming share with a federation share and no file change
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/shareFolder/"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has shared "/shareFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    Then the etag of element "/" of user "Brian" should have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should have changed

  @files_sharing-app-required
  Scenario: poll incoming share multiple times
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created folder "/shareFolder/"
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and small skeleton files
    And user "Brian" has stored etag of element "/"
    And user "Alice" from server "REMOTE" has shared "/shareFolder" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And using server "LOCAL"
    And the administrator has invoked occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should have changed
    When user "Brian" stores etag of element "/" using the WebDAV API
    And the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should not have changed
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should not have changed


  Scenario: poll incoming share when there is no share
    Given user "Brian" has been created with default attributes and small skeleton files
    And user "Brian" has stored etag of element "/"
    When the administrator invokes occ command "incoming-shares:poll"
    Then the etag of element "/" of user "Brian" should not have changed
