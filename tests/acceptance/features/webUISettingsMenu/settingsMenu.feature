@webUI @insulated @disablePreviews
Feature: add users
  As an admin
  I want to be able to change different settings
  So that I can see various details about users

  Background:
    Given these users have been created with default attributes and large skeleton files but not initialized:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has logged in using the webUI
    And the administrator has browsed to the users page

  Scenario: administrator should be able to see email of a user
    When the administrator enables the setting "Show email address" in the User Management page using the webUI
    Then the administrator should be able to see the email of these users in the User Management page:
      | username |
      | Alice    |
      | Brian    |

  Scenario: administrator should be able to see storage location of a user
    When the administrator enables the setting "Show storage location" in the User Management page using the webUI
    Then the administrator should be able to see the storage location of these users in the User Management page:
      | username | storage location |
      | Alice    | /data/Alice      |
      | Brian    | /data/Brian      |

  Scenario: administrator should be able to see last login of a user when the user is not initialized
    When the administrator enables the setting "Show last log in" in the User Management page using the webUI
    Then the administrator should be able to see the last login of these users in the User Management page:
      | username | last login |
      | Alice    | never      |
      | Brian    | never      |

  Scenario: administrator should be able to see last login of a user when the user is initialized
    When the administrator enables the setting "Show last log in" in the User Management page using the webUI
    And the administrator logs out of the webUI
    And user "Alice" logs in using the webUI
    And the user logs out of the webUI
    And the administrator logs in using the webUI
    And the administrator browses to the users page
    Then the administrator should be able to see the last login of these users in the User Management page:
      | username | last login  |
      | Alice    | seconds ago |
      | Brian    | never       |

  Scenario: administrator should be able to see password column of user
    When the administrator enables the setting "Show password field" in the User Management page using the webUI
    Then the administrator should be able to see the password of these users in the User Management page:
      | username |
      | Alice    |
      | Brian    |

  Scenario: administrator should not be able to see password column of user
    When the administrator disables the setting "Show password field" in the User Management page using the webUI
    Then the administrator should not be able to see the password of these users in the User Management page:
      | username |
      | Alice    |
      | Brian    |

  Scenario: administrator should be able to see quota of user
    When the administrator enables the setting "Show quota field" in the User Management page using the webUI
    Then the administrator should be able to see the quota of these users in the User Management page:
      | username | quota   |
      | Alice    | Default |
      | Brian    | Default |

  Scenario: administrator should be able to see updated quota of user when enabled show quota field
    Given the administrator has changed the quota of user "Alice" to "Unlimited"
    And the administrator has changed the quota of user "Brian" to "5 GB"
    When the administrator enables the setting "Show quota field" in the User Management page using the webUI
    Then the administrator should be able to see the quota of these users in the User Management page:
      | username | quota     |
      | Alice    | Unlimited |
      | Brian    | 5 GB      |

  Scenario: administrator should not be able to see quota of user
    When the administrator disables the setting "Show quota field" in the User Management page using the webUI
    Then the administrator should not be able to see the quota of these users in the User Management page:
      | username |
      | Alice    |
      | Brian    |
