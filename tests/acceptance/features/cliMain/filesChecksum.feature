@cli @local_storage @TestAlsoOnExternalUserBackend
Feature: files checksum command

  Scenario: Administrator verifies the checksum of all the files
    When the administrator invokes occ command "files:checksum:verify"
    Then the command should have been successful

  Scenario: Administrator fixes the mismatched checksums
    When the administrator invokes occ command "files:checksum:verify -r"
    Then the command should have been successful

  Scenario: Administrator verifies the checksum of all the files of a user
    Given user "user0" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify --user=user0"
    Then the command should have been successful

  Scenario: Administrator fixes the mismatched checksums of all the files of a user
    Given user "user0" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify -r --user=user0"
    Then the command should have been successful

  Scenario: Administrator fixes the mismatched checksums of files in a certain path of a users
    Given user "user0" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify -r --path=FOLDER --user=user0"
    Then the command should have been successful

  Scenario: Administrator tries to fix the mismatched checksums of files in a certain path without providing user
    When the administrator invokes occ command "files:checksum:verify -r --path=/FOLDER"
    Then the command output should contain the text 'Please provide user when path is provided as argument'
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of all the files of a not-existing user
    When the administrator invokes occ command "files:checksum:verify --user=does-not-exist"
    Then the command output should contain the text 'User "does-not-exist" does not exist'
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of files in a certain path that does not exist
    Given user "user0" has been created with default attributes and skeleton files
    When the administrator invokes occ command "files:checksum:verify --user=user0 --path=/dev/null"
    Then the command output should contain the text 'Path "/user0/files/dev/null" not found'
    And the command should have failed with exit code 2

  Scenario: Administrator tries to verify the checksum of files in a certain path of a not existing user
    When the administrator invokes occ command "files:checksum:verify --user=does-not-exist --path=/dev/null"
    Then the command output should contain the text 'User "does-not-exist" does not exist'
    And the command should have failed with exit code 2
