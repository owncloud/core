@api @TestAlsoOnExternalUserBackend
Feature: auth
  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @issue-32068
  Scenario Outline: using OCS anonymously
    When a user requests "<endpoint>" with "GET" and no authentication
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      |/ocs/v2.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      |/ocs/v1.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      |/ocs/v2.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      |/ocs/v1.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v2.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v1.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v2.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v1.php/cloud/users                                     | 997      | 401       |
      |/ocs/v2.php/cloud/users                                     | 997      | 401       |
      |/ocs/v1.php/config                                          | 100      | 200       |
      |/ocs/v2.php/config                                          | 200      | 200       |
      |/ocs/v1.php/privatedata/getattribute                        | 997      | 401       |
      |/ocs/v2.php/privatedata/getattribute                        | 997      | 401       |

  @issue-32068
  Scenario Outline: using OCS with non-admin basic auth
    When user "user0" requests "<endpoint>" with "GET" using basic auth
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/apps/files_external/api/v1/mounts               | 100      | 200       |
      |/ocs/v2.php/apps/files_external/api/v1/mounts               | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/shares                | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/shares                | 200      | 200       |
      |/ocs/v1.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v2.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v1.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v2.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v1.php/cloud/users                                     | 997      | 401       |
      |/ocs/v2.php/cloud/users                                     | 997      | 401       |
      |/ocs/v1.php/config                                          | 100      | 200       |
      |/ocs/v2.php/config                                          | 200      | 200       |
      |/ocs/v1.php/privatedata/getattribute                        | 100      | 200       |
      |/ocs/v2.php/privatedata/getattribute                        | 200      | 200       |

  @issue-32068
  Scenario Outline: using OCS as normal user with wrong password
    Given using OCS API version "<ocs_api_version>"
    When user "user0" sends HTTP method "GET" to OCS API endpoint "<endpoint>" using password "invalid"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                         | ocs-code | http-code |
      | 1               |/apps/files_external/api/v1/mounts               | 997      | 401       |
      | 2               |/apps/files_external/api/v1/mounts               | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | 1               |/cloud/apps                                      | 997      | 401       |
      | 2               |/cloud/apps                                      | 997      | 401       |
      | 1               |/cloud/groups                                    | 997      | 401       |
      | 2               |/cloud/groups                                    | 997      | 401       |
      | 1               |/cloud/users                                     | 997      | 401       |
      | 2               |/cloud/users                                     | 997      | 401       |
      | 1               |/config                                          | 100      | 200       |
      | 2               |/config                                          | 200      | 200       |
      | 1               |/privatedata/getattribute                        | 997      | 401       |
      | 2               |/privatedata/getattribute                        | 997      | 401       |

  @issue-32068
  Scenario Outline: send POST requests to OCS endpoints as normal user with wrong password
    Given using OCS API version "<ocs_api_version>"
    And user "user1" has been created with default attributes and skeleton files
    When user "user0" sends HTTP method "POST" to OCS API endpoint "<endpoint>" with body using password "invalid"
      | data        | doesnotmatter |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                             | ocs-code | http-code |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares                    | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 1               |/cloud/apps/testing                                  | 997      | 401       |
      | 2               |/cloud/apps/testing                                  | 997      | 401       |
      | 1               |/cloud/groups                                        | 997      | 401       |
      | 2               |/cloud/groups                                        | 997      | 401       |
      | 1               |/cloud/users                                         | 997      | 401       |
      | 2               |/cloud/users                                         | 997      | 401       |
      | 1               |/cloud/users/user0/groups                            | 997      | 401       |
      | 2               |/cloud/users/user0/groups                            | 997      | 401       |
      | 1               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 2               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 1               |/person/check                                        | 101      | 200       |
      | 2               |/person/check                                        | 400      | 400       |
      | 1               |/privatedata/deleteattribute/testing/test            | 997      | 401       |
      | 2               |/privatedata/deleteattribute/testing/test            | 997      | 401       |
      | 1               |/privatedata/setattribute/testing/test               | 997      | 401       |
      | 2               |/privatedata/setattribute/testing/test               | 997      | 401       |

  Scenario Outline: using OCS with admin basic auth
    When the administrator requests "<endpoint>" with "GET" using basic auth
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/cloud/apps                                      | 100      | 200       |
      |/ocs/v2.php/cloud/apps                                      | 200      | 200       |
      |/ocs/v1.php/cloud/groups                                    | 100      | 200       |
      |/ocs/v2.php/cloud/groups                                    | 200      | 200       |
      |/ocs/v1.php/cloud/users                                     | 100      | 200       |
      |/ocs/v2.php/cloud/users                                     | 200      | 200       |

  Scenario Outline: using OCS as admin user with wrong password
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "GET" to OCS API endpoint "<endpoint>" using password "invalid"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                         | ocs-code | http-code |
      | 1               |/apps/files_external/api/v1/mounts               | 997      | 401       |
      | 2               |/apps/files_external/api/v1/mounts               | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | 1               |/cloud/apps                                      | 997      | 401       |
      | 2               |/cloud/apps                                      | 997      | 401       |
      | 1               |/cloud/groups                                    | 997      | 401       |
      | 2               |/cloud/groups                                    | 997      | 401       |
      | 1               |/cloud/users                                     | 997      | 401       |
      | 2               |/cloud/users                                     | 997      | 401       |
      | 1               |/privatedata/getattribute                        | 997      | 401       |
      | 2               |/privatedata/getattribute                        | 997      | 401       |

  @issue-32068
  Scenario Outline: send PUT requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    When the administrator sends HTTP method "PUT" to OCS API endpoint "<endpoint>" with body using password "invalid"
      | data        | doesnotmatter |
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                              | ocs-code | http-code |
      | 1               |/apps/files_sharing/api/v1/shares/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/123 | 997      | 401       |
      | 1               |/cloud/users/user0                    | 997      | 401       |
      | 2               |/cloud/users/user0                    | 997      | 401       |
      | 1               |/cloud/users/user0/disable            | 997      | 401       |
      | 2               |/cloud/users/user0/disable            | 997      | 401       |
      | 1               |/cloud/users/user0/enable             | 997      | 401       |
      | 2               |/cloud/users/user0/enable             | 997      | 401       |

  @issue-32068
  Scenario Outline: send DELETE requests to OCS endpoints as admin with wrong password
    Given using OCS API version "<ocs_api_version>"
    And group "group1" has been created
    When the administrator sends HTTP method "DELETE" to OCS API endpoint "<endpoint>" using password "invalid"
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      | ocs_api_version |endpoint                                             | ocs-code | http-code |
      | 1               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/pending/123 | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/remote_shares/123         | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/123                | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/123                | 997      | 401       |
      | 1               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 2               |/apps/files_sharing/api/v1/shares/pending/123        | 997      | 401       |
      | 1               |/cloud/apps/testing                                  | 997      | 401       |
      | 2               |/cloud/apps/testing                                  | 997      | 401       |
      | 1               |/cloud/groups/group1                                 | 997      | 401       |
      | 2               |/cloud/groups/group1                                 | 997      | 401       |
      | 1               |/cloud/users/user0                                   | 997      | 401       |
      | 2               |/cloud/users/user0                                   | 997      | 401       |
      | 1               |/cloud/users/user0/groups                            | 997      | 401       |
      | 2               |/cloud/users/user0/groups                            | 997      | 401       |
      | 1               |/cloud/users/user0/subadmins                         | 997      | 401       |
      | 2               |/cloud/users/user0/subadmins                         | 997      | 401       |

  Scenario Outline: using OCS with token auth of a normal user
    Given a new client token for "user0" has been generated
    When user "user0" requests "<endpoint>" with "GET" using basic token auth
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/apps/files_external/api/v1/mounts               | 100      | 200       |
      |/ocs/v2.php/apps/files_external/api/v1/mounts               | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/shares                | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/shares                | 200      | 200       |
      |/ocs/v1.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v2.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v1.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v2.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v1.php/cloud/users                                     | 997      | 401       |
      |/ocs/v2.php/cloud/users                                     | 997      | 401       |
      |/ocs/v1.php/config                                          | 100      | 200       |
      |/ocs/v2.php/config                                          | 200      | 200       |
      |/ocs/v1.php/privatedata/getattribute                        | 100      | 200       |
      |/ocs/v2.php/privatedata/getattribute                        | 200      | 200       |

  Scenario Outline: using OCS with browser session of a normal user
    Given a new browser session for "user0" has been started
    When the user requests "<endpoint>" with "GET" using the browser session
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/apps/files_external/api/v1/mounts               | 100      | 200       |
      |/ocs/v2.php/apps/files_external/api/v1/mounts               | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/shares                | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/shares                | 200      | 200       |
      |/ocs/v1.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v2.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v1.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v2.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v1.php/cloud/users                                     | 997      | 401       |
      |/ocs/v2.php/cloud/users                                     | 997      | 401       |
      |/ocs/v1.php/config                                          | 100      | 200       |
      |/ocs/v2.php/config                                          | 200      | 200       |
      |/ocs/v1.php/privatedata/getattribute                        | 100      | 200       |
      |/ocs/v2.php/privatedata/getattribute                        | 200      | 200       |

  Scenario Outline: using OCS with an app password of a normal user
    Given a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user requests "<endpoint>" with "GET" using the generated app password
    Then the OCS status code should be "<ocs-code>"
    And the HTTP status code should be "<http-code>"
    Examples:
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/apps/files_external/api/v1/mounts               | 100      | 200       |
      |/ocs/v2.php/apps/files_external/api/v1/mounts               | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 200      | 200       |
      |/ocs/v1.php/apps/files_sharing/api/v1/shares                | 100      | 200       |
      |/ocs/v2.php/apps/files_sharing/api/v1/shares                | 200      | 200       |
      |/ocs/v1.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v2.php/cloud/apps                                      | 997      | 401       |
      |/ocs/v1.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v2.php/cloud/groups                                    | 997      | 401       |
      |/ocs/v1.php/cloud/users                                     | 997      | 401       |
      |/ocs/v2.php/cloud/users                                     | 997      | 401       |
      |/ocs/v1.php/config                                          | 100      | 200       |
      |/ocs/v2.php/config                                          | 200      | 200       |
      |/ocs/v1.php/privatedata/getattribute                        | 100      | 200       |
      |/ocs/v2.php/privatedata/getattribute                        | 200      | 200       |
