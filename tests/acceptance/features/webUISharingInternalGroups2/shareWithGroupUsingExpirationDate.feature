@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal groups with expiration date set/unset
  As a user
  I want to share files and folders with groups and set an expiration date
  So that I can provide them temporary access

  As a administrator
  I want to set default expiration dates and be able to enforce them
  So that a user cannot have endless shares

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"


  Scenario: expiration date is disabled for sharing with groups, user shares with a group
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | %username% |


  Scenario: expiration date is disabled for sharing with groups but enabled for sharing with users, user shares with a group
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | %username% |


  Scenario: expiration date is enabled for sharing with groups, user shares a file with a group
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+3 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | %username% |


  Scenario Outline: expiration date is enforced for group, user shares a file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "<num_days>"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "<days>" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | <days>     |
      | uid_owner   | %username% |
    Examples:
      | num_days | days    |
      | 3        | +3 days |
      | 0        | today   |


  Scenario: expiration date is enforced for group, user shares and tries to change expiration date more than allowed
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "3"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "+4 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enforced for group, user reshares received file with the group
    Given user "Carol" has shared file "lorem.txt" with user "Alice"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "3"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enabled but not enforced for group, user reshares received file with group
    Given user "Carol" has shared file "lorem.txt" with user "Alice"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | %username% |


  Scenario: expiration date is enabled but not enforced for group, user reshares received file with group, but removes default expiration date
    Given user "Carol" has shared file "lorem.txt" with user "Alice"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user clears the expiration date input field for share of group "grp1" in the share dialog
    Then the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  |            |


  Scenario: expiration date is enabled but not enforced for group, user reshares received file with user, but changes expiration date
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Carol" has shared file "lorem.txt" with user "Alice"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "+15 days" in the share dialog
    Then the expiration date input field should be "+15 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +15 days   |


  Scenario: expiration date is enabled but not enforced for group, user shares to group through api and checks the expiration date on webUI
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Carol" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be "+15 days" for the group "grp1" in the share dialog


  Scenario: expiration date is enabled but not enforced for group, user receives a share with expiration date and reshares with expiration date less than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+10 days" in the share dialog
    Then the expiration date input field should be "+10 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +10 days   |


  Scenario: expiration date is enabled but not enforced for group, user receives a share with expiration date and reshares with expiration date in future than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +20 days   |


  Scenario: expiration date is enabled and enforced for group, user receives a share with expiration date and tries to reshare with expiration date less than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +20 days   |


  Scenario: expiration date is enabled and enforced for group, user receives a share with expiration date and tries to reshare with expiration date further in future than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Carol" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | Alice      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+40 days" in the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | %username% |
      | expiration  | +30 days   |


  Scenario: expiration date is enabled and enforced for group, user receives a folder from a group share with expiration date and shares sub-folder with group
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And group "grp2" has been created
    And user "Alice" has been added to group "grp2"
    And user "Carol" has created a share with settings
      | path        | /simple-folder |
      | shareType   | group          |
      | shareWith   | grp2           |
      | permissions | read,share     |
      | expireDate  | +15 days       |
    And user "Alice" has logged in using the webUI
    When the user shares file "simple-folder/simple-empty-folder" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group                |
      | file_target | /simple-empty-folder |
      | uid_owner   | %username%           |
      | expiration  | +20 days             |
      | share_with  | grp1                 |


  Scenario Outline: expiration date is disabled for sharing with group, user shares file with group and sets expiration date
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "<days>" in the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "<days>" for the group "grp1" in the share dialog
    And the information of the last share of user "Alice" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | <days>     |
      | uid_owner   | %username% |
      | share_with  | grp1       |
    Examples:
      | days     |
      | +15 days |
      | +1 days  |
      | today    |
