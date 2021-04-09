@api @issue-ocis-reva-101
Feature: quota

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

    # Owner

  Scenario: Uploading a file as owner having enough quota
    Given the quota of user "Alice" has been set to "10 MB"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"

  @smokeTest
  Scenario: Uploading a file as owner having insufficient quota
    Given the quota of user "Alice" has been set to "20 B"
    When user "Alice" uploads file "filesForUpload/textfile.txt" to filenames based on "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "Alice" the files uploaded to "/testquota.txt" with all mechanisms should not exist

  Scenario: Overwriting a file as owner having enough quota
    Given user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And the quota of user "Alice" has been set to "10 MB"
    When user "Alice" overwrites from file "filesForUpload/textfile.txt" to file "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"

  Scenario: Overwriting a file as owner having insufficient quota
    Given user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And the quota of user "Alice" has been set to "20 B"
    When user "Alice" overwrites from file "filesForUpload/textfile.txt" to file "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And the content of file "/testquota.txt" for user "Alice" should be "test"

	# Received shared folder

  @files_sharing-app-required
  Scenario: Uploading a file in received folder having enough quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/testquota"
    And user "Alice" has shared folder "/testquota" with user "Brian" with permissions "all"
    And the quota of user "Brian" has been set to "20 B"
    And the quota of user "Alice" has been set to "10 MB"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"

  @files_sharing-app-required
  Scenario: Uploading a file in received folder having insufficient quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/testquota"
    And user "Alice" has shared folder "/testquota" with user "Brian" with permissions "all"
    And the quota of user "Brian" has been set to "10 MB"
    And the quota of user "Alice" has been set to "20 B"
    When user "Brian" uploads file "filesForUpload/textfile.txt" to filenames based on "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "Brian" the files uploaded to "/testquota.txt" with all mechanisms should not exist

  @files_sharing-app-required
  Scenario: Overwriting a file in received folder having enough quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/testquota"
    And user "Alice" has uploaded file with content "test" to "/testquota/testquota.txt"
    And user "Alice" has shared folder "/testquota" with user "Brian" with permissions "all"
    And the quota of user "Brian" has been set to "20 B"
    And the quota of user "Alice" has been set to "10 MB"
    When user "Brian" overwrites from file "filesForUpload/textfile.txt" to file "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"

  @files_sharing-app-required
  Scenario: Overwriting a file in received folder having insufficient quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/testquota"
    And user "Alice" has uploaded file with content "test" to "/testquota/testquota.txt"
    And user "Alice" has shared folder "/testquota" with user "Brian" with permissions "all"
    And the quota of user "Brian" has been set to "10 MB"
    And the quota of user "Alice" has been set to "20 B"
    When user "Brian" overwrites from file "filesForUpload/textfile.txt" to file "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And the content of file "/testquota/testquota.txt" for user "Alice" should be "test"

	# Received shared file

  @files_sharing-app-required
  Scenario: Overwriting a received file having enough quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And user "Alice" has shared file "/testquota.txt" with user "Brian" with permissions "share,update,read"
    And the quota of user "Brian" has been set to "20 B"
    And the quota of user "Alice" has been set to "10 MB"
    When user "Brian" overwrites from file "filesForUpload/textfile.txt" to file "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"

  @files_sharing-app-required
  Scenario: Overwriting a received file having insufficient quota
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And user "Alice" has shared file "/testquota.txt" with user "Brian" with permissions "share,update,read"
    And the quota of user "Brian" has been set to "10 MB"
    And the quota of user "Alice" has been set to "20 B"
    When user "Brian" overwrites from file "filesForUpload/textfile.txt" to file "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And the content of file "/testquota.txt" for user "Alice" should be "test"


  Scenario: User with zero quota cannot upload a file
    Given the quota of user "Alice" has been set to "0 B"
    When user "Alice" uploads file with content "uploaded content" to "testquota.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"


  Scenario: User with zero quota can create a folder
    Given the quota of user "Alice" has been set to "0 B"
    When user "Alice" creates folder "testQuota" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "testQuota" should exist


  Scenario: user cannot create file on shared folder by a user with zero quota
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "0 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Brian" has created folder "shareFolder"
    And user "Brian" has shared file "/shareFolder" with user "Alice"
    And user "Alice" has accepted share "/shareFolder" offered by user "Brian"
    When user "Alice" uploads file with content "uploaded content" to "/Shares/shareFolder/newTextFile.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"
    And as "Brian" file "/shareFolder/newTextFile.txt" should not exist

  @skipOnOcV10.5 @skipOnOcV10.6 @skipOnOcV10.7.0
  Scenario: share receiver with 0 quota should not be able to move file from shared folder to home folder
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "0 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And user "Alice" has shared file "/testquota.txt" with user "Brian"
    And user "Brian" has accepted share "/testquota.txt" offered by user "Alice"
    When user "Brian" moves file "/Shares/testquota.txt" to "/testquota.txt" using the WebDAV API
    Then the HTTP status code should be "507"
    And the DAV exception should be "Sabre\DAV\Exception\InsufficientStorage"


  Scenario: sharer should be able to upload to a folder shared with user having zero quota
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "0 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Alice" has created folder "shareFolder"
    And user "Alice" has uploaded file with content "test" to "/shareFolder/testquota.txt"
    And user "Alice" has shared file "/shareFolder" with user "Brian"
    And user "Brian" has accepted share "/shareFolder" offered by user "Alice"
    When user "Alice" moves file "/shareFolder/testquota.txt" to "/testquota.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/testquota.txt" for user "Alice" should be "test"
    And as "Brian" file "/Shares/testquota" should not exist


  Scenario: share receiver with 0 quota should be able to upload on shared folder
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "0 B"
    And the quota of user "Alice" has been set to "10 MB"
    And user "Alice" has created folder "shareFolder"
    And user "Alice" has shared file "/shareFolder" with user "Brian"
    And user "Brian" has accepted share "/shareFolder" offered by user "Alice"
    When user "Brian" uploads file with content "uploaded content" to "/Shares/shareFolder/newTextFile.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/shareFolder/newTextFile.txt" for user "Alice" should be "uploaded content"


  Scenario: User should retain their old files even if their quota is set to 0
    Given user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And the quota of user "Alice" has been set to "0 B"
    Then the content of file "/testquota.txt" for user "Alice" should be "test"


  Scenario: User should be able to restore their deleted file when their quota is set to zero
    Given user "Alice" has uploaded file with content "test" to "/testquota.txt"
    And user "Alice" has deleted file "/testquota.txt"
    And the quota of user "Alice" has been set to "0 B"
    When user "Alice" restores the file with original path "/testquota.txt" to "/testquota.txt" using the trashbin API
    Then the HTTP status code should be "201"
    And the content of file "/testquota.txt" for user "Alice" should be "test"
