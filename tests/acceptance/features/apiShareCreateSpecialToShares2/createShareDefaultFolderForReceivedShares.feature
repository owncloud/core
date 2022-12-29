@api @files_sharing-app-required @issue-ocis-1327
Feature: shares are received in the default folder for received shares

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Do not allow sharing of the entire share_folder
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    And user "Brian" accepts share "/FOLDER" offered by user "Alice" using the sharing API
    And user "Brian" unshares folder "Shares/FOLDER" using the WebDAV API
    And user "Brian" shares folder "/Shares" with user "Alice" using the sharing API
    Then the OCS status code of responses on each endpoint should be "<ocs_status_code>" respectively
    And the HTTP status code of responses on each endpoint should be "<http_status_code>" respectively
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code   |
      | 1               | 100, 100, 404   | 200, 200, 204, 200 |
      | 2               | 200, 200, 404   | 200, 200, 204, 404 |
