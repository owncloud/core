<?php
/**
 * ownCloud
 *
 * @author Phillip Davis <phil@jankaritech.com>
 * @copyright Copyright (c) 2026, ownCloud GmbH
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Config\Config;
use Behat\Config\Extension;
use Behat\Config\Profile;
use Behat\Config\Suite;
use Cjm\Behat\StepThroughExtension\ServiceContainer\StepThroughExtension;
use rdx\behatvars\BehatVariablesExtension;

return (new Config())
	->withProfile(
		(new Profile(
			'default',
			[
			'autoload' => [
			'' => '%paths.base%/../features/bootstrap',
			],
			]
		))
			->withExtension(new Extension(BehatVariablesExtension::class))
			->withExtension(new Extension(StepThroughExtension::class))
			->withSuite(
				(new Suite(
					'apiMain',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppManagementContext')
					->addContext('AppConfigurationContext')
					->addContext('CalDavContext')
					->addContext('CardDavContext')
					->addContext('ChecksumContext')
					->addContext('FilesVersionsContext')
					->addContext('OccContext')
					->addContext('TransferOwnershipContext')
					->addContext('TrashbinContext')
					->withPaths('%paths.base%/../features/apiMain')
			)
			->withSuite(
				(new Suite(
					'apiAuth',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('CorsContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/apiAuth')
			)
			->withSuite(
				(new Suite(
					'apiAuthOcs',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/apiAuthOcs')
			)
			->withSuite(
				(new Suite(
					'apiAuthWebDav',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('SearchContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/apiAuthWebDav')
			)
			->withSuite(
				(new Suite(
					'apiCapabilities',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('CapabilitiesContext')
					->addContext('OccContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiCapabilities')
			)
			->withSuite(
				(new Suite(
					'apiComments',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('CommentsContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiComments')
			)
			->withSuite(
				(new Suite(
					'apiFavorites',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FavoritesContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/apiFavorites')
			)
			->withSuite(
				(new Suite(
					'apiFederationToRoot1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FederationContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiFederationToRoot1')
			)
			->withSuite(
				(new Suite(
					'apiFederationToRoot2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FederationContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiFederationToRoot2')
			)
			->withSuite(
				(new Suite(
					'apiFederationToShares1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FederationContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/apiFederationToShares1')
			)
			->withSuite(
				(new Suite(
					'apiFederationToShares2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FederationContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/apiFederationToShares2')
			)
			->withSuite(
				(new Suite(
					'apiProvisioning-v1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->addContext('AuthContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/apiProvisioning-v1')
			)
			->withSuite(
				(new Suite(
					'apiProvisioning-v2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->addContext('AuthContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/apiProvisioning-v2')
			)
			->withSuite(
				(new Suite(
					'apiProvisioningGroups-v1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->withPaths('%paths.base%/../features/apiProvisioningGroups-v1')
			)
			->withSuite(
				(new Suite(
					'apiProvisioningGroups-v2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->withPaths('%paths.base%/../features/apiProvisioningGroups-v2')
			)
			->withSuite(
				(new Suite(
					'apiShareCreateSpecialToRoot1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareCreateSpecialToRoot1')
			)
			->withSuite(
				(new Suite(
					'apiShareCreateSpecialToShares1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareCreateSpecialToShares1')
			)
			->withSuite(
				(new Suite(
					'apiShareCreateSpecialToRoot2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareCreateSpecialToRoot2')
			)
			->withSuite(
				(new Suite(
					'apiShareCreateSpecialToShares2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareCreateSpecialToShares2')
			)
			->withSuite(
				(new Suite(
					'apiSharees',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('ShareesContext')
					->addContext('OccContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiSharees')
			)
			->withSuite(
				(new Suite(
					'apiShareManagementToRoot',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->addContext('FilesVersionsContext')
					->withPaths('%paths.base%/../features/apiShareManagementToRoot')
			)
			->withSuite(
				(new Suite(
					'apiShareManagementToShares',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->addContext('FilesVersionsContext')
					->withPaths('%paths.base%/../features/apiShareManagementToShares')
			)
			->withSuite(
				(new Suite(
					'apiShareManagementBasicToRoot',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/apiShareManagementBasicToRoot')
			)
			->withSuite(
				(new Suite(
					'apiShareManagementBasicToShares',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/apiShareManagementBasicToShares')
			)
			->withSuite(
				(new Suite(
					'apiShareOperationsToRoot1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareOperationsToRoot1')
			)
			->withSuite(
				(new Suite(
					'apiShareOperationsToRoot2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareOperationsToRoot2')
			)
			->withSuite(
				(new Suite(
					'apiShareOperationsToShares1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareOperationsToShares1')
			)
			->withSuite(
				(new Suite(
					'apiShareOperationsToShares2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareOperationsToShares2')
			)
			->withSuite(
				(new Suite(
					'apiSharePublicLink1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiSharePublicLink1')
			)
			->withSuite(
				(new Suite(
					'apiSharePublicLink2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiSharePublicLink2')
			)
			->withSuite(
				(new Suite(
					'apiSharePublicLink3',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiSharePublicLink3')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToRoot1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareReshareToRoot1')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToShares1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiShareReshareToShares1')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToRoot2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareReshareToRoot2')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToShares2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareReshareToShares2')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToRoot3',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareReshareToRoot3')
			)
			->withSuite(
				(new Suite(
					'apiShareReshareToShares3',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareReshareToShares3')
			)
			->withSuite(
				(new Suite(
					'apiShareUpdateToRoot',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareUpdateToRoot')
			)
			->withSuite(
				(new Suite(
					'apiShareUpdateToShares',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TrashbinContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiShareUpdateToShares')
			)
			->withSuite(
				(new Suite(
					'apiSharingNotificationsToRoot',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('NotificationsCoreContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiSharingNotificationsToRoot')
			)
			->withSuite(
				(new Suite(
					'apiSharingNotificationsToShares',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('NotificationsCoreContext')
					->addContext('AppConfigurationContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/apiSharingNotificationsToShares')
			)
			->withSuite(
				(new Suite(
					'apiTags',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('TagsContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiTags')
			)
			->withSuite(
				(new Suite(
					'apiTrashbin',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('AppConfigurationContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiTrashbin')
			)
			->withSuite(
				(new Suite(
					'apiTrashbinRestore',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('AppConfigurationContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiTrashbinRestore')
			)
			->withSuite(
				(new Suite(
					'apiVersions',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('ChecksumContext')
					->addContext('FilesVersionsContext')
					->addContext('WebDavPropertiesContext')
					->addContext('OccContext')
					->addContext('AppConfigurationContext')
					->addContext('TrashbinContext')
					->withPaths('%paths.base%/../features/apiVersions')
			)
			->withSuite(
				(new Suite(
					'apiWebdavDelete',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('SearchContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavPropertiesContext')
					->addContext('TagsContext')
					->addContext('TrashbinContext')
					->withPaths('%paths.base%/../features/apiWebdavDelete')
			)
			->withSuite(
				(new Suite(
					'apiWebdavLocks',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavLockingContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavLocks')
			)
			->withSuite(
				(new Suite(
					'apiWebdavLocks2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavLockingContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavLocks2')
			)
			->withSuite(
				(new Suite(
					'apiWebdavLocks3',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavLockingContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavLocks3')
			)
			->withSuite(
				(new Suite(
					'apiWebdavLocksUnlock',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavLockingContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavLocksUnlock')
			)
			->withSuite(
				(new Suite(
					'apiWebdavMove1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavMove1')
			)
			->withSuite(
				(new Suite(
					'apiWebdavMove2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavMove2')
			)
			->withSuite(
				(new Suite(
					'apiWebdavOperations',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('SearchContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavPropertiesContext')
					->addContext('TagsContext')
					->addContext('TrashbinContext')
					->withPaths('%paths.base%/../features/apiWebdavOperations')
			)
			->withSuite(
				(new Suite(
					'apiWebdavPreviews',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebDavPropertiesContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/apiWebdavPreviews')
			)
			->withSuite(
				(new Suite(
					'apiWebdavProperties1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiWebdavProperties1')
			)
			->withSuite(
				(new Suite(
					'apiWebdavProperties2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiWebdavProperties2')
			)
			->withSuite(
				(new Suite(
					'apiWebdavUpload1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebDavPropertiesContext')
					->withPaths('%paths.base%/../features/apiWebdavUpload1')
			)
			->withSuite(
				(new Suite(
					'apiWebdavUpload2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/apiWebdavUpload2')
			)
			->withSuite(
				(new Suite(
					'apiWebdavUploadTUS',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('TUSContext')
					->addContext('FilesVersionsContext')
					->addContext('ChecksumContext')
					->withPaths('%paths.base%/../features/apiWebdavUploadTUS')
			)
			->withSuite(
				(new Suite(
					'apiWebdavEtagPropagation1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('PublicWebDavContext')
					->addContext('FilesVersionsContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiWebdavEtagPropagation1')
			)
			->withSuite(
				(new Suite(
					'apiWebdavEtagPropagation2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('LoggingContext')
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('PublicWebDavContext')
					->addContext('FilesVersionsContext')
					->addContext('WebDavPropertiesContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/apiWebdavEtagPropagation2')
			)
			->withSuite(
				(new Suite(
					'apiTranslation',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->withPaths('%paths.base%/../features/apiTranslation')
			)
			->withSuite(
				(new Suite(
					'cliBackground',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('LoggingContext')
					->withPaths('%paths.base%/../features/cliBackground')
			)
			->withSuite(
				(new Suite(
					'cliCreateLocalStorage',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/cliCreateLocalStorage')
			)
			->withSuite(
				(new Suite(
					'cliDbConversion',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/cliDbConversion')
			)
			->withSuite(
				(new Suite(
					'cliEncryption',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('WebDavPropertiesContext')
					->addContext('EncryptionContext')
					->withPaths('%paths.base%/../features/cliEncryption')
			)
			->withSuite(
				(new Suite(
					'cliExternalStorage',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('FederationContext')
					->addContext('OccContext')
					->addContext('WebDavPropertiesContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/cliExternalStorage')
			)
			->withSuite(
				(new Suite(
					'cliLocalStorage',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('AuthContext')
					->withPaths('%paths.base%/../features/cliLocalStorage')
			)
			->withSuite(
				(new Suite(
					'cliMain',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('CapabilitiesContext')
					->addContext('CalDavContext')
					->addContext('CardDavContext')
					->addContext('TransferOwnershipContext')
					->addContext('FederationContext')
					->addContext('WebDavPropertiesContext')
					->addContext('FilesVersionsContext')
					->addContext('PublicWebDavContext')
					->addContext('AppConfigurationContext')
					->withPaths('%paths.base%/../features/cliMain')
			)
			->withSuite(
				(new Suite(
					'cliManageApps',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('AppManagementContext')
					->withPaths('%paths.base%/../features/cliManageApps')
			)
			->withSuite(
				(new Suite(
					'cliProvisioning',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('OccContext')
					->addContext('OccAppManagementContext')
					->addContext('OccUsersGroupsContext')
					->withPaths('%paths.base%/../features/cliProvisioning')
			)
			->withSuite(
				(new Suite(
					'cliTrashbin',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->withPaths('%paths.base%/../features/cliTrashbin')
			)
			->withSuite(
				(new Suite(
					'webUIAdminSettings',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('CapabilitiesContext')
					->addContext('WebUIAdminAppsSettingsContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('WebUIAdminGeneralSettingsContext')
					->addContext('WebUIAdminStorageSettingsContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIHelpAndTipsContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUIAdminSettings')
			)
			->withSuite(
				(new Suite(
					'webUIComments',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUIComments')
			)
			->withSuite(
				(new Suite(
					'webUICreateDelete',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TagsContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('WebUINewFileMenuContext')
					->withPaths('%paths.base%/../features/webUICreateDelete')
			)
			->withSuite(
				(new Suite(
					'webUIFavorites',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->withPaths('%paths.base%/../features/webUIFavorites')
			)
			->withSuite(
				(new Suite(
					'webUIFiles',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('TagsContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISearchContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIFiles')
			)
			->withSuite(
				(new Suite(
					'webUILogin',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('OccContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIPersonalGeneralSettingsContext')
					->withPaths('%paths.base%/../features/webUILogin')
			)
			->withSuite(
				(new Suite(
					'webUIMoveFilesFolders',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIMoveFilesFolders')
			)
			->withSuite(
				(new Suite(
					'webUIPersonalSettings',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIPersonalGeneralSettingsContext')
					->addContext('WebUIPersonalSecuritySettingsContext')
					->addContext('WebUIUserContext')
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->withPaths('%paths.base%/../features/webUIPersonalSettings')
			)
			->withSuite(
				(new Suite(
					'webUIRenameFiles',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIRenameFiles')
			)
			->withSuite(
				(new Suite(
					'webUIRenameFolders',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUIRenameFolders')
			)
			->withSuite(
				(new Suite(
					'webUIRestrictSharing',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUIRestrictSharing')
			)
			->withSuite(
				(new Suite(
					'webUISharingAcceptShares',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->withPaths('%paths.base%/../features/webUISharingAcceptShares')
			)
			->withSuite(
				(new Suite(
					'webUISharingAutocompletion1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->withPaths('%paths.base%/../features/webUISharingAutocompletion1')
			)
			->withSuite(
				(new Suite(
					'webUISharingAutocompletion2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->withPaths('%paths.base%/../features/webUISharingAutocompletion2')
			)
			->withSuite(
				(new Suite(
					'webUISharingExternal1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('EmailContext')
					->addContext('FederationContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->withPaths('%paths.base%/../features/webUISharingExternal1')
			)
			->withSuite(
				(new Suite(
					'webUISharingExternal2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('EmailContext')
					->addContext('FederationContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->withPaths('%paths.base%/../features/webUISharingExternal2')
			)
			->withSuite(
				(new Suite(
					'webUISharingInternalGroups1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('EmailContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUISharingInternalGroups1')
			)
			->withSuite(
				(new Suite(
					'webUISharingInternalGroups2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('EmailContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUISharingInternalGroups2')
			)
			->withSuite(
				(new Suite(
					'webUISharingInternalUsers1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('EmailContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUISharingInternalUsers1')
			)
			->withSuite(
				(new Suite(
					'webUISharingInternalUsers2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('EmailContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('WebUIPersonalSharingSettingsContext')
					->addContext('OccContext')
					->withPaths('%paths.base%/../features/webUISharingInternalUsers2')
			)
			->withSuite(
				(new Suite(
					'webUISharingNotifications',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('NotificationsCoreContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUINotificationsContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUISharingNotifications')
			)
			->withSuite(
				(new Suite(
					'webUISharingPublic1',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('EmailContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUISharingPublic1')
			)
			->withSuite(
				(new Suite(
					'webUISharingPublic2',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('AppConfigurationContext')
					->addContext('EmailContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUISharingPublic2')
			)
			->withSuite(
				(new Suite(
					'webUITags',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('TagsContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUISharingContext')
					->addContext('WebUITagsContext')
					->withPaths('%paths.base%/../features/webUITags')
			)
			->withSuite(
				(new Suite(
					'webUITrashbin',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('OccContext')
					->addContext('TrashbinContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->withPaths('%paths.base%/../features/webUITrashbin')
			)
			->withSuite(
				(new Suite(
					'webUIUpload',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIUpload')
			)
			->withSuite(
				(new Suite(
					'webUIAddUsers',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('WebDavPropertiesContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIPersonalGeneralSettingsContext')
					->addContext('WebUIUsersContext')
					->addContext('WebUIUserContext')
					->withPaths('%paths.base%/../features/webUIAddUsers')
			)
			->withSuite(
				(new Suite(
					'webUIManageQuota',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebDavPropertiesContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIUsersContext')
					->withPaths('%paths.base%/../features/webUIManageQuota')
			)
			->withSuite(
				(new Suite(
					'webUIManageUsersGroups',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('WebDavPropertiesContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIPersonalGeneralSettingsContext')
					->addContext('WebUIUsersContext')
					->addContext('WebUIUserContext')
					->withPaths('%paths.base%/../features/webUIManageUsersGroups')
			)
			->withSuite(
				(new Suite(
					'webUISettingsMenu',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebDavPropertiesContext')
					->addContext('EmailContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUISharingContext')
					->addContext('WebUIUsersContext')
					->withPaths('%paths.base%/../features/webUISettingsMenu')
			)
			->withSuite(
				(new Suite(
					'webUIWebdavLocks',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebDavLockingContext')
					->addContext('WebUIAdminGeneralSettingsContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIWebDavLockingContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIWebdavLocks')
			)
			->withSuite(
				(new Suite(
					'webUIWebdavLockProtection',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebDavLockingContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIWebDavLockingContext')
					->addContext('WebUISharingContext')
					->addContext('OccContext')
					->addContext('PublicWebDavContext')
					->withPaths('%paths.base%/../features/webUIWebdavLockProtection')
			)
			->withSuite(
				(new Suite(
					'webUIFileActionsMenu',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIFileActionsMenuContext')
					->withPaths('%paths.base%/../features/webUIFileActionsMenu')
			)
			->withSuite(
				(new Suite(
					'webUIWithCLI',
					[
					'context' => [
					'parameters' => [
					'ldapAdminPassword' => 'admin',
					'ldapUsersOU' => 'TestUsers',
					'ldapGroupsOU' => 'TestGroups',
					'ldapInitialUserFilePath' => '/../../config/ldap-users.ldif',
					],
					],
					]
				))
					->addContext(
						'FeatureContext',
						[
						'baseUrl' => 'http://localhost:8080',
						'adminUsername' => 'admin',
						'adminPassword' => 'admin',
						'regularUserPassword' => 123456,
						'ocPath' => 'apps/testing/api/v1/occ',
						]
					)
					->addContext('EmailContext')
					->addContext('WebUIFilesContext')
					->addContext('WebUIGeneralContext')
					->addContext('WebUILoginContext')
					->addContext('WebUIPersonalGeneralSettingsContext')
					->addContext('WebUIPersonalSecuritySettingsContext')
					->addContext('WebUIUserContext')
					->addContext('OccContext')
					->addContext('OccUsersGroupsContext')
					->addContext('CapabilitiesContext')
					->addContext('WebUIAdminAppsSettingsContext')
					->addContext('WebUIAdminSharingSettingsContext')
					->addContext('WebUIAdminGeneralSettingsContext')
					->addContext('WebUIAdminStorageSettingsContext')
					->addContext('WebUIHelpAndTipsContext')
					->addContext('WebUISharingContext')
					->withPaths('%paths.base%/../features/webUIWithCLI')
			)
	);
