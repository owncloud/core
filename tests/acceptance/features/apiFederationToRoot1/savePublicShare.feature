@api @federation-app-required @files_sharing-app-required
Feature: Save public shares created by oC users

  Background:
    Given using server "LOCAL"
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: Mount public share created from local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When user "Brian" adds the public share created from server "LOCAL" using the sharing API
    Then the HTTP status code should be "200"
    And as "Brian" folder "/PARENT" should exist
    And as "Brian" file "/PARENT/lorem.txt" should exist


  Scenario: Mount public share and then delete (local server share)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And user "Brian" has added the public share created from server "LOCAL" using the sharing API
    When user "Brian" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Brian" folder "/PARENT" should not exist


  Scenario Outline: Mount public share and sharer unshares the share (local server share)
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT    |
      | permissions | read       |
      | name        | sharedlink |
    And user "Brian" has added the public share created from server "LOCAL" using the sharing API
    When user "Alice" deletes public link share named "sharedlink" in file "/PARENT" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "Brian" folder "/PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Mount public share and try to reshare (local server share)
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And user "Brian" has added the public share created from server "LOCAL" using the sharing API
    When user "Brian" creates a public link share using the sharing API with settings
      | path | PARENT |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |


  Scenario: Mount public share created from remote server
    Given using server "REMOTE"
    And user "RemoteAlice" has been created with default attributes and without skeleton files
    And user "RemoteAlice" has created folder "/PARENT"
    And user "RemoteAlice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/lorem.txt"
    And user "RemoteAlice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And using server "LOCAL"
    When user "Alice" adds the public share created from server "REMOTE" using the sharing API
    Then the HTTP status code should be "200"
    And as "Alice" folder "/PARENT" should exist
    And as "Alice" file "/PARENT/lorem.txt" should exist


  Scenario: Mount public share and then delete (remote server share)
    Given using server "REMOTE"
    And user "RemoteAlice" has been created with default attributes and without skeleton files
    And user "RemoteAlice" has created folder "/PARENT"
    And user "RemoteAlice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And using server "LOCAL"
    And user "Alice" has added the public share created from server "REMOTE" using the sharing API
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/PARENT" should not exist


  Scenario Outline: Mount public share and sharer unshares the share (remote server share)
    Given using OCS API version "<ocs_api_version>"
    And using server "REMOTE"
    And user "RemoteAlice" has been created with default attributes and without skeleton files
    And user "RemoteAlice" has created folder "/PARENT"
    And user "RemoteAlice" has created a public link share with settings
      | path        | /PARENT    |
      | permissions | read       |
      | name        | sharedlink |
    And using server "LOCAL"
    And user "Alice" has added the public share created from server "REMOTE" using the sharing API
    And using server "REMOTE"
    When user "RemoteAlice" deletes public link share named "sharedlink" in file "/PARENT" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    When using server "LOCAL"
    Then the HTTP status code should be "200"
    And as "Alice" folder "/PARENT" should not exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |


  Scenario Outline: Mount public share and try to reshare (remote server share)
    Given using OCS API version "<ocs_api_version>"
    And using server "REMOTE"
    And user "RemoteAlice" has been created with default attributes and without skeleton files
    And user "RemoteAlice" has created folder "/PARENT"
    And user "RemoteAlice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And using server "LOCAL"
    And user "Alice" has added the public share created from server "REMOTE" using the sharing API
    When user "Alice" creates a public link share using the sharing API with settings
      | path | PARENT |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |