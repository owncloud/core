<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace SMB;

class NotFoundException extends \Exception {
}

class AlreadyExistsException extends \Exception {
}

class NotEmptyException extends \Exception {
}

class ConnectionError extends \Exception {
}

class AuthenticationException extends \Exception {
}

class InvalidHostException extends \Exception {
}

class AccessDeniedException extends \Exception {
}

class InvalidTypeException extends \Exception {
}

class ErrorCodes {
	/**
	 * connection errors
	 */
	const LogonFailure = 'NT_STATUS_LOGON_FAILURE';
	const BadHostName = 'NT_STATUS_BAD_NETWORK_NAME';
	const Unsuccessful = 'NT_STATUS_UNSUCCESSFUL';
	const ConnectionRefused = 'NT_STATUS_CONNECTION_REFUSED';

	const PathNotFound = 'NT_STATUS_OBJECT_PATH_NOT_FOUND';
	const NoSuchFile = 'NT_STATUS_NO_SUCH_FILE';
	const ObjectNotFound = 'NT_STATUS_OBJECT_NAME_NOT_FOUND';
	const NameCollision = 'NT_STATUS_OBJECT_NAME_COLLISION';
	const AccessDenied = 'NT_STATUS_ACCESS_DENIED';
	const DirectoryNotEmpty = 'NT_STATUS_DIRECTORY_NOT_EMPTY';
	const FileIsADirectory = 'NT_STATUS_FILE_IS_A_DIRECTORY';
	const NotADirectory = 'NT_STATUS_NOT_A_DIRECTORY';
}
