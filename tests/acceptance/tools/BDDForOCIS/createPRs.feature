Feature: create PRs to ocis & ocis-reva without any questions

  As a QA engineer
  I want to be able to create PRs to ocis & ocis-reva that run tests from the current core branch
  So that I can confirm that the current tests pass in ocis & ocis-reva

  As a ocis developer
  I want to use the current oC10 API tests for BDD
  So that I can make sure ocis is API compatible with oC10

  Scenario: create new PRs
    Given the user has checked out the branch "changed-tests"
    When the user runs the command "crate-prs"
    Then a new PR to the "ocis" repo should be created with the core branch "changed-tests" as test-runner
    And the link to the new PR in the "ocis" repo should be listed on the console
    And a new PR to the "ocis-reva" repo should be created with the core branch "changed-tests" as test-runner
    And the link to the new PR in the "ocis-reva" repo should be listed on the console

  Scenario: update existing PRs
    Given the user has checked out the branch "changed-tests"
    And an open PR to the "ocis" repo exists with the core branch "changed-tests" as test-runner
    And an open PR to the "ocis-reva" repo exists with the core branch "changed-tests" as test-runner
    When the user runs the command "crate-prs"
    Then the existing PR to the "ocis" repo should be rebased and CI should be retriggered
    And the link to the existing PR in the "ocis" repo should be listed on the console
    And the existing PR to the "ocis-reva" repo should be rebased and CI should be retriggered
    And the link to the existing PR in the "ocis-reva" repo should be listed on the console

  Scenario Outline: create new PRs with bugfix changes
    Given the user has checked out the branch "changed-tests"
    And the user has checked out the branch "bug-fix" of the "<repo-with-changes>" local clone
    When the user runs the command "crate-prs --<repo-with-changes>=%path-to-<repo-with-changes>-clone%"
    Then a new commit should be added to the "<repo-with-changes>" local clone
    And a new PR to the "<repo-with-changes>" repo should be created with the core branch "changed-tests" as test-runner and all changes of the "bug-fix" branch
    And the link to the existing PR in the "<repo-with-changes>" repo should be listed on the console
    And a new PR to the "<repo-without-changes>" repo should be created with the core branch "changed-tests" as test-runner
    And the link to the new PR in the "<repo-without-changes>" repo should be listed on the console
    Examples:
      | repo-with-changes | repo-without-changes |
      | ocis-reva         | ocis                 |
      | ocis              | ocis-reva            |
