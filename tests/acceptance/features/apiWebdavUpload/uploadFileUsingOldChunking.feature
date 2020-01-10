@api @TestAlsoOnExternalUserBackend
Feature: upload file using old chunking
  As a user
  I want to be able to upload "large" files in chunks
  So that the upload can be completed in less elapsed time

  Background:
    Given using OCS API version "1"
    And using old DAV path
    And user "user0" has been created with default attributes and skeleton files

  @issue-36115
  Scenario: Upload chunked file asc
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 1      | AAAAA   |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      #| ETag | /^"[a-f0-9]{1,32}"$/ |
      | ETag | /^[a-f0-9]{1,32}$/ |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Upload chunked file desc
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 3      | CCCCC   |
      | 2      | BBBBB   |
      | 1      | AAAAA   |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Upload chunked file random
    When user "user0" uploads the following "3" chunks to "/myChunkedFile.txt" with old chunking and using the WebDAV API
      | number | content |
      | 2      | BBBBB   |
      | 3      | CCCCC   |
      | 1      | AAAAA   |
    Then as "user0" file "/myChunkedFile.txt" should exist
    And the content of file "/myChunkedFile.txt" for user "user0" should be "AAAAABBBBBCCCCC"

  Scenario: Checking file id after a move overwrite using old chunking endpoint
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    And user "user0" has copied file "/textfile0.txt" to "/existingFile.txt"
    And user "user0" has stored id of file "/existingFile.txt"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/existingFile.txt" in 3 chunks with old chunking and using the WebDAV API
    Then user "user0" file "/existingFile.txt" should have the previously stored id
    And the content of file "/existingFile.txt" for user "user0" should be:
      """
      This is a testfile.
      
      Cheers.
      """
    And the log file should not contain any log-entries containing these attributes:
      | app |
      | dav |

  @smokeTest
  # This smokeTest scenario does ordinary checks for chunked upload,
  # without adjusting the log level. This allows it to run in test environments
  # where the log level has been fixed and cannot be changed.
  Scenario Outline: Chunked upload files with difficult name
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks using the WebDAV API
    Then as "user0" file "/<file-name>" should exist
    And the content of file "/<file-name>" for user "user0" should be:
      """
      This is a testfile.
      
      Cheers.
      """
    Examples:
      | file-name                       |
      | &#? TIÄFÜ @a#8a=b?c=d ?abc=oc # |
      | 0                               |

  # This scenario does extra checks with the log level set to debug.
  # It does not run in smoke test runs. (see comments in scenario above)
  Scenario Outline: Chunked upload files with difficult name and check the log
    Given the owncloud log level has been set to debug
    And the owncloud log has been cleared
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/<file-name>" in 3 chunks using the WebDAV API
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
      | file-name   |
      | &#?         |
      | TIÄFÜ       |
      | 0           |
      | @a#8a=b?c=d |
      | ?abc=oc #   |

  @issue-36645
  Scenario: Upload a file to a filename that is banned by default using old chunking
    When user "user0" uploads file "filesForUpload/textfile.txt" to "/.htaccess" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "507"
    #Then the HTTP status code should be "403"
    And as "user0" file ".htaccess" should not exist

  @issue-36645
  Scenario: Upload a file to a banned filename using old chunking
    When the administrator updates system config key "blacklisted_files" with value '["blacklisted-file.txt",".htaccess"]' and type "json" using the occ command
    And user "user0" uploads file "filesForUpload/textfile.txt" to "blacklisted-file.txt" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "507"
    #Then the HTTP status code should be "403"
    And as "user0" file "blacklisted-file.txt" should not exist

  @skipOnOcV10.3 @issue-36645
  Scenario Outline: upload a file to a filename that matches blacklisted_files_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "<filename>" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "<http-status>"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                      | http-status | comment     |
      | filename.ext                  | 507         | issue-36645 |
      | bannedfilename.txt            | 403         | ok          |
      | this-ContainsBannedString.txt | 403         | ok          |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match blacklisted_files_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being .*\.ext$ and ^bannedfilename\..+
    Given the administrator has updated system config key "blacklisted_files_regex" with value '[".*\\.ext$","^bannedfilename\\..+","containsbannedstring"]' and type "json"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "not-contains-banned-string.txt" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "not-contains-banned-string.txt" should exist

  @issue-36645
  Scenario: Upload a file to an excluded directory name using old chunking
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" uploads file "filesForUpload/textfile.txt" to "/.github" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "507"
    #Then the HTTP status code should be "403"
    And as "user0" file ".github" should not exist

  @issue-36645
  Scenario: Upload a file to an excluded directory name inside a parent directory using old chunking
    When the administrator updates system config key "excluded_directories" with value '[".github"]' and type "json" using the occ command
    And user "user0" uploads file "filesForUpload/textfile.txt" to "/FOLDER/.github" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "507"
    #Then the HTTP status code should be "403"
    And as "user0" folder "/FOLDER" should exist
    But as "user0" file "/FOLDER/.github" should not exist

  @skipOnOcV10.3 @issue-36645
  Scenario Outline: upload a file to a filename that matches excluded_directories_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "<filename>" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "<http-status>"
    And as "user0" file "<filename>" should not exist
    Examples:
      | filename                        | http-status | comment     |
      | thisendswith.bad                | 507         | issue-36645 |
      | .github                         | 403         | ok          |
      | this-containsvirusinthename.txt | 403         | ok          |

  @skipOnOcV10.3
  Scenario: upload a file to a filename that does not match excluded_directories_regex using old chunking
    # Note: we have to write JSON for the value, and to get a backslash in the double-quotes we have to escape it
    # The actual regular expressions end up being endswith\.bad$ and ^\.git
    Given the administrator has updated system config key "excluded_directories_regex" with value '["endswith\\.bad$","^\\.git","containsvirusinthename"]' and type "json"
    When user "user0" uploads file "filesForUpload/textfile.txt" to "not-contains-virus-in-the-name.txt" in 3 chunks using the WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "not-contains-virus-in-the-name.txt" should exist
