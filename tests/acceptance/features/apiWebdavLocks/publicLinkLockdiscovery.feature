@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required
Feature: LOCKDISCOVERY for public links

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: lockdiscovery root of public link when root is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a locked public link when root is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of a public link when subfolder is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when subfolder is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when root is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the file is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT/CHILD/child.txt" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD/child.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD\/child.txt$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery file in a subfolder of a public link when the folder above the public link is locked
    Given user "user0" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/child.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery root of public link when root is locked by public
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And the public has locked the last public shared folder setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of public link when root is locked by public
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And the public has locked the last public shared folder setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario Outline: lockdiscovery subfolder of public link when subfolder is locked by public
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And the public has locked "CHILD" in the last public shared folder setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:timeout" in the response should match "/Second-\d+/"
    Examples:
      | lock-scope |
      | shared     |
      | exclusive  |

  Scenario: lockdiscovery root of public link when root is locked by public and user
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | shared |
    And the public has locked the last public shared folder setting following properties
      | lockscope | shared |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:activelock[1]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[2]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[1]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[2]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[1]/d:timeout" in the response should match "/Second-\d+/"
    And the value of the item "//d:activelock[2]/d:timeout" in the response should match "/Second-\d+/"

  Scenario: lockdiscovery subfolder of public link when root is locked by user and subfolder is locked by public
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | shared |
    And the public has locked "CHILD" in the last public shared folder setting following properties
      | lockscope | shared |
    When the public gets the following properties of entry "/CHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:activelock[1]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[2]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/CHILD$/"
    And the value of the item "//d:activelock[1]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[2]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[1]/d:timeout" in the response should match "/Second-\d+/"
    And the value of the item "//d:activelock[2]/d:timeout" in the response should match "/Second-\d+/"

  Scenario: lockdiscovery root of public link when user has locked folder above public link and public has locked root of public link
    Given user "user0" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | shared |
    And the public has locked "/" in the last public shared folder setting following properties
      | lockscope | shared |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:activelock[1]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[2]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[1]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[2]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[1]/d:timeout" in the response should match "/Second-\d+/"
    And the value of the item "//d:activelock[2]/d:timeout" in the response should match "/Second-\d+/"

  Scenario: lockdiscovery subfolder of public link when user has locked folder above public link and public has locked subfolder of public link
    Given user "user0" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "user0" has created folder "PARENT/CHILD/GRANDCHILD"
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | shared |
    And the public has locked "/GRANDCHILD" in the last public shared folder setting following properties
      | lockscope | shared |
    When the public gets the following properties of entry "/GRANDCHILD" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:activelock[1]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[2]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/GRANDCHILD$/"
    And the value of the item "//d:activelock[1]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[2]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[1]/d:timeout" in the response should match "/Second-\d+/"
    And the value of the item "//d:activelock[2]/d:timeout" in the response should match "/Second-\d+/"

  Scenario: lockdiscovery file in public link when user has locked folder above public link and public has locked file inside of public link
    Given user "user0" has created a public link share of folder "PARENT/CHILD" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | shared |
    And the public has locked "/child.txt" in the last public shared folder setting following properties
      | lockscope | shared |
    When the public gets the following properties of entry "/child.txt" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:activelock[1]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:activelock[2]/d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/child.txt$/"
    And the value of the item "//d:activelock[1]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[2]/d:locktoken/d:href" in the response should be "opaquelocktoken:"
    And the value of the item "//d:activelock[1]/d:timeout" in the response should match "/Second-\d+/"
    And the value of the item "//d:activelock[2]/d:timeout" in the response should match "/Second-\d+/"
