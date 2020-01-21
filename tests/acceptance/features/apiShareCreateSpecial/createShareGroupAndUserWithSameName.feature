@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: sharing works when a username and group name are the same

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @skipOnLDAP @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: creating a new share with user and a group having same name
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "user1" has been created
    And user "user2" has been added to group "user1"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    And user "user0" has shared file "randomfile.txt" with group "user1"
    When user "user0" shares file "randomfile.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /randomfile.txt |
    And user "user2" should see the following elements
      | /randomfile.txt |
    And the content of file "randomfile.txt" for user "user1" should be "user0 file"
    And the content of file "randomfile.txt" for user "user2" should be "user0 file"

  @skipOnLDAP @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: creating a new share with group and a user having same name
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "user1" has been created
    And user "user2" has been added to group "user1"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    And user "user0" has shared file "randomfile.txt" with user "user1"
    When user "user0" shares file "randomfile.txt" with group "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /randomfile.txt |
    And user "user2" should see the following elements
      | /randomfile.txt |
    And the content of file "randomfile.txt" for user "user1" should be "user0 file"
    And the content of file "randomfile.txt" for user "user2" should be "user0 file"

  @skipOnLDAP
  Scenario: creating a new share with user and a group having same name but different case
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "User1" has been created
    And user "user2" has been added to group "User1"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    And user "user0" has shared file "randomfile.txt" with group "User1"
    When user "user0" shares file "randomfile.txt" with user "user1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user1" should see the following elements
      | /randomfile.txt |
    And user "user2" should see the following elements
      | /randomfile.txt |
    And the content of file "randomfile.txt" for user "user1" should be "user0 file"
    And the content of file "randomfile.txt" for user "user2" should be "user0 file"

  @skipOnLDAP
  Scenario: creating a new share with group and a user having same name but different case
    Given these users have been created without skeleton files:
      | username |
      | user1    |
      | user2    |
    And group "User1" has been created
    And user "user2" has been added to group "User1"
    And user "user0" has uploaded file with content "user0 file" to "/randomfile.txt"
    And user "user0" has shared file "randomfile.txt" with user "user1"
    When user "user0" shares file "randomfile.txt" with group "User1" using the sharing API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And user "user2" should see the following elements
      | /randomfile.txt |
    And user "user1" should see the following elements
      | /randomfile.txt |
    And the content of file "randomfile.txt" for user "user2" should be "user0 file"
    And the content of file "randomfile.txt" for user "user1" should be "user0 file"

