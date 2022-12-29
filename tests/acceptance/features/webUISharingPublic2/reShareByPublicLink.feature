@webUI @insulated @disablePreviews @email @public_link_share-feature-required @files_sharing-app-required
Feature: Reshare by public link
  As a user
  I want to create public link shares from files/folders shared with me
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Brian" has been created with default attributes and without skeleton files

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: resharing by public link of a received shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/randomfile.txt"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "randomfile.txt" should be listed on the webUI


  Scenario: resharing by public link of a received shared file
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has shared file "/randomfile.txt" with user "Brian" with permissions "share,read"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for file "randomfile.txt" using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "some content"


  Scenario: resharing by public link of a sub-folder in a received shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file with content "some content" to "/simple-folder/sub-folder/randomfile.txt"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder/sub-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "randomfile.txt" should be listed on the webUI


  Scenario: resharing by public link of a file in a received shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "some content" to "/simple-folder/randomfile.txt"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for file "simple-folder/randomfile.txt" using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "some content"


  Scenario: user reshares a public link of a received share via email
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: user reshares a public link of a file in a received shared folder via email
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "some content" to "/simple-folder/randomfile.txt"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for file "simple-folder/randomfile.txt" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared randomfile.txt with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: user reshares a public link of a received shared file via email
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has shared file "/randomfile.txt" with user "Brian" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for file "randomfile.txt" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared randomfile.txt with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: user reshares a public link of a received shared folder via email with multiple addresses
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co, goo@barr.co |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared simple-folder with you
      """
    And the email address "goo@barr.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address "goo@barr.co" should have received an email containing the last shared public link


  Scenario: user reshares a public link of a received shared folder via email with a personal message
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has shared folder "/simple-folder" with user "Brian" with permissions "share,read"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email           | foo@bar.co  |
      | personalMessage | lorem ipsum |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
      """
      %displayname% shared simple-folder with you
      """
    And the email address "foo@bar.co" should have received an email with the body containing
      """
      lorem ipsum
      """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
