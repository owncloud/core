@webUI @federation-app-required @insulated @disablePreviews @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: Federation Sharing - sharing with users on other cloud storages
  As a user
  I want to share files with any users on other cloud storages
  So that other users have access to these files

  Background:
    Given using server "REMOTE"
    And user "user0" has been created with default attributes and without skeleton files
    And user "user0" has created folder "simple-folder"
    And user "user0" has created folder "simple-empty-folder"
    And user "user0" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And using server "LOCAL"
    And user "user0" has been created with default attributes and without skeleton files
    And user "user0" has created folder "simple-folder"
    And user "user0" has created folder "simple-empty-folder"
    And user "user0" has uploaded file with content "I am lorem.txt inside simple-folder" to "/simple-folder/lorem.txt"
    And user "user0" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user0" has logged in using the webUI
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"

  Scenario: test the single steps of sharing a folder to a remote server
    When the user shares folder "simple-folder" with remote user "user0@%remote_server_without_scheme%" using the webUI
    And user "user0" from server "REMOTE" accepts the last pending share using the sharing API
    And the user shares folder "simple-empty-folder" with remote user "user0@%remote_server_without_scheme%" using the webUI
    And user "user0" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "user0" folder "/simple-folder (2)" should exist
    And as "user0" file "/simple-folder (2)/lorem.txt" should exist
    And as "user0" folder "/simple-empty-folder (2)" should exist

  Scenario: test the single steps of receiving a federation share
    Given using server "REMOTE"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user1" has created folder "simple-empty-folder"
    And user "user2" has uploaded file with content "I am lorem.txt" to "/lorem.txt"
    And user "user0" from server "REMOTE" has shared "simple-folder" with user "user0" from server "LOCAL"
    And user "user1" from server "REMOTE" has shared "simple-empty-folder" with user "user0" from server "LOCAL"
    And user "user2" from server "REMOTE" has shared "lorem.txt" with user "user0" from server "LOCAL"
    And the user has reloaded the current page of the webUI
    Then dialogs should be displayed on the webUI
      | title        | content                                                                                             |
      | Remote share | Do you want to add the remote share /simple-folder from user0@%remote_server_without_scheme%?       |
      | Remote share | Do you want to add the remote share /simple-empty-folder from user1@%remote_server_without_scheme%? |
      | Remote share | Do you want to add the remote share /lorem.txt from user2@%remote_server_without_scheme%?           |
    When the user accepts the offered remote shares using the webUI
    Then file "lorem (2).txt" should be listed on the webUI
    And the content of file "lorem (2).txt" for user "user0" on server "LOCAL" should be "I am lorem.txt"
    And folder "simple-folder (2)" should be listed on the webUI
    And file "lorem.txt" should be listed in folder "simple-folder (2)" on the webUI
    And the content of file "simple-folder (2)/lorem.txt" for user "user0" on server "LOCAL" should be "I am lorem.txt inside simple-folder"
    And file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder (2)" should be listed in the shared-with-you page on the webUI
    And folder "simple-empty-folder (2)" should be listed in the shared-with-you page on the webUI

  @skipOnOcV10.3
  Scenario: sharing indicator inside folder shared using federated sharing
    Given user "user0" has created folder "/simple-folder/sub-folder"
    And user "user0" from server "LOCAL" has shared "/simple-folder" with user "user0" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | lorem.txt  |
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing indicator for file uploaded inside folder shared using federated sharing
    Given user "user0" from server "LOCAL" has shared "/simple-folder" with user "user0" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |

  @skipOnOcV10.3
  Scenario: sharing indicator for folder created inside folder shared using federated sharing
    Given user "user0" from server "LOCAL" has shared "/simple-folder" with user "user0" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |

  @skipOnOcV10.3
  Scenario: sharing details inside folder shared using federated sharing
    Given user "user0" has created folder "/simple-folder/sub-folder"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "user0" from server "LOCAL" has shared "/simple-folder" with user "user0" from server "REMOTE"
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for folder "sub-folder"
    Then federated user "user0@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the share dialog for file "textfile.txt"
    Then federated user "user0@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI

  @skipOnOcV10.3
  Scenario: sharing details of items inside a shared folder shared with local user and federated user
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/simple-folder/sub-folder"
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/sub-folder/textfile.txt"
    And user "user0" from server "LOCAL" has shared "/simple-folder" with user "user0" from server "REMOTE"
    And user "user0" has shared folder "simple-folder/sub-folder" with user "user1"
    When the user opens folder "simple-folder/sub-folder" using the webUI
    And the user opens the share dialog for file "textfile.txt"
    Then federated user "user0@%remote_server% (Remote share)" should be listed as share receiver via "simple-folder" on the webUI
    And user "User One" should be listed as share receiver via "sub-folder" on the webUI
