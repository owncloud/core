@api
Feature: list files
  As a user
  I want to be able to list my files and folders (resources)
  So that I can understand my file structure in owncloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created the following folders
      | path                                        |
      | simple-folder                               |
      | simple-folder/simple-folder1                |
      | simple-folder/simple-empty-folder           |
      | simple-folder/simple-folder1/simple-folder2 |
    And user "Alice" has uploaded the following files with content "simple-test-content"
      | path                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |


  Scenario Outline: Get the list of resources in the root folder with depth 0
    Given using <dav_version> DAV path
    When user "Alice" lists the resources in "/" with depth "0" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should not contain these nodes
      | name                              |
      | textfile0.txt                     |
      | welcome.txt                       |
      | simple-folder/                    |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of resources in the root folder with depth 1
    Given using <dav_version> DAV path
    When user "Alice" lists the resources in "/" with depth "1" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should contain these nodes
      | name           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    And the last DAV response for user "Alice" should not contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindEnabled
  Scenario Outline: Get the list of resources in the root folder with depth infinity
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    When user "Alice" lists the resources in "/" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should contain these nodes
      | name                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                            |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-empty-folder/                        |
      | simple-folder/simple-folder1/                             |
      | simple-folder/simple-folder1/simple-folder2               |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of resources in a folder with depth 0
    Given using <dav_version> DAV path
    When user "Alice" lists the resources in "/simple-folder" with depth "0" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should contain these nodes
      | name           |
      | simple-folder/ |
    And the last DAV response for user "Alice" should not contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of resources in a folder with depth 1
    Given using <dav_version> DAV path
    When user "Alice" lists the resources in "/simple-folder" with depth "1" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    And the last DAV response for user "Alice" should not contain these nodes
      | name                                                      |
      | simple-folder/simple-folder1/simple-folder2               |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindEnabled
  Scenario Outline: Get the list of resources in a folder with depth infinity
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    When user "Alice" lists the resources in "/simple-folder" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last DAV response for user "Alice" should contain these nodes
      | name                                                      |
      | /simple-folder/textfile0.txt                              |
      | /simple-folder/welcome.txt                                |
      | /simple-folder/simple-folder1/                            |
      | simple-folder/simple-folder1/simple-folder2               |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of resources in a folder shared through public link with depth 0
    Given using <dav_version> DAV path
    And user "Alice" has created the following folders
      | path                                                                       |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    And user "Alice" has created a public link share of folder "simple-folder"
    When the public lists the resources in the last created public link with depth "0" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link DAV response should not contain these nodes
      | name                                                         |
      | /textfile0.txt                                               |
      | /welcome.txt                                                 |
      | /simple-folder1/                                             |
      | /simple-folder1/welcome.txt                                  |
      | /simple-folder1/simple-folder2                               |
      | /simple-folder1/textfile0.txt                                |
      | /simple-folder1/simple-folder2/textfile0.txt                 |
      | /simple-folder1/simple-folder2/welcome.txt                   |
      | /simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    @issue-ocis-2079
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of resources in a folder shared through public link with depth 1
    Given using <dav_version> DAV path
    And user "Alice" has created the following folders
      | path                                                                       |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    And user "Alice" has created a public link share of folder "simple-folder"
    When the public lists the resources in the last created public link with depth "1" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link DAV response should contain these nodes
      | name             |
      | /textfile0.txt   |
      | /welcome.txt     |
      | /simple-folder1/ |
    And the last public link DAV response should not contain these nodes
      | name                                                         |
      | /simple-folder1/simple-folder2/textfile0.txt                 |
      | /simple-folder1/simple-folder2/welcome.txt                   |
      | /simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder1/welcome.txt                                  |
      | /simple-folder1/simple-folder2                               |
      | /simple-folder1/textfile0.txt                                |
      | /simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    @issue-ocis-2079
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindEnabled
  Scenario Outline: Get the list of resources in a folder shared through public link with depth infinity
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    And user "Alice" has created the following folders
      | path                                                                       |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    And user "Alice" has created a public link share of folder "simple-folder"
    When the public lists the resources in the last created public link with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link DAV response should contain these nodes
      | name                                                         |
      | /textfile0.txt                                               |
      | /welcome.txt                                                 |
      | /simple-folder1/                                             |
      | /simple-folder1/welcome.txt                                  |
      | /simple-folder1/simple-folder2                               |
      | /simple-folder1/textfile0.txt                                |
      | /simple-folder1/simple-folder2/textfile0.txt                 |
      | /simple-folder1/simple-folder2/welcome.txt                   |
      | /simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    @issue-ocis-2079
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of files in the trashbin with depth 0
    Given using <dav_version> DAV path
    And user "Alice" has deleted the following resources
      | path           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    When user "Alice" lists the resources in the trashbin with depth "0" using the WebDAV API
    Then the HTTP status code should be "207"
    And the trashbin DAV response should not contain these nodes
      | name                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                            |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |


  Scenario Outline: Get the list of files in the trashbin with depth 1
    Given using <dav_version> DAV path
    And user "Alice" has deleted the following resources
      | path           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    When user "Alice" lists the resources in the trashbin with depth "1" using the WebDAV API
    Then the HTTP status code should be "207"
    And the trashbin DAV response should contain these nodes
      | name           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    And the trashbin DAV response should not contain these nodes
      | name                                                      |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindEnabled
  Scenario Outline: Get the list of files in the trashbin with depth infinity
    Given using <dav_version> DAV path
    And the administrator has set depth_infinity_allowed to 1
    And user "Alice" has deleted the following resources
      | path           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    When user "Alice" lists the resources in the trashbin with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "207"
    And the trashbin DAV response should contain these nodes
      | name                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                            |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindDisabled
  Scenario Outline: Get the list of resources in the root folder with depth infinity when depth infinity is not allowed
    Given using <dav_version> DAV path
    When user "Alice" lists the resources in "/" with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "412"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindDisabled
  Scenario Outline: Get the list of resources in a folder shared through public link with depth infinity when depth infinity is not allowed
    Given using <dav_version> DAV path
    And user "Alice" has created the following folders
      | path                                                                       |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    And user "Alice" has created a public link share of folder "simple-folder"
    When the public lists the resources in the last created public link with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "412"
    @issue-ocis-2079
    Examples:
      | dav_version |
      | old         |
      | new         |

  @depthInfinityPropfindDisabled
  Scenario Outline: Get the list of files in the trashbin with depth infinity when depth infinity is not allowed
    Given using <dav_version> DAV path
    And user "Alice" has deleted the following resources
      | path           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    When user "Alice" lists the resources in the trashbin with depth "infinity" using the WebDAV API
    Then the HTTP status code should be "412"
    Examples:
      | dav_version |
      | old         |
      | new         |
