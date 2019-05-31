@api @TestAlsoOnExternalUserBackend
Feature: auth
  Background:
    Given user "user0" has been created with default attributes and skeleton files

  @issue-32068
  Scenario: using OCS anonymously
    When a user requests these endpoints with "GET" and no authentication then the status codes should be as listed
      | endpoint                                                    | ocs-code | http-code |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v1.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v2.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v1.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v2.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v1.php/cloud/users                                     | 997      | 401       |
      | /ocs/v2.php/cloud/users                                     | 997      | 401       |
      | /ocs/v1.php/config                                          | 100      | 200       |
      | /ocs/v2.php/config                                          | 200      | 200       |
      | /ocs/v1.php/privatedata/getattribute                        | 997      | 401       |
      | /ocs/v2.php/privatedata/getattribute                        | 997      | 401       |

  @issue-32068
  Scenario: using OCS with non-admin basic auth
    When the user "user0" requests these endpoints with "GET" with basic auth then the status codes should be as listed
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
  Scenario: using OCS as normal user with wrong password
    When user "user0" requests these endpoints with "GET" using password "invalid" then the status codes should be as listed
      | endpoint                                                    | ocs-code | http-code |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v1.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v2.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v1.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v2.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v1.php/cloud/users                                     | 997      | 401       |
      | /ocs/v2.php/cloud/users                                     | 997      | 401       |
      | /ocs/v1.php/config                                          | 100      | 200       |
      | /ocs/v2.php/config                                          | 200      | 200       |
      | /ocs/v1.php/privatedata/getattribute                        | 997      | 401       |
      | /ocs/v2.php/privatedata/getattribute                        | 997      | 401       |

  Scenario:using OCS with admin basic auth
    When the administrator requests these endpoint with "GET" then the status codes should be as listed
      |endpoint                                                    | ocs-code | http-code |
      |/ocs/v1.php/cloud/apps                                      | 100      | 200       |
      |/ocs/v2.php/cloud/apps                                      | 200      | 200       |
      |/ocs/v1.php/cloud/groups                                    | 100      | 200       |
      |/ocs/v2.php/cloud/groups                                    | 200      | 200       |
      |/ocs/v1.php/cloud/users                                     | 100      | 200       |
      |/ocs/v2.php/cloud/users                                     | 200      | 200       |

  Scenario: using OCS as admin user with wrong password
    When the administrator requests these endpoints with "GET" using password "invalid" then the status codes should be as listed
      | endpoint                                                    | ocs-code | http-code |
      | /ocs/v1.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v2.php/apps/files_external/api/v1/mounts               | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares         | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/remote_shares/pending | 997      | 401       |
      | /ocs/v1.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v2.php/apps/files_sharing/api/v1/shares                | 997      | 401       |
      | /ocs/v1.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v2.php/cloud/apps                                      | 997      | 401       |
      | /ocs/v1.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v2.php/cloud/groups                                    | 997      | 401       |
      | /ocs/v1.php/cloud/users                                     | 997      | 401       |
      | /ocs/v2.php/cloud/users                                     | 997      | 401       |
      | /ocs/v1.php/config                                          | 100      | 200       |
      | /ocs/v2.php/config                                          | 200      | 200       |
      | /ocs/v1.php/privatedata/getattribute                        | 997      | 401       |
      | /ocs/v2.php/privatedata/getattribute                        | 997      | 401       |

  Scenario: using OCS with token auth of a normal user
    Given a new client token for "user0" has been generated
    When user "user0" requests these endpoints with "GET" using basic token auth then the status codes should be as listed
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

    Scenario: using OCS with browser session of normal user
      Given a new browser session for "user0" has been started
      When the user requests these endpoints with "GET" using a new browser session then the status codes should be as listed
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

  Scenario: using OCS with an app password of a normal user
    Given a new browser session for "user0" has been started
    And the user has generated a new app password named "my-client"
    When the user requests these endpoints with "GET" using the generated app password then the status codes should be as listed
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
