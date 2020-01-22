@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: shares are received in the default folder for received shares

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario Outline: Do not allow sharing of the entire share_folder
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "<share_folder>"
    When user "user0" shares folder "/FOLDER" with user "user1" using the sharing API
    And user "user1" unshares folder "ReceivedShares/FOLDER" using the WebDAV API
    And user "user1" shares folder "/ReceivedShares" with user "user0" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code | share_folder    |
      | 1               | 404             | 200              | /ReceivedShares |
      | 2               | 404             | 404              | /ReceivedShares |

