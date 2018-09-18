@api
Feature: reset user password
  As an admin
  I want to be able to reset a user's password
  So that I can secure individual access to resources on the ownCloud server

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: reset user password
    Given user "brand-new-user" has been created
    When the administrator resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" should be "ownCloud test text file 0" plus end-of-line

  Scenario: admin tries to reset the password of a user that does not exist
    When the administrator resets the password of user "not-a-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"

  @smokeTest
  Scenario: subadmin should be able to reset the password of a user in their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" should be "ownCloud test text file 0" plus end-of-line

  Scenario: subadmin should not be able to reset the password of a user not in their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "subadmin" has been made a subadmin of group "new-group"
    When user "subadmin" tries to reset the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" should be "ownCloud test text file 0" plus end-of-line

  Scenario: a user should not be able to reset the password of another user
    Given user "wannabeadmin" has been created
    And user "brand-new-user" has been created
    When user "wannabeadmin" tries to reset the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the content of file "textfile0.txt" for user "brand-new-user" should be "ownCloud test text file 0" plus end-of-line

  Scenario: a user should be able to reset their own password
    Given user "brand-new-user" has been created
    When user "brand-new-user" resets the password of user "brand-new-user" to "anotherPwd123" using the provisioning API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the content of file "textfile0.txt" for user "brand-new-user" should be "ownCloud test text file 0" plus end-of-line
