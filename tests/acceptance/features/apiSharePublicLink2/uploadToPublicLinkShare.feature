@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @public_link_share-feature-required
Feature: upload to a public link share

  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @smokeTest
  Scenario: Uploading same file to a public upload-only share multiple times via old API
    # The old API needs to have the header OC-Autorename: 1 set to do the autorename
    Given as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test.txt" with content "test" using the old public WebDAV API
    And the public uploads file "test.txt" with content "test2" with autorename mode using the old public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    And the content of file "/FOLDER/test.txt" for user "user0" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "user0" should be "test2"

  @smokeTest
  Scenario: Uploading same file to a public upload-only share multiple times via new API
    # The new API does the autorename automatically in upload-only folders
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    When the public uploads file "test.txt" with content "test2" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    And the content of file "/FOLDER/test.txt" for user "user0" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "user0" should be "test2"

  @issue-36055
  Scenario Outline: Uploading file to a public upload-only share that was deleted does not work
    Given using <dav-path> DAV path
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When user "user0" deletes file "/FOLDER" using the WebDAV API
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "404"
    #And uploading a file should not work using the new public WebDAV API
    #And the HTTP status code should be "404"
    Examples:
      | dav-path |
      | old      |
      | new      |

  @issue-36055
  #After fixing the issue delete this Scenario and use the commented-out step in the above scenario
  Scenario: Uploading file to a public upload-only share that was deleted does not work
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When user "user0" deletes file "/FOLDER" using the WebDAV API
    And the public uploads file "does-not-matter.txt" with content "does not matter" using the new public WebDAV API
    Then the HTTP status code should be "500"

  Scenario: Uploading file to a public read-only share folder does not work
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | read   |
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading file to a public read-only share folder does not work
    Given the administrator has enabled DAV tech_preview
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | read   |
    Then uploading a file should not work using the new public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading to a public upload-only share
    Given as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test-old.txt" with content "test-old" using the old public WebDAV API
    Then the content of file "/FOLDER/test-old.txt" for user "user0" should be "test-old"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |

  Scenario: Uploading to a public upload-only share
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test-new.txt" with content "test-new" using the new public WebDAV API
    Then the content of file "/FOLDER/test-new.txt" for user "user0" should be "test-new"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |

  Scenario: Uploading to a public upload-only share with password
    Given as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | create   |
    When the public uploads file "test-old.txt" with password "%public%" and content "test-old" using the old public WebDAV API
    Then the content of file "/FOLDER/test-old.txt" for user "user0" should be "test-old"

  Scenario: Uploading to a public upload-only share with password
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | create   |
    When the public uploads file "test-new.txt" with password "%public%" and content "test-new" using the new public WebDAV API
    Then the content of file "/FOLDER/test-new.txt" for user "user0" should be "test-new"

  Scenario: Uploading to a public read/write share with password
    Given as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | change   |
    When the public uploads file "test-old.txt" with password "%public%" and content "test-old" using the old public WebDAV API
    Then the content of file "/FOLDER/test-old.txt" for user "user0" should be "test-old"

  Scenario: Uploading to a public read/write share with password
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | change   |
    When the public uploads file "test-new.txt" with password "%public%" and content "test-new" using the new public WebDAV API
    Then the content of file "/FOLDER/test-new.txt" for user "user0" should be "test-new"

  Scenario: Uploading file to a public shared folder with read/write permission when the sharer has insufficient quota does not work
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | change |
    When the quota of user "user0" has been set to "0"
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "507"

  Scenario: Uploading file to a public shared folder with read/write permission when the sharer has insufficient quota does not work
    Given the administrator has enabled DAV tech_preview
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | change |
    When the quota of user "user0" has been set to "0"
    And uploading a file should not work using the new public WebDAV API
    And the HTTP status code should be "507"

  Scenario: Uploading file to a public shared folder with upload-only permission when the sharer has insufficient quota does not work
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | create |
    When the quota of user "user0" has been set to "0"
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "507"

  Scenario: Uploading file to a public shared folder with upload-only permission when the sharer has insufficient quota does not work
    Given the administrator has enabled DAV tech_preview
    When user "user0" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | create |
    When the quota of user "user0" has been set to "0"
    And uploading a file should not work using the new public WebDAV API
    And the HTTP status code should be "507"

  Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled after sharing the folder
    Given user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "no"
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled after sharing the folder
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "no"
    And uploading a file should not work using the new public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled before sharing and again enabled after sharing the folder
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | all    |
    When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "yes"
    Then uploading a file should not work using the old public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading file to a public shared folder does not work when allow public uploads has been disabled before sharing and again enabled after sharing the folder
    Given the administrator has enabled DAV tech_preview
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | all    |
    When the administrator sets parameter "shareapi_allow_public_upload" of app "core" to "yes"
    And uploading a file should not work using the new public WebDAV API
    And the HTTP status code should be "403"

  Scenario: Uploading file to a public shared folder works when allow public uploads has been disabled and again enabled after sharing the folder
    Given user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "yes"
    When the public uploads file "test-old.txt" with content "test-old" using the old public WebDAV API
    Then the content of file "/FOLDER/test-old.txt" for user "user0" should be "test-old"

  Scenario: Uploading file to a public shared folder works when allow public uploads has been disabled and again enabled after sharing the folder
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "yes"
    When the public uploads file "test-new.txt" with content "test-new" using the new public WebDAV API
    Then the content of file "/FOLDER/test-new.txt" for user "user0" should be "test-new"

  @smokeTest
  Scenario: Uploading to a public upload-write and no edit and no overwrite share
    Given as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test-old.txt" with content "test-old" using the old public WebDAV API
    Then the content of file "/FOLDER/test-old.txt" for user "user0" should be "test-old"

  @smokeTest
  Scenario: Uploading to a public upload-write and no edit and no overwrite share
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test-new.txt" with content "test-new" using the new public WebDAV API
    Then the content of file "/FOLDER/test-new.txt" for user "user0" should be "test-new"

  @smokeTest
  Scenario: Uploading same file to a public upload-write and no edit and no overwrite share multiple times
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test.txt" with content "test" using the old public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    When the public uploads file "test.txt" with content "test2" using the old public WebDAV API
    # Uncomment these once the issue is fixed
    # Then the HTTP status code should be "201"
    # And the content of file "/FOLDER/test.txt" for user "user0" should be "test"
    # And the content of file "/FOLDER/test (2).txt" for user "user0" should be "test2"
    Then the HTTP status code should be "403"
    And the content of file "/FOLDER/test.txt" for user "user0" should be "test"

  @smokeTest
  Scenario: Uploading same file to a public upload-write and no edit and no overwrite share multiple times
    Given the administrator has enabled DAV tech_preview
    And as user "user0"
    And the user has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9]{1,32}"$/ |
    When the public uploads file "test.txt" with content "test2" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "user0" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "user0" should be "test2"
