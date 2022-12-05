@webUI @insulated @disablePreviews @email @public_link_share-feature-required @files_sharing-app-required
Feature: Share a folder by public link
  As a user
  I want to share folders through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario: creating a public link with read & write permissions makes it possible to delete files via the link
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has created folder "simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file "filesForUpload/strängé filename (duplicate #2 &).txt" to "simple-folder/strängé filename (duplicate #2 &).txt"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/zzzz-must-be-last-file-in-folder.txt" to "simple-folder/zzzz-must-be-last-file-in-folder.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    And the public accesses the last created public link using the webUI
    And the user deletes the following elements using the webUI
      | name                                  |
      | simple-empty-folder                   |
      | lorem.txt                             |
      | strängé filename (duplicate #2 &).txt |
      | zzzz-must-be-last-file-in-folder.txt  |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload


  Scenario: creating a public link with read permissions only makes it impossible to delete files via the link
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read |
    And the public accesses the last created public link using the webUI
    Then it should not be possible to delete file "lorem.txt" using the webUI


  Scenario: user tries to create a public link with read only permission without entering share password while enforce password on read only public share is enforced
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    And parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated


  Scenario: user tries to create a public link with read-write permission without entering share password while enforce password on read-write public share is enforced
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    And parameter "shareapi_enforce_links_password_read_write_delete" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated


  Scenario: user tries to create a public link with write only permission without entering share password while enforce password on write only public share is enforced
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has logged in using the webUI
    And parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "yes"
    When the user tries to create a new public link for folder "simple-folder" using the webUI with
      | permission | upload |
    Then the user should see an error message on the public link share dialog saying "Passwords are enforced for link shares"
    And the public link should not have been generated


  Scenario: user creates a public link with read-write permission without entering share password while enforce password on read only public share is enforced
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the user creates a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI


  Scenario: user edits the permission of an already existing public link from read-write to read
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder |
      | name        | Public link    |
      | permissions | read,create    |
    And user "Alice" has logged in using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user changes the permission of the public link named "Public link" to "read"
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And it should not be possible to delete file "lorem.txt" using the webUI


  Scenario: user edits the permission of an already existing public link from read to read-write
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has created folder "/simple-folder/simple-empty-folder"
    And user "Alice" has uploaded file with content "original content" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder |
      | name        | Public link    |
      | permissions | read           |
    And user "Alice" has logged in using the webUI
    And the user opens the share dialog for folder "simple-folder"
    And the user has opened the public link share tab
    When the user changes the permission of the public link named "Public link" to "read-write-folder"
    And the public accesses the last created public link using the webUI
    And the user deletes the following elements using the webUI
      | name                |
      | simple-empty-folder |
      | lorem.txt           |
    Then the deleted elements should not be listed on the webUI
    And the deleted elements should not be listed on the webUI after a page reload


  Scenario: Permissions work correctly on public link share with upload-write-without-modify
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | upload-write-without-modify |
    When the public accesses the last created public link using the webUI
    Then the option to rename file "lorem.txt" should not be available on the webUI
    And the option to delete file "lorem.txt" should not be available on the webUI
    And the option to upload file should be available on the webUI


  Scenario: Permissions work correctly on public link share with read-write
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    When the public accesses the last created public link using the webUI
    Then the option to rename file "lorem.txt" should be available on the webUI
    And the option to delete file "lorem.txt" should be available on the webUI
    And the option to upload file should be available on the webUI


  Scenario: User tries to upload existing file in public link share with permissions upload-write-without-modify
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | upload-write-without-modify |
    When the public accesses the last created public link using the webUI
    And the user uploads file "lorem.txt" using the webUI
    Then a notification should be displayed on the webUI with the text "The file lorem.txt already exists"
    And file "lorem.txt" should be listed on the webUI
    And file "lorem (2).txt" should not be listed on the webUI


  Scenario: User tries to upload existing file in public link share with permissions read-write
    Given user "Alice" has created folder "simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    When the public accesses the last created public link using the webUI
    And the user uploads file "lorem.txt" keeping both new and existing files using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And file "lorem (2).txt" should be listed on the webUI


  Scenario: Editing the permission on a existing share from read-write to upload-write-without-modify works correctly
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "/simple-folder/lorem-big.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write-folder |
    When the public accesses the last created public link using the webUI
    Then it should be possible to delete file "lorem.txt" using the webUI
    When the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user opens the public link share tab
    And the user changes the permission of the public link named "Public link" to "upload-write-without-modify"
    And the public accesses the last created public link using the webUI
    Then the option to delete file "lorem-big.txt" should not be available on the webUI


  Scenario: Editing the permission on a existing share from upload-write-without-modify to read-write works correctly
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has uploaded file "filesForUpload/lorem-big.txt" to "/simple-folder/lorem-big.txt"
    And user "Alice" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | upload-write-without-modify |
    When the public accesses the last created public link using the webUI
    Then the option to delete file "lorem.txt" should not be available on the webUI
    When the user browses to the files page
    And the user opens the share dialog for folder "simple-folder"
    And the user opens the public link share tab
    And the user changes the permission of the public link named "Public link" to "read-write-folder"
    And the public accesses the last created public link using the webUI
    Then it should be possible to delete file "lorem-big.txt" using the webUI
