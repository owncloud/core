@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: add user
  As an admin
  I want to be able to add users
  So that I can give people controlled individual access to resources on the ownCloud server

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin creates a user
    Given user "brand-new-user" has been deleted
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should exist
    And user "brand-new-user" should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"


  Scenario: admin creates a user with special characters in the username
    Given the following users have been deleted
      | username |
      | a@-+_.b  |
      | a space  |
    When the administrator sends a user creation request for the following users with password using the provisioning API
      | username | password |
      | a@-+_.b  | %alt1%   |
      | a space  | %alt1%   |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should exist
      | username |
      | a@-+_.b  |
      | a space  |
    And the following users should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"
      | username |
      | a@-+_.b  |
      | a space  |


  Scenario: admin tries to create an existing user
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data


  Scenario: admin tries to create an existing disabled user
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    And user "brand-new-user" has been disabled
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data


  Scenario: Admin creates a new user and adds him directly to a group
    Given group "brand-new-group" has been created
    When the administrator sends a user creation request for user "brand-new-user" password "%alt1%" group "brand-new-group" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should belong to group "brand-new-group"
    And user "brand-new-user" should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"


  Scenario: admin creates a user and specifies a password with special characters
    When the administrator sends a user creation request for the following users with password using the provisioning API
      | username        | password                     | comment                               |
      | brand-new-user1 | !@#$%^&*()-_+=[]{}:;,.<>?~/\ | special characters                    |
      | brand-new-user2 | España§àôœ€                  | special European and other characters |
      | brand-new-user3 | नेपाली                         | Unicode                               |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should exist
      | username        |
      | brand-new-user1 |
      | brand-new-user2 |
      | brand-new-user3 |
    And the following users should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"
      | username        |
      | brand-new-user1 |
      | brand-new-user2 |
      | brand-new-user3 |


  Scenario: admin creates a user and specifies an invalid password, containing just space
    Given user "brand-new-user" has been deleted
    When the administrator sends a user creation request for user "brand-new-user" password " " using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist


  Scenario: admin creates a user and specifies a password containing spaces
    Given user "brand-new-user" has been deleted
    When the administrator sends a user creation request for user "brand-new-user" password "spaces in my password" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should exist
    And user "brand-new-user" should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"


  Scenario Outline: admin creates a user with username that contains capital letters
    When the administrator sends a user creation request for user "<display-name>" password "%alt1%" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Brand-New-User" should exist
    And user "BRAND-NEW-USER" should exist
    And user "brand-new-user" should exist
    And user "brand-NEW-user" should exist
    And user "BrAnD-nEw-UsEr" should exist
    And the display name of user "brand-new-user" should be "<display-name>"
    Examples:
      | display-name   |
      | Brand-New-User |
      | BRAND-NEW-USER |
      | brand-new-user |
      | brand-NEW-user |
      | BrAnD-nEw-UsEr |


  Scenario: admin tries to create an existing user but with username containing capital letters
    Given user "brand-new-user" has been created with default attributes and without skeleton files
    When the administrator sends a user creation request for user "BRAND-NEW-USER" password "%alt1%" using the provisioning API
    Then the OCS status code should be "102"
    And the HTTP status code should be "200"
    And the API should not return any data


  Scenario: admin creates a user with unusual username
    Given the following users have been deleted
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |
    When the administrator sends a user creation request for the following users with password using the provisioning API
      | username | password |
      | user-1   | %alt1%   |
      | null     | %alt1%   |
      | nil      | %alt1%   |
      | 123      | %alt1%   |
      | -123     | %alt1%   |
      | 0.0      | %alt1%   |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should exist
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |
    And the following users should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |


  Scenario: subadmin should not be able to create a new user
    Given user "brand-new-user" has been deleted
    And user "subadmin" has been created with default attributes and without skeleton files
    And group "group101" has been created
    And user "subadmin" has been added to group "group101"
    And user "subadmin" has been made a subadmin of group "group101"
    When unauthorized user "subadmin" tries to create new user "brand-new-user" with password "%alt1%" using the provisioning API
    Then the OCS status code should be "106"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist


  Scenario: normal user should not be able to create another user
    Given user "brand-new-user" has been deleted
    And user "Alice" has been created with default attributes and without skeleton files
    When unauthorized user "Alice" tries to create new user "brand-new-user" with password "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "brand-new-user" should not exist


  Scenario: subadmin should be able to create a new user into their group
    Given user "brand-new-user" has been deleted
    And user "subadmin" has been created with default attributes and without skeleton files
    And group "group101" has been created
    And user "subadmin" has been added to group "group101"
    And user "subadmin" has been made a subadmin of group "group101"
    When the groupadmin "subadmin" sends a user creation request for user "brand-new-user" password "%alt1%" group "group101" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "brand-new-user" should exist


  Scenario: subadmin should not be able to create a new user into other group
    Given user "brand-new-user" has been deleted
    And user "subadmin" has been created with default attributes and without skeleton files
    And group "group101" has been created
    And group "group102" has been created
    And user "subadmin" has been added to group "group101"
    And user "subadmin" has been made a subadmin of group "group101"
    When the groupadmin "subadmin" tries to create new user "brand-new-user" password "%alt1%" in other group "group102" using the provisioning API
    Then the OCS status code should be "105"
    And the HTTP status code should be "200"
    And user "brand-new-user" should not exist

  @sqliteDB
  Scenario: admin tries to create user with brackets in the username
    When the administrator sends a user creation request for the following users with password using the provisioning API
      | username  | password |
      | [user1]   | %alt1%   |
      | [ user2 ] | %alt1%   |
    Then the OCS status code of responses on all endpoints should be "101"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should not exist
      | username  |
      | [user1]   |
      | [ user2 ] |
