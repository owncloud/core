@webUI @insulated @disablePreviews
@files_versions-app-required
Feature: Versions of a file

  As a user
  I would like to see different versions of a file and delete and restore them
  So that I can have more control over the files

  Background:
    Given these users have been created with default attributes and without skeleton files:
      | username |
      | Alice    |

  @skipOnStorage:ceph @files_primary_s3-issue-67
  Scenario: upload new file with same name to see if different versions are shown
    Given user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "new lorem content" to "/randomfile.txt"
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the content of file "randomfile.txt" for user "Alice" should be "new lorem content"
    And the versions list should contain 2 entries


  Scenario: restoring file to old version changes the content of the file
    Given user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And user "Alice" has uploaded file with content "new lorem content" to "/randomfile.txt"
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    And the user restores the file to last version using the webUI
    Then the content of file "randomfile.txt" for user "Alice" should be "lorem content"

  @files_sharing-app-required
  Scenario: sharee can see the versions of a file
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "new lorem content" to "/randomfile.txt"
    And user "Alice" has shared file "randomfile.txt" with user "Brian"
    And user "Brian" has logged in using the webUI
    And the user has browsed to the files page
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the content of file "randomfile.txt" for user "Brian" should be "new lorem content"
    And the versions list should contain 2 entries

  @skipOnStorage:ceph @files_primary_s3-issue-155
  Scenario: file versions cannot be seen on the webUI after deleting versions
    Given user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "new lorem content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And the administrator has cleared the versions for user "Alice"
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    And the versions list should contain 0 entries

  @skipOnStorage:ceph @files_primary_s3-issue-155
  Scenario: file versions cannot be seen on the webUI only for user whose versions is deleted
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Brian" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Brian" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And the administrator has cleared the versions for user "Alice"
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the versions list should contain 0 entries
    When the user logs out of the webUI
    And user "Brian" logs in using the webUI
    And the user has browsed to the files page
    And the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the versions list should contain 1 entries

  @skipOnStorage:ceph @files_primary_s3-issue-155
  Scenario: file versions cannot be seen on the webUI for all users after deleting versions for all users
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Brian" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Brian" has uploaded file with content "lorem" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    And the administrator has cleared the versions for all users
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the versions list should contain 0 entries
    When the user logs out of the webUI
    And user "Brian" logs in using the webUI
    And the user has browsed to the files page
    And the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the versions list should contain 0 entries

  @skipOnStorage:ceph @files_primary_s3-issue-67
  Scenario: versions author is displayed
    Given the administrator has enabled the file version storage feature
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "new lorem content" to "/randomfile.txt"
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the authors of the versions of file "randomfile.txt" should be:
      | index | author |
      | 1     | Alice  |
      | 2     | Alice  |

  @skipOnStorage:ceph @files_primary_s3-issue-67
  Scenario: sharee can see the versions' respective author
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "Alice lorem content" to "/randomfile.txt"
    And user "Alice" has shared file "randomfile.txt" with user "Brian"
    And user "Alice" has shared file "randomfile.txt" with user "Carol"
    And user "Brian" has uploaded file with content "Brian lorem content" to "/randomfile.txt"
    And user "Brian" has uploaded file with content "Brian new lorem content" to "/randomfile.txt"
    And user "Carol" has logged in using the webUI
    And the user has browsed to the files page
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the authors of the versions of file "randomfile.txt" should be:
      | index | author |
      | 1     | Brian  |
      | 2     | Alice  |
      | 3     | Alice  |

  @skipOnStorage:ceph @files_primary_s3-issue-67
  Scenario: sharee can see the versions' respective author after version restore
    Given the administrator has enabled the file version storage feature
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Carol" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file with content "some content" to "/randomfile.txt"
    And user "Alice" has shared file "randomfile.txt" with user "Brian"
    And user "Alice" has shared file "randomfile.txt" with user "Carol"
    And user "Brian" has uploaded file with content "Brian lorem content" to "/randomfile.txt"
    And user "Alice" has uploaded file with content "Alice lorem content" to "/randomfile.txt"
    And user "Carol" has uploaded file with content "Carol lorem content" to "/randomfile.txt"
    And user "Carol" has logged in using the webUI
    And the user has browsed to the files page
    When the user browses directly to display the "versions" details of file "randomfile.txt" in folder "/"
    Then the authors of the versions of file "randomfile.txt" should be:
      | index | author |
      | 1     | Alice  |
      | 2     | Brian  |
      | 3     | Alice  |
    When the user restores the file to last version using the webUI
    Then the authors of the versions of file "randomfile.txt" should be:
      | index | author |
      | 1     | Carol  |
      | 2     | Brian  |
      | 3     | Alice  |
