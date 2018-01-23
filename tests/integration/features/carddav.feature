Feature: carddav

  Background:
    Given user "user0" has been created

  @carddav
  Scenario: Accessing a not existing addressbook of another user
    When user "admin" requests addressbook "user0/MyAddressbook" using the API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not shared addressbook of another user
    And user "admin" has successfully created an addressbook named "MyAddressbook"
    When user "user0" requests addressbook "admin/MyAddressbook" using the API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not existing addressbook of myself
    When user "user0" requests addressbook "admin/MyAddressbook" using the API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Creating a new addressbook
    Given user "user0" has successfully created an addressbook named "MyAddressbook"
    When user "user0" requests addressbook "user0/MyAddressbook" using the API
    Then the CardDAV HTTP status code should be "200"
