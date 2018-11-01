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
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked the file "data.zip" setting following properties
      | lockscope | exclusive |
    When the user browses to the files page
    Then the folder "simple-folder" should be marked as locked on the webUI
    And the folder "simple-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But the folder "simple-empty-folder" should not be marked as locked on the webUI
    And the file "data.zip" should be marked as locked on the webUI
    And the file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But the file "data.tar.gz" should not be marked as locked on the webUI

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
    And the user "sharer" has locked the file "data.zip" setting following properties
      | lockscope | shared |
    And the user "receiver" has locked the file "data (2).zip" setting following properties
      | lockscope | shared |
    And the user "brand-new-user" has locked the file "data (2).zip" setting following properties
      | lockscope | shared |
    And the user "receiver2" has locked the file "data.tar (2).gz" setting following properties
      | lockscope | shared |
    When the user browses to the files page
    Then the file "data (2).zip" should be marked as locked on the webUI
    And the file "data (2).zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And the file "data (2).zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And the file "data (2).zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    But the file "data.zip" should not be marked as locked on the webUI
    When the user re-logs in as "sharer" using the webUI
    Then the file "data.zip" should be marked as locked on the webUI
    And the file "data.zip" should be marked as locked by user "sharer" in the locks tab of the details panel on the webUI
    And the file "data.zip" should be marked as locked by user "receiver" in the locks tab of the details panel on the webUI
    And the file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And the file "data.tar.gz" should be marked as locked on the webUI
    And the file "data.tar.gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
    When the user re-logs in as "receiver2" using the webUI
    Then the file "data.tar (2).gz" should be marked as locked on the webUI
    And the file "data.tar (2).gz" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI

  Scenario: setting a lock on a folder shows the symbols at the sub-elements
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | shared |
    When the user opens the folder "simple-folder" using the webUI
    Then the folder "simple-empty-folder" should be marked as locked on the webUI
    And the folder "simple-empty-folder" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
    And the file "data.zip" should be marked as locked on the webUI
    And the file "data.zip" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI

  Scenario: setting a depth:0 lock on a folder does not shows the symbols at the sub-elements
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | depth | 0 |
    When the user browses to the files page
    Then the folder "simple-folder" should be marked as locked on the webUI
    When the user opens the folder "simple-folder" using the webUI
    Then the folder "simple-empty-folder" should not be marked as locked on the webUI
    And the file "data.zip" should not be marked as locked on the webUI

  Scenario: unlocking by webDAV deletes the lock symbols at the correct files/folders
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | shared |
    When the user "brand-new-user" unlocks the last created lock of the folder "simple-folder" using the WebDAV API
    And the user browses to the files page
    Then the folder "simple-folder" should not be marked as locked on the webUI

  Scenario Outline: deleting the only remaining lock of a file/folder
    Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
    And the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of the folder "simple-folder" on the webUI
    Then the file "lorem.txt" should not be marked as locked on the webUI
    And the folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a file/folder and reloading the page
    Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | exclusive |
    And the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | exclusive |
    And the user has browsed to the files page
    When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
    And the user unlocks the lock no 1 of the folder "simple-folder" on the webUI
    And the user reloads the current page of the webUI
    Then the file "lorem.txt" should not be marked as locked on the webUI
    And the folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a folder by deleting it from a file in the folder
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has opened the folder "simple-folder" using the webUI
    When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
    Then the file "lorem.txt" should not be marked as locked on the webUI
    And the folder "simple-empty-folder" should not be marked as locked on the webUI
    When the user browses to the files page
    Then the folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for the folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the folder "simple-folder/simple-empty-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario Outline: deleting the only remaining lock of a folder by deleting it from a file in the folder and reloading the page
    Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
    And the user has browsed to the files page
    And the user has opened the folder "simple-folder" using the webUI
    When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
    And the user reloads the current page of the webUI
    Then the file "lorem.txt" should not be marked as locked on the webUI
    And the folder "simple-empty-folder" should not be marked as locked on the webUI
    When the user browses to the files page
    Then the folder "simple-folder" should not be marked as locked on the webUI
    And 0 locks should be reported for the folder "simple-folder" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
    And 0 locks should be reported for the folder "simple-folder/simple-empty-folder" of user "brand-new-user" by the WebDAV API
    Examples:
      | lockscope |
      | exclusive |
      | shared    |

  Scenario: deleting the first one of multiple shared locks on the webUI
  Given these users have been created:
      |username  |
      |receiver1 |
      |receiver2 |
  And the user has created a folder "/FOLDER_TO_SHARE"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
  And the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | shared |
  And the user "brand-new-user" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "receiver1" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver1" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user has browsed to the files page
  When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
  Then the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  When the user unlocks the lock no 1 of the folder "FOLDER_TO_SHARE" on the webUI
  Then the folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API

  Scenario: deleting the second one of multiple shared locks on the webUI
  Given these users have been created:
      |username  |
      |receiver1 |
      |receiver2 |
  And the user has created a folder "/FOLDER_TO_SHARE"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
  And the user "receiver1" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver1" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | shared |
  And the user "brand-new-user" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user has browsed to the files page
  When the user unlocks the lock no 2 of the file "lorem.txt" on the webUI
  Then the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  When the user unlocks the lock no 2 of the folder "FOLDER_TO_SHARE" on the webUI
  Then the folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API

  Scenario: deleting the last one of multiple shared locks on the webUI
  Given these users have been created:
      |username  |
      |receiver1 |
      |receiver2 |
  And the user has created a folder "/FOLDER_TO_SHARE"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver1"
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver2"
  And user "brand-new-user" has shared folder "/FOLDER_TO_SHARE" with user "receiver2"
  And the user "receiver1" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver1" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the file "lorem (2).txt" setting following properties
     | lockscope | shared |
  And the user "receiver2" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | shared |
  And the user "brand-new-user" has locked the folder "FOLDER_TO_SHARE" setting following properties
     | lockscope | shared |
  And the user has browsed to the files page
  When the user unlocks the lock no 3 of the file "lorem.txt" on the webUI
  Then the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  When the user unlocks the lock no 3 of the folder "FOLDER_TO_SHARE" on the webUI
  Then the folder "FOLDER_TO_SHARE" should be marked as locked on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And the folder "FOLDER_TO_SHARE" should be marked as locked by user "receiver2" in the locks tab of the details panel on the webUI
  And 2 locks should be reported for the folder "FOLDER_TO_SHARE" of user "brand-new-user" by the WebDAV API

  Scenario Outline: deleting a lock that was created by an other user
  Given these users have been created:
      |username  |
      |receiver1 |
  And user "brand-new-user" has shared file "/lorem.txt" with user "receiver1"
  And the user "receiver1" has locked the file "lorem (2).txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user unlocks the lock no 1 of the file "lorem.txt" on the webUI
  Then notifications should be displayed on the webUI with the text
      | Unlock failed with status: 403 |
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "receiver1" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: deleting a locked file
  Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user deletes the file "lorem.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and cannot be deleted. |
  And as "brand-new-user" the file "lorem.txt" should exist
  And the file "lorem.txt" should be listed on the webUI
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: moving a locked file
  Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user moves the file "lorem.txt" into the folder "simple-empty-folder" using the webUI
  Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
  And as "brand-new-user" the file "lorem.txt" should exist
  And the file "lorem.txt" should be listed on the webUI
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: moving a file trying to overwrite a locked file
  Given the user "brand-new-user" has locked the file "/simple-folder/lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user moves the file "lorem.txt" into the folder "simple-folder" using the webUI
  Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
  And as "brand-new-user" the file "lorem.txt" should exist
  And the file "lorem.txt" should be listed on the webUI
  And the file "lorem.txt" should not be marked as locked on the webUI
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: moving a file into a locked folder
  Given the user "brand-new-user" has locked the file "/simple-empty-folder" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user moves the file "lorem.txt" into the folder "simple-empty-folder" using the webUI
  And as "brand-new-user" the file "/simple-empty-folder/lorem.txt" should exist
  And as "brand-new-user" the file "lorem.txt" should not exist
  And the file "lorem.txt" should not be listed on the webUI
  And 1 locks should be reported for the file "/simple-empty-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: renaming of a locked file
  Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user renames the file "lorem.txt" to "a-renamed-file.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and can not be renamed. |
  And as "brand-new-user" the file "lorem.txt" should exist
  And the file "lorem.txt" should be listed on the webUI
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: uploading a file, trying to overwrite a locked file
  Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  When the user uploads overwriting the file "lorem.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
      | Locked |
  And the content of "lorem.txt" should not have changed
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: uploading a file, trying to overwrite a file in a locked folder
  Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
  And the user has opened the folder "simple-folder" using the webUI
  When the user uploads overwriting the file "lorem.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
      | Locked |
  And the content of "lorem.txt" should not have changed
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: uploading a new file into a locked folder
  Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
  And the user has opened the folder "simple-folder" using the webUI
  When the user uploads the file "new-lorem.txt" using the webUI
  Then the file "new-lorem.txt" should be marked as locked on the webUI
  And the file "new-lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "simple-folder/new-lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: deleting a file in a public share of a locked folder
  Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  And the user has created a new public link for the folder "simple-folder" using the webUI with
    | permission | read-write |
  When the public accesses the last created public link using the webUI
  And the user deletes the folder "lorem.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
    | The file "lorem.txt" is locked and cannot be deleted. |
  And as "brand-new-user" the file "simple-folder/lorem.txt" should exist
  And 1 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: renaming a file in a public share of a locked folder
  Given the user "brand-new-user" has locked the folder "simple-folder" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  And the user has created a new public link for the folder "simple-folder" using the webUI with
    | permission | read-write |
  When the public accesses the last created public link using the webUI
  And the user renames the file "lorem.txt" to "a-renamed-file.txt" using the webUI
  Then notifications should be displayed on the webUI with the text
      | The file "lorem.txt" is locked and can not be renamed. |
  And as "brand-new-user" the file "simple-folder/lorem.txt" should exist
  And as "brand-new-user" the file "simple-folder/a-renamed-file.txt" should not exist
  And 1 locks should be reported for the file "simple-folder/lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |

  Scenario Outline: moving a locked file into an other folder in a public share
  Given the user "brand-new-user" has locked the file "lorem.txt" setting following properties
     | lockscope | <lockscope> |
  And the user has browsed to the files page
  And the user has created a new public link for the folder "simple-folder" using the webUI with
    | permission | read-write |
  When the public accesses the last created public link using the webUI
  And the user moves the file "lorem.txt" into the folder "simple-empty-folder" using the webUI
  Then notifications should be displayed on the webUI with the text
      | Could not move "lorem.txt" because either the file or the target are locked. |
  And as "brand-new-user" the file "lorem.txt" should exist
  And the file "lorem.txt" should be listed on the webUI
  And the file "lorem.txt" should be marked as locked on the webUI
  And the file "lorem.txt" should be marked as locked by user "brand-new-user" in the locks tab of the details panel on the webUI
  And 1 locks should be reported for the file "lorem.txt" of user "brand-new-user" by the WebDAV API
  Examples:
    | lockscope |
    | exclusive |
    | shared    |
#  Scenario: unshare locked folder/file
#  Scenario: decline/accept locked folder/file
#  Scenario: correct displayname / username is shown in the lock list
