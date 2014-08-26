*** Settings ***

Variables  variables.py
Resource  common.robot

*** Variables ***


*** Test Cases ***

In order to protect data in my cloud instance i need to login
    Given I am not logged in
    When I'm logged in as an admin
    Then I should be able to access my cloud


*** Keywords ***

# --- GIVEN ------------------------------------------------------------------

I am not logged in
    Go to  ${OWNCLOUD_URL}/index.php?logout=true


# --- WHEN -------------------------------------------------------------------

I'm logged in as an admin
    Go to  ${OWNCLOUD_URL}
    Input text  user  ${ADMIN_USER}
    Input text  password  ${ADMIN_PASSWORD}
    Click button  Log in


# --- THEN -------------------------------------------------------------------


I should be able to access my cloud
    Page should contain element  id=settings
