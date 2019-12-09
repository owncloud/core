@webUI @insulated @disablePreviews @mailhog @public_link_share-feature-required @files_sharing-app-required
Feature: Reshare by public link
  As a user
  I want to create public link shares from files/folders shared with me
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "user1" has been created with default attributes and without skeleton files
    And user "user2" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario: resharing by public link of a received shared folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "test" to "/simple-folder/randomfile.txt"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "randomfile.txt" should be listed on the webUI

  Scenario: resharing by public link of a received shared file
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And user "user1" has shared file "/randomfile.txt" with user "user2" with permissions "share,read"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for file "randomfile.txt" using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "some content"

  Scenario: resharing by public link of a sub-folder in a received shared folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has created folder "/simple-folder/sub-folder"
    And user "user1" has uploaded file with content "some content" to "/simple-folder/sub-folder/randomfile.txt"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And user "user2" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user creates a new public link for folder "sub-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "randomfile.txt" should be listed on the webUI

  Scenario: resharing by public link of a file in a received shared folder
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "some content" to "/simple-folder/randomfile.txt"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And user "user2" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user creates a new public link for file "randomfile.txt" using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "some content"

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: user reshares a public link of a received share via email
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
      """
      User Two shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: user reshares a public link of a file in a received shared folder via email
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has uploaded file with content "some content" to "/simple-folder/randomfile.txt"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user creates a new public link for file "randomfile.txt" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
      """
      User Two shared randomfile.txt with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: user reshares a public link of a received shared file via email
    Given user "user1" has uploaded file with content "some content" to "/randomfile.txt"
    And user "user1" has shared file "/randomfile.txt" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for file "randomfile.txt" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
      """
      User Two shared randomfile.txt with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: user reshares a public link of a received shared folder via email with multiple addresses
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co, foo@barr.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
      """
      User Two shared simple-folder with you
      """
    And the email address "foo@barr.co" should have received an email with the body containing
      """
      User Two shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address "foo@barr.co" should have received an email containing the last shared public link

  @skipOnOcV10.3.0 @skipOnOcV10.3.1
  Scenario: user reshares a public link of a received shared folder via email with a personal message
    Given user "user1" has created folder "/simple-folder"
    And user "user1" has shared folder "/simple-folder" with user "user2" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "user2" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email           | foo@bar.co  |
      | personalMessage | lorem ipsum |
    Then the email address "foo@bar.co" should have received an email with the body containing
      """
      User Two shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email with the body containing
      """
      lorem ipsum
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
