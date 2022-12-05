@cli @api @federation-app-required @files_sharing-app-required
Feature:
  As a admin
  I want to cleanup orphaned remote storages
  So that users will not get undesirable failure

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Brian" has been created with default attributes and without skeleton files


  Scenario Outline: Clean up the orphaned remote storage after deleting the original shares
    Given using OCS API version "<ocs-api-version>"
    And using server "REMOTE"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "textfile0.txt"
    And user "Alice" from server "REMOTE" has shared "/textfile0.txt" with user "Brian" from server "LOCAL"
    And user "Brian" from server "LOCAL" has accepted the last pending share
    And user "Alice" has deleted the last share
    And using server "LOCAL"
    When the administrator cleanups all the orphaned remote storages of shares using the occ command
    Then 1 orphaned remote storage should have been cleared

    Examples:
      | ocs-api-version |
      | 1               |
      | 2               |
