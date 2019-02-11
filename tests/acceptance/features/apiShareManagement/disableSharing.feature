@api @TestAlsoOnExternalUserBackend
Feature: sharing
  As an admin
  I want to be able to disable sharing functionality
  So that ownCloud users cannot share file or folder

  Background:
    Given using old DAV path
    And user "user0" has been created with default attributes
    And user "user1" has been created with default attributes

  @smokeTest
  Scenario Outline: user tries to share a file with another user when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to share file "welcome.txt" with user "user1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: user tries to share a folder with another user when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to share folder "/FOLDER" with user "user1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: user tries to share a file with group when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to share file "welcome.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: user tries to share a folder with group when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to share folder "/FOLDER" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: user tries to create public link share of a file when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to create a public link share of file "welcome.txt" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @smokeTest
  Scenario Outline: user tries to create public link share of a folder when the sharing api has been disabled
    Given using OCS API version "<ocs_api_version>"
    When parameter "shareapi_enabled" of app "core" has been set to "no"
    Then user "user0" should not be able to create a public link share of folder "/FOLDER" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  @smokeTest
  Scenario Outline: user tries to share a file with user who is not in their group when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "user1" should not be able to share file "welcome.txt" with user "user0" using the sharing API
    And the OCS status code should be "403"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 403              |

  Scenario Outline: user shares a file with user who is in their group when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user2" has been created with default attributes
    And user "user2" has been added to group "grp1"
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "user2" should be able to share file "welcome.txt" with user "user1" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  Scenario Outline: user shares a file with the group they are not member of when sharing outside the group has been restricted
    Given using OCS API version "<ocs_api_version>"
    And group "grp2" has been created
    And group "grp1" has been created
    And user "user3" has been created with default attributes
    And user "user3" has been added to group "grp2"
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    Then user "user3" should be able to share file "welcome.txt" with group "grp1" using the sharing API
    And the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: user who is not a member of a group tries to share a file in the group when group sharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    Then user "user0" should not be able to share file "welcome.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |

  Scenario Outline: user who is a member of a group tries to share a file in the group when group sharing has been disabled
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user2" has been created with default attributes
    And user "user2" has been added to group "grp1"
    And user "user1" has been added to group "grp1"
    When parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    Then user "user2" should not be able to share file "welcome.txt" with group "grp1" using the sharing API
    And the OCS status code should be "404"
    And the HTTP status code should be "<http_status_code>"
    Examples:
      | ocs_api_version | http_status_code |
      | 1               | 200              |
      | 2               | 404              |