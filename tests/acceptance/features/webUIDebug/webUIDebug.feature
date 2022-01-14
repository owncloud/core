@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: File Upload

  As a user
  I would like to be able to upload files via the WebUI
  So that I can store files in ownCloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"


  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"

  @files_sharing-app-required
  Scenario: upload overwriting a file into a public share
    Given user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "Alice" has created a public link share with settings
      | path        | /simple-folder     |
      | permissions | read,update,create |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI and retries if the file is locked
    Then file "lorem.txt" should be listed on the webUI
    When user "Alice" logs in using the webUI
    And the content of "simple-folder/lorem.txt" should be the same as the local "lorem.txt"
