<?php

return [
	'ocs' => [
		['root' => '/cloud', 'name' => 'FederatedShareController#createShare', 'url' => '/shares', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#reShare', 'url' => '/shares/{id}/reshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#updatePermissions', 'url' => '/shares/{id}/permissions', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#acceptShare', 'url' => '', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#acceptShare', 'url' => '/shares/{id}/accept', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#declineShare', 'url' => '/shares/{id}/decline', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#unshare', 'url' => '/shares/{id}/unshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'FederatedShareController#revoke', 'url' => '/shares/{id}/revoke', 'verb' => 'POST'],
	]
];
