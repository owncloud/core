@webUI @insulated @disablePreviews @mailhog @public_link_share-feature-required
Feature: Reshare by public link
  As a user
  I want to create public link shares from files/folders shared with me
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user2" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario: resharing by public link of a received share
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @issue-36386
  Scenario: user shares a public link via email
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    #When the user creates a new public link for folder "simple-folder" using the webUI with
    When the user tries to create a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    #Then the email address "foo@bar.co" should have received an email with the body containing
	#		"""
	#		User Two shared simple-folder with you
	#		"""
    #And the email address "foo@bar.co" should have received an email containing the last shared public link
    Then dialog should be displayed on the webUI
      | title                                | content                                                  |
      | An error occured while sending email | Couldn't send mail to following recipient(s): foo@bar.co |
