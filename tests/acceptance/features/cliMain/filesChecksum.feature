@cli @local_storage @TestAlsoOnExternalUserBackend
Feature: files checksum command

  @skipOnEncryptionType:user-keys @issue-encryption-182
  Scenario: Administrator verifies the checksum of all the files
    When the administrator invokes occ command "files:checksum:verify"
    Then the command should have been successful

  @skipOnEncryptionType:user-keys @issue-encryption-182
  Scenario: Administrator fixes the mismatched checksums
    When the administrator invokes occ command "files:checksum:verify -r"
    Then the command should have been successful

  @skipOnEncryptionType:user-keys @issue-encryption-182
  Scenario: Administrator verifies the checksum of all the files of a user
    Given user "Alice" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify --user=%username%" for user "Alice"
    Then the command should have been successful

  @skipOnEncryptionType:user-keys @issue-encryption-182
  Scenario: Administrator fixes the mismatched checksums of all the files of a user
    Given user "Alice" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify -r --user=%username%" for user "Alice"
    Then the command should have been successful

  Scenario: Administrator fixes the mismatched checksums of files in a certain path of a users
    Given user "Alice" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify -r --path=FOLDER --user=%username%" for user "Alice"
    Then the command should have been successful

  Scenario: Administrator tries to fix the mismatched checksums of files in a certain path without providing user
    When the administrator invokes occ command "files:checksum:verify -r --path=/FOLDER"
    Then the command output should contain the text 'Please provide user when path is provided as argument'
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of all the files of a not-existing user
    When the administrator invokes occ command "files:checksum:verify --user=%username%" for user "does-not-exist"
    Then the command output should contain the text 'User "%username%" does not exist' about user "does-not-exist"
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of files in a certain path that does not exist
    Given user "Alice" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify --user=%username% --path=/dev/null" for user "Alice"
    Then the command output should contain the text 'Path "/%username%/files/dev/null" not found' about user "Alice"
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of files in a certain path of a not existing user
    When the administrator invokes occ command "files:checksum:verify --user=%username% --path=/dev/null" for user "does-not-exist"
    Then the command output should contain the text 'User "%username%" does not exist' about user "does-not-exist"
    And the command should have failed with exit code 2
