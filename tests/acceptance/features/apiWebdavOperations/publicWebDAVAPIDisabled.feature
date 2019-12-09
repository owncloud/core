@api @TestAlsoOnExternalUserBackend
Feature: the new public WebDAV API is not available when the tech preview setting is disabled
  As an administrator
  I want to be able to disable the tech preview of the public WebDAV API
  So that I can control the availability of APIs that are tech previews

  Background:
    Given the administrator has disabled DAV tech_preview
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Public cannot download file using the public WebDAV API when it is disabled
    Given user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public downloads file "welcome.txt" from inside the last public shared folder using the new public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "PARENT/welcome.txt" should exist

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Public cannot delete file using the public WebDAV API when it is disabled
    Given user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public deletes file "welcome.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "PARENT/welcome.txt" should exist

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Public cannot rename file using the public WebDAV API when it is disabled
    Given user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the new public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "/PARENT/parent.txt" should exist
    And as "user0" file "/PARENT/newparent.txt" should not exist

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Public cannot upload file using the public WebDAV API when it is disabled
    Given user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public uploads file "lorem.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "/PARENT/lorem.txt" should not exist

  @public_link_share-feature-required @files_sharing-app-required
  Scenario: Public cannot upload file when the public WebDAV API is disabled
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public uploads file "lorem.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/lorem.txt" should exist
    When the administrator disables DAV tech_preview
    And the public uploads file "lorem-big.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "/PARENT/lorem-big.txt" should not exist
