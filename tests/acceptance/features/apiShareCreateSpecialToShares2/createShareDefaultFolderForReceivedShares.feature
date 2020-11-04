@api @files_sharing-app-required @issue-ocis-reva-42 @issue-ocis-reva-243
Feature: shares are received in the default folder for received shares

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and skeleton files

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario Outline: Do not allow sharing of the entire share_folder
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    And user "Brian" accepts share "/FOLDER" offered by user "Alice" using the sharing API
    And user "Brian" unshares folder "Shares/FOLDER" using the WebDAV API
    And user "Brian" shares folder "/Shares" with user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 404             | 200              |
      | 2               | 404             | 404              |
