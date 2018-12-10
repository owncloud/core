@api
Feature: favorite

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes
    And as user "user0"

  Scenario Outline: Favorite a folder
    Given using <dav_version> DAV path
    When the user favorites element "/FOLDER" using the WebDAV API
    Then as the user folder "/FOLDER" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Favorite and unfavorite a folder
    Given using <dav_version> DAV path
    When the user favorites element "/FOLDER" using the WebDAV API
    And the user unfavorites element "/FOLDER" using the WebDAV API
    Then as the user folder "/FOLDER" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Favorite a file
    Given using <dav_version> DAV path
    When the user favorites element "/textfile0.txt" using the WebDAV API
    Then as the user file "/textfile0.txt" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Favorite and unfavorite a file
    Given using <dav_version> DAV path
    When the user favorites element "/textfile0.txt" using the WebDAV API
    And the user unfavorites element "/textfile0.txt" using the WebDAV API
    Then as the user file "/textfile0.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Get favorited elements of a folder
    Given using <dav_version> DAV path
    When the user favorites element "/FOLDER" using the WebDAV API
    And the user favorites element "/textfile0.txt" using the WebDAV API
    And the user favorites element "/textfile1.txt" using the WebDAV API
    Then the user in folder "/" should have favorited the following elements
      | /FOLDER        |
      | /textfile0.txt |
      | /textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Get favorited elements of a subfolder
    Given using <dav_version> DAV path
    And the user has created folder "/subfolder"
    And the user has moved file "/textfile0.txt" to "/subfolder/textfile0.txt"
    And the user has moved file "/textfile1.txt" to "/subfolder/textfile1.txt"
    And the user has moved file "/textfile2.txt" to "/subfolder/textfile2.txt"
    When the user favorites element "/subfolder/textfile0.txt" using the WebDAV API
    And the user favorites element "/subfolder/textfile1.txt" using the WebDAV API
    And the user favorites element "/subfolder/textfile2.txt" using the WebDAV API
    And the user unfavorites element "/subfolder/textfile1.txt" using the WebDAV API
    Then the user in folder "/subfolder" should have favorited the following elements
      | /subfolder/textfile0.txt |
      | /subfolder/textfile2.txt |
    And the user in folder "/subfolder" should not have favorited the following elements
      | /subfolder/textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: moving a favorite file out of a share keeps favorite state
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And the user has created folder "/shared"
    And the user has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And the user has shared folder "/shared" with user "user1"
    And user "user1" has favorited element "/shared/shared_file.txt"
    When user "user1" moves file "/shared/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then user "user1" in folder "/" should have favorited the following elements
      | /taken_out.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skip @issue-33840
  Scenario Outline: Get favorited elements and limit count of entries
    Given using <dav_version> DAV path
    And the user has favorited element "/textfile0.txt"
    And the user has favorited element "/textfile1.txt"
    And the user has favorited element "/textfile2.txt"
    And the user has favorited element "/textfile3.txt"
    And the user has favorited element "/textfile4.txt"
    When the user lists the favorites of folder "/" and limits the result to 3 elements using the WebDAV API
    And the search result of "user0" shoud contain any "3" of these entries:
      | /textfile0.txt |
      | /textfile1.txt |
      | /textfile2.txt |
      | /textfile3.txt |
      | /textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skip @issue-33840
  Scenario Outline: Get favorited elements paginated in subfolder
    Given using <dav_version> DAV path
    And the user has created folder "/subfolder"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile0.txt"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile1.txt"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile2.txt"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile3.txt"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile4.txt"
    And the user has copied file "/textfile0.txt" to "/subfolder/textfile5.txt"
    And the user has favorited element "/subfolder/textfile0.txt"
    And the user has favorited element "/subfolder/textfile1.txt"
    And the user has favorited element "/subfolder/textfile2.txt"
    And the user has favorited element "/subfolder/textfile3.txt"
    And the user has favorited element "/subfolder/textfile4.txt"
    And the user has favorited element "/subfolder/textfile5.txt"
    When the user lists the favorites of folder "/" and limits the result to 3 elements using the WebDAV API
    And the search result of "user0" shoud contain any "3" of these entries:
      | /subfolder/textfile0.txt |
      | /subfolder/textfile1.txt |
      | /subfolder/textfile2.txt |
      | /subfolder/textfile3.txt |
      | /subfolder/textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: sharer file favorite state should not change the favorite state of sharee
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And the user has moved file "/textfile0.txt" to "/favoriteFile.txt"
    And the user has shared file "/favoriteFile.txt" with user "user1"
    When the user favorites element "/favoriteFile.txt" using the WebDAV API
    Then as user "user1" file "/favoriteFile.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: sharee file favorite state should not change the favorite state of sharer
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes
    And the user has moved file "/textfile0.txt" to "/favoriteFile.txt"
    And the user has shared file "/favoriteFile.txt" with user "user1"
    When user "user1" favorites element "/favoriteFile.txt" using the WebDAV API
    Then as the user file "/favoriteFile.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: favoriting a folder does not change the favorite state of elements inside the folder
    Given using <dav_version> DAV path
    When the user favorites element "/PARENT/parent.txt" using the WebDAV API
    And the user favorites element "/PARENT" using the WebDAV API
    Then the user in folder "/" should have favorited the following elements
      | /PARENT            |
      | /PARENT/parent.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |
