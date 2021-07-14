@api
Feature: download file
  As a user
  I want to be able to list my files
  So that I can understand my file structure in owncloud

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has created the following folders
      | path                                        |
      | simple-folder                               |
      | simple-folder/simple-folder1                |
      | simple-folder/simple-empty-folder           |
      | simple-folder/simple-folder1/simple-folder2 |
    And user "Alice" uploads the following files with content "simple-test-content"
      | path                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |

  Scenario Outline: Get the list of all files on the root folder
    Given using <dav_version> DAV path
    When user "Alice" gets all their files on "/" with depth "0" using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should not contain these nodes
      | name                              |
      | textfile0.txt                     |
      | welcome.txt                       |
      | simple-folder/                    |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    When user "Alice" gets all their files on "/" with depth 1 using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should contain these nodes
      | name           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    And the last dav response for user "Alice" should not contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    When user "Alice" gets all their files on "/" with depth "infinity" using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should contain these nodes
      | name                                                      |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                            |
      | simple-folder/textfile0.txt                              |
      | simple-folder/welcome.txt                                |
      | simple-folder/simple-folder1/                            |
      | simple-folder/simple-folder1/simple-folder2               |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Get the list of all files on a folder
    Given using <dav_version> DAV path
    When user "Alice" gets all their files on "/simple-folder" with depth "0" using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should contain these nodes
      | name           |
      | simple-folder/ |
    And the last dav response for user "Alice" should not contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    When user "Alice" gets all their files on "/simple-folder" with depth 1 using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should contain these nodes
      | name                              |
      | simple-folder/welcome.txt         |
      | simple-folder/textfile0.txt       |
      | simple-folder/simple-empty-folder |
      | simple-folder/simple-folder1      |
    And the last dav response for user "Alice" should not contain these nodes
      | name                                                      |
      | simple-folder/simple-folder1/simple-folder2               |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    When user "Alice" gets all their files on "/simple-folder" with depth "infinity" using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last dav response for user "Alice" should contain these nodes
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

  Scenario Outline: Get the list of all files on a folder shared through public link
    Given using <dav_version> DAV path
    And user "Alice" has created the following folders
      | path                                                                       |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3                |
      | /simple-folder/simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    And user "Alice" has created a public link share of folder "simple-folder"
    When the public gets all files on the last created public link with depth 0 using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link dav response should not contain these nodes
      | name                                          |
      | /textfile0.txt                                |
      | /welcome.txt                                  |
      | /simple-folder1/                              |
      | /simple-folder1/welcome.txt                   |
      | /simple-folder1/simple-folder2                |
      | /simple-folder1/textfile0.txt                 |
      | /simple-folder1/simple-folder2/textfile0.txt  |
      | /simple-folder1/simple-folder2/welcome.txt    |
      | /simple-folder1/simple-folder2/simple-folder3 |
      | /simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    When the public gets all files on the last created public link with depth 1 using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link dav response should contain these nodes
      | name             |
      | /textfile0.txt   |
      | /welcome.txt     |
      | /simple-folder1/ |
    And the last public link dav response should not contain these nodes
      | name                                          |
      | /simple-folder1/simple-folder2/textfile0.txt  |
      | /simple-folder1/simple-folder2/welcome.txt    |
      | /simple-folder1/simple-folder2/simple-folder3 |
      | /simple-folder1/welcome.txt                   |
      | /simple-folder1/simple-folder2                |
      | /simple-folder1/textfile0.txt                 |
      | /simple-folder1/simple-folder2/simple-folder3/simple-folder4 |
    When the public gets all files on the last created public link with depth infinity using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the last public link dav response should contain these nodes
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
     Examples:
       | dav_version |
       | old         |
       | new         |

  Scenario: Get the list of all files on a folder on trashbin
    Given using new DAV path
    And user "Alice" has deleted the following resources
      | path           |
      | textfile0.txt  |
      | welcome.txt    |
      | simple-folder/ |
    When user "Alice" gets files on the trashbin path "/" with depth 0 using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the trashbin dav response should not contain these nodes
      | name                                                         |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                               |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
     When user "Alice" gets files on the trashbin path "/" with depth 1 using the using the WebDAV API
     Then the HTTP status code should be "207"
     And the trashbin dav response should contain these nodes
       | name                                                         |
       | textfile0.txt                                             |
       | welcome.txt                                               |
       | simple-folder/                                               |
     And the trashbin dav response should not contain these nodes
       | name                                                         |
       | simple-folder/textfile0.txt                               |
       | simple-folder/welcome.txt                                 |
       | simple-folder/simple-folder1/textfile0.txt                |
       | simple-folder/simple-folder1/welcome.txt                  |
       | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
       | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
    When user "Alice" gets files on the trashbin path "/" with depth infinity using the using the WebDAV API
    Then the HTTP status code should be "207"
    And the trashbin dav response should contain these nodes
      | name                                                         |
      | textfile0.txt                                             |
      | welcome.txt                                               |
      | simple-folder/                                               |
      | simple-folder/textfile0.txt                               |
      | simple-folder/welcome.txt                                 |
      | simple-folder/simple-folder1/textfile0.txt                |
      | simple-folder/simple-folder1/welcome.txt                  |
      | simple-folder/simple-folder1/simple-folder2/textfile0.txt |
      | simple-folder/simple-folder1/simple-folder2/welcome.txt   |
#    Examples:
#      | dav_version |
#      | old         |
#       | new         |
