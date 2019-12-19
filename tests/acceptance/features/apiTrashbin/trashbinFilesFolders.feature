@api @TestAlsoOnExternalUserBackend @files_trashbin-app-required
Feature: files and folders exist in the trashbin after being deleted
  As a user
  I want deleted files and folders to be available in the trashbin
  So that I can recover data easily

  Background:
    Given the administrator has enabled DAV tech_preview
    And using OCS API version "1"
    And as the administrator

  @smokeTest
  Scenario Outline: deleting a file moves it to trashbin
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    When user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then as "user0" file "/textfile0.txt" should exist in trash
    But as "user0" file "/textfile0.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: deleting a folder moves it to trashbin
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/tmp"
    When user "user0" deletes folder "/tmp" using the WebDAV API
    Then as "user0" folder "/tmp" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: deleting a file in a folder moves it to the trashbin root
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/new-folder"
    And user "user0" has moved file "/textfile0.txt" to "/new-folder/new-file.txt"
    When user "user0" deletes file "/new-folder/new-file.txt" using the WebDAV API
    Then as "user0" the file with original path "/new-folder/new-file.txt" should exist in trash
    And as "user0" file "/new-file.txt" should exist in trash
    But as "user0" file "/new-folder/new-file.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @files_sharing-app-required
  Scenario Outline: deleting a file in a shared folder moves it to the trashbin root
    Given using <dav-path> DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user0" deletes file "/shared/shared_file.txt" using the WebDAV API
    Then as "user0" the file with original path "/shared/shared_file.txt" should exist in trash
    And as "user0" file "/shared_file.txt" should exist in trash
    But as "user0" file "/shared/shared_file.txt" should not exist
    Examples:
      | dav-path |
      | old      |
      | new      |

  @files_sharing-app-required
  Scenario Outline: deleting a shared folder moves it to trashbin
    Given using <dav-path> DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    When user "user0" deletes folder "/shared" using the WebDAV API
    Then as "user0" the folder with original path "/shared" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  @files_sharing-app-required
  Scenario Outline: deleting a received folder doesn't move it to trashbin
    Given using <dav-path> DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved folder "/shared" to "/renamed_shared"
    When user "user1" deletes folder "/renamed_shared" using the WebDAV API
    Then as "user1" the folder with original path "/renamed_shared" should not exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  @files_sharing-app-required
  Scenario Outline: deleting a file in a received folder moves it to trashbin
    Given using <dav-path> DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has moved file "/shared" to "/renamed_shared"
    When user "user1" deletes file "/renamed_shared/shared_file.txt" using the WebDAV API
    Then as "user1" the file with original path "/renamed_shared/shared_file.txt" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-23151
  # This scenario deletes many files as close together in time as the test can run.
  # On a very slow system, the file deletes might all happen in different seconds.
  # But on "reasonable" systems, some of the files will be deleted in the same second,
  # thus testing the required behavior.
  Scenario Outline: trashbin can store two files with the same name but different origins when the files are deleted close together in time
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/folderA"
    And user "user0" has created folder "/folderB"
    And user "user0" has created folder "/folderC"
    And user "user0" has created folder "/folderD"
    And user "user0" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderC/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderD/textfile0.txt"
    When user "user0" deletes these files without delays using the WebDAV API
      | /textfile0.txt         |
      | /folderA/textfile0.txt |
      | /folderB/textfile0.txt |
      | /folderC/textfile0.txt |
      | /folderD/textfile0.txt |
    # When issue-23151 is fixed, uncomment these lines. They should pass reliably.
    #Then as "user0" the folder with original path "/folderA/textfile0.txt" should exist in trash
    #And as "user0" the folder with original path "/folderB/textfile0.txt" should exist in trash
    #And as "user0" the folder with original path "/folderC/textfile0.txt" should exist in trash
    #And as "user0" the folder with original path "/folderD/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/textfile0.txt" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  # Note: the underlying acceptance test code ensures that each delete step is separated by a least 1 second
  Scenario Outline: trashbin can store two files with the same name but different origins when the deletes are separated by at least 1 second
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/folderA"
    And user "user0" has created folder "/folderB"
    And user "user0" has copied file "/textfile0.txt" to "/folderA/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/folderB/textfile0.txt"
    When user "user0" deletes file "/folderA/textfile0.txt" using the WebDAV API
    And user "user0" deletes file "/folderB/textfile0.txt" using the WebDAV API
    And user "user0" deletes file "/textfile0.txt" using the WebDAV API
    Then as "user0" the folder with original path "/folderA/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/folderB/textfile0.txt" should exist in trash
    And as "user0" the folder with original path "/textfile0.txt" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  @local_storage
    @skipOnEncryptionType:user-keys @encryption-issue-42
    @skip_on_objectstore
  Scenario Outline: Deleting a folder into external storage moves it to the trashbin
    Given using <dav-path> DAV path
    And the administrator has invoked occ command "files:scan --all"
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has created folder "/local_storage/tmp"
    And user "user0" has moved file "/textfile0.txt" to "/local_storage/tmp/textfile0.txt"
    When user "user0" deletes folder "/local_storage/tmp" using the WebDAV API
    Then as "user0" the folder with original path "/local_storage/tmp" should exist in trash
    Examples:
      | dav-path |
      | old      |
      | new      |

  # This issue makes this scenario behave differently based on previously created users.
  # So we use user that has not been created in any other scenarios.
  @skipOnLDAP @skip_on_objectstore @skipOnOcV10.3
  Scenario Outline: Listing other user's trashbin is prohibited
    Given using <dav-path> DAV path
    And user "user40" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user40" has deleted file "/textfile1.txt"
    When user "user1" tries to list the trashbin content for user "user40"
    Then the HTTP status code should be "401"
    And the last webdav response should not contain the following elements
      | path          | user   |
      | textfile1.txt | user40 |
    Examples:
      | dav-path |
      | old      |
      | new      |

  # This issue makes this scenario behave differently based on previously created users.
  # So we use user that has not been created in any other scenarios.
  @skipOnLDAP @skip_on_objectstore @skipOnOcV10.3
  Scenario Outline: Listing other user's trashbin is prohibited
    Given using <dav-path> DAV path
    And user "user60" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user60" has deleted file "/textfile0.txt"
    And user "user60" has deleted file "/textfile2.txt"
    When user "user1" tries to list the trashbin content for user "user60"
    Then the HTTP status code should be "401"
    And the last webdav response should not contain the following elements
      | path          | user   |
      | textfile0.txt | user60 |
      | textfile2.txt | user60 |
    Examples:
      | dav-path |
      | old      |
      | new      |

  # This issue makes this scenario behave differently based on previously created users.
  # So we use user that has not been created in any other scenarios.
  @skipOnLDAP @skip_on_objectstore @skipOnOcV10.3
  Scenario Outline: Listing other user's trashbin is prohibited
    Given using <dav-path> DAV path
    And user "user504" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and skeleton files
    And user "user504" has deleted file "/textfile0.txt"
    And user "user504" has deleted file "/textfile2.txt"
    And the administrator deletes user "user504" using the provisioning API
    Given these users have been created with default attributes and skeleton files but not initialized:
      | username |
      | user504  |
    And user "user504" has deleted file "/textfile3.txt"
    When user "user1" tries to list the trashbin content for user "user504"
    Then the HTTP status code should be "401"
    And the last webdav response should not contain the following elements
      | path          | user    |
      | textfile0.txt | user504 |
      | textfile2.txt | user504 |
      | textfile3.txt | user504 |
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Get trashbin content with wrong password
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    When user "user0" tries to list the trashbin content for user "user0" using password "invalid"
    Then the HTTP status code should be "401"
    And the last webdav response should not contain the following elements
      | path           | user  |
      | /textfile0.txt | user0 |
    Examples:
      | dav-path |
      | old      |
      | new      |

  Scenario Outline: Get trashbin content without password
    Given using <dav-path> DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user0" has deleted file "/textfile0.txt"
    When user "user0" tries to list the trashbin content for user "user0" using password ""
    Then the HTTP status code should be "401"
    And the last webdav response should not contain the following elements
      | path           | user  |
      | /textfile0.txt | user0 |
    Examples:
      | dav-path |
      | old      |
      | new      |
