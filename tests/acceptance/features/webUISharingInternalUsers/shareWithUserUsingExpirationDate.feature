@webUI @insulated @disablePreviews @skipOnOcV10.3
Feature: Sharing files and folders with internal users with expiration date set/unset
  As a user
  I want to share files and folders with users with expiration date set
  So that I can provide them temporary access

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files

  Scenario: expiration date is disabled for sharing with users, user shares with another user
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be empty for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | user1      |

  Scenario: expiration date is disabled for sharing with users but enabled for sharing with groups, user shares with another user
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog

  Scenario: expiration date is enabled for sharing with users, user shares file with another user
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be "+7 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for user, user shares file
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "3"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be "+3 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for user, user shares and tries to change expiration date more than allowed
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "3"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "User Two" to "+4 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for user, user reshares received file with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "3"
    And user "user3" has shared file "lorem.txt" with user "user1"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be "+3 days" for the user "User Two" in the share dialog
    Then the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has shared file "lorem.txt" with user "user1"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be "+7 days" for the user "User Two" in the share dialog
    Then the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user, but removes default expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has shared file "lorem.txt" with user "user1"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    And the user clears the expiration date input field for share of user "User Two" in the share dialog
    Then the expiration date input field should be empty for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  |            |

  Scenario: expiration date is enabled but not enforced for user, user reshares received file with another user, but changes expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has shared file "lorem.txt" with user "user1"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "User Two" to "+15 days" in the share dialog
    Then the expiration date input field should be "+15 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +15 days   |

  Scenario: expiration date is enabled but not enforced, user shares through api and checks the expiration date on webUI
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user3" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be "+15 days" for the user "User One" in the share dialog

  Scenario: expiration date is enabled but not enforced, user receives a share with expiration date and reshares with expiration date less than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the user "User Two" in the share dialog
    When the user changes expiration date for share of user "User Two" to "+10 days" in the share dialog
    Then the expiration date input field should be "+10 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +10 days   |

  Scenario: expiration date is enabled but not enforced, user receives a share with expiration date and reshares it, setting a date further in future than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the user "User Two" in the share dialog
    When the user changes expiration date for share of user "User Two" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +20 days   |

  Scenario: expiration date is enabled and enforced, user receives a share with expiration date and tries to reshare with expiration date less than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "User Two" in the share dialog
    When the user changes expiration date for share of user "User Two" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +20 days   |

  Scenario: expiration date is enabled and enforced, user receives a share with expiration date and tries to reshare it with a date further in future than the original
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "User Two" in the share dialog
    When the user changes expiration date for share of user "User Two" to "+40 days" in the share dialog
    Then the expiration date input field should be "+30 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +30 days   |

  Scenario: expiration date is enabled and enforced, user receives a folder from a user share with expiration date and shares sub-folder with another user
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "30"
    And user "user3" has created a share with settings
      | path        | /simple-folder |
      | shareType   | user           |
      | shareWith   | user1          |
      | permissions | read,share     |
      | expireDate  | +15 days       |
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user shares file "simple-empty-folder" with user "User Two" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the user "User Two" in the share dialog
    When the user changes expiration date for share of user "User Two" to "+20 days" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user                 |
      | file_target | /simple-empty-folder |
      | uid_owner   | user1                |
      | expiration  | +20 days             |
      | share_with  | user2                |

  Scenario: expiration date is disabled for sharing with users, user shares file with another user and sets expiration date
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "no"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "no"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with user "User Two" using the webUI without closing the share dialog
    And the user changes expiration date for share of user "User Two" to "+15 days" in the share dialog
    Then the expiration date input field should be visible for the user "User Two" in the share dialog
    And the expiration date input field should be "+15 days" for the user "User Two" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | user       |
      | file_target | /lorem.txt |
      | expiration  | +15 days   |
      | uid_owner   | user1      |
