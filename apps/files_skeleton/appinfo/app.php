<?php
/**
 * @author Jörn Friedrich Dreyer
 * @copyright (c) 2014 Jörn Friedrich Dreyer <jfd@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/* FIXME copying the skeleton currently only works correctly because the
 * files_encryption post_login hook is executed before the files_skeleton
 * post_login hook, due to their names happening to be in this order
 */

if (\OCP\App::isEnabled('files_encryption')) {
	// Use two hooks to allow encryption to initialize correctly before copying
	// 1. when the files folder is created remember to copy the skeleton
	\OCP\Util::connectHook('OC_Filesystem', 'createUserFiles', '\OCA\Files_Skeleton\Skeleton', 'setCopySkeletonFlag');

	// 2. when setup is complete trigger the actual copying.
	\OCP\Util::connectHook('OC_User', 'post_login', '\OCA\Files_Skeleton\Skeleton', 'copySkeleton');
} else {
	\OCP\Util::connectHook('OC_Filesystem', 'createUserFiles', '\OCA\Files_Skeleton\Skeleton', 'copySkeleton');
}