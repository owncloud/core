@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: edit users
  As an admin, subadmin or as myself
  I want to be able to edit user information
  So that I can keep the user information up-to-date

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: the administrator can edit a user email
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"

  @skipOnOcV10.3
  Scenario Outline: the administrator can edit a user email of an user with special characters in the username
    Given these users have been created without skeleton files:
      | username   | email   |
      | <username> | <email> |
    When the administrator changes the email of user "<username>" to "a-different-email@example.com" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the email address of user "<username>" should be "a-different-email@example.com"
    Examples:
      | username | email               |
      | a@-+_.b  | a.b@example.com     |
      | a space  | a.space@example.com |

  @smokeTest
  Scenario: the administrator can edit a user display (the API allows editing the "display name" by using the key word "display")
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator changes the display of user "brand-new-user" to "A New User" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the display name of user "brand-new-user" should be "A New User"


  Scenario: the administrator can edit a user display name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator changes the display name of user "brand-new-user" to "A New User" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the display name of user "brand-new-user" should be "A New User"


  Scenario: the administrator can clear a user display name and then it defaults to the username
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And the administrator has changed the display name of user "brand-new-user" to "A New User"
    When the administrator changes the display name of user "brand-new-user" to "" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the display name of user "brand-new-user" should be "brand-new-user"

  @smokeTest
  Scenario: the administrator can edit a user quota
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And the quota definition of user "brand-new-user" should be "12 MB"


  Scenario: the administrator can override existing user email
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And the administrator has changed the email of user "brand-new-user" to "brand-new-user@gmail.com"
    And the OCS status code should be "200"
    And the HTTP status code should be "200"
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"

  @skipOnOcV10.3 @skipOnOcV10.4
  Scenario: the administrator can clear an existing user email
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And the administrator has changed the email of user "brand-new-user" to "brand-new-user@gmail.com"
    And the OCS status code should be "200"
    And the HTTP status code should be "200"
    When the administrator changes the email of user "brand-new-user" to "" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the email address of user "brand-new-user" should be ""

  @smokeTest @notToImplementOnOCIS
  Scenario: a subadmin should be able to edit the user information in their group
    Given these users have been created with default attributes and without skeleton files:
      | username       |
      | subadmin       |
      | brand-new-user |
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    And user "subadmin" changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    And user "subadmin" changes the display of user "brand-new-user" to "Anne Brown" using the provisioning API
    Then the OCS status code of responses on all endpoints should be "200"
    And the HTTP status code of responses on all endpoints should be "200"
    And the display name of user "brand-new-user" should be "Anne Brown"
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"
    And the quota definition of user "brand-new-user" should be "12 MB"


  Scenario: a normal user should be able to change their email address
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | email | brand-new-user@example.com |
    And the email address of user "brand-new-user" should be "brand-new-user@example.com"


  Scenario Outline: a normal user should be able to change their display name
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" changes the display name of user "brand-new-user" to "<display-name>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | displayname | <display-name> |
    And the display name of user "brand-new-user" should be "<display-name>"
    Examples:
      | display-name    |
      | Alan Border     |
      | Phil Cyclist 🚴 |


  Scenario: a normal user should not be able to change their quota
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When user "brand-new-user" changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "brand-new-user" returned by the API should include
      | quota definition | default |
    And the quota definition of user "brand-new-user" should be "default"

  @notToImplementOnOCIS
  Scenario: the administrator can edit user information with admin permissions
    Given these users have been created with default attributes and without skeleton files:
      | username      |
      | another-admin |
    And user "another-admin" has been added to group "admin"
    When user "another-admin" changes the quota of user "another-admin" to "12MB" using the provisioning API
    And user "another-admin" changes the email of user "another-admin" to "another-admin@example.com" using the provisioning API
    And user "another-admin" changes the display of user "another-admin" to "Anne Brown" using the provisioning API
    Then the OCS status code of responses on all endpoints should be "200"
    And the HTTP status code of responses on all endpoints should be "200"
    And the display name of user "another-admin" should be "Anne Brown"
    And the email address of user "another-admin" should be "another-admin@example.com"
    And the quota definition of user "another-admin" should be "12 MB"

  @notToImplementOnOCIS
  Scenario: a subadmin should be able to edit user information with subadmin permissions in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "new-group" has been created
    And user "another-subadmin" has been added to group "new-group"
    And user "another-subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" changes the quota of user "another-subadmin" to "12MB" using the provisioning API
    And user "subadmin" changes the email of user "another-subadmin" to "brand-new-user@example.com" using the provisioning API
    And user "subadmin" changes the display of user "another-subadmin" to "Anne Brown" using the provisioning API
    Then the OCS status code of responses on all endpoints should be "200"
    And the HTTP status code of responses on all endpoints should be "200"
    And the display name of user "another-subadmin" should be "Anne Brown"
    And the email address of user "another-subadmin" should be "brand-new-user@example.com"
    And the quota definition of user "another-subadmin" should be "12 MB"

  @notToImplementOnOCIS
  Scenario: a subadmin should not be able to edit user information of another subadmin of same group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "new-group" has been created
    And user "another-subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" changes the quota of user "another-subadmin" to "12MB" using the provisioning API
    And user "subadmin" changes the email of user "another-subadmin" to "brand-new-user@example.com" using the provisioning API
    And user "subadmin" changes the display of user "another-subadmin" to "Anne Brown" using the provisioning API
    Then the OCS status code of responses on all endpoints should be "997"
    And the HTTP status code of responses on all endpoints should be "401"
    And the display name of user "another-subadmin" should be "Regular User"
    And the email address of user "another-subadmin" should be "another-subadmin@owncloud.com"
    And the quota definition of user "another-subadmin" should be "default"


  Scenario: a normal user should not be able to edit another user's information
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    When user "Alice" tries to change the display name of user "Brian" to "New Brian" using the provisioning API
    And user "Alice" tries to change the email of user "Brian" to "brian-new-email@example.com" using the provisioning API
    Then the OCS status code of responses on all endpoints should be "997"
    And the HTTP status code of responses on all endpoints should be "401"
    And the display name of user "Brian" should not have changed
    And the email address of user "Brian" should not have changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: Admin gives access to users to change their email address
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has updated system config key "allow_user_to_change_mail_address" with value "true" and type "boolean"
    When user "Alice" changes the email of user "Alice" to "alice@gmail.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "Alice" returned by the API should include
      | email | alice@gmail.com |
    And the email address of user "Alice" should be "alice@gmail.com"

  @notToImplementOnOCIS @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: Admin does not give access to users to change their email address
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has updated system config key "allow_user_to_change_mail_address" with value "false" and type "boolean"
    When user "Alice" tries to change the email of user "Alice" to "alice@gmail.com" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "Alice" returned by the API should include
      | email | alice@example.org |
    And the email address of user "Alice" should not have changed

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their email address, admin can still change the email address
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator updates system config key "allow_user_to_change_mail_address" with value "false" and type "boolean" using the occ command
    And the administrator changes the email of user "Alice" to "alice@gmail.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "Alice" returned by the API should include
      | email | alice@gmail.com |
    And the email address of user "Alice" should be "alice@gmail.com"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their email address, admin can still change their own email address
    When the administrator updates system config key "allow_user_to_change_mail_address" with value "false" and type "boolean" using the occ command
    And the administrator changes the email of user "admin" to "something@example.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "admin" returned by the API should include
      | email | something@example.com |
    And the email address of user "admin" should be "something@example.com"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their email address, subadmin can still change the email address of a user they are subadmin of
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | subadmin |
      | Alice    |
    And group "new-group" has been created
    And user "Alice" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When the administrator updates system config key "allow_user_to_change_mail_address" with value "false" and type "boolean" using the occ command
    And user "subadmin" changes the email of user "Alice" to "alice@gmail.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "Alice" returned by the API should include
      | email | alice@gmail.com |
    And the email address of user "Alice" should be "alice@gmail.com"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their email address, subadmin cannot change the email address of a user they are not subadmin of
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | subadmin |
      | Alice    |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    # Note: Alice is not a member of new-group, so subadmin does not a priv to change the email address of Alice
    When the administrator updates system config key "allow_user_to_change_mail_address" with value "false" and type "boolean" using the occ command
    And user "subadmin" tries to change the email of user "Alice" to "alice@gmail.com" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "Alice" returned by the API should include
      | email | alice@example.org |
    And the email address of user "Alice" should not have changed

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: Admin gives access to users to change their display name
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has updated system config key "allow_user_to_change_display_name" with value "true" and type "boolean"
    When user "Alice" changes the display of user "Alice" to "Alice Wonderland" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "Alice" returned by the API should include
      | displayname | Alice Wonderland |
    And the display name of user "Alice" should be "Alice Wonderland"

  @notToImplementOnOCIS @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario: Admin does not give access to users to change their display name
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has updated system config key "allow_user_to_change_display_name" with value "false" and type "boolean"
    When user "Alice" tries to change the display name of user "Alice" to "Alice Wonderland" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "Alice" returned by the API should include
      | displayname | Alice Hansen |
    And the display name of user "Alice" should not have changed

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their display name, admin can still change display name
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator updates system config key "allow_user_to_change_display_name" with value "false" and type "boolean" using the occ command
    And the administrator changes the display name of user "Alice" to "Alice Wonderland" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "Alice" returned by the API should include
      | displayname | Alice Wonderland |
    And the display name of user "Alice" should be "Alice Wonderland"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their display name, admin can still change their own display name
    When the administrator updates system config key "allow_user_to_change_display_name" with value "false" and type "boolean" using the occ command
    And the administrator changes the display name of user "admin" to "The Administrator" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "admin" returned by the API should include
      | displayname | The Administrator |
    And the display name of user "admin" should be "The Administrator"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their display name, subadmin can still change the display name of a user they are subadmin of
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | subadmin |
      | Alice    |
    And group "new-group" has been created
    And user "Alice" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When the administrator updates system config key "allow_user_to_change_display_name" with value "false" and type "boolean" using the occ command
    And user "subadmin" changes the display name of user "Alice" to "Alice Wonderland" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
      | displayname | Alice Wonderland |
    And the display name of user "Alice" should be "Alice Wonderland"

  @notToImplementOnOCIS @skipOnOcV10.7 @skipOnOcV10.8 @skipOnOcV10.9.0 @skipOnOcV10.9.1
  Scenario: Admin does not give access to users to change their display name, subadmin cannot change the display name of a user they are not subadmin of
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | subadmin |
      | Alice    |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    # Note: Alice is not a member of new-group, so subadmin does not a priv to change the email address of Alice
    When the administrator updates system config key "allow_user_to_change_display_name" with value "false" and type "boolean" using the occ command
    And user "subadmin" tries to change the display name of user "Alice" to "Alice Wonderland" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "Alice" returned by the API should include
      | displayname | Alice Hansen |
    And the display name of user "Alice" should not have changed
