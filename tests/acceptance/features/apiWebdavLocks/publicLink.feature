@api @TestAlsoOnExternalUserBackend @smokeTest @public_link_share-feature-required
Feature: persistent-locking in case of a public link

  Background:
    Given user "user0" has been created with default attributes

  Scenario Outline: Uploading a file into a locked public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "FOLDER" with change permission
    When user "user0" locks folder "FOLDER" using the WebDAV API setting following properties
      | lockscope | <lock-scope> |
    Then publicly uploading a file should not work
    And the HTTP status code should be "423"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |
      
  Scenario Outline: Uploading a file into a locked subfolder of a public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "test.txt" with content "test" using the public WebDAV API
    And the public uploads file "CHILD/test.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And as "user0" file "/PARENT/CHILD/test.txt" should not exist
    But the content of file "/PARENT/test.txt" for user "user0" should be "test"
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: Overwrite a file inside a locked public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "ownCloud test text file parent" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario Outline: Overwrite a file inside a locked subfolder of a public folder
    Given using <dav-path> DAV path
    And user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT/CHILD" setting following properties
      | lockscope | <lock-scope> |
    When the public uploads file "parent.txt" with content "changed text" using the public WebDAV API
    And the public uploads file "CHILD/child.txt" with content "test" using the public WebDAV API
    Then the HTTP status code should be "423"
    And the content of file "/PARENT/parent.txt" for user "user0" should be "changed text"
    But the content of file "/PARENT/CHILD/child.txt" for user "user0" should be "ownCloud test text file child" plus end-of-line
    Examples:
      | dav-path | lock-scope |
      | old      | shared     |
      | old      | exclusive  |
      | new      | shared     |
      | new      | exclusive  |

  Scenario: public tries to lock a folder inside an exclusively locked folder
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | exclusive |
    When the public locks "/CHILD" in the last public shared folder using the WebDAV API setting following properties
      | lockscope | shared |
    Then the HTTP status code should be "423"
    And the value of the item "//d:no-conflicting-lock/d:href" in the response should be ""

  Scenario Outline: lockdiscovery root of public link when root is locked
    Given user "user0" has created a public link share of folder "PARENT" with change permission
    And user "user0" has locked folder "PARENT" setting following properties
      | lockscope | <lock-scope> |
    When the public gets the following properties of entry "/" in the last created public link using the WebDAV API
      | d:lockdiscovery |
    Then the value of the item "//d:lockroot/d:href" in the response should match "/%base_path%\/public.php\/webdav\/$/"
    And the value of the item "//d:locktoken/d:href" in the response should be "opaquelocktoken:"
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
