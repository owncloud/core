@cli
Feature: security certificates
  As an admin
  I want to be able to manage the ownCloud security certificates
  So that I can ensure the proper encrpytion mechanism

  Scenario: Import a security certificate
    When the administrator imports security certificate from the path "tests/data/certificates/goodCertificate.crt"
    Then the command should have been successful
    When the administrator invokes occ command "security:certificates"
    Then the command should have been successful
    And the command output table should contain the following text:
      | table_column         |
      | goodCertificate.crt  |

  Scenario: List security certificates when multiple certificates are imported
    Given the administrator has imported security certificate from the path "tests/data/certificates/goodCertificate.crt"
    And the administrator has imported security certificate from the path "tests/data/certificates/badCertificate.crt"
    When the administrator invokes occ command "security:certificates"
    And the command output table should contain the following text:
    | table_column         |
    | goodCertificate.crt  |
    | badCertificate.crt   |

  Scenario: Remove a security certificate
    Given the administrator has imported security certificate from the path "tests/data/certificates/goodCertificate.crt"
    And the administrator has imported security certificate from the path "tests/data/certificates/badCertificate.crt"
    When the administrator removes the security certificate "goodCertificate.crt"
    Then the command should have been successful
    When the administrator invokes occ command "security:certificates"
    And the command output table should contain the following text:
      | table_column         |
      | badCertificate.crt   |

  @issue-35364
  Scenario: Remove a security certificate that is not installed
    When the administrator removes the security certificate "someCertificate.crt"
    Then the command should have been successful
    # Then the command should not have been successful

  Scenario: Import random file as certificate
    When the administrator imports security certificate from the path "tests/data/lorem.txt"
    Then the command output should contain the text "Certificate could not get parsed."