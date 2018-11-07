@api @TestAlsoOnExternalUserBackend
Feature: carddav

  Background:
    Given user "user0" has been created

  @carddav
  Scenario: Accessing a not existing addressbook of another user
    When the administrator requests address book "user0/MyAddressbook" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not shared addressbook of another user
    Given the administrator has successfully created an address book named "MyAddressbook"
    When user "user0" requests address book "admin/MyAddressbook" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  Scenario: Accessing a not existing addressbook of myself
    When user "user0" requests address book "admin/MyAddressbook" using the new WebDAV API
    Then the CardDAV HTTP status code should be "404"
    And the CardDAV exception should be "Sabre\DAV\Exception\NotFound"
    And the CardDAV error message should be "Addressbook with name 'MyAddressbook' could not be found"

  @carddav
  @smokeTest
  Scenario: Creating a new addressbook
    Given user "user0" has successfully created an address book named "MyAddressbook"
    When user "user0" requests address book "user0/MyAddressbook" using the new WebDAV API
    Then the CardDAV HTTP status code should be "200"
