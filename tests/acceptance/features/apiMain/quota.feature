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
    Then as "Alice" the files uploaded to "/testquota.txt" with all mechanisms should not exist

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
    Then as "Brian" the files uploaded to "/testquota.txt" with all mechanisms should not exist

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
