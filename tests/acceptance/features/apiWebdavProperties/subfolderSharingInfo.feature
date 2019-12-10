@api @TestAlsoOnExternalUserBackend @skipOnOcV10.3
Feature: Return the share information inside the shared folders

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that is shared to a user
    Given using <dav_version> DAV path
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user1  |
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that is shared to a group
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | group  |
      | permissions | all    |
      | shareWith   | grp1   |
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "1"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "1"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that is shared by a public-link
    Given using <dav_version> DAV path
    And user "user0" has created a public link share of folder "/PARENT"
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "3"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "3"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that is shared to a remote server
    Given using <dav_version> DAV path
    And using server "REMOTE"
    And user "user2" has been created with default attributes and skeleton files
    And user "user0" from server "LOCAL" has shared "/PARENT" with user "user2" from server "REMOTE"
    And using server "LOCAL"
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "6"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "6"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that is shared to different users
    Given using <dav_version> DAV path
    And user "user2" has been created with default attributes and without skeleton files
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user1  |
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user2  |
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new    a    | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of a file of which the parent and the grand-parent folder is shared in different ways
    Given using <dav_version> DAV path
    And using server "REMOTE"
    And user "user2" has been created with default attributes and skeleton files
    And user "user0" from server "LOCAL" has shared "/PARENT" with user "user2" from server "REMOTE"
    And using server "LOCAL"
    And group "grp1" has been created
    And user "user0" has created a public link share of folder "/PARENT/CHILD"
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | group  |
      | permissions | all    |
      | shareWith   | grp1   |
    And user "user0" has created a share with settings
      | path        | PARENT/CHILD |
      | shareType   | user         |
      | permissions | all          |
      | shareWith   | user1        |
    When user "user0" gets the following properties of file "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent[1]/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent[1]/oc:share-type[1]" in the response should be "1"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent[1]/oc:share-type[2]" in the response should be "6"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent[2]/d:href" in the response should be "<href>/CHILD"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent[2]/oc:share-type[1]" in the response should be "3"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent[2]/oc:share-type[2]" in the response should be "0"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of a shared folder
    Given using <dav_version> DAV path
    And using server "REMOTE"
    And user "user2" has been created with default attributes and skeleton files
    And user "user0" from server "LOCAL" has shared "/PARENT" with user "user2" from server "REMOTE"
    And using server "LOCAL"
    And group "grp1" has been created
    And user "user0" has created a public link share of folder "/PARENT"
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | group  |
      | permissions | all    |
      | shareWith   | grp1   |
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user1  |
    When user "user0" gets the following properties of file "/PARENT" using the WebDAV API
      | oc:share-types-parents |
    Then the response should contain an empty property "oc:share-types-parents/oc:parents"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving share-types-parents of a not shared item
    Given using <dav_version> DAV path
    When user "user0" gets the following properties of file "/PARENT" using the WebDAV API
      | oc:share-types-parents |
    Then the response should contain an empty property "oc:share-types-parents/oc:parents"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving share-types-parents of items inside a not shared folder
    Given using <dav_version> DAV path
    When user "user0" gets the following properties of file "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the response should contain an empty property "oc:share-types-parents/oc:parents"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that was reshared to a group (as original owner)
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user1  |
    And user "user1" has created a share with settings
      | path        | PARENT (2) |
      | shareType   | group      |
      | permissions | all        |
      | shareWith   | grp1       |
    When user "user0" gets the following properties of folder "/PARENT/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    When user "user0" gets the following properties of folder "/PARENT/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "0"
    Examples:
      | dav_version | href                           |
      | old         | /%dav_path%/PARENT             |
      | new         | /%dav_path%/files/user0/PARENT |

  Scenario Outline: Retrieving share-types-parents of items inside a folder that was reshared to a group (as resharer)
    Given using <dav_version> DAV path
    And group "grp1" has been created
    And user "user0" has created a share with settings
      | path        | PARENT |
      | shareType   | user   |
      | permissions | all    |
      | shareWith   | user1  |
    And user "user1" has created a share with settings
      | path        | PARENT (2) |
      | shareType   | group      |
      | permissions | all        |
      | shareWith   | grp1       |
    When user "user1" gets the following properties of folder "/PARENT (2)/CHILD" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "1"
    When user "user1" gets the following properties of folder "/PARENT (2)/CHILD/child.txt" using the WebDAV API
      | oc:share-types-parents |
    Then the value of the item "//oc:share-types-parents/oc:parents/oc:parent/d:href" in the response should be "<href>"
    And the value of the item "//oc:share-types-parents/oc:parents/oc:parent/oc:share-type" in the response should be "1"
    Examples:
      | dav_version | href                               |
      | old         | /%dav_path%/PARENT (2)             |
      | new         | /%dav_path%/files/user1/PARENT (2) |