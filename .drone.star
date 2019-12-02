config = {
	'rocketchat': {
		'channel': 'server',
		'from_secret': 'public_rocketchat'
	},

	'branches': [
		'master'
	],

	'dependencies': True,

	'codestyle': True,

	'phpstan': True,

	'phan': True,

	'javascript': True,

	'litmus': True,

	'dav': True,

	'phpunit': {
		'allDatabases' : {
			'phpVersions': [
				'7.1',
				'7.4',
			]
		},
		'reducedDatabases' : {
			'phpVersions': [
				'7.2',
				'7.3',
			],
			'databases': [
				'sqlite',
				'mariadb:10.2',
			],
			'coverage': False
		},
		'external-samba-windows' : {
			'phpVersions': [
				'7.4',
			],
			'databases': [
				'sqlite',
			],
			'externalTypes': [
				'samba',
				'windows',
			],
			'coverage': True,
			'extraCommandsBeforeTestRun': [
				'ls -l /var/cache',
				'mkdir /var/cache/samba',
				'ls -l /var/cache',
				'ls -l /var/cache/samba',
			]
		},
		'external-other' : {
			'phpVersions': [
				'7.4',
			],
			'databases': [
				'sqlite',
			],
			'externalTypes': [
				'webdav',
				'sftp',
				'scality'
			],
			'coverage': True
		},
	},

	'acceptance': {
		'api': {
			'suites': [
				'apiAuth',
				'apiAuthOcs',
				'apiAuthWebDav',
				'apiCapabilities',
				'apiComments',
				'apiFavorites',
				'apiMain',
				'apiProvisioning-v1',
				'apiProvisioning-v2',
				'apiProvisioningGroups-v1',
				'apiProvisioningGroups-v2',
				'apiShareCreateSpecial1',
				'apiShareCreateSpecial2',
				'apiSharees',
				'apiShareManagement',
				'apiShareManagementBasic',
				'apiShareOperations',
				'apiSharePublicLink1',
				'apiSharePublicLink2',
				'apiShareReshare1',
				'apiShareReshare2',
				'apiShareUpdate',
				'apiTags',
				'apiTrashbin',
				'apiVersions',
				'apiWebdavLocks',
				'apiWebdavLocks2',
				'apiWebdavMove1',
				'apiWebdavMove2',
				'apiWebdavOperations',
				'apiWebdavProperties',
				'apiWebdavUpload1',
				'apiWebdavUpload2',
			],
		},
		'apiNotifications': {
			'suites': [
				'apiSharingNotifications',
			],
			'extraApps': {
				'notifications': 'composer install'
			},
		},
		'apiFederation': {
			'suites': [
				'apiFederation',
			],
			'federatedServerNeeded': True,
			'federatedServerVersions': ['daily-master-qa', 'latest', '10.2.1']
		},
		'cli': {
			'suites': [
				'cliBackground',
				'cliLocalStorage',
				'cliMain',
				'cliProvisioning',
				'cliTrashbin',
			],
			'emailNeeded': True,
		},
		'cliAppManagement': {
			'suites': [
				'cliAppManagement',
			],
			'testingRemoteSystem': False
		},
		'cliExternalStorage': {
			'suites': [
				'cliExternalStorage',
			],
			'federatedServerNeeded': True,
			'federatedServerVersions': ['daily-master-qa', 'latest', '10.2.1']
		},
		'webUI': {
			'suites': {
				'webUIAddUsers': '',
				'webUIAdminSettings': '',
				'webUIComments': '',
				'webUICreateDelete': '',
				'webUIFavorites': '',
				'webUIFiles': '',
				'webUILogin': '',
				'webUIManageQuota': '',
				'webUIManageUsersGroups': 'webUIManageUsersGrps',
				'webUIMoveFilesFolders': 'webUIMoveFilesFolder',
				'webUIPersonalSettings': 'webUIPersonalSetting',
				'webUIRenameFiles': '',
				'webUIRenameFolders': '',
				'webUIRestrictSharing': '',
				'webUISettingsMenu': '',
				'webUISharingAcceptShares': 'webUISharingAcceptSh',
				'webUISharingAutocompletion1': 'webUISharingAutocomp1',
				'webUISharingAutocompletion2': 'webUISharingAutocomp2',
				'webUISharingInternalGroups1': 'webUISharingIntGroup1',
				'webUISharingInternalGroups2': 'webUISharingIntGroup2',
				'webUISharingInternalUsers1': 'webUISharingIntUsers1',
				'webUISharingInternalUsers2': 'webUISharingIntUsers2',
				'webUISharingPublic1': '',
				'webUISharingPublic2': '',
				'webUITags': '',
				'webUITrashbin': '',
				'webUIUpload': '',
				'webUIWebdavLockProtection': 'webUIWebdavLockProt',
				'webUIWebdavLocks': '',
			},
			'emailNeeded': True,
			'useHttps': False,
		},
		'webUINotifications': {
			'suites': {
				'webUISharingNotifications': 'webUISharingNotify',
			},
			'emailNeeded': True,
			'useHttps': False,
			'extraApps': {
				'notifications': 'composer install'
			},
		},
		'webUIFederation': {
			'suites': {
				'webUISharingExternal1': 'webUISharingExt1',
				'webUISharingExternal2': 'webUISharingExt2',
			},
			'federatedServerNeeded': True,
			'federatedServerVersions': ['daily-master-qa', 'latest', '10.2.1']
		},
		'webUIFirefox': {
			'suites': {
				'webUIFirefoxSmoketest': 'webUIFfSmoke',
			},
			'browsers': [
				'firefox'
			],
			'emailNeeded': True,
			'useHttps': False,
			'filterTags': '@smokeTest&&~@notifications-app-required',
			'runAllSuites': True,
			'numberOfParts': 3,
		},
		'webUIProxy': {
			'suites': {
				'webUIProxySmoketest': 'webUIProxySmoke',
			},
			'browsers': [
				'chrome'
			],
			'emailNeeded': True,
			'proxyNeeded': True,
			'useHttps': False,
			'filterTags': '@smokeTest&&~@notifications-app-required',
			'runAllSuites': True,
			'numberOfParts': 3,
		},
		'apiProxy': {
			'suites': {
				'apiProxySmoketest': 'apiProxySmoke',
			},
			'proxyNeeded': True,
			'useHttps': False,
			'filterTags': '@smokeTest&&~@notifications-app-required',
			'runAllSuites': True,
			'numberOfParts': 3,
		},
	}
}

def main(ctx):
	initial = initialPipelines()

	before = beforePipelines(ctx)
	dependsOn(initial, before)

	stages = stagePipelines()
	if (stages == False):
		print('Errors detected. Review messages above.')
		return []

	dependsOn(before, stages)

	after = afterPipelines()
	dependsOn(stages, after)

	return initial + before + stages + after

def initialPipelines():
	return dependencies()

def beforePipelines(ctx):
	return codestyle() + changelog(ctx) + phpstan() + phan()

def stagePipelines():
	jsPipelines = javascript()
	litmusPipelines = litmus()
	davPipelines = dav()
	phpunitPipelines = phptests('phpunit')
	phpintegrationPipelines = phptests('phpintegration')
	acceptancePipelines = acceptance()
	if (jsPipelines == False) or (litmusPipelines == False) or (davPipelines == False) or (phpunitPipelines == False) or (phpintegrationPipelines == False) or (acceptancePipelines == False):
		return False

	return jsPipelines + litmusPipelines + davPipelines + phpunitPipelines + phpintegrationPipelines + acceptancePipelines

def afterPipelines():
	return [
		notify()
	]

def dependencies():
	pipelines = []

	if 'dependencies' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.1'],
	}

	if 'defaults' in config:
		if 'dependencies' in config['defaults']:
			for item in config['defaults']['dependencies']:
				default[item] = config['defaults']['dependencies'][item]

	dependenciesConfig = config['dependencies']

	if type(dependenciesConfig) == "bool":
		if dependenciesConfig:
			# the config has 'dependencies' true, so specify an empty dict that will get the defaults
			dependenciesConfig = {}
		else:
			return pipelines

	if len(dependenciesConfig) == 0:
		# 'dependencies' is an empty dict, so specify a single section that will get the defaults
		dependenciesConfig = {'doDefault': {}}

	for category, matrix in dependenciesConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			name = 'install-dependencies-php%s' % phpVersion

			result = {
				'kind': 'pipeline',
				'type': 'docker',
				'name': name,
				'workspace' : {
					'base': '/drone',
					'path': 'src'
				},
				'steps':
					cacheRestore() +
					composerInstall(phpVersion) +
					vendorbinInstall(phpVersion) +
					yarnInstall(phpVersion) +
					[
						{
							'name': 'cache-rebuild',
							'image': 'plugins/s3-cache:1',
							'pull': 'always',
							'settings': {
								'access_key': {
									'from_secret': 'cache_s3_access_key'
								},
								'endpoint': {
									'from_secret': 'cache_s3_endpoint'
								},
								'mount': [
									'.cache'
								],
								'rebuild': True,
								'secret_key': {
									'from_secret': 'cache_s3_secret_key'
								}
							},
							'when': {
								'event': [
									'push',
								],
								'instance': [
									'drone.owncloud.services',
									'drone.owncloud.com'
								],
							}
						},
						{
							'name': 'cache-flush',
							'image': 'plugins/s3-cache:1',
							'pull': 'always',
							'settings': {
								'access_key': {
									'from_secret': 'cache_s3_access_key'
								},
								'endpoint': {
									'from_secret': 'cache_s3_endpoint'
								},
								'flush': True,
								'flush_age': '14',
								'secret_key': {
									'from_secret': 'cache_s3_secret_key'
								}
							},
							'when': {
								'event': [
									'push',
								],
								'instance': [
									'drone.owncloud.services',
									'drone.owncloud.com'
								],
							}
						}
					],
				'depends_on': [],
				'trigger': {
					'ref': [
						'refs/pull/**',
						'refs/tags/**'
					]
				}
			}

			for branch in config['branches']:
				result['trigger']['ref'].append('refs/heads/%s' % branch)

			pipelines.append(result)

	return pipelines

def codestyle():
	pipelines = []

	if 'codestyle' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.3'],
	}

	if 'defaults' in config:
		if 'codestyle' in config['defaults']:
			for item in config['defaults']['codestyle']:
				default[item] = config['defaults']['codestyle'][item]

	codestyleConfig = config['codestyle']

	if type(codestyleConfig) == "bool":
		if codestyleConfig:
			# the config has 'codestyle' true, so specify an empty dict that will get the defaults
			codestyleConfig = {}
		else:
			return pipelines

	if len(codestyleConfig) == 0:
		# 'codestyle' is an empty dict, so specify a single section that will get the defaults
		codestyleConfig = {'doDefault': {}}

	for category, matrix in codestyleConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			name = 'coding-standard-php%s' % phpVersion

			result = {
				'kind': 'pipeline',
				'type': 'docker',
				'name': name,
				'workspace' : {
					'base': '/drone',
					'path': 'src'
				},
				'steps':
					cacheRestore() +
					composerInstall(phpVersion) +
					vendorbinInstall(phpVersion) +
					yarnInstall(phpVersion) +
					[
						{
							'name': 'php-style',
							'image': 'owncloudci/php:%s' % phpVersion,
							'pull': 'always',
							'commands': [
								'make test-php-style'
							]
						}
					],
				'depends_on': [],
				'trigger': {
					'ref': [
						'refs/pull/**',
						'refs/tags/**'
					]
				}
			}

			for branch in config['branches']:
				result['trigger']['ref'].append('refs/heads/%s' % branch)

			pipelines.append(result)

	return pipelines

def changelog(ctx):
	repo_slug = ctx.build.source_repo if ctx.build.source_repo else ctx.repo.slug
	pipelines = []

	result = {
		'kind': 'pipeline',
		'type': 'docker',
		'name': 'changelog',
		'clone': {
			'disable': True,
		},
		'steps':
			[
				{
					'name': 'clone',
					'image': 'plugins/git-action:1',
					'pull': 'always',
					'settings': {
						'actions': [
							'clone',
						],
						'remote': 'https://github.com/%s' % (repo_slug),
						'branch': ctx.build.source if ctx.build.event == 'pull_request' else 'master',
						'path': '/drone/src',
						'netrc_machine': 'github.com',
						'netrc_username': {
							'from_secret': 'github_username',
						},
						'netrc_password': {
							'from_secret': 'github_token',
						},
					},
				},
				{
					'name': 'generate',
					'image': 'toolhippie/calens:latest',
					'pull': 'always',
					'commands': [
						'calens >| CHANGELOG.md',
					],
				},
				{
					'name': 'diff',
					'image': 'owncloud/alpine:latest',
					'pull': 'always',
					'commands': [
						'git diff',
					],
				},
				{
					'name': 'output',
					'image': 'toolhippie/calens:latest',
					'pull': 'always',
					'commands': [
						'cat CHANGELOG.md',
					],
				},
				{
					'name': 'publish',
					'image': 'plugins/git-action:1',
					'pull': 'always',
					'settings': {
						'actions': [
							'commit',
							'push',
						],
						'message': 'Automated changelog update [skip ci]',
						'branch': 'master',
						'author_email': 'devops@owncloud.com',
						'author_name': 'ownClouders',
						'netrc_machine': 'github.com',
						'netrc_username': {
							'from_secret': 'github_username',
						},
						'netrc_password': {
							'from_secret': 'github_token',
						},
					},
					'when': {
						'ref': {
							'exclude': [
								'refs/pull/**',
							],
						},
					},
				},
			],
		'depends_on': [],
		'trigger': {
			'ref': [
				'refs/heads/master',
				'refs/pull/**',
			],
		},
	}

	pipelines.append(result)

	return pipelines

def phpstan():
	pipelines = []

	if 'phpstan' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.4'],
		'logLevel': '2',
	}

	if 'defaults' in config:
		if 'phpstan' in config['defaults']:
			for item in config['defaults']['phpstan']:
				default[item] = config['defaults']['phpstan'][item]

	phpstanConfig = config['phpstan']

	if type(phpstanConfig) == "bool":
		if phpstanConfig:
			# the config has 'phpstan' true, so specify an empty dict that will get the defaults
			phpstanConfig = {}
		else:
			return pipelines

	if len(phpstanConfig) == 0:
		# 'phpstan' is an empty dict, so specify a single section that will get the defaults
		phpstanConfig = {'doDefault': {}}

	for category, matrix in phpstanConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			name = 'phpstan-php%s' % phpVersion

			result = {
				'kind': 'pipeline',
				'type': 'docker',
				'name': name,
				'workspace' : {
					'base': '/drone',
					'path': 'src'
				},
				'steps':
					cacheRestore() +
					composerInstall(phpVersion) +
					vendorbinInstall(phpVersion) +
					yarnInstall(phpVersion) +
					installServer(phpVersion, 'sqlite', params['logLevel']) +
				[
					{
						'name': 'php-phpstan',
						'image': 'owncloudci/php:%s' % phpVersion,
						'pull': 'always',
						'commands': [
							'make test-php-phpstan'
						]
					}
				],
				'depends_on': [],
				'trigger': {
					'ref': [
						'refs/pull/**',
						'refs/tags/**'
					]
				}
			}

			for branch in config['branches']:
				result['trigger']['ref'].append('refs/heads/%s' % branch)

			pipelines.append(result)

	return pipelines

def phan():
	pipelines = []

	if 'phan' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.1', '7.2', '7.3'],
		'logLevel': '2',
	}

	if 'defaults' in config:
		if 'phan' in config['defaults']:
			for item in config['defaults']['phan']:
				default[item] = config['defaults']['phan'][item]

	phanConfig = config['phan']

	if type(phanConfig) == "bool":
		if phanConfig:
			# the config has 'phan' true, so specify an empty dict that will get the defaults
			phanConfig = {}
		else:
			return pipelines

	if len(phanConfig) == 0:
		# 'phan' is an empty dict, so specify a single section that will get the defaults
		phanConfig = {'doDefault': {}}

	for category, matrix in phanConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			name = 'phan-php%s' % phpVersion

			result = {
				'kind': 'pipeline',
				'type': 'docker',
				'name': name,
				'workspace' : {
					'base': '/drone',
					'path': 'src'
				},
				'steps':
					cacheRestore() +
					composerInstall(phpVersion) +
					vendorbinInstall(phpVersion) +
					yarnInstall(phpVersion) +
					installServer(phpVersion, 'sqlite', params['logLevel']) +
				[
					{
						'name': 'phan',
						'image': 'owncloudci/php:%s' % phpVersion,
						'pull': 'always',
						'commands': [
							'make test-php-phan'
						]
					}
				],
				'depends_on': [],
				'trigger': {
					'ref': [
						'refs/pull/**',
						'refs/tags/**'
					]
				}
			}

			for branch in config['branches']:
				result['trigger']['ref'].append('refs/heads/%s' % branch)

			pipelines.append(result)

	return pipelines

def litmus():
	pipelines = []

	if 'litmus' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.4'],
		'logLevel': '2'
	}

	if 'defaults' in config:
		if 'litmus' in config['defaults']:
			for item in config['defaults']['litmus']:
				default[item] = config['defaults']['litmus'][item]

	litmusConfig = config['litmus']

	if type(litmusConfig) == "bool":
		if litmusConfig:
			# the config has 'litmus' true, so specify an empty dict that will get the defaults
			litmusConfig = {}
		else:
			return pipelines

	if len(litmusConfig) == 0:
		# 'litmus' is an empty dict, so specify a single section that will get the defaults
		litmusConfig = {'doDefault': {}}

	for category, matrix in litmusConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			name = 'litmus-php%s' % phpVersion
			db = 'mariadb:10.2'
			image = 'owncloud/litmus:latest'
			environment = {
				'LITMUS_PASSWORD': 'admin',
				'LITMUS_USERNAME': 'admin',
				'TESTS': 'basic copymove props locks http',
			}
			litmusCommand = '/usr/local/bin/litmus-wrapper'

			result = {
				'kind': 'pipeline',
				'type': 'docker',
				'name': name,
				'workspace' : {
					'base': '/drone',
					'path': 'src'
				},
				'steps':
					cacheRestore() +
					composerInstall(phpVersion) +
					vendorbinInstall(phpVersion) +
					yarnInstall(phpVersion) +
					installServer(phpVersion, db, params['logLevel']) +
					setupLocalStorage(phpVersion) +
					fixPermissions(phpVersion, False) +
					createShare(phpVersion) +
					owncloudLog('server', 'src') +
					[
						{
							'name': 'old-endpoint',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/webdav"',
								litmusCommand,
							]
						},
						{
							'name': 'new-endpoint',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/dav/files/admin"',
								litmusCommand,
							]
						},
						{
							'name': 'new-mount',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/dav/files/admin/local_storage/"',
								litmusCommand,
							]
						},
						{
							'name': 'old-mount',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/webdav/local_storage/"',
								litmusCommand,
							]
						},
						{
							'name': 'new-shared',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/dav/files/admin/new_folder/"',
								litmusCommand,
							]
						},
						{
							'name': 'old-shared',
							'image': image,
							'pull': 'always',
							'environment': environment,
							'commands': [
								'source .env',
								'export LITMUS_URL="https://server/remote.php/webdav/new_folder/"',
								litmusCommand,
							]
						},
						{
							'name': 'public-share',
							'image': image,
							'pull': 'always',
							'environment': {
								'LITMUS_PASSWORD': 'admin',
								'LITMUS_USERNAME': 'admin',
								'TESTS': 'basic copymove http',
							},
							'commands': [
								'source .env',
								'export LITMUS_URL=\'https://server/remote.php/dav/public-files/\'$PUBLIC_TOKEN',
								litmusCommand,
							]
						},
					],
				'services':
					databaseService(db) +
					owncloudService(phpVersion, 'server', '/drone/src', True),
				'depends_on': [],
				'trigger': {
					'ref': [
						'refs/pull/**',
						'refs/tags/**'
					]
				}
			}

			for branch in config['branches']:
				result['trigger']['ref'].append('refs/heads/%s' % branch)

			pipelines.append(result)

	return pipelines

def dav():
	pipelines = []

	if 'dav' not in config:
		return pipelines

	default = {
		'phpVersions': ['7.4'],
		'logLevel': '2'
	}

	if 'defaults' in config:
		if 'dav' in config['defaults']:
			for item in config['defaults']['dav']:
				default[item] = config['defaults']['dav'][item]

	davConfig = config['dav']

	if type(davConfig) == "bool":
		if davConfig:
			# the config has 'dav' true, so specify an empty dict that will get the defaults
			davConfig = {}
		else:
			return pipelines

	if len(davConfig) == 0:
		# 'dav' is an empty dict, so specify a single section that will get the defaults
		davConfig = {'doDefault': {}}

	for category, matrix in davConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:
			for davType in ['caldav-new', 'caldav-old', 'carddav-new', 'carddav-old']:
				name = '%s-php%s' % (davType, phpVersion)
				db = 'mariadb:10.2'

				if (davType == 'caldav-new'):
					scriptPath = 'apps/dav/tests/ci/caldav'

				if (davType == 'caldav-old'):
					scriptPath = 'apps/dav/tests/ci/caldav-old-endpoint'

				if (davType == 'carddav-new'):
					scriptPath = 'apps/dav/tests/ci/carddav'

				if (davType == 'carddav-old'):
					scriptPath = 'apps/dav/tests/ci/carddav-old-endpoint'

				result = {
					'kind': 'pipeline',
					'type': 'docker',
					'name': name,
					'workspace' : {
						'base': '/drone',
						'path': 'src'
					},
					'steps':
						cacheRestore() +
						composerInstall(phpVersion) +
						vendorbinInstall(phpVersion) +
						yarnInstall(phpVersion) +
						installServer(phpVersion, db, params['logLevel']) +
						davInstall(phpVersion, scriptPath) +
						fixPermissions(phpVersion, False) +
						owncloudLog('server', 'src') +
						[
							{
								'name': 'dav-test',
								'image': 'owncloudci/php:%s' % phpVersion,
								'pull': 'always',
								'commands': [
									'bash %s/script.sh' % scriptPath,
								]
							},
						],
					'services':
						databaseService(db),
					'depends_on': [],
					'trigger': {
						'ref': [
							'refs/pull/**',
							'refs/tags/**'
						]
					}
				}

				for branch in config['branches']:
					result['trigger']['ref'].append('refs/heads/%s' % branch)

				pipelines.append(result)

	return pipelines

def javascript():
	pipelines = []

	if 'javascript' not in config:
		return pipelines

	default = {
		'coverage': True,
		'logLevel': '2',
		'phpVersion': '7.4'
	}

	if 'defaults' in config:
		if 'javascript' in config['defaults']:
			for item in config['defaults']['javascript']:
				default[item] = config['defaults']['javascript'][item]

	matrix = config['javascript']

	if type(matrix) == "bool":
		if matrix:
			# the config has 'javascript' true, so specify an empty dict that will get the defaults
			matrix = {}
		else:
			return pipelines

	params = {}
	for item in default:
		params[item] = matrix[item] if item in matrix else default[item]

	result = {
		'kind': 'pipeline',
		'type': 'docker',
		'name': 'test-javascript',
		'workspace' : {
			'base': '/drone',
			'path': 'src'
		},
		'steps':
			cacheRestore() +
			composerInstall(params['phpVersion']) +
			vendorbinInstall(params['phpVersion']) +
			yarnInstall(params['phpVersion']) +
		[
			{
				'name': 'test-js',
				'image': 'owncloudci/php:%s' % params['phpVersion'],
				'pull': 'always',
				'commands': [
					'make test-js'
				]
			}
		],
		'depends_on': [],
		'trigger': {
			'ref': [
				'refs/pull/**',
				'refs/tags/**'
			]
		}
	}

	if params['coverage']:
		result['steps'].append({
			'name': 'coverage-upload',
			'image': 'plugins/codecov:2',
			'pull': 'always',
			'environment': {
				'CODECOV_TOKEN': {
					'from_secret': 'codecov_token'
				}
			},
			'settings': {
				'files': [
					'*.xml'
				],
				'flags': [
					'javascript'
				],
				'paths': [
					'tests/output/coverage',
				],
			},
			'when': {
				'instance': [
					'drone.owncloud.services',
					'drone.owncloud.com'
				],
			}
		})

	for branch in config['branches']:
		result['trigger']['ref'].append('refs/heads/%s' % branch)

	return [result]

def phptests(testType):
	pipelines = []

	if testType not in config:
		return pipelines

	errorFound = False

	default = {
		'phpVersions': ['7.1', '7.2', '7.3', '7.4'],
		'databases': [
			'sqlite', 'mariadb:10.2', 'mariadb:10.3', 'mariadb:10.4', 'mysql:5.5', 'mysql:5.7', 'mysql:8.0', 'postgres:9.4', 'postgres:10.3', 'oracle'
		],
		'coverage': True,
		'includeKeyInMatrixName': False,
		'logLevel': '2',
		'cephS3': False,
		'scalityS3': False,
		'externalTypes': ['none'],
		'extraSetup': [],
		'extraServices': [],
		'extraEnvironment': {},
		'extraCommandsBeforeTestRun': [],
		'extraApps': {},
	}

	if 'defaults' in config:
		if testType in config['defaults']:
			for item in config['defaults'][testType]:
				default[item] = config['defaults'][testType][item]

	phptestConfig = config[testType]

	if type(phptestConfig) == "bool":
		if phptestConfig:
			# the config has just True, so specify an empty dict that will get the defaults
			phptestConfig = {}
		else:
			return pipelines

	if len(phptestConfig) == 0:
		# the PHP test config is an empty dict, so specify a single section that will get the defaults
		phptestConfig = {'doDefault': {}}

	for category, matrix in phptestConfig.items():
		params = {}
		for item in default:
			params[item] = matrix[item] if item in matrix else default[item]

		for phpVersion in params['phpVersions']:

			if testType == 'phpunit':
				command = 'su-exec www-data bash tests/drone/test-phpunit.sh'
			else:
				command = 'unknown tbd'

			for db in params['databases']:
				for externalType in params['externalTypes']:
					keyString = '-' + category if params['includeKeyInMatrixName'] else ''
					filesExternalType = externalType if externalType != 'none' else ''
					externalNameString = '-' + externalType if externalType != 'none' else ''
					name = '%s%s-php%s-%s%s' % (testType, keyString, phpVersion, db.replace(":", ""), externalNameString)
					maxLength = 50
					nameLength = len(name)
					if nameLength > maxLength:
						print("Error: generated phpunit stage name of length", nameLength, "is not supported. The maximum length is " + str(maxLength) + ".", name)
						errorFound = True

					if ((externalType == 'scality') or (params['scalityS3'] != False)):
						needScality = True
						filesExternalType = ''
						primaryObjectstore = 'files_primary_s3'
					else:
						needScality = False
						primaryObjectstore = ''

					if ((externalType == 'scality') or (params['cephS3'] != False) or (params['scalityS3'] != False)):
						# If we need S3 storage, then install the 'files_primary_s3' app
						extraAppsDict  = {
							'files_primary_s3': 'composer install'
						}
					else:
						extraAppsDict  = {}

					for app, command in params['extraApps'].items():
						extraAppsDict[app] = command

					result = {
						'kind': 'pipeline',
						'type': 'docker',
						'name': name,
						'workspace' : {
							'base': '/drone',
							'path': 'src'
						},
						'steps':
							cacheRestore() +
							composerInstall(phpVersion) +
							vendorbinInstall(phpVersion) +
							yarnInstall(phpVersion) +
							installServer(phpVersion, db, params['logLevel']) +
							installExtraApps(phpVersion, extraAppsDict) +
							setupScality(phpVersion, needScality) +
							params['extraSetup'] +
							fixPermissions(phpVersion, False) +
							owncloudLog('server', 'src') +
						[
							{
								'name': '%s-tests' % testType,
								'image': 'owncloudci/php:%s' % phpVersion,
								'pull': 'always',
								'environment': {
									'COVERAGE': params['coverage'],
									'DB_TYPE': getDbName(db),
									'FILES_EXTERNAL_TYPE': filesExternalType,
									'PRIMARY_OBJECTSTORE': primaryObjectstore
								},
								'commands': params['extraCommandsBeforeTestRun'] + [
									command
								]
							}
						],
						'services':
							databaseService(db) +
							cephService(params['cephS3']) +
							scalityService(needScality) +
							webdavService(externalType == 'webdav') +
							sambaService(externalType == 'samba') +
							sftpService(externalType == 'sftp') +
							params['extraServices'],
						'depends_on': [],
						'trigger': {
							'ref': [
								'refs/pull/**',
								'refs/tags/**'
							]
						}
					}

					if params['coverage']:
						result['steps'].append({
							'name': 'coverage-upload',
							'image': 'plugins/codecov:2',
							'pull': 'always',
							'environment': {
								'CODECOV_TOKEN': {
									'from_secret': 'codecov_token'
								}
							},
							'settings': {
								'files': [
									'*.xml'
								],
								'flags': [
									'phpunit'
								],
								'paths': [
									'tests/output/coverage',
								],
							},
							'when': {
								'instance': [
									'drone.owncloud.services',
									'drone.owncloud.com'
								],
							}
						})

					for branch in config['branches']:
						result['trigger']['ref'].append('refs/heads/%s' % branch)

					pipelines.append(result)

	if errorFound:
		return False

	return pipelines

def acceptance():
	pipelines = []

	if 'acceptance' not in config:
		return pipelines

	if type(config['acceptance']) == "bool":
		if not config['acceptance']:
			return pipelines

	errorFound = False

	default = {
		'federatedServerVersions': [''],
		'browsers': ['chrome'],
		'phpVersions': ['7.4'],
		'databases': ['mariadb:10.2'],
		'federatedServerNeeded': False,
		'filterTags': '',
		'logLevel': '2',
		'emailNeeded': False,
		'ldapNeeded': False,
		'proxyNeeded': False,
		'cephS3': False,
		'scalityS3': False,
		'testingRemoteSystem': True,
		'useHttps': True,
		'extraSetup': [],
		'extraServices': [],
		'extraEnvironment': {},
		'extraCommandsBeforeTestRun': [],
		'extraApps': {},
		'useBundledApp': False,
		'includeKeyInMatrixName': False,
		'runAllSuites': False,
		'numberOfParts': 1,
		'federatedPhpVersion': '7.2',
	}

	if 'defaults' in config:
		if 'acceptance' in config['defaults']:
			for item in config['defaults']['acceptance']:
				default[item] = config['defaults']['acceptance'][item]

	for category, matrix in config['acceptance'].items():
		if type(matrix['suites']) == "list":
			suites = {}
			for suite in matrix['suites']:
				suites[suite] = suite
		else:
			suites = matrix['suites']

		for suite, alternateSuiteName in suites.items():
			isWebUI = suite.startswith('webUI')
			isAPI = suite.startswith('api')
			isCLI = suite.startswith('cli')

			if (alternateSuiteName == ''):
				alternateSuiteName = suite

			params = {}
			for item in default:
				params[item] = matrix[item] if item in matrix else default[item]

			if isAPI or isCLI:
				params['browsers'] = ['']

			needObjectStore = (params['cephS3'] != False) or (params['scalityS3'] != False)

			extraAppsDict = {
				'testing': 'composer install'
			}

			if (needObjectStore):
				# If we need S3 object storage, then install the 'files_primary_s3' app
				extraAppsDict['files_primary_s3'] = 'composer install'

			for app, command in params['extraApps'].items():
				extraAppsDict[app] = command

			for federatedServerVersion in params['federatedServerVersions']:
				for browser in params['browsers']:
					for phpVersion in params['phpVersions']:
						for db in params['databases']:
							for runPart in range(1, params['numberOfParts'] + 1):
								name = 'unknown'

								if isWebUI or isAPI or isCLI:
									browserString = '' if browser == '' else '-' + browser
									keyString = '-' + category if params['includeKeyInMatrixName'] else ''
									partString = '' if params['numberOfParts'] == 1 else '-%d-%d' % (params['numberOfParts'], runPart)
									federatedServerVersionString = '-' + federatedServerVersion.replace('daily-', '').replace('-qa', '') if (federatedServerVersion != '') else ''
									dbString = db.replace(':', '')
									name = '%s%s%s%s%s-%s-php%s' % (alternateSuiteName, keyString, partString, federatedServerVersionString, browserString, dbString, phpVersion)
									maxLength = 50
									nameLength = len(name)
									if nameLength > maxLength:
										print("Error: generated stage name of length", nameLength, "is not supported. The maximum length is " + str(maxLength) + ".", name)
										errorFound = True

								environment = {}
								for env in params['extraEnvironment']:
									environment[env] = params['extraEnvironment'][env]

								if (params['useHttps']):
									protocol = 'https'
								else:
									protocol = 'http'

								if (params['proxyNeeded']):
									serverUnderTest = 'proxy'
								else:
									serverUnderTest = 'server'

								environment['TEST_SERVER_URL'] = '%s://%s' % (protocol, serverUnderTest)

								environment['BEHAT_FILTER_TAGS'] = params['filterTags']

								if (params['runAllSuites'] == False):
									environment['BEHAT_SUITE'] = suite
								else:
									environment['DIVIDE_INTO_NUM_PARTS'] = params['numberOfParts']
									environment['RUN_PART'] = runPart

								if isWebUI:
									environment['SELENIUM_HOST'] = 'selenium'
									environment['SELENIUM_PORT'] = '4444'
									environment['BROWSER'] = browser
									environment['PLATFORM'] = 'Linux'
									makeParameter = 'test-acceptance-webui'

								if isAPI:
									makeParameter = 'test-acceptance-api'

								if isCLI:
									makeParameter = 'test-acceptance-cli'

								if params['emailNeeded']:
									environment['MAILHOG_HOST'] = 'email'

								if params['ldapNeeded']:
									environment['TEST_EXTERNAL_USER_BACKENDS'] = True

								if params['testingRemoteSystem']:
									environment['TESTING_REMOTE_SYSTEM'] = True
									suExecCommand = ''
								else:
									environment['TESTING_REMOTE_SYSTEM'] = False
									# The test suite (may/will) run local commands, rather than calling the testing app to do them
									# Those commands need to be executed as www-data (which owns the files)
									suExecCommand = 'su-exec www-data '

								if (needObjectStore):
									environment['OC_TEST_ON_OBJECTSTORE'] = '1'
									if (params['cephS3'] != False):
										environment['S3_TYPE'] = 'ceph'
									if (params['scalityS3'] != False):
										environment['S3_TYPE'] = 'scality'

								federationDbSuffix = '-federated'

								result = {
									'kind': 'pipeline',
									'type': 'docker',
									'name': name,
									'workspace' : {
										'base': '/drone',
										'path': 'src'
									},
									'steps':
										cacheRestore() +
										composerInstall(phpVersion) +
										vendorbinInstall(phpVersion) +
										yarnInstall(phpVersion) +
										installServer(phpVersion, db, params['logLevel'], params['federatedServerNeeded'], params['proxyNeeded']) +
										(
											installFederated(federatedServerVersion, params['federatedPhpVersion'], params['logLevel'], protocol, db, federationDbSuffix) +
											owncloudLog('federated', 'federated') if params['federatedServerNeeded'] else []
										) +
										installExtraApps(phpVersion, extraAppsDict) +
										setupCeph(phpVersion, params['cephS3']) +
										setupScality(phpVersion, params['scalityS3']) +
										params['extraSetup'] +
										fixPermissions(phpVersion, params['federatedServerNeeded']) +
										waitForServer(phpVersion, params['federatedServerNeeded']) +
										owncloudLog('server', 'src') +
									[
										({
											'name': 'acceptance-tests',
											'image': 'owncloudci/php:%s' % phpVersion,
											'pull': 'always',
											'environment': environment,
											'commands': params['extraCommandsBeforeTestRun'] + [
												'touch /drone/saved-settings.sh',
												'. /drone/saved-settings.sh',
												'%smake %s' % (suExecCommand, makeParameter)
											]
										}),
									],
									'services':
										databaseService(db) +
										browserService(browser) +
										emailService(params['emailNeeded']) +
										ldapService(params['ldapNeeded']) +
										proxyService(params['proxyNeeded']) +
										cephService(params['cephS3']) +
										scalityService(params['scalityS3']) +
										params['extraServices'] +
										owncloudService(phpVersion, 'server', '/drone/src', params['useHttps']) +
										((
											owncloudService(params['federatedPhpVersion'], 'federated', '/drone/federated', params['useHttps']) +
											databaseServiceForFederation(db, federationDbSuffix)
										) if params['federatedServerNeeded'] else []),
									'depends_on': [],
									'trigger': {
										'ref': [
											'refs/pull/**',
											'refs/tags/**'
										]
									}
								}

								for branch in config['branches']:
									result['trigger']['ref'].append('refs/heads/%s' % branch)

								pipelines.append(result)

	if errorFound:
		return False

	return pipelines

def notify():
	result = {
		'kind': 'pipeline',
		'type': 'docker',
		'name': 'chat-notifications',
		'clone': {
			'disable': True
		},
		'steps': [
			{
				'name': 'notify-rocketchat',
				'image': 'plugins/slack:1',
				'pull': 'always',
				'settings': {
					'webhook': {
						'from_secret': config['rocketchat']['from_secret']
					},
					'channel': config['rocketchat']['channel']
				}
			}
		],
		'depends_on': [],
		'trigger': {
			'ref': [
				'refs/tags/**'
			],
			'status': [
				'success',
				'failure'
			]
		}
	}

	for branch in config['branches']:
		result['trigger']['ref'].append('refs/heads/%s' % branch)

	return result

def databaseService(db):
	dbName = getDbName(db)
	if (dbName == 'mariadb') or (dbName == 'mysql'):
		service = {
			'name': dbName,
			'image': db,
			'pull': 'always',
			'environment': {
				'MYSQL_USER': getDbUsername(db),
				'MYSQL_PASSWORD': getDbPassword(db),
				'MYSQL_DATABASE': getDbDatabase(db),
				'MYSQL_ROOT_PASSWORD': getDbRootPassword()
			}
		}
		if (db == 'mysql:8.0'):
			service['command'] = ['--default-authentication-plugin=mysql_native_password']
		return [service]

	if dbName == 'postgres':
		return [{
			'name': dbName,
			'image': db,
			'pull': 'always',
			'environment': {
				'POSTGRES_USER': getDbUsername(db),
				'POSTGRES_PASSWORD': getDbPassword(db),
				'POSTGRES_DB': getDbDatabase(db)
			}
		}]

	if dbName == 'oracle':
		return [{
			'name': dbName,
			'image': 'owncloudci/oracle-xe:latest',
			'pull': 'always',
			'environment': {
				'ORACLE_USER': getDbUsername(db),
				'ORACLE_PASSWORD': getDbPassword(db),
				'ORACLE_DB': getDbDatabase(db),
				'ORACLE_DISABLE_ASYNCH_IO': 'true',
			}
		}]

	return []

def browserService(browser):
	if browser == 'chrome':
		return [{
			'name': 'selenium',
			'image': 'selenium/standalone-chrome-debug:3.141.59-oxygen',
			'pull': 'always',
			'environment': {
				'JAVA_OPTS': '-Dselenium.LOGGER.level=WARNING'
			}
		}]

	if browser == 'firefox':
		return [{
			'name': 'selenium',
			'image': 'selenium/standalone-firefox-debug:3.8.1',
			'pull': 'always',
			'environment': {
				'JAVA_OPTS': '-Dselenium.LOGGER.level=WARNING',
				'SE_OPTS': '-enablePassThrough false'
			}
		}]

	return []

def emailService(emailNeeded):
	if emailNeeded:
		return [{
			'name': 'email',
			'image': 'mailhog/mailhog',
			'pull': 'always',
		}]

	return []

def ldapService(ldapNeeded):
	if ldapNeeded:
		return [{
			'name': 'ldap',
			'image': 'osixia/openldap',
			'pull': 'always',
			'environment': {
				'LDAP_DOMAIN': 'owncloud.com',
				'LDAP_ORGANISATION': 'owncloud',
				'LDAP_ADMIN_PASSWORD': 'admin',
				'LDAP_TLS_VERIFY_CLIENT': 'never',
				'HOSTNAME': 'ldap',
			}
		}]

	return []

def proxyService(proxyNeeded):
	if proxyNeeded:
		return [{
			'name': 'proxy',
			'image': 'pottava/proxy',
			'pull': 'always',
			'environment': {
				'PROXY_URL': 'http://server',
			}
		}]

	return []

def webdavService(needed):
	if not needed:
		return []

	return [{
		'name': 'webdav',
		'image': 'owncloudci/php:latest',
		'pull': 'always',
		'environment': {
			'APACHE_CONFIG_TEMPLATE': 'webdav'
		},
		'command': [
			'/usr/local/bin/apachectl',
			'-D',
			'FOREGROUND'
		]
	}]

def sambaService(needed):
	if not needed:
		return []

	return [{
		'name': 'samba',
		'image': 'owncloudci/samba:latest',
		'pull': 'always',
		'command': [
			'-u',
			'test;test',
			'-s',
			'public;/tmp;yes;no;no;test;none;test',
			'-S',
		]
	}]

def sftpService(needed):
	if not needed:
		return []

	# 'test:12345:1001::upload'
	# Creates a user 'test' with password '12345', UID '1001'
	# The user has a folder called 'upload' that they can write to.
	# The tests depend on the 'upload' folder already existing, because
	# "Just remember that the users can't create new files directly under their
	#  own home directory, so make sure there are at least one subdirectory
	#  if you want them to upload files" https://hub.docker.com/r/atmoz/sftp/
	# Also see apps/files_external/tests/env/start-sftp-atmoz.sh where the
	# docker image can be started "locally".
	return [{
		'name': 'sftp',
		'image': 'atmoz/sftp',
		'pull': 'always',
		'environment': {
			'SFTP_USERS': 'test:12345:1001::upload'
		}
	}]

def scalityService(scalityS3):
	if not scalityS3:
		return []

	return [{
		'name': 'scality',
		'image': 'owncloudci/scality-s3server:latest',
		'pull': 'always',
		'environment': {
			'HOST_NAME': 'scality'
		}
	}]

def cephService(cephS3):
	if not cephS3:
		return []

	return [{
		'name': 'ceph',
		'image': 'owncloudci/ceph:tag-build-master-jewel-ubuntu-16.04',
		'pull': 'always',
		'environment': {
			'NETWORK_AUTO_DETECT': '4',
			'RGW_NAME': 'ceph',
			'CEPH_DEMO_UID': 'owncloud',
			'CEPH_DEMO_ACCESS_KEY': 'owncloud123456',
			'CEPH_DEMO_SECRET_KEY': 'secret123456',
		}
	}]


def owncloudService(phpVersion, name = 'server', path = '/drone/src', ssl = True):
	if ssl:
		environment = {
			'APACHE_WEBROOT': path,
			'APACHE_CONFIG_TEMPLATE': 'ssl',
			'APACHE_SSL_CERT_CN': name,
			'APACHE_SSL_CERT': '/drone/%s.crt' % name,
			'APACHE_SSL_KEY': '/drone/%s.key' % name
		}
	else:
		environment = {
			'APACHE_WEBROOT': path
		}

	return [{
		'name': name,
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': environment,
		'command': [
			'/usr/local/bin/apachectl',
			'-e',
			'debug',
			'-D',
			'FOREGROUND'
		]
	}]

def getDbName(db):
	return db.split(':')[0]

def getDbUsername(db):
	name = getDbName(db)

	if name == 'oracle':
		return 'system'

	return 'owncloud'

def getDbPassword(db):
	name = getDbName(db)

	if name == 'oracle':
		return 'oracle'

	return 'owncloud'

def getDbRootPassword():
	return 'owncloud'

def getDbDatabase(db):
	name = getDbName(db)

	if name == 'oracle':
		return 'XE'

	return 'owncloud'

def getDbType(db):
	dbName = getDbName(db)
	if dbName == 'postgres':
		return 'pgsql'

	if dbName == 'oracle':
		return 'oci'

	return dbName

def cacheRestore():
	return [{
		'name': 'cache-restore',
		'image': 'plugins/s3-cache:1',
		'pull': 'always',
		'settings': {
			'access_key': {
				'from_secret': 'cache_s3_access_key'
			},
			'endpoint': {
				'from_secret': 'cache_s3_endpoint'
			},
			'restore': True,
			'secret_key': {
				'from_secret': 'cache_s3_secret_key'
			}
		},
		'when': {
			'instance': [
				'drone.owncloud.services',
				'drone.owncloud.com'
			],
		}
	}]

def composerInstall(phpVersion):
	return [{
		'name': 'composer-install',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': {
			'COMPOSER_HOME': '/drone/src/.cache/composer'
		},
		'commands': [
			'make install-composer-deps'
		]
	}]

def vendorbinInstall(phpVersion):
	return [{
		'name': 'vendorbin-install',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': {
			'COMPOSER_HOME': '/drone/src/.cache/composer'
		},
		'commands': [
			'make vendor-bin-deps'
		]
	}]

def yarnInstall(phpVersion):
	return [{
		'name': 'yarn-install',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': {
			'NPM_CONFIG_CACHE': '/drone/src/.cache/npm',
			'YARN_CACHE_FOLDER': '/drone/src/.cache/yarn',
			'bower_storage__packages': '/drone/src/.cache/bower',
		},
		'commands': [
			'make install-nodejs-deps'
		]
	}]

def davInstall(phpVersion, scriptPath):
	return [{
		'name': 'dav-install',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'bash %s/install.sh' % scriptPath
		]
	}]

def setupLocalStorage(phpVersion):
	return [{
		'name': 'setup-storage',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': {
			'OC_PASS': '123456',
		},
		'commands': [
			'mkdir -p /drone/src/work/local_storage',
			'php occ app:enable files_external',
			'php occ config:system:set files_external_allow_create_new_local --value=true',
			'php occ config:app:set core enable_external_storage --value=yes',
			'php occ files_external:create local_storage local null::null -c datadir=/drone/src/work/local_storage',
			'php occ user:add --password-from-env user1',
		]
	}]

def createShare(phpVersion):
	return [{
		'name': 'create-share',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'curl -k -s -u user1:123456 -X MKCOL "https://server/remote.php/webdav/new_folder"',
			'curl -k -s -u user1:123456 "https://server/ocs/v2.php/apps/files_sharing/api/v1/shares" --data "path=/new_folder&shareType=0&permissions=15&name=new_folder&shareWith=admin"',
			'echo -n "PUBLIC_TOKEN=" > .env',
			'curl -k -s -u user1:123456 "https://server/ocs/v2.php/apps/files_sharing/api/v1/shares" --data "path=/new_folder&shareType=3&permissions=15&name=new_folder" | grep token | cut -d">" -f2 | cut -d"<" -f1 >> .env',
		]
	}]

def installExtraApps(phpVersion, extraApps):
	commandArray = []
	for app, command in extraApps.items():
		commandArray.append('git clone https://github.com/owncloud/%s.git /drone/src/apps/%s' % (app, app))
		if (command != ''):
			commandArray.append('cd /drone/src/apps/%s' % app)
			commandArray.append(command)
		commandArray.append('cd /drone/src')
		commandArray.append('php occ a:l')
		commandArray.append('php occ a:e %s' % app)
		commandArray.append('php occ a:l')

	if (commandArray == []):
		return []

	return [{
		'name': 'install-extra-apps',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': commandArray
	}]

def databaseServiceForFederation(db, suffix):
	dbName = getDbName(db)

	if dbName not in ['mariadb', 'mysql']:
		print('Not implemented federated database for ', dbName)
		return []

	return [{
		'name': dbName + suffix,
		'image': db,
		'pull': 'always',
		'environment': {
			'MYSQL_USER': getDbUsername(db),
			'MYSQL_PASSWORD': getDbPassword(db),
			'MYSQL_DATABASE': getDbDatabase(db) + suffix,
			'MYSQL_ROOT_PASSWORD': getDbRootPassword()
		}
	}]

def installServer(phpVersion, db, logLevel, federatedServerNeeded = False, proxyNeeded = False):
	return [{
		'name': 'install-server',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'environment': {
			'DB_TYPE': getDbName(db)
		},
		'commands': [
			'bash tests/drone/install-server.sh',
			'php occ a:l',
			'php occ config:system:set trusted_domains 1 --value=server',
		] + ([
			'php occ config:system:set trusted_domains 2 --value=federated'
		] if federatedServerNeeded else []) + [
		] + ([
			'php occ config:system:set trusted_domains 3 --value=proxy'
		] if proxyNeeded else []) + [
			'php occ log:manage --level %s' % logLevel,
			'php occ config:list',
			'php occ security:certificates:import /drone/server.crt',
		] + ([
			'php occ security:certificates:import /drone/federated.crt',
		] if federatedServerNeeded else []) + [
			'php occ security:certificates',
		]
	}]

def installFederated(federatedServerVersion, phpVersion, logLevel, protocol, db, dbSuffix = '-federated'):
	host = getDbName(db)
	dbType = host

	username = getDbUsername(db)
	password = getDbPassword(db)
	database = getDbDatabase(db) + dbSuffix

	if host == 'mariadb':
		dbType = 'mysql'
	elif host == 'postgres':
		dbType = 'pgsql'
	elif host == 'oracle':
		dbType = 'oci'
	return [
		{
			'name': 'install-federated',
			'image': 'owncloudci/core',
			'pull': 'always',
			'settings': {
				'version': federatedServerVersion,
				'core_path': '/drone/federated',
				'db_type': dbType,
				'db_name': database,
				'db_host': host + dbSuffix,
				'db_username': username,
				'db_password': password
			},
		},
		{
			'name': 'configure-federated',
			'image': 'owncloudci/php:%s' % phpVersion,
			'pull': 'always',
			'commands': [
				'cd /drone/federated',
				'php occ a:l',
				'php occ a:e testing',
				'php occ a:l',
				'php occ config:system:set trusted_domains 1 --value=server',
				'php occ config:system:set trusted_domains 2 --value=federated',
				'php occ log:manage --level %s' % logLevel,
				'php occ config:list',
				'echo "export TEST_SERVER_FED_URL=%s://federated" > /drone/saved-settings.sh' % protocol,
				'php occ security:certificates:import /drone/server.crt',
				'php occ security:certificates:import /drone/federated.crt',
				'php occ security:certificates',
			]
		}
	]

def setupCeph(phpVersion, cephS3):
	if not cephS3:
		return []

	return [{
		'name': 'setup-ceph',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'wait-for-it -t 600 ceph:80',
			'cd /drone/src/apps/files_primary_s3',
			'cp tests/drone/ceph.config.php /drone/src/config',
			'cd /var/www/owncloud/server',
			'./apps/files_primary_s3/tests/drone/create-bucket.sh',
		]
	}]

def setupScality(phpVersion, scalityS3):
	if type(scalityS3) == "bool":
		if scalityS3:
			# specify an empty dict that will get the defaults
			scalityS3 = {}
		else:
			return []

	specialConfig = '.' + scalityS3['config'] if 'config' in scalityS3 else ''
	configFile = 'scality%s.config.php' % specialConfig
	createExtraBuckets = scalityS3['createExtraBuckets'] if 'createExtraBuckets' in scalityS3 else False

	return [{
		'name': 'setup-scality',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'wait-for-it -t 600 scality:8000',
			'cp /drone/src/apps/files_primary_s3/tests/drone/%s /drone/src/config' % configFile,
			'php occ s3:create-bucket owncloud --accept-warning'
		] + ([
			'for I in $(seq 1 9); do php ./occ s3:create-bucket  owncloud$I --accept-warning; done',
		] if createExtraBuckets else [])
	}]

def fixPermissions(phpVersion, federatedServerNeeded):
	return [{
		'name': 'fix-permissions',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'chown -R www-data /drone/src'
		] + ([
			'chown -R www-data /drone/federated'
		] if federatedServerNeeded else [])
	}]

def waitForServer(phpVersion, federatedServerNeeded):
	return [{
		'name': 'wait-for-server',
		'image': 'owncloudci/php:%s' % phpVersion,
		'pull': 'always',
		'commands': [
			'wait-for-it -t 600 server:80'
		] + ([
			'wait-for-it -t 600 federated:80'
		] if federatedServerNeeded else [])
	}]

def owncloudLog(server, folder):
	return [{
		'name': 'owncloud-log-%s' % server,
		'image': 'owncloud/ubuntu:18.04',
		'pull': 'always',
		'detach': True,
		'commands': [
			'tail -f /drone/%s/data/owncloud.log' % folder
		]
	}]

def dependsOn(earlierStages, nextStages):
	for earlierStage in earlierStages:
		for nextStage in nextStages:
			nextStage['depends_on'].append(earlierStage['name'])
