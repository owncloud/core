@api @TestAlsoOnExternalUserBackend
Feature: favorite

  Background:
    Given using OCS API version "1"
    And user "user0" has been created with default attributes and without skeleton files
    And user "user0" has uploaded file with content "some data" to "/textfile0.txt"
    And user "user0" has uploaded file with content "some data" to "/textfile1.txt"
    And user "user0" has uploaded file with content "some data" to "/textfile2.txt"
    And user "user0" has uploaded file with content "some data" to "/textfile3.txt"
    And user "user0" has uploaded file with content "some data" to "/textfile4.txt"
    And user "user0" has created folder "/FOLDER"
    And user "user0" has created folder "/PARENT"
    And user "user0" has uploaded file with content "some data" to "/PARENT/parent.txt"

  Scenario Outline: Favorite a folder
    Given using <dav_version> DAV path
    When user "user0" favorites element "/FOLDER" using the WebDAV API
    Then as user "user0" folder "/FOLDER" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Favorite and unfavorite a folder
    Given using <dav_version> DAV path
    When user "user0" favorites element "/FOLDER" using the WebDAV API
    And user "user0" unfavorites element "/FOLDER" using the WebDAV API
    Then as user "user0" folder "/FOLDER" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Favorite a file
    Given using <dav_version> DAV path
    When user "user0" favorites element "/textfile0.txt" using the WebDAV API
    Then as user "user0" file "/textfile0.txt" should be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Favorite and unfavorite a file
    Given using <dav_version> DAV path
    When user "user0" favorites element "/textfile0.txt" using the WebDAV API
    And user "user0" unfavorites element "/textfile0.txt" using the WebDAV API
    Then as user "user0" file "/textfile0.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: Get favorited elements of a folder
    Given using <dav_version> DAV path
    When user "user0" favorites element "/FOLDER" using the WebDAV API
    And user "user0" favorites element "/textfile0.txt" using the WebDAV API
    And user "user0" favorites element "/textfile1.txt" using the WebDAV API
    Then user "user0" in folder "/" should have favorited the following elements
      | /FOLDER        |
      | /textfile0.txt |
      | /textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: Get favorited elements of a subfolder
    Given using <dav_version> DAV path
    And user "user0" has created folder "/subfolder"
    And user "user0" has uploaded file with content "some data" to "/subfolder/textfile0.txt"
    And user "user0" has uploaded file with content "some data" to "/subfolder/textfile1.txt"
    And user "user0" has uploaded file with content "some data" to "/subfolder/textfile2.txt"
    When user "user0" favorites element "/subfolder/textfile0.txt" using the WebDAV API
    And user "user0" favorites element "/subfolder/textfile1.txt" using the WebDAV API
    And user "user0" favorites element "/subfolder/textfile2.txt" using the WebDAV API
    And user "user0" unfavorites element "/subfolder/textfile1.txt" using the WebDAV API
    Then user "user0" in folder "/subfolder" should have favorited the following elements
      | /subfolder/textfile0.txt |
      | /subfolder/textfile2.txt |
    And user "user0" in folder "/subfolder" should not have favorited the following elements
      | /subfolder/textfile1.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: moving a favorite file out of a share keeps favorite state
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has created folder "/shared"
    And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
    And user "user0" has shared folder "/shared" with user "user1"
    And user "user1" has favorited element "/shared/shared_file.txt"
    When user "user1" moves file "/shared/shared_file.txt" to "/taken_out.txt" using the WebDAV API
    Then user "user1" in folder "/" should have favorited the following elements
      | /taken_out.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-33840
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: Get favorited elements and limit count of entries
    Given using <dav_version> DAV path
    And user "user0" has favorited element "/textfile0.txt"
    And user "user0" has favorited element "/textfile1.txt"
    And user "user0" has favorited element "/textfile2.txt"
    And user "user0" has favorited element "/textfile3.txt"
    And user "user0" has favorited element "/textfile4.txt"
    When user "user0" lists the favorites of folder "/" and limits the result to 3 elements using the WebDAV API
    #Then the search result of "user0" should contain any "3" of these entries:
    Then the search result should contain any "0" of these entries:
      | /textfile0.txt |
      | /textfile1.txt |
      | /textfile2.txt |
      | /textfile3.txt |
      | /textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @issue-33840
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: Get favorited elements paginated in subfolder
    Given using <dav_version> DAV path
    And user "user0" has created folder "/subfolder"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile0.txt"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile1.txt"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile2.txt"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile3.txt"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile4.txt"
    And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile5.txt"
    And user "user0" has favorited element "/subfolder/textfile0.txt"
    And user "user0" has favorited element "/subfolder/textfile1.txt"
    And user "user0" has favorited element "/subfolder/textfile2.txt"
    And user "user0" has favorited element "/subfolder/textfile3.txt"
    And user "user0" has favorited element "/subfolder/textfile4.txt"
    And user "user0" has favorited element "/subfolder/textfile5.txt"
    When user "user0" lists the favorites of folder "/" and limits the result to 3 elements using the WebDAV API
    #Then the search result of "user0" should contain any "3" of these entries:
    Then the search result should contain any "0" of these entries:
      | /subfolder/textfile0.txt |
      | /subfolder/textfile1.txt |
      | /subfolder/textfile2.txt |
      | /subfolder/textfile3.txt |
      | /subfolder/textfile4.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: sharer file favorite state should not change the favorite state of sharee
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has moved file "/textfile0.txt" to "/favoriteFile.txt"
    And user "user0" has shared file "/favoriteFile.txt" with user "user1"
    When user "user0" favorites element "/favoriteFile.txt" using the WebDAV API
    Then as user "user1" file "/favoriteFile.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  @skipOnOcis @issue-ocis-reva-21
  Scenario Outline: sharee file favorite state should not change the favorite state of sharer
    Given using <dav_version> DAV path
    And user "user1" has been created with default attributes and skeleton files
    And user "user0" has moved file "/textfile0.txt" to "/favoriteFile.txt"
    And user "user0" has shared file "/favoriteFile.txt" with user "user1"
    When user "user1" favorites element "/favoriteFile.txt" using the WebDAV API
    Then as user "user0" file "/favoriteFile.txt" should not be favorited
    Examples:
      | dav_version |
      | old         |
      | new         |

  @skipOnOcis @issue-ocis-reva-39
  Scenario Outline: favoriting a folder does not change the favorite state of elements inside the folder
    Given using <dav_version> DAV path
    When user "user0" favorites element "/PARENT/parent.txt" using the WebDAV API
    And user "user0" favorites element "/PARENT" using the WebDAV API
    Then user "user0" in folder "/" should have favorited the following elements
      | /PARENT            |
      | /PARENT/parent.txt |
    Examples:
      | dav_version |
      | old         |
      | new         |
