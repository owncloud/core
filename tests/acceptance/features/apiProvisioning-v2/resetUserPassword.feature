@api @provisioning_api-app-required @skipOnLDAP @skipOnGraph
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  Background:
    Given using OCS API version "2"

  @smokeTest @skipOnEncryptionType:user-keys @encryption-issue-57
  Scenario: reset user password
    Given these users have been created with small skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When the administrator resets the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"

  @issue-37992
  Scenario: admin tries to reset the password of a user that does not exist
    When the administrator resets the password of user "nonexistentuser" to "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"

  @smokeTest @skipOnEncryptionType:user-keys @encryption-issue-57
  Scenario: subadmin should be able to reset the password of a user in their group
    Given these users have been created with small skeleton files:
      | username       | password   | displayname | email                    |
      | brand-new-user | %regular%  | New user    | brand.new.user@oc.com.np |
      | subadmin       | %subadmin% | Sub Admin   | sub.admin@oc.com.np      |
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" resets the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"


  Scenario: subadmin should not be able to reset the password of a user not in their group
    Given these users have been created with small skeleton files:
      | username       | password   | displayname | email                    |
      | brand-new-user | %regular%  | New user    | brand.new.user@oc.com.np |
      | subadmin       | %subadmin% | Sub Admin   | sub.admin@oc.com.np      |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to reset the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%regular%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%alt1%" should not be able to download file "textfile0.txt"


  Scenario: a user should not be able to reset the password of another user
    Given these users have been created with small skeleton files:
      | username         | password   | displayname    | email                    |
      | brand-new-user   | %regular%  | New user       | brand.new.user@oc.com.np |
      | another-new-user | %altadmin% | Wanna Be Admin | wanna.be.admin@oc.com.np |
    When user "another-new-user" tries to reset the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%regular%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%alt1%" should not be able to download file "textfile0.txt"


  Scenario: a user should be able to reset their own password
    Given these users have been created with small skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When user "brand-new-user" resets the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"

  @skipOnEncryptionType:user-keys @encryption-issue-57
  Scenario Outline: reset user password including emoji
    Given these users have been created with small skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    When the administrator resets the password of user "brand-new-user" to "<password>" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "<password>" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"
    Examples:
      | password      | comment |
      | 😛 😜         | smileys |
      | 🐶🐱 🐭       | Animals |
      | ⌚️ 📱 📲 💻   | objects |
      | 🚴🏿‍♀️ 🚴‍♂️ | cycling |

  @skipOnEncryptionType:user-keys @encryption-issue-57
  Scenario: admin resets password of user with admin permissions
    Given these users have been created with small skeleton files:
      | username | password  | displayname | email           |
      | Alice    | %regular% | New user    | alice@oc.com.np |
    And user "Alice" has been added to group "admin"
    When the administrator resets the password of user "Alice" to "%alt1%" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "Alice" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "Alice" using password "%regular%" should not be able to download file "textfile0.txt"

  @skipOnEncryptionType:user-keys @encryption-issue-57
  Scenario: subadmin should be able to reset the password of a user with subadmin permissions in their group
    Given these users have been created with small skeleton files:
      | username       | password   | displayname | email                    |
      | brand-new-user | %regular%  | New user    | brand.new.user@oc.com.np |
      | subadmin       | %subadmin% | Sub Admin   | sub.admin@oc.com.np      |
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "brand-new-user" has been made a subadmin of group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to reset the password of user "brand-new-user" to "%alt1%" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "%alt1%" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "%regular%" should not be able to download file "textfile0.txt"


  Scenario: subadmin should not be able to reset the password of another subadmin of same group
    Given these users have been created with small skeleton files:
      | username         | password   | displayname | email                      |
      | another-subadmin | %regular%  | New user    | another.subadmin@oc.com.np |
      | subadmin         | %subadmin% | Sub Admin   | sub.admin@oc.com.np        |
    And group "new-group" has been created
    And user "another-subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to reset the password of user "another-subadmin" to "%alt1%" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "another-subadmin" using password "%regular%" should be "ownCloud test text file 0" plus end-of-line
    But user "another-subadmin" using password "%alt1%" should not be able to download file "textfile0.txt"


  Scenario: apps password is preserved when resetting login password
    Given these users have been created with small skeleton files:
      | username       | password  | displayname | email                    |
      | brand-new-user | %regular% | New user    | brand.new.user@oc.com.np |
    And a new browser session for "brand-new-user" has been started
    And the user has generated a new app password named "my-client"
    And user "brand-new-user" has reset the password of user "brand-new-user" to "%alt1%"
    When the user "brand-new-user" requests these endpoints with "PROPFIND" to get property "d:getetag" using basic auth and generated app password about user "brand-new-user"
      | endpoint                                       |
      | /remote.php/dav/files/%username%/textfile0.txt |
    Then the HTTP status code should be "207"

