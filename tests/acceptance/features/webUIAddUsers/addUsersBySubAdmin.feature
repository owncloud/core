@webUI @insulated @disablePreviews @email
Feature: add users
  As a subadmin
  I want to add users
  So that unauthorised access is impossible

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And group "grp1" has been created
    And user "Alice" has been added to group "grp1"
    And user "Alice" has been made a subadmin of group "grp1"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the users page


  Scenario: a subadmin uses the webUI to create a simple user
    When the subadmin creates a user with the name "guiusr1" and the password "%regular%" using the webUI
    And the user logs out of the webUI
    And user "guiusr1" logs in using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  @skipOnLDAP
  Scenario: a subadmin uses the webUI to create a simple user with an Email address but without a password
    When the subadmin creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    Then the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      just letting you know that you now have an %productname% account.

      Your username: guiusr1
      Access it:
      """

  @skipOnLDAP
  Scenario: user sets his own password after being created with an Email address only by a subadmin
    When the subadmin creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    And the user logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" using the webUI
    And the user sets the password to "%regular%" and confirms with the same password using the webUI
    Then the user should be redirected to the login page
    And the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      Password changed successfully
      """
    When the user logs in with username "guiusr1" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"

  @skipOnLDAP
  Scenario: user sets his own password after being created with an Email address only and invitation link resent by a subadmin
    When the subadmin creates a user with the name "guiusr1" and the email "guiusr1@owncloud" without a password using the webUI
    And the subadmin resends the invitation email for user "guiusr1" using the webUI
    And the user logs out of the webUI
    And the user follows the password set link received by "guiusr1@owncloud" in Email number 2 using the webUI
    Then the user should see an error message saying "The token provided is invalid."
    And the user follows the password set link received by "guiusr1@owncloud" in Email number 1 using the webUI
    And the user sets the password to "%regular%" and confirms with the same password using the webUI
    And the user should be redirected to the login page
    And the email address "guiusr1@owncloud" should have received an email with the body containing
      """
      Password changed successfully
      """
    When the user logs in with username "guiusr1" and password "%regular%" using the webUI
    Then the user should be redirected to a webUI page with the title "Files - %productname%"
