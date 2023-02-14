@api @files_sharing-app-required
Feature: capabilities

  Background:
    Given using OCS API version "1"

  @smokeTest
  Scenario: Check that the sharing API can be enabled
    Given parameter "shareapi_enabled" of app "core" has been set to "no"
    And the capabilities setting of "files_sharing" path "api_enabled" has been confirmed to be ""
    When the administrator sets parameter "shareapi_enabled" of app "core" to "yes"
    Then the capabilities setting of "files_sharing" path "api_enabled" should be "1"

  @smokeTest
  Scenario: Check that the sharing API can be disabled
    Given parameter "shareapi_enabled" of app "core" has been set to "yes"
    And the capabilities setting of "files_sharing" path "api_enabled" has been confirmed to be "1"
    When the administrator sets parameter "shareapi_enabled" of app "core" to "no"
    Then the capabilities setting of "files_sharing" path "api_enabled" should be ""


  Scenario: Check that group sharing can be enabled
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    And the capabilities setting of "files_sharing" path "group_sharing" has been confirmed to be ""
    When the administrator sets parameter "shareapi_allow_group_sharing" of app "core" to "yes"
    Then the capabilities setting of "files_sharing" path "group_sharing" should be "1"


  Scenario: Check that group sharing can be disabled
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "yes"
    And the capabilities setting of "files_sharing" path "group_sharing" has been confirmed to be "1"
    When the administrator sets parameter "shareapi_allow_group_sharing" of app "core" to "no"
    Then the capabilities setting of "files_sharing" path "group_sharing" should be ""

  @smokeTest
  Scenario: getting default capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
      """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root",
                  "status"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  },
                  "status": {
                    "type": "object",
                    "required": [
                      "version",
                      "versionstring",
                      "edition",
                      "productname"
                    ],
                    "properties": {
                      "version": {
                        "type": "string",
                        "enum": [
                          "%version%"
                        ]
                      },
                      "versionstring": {
                        "type": "string",
                        "enum": [
                          "%versionstring%"
                        ]
                      },
                      "edition": {
                        "type": "string",
                        "enum": [
                          "%edition%"
                        ]
                      },
                      "productname": {
                        "type": "string",
                        "enum": [
                          "%productname%"
                        ]
                      }
                    }
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking",
                  "privateLinks",
                  "privateLinksDetailsParam"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "privateLinks": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "privateLinksDetailsParam": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "default_permissions",
                  "search_min_length",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "share_with_membership_groups_only",
                  "auto_accept_share",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "default_permissions": {
                    "type": "integer",
                    "enum": [
                      31
                    ]
                  },
                  "search_min_length": {
                    "type": "integer",
                    "enum": [
                      2
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "supports_upload_only",
                      "send_mail",
                      "social_share",
                      "defaultPublicLinkShareName"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "supports_upload_only": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "defaultPublicLinkShareName": {
                        "type": "string",
                        "enum": [
                          "Public link"
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "share_with_membership_groups_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "auto_accept_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
      """

  @smokeTest
  Scenario: getting default capabilities with admin user with new values
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user",
                  "group",
                  "providers_capabilities"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  },
                  "group": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  },
                  "providers_capabilities": {
                    "type": "object",
                    "required": [
                      "ocinternal"
                    ],
                    "properties": {
                      "ocinternal": {
                        "type": "object",
                        "required": [
                          "user",
                          "group",
                          "link"
                        ],
                        "properties": {
                          "user": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          },
                          "group": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          },
                          "link": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration", "passwordProtected"]
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  @smokeTest
  Scenario: the default capabilities should include share expiration for all of user, group, link and remote (federated)
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user",
                  "group",
                  "providers_capabilities"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  },
                  "group": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  },
                  "providers_capabilities": {
                    "type": "object",
                    "required": [
                      "ocinternal",
                      "ocFederatedSharing"
                    ],
                    "properties": {
                      "ocinternal": {
                        "type": "object",
                        "required": [
                          "user",
                          "group",
                          "link"
                        ],
                        "properties": {
                          "user": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          },
                          "group": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          },
                          "link": {
                            "type": "array",
                            "contains": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          }
                        }
                      },
                      "ocFederatedSharing": {
                        "type": "object",
                        "required": [
                          "remote"
                        ],
                        "properties": {
                          "remote": {
                            "type": "array",
                            "items": {
                              "type": "string",
                              "enum": ["shareExpiration"]
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  @smokeTest
  Scenario: getting new default capabilities in versions after 10.5.0 with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
      """
        {
          "type": "object",
          "required": [
            "capabilities"
          ],
          "properties": {
            "capabilities": {
              "type": "object",
              "required": [
                "files"
              ],
              "properties": {
                "files": {
                  "type": "object",
                  "required": [
                    "favorites",
                    "file_locking_support",
                    "file_locking_enable_file_action"
                  ],
                  "properties": {
                    "favorites": {
                      "type": "boolean",
                      "enum": [
                        true
                      ]
                    },
                    "file_locking_support": {
                      "type": "boolean",
                      "enum": [
                        true
                      ]
                    },
                    "file_locking_enable_file_action": {
                      "type": "boolean",
                      "enum": [
                        false
                      ]
                    }
                  }
                }
              }
            }
          }
        }
      """

  @smokeTest
  Scenario: lock file action can be enabled
    Given parameter "enable_lock_file_action" of app "files" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
      """
        {
          "type": "object",
          "required": [
            "capabilities"
          ],
          "properties": {
            "capabilities": {
              "type": "object",
              "required": [
                "files"
              ],
              "properties": {
                "files": {
                  "type": "object",
                  "required": [
                    "file_locking_support",
                    "file_locking_enable_file_action"
                  ],
                  "properties": {
                    "file_locking_support": {
                      "type": "boolean",
                      "enum": [
                        true
                      ]
                    },
                    "file_locking_enable_file_action": {
                      "type": "boolean",
                      "enum": [
                        true
                      ]
                    }
                  }
                }
              }
            }
          }
        }
      """

  @smokeTest
  Scenario: getting default capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "profile_picture"
                    ],
                    "properties": {
                      "profile_picture": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  @files_trashbin-app-required @skipOnReva
  Scenario: getting trashbin app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files"
            ],
            "properties": {
              "files": {
                "type": "object",
                "required": [
                  "undelete"
                ],
                "properties": {
                  "undelete": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              }
            }
          }
        }
      }
    """


  @files_versions-app-required @skipOnReva
  Scenario: getting versions app capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files"
            ],
            "properties": {
              "files": {
                "type": "object",
                "required": [
                  "versioning"
                ],
                "properties": {
                  "versioning": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              }
            }
          }
        }
      }
    """

#
  Scenario: getting default_permissions capability with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "default_permissions"
                ],
                "properties": {
                  "default_permissions": {
                    "type": "number",
                    "enum": [
                      31
                    ]
                  }
                }
              }
            }
          }
        }
      }
    """



  Scenario: default_permissions capability can be changed
    Given parameter "shareapi_default_permissions" of app "core" has been set to "7"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element     | value |
#      | files_sharing | default_permissions | 7     |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "default_permissions"
                ],
                "properties": {
                  "default_permissions": {
                    "type": "number",
                    "enum": [
                      7
                    ]
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: .htaccess is reported as a blacklisted file by default
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files"
            ],
            "properties": {
              "files": {
                "type": "object",
                "required": [
                  "blacklisted_files"
                ],
                "properties": {
                  "blacklisted_files": {
                    "type": "array",
                    "items": {
                      "type": "string",
                      "enum": [".htaccess"]
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  Scenario: multiple files can be reported as blacklisted
    Given the administrator has updated system config key "blacklisted_files" with value '["test.txt",".htaccess"]' and type "json"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files"
            ],
            "properties": {
              "files": {
                "type": "object",
                "required": [
                  "blacklisted_files"
                ],
                "properties": {
                  "blacklisted_files": {
                    "type": "array",
                    "items": {
                      "type": "string",
                      "enum": ["test.txt", ".htaccess"]
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: user expire date can be enabled
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "7"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: user expire date can be enforced
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_user_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "7"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  Scenario: user expire date days can be set
    Given parameter "shareapi_default_expire_date_user_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_user_share" of app "core" has been set to "14"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "user"
                ],
                "properties": {
                  "user": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "14"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  Scenario: group expire date can be enabled
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "group"
                ],
                "properties": {
                  "group": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "7"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  Scenario: group expire date can be enforced
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date_group_share" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "group"
                ],
                "properties": {
                  "group": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "7"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  Scenario: group expire date days can be set
    Given parameter "shareapi_default_expire_date_group_share" of app "core" has been set to "yes"
    And parameter "shareapi_expire_after_n_days_group_share" of app "core" has been set to "14"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "files_sharing"
            ],
            "properties": {
              "files_sharing": {
                "type": "object",
                "required": [
                  "group"
                ],
                "properties": {
                  "group": {
                    "type": "object",
                    "required": [
                      "expire_date"
                    ],
                    "properties": {
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "days",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "days": {
                            "type": "string",
                            "enum": [
                              "14"
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              false
                            ]
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

  #feature added in #31824 released in 10.0.10
  @smokeTest
  Scenario: getting capabilities with admin user
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
      """
        {
          "type": "object",
          "required": [
            "capabilities"
          ],
          "properties": {
            "capabilities": {
              "type": "object",
              "required": [
                "files_sharing"
              ],
              "properties": {
                "files_sharing": {
                  "type": "object",
                  "required": [
                    "can_share"
                  ],
                  "properties": {
                    "can_share": {
                      "type": "boolean",
                      "enum": [
                        true
                      ]
                    }
                  }
                }
              }
            }
          }
        }
      """


  #feature added in #32414 released in 10.0.10
  Scenario: getting async capabilities when async operations are enabled
    Given the administrator has enabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
      """
        {
          "type": "object",
          "required": [
            "capabilities"
          ],
          "properties": {
            "capabilities": {
              "type": "object",
              "required": [
                "async"
              ],
              "properties": {
                "async": {
                  "type": "string",
                  "enum": ["1.0"]
                }
              }
            }
          }
        }
      """


  Scenario: getting async capabilities when async operations are disabled
    Given the administrator has disabled async operations
    When the administrator retrieves the capabilities using the capabilities API
    And the JSON data of the response should match
      """
        {
          "type": "object",
          "required": [
            "capabilities"
          ],
          "properties": {
            "capabilities": {
              "type": "object",
              "not required": [
                "async"
              ]
            }
          }
        }
      """

  Scenario: Changing public upload
    Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Disabling share api
    Given parameter "shareapi_enabled" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "resharing",
                  "federation"
                ],
                "not required": [
                  "public"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Disabling public links
    Given parameter "shareapi_allow_links" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "not required": [
                  "public"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing resharing
    Given parameter "shareapi_allow_resharing" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """



  Scenario: Changing federation outgoing
    Given parameter "outgoing_server2server_share_enabled" of app "files_sharing" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing federation incoming
    Given parameter "incoming_server2server_share_enabled" of app "files_sharing" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing "password enforced for read-only public link shares"
    Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share",
                      "password"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "password": {
                        "type": "object",
                        "required": [
                          "enforced_for"
                        ],
                        "properties": {
                          "enforced_for": {
                            "type": "object",
                            "required": [
                              "read_only",
                              "read_write",
                              "upload_only"
                            ],
                            "properties": {
                              "read_only": {
                                "type": "boolean",
                                "enum": [
                                  true
                                ]
                              },
                              "read_write": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              },
                              "upload_only": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              }
                            }
                          }
                        }
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing "password enforced for read-write public link shares"
    Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share",
                      "password"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "password": {
                        "type": "object",
                        "required": [
                          "enforced_for"
                        ],
                        "properties": {
                          "enforced_for": {
                            "type": "object",
                            "required": [
                              "read_only",
                              "read_write",
                              "upload_only"
                            ],
                            "properties": {
                              "read_only": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              },
                              "read_write": {
                                "type": "boolean",
                                "enum": [
                                  true
                                ]
                              },
                              "upload_only": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              }
                            }
                          }
                        }
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing "password enforced for write-only public link shares"
    Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                                | value             |
#      | core          | pollinterval                                   | 30000             |
#      | core          | webdav-root                                    | remote.php/webdav |
#      | files_sharing | api_enabled                                    | 1                 |
#      | files_sharing | can_share                                      | 1                 |
#      | files_sharing | public@@@enabled                               | 1                 |
#      | files_sharing | public@@@upload                                | 1                 |
#      | files_sharing | public@@@send_mail                             | EMPTY             |
#      | files_sharing | public@@@social_share                          | 1                 |
#      | files_sharing | public@@@password@@@enforced_for@@@read_only   | EMPTY             |
#      | files_sharing | public@@@password@@@enforced_for@@@read_write  | EMPTY             |
#      | files_sharing | public@@@password@@@enforced_for@@@upload_only | 1                 |
#      | files_sharing | resharing                                      | 1                 |
#      | files_sharing | federation@@@outgoing                          | 1                 |
#      | files_sharing | federation@@@incoming                          | 1                 |
#      | files_sharing | group_sharing                                  | 1                 |
#      | files_sharing | share_with_group_members_only                  | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled                     | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only          | EMPTY             |
#      | files         | bigfilechunking                                | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share",
                      "password"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "password": {
                        "type": "object",
                        "required": [
                          "enforced_for"
                        ],
                        "properties": {
                          "enforced_for": {
                            "type": "object",
                            "required": [
                              "read_only",
                              "read_write",
                              "upload_only"
                            ],
                            "properties": {
                              "read_only": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              },
                              "read_write": {
                                "type": "boolean",
                                "enum": [
                                  false
                                ]
                              },
                              "upload_only": {
                                "type": "boolean",
                                "enum": [
                                  true
                                ]
                              }
                            }
                          }
                        }
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing public notifications
    Given parameter "shareapi_allow_public_notification" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | 1                 |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing public social share
    Given parameter "shareapi_allow_social_share" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | EMPTY             |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing expire date
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | public@@@expire_date@@@enabled        | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share",
                      "expire_date"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          }
                        }
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing expire date enforcing
    Given parameter "shareapi_default_expire_date" of app "core" has been set to "yes"
    And parameter "shareapi_enforce_expire_date" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | public@@@expire_date@@@enabled        | 1                 |
#      | files_sharing | public@@@expire_date@@@enforced       | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "multiple",
                      "upload",
                      "send_mail",
                      "social_share",
                      "expire_date"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "multiple": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "expire_date": {
                        "type": "object",
                        "required": [
                          "enabled",
                          "enforced"
                        ],
                        "properties": {
                          "enabled": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          },
                          "enforced": {
                            "type": "boolean",
                            "enum": [
                              true
                            ]
                          }
                        }
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing group sharing allowed
    Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | EMPTY             |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      false
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """


  Scenario: Changing only share with group member
    Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
    When the administrator retrieves the capabilities using the capabilities API
    Then the OCS status code should be "100"
    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | 1                 |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
    And the JSON data of the response should match
    """
      {
        "type": "object",
        "required": [
          "capabilities"
        ],
        "properties": {
          "capabilities": {
            "type": "object",
            "required": [
              "core",
              "files",
              "files_sharing"
            ],
            "properties": {
              "core": {
                "type": "object",
                "required": [
                  "pollinterval",
                  "webdav-root"
                ],
                "properties": {
                  "pollinterval": {
                    "type": "integer",
                    "enum": [
                      30000
                    ]
                  },
                  "webdav-root": {
                    "type": "string",
                    "enum": [
                      "remote.php/webdav"
                    ]
                  }
                }
              },
              "files": {
                "type": "object",
                "required": [
                  "bigfilechunking"
                ],
                "properties": {
                  "bigfilechunking": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  }
                }
              },
              "files_sharing": {
                "type": "object",
                "required": [
                  "api_enabled",
                  "can_share",
                  "public",
                  "resharing",
                  "federation",
                  "group_sharing",
                  "share_with_group_members_only",
                  "user_enumeration"
                ],
                "properties": {
                  "api_enabled": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "can_share": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "public": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "upload",
                      "send_mail",
                      "social_share"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "upload": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "send_mail": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      },
                      "social_share": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "resharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "federation": {
                    "type": "object",
                    "required": [
                      "outgoing",
                      "incoming"
                    ],
                    "properties": {
                      "outgoing": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "incoming": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      }
                    }
                  },
                  "group_sharing": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "share_with_group_members_only": {
                    "type": "boolean",
                    "enum": [
                      true
                    ]
                  },
                  "user_enumeration": {
                    "type": "object",
                    "required": [
                      "enabled",
                      "group_members_only"
                    ],
                    "properties": {
                      "enabled": {
                        "type": "boolean",
                        "enum": [
                          true
                        ]
                      },
                      "group_members_only": {
                        "type": "boolean",
                        "enum": [
                          false
                        ]
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    """

#
#  Scenario: Changing only share with membership groups
#    Given parameter "shareapi_only_share_with_membership_groups" of app "core" has been set to "yes"
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | share_with_membership_groups_only     | 1                 |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: Changing auto accept share
#    Given parameter "shareapi_auto_accept_share" of app "core" has been set to "no"
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | share_with_membership_groups_only     | EMPTY             |
#      | files_sharing | auto_accept_share                     | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: Changing allow share dialog user enumeration
#    Given parameter "shareapi_allow_share_dialog_user_enumeration" of app "core" has been set to "no"
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element               | value             |
#      | core          | pollinterval                  | 30000             |
#      | core          | webdav-root                   | remote.php/webdav |
#      | files_sharing | api_enabled                   | 1                 |
#      | files_sharing | can_share                     | 1                 |
#      | files_sharing | public@@@enabled              | 1                 |
#      | files_sharing | public@@@upload               | 1                 |
#      | files_sharing | public@@@send_mail            | EMPTY             |
#      | files_sharing | public@@@social_share         | 1                 |
#      | files_sharing | resharing                     | 1                 |
#      | files_sharing | federation@@@outgoing         | 1                 |
#      | files_sharing | federation@@@incoming         | 1                 |
#      | files_sharing | group_sharing                 | 1                 |
#      | files_sharing | share_with_group_members_only | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled    | EMPTY             |
#      | files         | bigfilechunking               | 1                 |
#
#
#  Scenario: Changing allow share dialog user enumeration for group members only
#    Given parameter "shareapi_share_dialog_user_enumeration_group_members" of app "core" has been set to "yes"
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | 1                 |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: Changing allow mail notification
#    Given parameter "shareapi_allow_mail_notification" of app "core" has been set to "yes"
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files_sharing | user@@@send_mail                      | 1                 |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: Changing exclude groups from sharing
#    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
#    And group "group1" has been created
#    And group "hash#group" has been created
#    And group "group-3" has been created
#    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: When in a group that is excluded from sharing, can_share is off
#    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
#    And user "Alice" has been created with default attributes and without skeleton files
#    And group "group1" has been created
#    And group "hash#group" has been created
#    And group "group-3" has been created
#    And group "ordinary-group" has been created
#    And user "Alice" has been added to group "hash#group"
#    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
#    When user "Alice" retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | EMPTY             |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: When not in any group that is excluded from sharing, can_share is on
#    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
#    And user "Alice" has been created with default attributes and without skeleton files
#    And group "group1" has been created
#    And group "hash#group" has been created
#    And group "group-3" has been created
#    And group "ordinary-group" has been created
#    And user "Alice" has been added to group "ordinary-group"
#    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
#    When user "Alice" retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | 1                 |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: When in a group that is excluded from sharing and in another group, can_share is off
#    Given parameter "shareapi_exclude_groups" of app "core" has been set to "yes"
#    And user "Alice" has been created with default attributes and without skeleton files
#    And group "group1" has been created
#    And group "hash#group" has been created
#    And group "group-3" has been created
#    And group "ordinary-group" has been created
#    And user "Alice" has been added to group "hash#group"
#    And user "Alice" has been added to group "ordinary-group"
#    And parameter "shareapi_exclude_groups_list" of app "core" has been set to '["group1","hash#group","group-3"]'
#    When user "Alice" retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability    | path_to_element                       | value             |
#      | core          | pollinterval                          | 30000             |
#      | core          | webdav-root                           | remote.php/webdav |
#      | files_sharing | api_enabled                           | 1                 |
#      | files_sharing | can_share                             | EMPTY             |
#      | files_sharing | public@@@enabled                      | 1                 |
#      | files_sharing | public@@@upload                       | 1                 |
#      | files_sharing | public@@@send_mail                    | EMPTY             |
#      | files_sharing | public@@@social_share                 | 1                 |
#      | files_sharing | resharing                             | 1                 |
#      | files_sharing | federation@@@outgoing                 | 1                 |
#      | files_sharing | federation@@@incoming                 | 1                 |
#      | files_sharing | group_sharing                         | 1                 |
#      | files_sharing | share_with_group_members_only         | EMPTY             |
#      | files_sharing | user_enumeration@@@enabled            | 1                 |
#      | files_sharing | user_enumeration@@@group_members_only | EMPTY             |
#      | files         | bigfilechunking                       | 1                 |
#
#
#  Scenario: blacklisted_files_regex is reported in capabilities
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the OCS status code should be "100"
#    And the HTTP status code should be "200"
#    And the capabilities should contain
#      | capability | path_to_element         | value    |
#      | files      | blacklisted_files_regex | \.(part\|filepart)$ |
#
#  @smokeTest
#  Scenario: getting default capabilities with admin user
#    When the administrator retrieves the capabilities using the capabilities API
#    Then the capabilities should contain
#      | capability    | path_to_element                           | value             |
#      | core          | status@@@edition                          | %edition%         |
#      | core          | status@@@product                          | %productname%     |
#      | core          | status@@@productname                      | %productname%     |
#      | core          | status@@@version                          | %version%         |
#      | core          | status@@@versionstring                    | %versionstring%   |
#    And the version data in the response should contain
#      | name    | value             |
#      | string  | %versionstring%   |
#      | edition | %edition%         |
#      | product | %productname%     |
#    And the major-minor-micro version data in the response should match the version string
