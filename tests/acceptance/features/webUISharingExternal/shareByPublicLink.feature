@webUI @insulated @disablePreviews @mailhog @public_link_share-feature-required
Feature: Share by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  As an admin
  I want to limit the ability of a user to share files/folders through a publicly accessible link
  So that public sharing is limited according to organization policy

  Background:
    Given user "user1" has been created
    And user "user1" has logged in using the webUI

  @smokeTest
  Scenario: simple sharing by public link
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
  Scenario: creating a public link with read & write permissions makes it possible to delete files via the link
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    And the public accesses the last created public link using the webUI
    And the user deletes the following elements using the webUI
      | name                                  |
      | simple-empty-folder                   |
      | lorem.txt                             |
      | strängé filename (duplicate #2 &).txt |
      | zzzz-must-be-last-file-in-folder.txt  |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload

  @skipOnOcV10.0.3 @feature_was_changed_in_10.0.4
  Scenario: creating a public link with read permissions only makes it impossible to delete files via the link
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read |
    And the public accesses the last created public link using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
  Scenario: mount public link
    Given using server "REMOTE"
    And user "user2" has been created
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    And the public adds the public link to "%remote_server%" as user "user2" with password "%alt2%" using the webUI
    And the user accepts the offered remote shares using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
    When the user opens folder "simple-folder (2)" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the remote server should be the same as the original "simple-folder/lorem.txt"
    And it should not be possible to delete file "lorem.txt" using the webUI

  @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
  Scenario: mount public link and overwrite file
    Given using server "REMOTE"
    And user "user2" has been created
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    And the public adds the public link to "%remote_server%" as user "user2" with password "%alt2%" using the webUI
    And the user accepts the offered remote shares using the webUI
    Then folder "simple-folder (2)" should be listed on the webUI
    When the user opens folder "simple-folder (2)" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the remote server should be the same as the original "simple-folder/lorem.txt"
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the remote server should be the same as the local "lorem.txt"

  Scenario: public should be able to access a public link with correct password
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    And the public accesses the last created public link with password "pass123" using the webUI
    Then file "lorem.txt" should be listed on the webUI

  Scenario: public should not be able to access a public link with wrong password
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    And the public tries to access the last created public link with wrong password "pass12" using the webUI
    Then the public should not get access to the publicly shared file

  Scenario: user tries to create a public link with name longer than 64 chars
    Given user "user1" has moved file "/lorem.txt" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And the user has reloaded the current page of the webUI
    When the user tries to create a new public link for file "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" using the webUI
    Then the user should see an error message on the public link share dialog saying "Share name cannot be more than 64 characters"
    And the public link should not have been generated

  Scenario: user shares a public link with folder longer than 64 chars and shorter link name
    Given user "user1" has moved folder "simple-folder" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" using the webUI with
      | name | short_linkname |
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  Scenario: user tries to create a public link with read only permission without entering share password while enforce password on read only public share is enforced
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated

  Scenario: user tries to create a public link with read-write permission without entering share password while enforce password on read-write public share is enforced
    Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated

  Scenario: user tries to create a public link with write only permission without entering share password while enforce password on write only public share is enforced
    Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI with
      | permission | upload |
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated

  Scenario: user creates a public link with read-write permission without entering share password while enforce password on read only public share is enforced
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  Scenario: public should be able to access the shared file through public link
    When the user creates a new public link for file 'lorem.txt' using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "Lorem ipsum dolor sit amet, consectetur"
    And the content of the file shared by the last public link should be the same as "lorem.txt"

  Scenario: user shares a public link via email
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  Scenario: user shares a public link via email and sends a copy to self
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email       | foo@bar.co |
      | emailToSelf | true       |
    Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "user1@example.org" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address "user1@example.org" should have received an email containing the last shared public link

  Scenario: user shares a public link via email with multiple addresses
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co, foo@barr.co |
    Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@barr.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address "foo@barr.co" should have received an email containing the last shared public link

  Scenario: user shares a public link via email with a personal message
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email           | foo@bar.co  |
      | personalMessage | lorem ipsum |
    Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email with the body containing
			"""
			lorem ipsum
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  Scenario: user shares a public link via email adding few addresses before and then removing some addresses afterwards
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user opens the share dialog for folder "simple-folder"
    And the user opens the public link share tab
    And the user opens the create public link share popup
    And the user adds the following email addresses using the webUI:
      | email           |
      | foo1234@bar.co  |
      | foo5678@bar.co  |
      | foo1234@barr.co |
      | foo5678@barr.co |
    And the user removes the following email addresses using the webUI:
      | email           |
      | foo1234@bar.co  |
      | foo5678@barr.co |
    And the user creates the public link using the webUI
    Then the email address "foo5678@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo1234@barr.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo5678@bar.co" should have received an email containing the last shared public link
    And the email address "foo1234@barr.co" should have received an email containing the last shared public link
    But the email address "foo1234@bar.co" should not have received an email
    And the email address "foo5678@barr.co" should not have received an email

  Scenario: user edits a public link and does not save the changes
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | email   | foo1234@bar.co|
      | password| pass123       |
    When the user opens the edit public link share popup for the link named "simple-folder link"
    And the user enters the password "qwertyui" on the edit public link share popup for the link
    And the user does not save any changes in the edit public link share popup
    And the public tries to access the last created public link with wrong password "qwertyui" using the webUI
    Then the public should not get access to the publicly shared file

  Scenario: user shares a public link via email with a personal message
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email           | foo@bar.co  |
      | personalMessage | lorem ipsum |
    Then the email address "foo@bar.co" should have received an email with the body containing
			"""
			User One shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email with the body containing
			"""
			lorem ipsum
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link

  Scenario: user edits a name of an already existing public link
    Given the user has created a new public link for folder "simple-folder" using the webUI
    And the user has opened the public link share tab
    When the user renames the public link name from "simple-folder link" to "simple-folder Share"
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  Scenario: user shares a file through public link and then it appears in a Shared by link page
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And the user has reloaded the current page of the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI
    When the user browses to the shared-by-link page
    Then folder "simple-folder" should be listed on the webUI

  Scenario: user edits the password of an already existing public link
    Given the user has created a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    When the user changes the password of the public link named "simple-folder link" to "pass1234"
    And the public accesses the last created public link with password "pass1234" using the webUI
    Then file "lorem.txt" should be listed on the webUI

  Scenario: user edits the password of an already existing public link and tries to access with old password
    Given the user has created a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    When the user changes the password of the public link named "simple-folder link" to "pass1234"
    And the public tries to access the last created public link with wrong password "pass123" using the webUI
    Then the public should not get access to the publicly shared file

  Scenario: user edits the permission of an already existing public link from read-write to read
    Given the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the user changes the permission of the public link named "simple-folder link" to "read"
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And it should not be possible to delete file "lorem.txt" using the webUI

  Scenario: user edits the permission of an already existing public link from read to read-write
    Given the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read |
    When the user changes the permission of the public link named "simple-folder link" to "read-write"
    And the public accesses the last created public link using the webUI
    And the user deletes the following elements using the webUI
      | name                                  |
      | simple-empty-folder                   |
      | lorem.txt                             |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload

  Scenario: share two file with same name but different paths by public link
    When the user creates a new public link for file "lorem.txt" using the webUI
    And the user closes the details dialog
    And the user opens folder "simple-folder" using the webUI
    And the user creates a new public link for file "lorem.txt" using the webUI
    And the user browses to the shared-by-link page
    Then file "lorem.txt" with path "" should be listed in the shared with others page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the shared with others page on the webUI
