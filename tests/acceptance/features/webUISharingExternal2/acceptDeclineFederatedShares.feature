@webUI @federation-app-required @insulated @disablePreviews @files_sharing-app-required
Feature: Federation Sharing - sharing with users on other cloud storages
  As a user
  I want to share files with any users on other cloud storages
  So that other users have access to these files

  Background:
    Given using server "REMOTE"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-empty-folder"
    And user "Alice" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And using server "LOCAL"
    And user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-empty-folder"
    And user "Alice" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"


  Scenario: declining a federation share on the webUI
    Given user "Alice" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    When the user declines the offered federated shares using the webUI
    Then file "lorem (2).txt" should not be listed on the webUI
    And file "lorem (2).txt" should not be listed in the shared-with-you page on the webUI


  Scenario: automatically accept a federation share when it is allowed by the config
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    When user "Alice" from server "REMOTE" shares "/lorem.txt" with user "Alice" from server "LOCAL" using the sharing API
    And the user has reloaded the current page of the webUI
    Then file "lorem (2).txt" should be listed on the webUI


  Scenario: User-based auto accepting is disabled while global is enabled
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting federated shares from trusted servers
    And user "Alice" from server "REMOTE" shares "/lorem.txt" with user "Alice" from server "LOCAL" using the sharing API
    Then user "Alice" should not see the following elements
      | /lorem (2).txt |


  Scenario: one user disabling user-based auto accepting while global is enabled has no effect on other users
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "autoAddServers" of app "federation" has been set to "1"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting federated shares from trusted servers
    And user "Alice" from server "REMOTE" shares "/lorem.txt" with user "Brian" from server "LOCAL" using the sharing API
    Then user "Brian" should see the following elements
      | /lorem (2).txt |


  Scenario: User-based accepting from trusted server checkbox is not visible while global is disabled
    Given parameter "autoAddServers" of app "federation" has been set to "1"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" has accepted the last pending share
    And the user has reloaded the current page of the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    Then User-based auto accepting from trusted servers checkbox should not be displayed on the personal sharing settings page on the webUI

  @issue-34742 @skipOnOcV10
  Scenario: User-based & global auto accepting is enabled but remote server is not trusted
    Given parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting federated shares from trusted servers
    And the user enables automatically accepting federated shares from trusted servers
    And user "Alice" from server "REMOTE" shares "/lorem.txt" with user "Alice" from server "LOCAL" using the sharing API
    Then user "Alice" should see the following elements
      | /lorem (2).txt |


  Scenario: Local user accepts a pending federated share on the webUI
    Given user "Alice" from server "REMOTE" has shared "/lorem.txt" with user "Alice" from server "LOCAL"
    When the user browses to the shared-with-you page
    And the user closes the federation sharing dialog
    And the user accepts the pending federated share using the webUI
    Then file "lorem (2).txt" should be listed in the shared-with-you page on the webUI


  Scenario: Federated share from Local user to federated user
    Given user "Alice" from server "LOCAL" has shared "/lorem.txt" with user "Alice" from server "REMOTE"
    And user "Alice" from server "REMOTE" has accepted the last pending share
    When the user browses to the shared-with-others page
    Then user "Alice" should see the following elements
      | lorem.txt |
