@api @files_sharing-app-required @notToImplementOnOCIS
Feature: shares are received in the default folder for received shares

  Background:
    Given user "Alice" has been created with default attributes and small skeleton files

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario Outline: Do not allow sharing of the entire share_folder
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "<share_folder>"
    When user "Alice" shares folder "/FOLDER" with user "Brian" using the sharing API
    And user "Brian" unshares folder "ReceivedShares/FOLDER" using the WebDAV API
    And user "Brian" shares folder "/ReceivedShares" with user "Alice" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | share_folder    |
      | 1               | 404             | 200              | /ReceivedShares |
      | 2               | 404             | 404              | /ReceivedShares |
