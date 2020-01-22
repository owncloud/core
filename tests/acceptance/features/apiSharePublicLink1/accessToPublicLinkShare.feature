@api @TestAlsoOnExternalUserBackend @public_link_share-feature-required @files_sharing-app-required
Feature: accessing a public link share

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  @skipOnOcV10.3
  Scenario: Access to the preview of password protected public link without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "user0" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
      | password    | testpass1       |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"

  Scenario: Access to the preview of public shared file without password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "user0" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"

  @skipOnOcV10.3
  Scenario: Access to the preview of password protected public shared file inside a folder without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "user0" has moved file "textfile0.txt" to "FOLDER/textfile0.txt"
    And user "user0" has created a public link share with settings
      | path        | /FOLDER   |
      | permissions | change    |
      | password    | testpass1 |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"
    When the public accesses the preview of file "textfile0.txt" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"

  Scenario: Access to the preview of public shared file inside a folder without password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "user0" has moved file "textfile0.txt" to "FOLDER/textfile0.txt"
    And user "user0" has created a public link share with settings
      | path        | /FOLDER |
      | permissions | change  |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"
    When the public accesses the preview of file "textfile0.txt" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"
