@api @files_sharing-app-required @public_link_share-feature-required @issue-ocis-reva-315 @issue-ocis-reva-316

Feature: changing a public link share

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
    And user "Alice" has created folder "PARENT"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/parent.txt"


  Scenario Outline: Public can or can-not delete file through publicly shared link depending on having delete permissions using the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT       |
      | permissions | <permissions> |
    When the public deletes file "parent.txt" from the last public link share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "<http-status-code>"
    And as "Alice" file "PARENT/parent.txt" <should-or-not> exist

    @issue-ocis-2079
    Examples:
      | permissions               | http-status-code | should-or-not | public-webdav-api-version |
      | read,update,create        | 403              | should        | old                       |
      | read,update,create,delete | 204              | should not    | old                       |

    @issue-ocis-reva-292
    Examples:
      | permissions               | http-status-code | should-or-not | public-webdav-api-version |
      | read,update,create        | 403              | should        | new                       |
      | read,update,create,delete | 204              | should not    | new                       |


  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public renames file "parent.txt" to "newparent.txt" from the last public link share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/PARENT/parent.txt" should exist
    And as "Alice" file "/PARENT/newparent.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |

  @skipOnRansomwareProtection @issue-ransomware-208
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create,delete using the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public renames file "parent.txt" to "newparent.txt" from the last public link share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/parent.txt" should not exist
    And as "Alice" file "/PARENT/newparent.txt" should exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/PARENT/lorem.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create,delete with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "PARENT/lorem.txt" for user "Alice" should be "test"

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |


    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Public cannot delete file through publicly shared link with password using an invalid password with public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public deletes file "parent.txt" from the last public link share using the password "invalid" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "Alice" file "PARENT/parent.txt" should exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Public can delete file through publicly shared link with password using the valid password with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public deletes file "parent.txt" from the last public link share using the password "newpasswd" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "204"
    And as "Alice" file "PARENT/parent.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Public tries to rename a file in a password protected share using an invalid password with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public renames file "parent.txt" to "newparent.txt" from the last public link share using the password "invalid" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "Alice" file "/PARENT/newparent.txt" should not exist
    And as "Alice" file "/PARENT/parent.txt" should exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @skipOnRansomwareProtection @issue-ransomware-208
  Scenario Outline: Public tries to rename a file in a password protected share using the valid password with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public renames file "parent.txt" to "newparent.txt" from the last public link share using the password "newpasswd" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/newparent.txt" should exist
    And as "Alice" file "/PARENT/parent.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Public tries to upload to a password protected public share using an invalid password with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public uploads file "lorem.txt" with password "invalid" and content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "Alice" file "/PARENT/lorem.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Public tries to upload to a password protected public share using the valid password with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public uploads file "lorem.txt" with password "newpasswd" and content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "Alice" file "/PARENT/lorem.txt" should exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |


  Scenario Outline: Public cannot rename a file in uploadwriteonly public link share with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT         |
      | permissions | uploadwriteonly |
    When the public renames file "parent.txt" to "newparent.txt" from the last public link share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "/PARENT/parent.txt" should exist
    And as "Alice" file "/PARENT/newparent.txt" should not exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |


  Scenario Outline: Public cannot delete a file in uploadwriteonly public link share with the public WebDAV API
    Given user "Alice" has created a public link share with settings
      | path        | /PARENT         |
      | permissions | uploadwriteonly |
    When the public deletes file "parent.txt" from the last public link share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "Alice" file "PARENT/parent.txt" should exist

    @issue-ocis-2079
    Examples:
      | public-webdav-api-version |
      | old                       |

    @issue-ocis-reva-292
    Examples:
      | public-webdav-api-version |
      | new                       |
