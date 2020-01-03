@api @TestAlsoOnExternalUserBackend
Feature: upload file using new chunking
  As a user
  I want to be able to upload "large" files in chunks asynchronously
  So that I do not have to wait for the long MOVE operation on assembly to finish

  Background:
    Given using new DAV path
    And user "user0" has been created with default attributes and skeleton files
    And the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And the administrator has enabled async operations

  Scenario: Upload chunked file ordered asc using async MOVE
    When user "user0" uploads the following chunks asynchronously to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Upload chunked file ordered desc using async MOVE
    When user "user0" uploads the following chunks asynchronously to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 3      | CCCCC   |
      | 2      | BBBBB   |
      | 1      | AAAAA   |
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Upload chunked file in random order using async MOVE
    When user "user0" uploads the following chunks asynchronously to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
      | 1      | AAAAA   |
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: Upload chunked file overwriting existing file using async MOVE
    Given user "user0" has copied file "/textfile0.txt" to "/existingFile.txt"
    When user "user0" uploads the following chunks asynchronously to "/existingFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And the content of file "/existingFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario: New chunked upload MOVE using old DAV path should fail
    Given user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    When using old DAV path
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" using the WebDAV API
    Then the HTTP status code should be "404"

  Scenario: Upload file via new chunking endpoint with wrong size header using async MOVE
    Given user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "user0" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with size 5 using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status       | /^error$/                                         |
      | errorCode    | /^400$/                                           |
      | errorMessage | /^Chunks on server do not sum up to 5 but to 15$/ |

  Scenario: Upload file via new chunking endpoint with correct size header using async MOVE
    Given user "user0" has created a new chunking upload with id "chunking-42"
    And user "user0" has uploaded new chunk file "1" with "AAAAA" to id "chunking-42"
    And user "user0" has uploaded new chunk file "2" with "BBBBB" to id "chunking-42"
    And user "user0" has uploaded new chunk file "3" with "CCCCC" to id "chunking-42"
    When user "user0" moves new chunk file with id "chunking-42" asynchronously to "/myChunkedFile.txt" with size 15 using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  Scenario Outline: Upload files with difficult names using new chunking and async MOVE
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/<file-name>" using the WebDAV API
    Then the HTTP status code should be "202"
    And the following headers should match these regular expressions
      | OC-JobStatus-Location | /%base_path%\/remote\.php\/dav\/job-status\/user0\/[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/ |
    And the oc job status values of last request for user "user0" should match these regular expressions
      | status | /^finished$/      |
      | fileId | /^[0-9a-z]{20,}$/ |
    And as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
    Examples:
      | file-name |
      | &#?       |
      | TIÄFÜ     |

  Scenario: Upload to a filename that is banned by default using new chunking and async MOVE
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/.htaccess" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/.htaccess" should not exist

  Scenario: Upload to a banned filename using new chunking and async MOVE
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/blacklisted-file.txt" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/blacklisted-file.txt" should not exist

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches blacklisted_files_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "<filename>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                      |
      | filename.ext                  |
      | bannedfilename.txt            |
      | this-ContainsBannedString.txt |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match blacklisted_files_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "not-contains-banned-string.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And as "user0" file "not-contains-banned-string.txt" should exist

  Scenario: Upload to an excluded directory name using new chunking and async MOVE
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/.github" should not exist

  Scenario: Upload to an excluded directory name inside a parent directory using new chunking and async MOVE
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "/FOLDER/.github" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" folder "/FOLDER" should exist
    But as "user0" file "/FOLDER/.github" should not exist

  @skipOnOcV10.3
  Scenario Outline: upload a file to a filename that matches excluded_directories_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "<filename>" using the WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                        |
      | thisendswith.bad                |
      | .github                         |
      | this-containsvirusinthename.txt |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match excluded_directories_regex using new chunking and async MOVE
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" creates a new chunking upload with id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "1" with "AAAAA" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "2" with "BBBBB" to id "chunking-42" using the WebDAV API
    And user "user0" uploads new chunk file "3" with "CCCCC" to id "chunking-42" using the WebDAV API
    And user "user0" moves new chunk file with id "chunking-42" asynchronously to "not-contains-virus-in-the-name.txt" using the WebDAV API
    Then the HTTP status code should be "202"
    And as "user0" file "not-contains-virus-in-the-name.txt" should exist

  Scenario: disabled async operations leads to original behavior
    Given the administrator has disabled async operations
    When user "user0" uploads the following chunks asynchronously to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should not be set
      | header                |
      | OC-JobStatus-Location |
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: enabling async operations does no difference to normal MOVE - Upload chunked file
    When user "user0" uploads the following chunks to "/myChunkedFile.txt" with new chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should not be set
      | header                |
      | OC-JobStatus-Location |
    And as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |
