@api @preview-extension-required
Feature: sizing of previews of files downloaded through the webdav API
  As a user
  I want previews to be the exact requested size even when I ask for an unusual preview size combination
  So that the previews always have the exact size that I want as a user/client.

  This is optional behavior of an implementation. oC10 happens like this,
  but OCIS does an auto-fix of the aspect ratio.

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files


  Scenario Outline: download different sizes of previews of file
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width <width> and height <height> using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be <width> pixels wide and <height> pixels high
    Examples:
      | width | height |
      | 1     | 1      |
      | 32    | 32     |
      | 1024  | 1024   |
      | 1     | 1024   |
      | 1024  | 1      |
