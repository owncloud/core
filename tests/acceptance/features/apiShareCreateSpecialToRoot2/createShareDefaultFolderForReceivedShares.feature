@api @files_sharing-app-required
Feature: shares are received in the default folder for received shares

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: Do not allow sharing of the entire share_folder
    Given using OCS API version "<ocs_api_version>"
    And user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "<share_folder>"
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has shared folder "/FOLDER" with user "Brian"
    And user "Brian" has unshared folder "ReceivedShares/FOLDER"
    When user "Brian" shares folder "/ReceivedShares" with user "Alice" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code | share_folder    |
      | 1               | 200              | /ReceivedShares |
      | 2               | 404              | /ReceivedShares |
