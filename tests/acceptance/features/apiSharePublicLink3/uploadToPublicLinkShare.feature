@api @files_sharing-app-required @public_link_share-feature-required @issue-ocis-reva-315 @issue-ocis-reva-316

Feature: upload to a public link share

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "FOLDER"

  @smokeTest @issue-ocis-2079
  Scenario: Uploading same file to a public upload-only share multiple times via old API
    # The old API needs to have the header OC-Autorename: 1 set to do the autorename
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test.txt" with content "test" using the old public WebDAV API
    And the public uploads file "test.txt" with content "test2" with auto-rename mode using the old public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "Alice" should be "test2"

  @smokeTest @issue-ocis-reva-286
  Scenario: Uploading same file to a public upload-only share multiple times via new API
    # The new API does the autorename automatically in upload-only folders
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    And the public uploads file "test.txt" with content "test2" using the new public WebDAV API
    Then the HTTP status code of responses on all endpoints should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "Alice" should be "test2"


  Scenario Outline: Uploading file to a public upload-only share using public API that was deleted does not work
    Given using <dav-path> DAV path
    And user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    And user "Alice" has deleted folder "/FOLDER"
    When the public uploads file "test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    And the HTTP status code should be "404"

    @issue-ocis-2079
    Examples:
      | dav-path | public-webdav-api-version |
      | old      | old                       |
      | new      | old                       |

    @issue-ocis-reva-290
    Examples:
      | dav-path | public-webdav-api-version |
      | old      | new                       |
      | new      | new                       |


  Scenario Outline: Uploading file to a public read-only share folder with public API does not work
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | read   |
    When the public uploads file "test.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    And the HTTP status code should be "403"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Uploading to a public upload-only share with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test-file"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Uploading to a public upload-only share with password with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | create   |
    When the public uploads file "test.txt" with password "%public%" and content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test-file"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Uploading to a public read/write share with password with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER   |
      | password    | %public% |
      | permissions | change   |
    When the public uploads file "test.txt" with password "%public%" and content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test-file"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Uploading file to a public shared folder with read/write permission when the sharer has insufficient quota does not work with public API
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | change |
    And the quota of user "Alice" has been set to "0"
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "507"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-195
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Uploading file to a public shared folder with upload-only permission when the sharer has insufficient quota does not work with public API
    When user "Alice" creates a public link share using the sharing API with settings
      | path        | FOLDER |
      | permissions | create |
    And the quota of user "Alice" has been set to "0"
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "507"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-195
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Uploading file to a public shared folder does not work when allow public uploads has been disabled after sharing the folder with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Uploading file to a public shared folder does not work when allow public uploads has been disabled before sharing and again enabled after sharing the folder with public API
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And user "Alice" has created a public link share with settings
      | path | FOLDER |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "yes"
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    And the HTTP status code should be "403"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-41
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Uploading file to a public shared folder works when allow public uploads has been disabled and again enabled after sharing the folder with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER |
      | permissions | create |
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    And parameter "shareapi_allow_public_upload" of app "core" has been set to "yes"
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test-file"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-41
    Examples:
      | public-webdav-api-version |
      | new                       |

  @smokeTest
  Scenario Outline: Uploading to a public upload-write and no edit and no overwrite share with public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test.txt" with content "test-file" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test-file"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @smokeTest @issue-ocis-2079
  Scenario: Uploading same file to a public upload-write and no edit and no overwrite share multiple times with old public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test.txt" with content "test" using the old public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    When the public uploads file "test.txt" with content "test2" using the old public WebDAV API
    # Uncomment these once the issue is fixed
    # Then the HTTP status code should be "201"
    # And the content of file "/FOLDER/test.txt" for user "Alice" should be "test"
    # And the content of file "/FOLDER/test (2).txt" for user "Alice" should be "test2"
    Then the HTTP status code should be "403"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test"

  @smokeTest @issue-ocis-reva-286
  Scenario: Uploading same file to a public upload-write and no edit and no overwrite share multiple times with new public API
    Given user "Alice" has created a public link share with settings
      | path        | FOLDER          |
      | permissions | uploadwriteonly |
    When the public uploads file "test.txt" with content "test" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And the following headers should match these regular expressions
      | ETag | /^"[a-f0-9:\.]{1,32}"$/ |
    When the public uploads file "test.txt" with content "test2" using the new public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "/FOLDER/test.txt" for user "Alice" should be "test"
    And the content of file "/FOLDER/test (2).txt" for user "Alice" should be "test2"
