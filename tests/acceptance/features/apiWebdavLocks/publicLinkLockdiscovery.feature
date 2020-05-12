@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required @skipOnOcV10.0 @files_sharing-app-required @skipOnOcis @issue-ocis-reva-172
Feature: LOCKDISCOVERY for public links

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  Scenario Outline: lockdiscovery root of public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a locked public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a public link when subfolder is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when subfolder is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when root is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the file is locked
    Given user "Alice" has created a public link share of folder "PARENT" with change permission
    And user "Alice" has locked folder "PARENT/CHILD/child.txt" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/CHILD\/child.txt$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the folder above the public link is locked
    Given user "Alice" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "Alice" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/child.txt" in the last created public link using the WebDAV API
      | propertyName    |
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response to user "user0" should match "/%base_path%\/public.php\/webdav\/$/"
    And the item "//d:locktoken/d:href" in the response should not exist
    And the value of the item "//d:timeout" in the response to user "user0" should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |
