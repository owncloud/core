@api @TestAlsoOnExternalUserBackend
Feature: Return the share information inside the shared folders

  Background:
    Given these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  Scenario Outline: Retrieving share-types-parents of a user share
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

  Scenario Outline: Retrieving share-types-parents of a group share
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

  Scenario Outline: Retrieving share-types-parents of a public-link share
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

  Scenario Outline: Retrieving share-types-parents of a federation share
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

  Scenario Outline: Retrieving share-types-parents of a share, where its parents are also shared
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

  #check sharing where subfolder is shared differnetly to main folder
  #check reshares as original sharer and as resharer
  #check  shared folder itself
    #check non-existing item
