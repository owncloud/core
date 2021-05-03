@api @files_sharing-app-required @issue-ocis-reva-11 @issue-ocis-reva-243
Feature: sharing

  Background:
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |





























































































































  Scenario Outline: After losing share permissions user can still delete a previously reshared share
    Given using OCS API version "<ocs_api_version>"
    And user "Alice" has created folder "/TMP"
    And user "Alice" has shared folder "/TMP" with user "Brian" with permissions "share,create,update,read"
    And user "Brian" has accepted share "/TMP" offered by user "Alice"
    And user "Brian" has shared folder "Shares/TMP" with user "Carol" with permissions "share,create,update,read"
    And user "Carol" has accepted share "/TMP" offered by user "Brian"
    And user "Alice" has updated the last share of "Alice" with
      | permissions | create,update,read |
    When user "Brian" deletes the last share using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And user "Carol" should not have any received shares
    Examples:
      | ocs_api_version | ocs_status_code |
      | 2               | 200             |
      | 1               | 100             |
