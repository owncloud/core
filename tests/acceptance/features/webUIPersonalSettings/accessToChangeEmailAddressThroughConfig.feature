@webUI @insulated @disablePreviews
Feature: Control access to edit email address of user through config file
  As an admin
  I want to control the access to users to edit their email address in the settings page
  So that users can edit their email address after getting permission from the administrator

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI


  Scenario: Admin gives access to users to change their email address
    Given the administrator has updated system config key "allow_user_to_change_mail_address" with value "true" and type "boolean"
    When the user browses to the personal general settings page
    And the user changes the email address to "new-address@owncloud.com" using the webUI
    And the user follows the email change confirmation link received by "new-address@owncloud.com" using the webUI
    Then the attributes of user "Alice" returned by the API should include
      | email | new-address@owncloud.com |


  Scenario: Admin does not give access to users to change their email address
    Given the administrator has updated system config key "allow_user_to_change_mail_address" with value "false" and type "boolean"
    When the user browses to the personal general settings page
    Then the user should not be able to change the email address using the webUI
