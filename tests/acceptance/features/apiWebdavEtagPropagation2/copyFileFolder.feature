@api @focus
Feature: propagation of etags when copying files or folders

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |

  @skipOnOcis-OC-Storage @issue-product-280
  Scenario Outline: copying a file into a subfolder changes the etags of all parents
    Given using <dav_version> DAV path
    And user "Alice" has created folder "/upload"
    And user "Alice" has created folder "/upload/sub"
    And user "Alice" has uploaded file with content "uploaded content" to "/upload/file.txt"
    And user "Alice" has stored etag of element "/"
    And user "Alice" has stored etag of element "/upload"
    And user "Alice" has stored etag of element "/upload/file.txt"
    And user "Alice" has stored etag of element "/upload/file.txt" on path "/upload/sub/file.txt"
    And user "Alice" has stored etag of element "/upload/sub"
    When user "Alice" copies file "/upload/file.txt" to "/upload/sub/file.txt" using the WebDAV API
    Then the HTTP status code should be "201"
    And these etags should have changed:
      | user  | path                 |
      | Alice | /                    |
      | Alice | /upload              |
      | Alice | /upload/sub          |
      | Alice | /upload/sub/file.txt |
    And these etags should not have changed:
      | user  | path             |
      | Alice | /upload/file.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

    @skipOnOcV10 @personalSpace
    Examples:
      | dav_version |
      | spaces      |
