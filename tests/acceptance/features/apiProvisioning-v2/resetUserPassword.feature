@api
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: reset user password
    Given these users have been created:
      | username       | password | displayname | email                    |
      | brand-new-user | 1234     | New user    | brand.new.user@oc.com.np |
    When the administrator resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "anotherPwd123" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "1234" should not be able to download file "textfile0.txt"

  Scenario: admin tries to reset the password of a user that does not exist
    When the administrator resets the password of user "not-a-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"

  @smokeTest
  Scenario: subadmin should be able to reset the password of a user in their group
    Given these users have been created:
      | username       | password | displayname | email                    |
      | brand-new-user | 1234     | New user    | brand.new.user@oc.com.np |
      | subadmin       | Sa4567   | Sub Admin   | sub.admin@oc.com.np      |
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "anotherPwd123" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "1234" should not be able to download file "textfile0.txt"

  Scenario: subadmin should not be able to reset the password of a user not in their group
    Given these users have been created:
      | username       | password | displayname | email                    |
      | brand-new-user | 1234     | New user    | brand.new.user@oc.com.np |
      | subadmin       | Sa4567   | Sub Admin   | sub.admin@oc.com.np      |
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to reset the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "1234" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "anotherPwd123" should not be able to download file "textfile0.txt"

  Scenario: a user should not be able to reset the password of another user
    Given these users have been created:
      | username       | password | displayname    | email                    |
      | brand-new-user | 1234     | New user       | brand.new.user@oc.com.np |
      | wannabeadmin   | Wa4567   | Wanna Be Admin | wanna.be.admin@oc.com.np |
    When user "wannabeadmin" tries to reset the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "1234" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "anotherPwd123" should not be able to download file "textfile0.txt"

  Scenario: a user should be able to reset their own password
    Given these users have been created:
      | username       | password | displayname | email                    |
      | brand-new-user | 1234     | New user    | brand.new.user@oc.com.np |
    When user "brand-new-user" resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" using password "anotherPwd123" should be "ownCloud test text file 0" plus end-of-line
    But user "brand-new-user" using password "1234" should not be able to download file "textfile0.txt"
