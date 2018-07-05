@webUI
Feature: admin sharing settings
	As an admin
	I want to be able to manage sharing settings on the ownCloud server
	So that I can enable, disable, allow or restrict different sharing behaviour

	Background:
		Given the admin has browsed to the admin sharing settings page

	Scenario: disable sharing API
		When the admin disables the share API using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | api_enabled     | EMPTY |

	Scenario: disable public sharing
		When the admin disables share via link using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element  | value |
			| files_sharing | public@@@enabled | EMPTY |

	Scenario: disable public upload
		When the admin disables public uploads using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value |
			| files_sharing | public@@@upload | EMPTY |

	Scenario: enable mail notification on public share
		When the admin enables mail notification on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element    | value |
			| files_sharing | public@@@send_mail | 1     |

	Scenario: disable social media share on public share
		When the admin disables social media share on public share using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element       | value |
			| files_sharing | public@@@social_share | EMPTY |

	Scenario: enforce password protection for read-only links
		When the admin enforces password protection for read-only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                              | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_only | 1     |

	Scenario: enforce password protection for read and write links
		When the admin enforces password protection for read and write links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                               | value |
			| files_sharing | public@@@password@@@enforced_for@@@read_write | 1     |

	Scenario: enforce password protection for upload-only links
		When the admin enforces password protection for upload only links using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element                                | value |
			| files_sharing | public@@@password@@@enforced_for@@@upload_only | 1     |

	Scenario: disable resharing
		When the admin disables resharing using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value     |
			| files_sharing | resharing       | EMPTY     |

	Scenario: disable sharing with groups
		When the admin disables sharing with groups using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element | value     |
			| files_sharing | group_sharing   | EMPTY     |

	Scenario: restrict users to only share with users in their groups
		When the admin restricts users to only share with their group members using the webUI
		And the user retrieves the capabilities using the API
		Then the capabilities should contain
			| capability    | path_to_element               | value |
			| files_sharing | share_with_group_members_only | 1     |