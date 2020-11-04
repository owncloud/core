@api @skipOnLDAP
Feature: translate messages in api response to preferred language
  As a user
  I want response messages to be translated in preferred language
  So that I can see and understand the response messages in my language

  Scenario Outline: user tries to get non existing share and uses some preferred language
    Given user "Alice" has been created with default attributes and without skeleton files
    And these users have been created with default attributes and skeleton files:
      | username |
      | Brian    |
      | Carol    |
    And using <dav_version> DAV path
    And user "Brian" has shared file "textfile0.txt" with user "Carol"
    When user "Alice" gets the info of the last share in language "de-DE" using the sharing API
    Then the OCS status code should be "404"
    And the OCS status message should be "Fehlerhafte Freigabe-ID, Freigabe existiert nicht"
    When user "Alice" gets the info of the last share in language "zh-CN" using the sharing API
    Then the OCS status code should be "404"
    And the OCS status message should be "错误的共享 ID，共享不存在"
    When user "Alice" gets the info of the last share in language "fr-FR" using the sharing API
    Then the OCS status code should be "404"
    And the OCS status message should be "Mauvais ID de partage, le partage n'existe pas"
    When user "Alice" gets the info of the last share in language "es-ES" using the sharing API
    Then the OCS status code should be "404"
    And the OCS status message should be "El ID del recurso compartido no es correcto, el recurso compartido no existe"
    Examples:
      | dav_version |
      | old         |
      | new         |
