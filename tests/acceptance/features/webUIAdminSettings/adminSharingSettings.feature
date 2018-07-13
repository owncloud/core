@webUI
Feature: admin sharing settings
	As an admin
	I want to be able to manage sharing settings on the ownCloud server
	So that I can enable, disable, allow or restrict different sharing behaviour

	Scenario: disable share API
		Given the admin has browsed to the admin sharing settings page
		When the admin disables the share API using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | api_enabled     | EMPTY |

	Scenario: disable public sharing
		Given the admin has browsed to the admin sharing settings page
		When the admin disables share via link using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element  | value |
			| files_sharing | public@@@enabled | EMPTY |

	Scenario: disable public upload
		Given the admin has browsed to the admin sharing settings page
		When the admin disables public uploads using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | public@@@upload | EMPTY |

	Scenario: enable mail notification on public share
		Given the admin has browsed to the admin sharing settings page
		When the admin enables mail notification on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element    | value |
			| files_sharing | public@@@send_mail | 1     |

	Scenario: disable social media share on public share
		Given the admin has browsed to the admin sharing settings page
		When the admin disables social media share on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element       | value |
			| files_sharing | public@@@social_share | EMPTY |

	Scenario: enable enforce password protection for read-only links
		Given the admin has browsed to the admin sharing settings page
		When the admin enables enforce password protection for read-only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                              | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_only | 1     |

	Scenario: enable enforce password protection for read and write links
		Given the admin has browsed to the admin sharing settings page
		When the admin enables enforce password protection for read and write links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                               | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_write | 1     |

	Scenario: enable enforce password protection for upload-only links
		Given the admin has browsed to the admin sharing settings page
		When the admin enables enforce password protection for upload only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                                | value |
			| files_sharing | public@@@password@@@enforced_for@@@upload_only | 1     |

	Scenario: disable resharing
		Given the admin has browsed to the admin sharing settings page
		When the admin disables resharing using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value     |
			| files_sharing | resharing       | EMPTY     |

	Scenario: disable sharing with groups
		Given the admin has browsed to the admin sharing settings page
		When the admin disables sharing with groups using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value     |
			| files_sharing | group_sharing   | EMPTY     |

	Scenario: enable restrict users to only share with users in their groups
		Given the admin has browsed to the admin sharing settings page
		When the admin enables restrict users to only share with their group members using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element               | value |
			| files_sharing | share_with_group_members_only | 1     |

	Scenario: enable share API
		Given parameter "shareapi_enabled" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables the share API using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | api_enabled     | 1     |

	Scenario: enable public sharing
		Given parameter "shareapi_allow_links" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables share via link using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element  | value |
			| files_sharing | public@@@enabled | 1     |

	Scenario: enable public upload
		Given parameter "shareapi_allow_public_upload" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables public uploads using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | public@@@upload | 1     |

	Scenario: disable mail notification on public share
		Given parameter "shareapi_allow_public_send_mail" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin disables mail notification on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element    | value |
			| files_sharing | public@@@send_mail | EMPTY |

	Scenario: enable social media share on public share
		Given parameter "shareapi_allow_social_share" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables social media share on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element       | value |
			| files_sharing | public@@@social_share | 1     |

	Scenario: disable enforce password protection for read-only links
		Given parameter "shareapi_enforce_links_password_read_only" of app "core" has been set to "yes"
		And the admin has browsed to the admin sharing settings page
		When the admin disables enforce password protection for read-only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                              | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_only | EMPTY |

	Scenario: disable enforce password protection for read and write links
		Given parameter "shareapi_enforce_links_password_read_write" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin disables enforce password protection for read and write links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                               | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_write | EMPTY |

	Scenario: disable enforce password protection for upload-only links
		Given parameter "shareapi_enforce_links_password_write_only" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin disables enforce password protection for upload only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                                | value |
			| files_sharing | public@@@password@@@enforced_for@@@upload_only | EMPTY |

	Scenario: enable resharing
		Given parameter "shareapi_allow_resharing" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables resharing using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | resharing       | 1     |

	Scenario: enable sharing with groups
		Given parameter "shareapi_allow_group_sharing" of app "core" has been set to "no"
		And the admin has browsed to the admin sharing settings page
		When the admin enables sharing with groups using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | group_sharing   | 1     |

	Scenario: disable restrict users to only share with users in their groups
		Given parameter "shareapi_only_share_with_group_members" of app "core" has been set to "yes"
		And the admin has browsed to the admin sharing settings page
		When the admin disables restrict users to only share with their group members using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element               | value |
			| files_sharing | share_with_group_members_only | EMPTY |