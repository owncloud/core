@webUI @insulated @disablePreviews
Feature: Control access to edit fullname of user through config file
  As an admin
  I want to control the access to users to edit their fullname in settings page
  So that users can edit their fullname after getting permission from administrator

  Scenario: Admin gives access to users to change their full name
    Given user "user1" has been created with default attributes and skeleton files
    And user "user1" has logged in using the webUI
    When the administrator updates system config key "allow_user_to_change_display_name" with value "true" and type "boolean" using the occ command
    And the user browses to the personal general settings page
    And the user changes the full name to "my#very&weird?नेपालि%name" using the webUI
    And the user reloads the current page of the webUI
    Then "my#very&weird?नेपालि%name" should be shown as the name of the current user on the WebUI
    And the attributes of user "user1" returned by the API should include
      | displayname | my#very&weird?नेपालि%name |

  Scenario: Admin doesnot give access to users to change their full name
    Given user "user1" has been created with default attributes and skeleton files
    And user "user1" has logged in using the webUI
    When the administrator updates system config key "allow_user_to_change_display_name" with value "false" and type "boolean" using the occ command
    And the user browses to the personal general settings page
    Then the user should not be able to change the full name using the webUI