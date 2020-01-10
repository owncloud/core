@api @TestAlsoOnExternalUserBackend
Feature: upload file using new chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And using new DAV path
    And user "user0" has been created with default attributes and skeleton files

  Scenario: Upload chunked file asc with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    And as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Upload chunked file desc with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Upload chunked file random with new chunking
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Checking file id after a move overwrite using new chunking endpoint
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "user0" has copied file "/textfile0.txt" to "/existingFile.txt"
    And user "user0" has stored id of file "/existingFile.txt"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/existingFile.txt" in 3 chunks with new chunking and using the WebDAV API
    Then user "user0" file "/existingFile.txt" should have the previously stored id
    And the content of file "/existingFile.txt" for user "user0" should be:
      """
      This is a testfile.
      
      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: New chunked upload MKDIR using old DAV path should fail
    Given using old DAV path
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    Then the HTTP status code should be "409"

  Scenario: New chunked upload PUT using old DAV path should fail
    Given user "user0" has created a new chunking upload with id "chunking-42"
    When using old DAV path
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: New chunked upload MOVE using old DAV path should fail
    Given user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    When using old DAV path
    And user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: Upload to new dav path using old way should fail
    When user "user0" uploads chunk file "1" of "3" with "AAAAA" to "/myChunkedFile.txt" using the WebDAV API
    Then the HTTP status code should be "503"

  Scenario: Upload file via new chunking endpoint with wrong size header
    Given user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 5 using the WebDAV API
    Then the HTTP status code should be "400"

  Scenario: Upload file via new chunking endpoint with correct size header
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "user0" moves new chunk file with id "chunking-42" to "/myChunkedFile.txt" with size 15 using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  @smokeTest
  # This smokeTest scenario does ordinary checks for chunked upload,
  # without adjusting the log level. This allows it to run in test environments
  # where the log level has been fixed and cannot be changed.
  Scenario Outline: Upload files with difficult names using new chunking
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "/<file-name>" using the WebDAV API
    Then as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be "AAAAABBBBBCCCCC"
    Examples:
      | file-name |
      | &#?       |
      | TIÄFÜ     |

  # This scenario does extra checks with the log level set to debug.
  # It does not run in smoke test runs. (see comments in scenario above)
  Scenario Outline: Upload files with difficult names using new chunking and check the log
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks with new chunking and using the WebDAV API
    Then as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be:
      """
      This is a testfile.

      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
    Examples:
      | file-name |
      | &#?       |
      | TIÄFÜ     |

  # The bug for this scenario was fixed by https://github.com/owncloud/core/pull/33276
  # The fix is released in 10.1 - all 10.0.* versions will fail this scenario
  @skipOnOcV10.0
  Scenario: Upload a file called "0" using new chunking
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "/0" using the WebDAV API
    And as "user0" file "/0" should exist
    And the content of file "/0" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Upload a file to a filename that is banned by default using new chunking
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to ".htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file ".htaccess" should not exist

  Scenario: Upload a file to a banned filename using new chunking
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "blacklisted-file.txt" should not exist

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches blacklisted_files_regex using new chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "<filename>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                      |
      | filename.ext                  |
      | bannedfilename.txt            |
      | this-ContainsBannedString.txt |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match blacklisted_files_regex using new chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "not-contains-banned-string.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "not-contains-banned-string.txt" should exist

  Scenario: Upload a file to an excluded directory name using new chunking
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to ".github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file ".github" should not exist

  Scenario: Upload a file to an excluded directory name inside a parent directory using new chunking
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" folder "/FOLDER" should exist
    But as "user0" file "/FOLDER/.github" should not exist

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches excluded_directories_regex using new chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "<filename>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                        |
      | thisendswith.bad                |
      | .github                         |
      | this-containsvirusinthename.txt |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match excluded_directories_regex using new chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" to "not-contains-virus-in-the-name.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "not-contains-virus-in-the-name.txt" should exist
