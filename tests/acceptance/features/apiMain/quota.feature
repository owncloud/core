@api
Feature: quota

  Background:
    Given using OCS API version "1"

	# Owner

  Scenario Outline: Uploading a file as owner having enough quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And the quota of user "user0" has been set to "10 MB"
    When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Uploading a file as owner having insufficient quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And the quota of user "user0" has been set to "20 B"
    When user "user0" uploads file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "user0" file "/testquota.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Overwriting a file as owner having enough quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And the quota of user "user0" has been set to "10 MB"
    And user "user0" has uploaded file with content "test" to "/testquota.txt"
    When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Overwriting a file as owner having insufficient quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And the quota of user "user0" has been set to "20 B"
    And user "user0" has uploaded file with content "test" to "/testquota.txt"
    When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "user0" file "/testquota.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

	# Received shared folder

  Scenario Outline: Uploading a file in received folder having enough quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "20 B"
    And the quota of user "user1" has been set to "10 MB"
    And user "user1" has created a folder "/testquota"
    And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
    When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "201"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Uploading a file in received folder having insufficient quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "10 MB"
    And the quota of user "user1" has been set to "20 B"
    And user "user1" has created a folder "/testquota"
    And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
    When user "user0" uploads file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "user0" file "/testquota/testquota.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Overwriting a file in received folder having enough quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "20 B"
    And the quota of user "user1" has been set to "10 MB"
    And user "user1" has created a folder "/testquota"
    And user "user1" has uploaded file with content "test" to "/testquota/testquota.txt"
    And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
    When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Overwriting a file in received folder having insufficient quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "10 MB"
    And the quota of user "user1" has been set to "20 B"
    And user "user1" has created a folder "/testquota"
    And user "user1" has uploaded file with content "test" to "/testquota/testquota.txt"
    And user "user1" has shared folder "/testquota" with user "user0" with permissions 31
    When user "user0" overwrites file "data/textfile.txt" to "/testquota/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    And as "user0" file "/testquota/testquota.txt" should not exist
    Examples:
      | dav_version |
      | old         |
      | new         |

	# Received shared file

  Scenario Outline: Overwriting a received file having enough quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "20 B"
    And the quota of user "user1" has been set to "10 MB"
    And user "user1" has uploaded file with content "test" to "/testquota.txt"
    And user "user1" has shared file "/testquota.txt" with user "user0" with permissions 19
    When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be between "201" and "204"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Overwriting a received file having insufficient quota
    Given using <dav_version> DAV path
    And user "user0" has been created
    And user "user1" has been created
    And the quota of user "user0" has been set to "10 MB"
    And the quota of user "user1" has been set to "20 B"
    And user "user1" has moved file "/textfile0.txt" to "/testquota.txt"
    And user "user1" has shared file "/testquota.txt" with user "user0" with permissions 19
    When user "user0" overwrites file "data/textfile.txt" to "/testquota.txt" with all mechanisms using the WebDAV API
    Then the HTTP status code of all upload responses should be "507"
    Examples:
      | dav_version |
      | old         |
      | new         |