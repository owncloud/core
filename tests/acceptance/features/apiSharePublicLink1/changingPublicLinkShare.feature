@api @TestAlsoOnExternalUserBackend @files_sharing-app-required @public_link_share-feature-required
Feature: changing a public link share

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario Outline: Public can or can-not delete file through publicly shared link depending on having delete permissions
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT       |
      | permissions | <permissions> |
    When the public deletes file "welcome.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "<http-status-code>"
    And as "user0" file "PARENT/welcome.txt" <should-or-not> exist
    Examples:
      | public-webdav-api-version | permissions               | http-status-code | should-or-not |
      | old                       | read,update,create        | 403              | should        |
      | new                       | read,update,create        | 403              | should        |
      | old                       | read,update,create,delete | 204              | should not    |
      | new                       | read,update,create,delete | 204              | should not    |

  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/parent.txt" should exist
    And as "user0" file "/PARENT/newparent.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @skipOnRansomwareProtection  @issue-ransomware-208
  Scenario Outline: Public link share permissions work correctly for renaming and share permissions read,update,create,delete
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/parent.txt" should not exist
    And as "user0" file "/PARENT/newparent.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT            |
      | permissions | read,update,create |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/lorem.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public link share permissions work correctly for upload with share permissions read,update,create,delete
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT                   |
      | permissions | read,update,create,delete |
    When the public uploads file "lorem.txt" with content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And the content of file "PARENT/lorem.txt" for user "user0" should be "test"
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public cannot delete file through publicly shared link with password using an invalid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public deletes file "welcome.txt" from the last public share using the password "invalid" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "PARENT/welcome.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public can delete file through publicly shared link with password using the valid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public deletes file "welcome.txt" from the last public share using the password "newpasswd" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "204"
    And as "user0" file "PARENT/welcome.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public tries to rename a file in a password protected share using an invalid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the password "invalid" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "/PARENT/newparent.txt" should not exist
    And as "user0" file "/PARENT/parent.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  @skipOnRansomwareProtection @issue-ransomware-208
  Scenario Outline: Public tries to rename a file in a password protected share using the valid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the password "newpasswd" and <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/newparent.txt" should exist
    And as "user0" file "/PARENT/parent.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public tries to upload to a password protected public share using an invalid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public uploads file "lorem.txt" with password "invalid" and content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "401"
    And as "user0" file "/PARENT/lorem.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public tries to upload to a password protected public share using the valid password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT   |
      | permissions | change    |
      | password    | newpasswd |
    When the public uploads file "lorem.txt" with password "newpasswd" and content "test" using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "201"
    And as "user0" file "/PARENT/lorem.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public cannot rename a file in uploadwriteonly public link share
    Given the administrator has enabled DAV tech_preview
    And user "user0" has created a public link share with settings
      | path        | /PARENT         |
      | permissions | uploadwriteonly |
    When the public renames file "parent.txt" to "newparent.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "/PARENT/parent.txt" should exist
    And as "user0" file "/PARENT/newparent.txt" should not exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |

  Scenario Outline: Public cannot delete a file in uploadwriteonly public link share
    Given the administrator has enabled DAV tech_preview
    And user "user0" has moved file "welcome.txt" to "PARENT/welcome.txt"
    And user "user0" has created a public link share with settings
      | path        | /PARENT         |
      | permissions | uploadwriteonly |
    When the public deletes file "welcome.txt" from the last public share using the <public-webdav-api-version> public WebDAV API
    Then the HTTP status code should be "403"
    And as "user0" file "PARENT/welcome.txt" should exist
    Examples:
      | public-webdav-api-version |
      | old                       |
      | new                       |
