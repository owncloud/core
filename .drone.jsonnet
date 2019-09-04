local pipeline = import 'pipeline.libsonnet';

local trigger = {
  ref: [
    'refs/heads/master',
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
    '7.1', '7.2', '7.3',
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
    trigger=trigger,
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
  # php 7.0
  #
  pipeline.phpunit(
    php='7.0',
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
    federated=matrix.federated,
    federatedphp=matrix.federatedphp,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'apiMain', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiAuth', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiAuthOcs', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiCapabilities', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiComments', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiFavorites', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiFederation', notification: false, email: false, federated: 'daily-master-qa', federatedphp: '' },
    { suite: 'apiFederation', notification: false, email: false, federated: '10.2.1', federatedphp: '7.1' },
    { suite: 'apiProvisioning-v1', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiProvisioning-v2', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiProvisioningGroups-v1', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiProvisioningGroups-v2', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiSharees', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiShareManagement', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiShareManagementBasic', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiShareOperations', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiShareReshare', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiShareUpdate', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiSharingNotifications', notification: true, email: false, federated: '', federatedphp: '' },
    { suite: 'apiTags', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiTrashbin', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiVersions', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavLocks', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavLocks2', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavMove', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavOperations', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavProperties', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'apiWebdavUpload', notification: false, email: false, federated: '', federatedphp: '' },
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
    federatedphp=matrix.federatedphp,
    trigger=trigger,
    depends_on=phpunit_deps
  )
  for matrix in [
    { suite: 'webUIAdminSettings', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUIComments', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUICreateDelete', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIFavorites', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIFiles', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUILogin', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUIMoveFilesFolders', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIPersonalSettings', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUIRenameFiles', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIRenameFolders', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIRestrictSharing', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUISharingAcceptShares', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUISharingAutocompletion', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUISharingExternal', notification: false, email: true, federated: 'daily-master-qa', federatedphp: '' },
    { suite: 'webUISharingExternal', notification: false, email: true, federated: '10.2.1', federatedphp: '7.1' },
    { suite: 'webUISharingInternalGroups', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUISharingInternalUsers', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUISharingNotifications', notification: true, email: true, federated: '', federatedphp: '' },
    { suite: 'webUISharingPublic', notification: false, email: true, federated: '', federatedphp: '' },
    { suite: 'webUITags', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUITrashbin', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIUpload', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIWebdavLocks', notification: false, email: false, federated: '', federatedphp: '' },
    { suite: 'webUIWebdavLockProtection', notification: false, email: false, federated: '', federatedphp: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIAddUsers', notification: false, email: true, federated: '', federatedphp: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIManageUsersGroups', notification: false, email: true, federated: '', federatedphp: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUIManageQuota', notification: false, email: true, federated: '', federatedphp: '' },

    # This suite is part of the user_management app in later core versions
    { suite: 'webUISettingsMenu', notification: false, email: true, federated: '', federatedphp: '' },
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

  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='chrome',
    filter='@smokeTest&&~@notifications-app-required',
    num='1/3',
    notification=false,
    email=true,
    proxy=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='chrome',
    filter='@smokeTest&&~@notifications-app-required',
    num='2/3',
    notification=false,
    email=true,
    proxy=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='webui',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    browser='chrome',
    filter='@smokeTest&&~@notifications-app-required',
    num='3/3',
    notification=false,
    email=true,
    proxy=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='api',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    filter='@smokeTest&&~@notifications-app-required',
    num='1/3',
    notification=false,
    proxy=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='api',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    filter='@smokeTest&&~@notifications-app-required',
    num='2/3',
    notification=false,
    proxy=true,
    federated='',
    trigger=trigger,
    depends_on=phpunit_deps
  ),

  pipeline.behat(
    type='api',
    php='7.1',
    db='mariadb:10.2',
    proto='http',
    filter='@smokeTest&&~@notifications-app-required',
    num='3/3',
    notification=false,
    proxy=true,
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
