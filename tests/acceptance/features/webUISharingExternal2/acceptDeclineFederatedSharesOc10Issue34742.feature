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

  @issue-34742
  Scenario: User-based & global auto accepting is enabled but remote server is not trusted
    Given parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "yes"
    And parameter "autoAddServers" of app "federation" has been set to "0"
    And the user has browsed to the personal sharing settings page
    When the user disables automatically accepting federated shares from trusted servers
    And the user enables automatically accepting federated shares from trusted servers
    And user "Alice" from server "REMOTE" shares "/lorem.txt" with user "Alice" from server "LOCAL" using the sharing API
    Then user "Alice" should not see the following elements
      | /lorem (2).txt |
