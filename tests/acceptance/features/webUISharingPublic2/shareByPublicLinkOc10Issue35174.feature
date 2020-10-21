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

  @skipOnOcV10 @issue-35174
  Scenario: User renames folders with different path in Shared by link page
    Given user "Alice" has created folder "nf1"
    And user "Alice" has created folder "nf1/newfolder"
    And user "Alice" has created folder "test"
    And user "Alice" has created a public link share with settings
      | path | nf1/newfolder |
    And user "Alice" has created a public link share with settings
      | path | test |
    And user "Alice" has logged in using the webUI
    And the user has browsed to the shared-by-link page
    When the user renames folder "test" to "newfolder" using the webUI
    Then near folder "test" a tooltip with the text 'newfolder already exists' should be displayed on the webUI
      #Then the following folder should be listed on the webUI
        #| newfolder |
        #| newfolder |
