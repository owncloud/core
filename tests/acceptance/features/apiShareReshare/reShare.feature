@api @TestAlsoOnExternalUserBackend
Feature: sharing

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes and skeleton files
    And user "user1" has been created with default attributes and without skeleton files

  Scenario Outline: User is not allowed to reshare file when reshare permission is not given
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions "read,update"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions "read,update" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    But as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is not allowed to reshare folder when reshare permission is not given
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared folder "/FOLDER" with user "user1" with permissions "read,update"
    When user "user1" shares folder "/FOLDER" with user "user2" with permissions "read,update" using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/FOLDER" should not exist
    But as "user1" folder "/FOLDER" should exist
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: User is allowed to reshare file with the same permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions "share,read"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions "share,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is allowed to reshare folder with the same permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared folder "/FOLDER" with user "user1" with permissions "share,read"
    When user "user1" shares folder "/FOLDER" with user "user2" with permissions "share,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/FOLDER" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is allowed to reshare file with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions "share,update,read"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions "share,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is allowed to reshare folder with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared folder "/FOLDER" with user "user1" with permissions "share,update,read"
    When user "user1" shares folder "/FOLDER" with user "user2" with permissions "share,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/FOLDER" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to reshare file and set more permissions bits
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions <received_permissions>
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" file "/textfile0.txt" should not exist
    But as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | http_status_code | received_permissions | reshare_permissions |
      # passing on more bits including reshare
      | 1               | 200              | 17                   | 19                  |
      | 2               | 404              | 17                   | 19                  |
      | 1               | 200              | 17                   | 23                  |
      | 2               | 404              | 17                   | 23                  |
      | 1               | 200              | 17                   | 31                  |
      | 2               | 404              | 17                   | 31                  |
      # passing on more bits but not reshare
      | 1               | 200              | 17                   | 3                   |
      | 2               | 404              | 17                   | 3                   |
      | 1               | 200              | 17                   | 7                   |
      | 2               | 404              | 17                   | 7                   |
      | 1               | 200              | 17                   | 15                  |
      | 2               | 404              | 17                   | 15                  |

  Scenario Outline: User is allowed to reshare file and set create (4) or delete (8) permissions bits, which get ignored
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions <received_permissions>
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the fields of the last response should include
      | share_with  | user2                 |
      | file_target | /textfile0.txt        |
      | path        | /textfile0.txt        |
      | permissions | <granted_permissions> |
      | uid_owner   | user1                 |
    And as "user2" file "/textfile0.txt" should exist
    # The receiver of the reshare can always delete their received share, even though they do not have delete permission
    And user "user2" should be able to delete file "/textfile0.txt"
    # But the upstream sharers will still have the file
    But as "user1" file "/textfile0.txt" should exist
    And as "user0" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code | received_permissions | reshare_permissions | granted_permissions |
      | 1               | 100             | 19                   | 23                  | 19                  |
      | 2               | 200             | 19                   | 23                  | 19                  |
      | 1               | 100             | 19                   | 31                  | 19                  |
      | 2               | 200             | 19                   | 31                  | 19                  |
      | 1               | 100             | 19                   | 7                   | 3                   |
      | 2               | 200             | 19                   | 7                   | 3                   |
      | 1               | 100             | 19                   | 15                  | 3                   |
      | 2               | 200             | 19                   | 15                  | 3                   |
      | 1               | 100             | 17                   | 21                  | 17                  |
      | 2               | 200             | 17                   | 21                  | 17                  |
      | 1               | 100             | 17                   | 5                   | 1                   |
      | 2               | 200             | 17                   | 5                   | 1                   |
      | 1               | 100             | 17                   | 25                  | 17                  |
      | 2               | 200             | 17                   | 25                  | 17                  |
      | 1               | 100             | 17                   | 9                   | 1                   |
      | 2               | 200             | 17                   | 9                   | 1                   |

  Scenario Outline: User is not allowed to reshare folder and set more permissions bits
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared folder "/PARENT" with user "user1" with permissions <received_permissions>
    When user "user1" shares folder "/PARENT" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/PARENT" should not exist
    But as "user1" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code | received_permissions | reshare_permissions |
      # try to pass on more bits including reshare
      | 1               | 200              | 17                   | 19                  |
      | 2               | 404              | 17                   | 19                  |
      | 1               | 200              | 17                   | 21                  |
      | 2               | 404              | 17                   | 21                  |
      | 1               | 200              | 17                   | 23                  |
      | 2               | 404              | 17                   | 23                  |
      | 1               | 200              | 17                   | 31                  |
      | 2               | 404              | 17                   | 31                  |
      | 1               | 200              | 19                   | 23                  |
      | 2               | 404              | 19                   | 23                  |
      | 1               | 200              | 19                   | 31                  |
      | 2               | 404              | 19                   | 31                  |
      # try to pass on more bits but not reshare
      | 1               | 200              | 17                   | 3                   |
      | 2               | 404              | 17                   | 3                   |
      | 1               | 200              | 17                   | 5                   |
      | 2               | 404              | 17                   | 5                   |
      | 1               | 200              | 17                   | 7                   |
      | 2               | 404              | 17                   | 7                   |
      | 1               | 200              | 17                   | 15                  |
      | 2               | 404              | 17                   | 15                  |
      | 1               | 200              | 19                   | 7                   |
      | 2               | 404              | 19                   | 7                   |
      | 1               | 200              | 19                   | 15                  |
      | 2               | 404              | 19                   | 15                  |

  Scenario Outline: User is not allowed to reshare folder and add delete permission bit (8)
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared folder "/PARENT" with user "user1" with permissions <received_permissions>
    When user "user1" shares folder "/PARENT" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/PARENT" should not exist
    But as "user1" folder "/PARENT" should exist
    Examples:
      | ocs_api_version | http_status_code | received_permissions | reshare_permissions |
      # try to pass on extra delete (including reshare)
      | 1               | 200              | 17                   | 25                  |
      | 2               | 404              | 17                   | 25                  |
      | 1               | 200              | 19                   | 27                  |
      | 2               | 404              | 19                   | 27                  |
      | 1               | 200              | 23                   | 31                  |
      | 2               | 404              | 23                   | 31                  |
      # try to pass on extra delete (but not reshare)
      | 1               | 200              | 17                   | 9                   |
      | 2               | 404              | 17                   | 9                   |
      | 1               | 200              | 19                   | 11                  |
      | 2               | 404              | 19                   | 11                  |
      | 1               | 200              | 23                   | 15                  |
      | 2               | 404              | 23                   | 15                  |

  Scenario Outline: Update of reshare can reduce permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP" with user "user2" with permissions "share,create,update,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Update of reshare can increase permissions to the maximum allowed
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP" with user "user2" with permissions "share,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,create,update,read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: Do not allow update of reshare to exceed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,read"
    And user "user1" has shared folder "/TMP" with user "user2" with permissions "share,create,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | all |
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
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,read"
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions "share,read" using the sharing API
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
    And user "user0" has shared folder "/TMP" with user "user1" with permissions <received_permissions>
    When user "user1" shares folder "/TMP/SUB" with user "user2" with permissions <reshare_permissions> using the sharing API
    Then the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    And as "user2" folder "/SUB" should not exist
    But as "user1" file "/TMP/SUB" should exist
    Examples:
      | ocs_api_version | http_status_code | received_permissions | reshare_permissions |
      # try to pass on more bits including reshare
      | 1               | 200              | 17                   | 19                  |
      | 2               | 404              | 17                   | 19                  |
      | 1               | 200              | 17                   | 21                  |
      | 2               | 404              | 17                   | 21                  |
      | 1               | 200              | 17                   | 23                  |
      | 2               | 404              | 17                   | 23                  |
      | 1               | 200              | 17                   | 31                  |
      | 2               | 404              | 17                   | 31                  |
      | 1               | 200              | 19                   | 23                  |
      | 2               | 404              | 19                   | 23                  |
      | 1               | 200              | 19                   | 31                  |
      | 2               | 404              | 19                   | 31                  |
      # try to pass on more bits but not reshare
      | 1               | 200              | 17                   | 3                   |
      | 2               | 404              | 17                   | 3                   |
      | 1               | 200              | 17                   | 5                   |
      | 2               | 404              | 17                   | 5                   |
      | 1               | 200              | 17                   | 7                   |
      | 2               | 404              | 17                   | 7                   |
      | 1               | 200              | 17                   | 15                  |
      | 2               | 404              | 17                   | 15                  |
      | 1               | 200              | 19                   | 7                   |
      | 2               | 404              | 19                   | 7                   |
      | 1               | 200              | 19                   | 15                  |
      | 2               | 404              | 19                   | 15                  |
      # try to pass on extra delete (including reshare)
      | 1               | 200              | 17                   | 25                  |
      | 2               | 404              | 17                   | 25                  |
      | 1               | 200              | 19                   | 27                  |
      | 2               | 404              | 19                   | 27                  |
      | 1               | 200              | 23                   | 31                  |
      | 2               | 404              | 23                   | 31                  |
      # try to pass on extra delete (but not reshare)
      | 1               | 200              | 17                   | 9                   |
      | 2               | 404              | 17                   | 9                   |
      | 1               | 200              | 19                   | 11                  |
      | 2               | 404              | 19                   | 11                  |
      | 1               | 200              | 23                   | 15                  |
      | 2               | 404              | 23                   | 15                  |

  Scenario Outline: User is allowed to update reshare of a sub-folder with less permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,create,update,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,read |
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

  Scenario Outline: User is allowed to update reshare of a sub-folder to the maximum allowed permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,create,update,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | share,create,update,read |
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user2" folder "/SUB" should exist
    And user "user2" should be able to upload file "filesForUpload/textfile.txt" to "/SUB/textfile.txt"
    And as "user1" file "/TMP/SUB" should exist
    And user "user1" should be able to upload file "filesForUpload/textfile.txt" to "/TMP/SUB/textfile.txt"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User is not allowed to update reshare of a sub-folder with more permissions
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created folder "/TMP"
    And user "user0" has created folder "/TMP/SUB"
    And user "user0" has shared folder "/TMP" with user "user1" with permissions "share,read"
    And user "user1" has shared folder "/TMP/SUB" with user "user2" with permissions "share,read"
    When user "user1" updates the last share using the sharing API with
      | permissions | all |
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

  Scenario Outline: resharing a file is not allowed when allow resharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has shared file "/textfile0.txt" with user "user1" with permissions "share,update,read"
    And parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When user "user1" shares file "/textfile0.txt" with user "user2" with permissions "share,update,read" using the sharing API
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
    When user "user0" shares file "/textfile0.txt" with user "user1" with permissions "share,update,read" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And as "user1" file "/textfile0.txt" should exist
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: User should not be able to re-share a folder to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "user3" has been created with default attributes and skeleton files
    And group "grp2" has been created
    # Note: in the user_ldap test environment user3 is in grp2
    And user "user3" has been added to group "grp2"
    And user "user0" has shared folder "/PARENT" with user "user1"
    When user "user1" shares folder "/PARENT" with group "grp2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user3" folder "/PARENT (2)" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |

  Scenario Outline: User should not be able to re-share a file to a group which he/she is not member of when share with only member group is enabled
    Given using OCS API version "<ocs_api_version>"
    And parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
    And user "user3" has been created with default attributes and skeleton files
    And group "grp2" has been created
    # Note: in the user_ldap test environment user3 is in grp2
    And user "user3" has been added to group "grp2"
    And user "user0" has shared file "/textfile0.txt" with user "user1"
    When user "user1" shares folder "/textfile0.txt" with group "grp2" using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "<http_status_code>"
    And as "user3" folder "/textfile0 (2).txt" should not exist
    Examples:
      | ocs_api_version | ocs_status_code | http_status_code |
      | 1               | 403             | 200              |
      | 2               | 403             | 403              |
