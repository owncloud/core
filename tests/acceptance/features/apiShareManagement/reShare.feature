@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario Outline: User is not allowed to reshare file
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions 3
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions 3 using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    But as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is allowed to reshare file with the same permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions 17
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions 17 using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is allowed to reshare file with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions 19
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions 17 using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to reshare file with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions 17
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions 19 using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    But as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: Update of reshare can reduce permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 23
    And user "user1" has shared folder "/TMP" with user "user2" with permissions 23
    When user "user1" updates the last share using the sharing API with
      | permissions | 17 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-35528
  Scenario Outline: Update of reshare can increase permissions to the maximum allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 23
    And user "user1" has shared folder "/TMP" with user "user2" with permissions 17
    When user "user1" updates the last share using the sharing API with
      | permissions | 23 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    #Then the OCS status code should be "<ocs_status_code>"
    #And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
      #| ocs_api_version | ocs_status_code |
      #| 1               | 100             |
      #| 2               | 200             |

  Scenario Outline: Do not allow update of reshare to exceed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 21
    And user "user1" has shared folder "/TMP" with user "user2" with permissions 21
    When user "user1" updates the last share using the sharing API with
      | permissions | 31 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is allowed to reshare a sub-folder with the same permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 17
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions 17 using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    And as "user1" file "/TMP/SUB" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to reshare a sub-folder with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 17
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions 31 using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/SUB" should not exist
    But as "user1" file "/TMP/SUB" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is allowed to update reshare of a sub-folder with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 23
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions 23
    When user "user1" updates the last share using the sharing API with
      | permissions | 17 |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    But user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @issue-35528
  Scenario Outline: User is allowed to update reshare of a sub-folder to the maximum allowed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 23
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions 17
    When user "user1" updates the last share using the sharing API with
      | permissions | 23 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    #Then the OCS status code should be "<ocs_status_code>"
    #And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    And user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    #And user "user2" should be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |
      #| ocs_api_version | ocs_status_code |
      #| 1               | 100             |
      #| 2               | 200             |

  Scenario Outline: User is not allowed to update reshare of a sub-folder with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions 17
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions 17
    When user "user1" updates the last share using the sharing API with
      | permissions | 31 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/SUB" should exist
    But user "user2" should not be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    But user "user1" should not be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario: Reshared files can be still accessed if a user in the middle removes it.
    Given user "user2" has been created with default attributes and without skeleton files
    And user "user3" has been created with default attributes and without skeleton files
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user1" has moved file "/textfile0.txt" to "/textfile0_shared.txt"
    And user "user1" has shared file "textfile0_shared.txt" with user "user2"
    And user "user2" has shared file "textfile0_shared.txt" with user "user3"
    When user "user1" deletes file "/textfile0_shared.txt" using the WebDAV API
    Then the content of file "/textfile0_shared.txt" for user "user2" should be "ownCloud test text file 0" plus end-of-line
    Then the content of file "/textfile0_shared.txt" for user "user3" should be "ownCloud test text file 0" plus end-of-line

  @public_link_share-feature-required
  Scenario Outline: creating a public link from a share with read permission only is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 1
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | false |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: creating a public link from a share with share+read only permissions is allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has uploaded file with content "some content" to "/test/file.txt"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | false |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download file "file.txt" from inside the last public shared folder and the content should be "some content"
    But publicly uploading a file should not work
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: creating an upload public link from a share with share+read only permissions is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | permissions  | 15    |
      | publicUpload | true  |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: creating a public link from a share with read+write permissions only is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has shared folder "/test" with user "user1" with permissions 15
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | true  |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: creating a public link from a share with share+read+write permissions is allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has uploaded file with content "some content" to "/test/file.txt"
    And user "user0" has shared folder "/test" with user "user1" with permissions 31
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | publicUpload | false |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download file "file.txt" from inside the last public shared folder and the content should be "some content"
    But publicly uploading a file should not work
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: creating an upload public link from a share with share+read+write permissions is allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has uploaded file with content "some content" to "/test/file.txt"
    And user "user0" has shared folder "/test" with user "user1" with permissions 31
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test |
      | permissions  | 15    |
      | publicUpload | true  |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the public should be able to download file "file.txt" from inside the last public shared folder and the content should be "some content"
    And publicly uploading a file should work
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required
  Scenario Outline: creating an upload public link from a sub-folder of a share with share+read only permissions is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has created folder "/test/sub"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    When user "user1" creates a public link share using the sharing API with settings
      | path         | /test/sub |
      | permissions  | 15        |
      | publicUpload | true      |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @public_link_share-feature-required
  Scenario Outline: increasing permissions of a public link of a share with share+read only permissions is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has created folder "/test/sub"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    And user "user1" has created a public link share with settings
      | path         | /test |
      | permissions  | 1     |
      | publicUpload | false |
    When user "user1" updates the last share using the sharing API with
      | permissions | 15 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And publicly uploading a file should not work
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: increasing permissions of a public link from a sub-folder of a share with share+read only permissions is not allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has created folder "/test"
    And user "user0" has created folder "/test/sub"
    And user "user0" has shared folder "/test" with user "user1" with permissions 17
    And user "user1" has created a public link share with settings
      | path         | /test/sub |
      | permissions  | 1         |
      | publicUpload | false     |
    And publicly uploading a file should not work
    When user "user1" updates the last share using the sharing API with
      | permissions | 15 |
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And publicly uploading a file should not work
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: resharing a file is not allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions 19
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions 19 using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: ordinary sharing is allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user0" shares file "/textfile0.txt" with user "user1" with permissions 19 using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |
