@api @issue-ocis-reva-101
Feature: get quota
  As a user
  I want to be able to find out my available storage quota
  So that I can manage the use of my allocated storage

  Background:
    Given using OCS API version "1"
    And user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: Retrieving folder quota when no quota is set
    Given using <dav_version> DAV path
    When the administrator gives unlimited quota to user "Alice" using the provisioning API
    Then as user "Alice" folder "/" should contain a property "d:quota-available-bytes" with value "-3"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Retrieving folder quota when quota is set
    Given using <dav_version> DAV path
    When the administrator sets the quota of user "Alice" to "10 MB" using the provisioning API
    Then as user "Alice" folder "/" should contain a property "d:quota-available-bytes" with value "10485597"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Retrieving folder quota of shared folder with quota when no quota is set for recipient
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has been given unlimited quota
    And the quota of user "Brian" has been set to "10 MB"
    And user "Brian" has created folder "/testquota"
    And user "Brian" has created a share with settings
      | path        | testquota |
      | shareType   | user      |
      | permissions | all       |
      | shareWith   | Alice     |
    When user "Alice" gets the following properties of folder "/testquota" using the WebDAV API
      | propertyName            |
      | d:quota-available-bytes |
    Then the single response should contain a property "d:quota-available-bytes" with value "10485597"
    Examples:
      | dav_version |
      | old         |
      | new         |

  Scenario Outline: Retrieving folder quota when quota is set and a file was uploaded
    Given using <dav_version> DAV path
    And the quota of user "Alice" has been set to "1 KB"
    And user "Alice" has uploaded file "/prueba.txt" of size 93 bytes
    When user "Alice" gets the following properties of folder "/" using the WebDAV API
      | propertyName            |
      | d:quota-available-bytes |
    Then the single response should contain a property "d:quota-available-bytes" with value "768"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @files_sharing-app-required
  Scenario Outline: Retrieving folder quota when quota is set and a file was received
    Given using <dav_version> DAV path
    And user "Brian" has been created with default attributes and without skeleton files
    And the quota of user "Brian" has been set to "1 KB"
    And user "Alice" has uploaded file "/Alice.txt" of size 93 bytes
    And user "Alice" has shared file "Alice.txt" with user "Brian"
    When user "Brian" gets the following properties of folder "/" using the WebDAV API
      | propertyName            |
      | d:quota-available-bytes |
    Then the single response should contain a property "d:quota-available-bytes" with value "861"
    Examples:
      | dav_version |
      | old         |
      | new         |

  @smokeTest
  Scenario Outline: Retrieving folder quota when quota is set for a user initialized with skeleton files
    Given user "Brian" has been created with default attributes and small skeleton files
    And using <dav_version> DAV path
    When the administrator sets the quota of user "Brian" to "10 MB" using the provisioning API
    Then as user "Brian" folder "/" should contain a property "d:quota-available-bytes" with value "10485406"
    Examples:
      | dav_version |
      | old         |
      | new         |
