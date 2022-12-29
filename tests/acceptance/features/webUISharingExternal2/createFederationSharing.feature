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
    And parameter "auto_accept_trusted" of app "federatedfilesharing" has been set to "no"


  Scenario: test the single steps of sharing a folder to a remote server
    Given user "Alice" has logged in using the webUI
    When the user shares folder "simple-folder" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And the user shares folder "simple-empty-folder" with federated user "Alice" with displayname "%username%@%remote_server_without_scheme%" using the webUI
    And user "Alice" from server "REMOTE" accepts the last pending share using the sharing API
    And using server "REMOTE"
    Then as "Alice" folder "/simple-folder (2)" should exist
    And as "Alice" file "/simple-folder (2)/lorem.txt" should exist
    And as "Alice" folder "/simple-empty-folder (2)" should exist


  Scenario: test the single steps of receiving a federation share
    Given using server "REMOTE"
    And these users have been created with default attributes and without skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And user "Brian" has created folder "simple-empty-folder"
    And user "Carol" has uploaded file with content "I am lorem.txt" to "/lorem.txt"
    And user "Alice" from server "REMOTE" has shared "simple-folder" with user "Alice" from server "LOCAL"
    And user "Brian" from server "REMOTE" has shared "simple-empty-folder" with user "Alice" from server "LOCAL"
    And user "Carol" from server "REMOTE" has shared "lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" has logged in using the webUI
    Then dialogs should be displayed on the webUI
      | title        | content                                                                                                  | user  |
      | Federated share | Do you want to add the federated share /simple-folder from %username%@%remote_server_without_scheme%?       | Alice |
      | Federated share | Do you want to add the federated share /simple-empty-folder from %username%@%remote_server_without_scheme%? | Brian |
      | Federated share | Do you want to add the federated share /lorem.txt from %username%@%remote_server_without_scheme%?           | Carol |
    When the user accepts the offered federated shares using the webUI
    Then file "lorem (2).txt" should be listed on the webUI
    And the content of file "lorem (2).txt" for user "Alice" on server "LOCAL" should be "I am lorem.txt"
    And folder "simple-folder (2)" should be listed on the webUI
    And file "lorem.txt" should be listed in folder "simple-folder (2)" on the webUI
    And the content of file "simple-folder (2)/lorem.txt" for user "Alice" on server "LOCAL" should be "I am lorem.txt inside simple-folder"
    And file "lorem (2).txt" should be listed in the shared-with-you page on the webUI
    And folder "simple-folder (2)" should be listed in the shared-with-you page on the webUI
    And folder "simple-empty-folder (2)" should be listed in the shared-with-you page on the webUI


  Scenario: sharing indicator inside folder shared using federated sharing
    Given user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" from server "LOCAL" has shared "/simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | lorem.txt  |
      | sub-folder |


  Scenario: sharing indicator for file uploaded inside folder shared using federated sharing
    Given user "Alice" from server "LOCAL" has shared "/simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |


  Scenario: sharing indicator for folder created inside folder shared using federated sharing
    Given user "Alice" from server "LOCAL" has shared "/simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |


  Scenario: sharing details inside folder shared using federated sharing
    Given user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "Alice" from server "LOCAL" has shared "/simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for folder "sub-folder"
    Then federated user "Alice" with displayname "%username%@%remote_server% (Federated share)" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens the share dialog for file "textfile.txt"
    Then federated user "Alice" with displayname "%username%@%remote_server% (Federated share)" should be listed as share receiver via "simple-folder" on the webUI


  Scenario: sharing details of items inside a shared folder shared with local user and federated user
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/sub-folder/textfile.txt"
    And user "Alice" from server "LOCAL" has shared "/simple-folder" with user "Alice" from server "REMOTE"
    And user "Alice" has shared folder "simple-folder/sub-folder" with user "Brian"
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder/sub-folder" using the webUI
    And the user opens the share dialog for file "textfile.txt"
    Then federated user "Alice" with displayname "%username%@%remote_server% (Federated share)" should be listed as share receiver via "simple-folder" on the webUI
    And user "Brian" with displayname "%displayname%" should be listed as share receiver via "sub-folder" on the webUI


  Scenario: expiration date is disabled for federation sharing, sharer checks the expiration date of a federation share
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "no"
    And user "Alice" from server "LOCAL" has shared "lorem.txt" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be visible for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the expiration date input field should be empty for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated  |
      | path       | /lorem.txt |
      | expiration |            |
      | uid_owner  | Alice      |


  Scenario: expiration date is enabled for federation sharing, sharer checks the expiration date of a federation share
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And user "Alice" from server "LOCAL" has shared "lorem.txt" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be visible for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the expiration date input field should be "+7 days" for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated  |
      | path       | /lorem.txt |
      | expiration | +7 days    |
      | uid_owner  | Alice      |


  Scenario Outline: expiration date is enforced for federation sharing, user shares file
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "<num_days>"
    And user "Alice" from server "LOCAL" has shared "lorem.txt" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be visible for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the expiration date input field should be "<days>" for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated  |
      | path       | /lorem.txt |
      | expiration | <days>     |
      | uid_owner  | Alice      |
    Examples:
      | num_days | days    |
      | 3        | +3 days |
      | 0        | today   |


  Scenario: expiration date is enforced for federation sharing, user shares and tries to change expiration date more than allowed
    Given parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "3"
    And user "Alice" from server "LOCAL" has shared "lorem.txt" with user "Alice" from server "REMOTE"
    And user "Alice" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    And the user changes expiration date for share of federated user "Alice" with displayname "%username%@%remote_server% (federated)" to "+4 days" in the share dialog
#    Cannot set expiration date more than 3 days in the future
    Then the expiration date input field should be "+3 days" for the federated user "Alice" with displayname "%username%@%remote_server% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated  |
      | path       | /lorem.txt |
      | expiration | +3 days    |
      | uid_owner  | Alice      |


  Scenario: expiration date is enforced for federated sharing, user receives a share with expiration date and reshares with expiration date less than the original with a local user
    Given user "Brian" has been created with default attributes and without skeleton files
    And using server "REMOTE"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "15"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And user "Alice" from server "REMOTE" has shared "lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem (2).txt" with user "Brian" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "Brian" to "+10 days" in the share dialog
    Then the expiration date input field should be "+ 10 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | user           |
      | share_with | Brian          |
      | path       | /lorem (2).txt |
      | expiration | +10 days       |
      | uid_owner  | Alice          |


  Scenario: expiration date is enforced for federated sharing, user receives a share with expiration date and reshares with expiration date less than the original with another federated user
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "5"
    And user "Alice" from server "REMOTE" has shared "lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem (2).txt" with federated user "Brian" with displayname "%username%@%remote_server_without_scheme%" using the webUI without closing the share dialog
    And the user changes expiration date for share of federated user "Brian" with displayname "%username%@%remote_server_without_scheme% (federated)" to "+4 days" in the share dialog
    Then the expiration date input field should be "+ 4 days" for the federated user "Brian" with displayname "%username%@%remote_server_without_scheme% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated      |
      | path       | /lorem (2).txt |
      | expiration | +4 days        |
      | uid_owner  | Alice          |


  Scenario: expiration date is enforced for federated sharer, local receiver reshares received file with another local user
    Given user "Brian" has been created with default attributes and without skeleton files
    And using server "REMOTE"
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "3"
    And user "Alice" from server "REMOTE" has shared "lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem (2).txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be empty for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | user           |
      | share_with | Brian          |
      | path       | /lorem (2).txt |
      | expiration |                |
      | uid_owner  | Alice          |


  Scenario: expiration date is enforced for federated sharer, local receiver reshares received file with another federated user
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And parameter "shareapi_default_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_remote_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_remote_share" of app "core" has been set to "5"
    And user "Alice" from server "REMOTE" has shared "lorem.txt" with user "Alice" from server "LOCAL"
    And user "Alice" from server "LOCAL" accepts the last pending share using the sharing API
    And using server "LOCAL"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem (2).txt" with federated user "Brian" with displayname "%username%@%remote_server_without_scheme%" using the webUI without closing the share dialog
    Then the expiration date input field should be empty for the federated user "Brian" with displayname "%username%@%remote_server_without_scheme% (federated)" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type | federated      |
      | path       | /lorem (2).txt |
      | expiration |                |
      | uid_owner  | Alice          |
