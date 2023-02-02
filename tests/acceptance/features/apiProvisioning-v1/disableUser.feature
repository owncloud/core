@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: disable user
  As an admin
  I want to be able to disable a user
  So that I can remove access to files and resources for a user, without actually deleting the files and resources

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: admin disables an user
    Given user "Alice" has been created with default attributes and without skeleton files
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled


  Scenario: admin disables an user with special characters in the username
    Given these users have been created without skeleton files:
      | username | email               |
      | a@-+_.b  | a.b@example.com     |
      | a space  | a.space@example.com |
    When the administrator disables the following users using the provisioning API
      | username |
      | a@-+_.b  |
      | a space  |
    Then the OCS status code of responses on all endpoints should be "100"
    And the HTTP status code of responses on all endpoints should be "200"
    And the following users should be disabled
      | username |
      | a@-+_.b  |
      | a space  |

  @smokeTest
  Scenario: Subadmin should be able to disable an user in their group
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | subadmin |
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "Alice" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled


  Scenario: Subadmin should not be able to disable an user not in their group
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | subadmin |
    And group "brand-new-group" has been created
    And group "another-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "Alice" has been added to group "another-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "Alice" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Alice" should be enabled


  Scenario: Subadmins should not be able to disable users that have admin permissions in their group
    Given these users have been created with default attributes and without skeleton files:
      | username      |
      | subadmin      |
      | another-admin |
    And group "brand-new-group" has been created
    And user "another-admin" has been added to group "admin"
    And user "subadmin" has been added to group "brand-new-group"
    And user "another-admin" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "another-admin" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "another-admin" should be enabled


  Scenario: Admin can disable another admin user
    Given user "another-admin" has been created with default attributes and without skeleton files
    And user "another-admin" has been added to group "admin"
    When the administrator disables user "another-admin" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "another-admin" should be disabled


  Scenario: Admin can disable subadmins in the same group
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And the administrator has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When the administrator disables user "subadmin" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "subadmin" should be disabled


  Scenario: Admin user cannot disable himself
    Given user "another-admin" has been created with default attributes and without skeleton files
    And user "another-admin" has been added to group "admin"
    When user "another-admin" disables user "another-admin" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "another-admin" should be enabled


  Scenario: disable an user with a regular user
    Given these users have been created with default attributes and small skeleton files:
      | username |
      | Alice    |
      | Brian    |
    When user "Alice" disables user "Brian" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Brian" should be enabled


  Scenario: Subadmin should not be able to disable himself
    Given user "subadmin" has been created with default attributes and without skeleton files
    And group "brand-new-group" has been created
    And user "subadmin" has been added to group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "subadmin" using the provisioning API
    Then the OCS status code should be "101"
    And the HTTP status code should be "200"
    And user "subadmin" should be enabled

  @smokeTest
  Scenario: Making a web request with a disabled user
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" sends HTTP method "GET" to URL "/index.php/apps/files"
    Then the HTTP status code should be "403"


  Scenario: Disabled user tries to download file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When user "Alice" downloads file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to upload file
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" uploads file with content "uploaded content" to "newTextFile.txt" using the WebDAV API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to rename file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When user "Alice" moves file "/textfile0.txt" to "/renamedTextfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to move file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When user "Alice" moves file "/textfile0.txt" to "/PARENT/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to delete file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When user "Alice" deletes file "/textfile0.txt" using the WebDAV API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to share a file
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares file "textfile0.txt" with user "Brian" using the sharing API
    Then the HTTP status code should be "401"


  Scenario: Disabled user tries to share a folder
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been disabled
    When user "Alice" shares folder "/PARENT" with user "Brian" using the sharing API
    Then the HTTP status code should be "401"


  Scenario: getting shares shared by disabled user (to shares folder)
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    And user "Brian" has accepted share "/textfile0.txt" offered by user "Alice"
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled
    And as "Brian" file "/Shares/textfile0.txt" should exist
    And the content of file "/Shares/textfile0.txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line


  Scenario: getting shares shared by disabled user (to root)
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has shared file "/textfile0.txt" with user "Brian"
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled
    And as "Brian" file "/textfile0.txt" should exist
    And the content of file "/textfile0.txt" for user "Brian" should be "ownCloud test text file 0" plus end-of-line


  Scenario: getting shares shared by disabled user in a group (to shares folder)
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And group "group0" has been created
    And user "Brian" has been added to group "group0"
    And user "Alice" has shared folder "/PARENT" with group "group0"
    And user "Brian" has accepted share "/PARENT" offered by user "Alice"
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled
    And as "Brian" folder "/Shares/PARENT" should exist
    And the content of file "/Shares/PARENT/parent.txt" for user "Brian" should be "ownCloud test text file parent" plus end-of-line


  Scenario: getting shares shared by disabled user in a group (to root)
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Brian" has been created with default attributes and without skeleton files
    And group "group0" has been created
    And user "Brian" has been added to group "group0"
    And user "Alice" has shared folder "/PARENT" with group "group0"
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled
    And as "Brian" folder "/PARENT" should exist
    And the content of file "/PARENT/parent.txt" for user "Brian" should be "ownCloud test text file parent" plus end-of-line


  Scenario: Disabled user tries to create public link share
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has been disabled
    When user "Alice" creates a public link share using the sharing API with settings
      | path | textfile0.txt |
    Then the HTTP status code should be "401"


  Scenario Outline: getting public link share shared by disabled user using the new public WebDAV API
    Given user "Alice" has been created with default attributes and small skeleton files
    And user "Alice" has created a public link share with settings
      | path        | /textfile0.txt |
      | permissions | read           |
    When the administrator disables user "Alice" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "Alice" should be disabled
    And the public should be able to download the last publicly shared file using the <dav_version> public WebDAV API without a password and the content should be "ownCloud test text file 0" plus end-of-line
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario: Subadmin should be able to disable user with subadmin permissions in their group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "another-subadmin" has been added to group "brand-new-group"
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "another-subadmin" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "another-subadmin" should be disabled


  Scenario: Subadmin should not be able to disable another subadmin of same group
    Given these users have been created with default attributes and without skeleton files:
      | username         |
      | subadmin         |
      | another-subadmin |
    And group "brand-new-group" has been created
    And user "another-subadmin" has been made a subadmin of group "brand-new-group"
    And user "subadmin" has been made a subadmin of group "brand-new-group"
    When user "subadmin" disables user "another-subadmin" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "another-subadmin" should be enabled


  Scenario: normal user cannot disable himself
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    When user "Alice" disables user "Alice" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And user "Alice" should be enabled
