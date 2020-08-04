@api
Feature: get file properties
  As a user
  I want to be able to get meta-information about files
  So that I can know file meta-information (detailed requirement TBD)

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  @smokeTest
  Scenario Outline: Do a PROPFIND of various file names
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "<file_name>"
    When user "Alice" gets the properties of file "<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | file_name         |
      | old         | /upload.txt       |
      | old         | /strängé file.txt |
      | old         | /नेपाली.txt       |
      | new         | /upload.txt       |
      | new         | /strängé file.txt |
      | new         | /नेपाली.txt       |
      | old         | s,a,m,p,l,e.txt   |
      | new         | s,a,m,p,l,e.txt   |

  @skipOnOcis @issue-ocis-reva-214
  Scenario Outline: Do a PROPFIND of various file names
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "<file_name>"
    When user "Alice" gets the properties of file "<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    And the value of the item "//d:response/d:href" in the response to user "Alice" should match "/remote\.php\/<expected_href>/"
    Examples:
      | dav_version | file_name     | expected_href                          |
      | old         | /C++ file.cpp | webdav\/C%2b%2b%20file\.cpp            |
      | old         | /file #2.txt  | webdav\/file%20%232\.txt               |
      | old         | /file ?2.txt  | webdav\/file%20%3f2\.txt               |
      | old         | /file &2.txt  | webdav\/file%20%262\.txt               |
      | new         | /C++ file.cpp | dav\/files\/%username%\/C%2b%2b%20file\.cpp |
      | new         | /file #2.txt  | dav\/files\/%username%\/file%20%232\.txt    |
      | new         | /file ?2.txt  | dav\/files\/%username%\/file%20%3f2\.txt    |
      | new         | /file &2.txt  | dav\/files\/%username%\/file%20%262\.txt    |

  @skipOnOcis @issue-ocis-reva-214
  Scenario Outline: Do a PROPFIND of various folder names
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content" to "<folder_name>/file1.txt"
    And user "Alice" has uploaded file with content "uploaded content" to "<folder_name>/file2.txt"
    When user "Alice" gets the properties of folder "<folder_name>" with depth 1 using the WebDAV API
    Then the value of the item "//d:response[1]/d:href" in the response to user "Alice" should match "/remote\.php\/<expected_href>\//"
    And the value of the item "//d:response[2]/d:href" in the response to user "Alice" should match "/remote\.php\/<expected_href>\/file1.txt/"
    And the value of the item "//d:response[3]/d:href" in the response to user "Alice" should match "/remote\.php\/<expected_href>\/file2.txt/"
    Examples:
      | dav_version | folder_name     | expected_href                                                                  |
      | old         | /upload         | webdav\/upload                                                                 |
      | old         | /strängé folder | webdav\/str%c3%a4ng%c3%a9%20folder                                             |
      | old         | /C++ folder     | webdav\/C%2b%2b%20folder                                                       |
      | old         | /नेपाली         | webdav\/%e0%a4%a8%e0%a5%87%e0%a4%aa%e0%a4%be%e0%a4%b2%e0%a5%80                 |
      | old         | /folder #2.txt  | webdav\/folder%20%232\.txt                                                     |
      | old         | /folder ?2.txt  | webdav\/folder%20%3f2\.txt                                                     |
      | old         | /folder &2.txt  | webdav\/folder%20%262\.txt                                                     |
      | new         | /upload         | dav\/files\/%username%\/upload                                                           |
      | new         | /strängé folder | dav\/files\/%username%\/str%c3%a4ng%c3%a9%20folder                             |
      | new         | /C++ folder     | dav\/files\/%username%\/C%2b%2b%20folder                                       |
      | new         | /नेपाली         | dav\/files\/%username%\/%e0%a4%a8%e0%a5%87%e0%a4%aa%e0%a4%be%e0%a4%b2%e0%a5%80 |
      | new         | /folder #2.txt  | dav\/files\/%username%\/folder%20%232\.txt                                     |
      | new         | /folder ?2.txt  | dav\/files\/%username%\/folder%20%3f2\.txt                                     |
      | new         | /folder &2.txt  | dav\/files\/%username%\/folder%20%262\.txt                                     |

  Scenario Outline: Do a PROPFIND of various files inside various folders
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content" to "<folder_name>/<file_name>"
    When user "Alice" gets the properties of file "<folder_name>/<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /upload                          | abc.txt                       |
      | old         | /strängé folder                  | strängé file.txt              |
      | old         | /C++ folder                      | C++ file.cpp                  |
      | old         | /नेपाली                          | नेपाली                        |
      | old         | /folder #2.txt                   | file #2.txt                   |
      | new         | /upload                          | abc.txt                       |
      | new         | /strängé folder (duplicate #2 &) | strängé file (duplicate #2 &) |
      | new         | /C++ folder                      | C++ file.cpp                  |
      | new         | /नेपाली                          | नेपाली                        |
      | new         | /folder #2.txt                   | file #2.txt                   |

  @skipOnOcis-EOS-Storage @issue-ocis-reva-265
  #after fixing all issues delete this Scenario and merge with the one above
  Scenario Outline: Do a PROPFIND of various files inside various folders
    Given using <dav_version> DAV path
    And user "Alice" has created folder "<folder_name>"
    And user "Alice" has uploaded file with content "uploaded content" to "<folder_name>/<file_name>"
    When user "Alice" gets the properties of file "<folder_name>/<file_name>" using the WebDAV API
    Then the properties response should contain an etag
    Examples:
      | dav_version | folder_name                      | file_name                     |
      | old         | /folder ?2.txt                   | file ?2.txt                   |
      | new         | /folder ?2.txt                   | file ?2.txt                   |

  Scenario Outline: A file that is not shared does not have a share-types property
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName   |
      | oc:share-types |
    Then the response should contain an empty property "oc:share-types"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: A file that is shared to a user has a share-types property
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "/test"
    And user "Alice" has created a share with settings
      | path        | test  |
      | shareType   | user  |
      | permissions | all   |
      | shareWith   | Brian |
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName   |
      | oc:share-types |
    Then the response should contain a share-types property with
      | 0 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: A file that is shared to a group has a share-types property
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "Alice" has created folder "/test"
    And user "Alice" has created a share with settings
      | path        | test  |
      | shareType   | group |
      | permissions | all   |
      | shareWith   | grp1  |
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName   |
      | oc:share-types |
    Then the response should contain a share-types property with
      | 1 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @public_link_share-feature-required @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: A file that is shared by link has a share-types property
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    And user "Alice" has created a public link share with settings
      | path        | test |
      | permissions | all  |
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName   |
      | oc:share-types |
    Then the response should contain a share-types property with
      | 3 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnLDAP @user_ldap-issue-268 @public_link_share-feature-required @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-11
  Scenario Outline: A file that is shared by user,group and link has a share-types property
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And group "grp1" has been created
    And user "Alice" has created folder "/test"
    And user "Alice" has created a share with settings
      | path        | test  |
      | shareType   | user  |
      | permissions | all   |
      | shareWith   | Brian |
    And user "Alice" has created a share with settings
      | path        | test  |
      | shareType   | group |
      | permissions | all   |
      | shareWith   | grp1  |
    And user "Alice" has created a public link share with settings
      | path        | test |
      | permissions | all  |
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName   |
      | oc:share-types |
    Then the response should contain a share-types property with
      | 0 |
      | 1 |
      | 3 |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis
  Scenario Outline: Doing a PROPFIND with a web login should work with CSRF token on the new backend
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    And user "Alice" has logged in to a web-style session
    When the client sends a "PROPFIND" to "/remote.php/dav/files/%username%/somefile.txt" of user "Alice" with requesttoken
    Then the HTTP status code should be "207"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  @skipOnOcis @issue-ocis-reva-216
  Scenario Outline: Retrieving private link
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "/somefile.txt"
    When user "Alice" gets the following properties of file "/somefile.txt" using the WebDAV API
      | propertyName   |
      | oc:privatelink |
    Then the single response should contain a property "oc:privatelink" with value like "%(/(index.php/)?f/[0-9]*)%"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-163
  Scenario Outline: Do a PROPFIND to a non-existing URL
    And user "Alice" requests "<url>" with "PROPFIND" using basic auth
    Then the value of the item "/d:error/s:message" in the response about user "Alice" should be "<message>"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"
    Examples:
      | url                                  | message                                      |
      | /remote.php/dav/files/does-not-exist | Principal with name does-not-exist not found |
      | /remote.php/dav/does-not-exist       | File not found: does-not-exist in 'root'     |

  @skipOnOcis @issue-ocis-reva-57 @issue-ocis-reva-217
  Scenario: add, receive multiple custom meta properties to a file
    Given user "Alice" has created folder "/TestFolder"
    And user "Alice" has uploaded file with content "test data one" to "/TestFolder/test1.txt"
    And user "Alice" has set the following properties of file "/TestFolder/test1.txt" using the WebDav API
      | propertyName | propertyValue |
      | testprop1    | AAAAA         |
      | testprop2    | BBBBB         |
    When user "Alice" gets the following properties of file "/TestFolder/test1.txt" using the WebDAV API
      | propertyName |
      | oc:testprop1 |
      | oc:testprop2 |
    Then the HTTP status code should be success
    And as user "Alice" the last response should have the following properties
      | resource              | propertyName | propertyValue   |
      | /TestFolder/test1.txt | testprop1    | AAAAA           |
      | /TestFolder/test1.txt | testprop2    | BBBBB           |
      | /TestFolder/test1.txt | status       | HTTP/1.1 200 OK |

  @issue-36920
  @skipOnOcV10.3 @skipOnOcV10.4.0 @skipOnOcis @issue-ocis-reva-57 @issue-ocis-reva-217
  Scenario: add multiple properties to files inside a folder and do a propfind of the parent folder
    Given user "Alice" has created folder "/TestFolder"
    And user "Alice" has uploaded file with content "test data one" to "/TestFolder/test1.txt"
    And user "Alice" has uploaded file with content "test data two" to "/TestFolder/test2.txt"
    And user "Alice" has set the following properties of file "/TestFolder/test1.txt" using the WebDav API
      | propertyName | propertyValue |
      | testprop1    | AAAAA         |
      | testprop2    | BBBBB         |
    And user "Alice" has set the following properties of file "/TestFolder/test2.txt" using the WebDav API
      | propertyName | propertyValue |
      | testprop1    | CCCCC         |
      | testprop2    | DDDDD         |
    When user "Alice" gets the following properties of folder "/TestFolder" using the WebDAV API
      | propertyName |
      | oc:testprop1 |
      | oc:testprop2 |
    Then the HTTP status code should be success
    And as user "Alice" the last response should have the following properties
      | resource              | propertyName | propertyValue          |
      | /TestFolder/test1.txt | testprop1    | AAAAA                  |
      | /TestFolder/test1.txt | testprop2    | BBBBB                  |
      | /TestFolder/test2.txt | testprop1    | CCCCC                  |
      | /TestFolder/test2.txt | testprop2    | DDDDD                  |
      | /TestFolder/          | status       | HTTP/1.1 404 Not Found |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the last modified date of a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName      |
      | d:getlastmodified |
    Then the single response should contain a property "d:getlastmodified" with value like "/^[MTWFS][uedhfriatno]{2},\s(\d){2}\s[JFMAJSOND][anebrpyulgctov]{2}\s\d{4}\s\d{2}:\d{2}:\d{2} GMT$/"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the content type of a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName      |
      | d:getcontenttype  |
    Then the single response should contain a property "d:getcontenttype" with value ""
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the content type of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName      |
      | d:getcontenttype  |
    Then the single response should contain a property "d:getcontenttype" with value "text/plain"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Propfind the etag of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName      |
      | d:getetag  |
    Then the single response should contain a property "d:getetag" with value like '%\"[a-z0-9:]{1,32}\"%'
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Propfind the resource type of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName      |
      | d:resourcetype    |
    Then the single response should contain a property "d:resourcetype" with value ""
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Propfind the size of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName |
      | oc:size      |
    Then the single response should contain a property "oc:size" with value "16"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the size of a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName |
      | oc:size      |
    Then the single response should contain a property "oc:size" with value "0"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the file id of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName |
      | oc:fileid    |
    Then the single response should contain a property "oc:fileid" with value like '/[0-9]{10}/'
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the file id of a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName |
      | oc:fileid    |
    Then the single response should contain a property "oc:fileid" with value like '/[0-9]{10}/'
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the owner display name of a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of file "file.txt" using the WebDAV API
      | propertyName          |
      | oc:owner-display-name |
    Then the single response about the file owned by "Alice" should contain a property "oc:owner-display-name" with value "%displayname%"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the owner display name of a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName          |
      | oc:owner-display-name |
    Then the single response about the file owned by "Alice" should contain a property "oc:owner-display-name" with value "%displayname%"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the permissions on a file using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "file.txt"
    When user "Alice" gets the following properties of folder "file.txt" using the WebDAV API
      | propertyName     |
      | oc:permissions   |
    Then the single response should contain a property "oc:permissions" with value like '/RM{0,1}DNVW/'
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-57
  Scenario Outline: Propfind the permissions on a folder using webdav api
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/test"
    When user "Alice" gets the following properties of folder "/test" using the WebDAV API
      | propertyName    |
      | oc:permissions  |
    Then the single response should contain a property "oc:permissions" with value like '/RM{0,1}DNVCK/'
    Examples:
      | dav_version |
      | old         |
      | new         |
