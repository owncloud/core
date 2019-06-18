local pipeline = import 'pipeline.libsonnet';

local trigger = {
  ref: [
    'refs/heads/drone-jsonnet',
    'refs/tags/**',
    'refs/pull/**',
  ],
};

local standard_deps = [
  'install-dependencies',
];

local phpunit_deps = [
  'coding-standard',
  'phan-php7.1',
  'stan-php7.1',
];


local pipelines = [
  #
  # install dependencies
  #
  pipeline.install(
    trigger=trigger
  ),

  #
  # coding standard
  #
  pipeline.standard(
    trigger=trigger,
    depends_on=standard_deps
  ),
] + [
  #
  # phan analyzer
  #
  pipeline.phan(
    php=php,
    trigger=trigger,
    depends_on=standard_deps
  )
  for php in [
    '7.1',
  ]
] + [
  #
  # stan analyzer
  #
  pipeline.stan(
    php=php,
    trigger=trigger,
    depends_on=standard_deps
  )
  for php in [
    '7.1',
  ]
] + [
  #
  # frontend testing
  #
  pipeline.javascript(
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  #
  # litmus testing
  #
  pipeline.litmus(
    php='7.1',
    db='mariadb:10.2',
    depends_on=phpunit_deps,
  ),

  #
  # caldav testing
  #
  pipeline.dav(
    suite='caldav',
    php='7.1',
    db='mariadb:10.2',
    trigger=trigger,
    depends_on=phpunit_deps
  ),
  pipeline.dav(
    suite='caldav-old-endpoint',
    php='7.1',
    db='mariadb:10.2',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  #
  # carddav testing
  #
  pipeline.dav(
    suite='carddav',
    php='7.1',
    db='mariadb:10.2',
    trigger=trigger,
    depends_on=phpunit_deps
  ),
  pipeline.dav(
    suite='carddav-old-endpoint',
    php='7.1',
    db='mariadb:10.2',
    trigger=trigger,
    depends_on=phpunit_deps
  ),
] + [
  #
  # php 7.1
  #
  pipeline.phpunit(
    php='7.1',
    db=matrix,
    coverage=true,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    'sqlite',
    'mariadb:10.2',
    'mysql:5.5',
    'mysql:5.7',
    'postgres:9.4',
    'oracle',
  ]
] + [
  #
  # php 7.2
  #
  pipeline.phpunit(
    php='7.2',
    db=matrix,
    coverage=false,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    'sqlite',
    'mariadb:10.2',
  ]
] + [
  #
  # php 7.3
  #
  pipeline.phpunit(
    php='7.3',
    db=matrix,
    coverage=false,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    'sqlite',
    'mariadb:10.2',
  ]
] + [
  #
  # external storage
  #
  pipeline.phpunit(
    php='7.1',
    db='sqlite',
    coverage=true,
    external=matrix,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    'webdav',
    'samba',
    'windows',
  ]
] + [
  #
  # scality storage
  #
  pipeline.phpunit(
    php='7.1',
    db='sqlite',
    coverage=true,
    object='scality',
    trigger=trigger,
    depends_on=phpunit_deps
  ),
] + [
  #
  # acceptance api
  #
  pipeline.behat(
    type='api',
    php='7.1',
    db='mariadb:10.2',
    suite=matrix.suite,
    notification=matrix.notification,
    email=matrix.email,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'apiMain', notification: false, email: false },
    { suite: 'apiAuth', notification: false, email: false },
    { suite: 'apiAuthOcs', notification: false, email: false },
    { suite: 'apiCapabilities', notification: false, email: false },
    { suite: 'apiComments', notification: false, email: false },
    { suite: 'apiFavorites', notification: false, email: false },
    { suite: 'apiFederation', notification: false, email: false },
    { suite: 'apiProvisioning-v1', notification: false, email: false },
    { suite: 'apiProvisioning-v2', notification: false, email: false },
    { suite: 'apiProvisioningGroups-v1', notification: false, email: false },
    { suite: 'apiProvisioningGroups-v2', notification: false, email: false },
    { suite: 'apiSharees', notification: false, email: false },
    { suite: 'apiShareManagement', notification: false, email: false },
    { suite: 'apiShareManagementBasic', notification: false, email: false },
    { suite: 'apiShareOperations', notification: false, email: false },
    { suite: 'apiShareReshare', notification: false, email: false },
    { suite: 'apiShareUpdate', notification: false, email: false },
    { suite: 'apiSharingNotifications', notification: true, email: false },
    { suite: 'apiTags', notification: false, email: false },
    { suite: 'apiTrashbin', notification: false, email: false },
    { suite: 'apiVersions', notification: false, email: false },
    { suite: 'apiWebdavLocks', notification: false, email: false },
    { suite: 'apiWebdavLocks2', notification: false, email: false },
    { suite: 'apiWebdavMove', notification: false, email: false },
    { suite: 'apiWebdavOperations', notification: false, email: false },
    { suite: 'apiWebdavProperties', notification: false, email: false },
    { suite: 'apiWebdavUpload', notification: false, email: false },
  ]
] + [
  #
  # acceptance cli
  #
  pipeline.behat(
    type='cli',
    php='7.1',
    db='mariadb:10.2',
    suite=matrix.suite,
    notification=matrix.notification,
    email=matrix.email,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'cliBackground', notification: false, email: false },
    { suite: 'cliMain', notification: false, email: false },
    { suite: 'cliProvisioning', notification: false, email: true },
    { suite: 'cliTrashbin', notification: false, email: false },
  ]
] + [
  #
  # acceptance local
  #
  pipeline.behat(
    type='loc',
    php='7.1',
    db='mariadb:10.2',
    suite=matrix.suite,
    notification=matrix.notification,
    email=matrix.email,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'cliAppManagement', notification: false, email: false },
  ]
] + [
  #
  # acceptance chrome
  #
  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='chrome',
    suite=matrix.suite,
    notification=matrix.notification,
    email=matrix.email,
    federated=matrix.federated,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'webUIAdminSettings', notification: false, email: true, federated: '' },
    { suite: 'webUIComments', notification: false, email: true, federated: '' },
    { suite: 'webUICreateDelete', notification: false, email: false, federated: '' },
    { suite: 'webUIFavorites', notification: false, email: false, federated: '' },
    { suite: 'webUIFiles', notification: false, email: false, federated: '' },
    { suite: 'webUILogin', notification: false, email: true, federated: '' },
    { suite: 'webUIMoveFilesFolders', notification: false, email: false, federated: '' },
    { suite: 'webUIPersonalSettings', notification: false, email: true, federated: '' },
    { suite: 'webUIRenameFiles', notification: false, email: false, federated: '' },
    { suite: 'webUIRenameFolders', notification: false, email: false, federated: '' },
    { suite: 'webUIRestrictSharing', notification: false, email: false, federated: '' },
    { suite: 'webUISharingAcceptShares', notification: false, email: false, federated: '' },
    { suite: 'webUISharingAutocompletion', notification: false, email: false, federated: '' },
    { suite: 'webUISharingExternal', notification: false, email: true, federated: 'daily-master-qa' },
    { suite: 'webUISharingInternalGroups', notification: false, email: true, federated: '' },
    { suite: 'webUISharingInternalUsers', notification: false, email: true, federated: '' },
    { suite: 'webUISharingNotifications', notification: true, email: true, federated: '' },
    { suite: 'webUISharingPublic', notification: false, email: true, federated: '' },
    { suite: 'webUITags', notification: false, email: false, federated: '' },
    { suite: 'webUITrashbin', notification: false, email: false, federated: '' },
    { suite: 'webUIUpload', notification: false, email: false, federated: '' },
    { suite: 'webUIWebdavLocks', notification: false, email: false, federated: '' },
    { suite: 'webUIWebdavLockProtection', notification: false, email: false, federated: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIAddUsers', notification: false, email: true, federated: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIManageUsersGroups', notification: false, email: true, federated: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIManageQuota', notification: false, email: true, federated: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUISettingsMenu', notification: false, email: true, federated: '' },
  ]
] + [
  #
  # acceptance firefox
  #
  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='firefox',
    filter='@smokeTest&&~@notifications-app-required',
    num='1/3',
    notification=false,
    email=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='firefox',
    filter='@smokeTest&&~@notifications-app-required',
    num='2/3',
    notification=false,
    email=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='firefox',
    filter='@smokeTest&&~@notifications-app-required',
    num='3/3',
    notification=false,
    email=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),
];

local notification_deps = std.filterMap(function(p) p.kind == 'pipeline', function(p) p.name, pipelines);

pipelines + [
  pipeline.notify(
    trigger=trigger,
    depends_on=notification_deps,
  ),
]
