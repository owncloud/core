@webUI @insulated @disablePreviews @skipOnOcV10.3
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
      | user1    |
      | user2    |
    And user "user3" has been created with default attributes and skeleton files
    And these groups have been created:
      | groupname |
      | grp1      |
    And user "user1" has been added to group "grp1"
    And user "user2" has been added to group "grp1"

  Scenario: expiration date is disabled for sharing with groups, user shares with a group
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | user1      |

  Scenario: expiration date is disabled for sharing with groups but enabled for sharing with users, user shares with a group
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  |            |
      | uid_owner   | user1      |

  Scenario: expiration date is enabled for sharing with groups, user shares a file with a group
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+3 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for group, user shares a file
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "3"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for group, user shares and tries to change expiration date more than allowed
    Given user "user1" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "3"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "+4 days" in the share dialog
    Then the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enforced for group, user reshares received file with the group
    Given user "user3" has shared file "lorem.txt" with user "user1"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "3"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+3 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +3 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enabled but not enforced for group, user reshares received file with group
    Given user "user3" has shared file "lorem.txt" with user "user1"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +7 days    |
      | uid_owner   | user1      |

  Scenario: expiration date is enabled but not enforced for group, user reshares received file with group, but removes default expiration date
    Given user "user3" has shared file "lorem.txt" with user "user1"
    And parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user clears the expiration date input field for share of group "grp1" in the share dialog
    Then the expiration date input field should be empty for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  |            |

  Scenario: expiration date is enabled but not enforced for group, user reshares received file with user, but changes expiration date
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user3" has shared file "lorem.txt" with user "user1"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "+15 days" in the share dialog
    Then the expiration date input field should be "+15 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +15 days   |

  Scenario: expiration date is enabled but not enforced for group, user shares to group through api and checks the expiration date on webUI
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | group      |
      | shareWith   | grp1       |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user3" has logged in using the webUI
    When the user opens the share dialog for file "lorem.txt"
    Then the expiration date input field should be "+15 days" for the group "grp1" in the share dialog

  Scenario: expiration date is enabled but not enforced for group, user receives a share with expiration date and reshares with expiration date less than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+10 days" in the share dialog
    Then the expiration date input field should be "+10 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +10 days   |

  Scenario: expiration date is enabled but not enforced for group, user receives a share with expiration date and reshares with expiration date in future than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+7 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +20 days   |

  Scenario: expiration date is enabled and enforced for group, user receives a share with expiration date and tries to reshare with expiration date less than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    Then the expiration date input field should be "+20 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +20 days   |

  Scenario: expiration date is enabled and enforced for group, user receives a share with expiration date and tries to reshare with expiration date further in future than the original
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And user "user3" has created a share with settings
      | path        | /lorem.txt |
      | shareType   | user       |
      | shareWith   | user1      |
      | permissions | read,share |
      | expireDate  | +15 days   |
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+40 days" in the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | uid_owner   | user1      |
      | expiration  | +30 days   |

  Scenario: expiration date is enabled and enforced for group, user receives a folder from a group share with expiration date and shares sub-folder with group
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "30"
    And group "grp2" has been created
    And user "user1" has been added to group "grp2"
    And user "user3" has created a share with settings
      | path        | /simple-folder |
      | shareType   | group          |
      | shareWith   | grp2           |
      | permissions | read,share     |
      | expireDate  | +15 days       |
    And user "user1" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user shares file "simple-empty-folder" with group "grp1" using the webUI without closing the share dialog
    Then the expiration date input field should be "+30 days" for the group "grp1" in the share dialog
    When the user changes expiration date for share of group "grp1" to "+20 days" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group                |
      | file_target | /simple-empty-folder |
      | uid_owner   | user1                |
      | expiration  | +20 days             |
      | share_with  | grp1                 |

  Scenario: expiration date is disabled for sharing with group, user shares file with group and sets expiration date
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "no"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "no"
    And user "user1" has uploaded file "filesForUpload/lorem.txt" to "lorem.txt"
    And user "user1" has logged in using the webUI
    When the user shares file "lorem.txt" with group "grp1" using the webUI without closing the share dialog
    And the user changes expiration date for share of group "grp1" to "+15 days" in the share dialog
    Then the expiration date input field should be visible for the group "grp1" in the share dialog
    And the expiration date input field should be "+15 days" for the group "grp1" in the share dialog
    And the information of the last share of user "user1" should include
      | share_type  | group      |
      | file_target | /lorem.txt |
      | expiration  | +15 days   |
      | uid_owner   | user1      |
      | share_with  | grp1       |
