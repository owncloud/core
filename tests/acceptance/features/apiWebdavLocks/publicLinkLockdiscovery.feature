@api @smokeTest @public_link_share-feature-required @files_sharing-app-required @issue-ocis-reva-172 @notToImplementOnOCIS
Feature: LOCKDISCOVERY for public links

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created folder "PARENT"
    And user "Alice" has created folder "PARENT/CHILD"
    And user "Alice" has uploaded file "filesForUpload/textfile.txt" to "PARENT/CHILD/child.txt"

  Scenario Outline: lockdiscovery root of public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a locked public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a public link when subfolder is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when subfolder is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the file is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD/child.txt" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD\/child.txt$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the folder above the public link is locked
    Given user "Alice" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "Alice" has locked folder "PARENT" setting the following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the HTTP status code should be "200"
    And the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |
