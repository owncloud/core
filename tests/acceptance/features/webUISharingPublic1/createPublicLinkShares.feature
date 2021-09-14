@webUI @insulated @disablePreviews @mailhog @public_link_share-feature-required @files_sharing-app-required
Feature: Share by public link
  As a user
  I want to share files through a publicly accessible link
  So that users who do not have an account on my ownCloud server can access them

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI

  @skipOnOcV10.8.0
  Scenario: read only public link quick action works when enabled
    Given the administrator has "enabled" public link quick action
    And user "Alice" has created folder "/simple-folder"
    And user "Alice" has uploaded file with content "test" to "/simple-folder/lorem.txt"
    And user "Alice" has logged in using the webUI
    When the user browses to the files page
    Then the public link quick action button should be displayed for folder "simple-folder" on the webUI
    When the user creates a read only public link for folder "simple-folder" using the quick action button
    And the public accesses the last created public link using the webUI
    Then file "lorem.txt" should be listed on the webUI
