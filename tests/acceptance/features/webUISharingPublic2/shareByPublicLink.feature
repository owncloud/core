@webUI @insulated @disablePreviews @email @public_link_share-feature-required @files_sharing-app-required
Feature: Share by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  As an admin
  I want to limit the ability of a user to share files/folders through a publicly accessible link
  So that public sharing is limited according to organization policy

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
  Scenario: mount public link of a folder
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    And the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "simple-folder" should be listed on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "simple-folder/lorem.txt" for user "Brian" on server "REMOTE" should be "original content"
    And it should not be possible to delete file "lorem.txt" using the webUI
    And using server "REMOTE"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/file-in-my-own-storage.txt"
    But user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "/simple-folder/new-file-in-read-only-public-link.txt"

  @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
  Scenario: mount public link of a file
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has uploaded file with content "text in a file shared by public link" to "/file-shared-by-public-link.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "file-shared-by-public-link.txt" using the webUI
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    And the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then file "file-shared-by-public-link.txt" should be listed on the webUI
    And the content of file "file-shared-by-public-link.txt" for user "Brian" on server "REMOTE" should be "text in a file shared by public link"
    And using server "REMOTE"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/file-in-my-own-storage.txt"
    But user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "/file-shared-by-public-link.txt"

  @skipOnINTERNETEXPLORER @skipOnMICROSOFTEDGE @issue-30392
  Scenario: mount public link and overwrite file
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    And the user logs out of the webUI
    And the public accesses the last created public link using the webUI
    And the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "simple-folder" should be listed on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "simple-folder/lorem.txt" for user "Brian" on server "REMOTE" should be "original content"
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" on the remote server should be the same as the local "lorem.txt"


  Scenario: user edits a public link and does not save the changes
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a public link share with settings
      | path     | /simple-folder |
      | name     | Public link    |
      | password | pass123        |
    And user "Alice" has logged in using the webUI
    And the user has opened the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user opens the edit public link share popup for the link named "Public link"
    And the user enters the password "qwertyui" on the edit public link share popup for the link
    And the user does not save any changes in the edit public link share popup
    And the public tries to access the last created public link with wrong password "qwertyui" using the webUI
    Then the public should not get access to the publicly shared file


  Scenario: user edits a name of an already existing public link
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
      | name | Public link    |
    And user "Alice" has logged in using the webUI
    And the user has opened the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user renames the public link name from "Public link" to "simple-folder Share"
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: user edits the password of an already existing public link
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path     | /simple-folder |
      | name     | Public link    |
      | password | pass123        |
    And user "Alice" has logged in using the webUI
    And the user has opened the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user changes the password of the public link named "Public link" to "pass1234"
    And the public accesses the last created public link with password "pass1234" using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: user edits the password of an already existing public link and tries to access with old password
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a public link share with settings
      | path     | /simple-folder |
      | name     | Public link    |
      | password | pass123        |
    And user "Alice" has logged in using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user changes the password of the public link named "Public link" to "pass1234"
    And the public tries to access the last created public link with wrong password "pass123" using the webUI
    Then the public should not get access to the publicly shared file


  Scenario: user changes the expiration date of an already existing public link using webUI
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a share with settings
      | path       | lorem.txt   |
      | name       | Public link |
      | expireDate | 14-10-2038  |
      | shareType  | public_link |
    And user "Alice" has logged in using the webUI
    When the user changes the expiration of the public link named "Public link" of file "lorem.txt" to "21-07-2038"
    And the user gets the info of the last public link share using the sharing API
    Then the fields of the last response to user "Alice" should include
      | expiration | 21-07-2038 |


  Scenario: user tries to change the expiration date of the public link to past date using webUI
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a share with settings
      | path       | lorem.txt   |
      | name       | Public link |
      | expireDate | 14-10-2038  |
      | shareType  | public_link |
    And user "Alice" has logged in using the webUI
    When the user changes the expiration of the public link named "Public link" of file "lorem.txt" to "14-09-2017"
    And the user gets the info of the last public link share using the sharing API
    Then the user should see an error message on the public link share dialog saying "Expiration date is in the past"
    And the fields of the last response to user "Alice" should include
      | expiration | 14-10-2038 |


  Scenario: share two files with the same name but different paths by public link
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for file "lorem.txt" using the webUI
    And the user closes the details dialog
    And the user creates a new public link for file "simple-folder/lorem.txt" using the webUI
    And the user browses to the shared-by-link page
    Then file "lorem.txt" with path "" should be listed in the shared with others page on the webUI
    And file "lorem.txt" with path "/simple-folder" should be listed in the shared with others page on the webUI


  Scenario: user removes the public link of a file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a public link share of file "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user removes the public link of file "lorem.txt" using the webUI
    Then the public should see an error message "File not found" while accessing last created public link using the webUI


  Scenario: user cancel removes operation for the public link of a file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a public link share of file "/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user tries to remove the public link of file "lorem.txt" but later cancels the remove dialog using webUI
    And the public accesses the last created public link using the webUI
    Then the content of the file shared by the last public link should be the same as "lorem.txt"


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
    And folder "newfolder" should be listed on the webUI
    And folder "test" should be listed on the webUI


  Scenario: User renames folders with different path in Shared by link page
    Given user "Alice" has created folder "nf1"
    And user "Alice" has created folder "nf1/test"
    And user "Alice" has created folder "newfolder"
    And user "Alice" has created a public link share with settings
      | path | nf1/test |
    And user "Alice" has created a public link share with settings
      | path | newfolder |
    And user "Alice" has logged in using the webUI
    And the user has browsed to the shared-by-link page
    When the user renames folder "test" to "newfolder" using the webUI
    Then folder "newfolder" with path "nf1/newfolder" should be listed on the webUI


  Scenario: user tries to deletes the expiration date of already existing public link using webUI when expiration date is enforced
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a share with settings
      | path       | lorem.txt   |
      | name       | Public link |
      | expireDate | + 5 days    |
      | shareType  | public_link |
    And user "Alice" has logged in using the webUI
    And the user changes the expiration of the public link named "Public link" of file "lorem.txt" to " "
    Then the user should see an error message on the public link popup saying "Expiration date is required"
    And the user gets the info of the last public link share using the sharing API
    And the fields of the last response to user "Alice" should include
      | expiration | + 5 days |


  Scenario: user deletes the expiration date of already existing public link using webUI when expiration date is set but not enforced
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "Alice" has created a share with settings
      | path       | lorem.txt   |
      | name       | Public link |
      | expireDate | + 5 days    |
      | shareType  | public_link |
    And user "Alice" has logged in using the webUI
    And the user changes the expiration of the public link named "Public link" of file "lorem.txt" to " "
    And the user gets the info of the last public link share using the sharing API
    And the fields of the last response to user "Alice" should include
      | expiration |  |

  @email
  Scenario: user without email shares a public link via email
    Given these users have been created without skeleton files:
      | username | password |
      | Brian    | 1234     |
    And user "Brian" has created folder "/simple-folder"
    And parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    And user "Brian" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | email | foo@bar.co |
    Then the email address "foo@bar.co" should have received an email from user "Brian" with the body containing
			"""
			%displayname% shared simple-folder with you
			"""
    And the email address "foo@bar.co" should have received an email containing the last shared public link


  Scenario: sharing indicator inside a shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder   |
      | textfile.txt |


  Scenario: sharing indicator for file uploaded inside a shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user uploads file "new-lorem.txt" using the webUI
    Then the following resources should have share indicators on the webUI
      | new-lorem.txt |


  Scenario: sharing indicator for folder created inside a shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then the following resources should have share indicators on the webUI
      | sub-folder |


  Scenario: sharing details of items inside a shared folder
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
      | name | Public Link    |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for folder "sub-folder"
    And the user opens the public link share tab
    Then public link "Public Link" should be listed as share receiver via "simple-folder" on the webUI


  Scenario: sharing details of multiple public link shares with different link names
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/sub-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/sub-folder/textfile.txt"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
      | name | Public Link    |
    And user "Alice" has created a public link share with settings
      | path | /simple-folder/sub-folder      |
      | name | strängé लिंक नाम (#2 &).नेपाली |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for folder "sub-folder"
    And the user opens the public link share tab
    Then public link "Public Link" should be listed as share receiver via "simple-folder" on the webUI
    When the user opens folder "sub-folder" using the webUI
    And the user opens the share dialog for file "textfile.txt"
    And the user opens the public link share tab
    Then public link "strängé लिंक नाम (#2 &).नेपाली" should be listed as share receiver via "sub-folder" on the webUI
    And public link "Public Link" should be listed as share receiver via "simple-folder" on the webUI


  Scenario: sharing detail of items on the webUI shared by public links with empty name
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/simple-folder/textfile.txt"
    And user "Alice" has created a public link share with settings
      | path | /simple-folder |
    And user "Alice" has logged in using the webUI
    When the user opens folder "simple-folder" using the webUI
    And the user opens the share dialog for file "textfile.txt"
    And the user opens the public link share tab
    Then public link with last share token should be listed as share receiver via "simple-folder" on the webUI


  Scenario: add to your owncloud button is present
    Given user "Alice" has created folder "/simple-folder"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "yes"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read |
    And the public accesses the last created public link using the webUI
    Then add to your owncloud button should be displayed on the webUI


  Scenario: add to your owncloud button is not present
    Given user "Alice" has created folder "/simple-folder"
    And parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read |
    And the public accesses the last created public link using the webUI
    Then add to your owncloud button should not be displayed on the webUI
