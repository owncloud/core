<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Tanghus <thomas@tanghus.net>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

/**
 * This file defines common constants used in ownCloud
 */

namespace OCP;

/**
 * Class Constants
 *
 * @package OCP
 * @since 8.0.0
 */
class Constants {
	/**
	 * CRUDS permissions.
	 * @since 8.0.0
	 */
	public const PERMISSION_CREATE = 4;
	public const PERMISSION_READ = 1;
	public const PERMISSION_UPDATE = 2;
	public const PERMISSION_DELETE = 8;
	public const PERMISSION_SHARE = 16;
	public const PERMISSION_ALL = 31;

	/**
	 * @since 8.0.0 - Updated in 9.0.0 to allow all POSIX chars since we no
	 * longer support windows as server platform.
	 */
	public const FILENAME_INVALID_CHARS = "\\/";

	/**
	 * Doc links.
	 * @since 10.9.0
	 */
	public const DOCS_ADMIN_EMAIL = 'admin-email';
	public const DOCS_ADMIN_BACKUP = 'admin-backup';
	public const DOCS_ADMIN_CONFIG = 'admin-config';
	public const DOCS_ADMIN_SHARING = 'admin-sharing';
	public const DOCS_ADMIN_PHP_FPM = 'admin-php-fpm';
	public const DOCS_ADMIN_INSTALL = 'admin-install';
	public const DOCS_ADMIN_SECURITY = 'admin-security';
	public const DOCS_ADMIN_LOG_FILES = 'admin-logfiles';
	public const DOCS_ADMIN_ENCRYPTION = 'admin-encryption';
	public const DOCS_ADMIN_PERFORMANCE = 'admin-performance';
	public const DOCS_ADMIN_CLI_UPGRADE = 'admin-cli-upgrade';
	public const DOCS_ADMIN_DB_CONVERSION = 'admin-db-conversion';
	public const DOCS_ADMIN_SOURCE_INSTALL = 'admin-source_install';
	public const DOCS_ADMIN_BACKGROUND_JOBS = 'admin-background-jobs';
	public const DOCS_ADMIN_UNTRUSTED_DOMAIN = 'admin-untrusted-domain';
	public const DOCS_ADMIN_SHARING_FEDERATED = 'admin-sharing-federated';
	public const DOCS_ADMIN_TRANSACTIONAL_LOCKING = 'admin-transactional-locking';

	public const DOCS_USER_WEB_DAV = 'user-webdav';

	public const DOCS_DEVELOPER_THEMING = 'developer-theming';
}
