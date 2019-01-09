@webUI @insulated @disablePreviews
Feature: Locks
  As a user
  I would like to be able to delete locks of files and folders
  So that I can access files with locks that have not been cleared

  Background:
    #do not set email, see bugs in https://github.com/owncloud/core/pull/32250#issuecomment-434615887
    Given these users have been created:
      |username      |
      |brand-new-user|
    And user "brand-new-user" has logged in using the webUI

  Scenario: setting a lock shows the lock symbols at the correct files/folders
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user browses to the files page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  Scenario: setting a lock shows the display name of a user in the locking details
    Given these users have been created:
      |username              |displayname  |
      |user-with-display-name|My fancy name|
    Given the user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the display name of a user in the locking details (user has set email address)
    Given these users have been created:
      |username              |displayname  |email      |
      |user-with-display-name|My fancy name|mail@oc.org|
    Given the user "user-with-display-name" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "user-with-display-name" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-display-name" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "My fancy name (mail@oc.org)" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "My fancy name (mail@oc.org)" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the user name of a user in the locking details (user has set email address)
    Given these users have been created:
      |username        |email      |
      |user-with-email |mail@oc.org|
    Given the user "user-with-email" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "user-with-email" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user re-logs in with username "user-with-email" and password "%regular%" using the webUI
    And folder "simple-folder" should be marked as locked by user "user-with-email (mail@oc.org)" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "user-with-email (mail@oc.org)" in the locks tab of the details panel on the webUI

  Scenario: setting a lock shows the lock symbols at the correct files/folders on the favorites page
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user marks folder "simple-folder" as favorite using the webUI
    And the user marks folder "simple-empty-folder" as favorite using the webUI
    And the user marks file "data.zip" as favorite using the webUI
    And the user marks file "data.tar.gz" as favorite using the webUI
    And the user browses to the favorites page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  @skip @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-others page
    Given these users have been created:
      |username  |
      |receiver  |
    And the user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And user "brand-new-user" has shared file "data.zip" with user "receiver"
    And user "brand-new-user" has shared file "data.tar.gz" with user "receiver"
    And user "brand-new-user" has shared folder "simple-folder" with user "receiver"
    And user "brand-new-user" has shared folder "simple-empty-folder" with user "receiver"
    When the user browses to the shared-with-others page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  @skip @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-by-link page
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And user "brand-new-user" has created a public link share with settings
      | path | data.zip |
    And user "brand-new-user" has created a public link share with settings
      | path | data.tar.gz |
    And user "brand-new-user" has created a public link share with settings
      | path | simple-folder |
    And user "brand-new-user" has created a public link share with settings
      | path | simple-empty-folder |
    When the user browses to the shared-by-link page
    Then folder "simple-folder" should be marked as locked on the webUI
    And folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.tar.gz" should not be marked as locked on the webUI

  @skip @issue-33867
  Scenario: setting a lock shows the lock symbols at the correct files/folders on the shared-with-you page
    Given these users have been created:
      |username  |
      |sharer    |
    And the user "sharer" has locked folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "sharer" has locked file "data.zip" setting following properties
      | lockscope | exclusive |
    And user "sharer" has shared file "data.zip" with user "brand-new-user"
    And user "sharer" has shared file "data.tar.gz" with user "brand-new-user"
    And user "sharer" has shared folder "simple-folder" with user "brand-new-user"
    And user "sharer" has shared folder "simple-empty-folder" with user "brand-new-user"
    When the user browses to the shared-with-you page
    Then folder "simple-folder (2)" should be marked as locked on the webUI
    And folder "simple-folder (2)" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But folder "simple-empty-folder (2)" should not be marked as locked on the webUI
    And file "data (2).zip" should be marked as locked on the webUI
    And file "data (2).zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data (2).tar.gz" should not be marked as locked on the webUI

  Scenario: clicking other tabs does not change the lock symbol
    When the user opens the share dialog for folder "simple-folder"
    Then folder "simple-folder" should not be marked as locked on the webUI

  Scenario: lock set on a shared file shows the lock information for all involved users
    Given these users have been created:
      |username  |
      |sharer    |
      |receiver  |
      |receiver2 |
    And group "receiver-group" has been created
    And user "receiver2" has been added to group "receiver-group"
    And user "sharer" has shared file "data.zip" with user "receiver"
    And user "sharer" has shared file "data.tar.gz" with group "receiver-group"
    And user "receiver" has shared file "data (2).zip" with user "brand-new-user"
    And the user "sharer" has locked file "data.zip" setting following properties
      | lockscope | shared |
    And the user "receiver" has locked file "data (2).zip" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked file "data (2).zip" setting following properties
      | lockscope | shared |
    And the user "receiver2" has locked file "data.tar (2).gz" setting following properties
      | lockscope | shared |
    When the user browses to the files page
    Then file "data (2).zip" should be marked as locked on the webUI
    And file "data (2).zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And file "data (2).zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And file "data (2).zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But file "data.zip" should not be marked as locked on the webUI
    When the user re-logs in as "sharer" using the webUI
    Then file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And file "data.tar.gz" should be marked as locked on the webUI
    And file "data.tar.gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    When the user re-logs in as "receiver2" using the webUI
    Then file "data.tar (2).gz" should be marked as locked on the webUI
    And file "data.tar (2).gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI

  Scenario: setting a lock on a folder shows the symbols at the sub-elements
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
     | lockscope | shared |
    When the user opens folder "simple-folder" using the webUI
    Then folder "simple-empty-folder" should be marked as locked on the webUI
    And folder "simple-empty-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And file "data.zip" should be marked as locked on the webUI
    And file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI

  Scenario: setting a depth:0 lock on a folder does not shows the symbols at the sub-elements
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
     | depth | 0 |
    When the user browses to the files page
    Then folder "simple-folder" should be marked as locked on the webUI
    When the user opens folder "simple-folder" using the webUI
    Then folder "simple-empty-folder" should not be marked as locked on the webUI
    And file "data.zip" should not be marked as locked on the webUI

  Scenario: unlocking by webDAV deletes the lock symbols at the correct files/folders
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
     | lockscope | shared |
    When the user "brand-new-user" unlocks the last created lock of folder "simple-folder" using the WebDAV API
    And the user browses to the files page
    Then folder "simple-folder" should not be marked as locked on the webUI

  Scenario Outline: deleting the only remaining lock of a file/folder
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
    And the user "brand-new-user" has locked folder "simple-folder" setting following properties
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
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
     | lockscope | exclusive |
    And the user "brand-new-user" has locked folder "simple-folder" setting following properties
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
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
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
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
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

  Scenario: deleting the first one of multiple shared locks on the webUI
    Given these users have been created:
        |username  |
        |receiver1 |
        |receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | shared |
    And the user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "receiver1" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
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

  Scenario: deleting the second one of multiple shared locks on the webUI
    Given these users have been created:
        |username  |
        |receiver1 |
        |receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And the user "receiver1" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | shared |
    And the user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
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

  Scenario: deleting the last one of multiple shared locks on the webUI
    Given these users have been created:
        |username  |
        |receiver1 |
        |receiver2 |
    And the user has created folder "/FOLDER_TO_SHARE"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
    And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
    And the user "receiver1" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver1" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked file "lorem (2).txt" setting following properties
       | lockscope | shared |
    And the user "receiver2" has locked folder "FOLDER_TO_SHARE" setting following properties
       | lockscope | shared |
    And the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | shared |
    And the user "brand-new-user" has locked folder "FOLDER_TO_SHARE" setting following properties
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
    Given these users have been created:
        |username  |
        |receiver1 |
    And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
    And the user "receiver1" has locked file "lorem (2).txt" setting following properties
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
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
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

  Scenario Outline: moving a locked file
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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
    Given the user "brand-new-user" has locked file "/simple-folder/lorem.txt" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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
    Given the user "brand-new-user" has locked file "/simple-empty-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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

  Scenario Outline: uploading a file, trying to overwrite a locked file
    Given the user "brand-new-user" has locked file "lorem.txt" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
        | The file lorem.txt is currently locked, please try again later |
    And the content of "lorem.txt" should not have changed
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: uploading a file, trying to overwrite a file in a locked folder
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has opened folder "simple-folder" using the webUI
    When the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
        | The file lorem.txt is currently locked, please try again later |
    And the content of "lorem.txt" should not have changed
    And file "lorem.txt" should be marked as locked on the webUI
    And file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: uploading a new file into a locked folder
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has opened folder "simple-folder" using the webUI
    When the user uploads file "new-lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file new-lorem.txt is currently locked, please try again later |
    And file "new-lorem.txt" should not be listed on the webUI
    And 0 locks should be reported for file "simple-folder/new-lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting a file in a public share of a locked folder
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user deletes folder "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and cannot be deleted. |
    And as "brand-new-user" file "simple-folder/lorem.txt" should exist
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: renaming a file in a public share of a locked folder
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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
    Given the user "brand-new-user" has locked file "simple-folder/lorem.txt" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
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

  Scenario Outline: uploading a file, trying to overwrite a file in a locked folder in a public share
    Given the user "brand-new-user" has locked folder "simple-folder" setting following properties
       | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has created a new public link for folder "simple-folder" using the webUI with
      | permission | read-write |
    When the public accesses the last created public link using the webUI
    And the user uploads overwriting file "lorem.txt" using the webUI
    Then notifications should be displayed on the webUI with the text
        | The file lorem.txt is currently locked, please try again later |
    And the content of "simple-folder/lorem.txt" should not have changed
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: decline locked folder
    Given these users have been created:
      |username  |
      |sharer    |
    And user "sharer" has created folder "/to-share-folder"
    And the user "sharer" has locked folder "to-share-folder" setting following properties
     | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder" should not be listed on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 0 locks should be reported for file "to-share-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: accept previously declined locked folder
    Given these users have been created:
      |username  |
      |sharer    |
    And user "sharer" has created folder "/to-share-folder"
    And the user "sharer" has locked folder "to-share-folder" setting following properties
     | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And the user accepts share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder" should be marked as locked on the webUI
    And folder "to-share-folder" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "to-share-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: accept previously declined locked folder but create a folder with same name in between
    Given these users have been created:
      |username  |
      |sharer    |
    And user "sharer" has created folder "/to-share-folder"
    And the user "sharer" has locked folder "to-share-folder" setting following properties
     | lockscope | <lockscope> |
    And user "sharer" has shared folder "to-share-folder" with user "brand-new-user"
    When the user declines share "to-share-folder" offered by user "sharer" using the webUI
    And user "brand-new-user" creates folder "to-share-folder" using the WebDAV API
    And the user accepts share "to-share-folder" offered by user "sharer" using the webUI
    And the user has browsed to the files page
    Then folder "to-share-folder (2)" should be marked as locked on the webUI
    And folder "to-share-folder (2)" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    But folder "to-share-folder" should not be marked as locked on the webUI
    And 1 locks should be reported for file "to-share-folder" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "to-share-folder (2)" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: creating a subfolder structure that is the same as the structure of a declined & locked share
    Given these users have been created:
      |username  |
      |sharer    |
    And user "sharer" has created folder "/parent"
    And user "sharer" has created folder "/parent/subfolder"
    And the user "sharer" has locked folder "parent" setting following properties
     | lockscope | <lockscope> |
    And user "sharer" has shared folder "parent" with user "brand-new-user"
    When the user declines share "parent" offered by user "sharer" using the webUI
    And user "brand-new-user" creates folder "parent" using the WebDAV API
    And user "brand-new-user" creates folder "parent/subfolder" using the WebDAV API
    And the user has browsed to the files page
    Then folder "parent" should not be marked as locked on the webUI
    When the user opens folder "parent" using the webUI
    Then folder "subfolder" should not be marked as locked on the webUI
    And 0 locks should be reported for file "parent" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for file "parent/subfolder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: unsharing a locked file/folder
    Given these users have been created:
      |username  |
      |sharer    |
    And the user "sharer" has locked file "lorem.txt" setting following properties
      | lockscope | <lockscope> |
    And the user "sharer" has locked folder "simple-folder" setting following properties
      | lockscope | <lockscope> |
    And user "sharer" has shared file "lorem.txt" with user "brand-new-user"
    And user "sharer" has shared folder "simple-folder" with user "brand-new-user"
    And the user has browsed to the files page
    When the user unshares file "lorem (2).txt" using the webUI
    And the user unshares folder "simple-folder (2)" using the webUI
    Then as "brand-new-user" file "lorem (2).txt" should not exist
    And as "brand-new-user" folder "simple-folder (2)" should not exist
    And file "lorem (2).txt" should not be listed on the webUI
    And folder "simple-folder (2)" should not be listed on the webUI
    And 1 locks should be reported for file "lorem.txt" of user "sharer" by the WebDAV API
    And 1 locks should be reported for file "simple-folder/lorem.txt" of user "sharer" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |
