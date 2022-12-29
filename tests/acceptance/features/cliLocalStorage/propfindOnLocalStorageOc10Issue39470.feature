@cli @local_storage @files_external-app-required
Feature: get file info using PROPFIND

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
    And the administrator has created the local storage mount "local_storage2"
    And the administrator has created the local storage mount "local_storage3"
    And user "Alice" has uploaded file with content "some data" to "/local_storage2/textfile0.txt"
    And user "Alice" has created folder "/local_storage2/simple-folder"
    And user "Alice" has uploaded file with content "some data" to "/local_storage2/simple-folder/textfile1.txt"
    And user "Alice" has created folder "/local_storage3/PARENT"
    And user "Alice" has created folder "/FOLDER"
    And user "Alice" has uploaded file with content "some data" to "/local_storage3/PARENT/PARENT.txt"

  @skipOnEncryptionType:user-keys @issue-encryption-320 @depthInfinityPropfindEnabled
  Scenario Outline: list files on external storage that is currently unavailable
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    When the local storage mount for "/local_storage2" is renamed to "/new_local_storage"
    And user "Alice" lists the resources in "/local_storage2" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the propfind result of user "Alice" should contain only these entries:
      | /local_storage2                             |
      | /local_storage2/textfile0.txt               |
      | /local_storage2/simple-folder               |
      | /local_storage2/simple-folder/textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindEnabled @skipOnEncryptionType:user-keys @issue-encryption-320 @depthInfinityPropfindEnabled
  Scenario Outline: list files on root folder with depth infinity when the external storage folder is unavailable
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    When the local storage mount for "/local_storage2" is renamed to "/new_local_storage"
    And user "Alice" lists the resources in "/" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the propfind result of user "Alice" should contain only these entries:
      | /                                           |
      | /local_storage2                             |
      | /local_storage                              |
      | /local_storage3                             |
      | /FOLDER                                     |
      | /local_storage3/PARENT                      |
      | /local_storage3/PARENT/PARENT.txt           |
      | /local_storage2/textfile0.txt               |
      | /local_storage2/simple-folder               |
      | /local_storage2/simple-folder/textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindDisabled @skipOnEncryptionType:user-keys @issue-encryption-320
  Scenario Outline: list files on external storage that is currently unavailable when depth infinity is not allowed
    Given using <dav_version> DAV path
    When the local storage mount for "/local_storage2" is renamed to "/new_local_storage"
    And user "Alice" lists the resources in "/local_storage2" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "412"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindDisabled @skipOnEncryptionType:user-keys @issue-encryption-320
  Scenario Outline: list files on root folder with depth infinity not allowed when the external storage folder is unavailable
    Given using <dav_version> DAV path
    When the local storage mount for "/local_storage2" is renamed to "/new_local_storage"
    And user "Alice" lists the resources in "/" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "412"
    Examples:
      | dav_version |
      | old         |
      | new         |
