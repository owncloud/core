@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: resharing can be done on a reshared resource

  Background:
    Given user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario: Reshared files can be still accessed if a user in the middle removes it.
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user3" has been created with default attributes and without skeleton files
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has moved file "/textfile0.txt" to "/textfile0_shared.txt"
    And user "user1" has shared file "textfile0_shared.txt" with user "user2"
    And user "user2" has shared file "textfile0_shared.txt" with user "user3"
    When user "user1" deletes file "/textfile0_shared.txt" using the WebDAV API
    Then the content of file "/textfile0_shared.txt" for user "user2" should be "ownCloud test text file 0" plus end-of-line
    Then the content of file "/textfile0_shared.txt" for user "user3" should be "ownCloud test text file 0" plus end-of-line
