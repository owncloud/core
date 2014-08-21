<?php
/**
 * Copyright (c) 2014 Arthur Schiwon <blizzz@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

OC::$CLASSPATH['OCA\user_ldap\lib\CleanUp'] = 'user_ldap/lib/jobs/cleanup.php';
OC::$CLASSPATH['OCA\UserLdap\GarbageCollector'] = 'user_ldap/lib/garbageCollector.php';
OC::$CLASSPATH['OCA\UserLdap\User\OfflineUser'] = 'user_ldap/lib/user/offlineUser.php';

