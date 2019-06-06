@webUI @insulated @disablePreviews @skipOnOcV10.0
Feature: Unlock locked files and folders
  As a user
  I would like to be able to unlock files and folders
  So that I can access files with locks that have not been cleared

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created with skeleton files:
      | username       |
      | brand-new-user |
    And user "brand-new-user" has logged in using the webUI

  Scenario: unlocking by webDAV deletes the lock symbols at the correct files/folders
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    When user "brand-new-user" unlocks the last created lock of folder "simple-folder" using the WebDAV API
    And the user browses to the files page
    Then folder "simple-folder" should not be marked as locked on the webUI

  Scenario: unlocking by webDAV after the display name has been changed deletes the lock symbols at the correct files/folders
    Given these users have been created with skeleton files:
      | username               | displayname   |
      | user-with-display-name | My fancy name |
    Given user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And the administrator has changed the display name of user "user-with-display-name" to "An ordinary name"
    When user "user-with-display-name" unlocks the last created lock of folder "simple-folder" using the WebDAV API
    And the user browses to the files page
    Then folder "simple-folder" should not be marked as locked on the webUI

  Scenario Outline: deleting the only remaining lock of a file/folder
    Given user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of folder "simple-folder" on the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a file/folder and reloading the page
    Given user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | exclusive |
    And user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | exclusive |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of folder "simple-folder" on the webUI
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a folder by deleting it from a file in folder
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has opened folder "simple-folder" using the webUI
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "simple-empty-folder" should not be marked as locked on the webUI
    When the user browses to the files page
    Then folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder/simple-empty-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a folder by deleting it from a file in folder and reloading the page
    Given user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has opened folder "simple-folder" using the webUI
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    And the user reloads the current page of the webUI
    Then file "lorem.txt" should not be marked as locked on the webUI
    And folder "simple-empty-folder" should not be marked as locked on the webUI
    When the user browses to the files page
    Then folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for folder "simple-folder/simple-empty-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  @skipOnFIREFOX
  Scenario: deleting the first one of multiple shared locks on the webUI
    Given these users have been created with skeleton files:
      | username  |
      | receiver1 |
      | receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "receiver1" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    Then file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver2" by the WebDAV API
    When the user unlocks the lock no 1 of folder "FOLDER_TO_SHARE" on the webUI
    Then folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver2" by the WebDAV API

  @skipOnFIREFOX
  Scenario: deleting the second one of multiple shared locks on the webUI
    Given these users have been created with skeleton files:
      | username  |
      | receiver1 |
      | receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And user "receiver1" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And the user has browsed to the files page
    When the user unlocks the lock no 2 of file "lorem.txt" on the webUI
    Then file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver2" by the WebDAV API
    When the user unlocks the lock no 2 of folder "FOLDER_TO_SHARE" on the webUI
    Then folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver2" by the WebDAV API

  @skipOnFIREFOX
  Scenario: deleting the last one of multiple shared locks on the webUI
    Given these users have been created with skeleton files:
      | username  |
      | receiver1 |
      | receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And user "receiver1" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked file "lorem (2).txt" setting following properties
      | lockscope | shared |
    And user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | shared |
    And user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
      | lockscope | shared |
    And the user has browsed to the files page
    When the user unlocks the lock no 3 of file "lorem.txt" on the webUI
    Then file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for file "lorem (2).txt" of user "receiver2" by the WebDAV API
    When the user unlocks the lock no 3 of folder "FOLDER_TO_SHARE" on the webUI
    Then folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver1" by the WebDAV API
    And 2 locks should be reported for folder "FOLDER_TO_SHARE" of user "receiver2" by the WebDAV API

  Scenario Outline: deleting a lock that was created by an other user
    Given these users have been created with skeleton files:
      | username  |
      | receiver1 |
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "receiver1" has locked file "lorem (2).txt" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of file "lorem.txt" on the webUI
    Then notifications should be displayed on the webUI with the text
      | Could not unlock, please contact the lock owner receiver1 |
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 1 locks should be reported for file "lorem (2).txt" of user "receiver1" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting a locked file
    Given user "brand-new-user" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user deletes file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and cannot be deleted. |
    And as "brand-new-user" file "lorem.txt" should exist
    And file "lorem.txt" should be listed on the webUI
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

