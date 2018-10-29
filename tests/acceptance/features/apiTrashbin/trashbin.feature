@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: trashbin-new-endpoint

  Background:
    Given using OCS API version "1"
    And as user "%admin%"

  @smokeTest
  Scenario Outline: deleting a file moves it to trashbin
    Given using <dav_version> DAV path
    And user "user0" has been created
    When user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then as "user0" the file "/textfile0.txt" should exist in trash
    But as "user0" the file "/textfile0.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a folder moves it to trashbin
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/tmp"
    When user "user0" deletes folder "/tmp" using the WebDAV API
    Then as "user0" the folder "/tmp" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a file in a folder moves it to the trashbin root
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    When user "user0" deletes file "/new-folder/new-file.txt" using the WebDAV API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should exist in trash
    And as "user0" the file "/new-file.txt" should exist in trash
    But as "user0" the file "/new-folder/new-file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a file in a shared folder moves it to the trashbin root
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user0" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then as "user0" the file with original path "/shared/shared_file.txt" should exist in trash
    And as "user0" the file "/shared_file.txt" should exist in trash
    But as "user0" the file "/shared/shared_file.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a shared folder moves it to trashbin
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user0" deletes folder "/shared" using the WebDAV API
    Then as "user0" the folder with original path "/shared" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a received folder doesn't move it to trashbin
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/renamed_shared"
    When user "user1" deletes folder "/renamed_shared" using the WebDAV API
    Then as "user1" the folder with original path "/renamed_shared" should not exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a file in a received folder moves it to trashbin
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved file "/shared" to "/renamed_shared"
    When user "user1" deletes file "/renamed_shared/shared_file.txt" using the WebDAV API
    Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: deleting a file in a received folder when restored it comes back to the original path
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And user "user0" has created a folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved file "/shared" to "/renamed_shared"
    And user "user1" has deleted file "/renamed_shared/shared_file.txt"
    And user "user1" has logged in to a web-style session
    When user "user1" restores the file with original path "/renamed_shared/shared_file.txt" using the trashbin API
    Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should not exist in trash
    And user "user1" should see the following elements
      | /renamed_shared/                |
      | /renamed_shared/shared_file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Trashbin can be emptied
    Given using <dav_version> DAV path
    And user "user0" has been created
    And a new browser session for "user0" has been started
    And user "user0" has deleted file "/textfile0.txt"
    And user "user0" has deleted file "/textfile1.txt"
    And as "user0" the file "/textfile0.txt" should exist in trash
    And as "user0" the file "/textfile1.txt" should exist in trash
    When user "user0" empties the trashbin using the trashbin API
    Then as "user0" the file with original path "/textfile0.txt" should not exist in trash
    And as "user0" the file with original path "/textfile1.txt" should not exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: A deleted file can be restored
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has deleted file "/textfile0.txt"
    And as "user0" the file "/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/textfile0.txt" should not exist in trash
    And user "user0" should see the following elements
      | /FOLDER/           |
      | /PARENT/           |
      | /PARENT/parent.txt |
      | /textfile0.txt     |
      | /textfile1.txt     |
      | /textfile2.txt     |
      | /textfile3.txt     |
      | /textfile4.txt     |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file deleted from a folder can be restored to the original folder
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file deleted from a folder is restored to root if the original folder does not exist
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and restored
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/new-folder" using the trashbin API
    And user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file deleted from a folder is restored to the original folder if the original folder was deleted and recreated
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    And user "user0" has deleted file "/new-folder/new-file.txt"
    And user "user0" has deleted folder "/new-folder"
    And user "user0" has logged in to a web-style session
    When user "user0" creates a folder "/new-folder" using the WebDAV API
    And user "user0" restores the file with original path "/new-folder/new-file.txt" using the trashbin API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should not exist in trash
    And as "user0" the file "/new-folder/new-file.txt" should exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skip @issue-23151
  Scenario Outline: trashbin can store two files with the same name but different origins when the files are deleted close together in time
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/folderA"
    And user "user0" has created a folder "/folderB"
    And user "user0" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
    When user "user0" deletes file "/folderA/textfile0.txt" using the WebDAV API
    And user "user0" deletes file "/folderB/textfile0.txt" using the WebDAV API
    And user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then as "user0" the folder with original path "/folderA/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/folderB/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/textfile0.txt" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: trashbin can store two files with the same name but different origins when the deletes are separated by at least 1 second
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user0" has created a folder "/folderA"
    And user "user0" has created a folder "/folderB"
    And user "user0" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
    When user "user0" waits and deletes file "/folderA/textfile0.txt" using the WebDAV API
    And user "user0" waits and deletes file "/folderB/textfile0.txt" using the WebDAV API
    And user "user0" waits and deletes file "/textfile0.txt" using the WebDAV API
    Then as "user0" the folder with original path "/folderA/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/folderB/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/textfile0.txt" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario Outline: Deleting a folder into external storage moves it to the trashbin
    Given using <dav_version> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    When user "user0" deletes folder "/local_storage/tmp" using the WebDAV API
    Then as "user0" the folder with original path "/local_storage/tmp" should exist in trash
    Examples:
      | dav_version |
      | old         |
      | new         |

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario Outline: Deleting a file into external storage moves it to the trashbin and can be restored
    Given using <dav_version> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
    And user "user0" should see the following elements
      | /local_storage/                  |
      | /local_storage/tmp/              |
      | /local_storage/tmp/textfile0.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @local_storage
  @skipOnEncryptionType:user-keys @encryption-issue-42
  @skip_on_objectstore
  Scenario Outline: Deleting an updated file into external storage moves it to the trashbin and can be restored
    Given using <dav_version> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created
    And user "user0" has created a folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has uploaded chunk file "1" of "1" with "AA" to "/local_storage/tmp/textfile0.txt"
    And user "user0" has deleted file "/local_storage/tmp/textfile0.txt"
    And as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should exist in trash
    And user "user0" has logged in to a web-style session
    When user "user0" restores the folder with original path "/local_storage/tmp/textfile0.txt" using the trashbin API
    Then as "user0" the folder with original path "/local_storage/tmp/textfile0.txt" should not exist in trash
    And the downloaded content when downloading file "/local_storage/tmp/textfile0.txt" for user "user0" with range "bytes=0-1" should be "AA"
    Examples:
      | dav_version |
      | old         |
      | new         |
