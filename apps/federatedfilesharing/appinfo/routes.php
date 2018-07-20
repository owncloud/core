<?php

return [
	'ocs' => [
		['root' => '/cloud', 'name' => 'RequestHandler#createShare', 'url' => '/shares', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#reShare', 'url' => '/shares/{id}/reshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#updatePermissions', 'url' => '/shares/{id}/permissions', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#acceptShare', 'url' => '', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#acceptShare', 'url' => '/shares/{id}/accept', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#declineShare', 'url' => '/shares/{id}/decline', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#unshare', 'url' => '/shares/{id}/unshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#revoke', 'url' => '/shares/{id}/revoke', 'verb' => 'POST'],
	]
];
