@api @public_link_share-feature-required @files_sharing-app-required @issue-ocis-reva-282
Feature: accessing a public link share

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |


  Scenario: Access to the preview of password protected public link without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "Alice" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
      | password    | testpass1       |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"


  Scenario: Access to the preview of public shared file without password
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "Alice" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"


  Scenario: Access to the preview of password protected public shared file inside a folder without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "FOLDER/textfile0.txt"
    And user "Alice" has created a public link share with settings
      | path        | /FOLDER   |
      | permissions | change    |
      | password    | testpass1 |
    When the public accesses the preview of the following files from the last shared public link using the sharing API
      | path           |
      | testavatar.jpg |
      | textfile0.txt  |
    Then the HTTP status code of responses on all endpoints should be "404"


  Scenario: Access to the preview of public shared file inside a folder without password
    Given the administrator has enabled DAV tech_preview
    And user "Alice" has created folder "FOLDER"
    And user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "FOLDER/textfile0.txt"
    And user "Alice" has created a public link share with settings
      | path        | /FOLDER |
      | permissions | change  |
    When the public accesses the preview of the following files from the last shared public link using the sharing API
      | path           |
      | testavatar.jpg |
      | textfile0.txt  |
    Then the HTTP status code of responses on all endpoints should be "200"


  Scenario Outline: Request to non-existent public link
    When a user requests "<endpoint>" with "<method>" and no authentication
    Then the HTTP status code should be "404"
    Examples: 
      | endpoint                                        | method   |
      | /remote.php/dav/public-files/thisWillNeverExist | GET      |
      | /remote.php/dav/public-files/thisWillNeverExist | PUT      |
      | /remote.php/dav/public-files/thisWillNeverExist | PROPFIND |
      | /s/thisWillNeverExist                           | GET      |
