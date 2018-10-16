@api @provisioning_api-app-required
Feature: edit users
  As an admin, subadmin or as myself
  I want to be able to edit user information
  So that I can keep the user information up-to-date

  Background:
    Given using OCS API version "2"

  @smokeTest
  Scenario: the administrator can edit a user email
    Given user "brand-new-user" has been created
    When the administrator changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | email | brand-new-user@example.com |

  @smokeTest
  Scenario: the administrator can edit a user display name
    Given user "brand-new-user" has been created
    When the administrator changes the display name of user "brand-new-user" to "A New User" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | displayname | A New User |

  @smokeTest
  Scenario: the administrator can edit a user quota
    Given user "brand-new-user" has been created
    When the administrator changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the HTTP status code should be "200"
    And the OCS status code should be "200"
    And user "brand-new-user" should exist
    And the user attributes returned by the API should include
      | quota definition | 12 MB |

  Scenario: the administrator can override existing user email
    Given user "brand-new-user" has been created
    And the administrator has changed the email of user "brand-new-user" to "brand-new-user@gmail.com"
    And the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the administrator has changed the email of user "brand-new-user" to "brand-new-user@example.com"
    And the OCS status code should be "200"
    And the HTTP status code should be "200"
    When the administrator retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the user attributes returned by the API should include
      | email | brand-new-user@example.com |

  @smokeTest
  Scenario: a subadmin should be able to edit the user information in their group
    Given user "subadmin" has been created
    And user "brand-new-user" has been created
    And group "new-group" has been created
    And user "brand-new-user" has been added to group "new-group"
    And user "subadmin" has been made a subadmin of group "new-group"
    And user "subadmin" has changed the quota of user "brand-new-user" to "12MB"
    And user "subadmin" has changed the email of user "brand-new-user" to "brand-new-user@example.com"
    And user "subadmin" has changed the display name of user "brand-new-user" to "Anne Brown"
    When user "subadmin" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the user attributes returned by the API should include
      | quota definition | 12 MB                      |
      | email            | brand-new-user@example.com |
      | displayname      | Anne Brown                 |

  Scenario: a normal user should be able to change their email address
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the email of user "brand-new-user" to "brand-new-user@example.com" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | email | brand-new-user@example.com |
    When user "brand-new-user" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | email | brand-new-user@example.com |

  Scenario: a normal user should be able to change their display name
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the display name of user "brand-new-user" to "Alan Border" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | displayname | Alan Border |
    When user "brand-new-user" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | displayname | Alan Border |

  Scenario: a normal user should not be able to change their quota
    Given user "brand-new-user" has been created
    When user "brand-new-user" changes the quota of user "brand-new-user" to "12MB" using the provisioning API
    Then the OCS status code should be "997"
    And the HTTP status code should be "401"
    And the attributes of user "brand-new-user" returned by the API should include
      | quota definition | default |
    When user "brand-new-user" retrieves the information of user "brand-new-user" using the provisioning API
    Then the OCS status code should be "200"
    And the HTTP status code should be "200"
    And the attributes of user "brand-new-user" returned by the API should include
      | quota definition | default |
