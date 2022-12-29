@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal users with expiration date set/unset
  As a user
  I want to share files and folders with users with expiration date set
  So that I can provide them temporary access

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |


  Scenario: expiration date is disabled for sharing with users, user shares with another user
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be empty for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | %username% |


  Scenario: expiration date is disabled for sharing with users but enabled for sharing with groups, user shares with another user
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog


  Scenario: expiration date is enabled for sharing with users, user shares file with another user
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be "+7 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | %username% |


  Scenario Outline: expiration date is enforced for user, user shares file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "<num_days>"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be "<days>" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | <days>     |
      | uid_owner   | %username% |
    Examples:
      | num_days | days    |
      | 3        | +3 days |
      | 0        | today   |


  Scenario: expiration date is enforced for user, user shares and tries to change expiration date more than allowed
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "3"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "Brian" to "+4 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enforced for user, user reshares received file with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "3"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be "+3 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be "+7 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user, but removes default expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    And the user clears the expiration date input field for share of user "Brian" in the share dialog
    Then the expiration date input field should be empty for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  |            |


  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user, but changes expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "Brian" to "+15 days" in the share dialog
    Then the expiration date input field should be "+15 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +15 days   |


  Scenario: expiration date is enabled but not enforced, user shares through api and checks the expiration date on webUI
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Carol" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be "+15 days" for the user "Alice" in the share dialog


  Scenario: expiration date is enabled but not enforced, user receives a share with expiration date and reshares with expiration date less than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the user "Brian" in the share dialog
    When the user changes expiration date for share of user "Brian" to "+10 days" in the share dialog
    Then the expiration date input field should be "+10 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +10 days   |


  Scenario: expiration date is enabled but not enforced, user receives a share with expiration date and reshares it, setting a date further in future than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the user "Brian" in the share dialog
    When the user changes expiration date for share of user "Brian" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +20 days   |


  Scenario: expiration date is enabled and enforced, user receives a share with expiration date and tries to reshare with expiration date less than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "Brian" in the share dialog
    When the user changes expiration date for share of user "Brian" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +20 days   |


  Scenario: expiration date is enabled and enforced, user receives a share with expiration date and tries to reshare it with a date further in future than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "Brian" in the share dialog
    When the user changes expiration date for share of user "Brian" to "+40 days" in the share dialog
    Then the expiration date input field should be "+30 days" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +30 days   |


  Scenario: expiration date is enabled and enforced, user receives a folder from a user share with expiration date and shares sub-folder with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created a share with settings
      | path        | /simple-folder |
      | shareType   | user           |
      | shareWith   | Alice          |
      | permissions | read,share     |
      | expireDate  | +15 days       |
    And user "Alice" has logged in using the webUI
    When the user shares file "simple-folder/simple-empty-folder" with user "Brian" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "Brian" in the share dialog
    When the user changes expiration date for share of user "Brian" to "+20 days" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user                 |
      | file_target | /simple-empty-folder |
      | uid_owner   | %username%           |
      | expiration  | +20 days             |
      | share_with  | Brian                |


  Scenario Outline: expiration date is disabled for sharing with users, user shares file with another user and sets expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with user "Brian" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "Brian" to "<days>" in the share dialog
    Then the expiration date input field should be visible for the user "Brian" in the share dialog
    And the expiration date input field should be "<days>" for the user "Brian" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | <days>     |
      | uid_owner   | %username% |
    Examples:
      | days     |
      | +15 days |
      | +1 days  |
      | today    |


  Scenario: share with multiple users and change the sharing permissions and expiration date
    Given user "Carol" has created folder "simple-folder"
    And user "Carol" has shared folder "/simple-folder" with user "Alice"
    And user "Carol" has shared folder "/simple-folder" with user "Brian"
    And user "Carol" has logged in using the webUI
    When the user sets the sharing permissions of user "Alice" for "simple-folder" using the webUI to
      | edit   | no |
      | create | no |
    And the user changes expiration date for share of user "Alice" to "+5 days" in the share dialog
    Then the information for user "Alice" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | expiration  | +5 days        |
      | uid_owner   | Carol          |
      | share_with  | Alice          |
      | permissions | 17             |
    When the user sets the sharing permissions of user "Brian" for "simple-folder" using the webUI to
      | share  | no |
      | delete | no |
    And the user changes expiration date for share of user "Brian" to "+7 days" in the share dialog
    Then the information for user "Brian" about the received share of folder "simple-folder" shared with a user should include
      | share_type  | user           |
      | file_target | /simple-folder |
      | expiration  | +7 days        |
      | uid_owner   | Carol          |
      | share_with  | Brian          |
      | permissions | 7              |
