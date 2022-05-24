@webUI @insulated @disablePreviews
Feature: create folder
  As a user
  I want to create folders
  So that I can organise my data structure

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files
    And user "Alice" has logged in using the webUI
    And the user has browsed to the files page

  Scenario Outline: Create a folder using special characters
    When the user creates a folder with the name <folder_name> using the webUI
    Then folder <folder_name> should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder <folder_name> should be listed on the webUI
    Examples:
      | folder_name              |
      | 'सिमप्ले फोल्देर $%#?&@' |
      | '"somequotes1"'          |
      | "'somequotes2'"          |
      | "^#29][29@({"            |
      | "+-{$(882)"              |
      | "s,a,m,p,l,e-folder"     |

  Scenario Outline: Create a sub-folder inside a folder with problematic name
	# First try and create a folder with problematic name
	# Then try and create a sub-folder inside the folder with problematic name
    When the user creates a folder with the name <folder> using the webUI
    And the user opens folder <folder> using the webUI
    Then there should be no files/folders listed on the webUI
    When the user creates a folder with the name "sub-folder" using the webUI
    Then folder "sub-folder" should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder "sub-folder" should be listed on the webUI
    Examples:
      | folder               |
      | "?&%0"               |
      | "^#2929@"            |
      | "s,a,m,p,l,e-folder" |

  @smokeTest @skipOnLDAP @mobileResolutionTest
  Scenario Outline: Create a sub-folder inside an existing folder with problematic name
    Given user "Alice" has created folder <folder>
    And the user has reloaded the current page of the webUI
    When the user opens folder <folder> using the webUI
    And the user creates a folder with the name "sub-folder" using the webUI
    Then folder "sub-folder" should be listed on the webUI
    When the user reloads the current page of the webUI
    Then folder "sub-folder" should be listed on the webUI
    Examples:
      | folder                  |
      | "0"                     |
      | "'single'quotes"        |
      | "strängé नेपाली folder" |
      | "s,a,m,p,l,e-folder"    |


  Scenario: Create folder with an emoji in the name
    When the user creates a folder with the following name using the webUI
      | name-parts        |
      | ⛹ game day video |
      | skiing photos ⛷  |
    Then the following folder should be listed on the webUI
      | name-parts        |
      | ⛹ game day video |
      | skiing photos ⛷  |
    When the user reloads the current page of the webUI
    Then the following folder should be listed on the webUI
      | name-parts        |
      | ⛹ game day video |
      | skiing photos ⛷  |

