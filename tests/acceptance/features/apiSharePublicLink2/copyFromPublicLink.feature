@api @files_sharing-app-required @public_link_share-feature-required @issue-ocis-reva-310
Feature: copying from public link share

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/PARENT"
    And the administrator has enabled DAV tech_preview

  Scenario: Copy file within a public link folder new public WebDAV API
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/copy1.txt" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/copy1.txt" for user "Alice" should be "some data"

  Scenario: Copy folder within a public link folder new public WebDAV API
    Given user "Alice" has created folder "/PARENT/testFolder"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/testFolder/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies folder "/testFolder" to "/testFolder-copy" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" folder "/PARENT/testFolder" should exist
    And as "Alice" folder "/PARENT/testFolder-copy" should exist
    And the content of file "/PARENT/testFolder/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/testFolder-copy/testfile.txt" for user "Alice" should be "some data"

  Scenario: Copy file within a public link folder to a new folder
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created folder "/PARENT/testFolder"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/testFolder/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/testFolder/copy1.txt" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/testFolder/copy1.txt" for user "Alice" should be "some data"

  Scenario: Copy file within a public link folder to same file name as already existing one
    Given user "Alice" has uploaded file with content "some data 0" to "/PARENT/testfile.txt"
    And user "Alice" has uploaded file with content "some data 1" to "/PARENT/copy1.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/copy1.txt" should exist
    And the content of file "/PARENT/copy1.txt" for user "Alice" should be "some data 0"

  @skipOnOcis @issue-ocis-reva-373 @issue-core-37683
  Scenario: Copy folder within a public link folder to the same folder name as an already existing file
    Given user "Alice" has created folder "/PARENT/testFolder"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/testFolder/testfile.txt"
    And user "Alice" has uploaded file with content "some data 1" to "/PARENT/copy1.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies folder "/testFolder" to "/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" folder "/PARENT/testFolder" should exist
    And as "Alice" folder "/PARENT/copy1.txt" should exist
    And as "Alice" file "/PARENT/copy1.txt/testfile.txt" should exist
    And the content of file "/PARENT/testFolder/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/copy1.txt/testfile.txt" for user "Alice" should be "some data"

  Scenario: Copy file within a public link folder and delete file
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/copy1.txt" using the new public WebDAV API
    And user "Alice" deletes file "/PARENT/copy1.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/PARENT/copy1.txt" should not exist

  @skipOnOcis @issue-ocis-reva-373 @issue-core-37683
  Scenario: Copy file within a public link folder to a file with name same as an existing folder
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created folder "/PARENT/new-folder"
    And user "Alice" has uploaded file with content "some data 1" to "/PARENT/new-folder/testfile1.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/new-folder" using the new public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/new-folder" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/new-folder" for user "Alice" should be "some data"

  Scenario Outline: Copy file with special characters in it's name within a public link folder
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/<file-name>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/<file-name>" to "/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/<file-name>" should exist
    And as "Alice" file "/PARENT/copy1.txt" should exist
    And the content of file "/PARENT/<file-name>" for user "Alice" should be "some data"
    And the content of file "/PARENT/copy1.txt" for user "Alice" should be "some data"
    Examples:
      | file-name        |
      | नेपाली.txt       |
      | strängé file.txt |
      | C++ file.cpp     |
      | sample,1.txt     |

  Scenario Outline: Copy file within a public link folder to a file with special characters in it's name
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/<destination-file-name>" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/<destination-file-name>" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/<destination-file-name>" for user "Alice" should be "some data"
    Examples:
      | destination-file-name |
      | नेपाली.txt            |
      | strängé file.txt      |
      | C++ file.cpp          |
      | sample,1.txt          |

  Scenario Outline: Copy file within a public link folder into a folder with special characters
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created folder "/PARENT/<destination-folder-name>"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/<destination-folder-name>/copy1.txt" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And as "Alice" file "/PARENT/<destination-folder-name>/copy1.txt" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    And the content of file "/PARENT/<destination-folder-name>/copy1.txt" for user "Alice" should be "some data"
    Examples:
      | destination-folder-name |
      | नेपाली.txt              |
      | strängé file.txt        |
      | C++ file.cpp            |
      | sample,1.txt            |

  @skipOnOcis @issue-ocis-reva-368
  Scenario Outline: Copy file within a public link folder to a file with unusual destination names
    Given user "Alice" has uploaded file with content "some data" to "/PARENT/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies file "/testfile.txt" to "/<destination-file-name>" using the new public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/PARENT/testfile.txt" should exist
    And the content of file "/PARENT/testfile.txt" for user "Alice" should be "some data"
    Examples:
      | destination-file-name |
      | testfile.txt          |
      |                       |

  @skipOnOcis @issue-ocis-reva-368
  Scenario Outline: Copy folder within a public link folder to a folder with unusual destination names
    Given user "Alice" has created folder "/PARENT/testFolder"
    And user "Alice" has uploaded file with content "some data" to "/PARENT/testFolder/testfile.txt"
    And user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public copies folder "/testFolder" to "/<destination-file-name>" using the new public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" folder "/PARENT/testFolder" should exist
    And the content of file "/PARENT/testFolder/testfile.txt" for user "Alice" should be "some data"
    Examples:
      | destination-file-name |
      | testFolder            |
      |                       |
