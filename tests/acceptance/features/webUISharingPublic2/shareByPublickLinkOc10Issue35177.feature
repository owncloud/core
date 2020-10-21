@webUI @notToImplementOnOCIS @insulated @disablePreviews @mailhog @public_link_share-feature-required @files_sharing-app-required
Feature: Share by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  As an admin
  I want to limit the ability of a user to share files/folders through a publicly accessible link
  So that public sharing is limited according to organization policy

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @issue-35177
  Scenario: User renames a subfolder among subfolders with same names which are shared by public links
    Given user "Alice" has created folder "nf1"
    And user "Alice" has created folder "nf1/newfolder"
    And user "Alice" has created folder "nf2"
    And user "Alice" has created folder "nf2/newfolder"
    And user "Alice" has created folder "test"
    And user "Alice" has created folder "test/test"
    And user "Alice" has created a public link share with settings
      | path | nf1/newfolder |
    And user "Alice" has created a public link share with settings
      | path | nf2/newfolder |
    And user "Alice" has created a public link share with settings
      | path | test/test |
    And user "Alice" has logged in using the webUI
    And the user has browsed to the shared-by-link page
    When the user renames folder "newfolder" to "newfolder1" using the webUI
    Then folder "newfolder1" should be listed on the webUI
    And folder "newfolder" should not be listed on the webUI
    #And folder "newfolder" should be listed on the webUI
    And folder "test" should be listed on the webUI
