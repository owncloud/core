@api
Feature: favorite
    Background:
        Given using OCS API version "1"

    Scenario Outline: Favorite a folder
        Given using <dav_version> DAV path
        And user "user0" has been created
        When user "user0" favorites element "/FOLDER" using the WebDAV API
        And user "user0" gets the following properties of folder "/FOLDER" using the WebDAV API
            |{http://owncloud.org/ns}favorite|
        Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "1"
        Examples:
			| dav_version   |
			| old           |
			| new           |

    Scenario Outline: Favorite and unfavorite a folder
        Given using <dav_version> DAV path
        And user "user0" has been created
        When user "user0" favorites element "/FOLDER" using the WebDAV API
        And user "user0" unfavorites element "/FOLDER" using the WebDAV API
        And user "user0" gets the following properties of folder "/FOLDER" using the WebDAV API
            |{http://owncloud.org/ns}favorite|
        Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "0"
        Examples:
			| dav_version   |
			| old           |
			| new           |

    @smokeTest
    Scenario Outline: Favorite a file
        Given using <dav_version> DAV path
        And user "user0" has been created
        When user "user0" favorites element "/textfile0.txt" using the WebDAV API
        And user "user0" gets the following properties of file "/textfile0.txt" using the WebDAV API
            |{http://owncloud.org/ns}favorite|
        Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "1"
        Examples:
			| dav_version   |
			| old           |
			| new           |

    @smokeTest
    Scenario Outline: Favorite and unfavorite a file
        Given using <dav_version> DAV path
        And user "user0" has been created
        When user "user0" favorites element "/textfile0.txt" using the WebDAV API
        And user "user0" unfavorites element "/textfile0.txt" using the WebDAV API
        And user "user0" gets the following properties of file "/textfile0.txt" using the WebDAV API
            |{http://owncloud.org/ns}favorite|
        Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "0"
        Examples:
			| dav_version   |
			| old           |
			| new           |

    @smokeTest
    Scenario Outline: Get favorited elements of a folder
        Given using <dav_version> DAV path
        And user "user0" has been created
        When user "user0" favorites element "/FOLDER" using the WebDAV API
        And user "user0" favorites element "/textfile0.txt" using the WebDAV API
        And user "user0" favorites element "/textfile1.txt" using the WebDAV API
        Then user "user0" in folder "/" should have favorited the following elements
            | /FOLDER        |
            | /textfile0.txt |
            | /textfile1.txt |
        Examples:
			| dav_version   |
			| old           |
			| new           |

    Scenario Outline: Get favorited elements of a subfolder
        Given using <dav_version> DAV path
        And user "user0" has been created
        And user "user0" has created a folder "/subfolder"
        And user "user0" has moved file "/textfile0.txt" to "/subfolder/textfile0.txt"
        And user "user0" has moved file "/textfile1.txt" to "/subfolder/textfile1.txt"
        And user "user0" has moved file "/textfile2.txt" to "/subfolder/textfile2.txt"
        When user "user0" favorites element "/subfolder/textfile0.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile1.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile2.txt" using the WebDAV API
        And user "user0" unfavorites element "/subfolder/textfile1.txt" using the WebDAV API
        Then user "user0" in folder "/subfolder" should have favorited the following elements
            | /subfolder/textfile0.txt |
            | /subfolder/textfile2.txt |
        Examples:
			| dav_version   |
			| old           |
			| new           |

    Scenario Outline: moving a favorite file out of a share keeps favorite state
        Given using <dav_version> DAV path
        And user "user0" has been created
        And user "user1" has been created
        And user "user0" has created a folder "/shared"
        And user "user0" has moved file "/textfile0.txt" to "/shared/shared_file.txt"
        And user "user0" has shared folder "/shared" with user "user1"
        And user "user1" has favorited element "/shared/shared_file.txt"
        When user "user1" moves file "/shared/shared_file.txt" to "/taken_out.txt" using the WebDAV API
        Then user "user1" in folder "/" should have favorited the following elements
            | /taken_out.txt |
        Examples:
			| dav_version   |
			| old           |
			| new           |

    Scenario Outline: Get favorited elements paginated
        Given using <dav_version> DAV path
        And user "user0" has been created
        And user "user0" has created a folder "/subfolder"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile0.txt"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile1.txt"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile2.txt"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile3.txt"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile4.txt"
        And user "user0" has copied file "/textfile0.txt" to "/subfolder/textfile5.txt"
        When user "user0" favorites element "/subfolder/textfile0.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile1.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile2.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile3.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile4.txt" using the WebDAV API
        And user "user0" favorites element "/subfolder/textfile5.txt" using the WebDAV API
        Then user "user0" in folder "/subfolder" should have favorited the following elements from offset 3 and limit 2
            | /subfolder/textfile2.txt |
            | /subfolder/textfile3.txt |
        Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: sharer file favorite state should not change the favorite state of sharee
		Given using <dav_version> DAV path
		And user "user0" has been created
		And user "user1" has been created
		And user "user0" has moved file "/textfile0.txt" to "/favoriteFile.txt"
		And user "user0" has shared file "/favoriteFile.txt" with user "user1"
		When user "user0" favorites element "/favoriteFile.txt" using the WebDAV API
		And user "user1" gets the following properties of file "/favoriteFile.txt" using the WebDAV API
			|{http://owncloud.org/ns}favorite|
		Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "0"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: sharee file favorite state should not change the favorite state of sharer
		Given using <dav_version> DAV path
		And user "user0" has been created	
		And user "user1" has been created	
		And user "user0" has moved file "/textfile0.txt" to "/favoriteFile.txt"	
		And user "user0" has shared file "/favoriteFile.txt" with user "user1"	
		When user "user1" favorites element "/favoriteFile.txt" using the WebDAV API
		And user "user0" gets the following properties of file "/favoriteFile.txt" using the WebDAV API
			|{http://owncloud.org/ns}favorite|	
		Then the single response should contain a property "{http://owncloud.org/ns}favorite" with value "0"
		Examples:
			| dav_version   |
			| old           |
			| new           |

	Scenario Outline: favoriting a folder does not change the favorite state of elements inside the folder
		Given using <dav_version> DAV path
		And user "user0" has been created
		When user "user0" favorites element "/PARENT/parent.txt" using the WebDAV API
		And user "user0" favorites element "/PARENT" using the WebDAV API
		Then user "user0" in folder "/" should have favorited the following elements
			| /PARENT            |
			| /PARENT/parent.txt |
		Examples:
			| dav_version   |
			| old           |
			| new           |