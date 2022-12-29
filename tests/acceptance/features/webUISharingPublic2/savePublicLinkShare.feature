@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Save public shares created by oC users
  As a user
  I want to mount public link shares to my owncloud account
  So that I can easily access them from my account

  Background:
    Given using server "LOCAL"
    And user "Alice" has been created with default attributes and without skeleton files


  Scenario: mount public link share of a folder to local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "PARENT/lorem.txt" for user "Brian" should be "original content"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"
    But user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "/PARENT/textfile.txt"
    And user "Brian" should not be able to delete file "PARENT/lorem.txt"


  Scenario: mount public link share of a file to local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "original content" to "lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /lorem.txt |
      | permissions | read       |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "Brian" should be "original content"
    And user "Brian" should be able to upload file "filesForUpload/textfile.txt" to "/textfile.txt"
    But user "Brian" should not be able to upload file "filesForUpload/textfile.txt" to "lorem.txt"


  Scenario: mount public link share of a folder (all permissions set) to local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "PARENT/lorem.txt" for user "Brian" should be "original content"
    # upload a new file
    When the user uploads file "new-lorem.txt" using the webUI
    Then file "new-lorem.txt" should be listed on the webUI
    # overwrite an existing file
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"
    # delete a file
    When the user deletes file "lorem.txt" using the webUI
    Then file "lorem.txt" should not be listed on the webUI


  Scenario: mount public link share of a file (all permissions set) to local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "original content" to "lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /lorem.txt                |
      | permissions | read,update,create,delete |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "lorem.txt" for user "Brian" should be "original content"
    # overwrite an existing file
    When the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    And the content of "lorem.txt" should be the same as the local "lorem.txt"


  Scenario: mount public link share of a folder that exist in local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/PARENT"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT (2)" should be listed on the webUI
    When the user opens folder "PARENT (2)" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "PARENT (2)/lorem.txt" for user "Brian" should be "original content"


  Scenario: mount public link share of a file that already exists in local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has uploaded file with content "file in local server" to "lorem.txt"
    And user "Alice" has uploaded file with content "original content" to "lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /lorem.txt |
      | permissions | read       |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "lorem (2).txt" should be listed on the webUI
    And the content of file "lorem (2).txt" for user "Brian" should be "original content"


  Scenario: unshare mounted public link share in local server
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When the user browses to the files page
    And the user unshares folder "PARENT" using the webUI
    Then folder "PARENT" should not be listed on the webUI
    But as "Alice" folder "PARENT" should exist
    And as "Alice" file "PARENT/lorem.txt" should exist

  @skipOnOcV10 @issue-38763
  Scenario: mount public link share of a folder in local server and the sharer deletes the folder
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%local_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    And the user browses to the files page
    Then folder "PARENT" should not be listed on the webUI


  Scenario: mount public link share of a folder that already exists in remote server
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Brian" has created folder "/PARENT"
    And using server "LOCAL"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT (2)" should be listed on the webUI
    When the user opens folder "PARENT (2)" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    And the content of file "PARENT (2)/lorem.txt" for user "Brian" on server "REMOTE" should be "original content"


  Scenario: unshare mounted public link share in remote server
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user unshares folder "PARENT" using the webUI
    Then folder "PARENT" should not be listed on the webUI
    But as "Alice" folder "PARENT" should exist
    And as "Alice" file "PARENT/lorem.txt" should exist

  @skipOnOcV10 @issue-38763
  Scenario: mount public link share of a folder in remote server and the sharer deletes the folder
    Given using server "REMOTE"
    And user "Brian" has been created with default attributes and without skeleton files
    And using server "LOCAL"
    And user "Alice" has created folder "/PARENT"
    And user "Alice" has uploaded file with content "original content" to "/PARENT/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT |
      | permissions | read    |
    And the public has accessed the last created public link using the webUI
    When the public adds the public link to "%remote_server%" as user "Brian" using the webUI
    And the user accepts the offered federated shares using the webUI
    Then folder "PARENT" should be listed on the webUI
    When the user opens folder "PARENT" using the webUI
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" deletes folder "/PARENT" using the WebDAV API
    And the user selects the breadcrumb for folder "/"
    And the user reloads the current page of the webUI
    Then folder "PARENT" should not be listed on the webUI
