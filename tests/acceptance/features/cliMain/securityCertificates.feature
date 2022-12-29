@cli @temporary_storage_on_server
Feature: security certificates
  As an admin
  I want to be able to manage the ownCloud security certificates
  So that I can ensure the proper encryption mechanism


  Scenario: Import a security certificate
    Given the administrator has copied file "tests/data/certificates/goodCertificate.crt" to "goodCertificate.crt" in temporary storage on the system under test
    When the administrator imports security certificate from file "goodCertificate.crt" in temporary storage on the system under test
    Then the command should have been successful
    When the administrator invokes occ command "security:certificates"
    Then the command should have been successful
    And the command output table should contain the following text:
      | table_column        |
      | goodCertificate.crt |


  Scenario: Import a security certificate specifying a file that does not exist
    When the administrator imports security certificate from file "aFileThatDoesNotExist.crt" in temporary storage on the system under test
    Then the command should have failed with exit code 1
    And the command output should contain the text "certificate not found"


  Scenario: List security certificates when multiple certificates are imported
    Given the administrator has copied file "tests/data/certificates/goodCertificate.crt" to "goodCertificate.crt" in temporary storage on the system under test
    And the administrator has copied file "tests/data/certificates/badCertificate.crt" to "badCertificate.crt" in temporary storage on the system under test
    And the administrator has imported security certificate from file "goodCertificate.crt" in temporary storage on the system under test
    And the administrator has imported security certificate from file "badCertificate.crt" in temporary storage on the system under test
    When the administrator invokes occ command "security:certificates"
    And the command output table should contain the following text:
      | table_column        |
      | goodCertificate.crt |
      | badCertificate.crt  |


  Scenario: Remove a security certificate
    Given the administrator has copied file "tests/data/certificates/goodCertificate.crt" to "goodCertificate.crt" in temporary storage on the system under test
    And the administrator has copied file "tests/data/certificates/badCertificate.crt" to "badCertificate.crt" in temporary storage on the system under test
    And the administrator has imported security certificate from file "goodCertificate.crt" in temporary storage on the system under test
    And the administrator has imported security certificate from file "badCertificate.crt" in temporary storage on the system under test
    When the administrator removes the security certificate "goodCertificate.crt"
    Then the command should have been successful
    When the administrator invokes occ command "security:certificates"
    And the command output table should contain the following text:
      | table_column       |
      | badCertificate.crt |


  Scenario: Remove a security certificate that is not installed
    When the administrator removes the security certificate "someCertificate.crt"
    Then the command should have failed with exit code 1
    And the command output should contain the text "certificate not found"


  Scenario: Import random file as certificate
    Given the administrator has copied file "tests/data/lorem.txt" to "lorem.txt" in temporary storage on the system under test
    When the administrator imports security certificate from file "lorem.txt" in temporary storage on the system under test
    Then the command error output should contain the text "Certificate could not get parsed."
