@webUI @insulated @disablePreviews @mailhog @public_link_share-feature-required @files_sharing-app-required
Feature: Share a file by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario: creating a public link of a file with read permissions
    Given user "Alice" has uploaded file with content "text to test public links" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI with
      | permission | read |
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "text to test public links"
    And the public should be able to download the last publicly shared file using the old public WebDAV API without a password and the content should be "text to test public links"
    And the public should be able to download the last publicly shared file using the new public WebDAV API without a password and the content should be "text to test public links"
    And uploading content to a public link shared file should not work using the old public WebDAV API
    And uploading content to a public link shared file should not work using the new public WebDAV API

  @skipOnOcV10.9 @skipOnOcV10.10
  Scenario: creating a public link with read & write permissions
    Given user "Alice" has uploaded file with content "text to test public links" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI with
      | permission | read-write-file |
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "text to test public links"
    And the public should be able to download the last publicly shared file using the old public WebDAV API without a password and the content should be "text to test public links"
    And the public should be able to download the last publicly shared file using the new public WebDAV API without a password and the content should be "text to test public links"
    And uploading content to a public link shared file should work using the old public WebDAV API
    And uploading content to a public link shared file should work using the new public WebDAV API
