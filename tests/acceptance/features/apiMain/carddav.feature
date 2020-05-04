@api @TestAlsoOnExternalUserBackend @skipOnOcis
Feature: carddav

  Background:
    Given user "Alice" has been created with default attributes and skeleton files

  @carddav
  Scenario: Accessing a not existing addressbook of another user
    When the administrator requests address book "%username%/MyAddressbook" of user "Alice" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not shared addressbook of another user
    Given the administrator has successfully created an address book named "MyAddressbook"
    When user "Alice" requests address book "%username%/MyAddressbook" of user "admin" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not existing addressbook of myself
    When user "Alice" requests address book "%username%/MyAddressbook" of user "admin" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  @smokeTest
  Scenario: Creating a new addressbook
    Given user "Alice" has successfully created an address book named "MyAddressbook"
    When user "Alice" requests address book "%username%/MyAddressbook" of user "Alice" using the new WebDAV API
    Then the CardDAV HTTP status code should be "200"
