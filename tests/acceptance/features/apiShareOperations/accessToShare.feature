@api @TestAlsoOnExternalUserBackend @files_sharing-app-required
Feature: sharing

  Background:
    Given using old DAV path
    And these users have been created with default attributes and skeleton files:
      | username |
      | user0    |
      | user1    |

  @smokeTest
  Scenario Outline: Sharee can see the share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    When user "user1" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the filtered share
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has shared file "textfile1.txt" with user "user1"
    When user "user1" gets all the shares shared with him that are received as file "textfile1 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can't see the share that is filtered out
    Given using OCS API version "<ocs_api_version>"
    And user "user0" has shared file "textfile0.txt" with user "user1"
    And user "user0" has shared file "textfile1.txt" with user "user1"
    When user "user1" gets all the shares shared with him that are received as file "textfile0 (2).txt" using the provisioning API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should not be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @smokeTest
  Scenario Outline: Sharee can see the group share
    Given using OCS API version "<ocs_api_version>"
    And group "grp1" has been created
    And user "user1" has been added to group "grp1"
    And user "user0" has shared file "textfile0.txt" with group "grp1"
    When user "user1" gets all the shares shared with him using the sharing API
    Then the OCS status code should be "<ocs_status_code>"
    And the HTTP status code should be "200"
    And the last share_id should be included in the response
    Examples:
      | ocs_api_version | ocs_status_code |
      | 1               | 100             |
      | 2               | 200             |

  @public_link_share-feature-required @skipOnOc10.3
  Scenario: Access to the preview of password protected public link without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "user0" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
      | password    | testpass1       |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"

  @public_link_share-feature-required
  Scenario: Access to the preview of public shared file without password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "testavatar.jpg"
    And user "user0" has created a public link share with settings
      | path        | /testavatar.jpg |
      | permissions | change          |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"

  @public_link_share-feature-required @skipOnOc10.3
  Scenario: Access to the preview of password protected public shared file inside a folder without providing the password is not allowed
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "user0" has moved file "textfile0.txt" to "FOLDER/textfile0.txt"
    And user "user0" has created a public link share with settings
      | path        | /FOLDER         |
      | permissions | change          |
      | password    | testpass1       |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"
    When the public accesses the preview of file "textfile0.txt" from the last shared public link using the sharing API
    Then the HTTP status code should be "404"

  @public_link_share-feature-required
  Scenario: Access to the preview of public shared file inside a folder without password
    Given the administrator has enabled DAV tech_preview
    And user "user0" has uploaded file "filesForUpload/testavatar.jpg" to "FOLDER/testavatar.jpg"
    And user "user0" has moved file "textfile0.txt" to "FOLDER/textfile0.txt"
    And user "user0" has created a public link share with settings
      | path        | /FOLDER         |
      | permissions | change          |
    When the public accesses the preview of file "testavatar.jpg" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"
    When the public accesses the preview of file "textfile0.txt" from the last shared public link using the sharing API
    Then the HTTP status code should be "200"
