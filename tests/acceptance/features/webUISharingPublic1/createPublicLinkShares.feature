@webUI @insulated @disablePreviews @email @public_link_share-feature-required @files_sharing-app-required
Feature: Share by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario: simple sharing by public link
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: public should be able to access a public link with correct password
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    And the public accesses the last created public link with password "pass123" using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: public should not be able to access a public link with wrong password
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | password | pass123 |
    And the public tries to access the last created public link with wrong password "pass12" using the webUI
    Then the public should not get access to the publicly shared file


  Scenario: user shares a public link with folder longer than 64 chars and shorter link name
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has moved folder "simple-folder" to "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "aquickbrownfoxjumpsoveraverylazydogaquickbrownfoxjumpsoveralazydog" using the webUI with
      | name | short_linkname |
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: public should be able to access the shared file through public link
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file 'lorem.txt' using the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "Sed ut perspiciatis"
    And the content of the file shared by the last public link should be the same as "lorem.txt"


  Scenario: user shares a public link via email
    Given user "Alice" has created folder "/simple-folder"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: user shares a public link via email and sends a copy to self
    Given user "Alice" has created folder "/simple-folder"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email       | foo@bar.co |
      | emailToSelf | true       |
    Then the email address "foo@bar.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address of user "Alice" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address of user "Alice" should have received an email containing the last shared public link


  Scenario: user shares a public link via email with multiple addresses
    Given user "Alice" has created folder "/simple-folder"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co, goo@barr.co |
    Then the email address "foo@bar.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "goo@barr.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo@bar.co" should have received an email containing the last shared public link
    And the email address "goo@barr.co" should have received an email containing the last shared public link


  Scenario: user shares a public link via email with a personal message
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email           | foo@bar.co  |
      | personalMessage | lorem ipsum |
    Then the email address "foo@bar.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo@bar.co" should have received an email with the body containing
    """
    lorem ipsum
    """
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: user shares a public link via email adding few addresses before and then removing some addresses afterwards
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
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
    Then the email address "foo5678@bar.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo1234@barr.co" should have received an email from user "Alice" with the body containing
    """
    %displayname% shared simple-folder with you
    """
    And the email address "foo5678@bar.co" should have received an email containing the last shared public link
    And the email address "foo1234@barr.co" should have received an email containing the last shared public link
    But the email address "foo1234@bar.co" should not have received an email
    And the email address "foo5678@barr.co" should not have received an email


  Scenario: user shares a file through public link and then it appears in a Shared by link page
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a public link share of file "/simple-folder"
    And user "Alice" has logged in using the webUI
    When the user browses to the shared-by-link page
    Then folder "simple-folder" should be listed on the webUI


  Scenario: user creates a multiple public link of a file and delete the first link
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | first-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt  |
      | name | second-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | third-link |
    And user "Alice" has logged in using the webUI
    When the user removes the public link at position 1 of file "lorem.txt" using the webUI
    Then the public link with name "first-link" should not be in the public links list
    And the number of public links should be 2


  Scenario: user creates a multiple public link of a file and delete the second link
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | first-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt  |
      | name | second-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | third-link |
    And user "Alice" has logged in using the webUI
    When the user removes the public link at position 2 of file "lorem.txt" using the webUI
    Then the public link with name "second-link" should not be in the public links list
    And the number of public links should be 2


  Scenario: user creates a multiple public link of a file and delete the third link
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | first-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt  |
      | name | second-link |
    And user "Alice" has created a public link share with settings
      | path | /lorem.txt |
      | name | third-link |
    And user "Alice" has logged in using the webUI
    When the user removes the public link at position 3 of file "lorem.txt" using the webUI
    Then the public link with name "third-link" should not be in the public links list
    And the number of public links should be 2


  Scenario: user creates public link with view and upload feature
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | upload-write-without-modify |
    And the public accesses the last created public link using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI


  Scenario: user creates public link with view download and upload feature and uploads same file name and verifies no auto-renamed file seen in UI
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | upload-write-without-modify |
    When the public accesses the last created public link using the webUI
    And the user uploads file "lorem.txt" 5 times using webUI
    Then notifications should be displayed on the webUI with the text
      | The file lorem.txt already exists |
      | The file lorem.txt already exists |
      | The file lorem.txt already exists |
      | The file lorem.txt already exists |
      | The file lorem.txt already exists |
    And file "lorem.txt" should be listed on the webUI
    And the content of file "simple-folder/lorem.txt" should be "original content"
    And file "lorem (2).txt" should not be listed on the webUI


  Scenario: user creates a new public link using webUI without setting expiration date when default expire date is set but not enforced
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "no"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI with
      | expiration |  |
    And user "Alice" gets the info of the last public link share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration |  |


  Scenario: user creates a new public link using webUI removing expiration date when default expire date is set and enforced
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user tries to create a new public link for file "lorem.txt" using the webUI
      | expiration |  |
    Then the user should see an error message on the public link popup saying "Expiration date is required"


  Scenario: user creates a new public link using webUI when default expire date is set and enforced
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI
    And user "Alice" gets the info of the last public link share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | +7 days |


  Scenario: user creates a new public link and the public checks its content
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When the public downloads file "lorem.txt" using the webUI
    Then the downloaded content should be "original content"


  Scenario: user creates a new public link for a file and the public checks all the download links for the file
    Given user "Alice" has uploaded file with content "original content" to "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    Then the text preview of the public link should contain "original content"
    And all the links to download the public share should be the same


  Scenario Outline: user with unusual username performs simple sharing by public link
    Given user "<username>" has been created with default attributes and without skeleton files
    And user "<username>" has created folder "/simple-folder"
    And user "<username>" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "<username>" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI
    Examples:
      | username |
      | user-1   |
      | null     |
      | nil      |
      | 123      |
      | -123     |
      | 0.0      |


  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: read only public link quick action does not work when disabled
    Given the administrator has "disabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should not be displayed for folder "simple-folder" on the webUI


  Scenario: quick action is not displayed when password is enforced in read only link
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    And the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should not be displayed for folder "simple-folder" on the webUI


  Scenario: no new public quick link is created for a resource with already a public quick link
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And the user has created a read only public link for folder "simple-folder" using the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    Then the number of public links should be 1


  Scenario: no new public quick link is created for a resource with already a public quick link (after a login)
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a read only public link for folder "simple-folder"
    And user "Alice" has logged in using the webUI
    And the user browses to the files page
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    Then the number of public links should be 1
