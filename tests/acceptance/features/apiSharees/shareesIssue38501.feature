@notToImplementOnOCIS @api
Feature: Test for issue owncloud/core 38501
  Once the issue is fixed delete this file and  unskip these tests
  apiSharees/sharees.feature:454
  apiSharees/sharees.feature:519

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | sharee1  |
      | sharee2  |
    And these users have been created without skeleton files:
      | username | password  | displayname  | email |
      | sharee3  | %regular% | Sharee Three |       |
    And these groups have been created:
      | groupname    |
      | ShareeGroup  |
      | ShareeGroup2 |
    And user "Alice" has been added to group "ShareeGroup2"

  Scenario Outline: empty search for sharees when search min length is set to 0
    Given the administrator has updated system config key "user.search_min_length" with value "0"
    And using OCS API version "<ocs-api-version>"
    When user "sharee1" gets the sharees using the sharing API with parameters
      | search   |      |
      | itemType | file |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should include
      | Sharee Three | 0 | sharee3 |
    And the "users" sharees returned should include
      | Alice Hansen | 0 | Alice   |
      | Sharee One   | 0 | sharee1 |
      | Sharee Two   | 0 | sharee2 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should include
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |

  Scenario Outline: search for sharees without search when min length is set to 0
    Given the administrator has updated system config key "user.search_min_length" with value "0"
    And using OCS API version "<ocs-api-version>"
    When user "sharee1" gets the sharees using the sharing API with parameters
      | itemType | file |
    Then the OCS status code should be "<ocs-status>"
    And the HTTP status code should be "<http-status>"
    And the "exact users" sharees returned should include
      | Sharee Three | 0 | sharee3 |
    And the "users" sharees returned should include
      | Alice Hansen | 0 | Alice   |
      | Sharee One   | 0 | sharee1 |
      | Sharee Two   | 0 | sharee2 |
    And the "exact groups" sharees returned should be empty
    And the "groups" sharees returned should include
      | ShareeGroup  | 1 | ShareeGroup  |
      | ShareeGroup2 | 1 | ShareeGroup2 |
    And the "exact remotes" sharees returned should be empty
    And the "remotes" sharees returned should be empty
    Examples:
      | ocs-api-version | ocs-status | http-status |
      | 1               | 100        | 200         |
      | 2               | 200        | 200         |
