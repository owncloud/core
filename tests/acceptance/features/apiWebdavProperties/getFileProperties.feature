@api @TestAlsoOnExternalUserBackend
Feature: get file properties
  As a user
  I want to be able to get meta-information about files
  So that I can know file meta-information (detailed requirement TBD)

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes

  @smokeTest
  Scenario Outline: Do a PROPFIND of various file names
    Given using <dav_version> DAV path
    And user "user0" has uploaded file with content "uploaded content" to "<file_name>"
    When user "user0" gets the properties of file "<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | file_name         |
      | old         | /upload.txt       |
      | old         | /strängé file.txt |
      | old         | /नेपाली.txt       |
      | new         | /upload.txt       |
      | new         | /strängé file.txt |
      | new         | /नेपाली.txt       |

  Scenario Outline: Do a PROPFIND of various file names
    Given using <dav_version> DAV path
    And user "user0" has uploaded file with content "uploaded content" to "<file_name>"
    When user "user0" gets the properties of file "<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | file_name     |
      | old         | /C++ file.cpp |
      | old         | /file #2.txt  |
      | old         | /file ?2.txt  |
      | new         | /C++ file.cpp |
      | new         | /file #2.txt  |
      | new         | /file ?2.txt  |

  Scenario Outline: Do a PROPFIND of various folder/file names
    Given using <dav_version> DAV path
    And user "user0" has created folder "<folder_name>"
    And user "user0" has uploaded file with content "uploaded content" to "<folder_name>/<file_name>"
    When user "user0" gets the properties of file "<folder_name>/<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /upload                          | abc.txt                       |
      | old         | /strängé folder                  | strängé file.txt              |
      | old         | /C++ folder                      | C++ file.cpp                  |
      | old         | /नेपाली                          | नेपाली                        |
      | old         | /folder #2.txt                   | file #2.txt                   |
      | old         | /folder ?2.txt                   | file ?2.txt                   |
      | new         | /upload                          | abc.txt                       |
      | new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
      | new         | /C++ folder                      | C++ file.cpp                  |
      | new         | /नेपाली                          | नेपाली                        |
      | new         | /folder #2.txt                   | file #2.txt                   |
      | new         | /folder ?2.txt                   | file ?2.txt                   |

  Scenario Outline: A file that is not shared does not have a share-types property
    Given using <dav_version> DAV path
    And user "user0" has created folder "/test"
    When user "user0" gets the following properties of folder "/test" using the WebDAV API
      | {http://owncloud.org/ns}share-types |
    Then the response should contain an empty property "{http://owncloud.org/ns}share-types"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file that is shared to a user has a share-types property
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And user "user0" has created folder "/test"
    And user "user0" has created a share with settings
      | path        | test  |
      | shareType   | 0     |
      | permissions | 31    |
      | shareWith   | user1 |
    When user "user0" gets the following properties of folder "/test" using the WebDAV API
      | {http://owncloud.org/ns}share-types |
    Then the response should contain a share-types property with
      | 0 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: A file that is shared to a group has a share-types property
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "user0" has created folder "/test"
    And user "user0" has created a share with settings
      | path        | test |
      | shareType   | 1    |
      | permissions | 31   |
      | shareWith   | grp1 |
    When user "user0" gets the following properties of folder "/test" using the WebDAV API
      | {http://owncloud.org/ns}share-types |
    Then the response should contain a share-types property with
      | 1 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @public_link_share-feature-required
  Scenario Outline: A file that is shared by link has a share-types property
    Given using <dav_version> DAV path
    And user "user0" has created folder "/test"
    And user "user0" has created a public link share with settings
      | path        | test |
      | permissions | 31   |
    When user "user0" gets the following properties of folder "/test" using the WebDAV API
      | {http://owncloud.org/ns}share-types |
    Then the response should contain a share-types property with
      | 3 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnLDAP @user_ldap-issue-268 @public_link_share-feature-required
  Scenario Outline: A file that is shared by user,group and link has a share-types property
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And group "grp2" has been created
    And user "user0" has created folder "/test"
    And user "user0" has created a share with settings
      | path        | test  |
      | shareType   | 0     |
      | permissions | 31    |
      | shareWith   | user1 |
    And user "user0" has created a share with settings
      | path        | test |
      | shareType   | 1    |
      | permissions | 31   |
      | shareWith   | grp2 |
    And user "user0" has created a public link share with settings
      | path        | test |
      | permissions | 31   |
    When user "user0" gets the following properties of folder "/test" using the WebDAV API
      | {http://owncloud.org/ns}share-types |
    Then the response should contain a share-types property with
      | 0 |
      | 1 |
      | 3 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Doing a PROPFIND with a web login should work with CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "user0" has logged in to a web-style session
    When the client sends a "PROPFIND" to "/remote.php/dav/files/user0/welcome.txt" with requesttoken
    Then the HTTP status code should be "207"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Retrieving private link
    Given using <dav_version> DAV path
    And user "user0" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    When user "user0" gets the following properties of file "/somefile.txt" using the WebDAV API
      | {http://owncloud.org/ns}privatelink |
    Then the single response should contain a property "{http://owncloud.org/ns}privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"
    Examples:
      | dav_version |
      | old         |
      | new         |
