@api
Feature: propagation of etags when deleting a file or folder

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And user "Alice" has created folder "/upload"


  Scenario Outline: deleting a file changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" deletes file "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path        |
      | Alice | /           |
      | Alice | /upload     |
      | Alice | /upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @issue-product-280
  Scenario Outline: deleting a folder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" deletes folder "/upload/sub/toDelete" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path        |
      | Alice | /           |
      | Alice | /upload     |
      | Alice | /upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |


  Scenario Outline: deleting a folder with content changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/toDelete/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" deletes folder "/upload/sub/toDelete" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path        |
      | Alice | /           |
      | Alice | /upload     |
      | Alice | /upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: as share receiver deleting a file changes the etags of all parents for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/sub"
    When user "Brian" deletes file "/Shares/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path               |
      | Alice | /                  |
      | Alice | /upload            |
      | Alice | /upload/sub        |
      | Brian | /                  |
      | Brian | /Shares            |
      | Brian | /Shares/upload     |
      | Brian | /Shares/upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: as sharer deleting a file changes the etags of all parents for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/sub/file.txt"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/sub"
    When user "Alice" deletes file "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path               |
      | Alice | /                  |
      | Alice | /upload            |
      | Alice | /upload/sub        |
      | Brian | /                  |
      | Brian | /Shares            |
      | Brian | /Shares/upload     |
      | Brian | /Shares/upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-product-280 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: as share receiver deleting a folder changes the etags of all parents for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/sub"
    When user "Brian" deletes folder "/Shares/upload/sub/toDelete" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path               |
      | Alice | /                  |
      | Alice | /upload            |
      | Alice | /upload/sub        |
      | Brian | /                  |
      | Brian | /Shares            |
      | Brian | /Shares/upload     |
      | Brian | /Shares/upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-product-280 @skipOnOcV10.6 @skipOnOcV10.7 @skipOnOcV10.8.0
  Scenario Outline: as sharer deleting a folder changes the etags of all parents for all collaborators
    Given user "Brian" has been created with default attributes and without skeleton files
    And the administrator has set the default folder for received shares to "Shares"
    And parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
    And using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created folder "/upload/sub/toDelete"
    And user "Alice" has shared folder "/upload" with user "Brian"
    And user "Brian" has accepted share "/upload" offered by user "Alice"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/sub"
    And user "Brian" has stored etag of element "/"
    And user "Brian" has stored etag of element "/Shares"
    And user "Brian" has stored etag of element "/Shares/upload"
    And user "Brian" has stored etag of element "/Shares/upload/sub"
    When user "Alice" deletes folder "/upload/sub/toDelete" using the WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path               |
      | Alice | /                  |
      | Alice | /upload            |
      | Alice | /upload/sub        |
      | Brian | /                  |
      | Brian | /Shares            |
      | Brian | /Shares/upload     |
      | Brian | /Shares/upload/sub |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-product-280
  Scenario Outline: deleting a file in a publicly shared folder changes its etag for the sharer
    Given using <dav_version> DAV path
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has created a public link share with settings
      | path        | upload |
      | permissions | change |
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    When the public deletes file "file.txt" from the last public link share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path    |
      | Alice | /       |
      | Alice | /upload |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @issue-product-280
  Scenario Outline: deleting a folder in a publicly shared folder changes its etag for the sharer
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has created a public link share with settings
      | path        | upload |
      | permissions | change |
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    When the public deletes folder "sub" from the last public link share using the new public WebDAV API
    Then the HTTP status code should be "204"
    And these etags should have changed:
      | user  | path    |
      | Alice | /       |
      | Alice | /upload |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |
