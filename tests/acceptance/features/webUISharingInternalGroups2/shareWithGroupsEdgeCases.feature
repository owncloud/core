@webUI @insulated @disablePreviews @files_sharing-app-required
Feature: Sharing files and folders with internal groups
  As a user
  I want to share files and folders with groups
  So that those groups can access the files and folders

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 0
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 1
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 2
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 3
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 4
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 5
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 6
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 7
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 8
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions 9
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions A
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions B
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions C
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions D
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions E
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |

  @skipOnOcV10.6 @skipOnOcV10.7
  Scenario: Reshares with groups where the same file ends up in different mountpoints that are renamed should have correct permissions F
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |
      | Brian    |
      | Carol    |
    And user "Carol" has created folder "simple-folder"
    And user "Carol" has created folder "simple-folder/simple-empty-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder"
    And user "Carol" has created folder "simple-folder/simple-inner-folder/simple-inner-inner-folder"
    And these groups have been created:
      | groupname |
      | grp1      |
      | grp2      |
      | grp3      |
      | grp4      |
    And user "Alice" has been added to group "grp1"
    And user "Brian" has been added to group "grp1"
    And user "Alice" has been added to group "grp2"
    And user "Brian" has been added to group "grp2"
    And user "Carol" has uploaded file with content "some data" to "/simple-folder/simple-inner-folder/simple-inner-inner-folder/textfile-2.txt"
    And user "Carol" has shared folder "/simple-folder" with user "Alice" with permissions "all"
    And user "Alice" has shared folder "/simple-folder" with group "grp2" with permissions "all"
    And user "Alice" has shared folder "/simple-folder/simple-inner-folder" with group "grp1" with permissions "read"
    And user "Brian" has created folder "/renamed-simple-folder"
    And user "Brian" has logged in using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # now move received simple-inner-folder into some folder
    And the user moves folder "simple-inner-folder" into folder "renamed-simple-folder" using the webUI
    And the user opens folder "/renamed-simple-folder" using the webUI
    When the user opens the sharing tab from the file action menu of folder "simple-inner-folder" using the webUI
    Then the user should see an error message on the share dialog saying "Sharing is not allowed"
    # after move, sharing folder simple-inner-folder again but with different group should be possible
    And the user browses to the home page
    And the user opens folder "/simple-folder" using the webUI
    When the user shares folder "simple-inner-folder" with group "grp3" using the webUI
    Then the following permissions are seen for "simple-inner-folder" in the sharing dialog for group "grp3"
      | edit   | yes |
      | change | yes |
      | share  | yes |
