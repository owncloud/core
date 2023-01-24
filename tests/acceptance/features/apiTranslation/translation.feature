@api @skipOnLDAP
Feature: translate messages in api response to preferred language
  As a user
  I want response messages to be translated in preferred language
  So that I can see and understand the response messages in my language

  Scenario Outline: user tries to get non existing share and uses some preferred language
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And using <dav_version> DAV path
    And user "Brian" has uploaded file "filesForUpload/textfile.txt" to "/textfile0.txt"
    And user "Brian" has shared file "textfile0.txt" with user "Carol"
    When user "Alice" gets the info of the last share in language "<language>" using the sharing API
    Then the OCS status code should be "404"
    And the OCS status message should be "Wrong share ID, share doesn't exist" in language "<language>"
    Examples:
      | dav_version | language |
      | old         | de-DE    |
      | old         | es-ES    |
      | old         | zh-CN    |
      | old         | fr-FR    |
      | new         | de-DE    |
      | new         | es-ES    |
      | new         | zh-CN    |
      | new         | fr-FR    |
