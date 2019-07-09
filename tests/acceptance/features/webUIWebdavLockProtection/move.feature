@webUI @insulated @disablePreviews @skipOnOcV10.0
Feature: Locks
  As a user
  I would like to be able to use locks control moving and renaming of files and folders
  So that I can prevent files and folders being changed while they are being used by another user

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created without skeleton files:
      | username       |
      | brand-new-user |

  Scenario Outline: moving a locked file
    Given user "brand-new-user" has created folder "/simple-empty-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    When the user moves file "lorem.txt" into folder "simple-empty-folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
    And as "brand-new-user" file "lorem.txt" should exist
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: moving a file trying to overwrite a locked file
    Given user "brand-new-user" has created folder "/simple-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "brand-new-user" has locked file "/simple-folder/lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    When the user moves file "lorem.txt" into folder "simple-folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
    And as "brand-new-user" file "lorem.txt" should exist
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should not be marked as locked on the webUI
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: moving a file into a locked folder
    Given user "brand-new-user" has created folder "/simple-empty-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "brand-new-user" has locked file "/simple-empty-folder" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    When the user moves file "lorem.txt" into folder "simple-empty-folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
    And as "brand-new-user" file "/simple-empty-folder/lorem.txt" should not exist
    And as "brand-new-user" file "lorem.txt" should exist
    And file "lorem.txt" should be listed on the webUI
    And 0 locks should be reported for file "/simple-empty-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: renaming of a locked file
    Given user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/lorem.txt"
    And user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    When the user renames file "lorem.txt" to "a-renamed-file.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and can not be renamed. |
    And as "brand-new-user" file "lorem.txt" should exist
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: renaming a file in a public share of a locked folder
    Given user "brand-new-user" has created folder "/simple-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user renames file "lorem.txt" to "a-renamed-file.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and can not be renamed. |
    And as "brand-new-user" file "simple-folder/lorem.txt" should exist
    And as "brand-new-user" file "simple-folder/a-renamed-file.txt" should not exist
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: moving a locked file into an other folder in a public share
    Given user "brand-new-user" has created folder "/simple-folder"
    And user "brand-new-user" has created folder "/simple-folder/simple-empty-folder"
    And user "brand-new-user" has uploaded file "filesForUpload/lorem.txt" to "/simple-folder/lorem.txt"
    And user "brand-new-user" has locked file "simple-folder/lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has logged in using the webUI
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user moves file "lorem.txt" into folder "simple-empty-folder" using the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
    And as "brand-new-user" file "simple-folder/lorem.txt" should exist
    And as "brand-new-user" file "simple-folder/simple-empty-folder/lorem.txt" should not exist
    And file "lorem.txt" should be listed on the webUI
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |
