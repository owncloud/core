local services = {
  email()::
    [{
      name: 'email',
      pull: 'always',
      image: 'mailhog/mailhog:latest',
    }],

  get(service)::
    if service != '' then $[service]() else [],
};

local externals = {
  webdav(version='')::
    local v = if version != '' then version else 'latest';
    [{
      name: 'webdav',
      image: 'owncloudci/php:' + v,
      pull: 'always',
      environment: {
        APACHE_CONFIG_TEMPLATE: 'webdav',
      },
      command: [
        '/usr/local/bin/apachectl',
        '-D',
        'FOREGROUND',
      ],
    }],

  samba(version='')::
    local v = if version != '' then version else 'latest';
    [{
      name: 'samba',
      image: 'owncloudci/samba:' + v,
      pull: 'always',
      command: [
        '-u',
        'test;test',
        '-s',
        'public;/tmp;yes;no;no;test;none;test',
        '-S',
      ],
    }],

  swift(version='')::
    local v = if version != '' then version else 'latest';
    [{
      name: 'ceph',
      image: 'owncloudci/ceph:' + v,
      pull: 'always',
      environment: {
        KEYSTONE_PUBLIC_PORT: '5034',
        KEYSTONE_ADMIN_USER: 'test',
        KEYSTONE_ADMIN_PASS: 'testing',
        KEYSTONE_ADMIN_TENANT: 'testtenant',
        KEYSTONE_ENDPOINT_REGION: 'testregion',
        KEYSTONE_SERVICE: 'testceph',
        OSD_SIZE: '500',
      },
    }],

  windows(version='')::
    [],

  get(external, version='')::
    if external != '' then $[external](version) else [],
};

local objects = {
  scality(version='')::
    local v = if version != '' then version else 'latest';

    [{
      name: 'scality',
      image: 'owncloudci/scality-s3server:' + v,
      pull: 'always',
      environment: {
        HOST_NAME: 'scality',
        LOG_LEVEL: 'trace',
      },
    }],

  swift(version='')::
    [],

  get(object, version='')::
    if object != '' then $[object](version) else [],
};

local databases = {
  mariadb(version='')::
    local v = if version != '' then version else '10.2';
    [{
      name: 'mariadb',
      image: 'mariadb:' + v,
      environment: {
        MYSQL_USER: 'owncloud',
        MYSQL_PASSWORD: 'owncloud',
        MYSQL_DATABASE: 'owncloud',
        MYSQL_ROOT_PASSWORD: 'owncloud',
      },
    }],

  mysql(version='')::
    local v = if version != '' then version else '5.5';
    [{
      name: 'mysql',
      image: 'mysql:' + v,
      environment: {
        MYSQL_USER: 'owncloud',
        MYSQL_PASSWORD: 'owncloud',
        MYSQL_DATABASE: 'owncloud',
        MYSQL_ROOT_PASSWORD: 'owncloud',
      },
      [if version == '8.0' then 'command']: ['--default-authentication-plugin=mysql_native_password'],
    }],

  postgres(version='')::
    local v = if version != '' then version else '9.4';
    [{
      name: 'postgres',
      image: 'postgres:' + v,
      environment: {
        POSTGRES_USER: 'owncloud',
        POSTGRES_PASSWORD: 'owncloud',
        POSTGRES_DB: 'owncloud',
      },
    }],

  oracle(version='')::
    [{
      name: 'oracle',
      image: 'deepdiver/docker-oracle-xe-11g:2.0',
      environment: {
        ORACLE_DISABLE_ASYNCH_IO: true,
      },
    }],

  sqlite(version='')::
    [],

  get(db, version)::
    if db != '' then $[db](version) else [],
};

local browsers = {
  chrome: [{
    name: 'chrome',
    image: 'selenium/standalone-chrome-debug:3.141.59-oxygen',
    pull: 'always',
    environment: {
      JAVA_OPTS: '-Dselenium.LOGGER.level=WARNING',
    },
  }],

  firefox: [{
    name: 'firefox',
    image: 'selenium/standalone-firefox-debug:3.8.1',
    pull: 'always',
    environment: {
      JAVA_OPTS: '-Dselenium.LOGGER.level=WARNING',
      SE_OPTS: '-enablePassThrough false',
    },
  }],

  get(browser)::
    if browser != '' then $[browser] else [],
};

local suites = {
  phpunit(image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    [{
      name: 'phpunit-tests',
      image: image,
      pull: 'always',
      environment: {
        FILES_EXTERNAL_TYPE: external,
        COVERAGE: coverage,
        PRIMARY_OBJECTSTORE: if object == 'scality' then 'files_primary_s3' else if object == 'swift' then 'swift' else '',
        DB_TYPE: db,
      },
      commands: [
        'su-exec www-data bash tests/drone/test-phpunit.sh',
      ],
    }],

  webui(image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    [{
      name: 'webui-acceptance-tests',
      image: image,
      pull: 'always',
      environment: {
        TEST_SERVER_URL: proto + '://server',
        BEHAT_FILTER_TAGS: filter,
        BEHAT_SUITE: suite,
        BROWSER: browser,
        SELENIUM_HOST: browser,
        SELENIUM_PORT: 4444,
        PLATFORM: 'Linux',
        MAILHOG_HOST: 'email',
        [if num != '' then 'DIVIDE_INTO_NUM_PARTS']: std.split(num, '/')[1],
        [if num != '' then 'RUN_PART']: std.split(num, '/')[0],
      },
      commands: [
        'touch /drone/saved-settings.sh',
        '. /drone/saved-settings.sh',
        'make test-acceptance-webui TESTING_REMOTE_SYSTEM=true',
      ],
    }],

  api(image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    [{
      name: 'api-acceptance-tests',
      image: image,
      pull: 'always',
      environment: {
        TEST_SERVER_URL: proto + '://server',
        BEHAT_FILTER_TAGS: filter,
        BEHAT_SUITE: suite,
        [if num != '' then 'DIVIDE_INTO_NUM_PARTS']: std.split(num, '/')[1],
        [if num != '' then 'RUN_PART']: std.split(num, '/')[0],
      },
      commands: [
        'touch /drone/saved-settings.sh',
        '. /drone/saved-settings.sh',
        'make test-acceptance-api TESTING_REMOTE_SYSTEM=true',
      ],
    }],

  cli(image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    [{
      name: 'cli-acceptance-tests',
      image: image,
      pull: 'always',
      environment: {
        MAILHOG_HOST: 'email',
        TEST_SERVER_URL: proto + '://server',
        BEHAT_FILTER_TAGS: filter,
        BEHAT_SUITE: suite,
        [if num != '' then 'DIVIDE_INTO_NUM_PARTS']: std.split(num, '/')[1],
        [if num != '' then 'RUN_PART']: std.split(num, '/')[0],
      },
      commands: [
        'touch /drone/saved-settings.sh',
        '. /drone/saved-settings.sh',
        'make test-acceptance-cli TESTING_REMOTE_SYSTEM=true',
      ],
    }],

  loc(image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    [{
      name: 'local-acceptance-tests',
      image: image,
      pull: 'always',
      environment: {
        MAILHOG_HOST: 'email',
        TEST_SERVER_URL: proto + '://server',
        BEHAT_FILTER_TAGS: filter,
        BEHAT_SUITE: suite,
        [if num != '' then 'DIVIDE_INTO_NUM_PARTS']: std.split(num, '/')[1],
        [if num != '' then 'RUN_PART']: std.split(num, '/')[0],
      },
      commands: [
        'touch /drone/saved-settings.sh',
        '. /drone/saved-settings.sh',
        'su-exec www-data ./tests/acceptance/run.sh --type cli',
      ],
    }],

  get(type, image='', db='', external='', object='', suite='', browser='', filter='', num='', proto='https', coverage=false)::
    if type != '' then $[type](image, db, external, object, suite, browser, filter, num, proto, coverage) else [],
};

{
  install(trigger={}, depends_on=[])::
    {
      kind: 'pipeline',
      name: 'install-dependencies',
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:7.1'),
        $.vendorbin(image='owncloudci/php:7.1'),
        $.yarn(image='owncloudci/php:7.1'),
        $.cache({ rebuild: true, mount: ['.cache'] }),
        $.cache({ flush: true, flush_age: 14 }),
      ],
      trigger: trigger,
      depends_on: depends_on,
    },

  standard(trigger={}, depends_on=[])::
    {
      kind: 'pipeline',
      name: 'coding-standard',
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:7.1'),
        $.vendorbin(image='owncloudci/php:7.1'),
        $.yarn(image='owncloudci/php:7.1'),
        {
          name: 'php-style',
          image: 'owncloudci/php:7.3',
          pull: 'always',
          commands: [
            'make test-php-style',
          ],
        },
      ],
      trigger: trigger,
      depends_on: depends_on,
    },

  phan(php='', trigger={}, depends_on=[])::
    {
      kind: 'pipeline',
      name: 'phan-php' + php,
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ] + $.server(image='owncloudci/php:' + php, db='sqlite') + [
        {
          name: 'php-phan',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          commands: [
            'make test-php-phan',
          ],
        },
      ],
      trigger: trigger,
      depends_on: depends_on,
    },

  stan(php='', trigger={}, depends_on=[])::
    {
      kind: 'pipeline',
      name: 'stan-php' + php,
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ] + $.server(image='owncloudci/php:' + php, db='sqlite') + [
        {
          name: 'php-phpstan',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          commands: [
            'make test-php-phpstan',
          ],
        },
      ],
      trigger: trigger,
      depends_on: depends_on,
    },

  javascript(trigger={}, depends_on=[])::
    {
      kind: 'pipeline',
      name: 'test-javascript',
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:7.1'),
        $.vendorbin(image='owncloudci/php:7.1'),
        $.yarn(image='owncloudci/php:7.1'),
        {
          name: 'test-js',
          image: 'owncloudci/php:7.1',
          pull: 'always',
          commands: [
            'make test-js',
          ],
        },
        {
          name: 'coverage-upload',
          image: 'plugins/codecov:2',
          pull: 'always',
          environment: {
            CODECOV_TOKEN: {
              from_secret: 'codecov_token',
            },
          },
          settings: {
            flags: [
              'javascript',
            ],
            paths: [
              'tests/output/coverage',
            ],
            files: [
              '*.xml',
            ],
          },
          when: {
            instance: [
              'drone.owncloud.services',
              'drone.owncloud.com',
            ],
          },
        },
      ],
      trigger: trigger,
      depends_on: depends_on,
    },

  litmus(php='', db='', trigger={}, depends_on=[])::
    local database_split = std.split(db, ':');
    local database_name = database_split[0];
    local database_version = if std.length(database_split) == 2 then database_split[1] else '';

    {
      kind: 'pipeline',
      name: 'litmus-php' + php,
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ] + $.server(image='owncloudci/php:' + php, db=database_name) + [
        {
          name: 'setup-storage',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          environment: {
            OC_PASS: '123456',
          },
          commands: [
            'mkdir -p /drone/src/work/local_storage',
            'php occ app:enable files_external',
            'php occ config:system:set files_external_allow_create_new_local --value=true',
            'php occ config:app:set core enable_external_storage --value=yes',
            'php occ files_external:create local_storage local null::null -c datadir=/drone/src/work/local_storage',
            'php occ user:add --password-from-env user1',
          ],
        },
      ] + $.permissions(image='owncloudci/php:' + php) + [
        {
          name: 'create-share',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          commands: [
            'curl -k -s -u user1:123456 -X MKCOL "https://server/remote.php/webdav/new_folder"',
            'curl -k -s -u user1:123456 "https://server/ocs/v2.php/apps/files_sharing/api/v1/shares" --data "path=/new_folder&shareType=0&permissions=15&name=new_folder&shareWith=admin"',
          ],
        },
      ] + $.logging(image='owncloudci/php:' + php) + [
        {
          name: test.name,
          image: 'owncloud/litmus:latest',
          pull: 'always',
          environment: {
            LITMUS_URL: 'https://server/remote.php' + test.endpoint,
            LITMUS_USERNAME: 'admin',
            LITMUS_PASSWORD: 'admin',
          },
        }
        for test in [
          {
            name: 'old-endpoint',
            endpoint: '/webdav',
          },
          {
            name: 'new-endpoint',
            endpoint: '/dav/files/admin',
          },
          {
            name: 'new-mount',
            endpoint: '/dav/files/admin/local_storage/',
          },
          {
            name: 'old-mount',
            endpoint: '/webdav/local_storage/',
          },
          {
            name: 'new-shared',
            endpoint: '/dav/files/admin/new_folder/',
          },
          {
            name: 'old-shared',
            endpoint: '/webdav/new_folder/',
          },
        ]
      ],
      services: $.owncloud(image='owncloudci/php:' + php, basename='server', root='/drone/src') + databases.get(database_name, database_version),
      trigger: trigger,
      depends_on: depends_on,
    },

  dav(php='', db='', suite='', trigger={}, depends_on=[])::
    local database_split = std.split(db, ':');
    local database_name = database_split[0];
    local database_version = if std.length(database_split) == 2 then database_split[1] else '';

    {
      kind: 'pipeline',
      name: (if std.endsWith(suite, '-old-endpoint') then std.strReplace(suite, '-old-endpoint', '-old') else suite + '-new') + '-php' + php + '-' + std.join('', database_split),
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ] + $.server(image='owncloudci/php:' + php, db=database_name) + [
        {
          name: 'dav-install',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          commands: [
            'bash apps/dav/tests/ci/' + suite + '/install.sh',
          ],
        },
      ] + $.permissions(image='owncloudci/php:' + php) + $.logging(image='owncloudci/php:' + php) + [
        {
          name: 'dav-test',
          image: 'owncloudci/php:' + php,
          pull: 'always',
          commands: [
            'bash apps/dav/tests/ci/' + suite + '/script.sh',
          ],
        },
      ],
      services: databases.get(database_name, database_version),
      trigger: trigger,
      depends_on: depends_on,
    },

  phpunit(php='', db='', coverage=false, external='', object='', proto='https', trigger={}, depends_on=[])::
    local database_split = std.split(db, ':');
    local database_name = database_split[0];
    local database_version = if std.length(database_split) == 2 then database_split[1] else '';

    {
      kind: 'pipeline',
      name: 'phpunit-php' + php + '-' + std.join('', database_split) + (if external != '' then '-external-' + external else '') + (if object != '' then '-object-' + object else ''),
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ]
      + $.server(image='owncloudci/php:' + php, db=database_name)
      + (if object == 'scality' then $.primarys3app(image='owncloudci/php:' + php, object=object) else [])
      + $.permissions(image='owncloudci/php:' + php, name='owncloud', path='/drone/src')
      + $.logging(image='owncloudci/php:' + php, name='owncloud-logfile', file='/drone/src/data/owncloud.log') +
      + suites.get(image='owncloudci/php:' + php, type='phpunit', coverage=coverage, db=database_name, external=external, object=object, proto=proto),
      services: externals.get(external) + objects.get(object) + databases.get(database_name, database_version),
      trigger: trigger,
      depends_on: depends_on,
    },

  behat(php='', db='', type='', browser='', suite='', filter='', num='', notification=false, email=false, federated='', proto='https', trigger={}, depends_on=[])::
    local database_split = std.split(db, ':');
    local database_name = database_split[0];
    local database_version = if std.length(database_split) == 2 then database_split[1] else '';

    {
      kind: 'pipeline',
      name: 'behat' + (if browser != '' then '-' + browser else '-headless') + (if suite != '' then '-' + suite else '') + (if num != '' then '-' + std.join('-of-', std.split(num, "/")) else ''),
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      workspace: {
        base: '/drone',
        path: 'src',
      },
      steps: [
        $.cache({ restore: true }),
        $.composer(image='owncloudci/php:' + php),
        $.vendorbin(image='owncloudci/php:' + php),
        $.yarn(image='owncloudci/php:' + php),
      ]
      + $.server(image='owncloudci/php:' + php, db=database_name)
      + $.testingapp(image='owncloudci/php:' + php)
      + (if notification then $.notificationsapp(image='owncloudci/php:' + php) else [])
      + $.permissions(image='owncloudci/php:' + php, name='owncloud', path='/drone/src')
      + $.logging(image='owncloudci/php:' + php, name='owncloud-logfile', file='/drone/src/data/owncloud.log')
      + (if federated != '' then $.federated(image='owncloudci/php:' + php, version=federated, proto=proto) + $.permissions(image='owncloudci/php:' + php, name='federated', path='/drone/federated') + $.logging(image='owncloudci/php:' + php, name='federated-logfile', file='/drone/federated/data/owncloud.log') else [])
      + suites.get(image='owncloudci/php:' + php, type=type, suite=suite, browser=browser, filter=filter, num=num, proto=proto),
      services: $.owncloud(image='owncloudci/php:' + php, basename='server', root='/drone/src', proto=proto) + (if federated != '' then $.owncloud(image='owncloudci/php:' + php, basename='federated', root='/drone/federated', proto=proto) else []) + browsers.get(browser) + databases.get(database_name, database_version) + (if email then services.get('email') else []),
      trigger: trigger,
      depends_on: depends_on,
    },

  notify(trigger={}, depends_on=[])::
    local limited = {
      ref: std.filter(function(r) std.startsWith(r, 'refs/heads/') || std.startsWith(r, 'refs/tags/'), trigger.ref),
      status: ['failure']
    };

    {
      kind: 'pipeline',
      name: 'chat-notifications',
      platform: {
        os: 'linux',
        arch: 'amd64',
      },
      clone: {
        disable: true,
      },
      steps: [
        {
          name: 'notify',
          image: 'plugins/slack:1',
          settings: {
            webhook: {
              from_secret: 'public_rocketchat',
            },
            channel: 'server',
          },
        },
      ],
      trigger: std.mergePatch(trigger, limited),
      depends_on: depends_on,
    },

  cache(settings={})::
    local step_name = 'cache-' + if 'restore' in settings then 'restore' else if 'rebuild' in settings then 'rebuild' else if 'flush' in settings then 'flush' else 'unknown';

    {
      name: step_name,
      image: 'plugins/s3-cache:1',
      pull: 'always',
      settings: {
        endpoint: {
          from_secret: 'cache_s3_endpoint',
        },
        access_key: {
          from_secret: 'cache_s3_access_key',
        },
        secret_key: {
          from_secret: 'cache_s3_secret_key',
        },
      } + settings,
      when: {
        instance: [
          'drone.owncloud.services',
          'drone.owncloud.com',
        ],
      } + if std.objectHas(settings, 'restore') then {} else { event: ['push'] },
    },

  yarn(image='owncloudci/php:7.1')::
    {
      name: 'yarn-install',
      image: image,
      pull: 'always',
      environment: {
        NPM_CONFIG_CACHE: '/drone/src/.cache/npm',
        YARN_CACHE_FOLDER: '/drone/src/.cache/yarn',
        bower_storage__packages: '/drone/src/.cache/bower',
      },
      commands: [
        'make install-nodejs-deps',
      ],
    },

  composer(image='owncloudci/php:7.1')::
    {
      name: 'composer-install',
      image: image,
      pull: 'always',
      environment: {
        COMPOSER_HOME: '/drone/src/.cache/composer',
      },
      commands: [
        'make install-composer-deps',
      ],
    },

  vendorbin(image='owncloudci/php:7.1')::
    {
      name: 'vendorbin-install',
      image: image,
      pull: 'always',
      environment: {
        COMPOSER_HOME: '/drone/src/.cache/composer',
      },
      commands: [
        'make vendor-bin-deps',
      ],
    },

  testingapp(image='owncloudci/php:7.1')::
    [{
      name: 'testing-application',
      image: image,
      pull: 'always',
      commands: [
        'git clone https://github.com/owncloud/testing.git /drone/src/apps/testing',
        'cd /drone/src/apps/testing',
        'composer install',
        'cd /drone/src',
        'php occ a:l',
        'php occ a:e testing',
        'php occ a:l',
      ],
    }],

  primarys3app(image='owncloudci/php:7.1', object='')::
    [{
      name: 'primarys3-application',
      image: image,
      pull: 'always',
      commands: [
        'git clone https://github.com/owncloud/files_primary_s3.git /drone/src/apps/files_primary_s3',
        'cd /drone/src/apps/files_primary_s3',
        'composer install',
        'cd /drone/src',
        'php occ a:l',
        'php occ a:e files_primary_s3',
        'php occ a:l',
      ],
    }, {
      name: 'primarys3-prepare',
      image: image,
      pull: 'always',
      commands: [
        'cp /drone/src/apps/files_primary_s3/tests/drone/' + object + '.config.php /drone/src/config',
        'php ./occ s3:create-bucket owncloud --accept-warning',
      ],
    }],

  notificationsapp(image='owncloudci/php:7.1')::
    [{
      name: 'notifications-application',
      image: image,
      pull: 'always',
      commands: [
        'git clone https://github.com/owncloud/notifications.git /drone/src/apps/notifications',
        'cd /drone/src/apps/notifications',
        'composer install',
        'cd /drone/src',
        'php occ a:l',
        'php occ a:e notifications',
        'php occ a:l',
      ],
    }],

  owncloud(image='owncloudci/php:7.1', basename='server', root='/drone/src', proto='https')::
    [{
      name: basename,
      image: image,
      pull: 'always',
      environment: {
        APACHE_WEBROOT: root,
      } + if proto == 'https' then {
        APACHE_CONFIG_TEMPLATE: 'ssl',
        APACHE_SSL_CERT_CN: basename,
        APACHE_SSL_CERT: '/drone/' + basename + '.crt',
        APACHE_SSL_KEY: '/drone/' + basename + '.key',
      } else {},
      command: [
        '/usr/local/bin/apachectl',
        '-e',
        'debug',
        '-D',
        'FOREGROUND',
      ],
    }],

  server(image='owncloudci/php:7.1', db='', federated=false)::
    [{
      name: 'install-server',
      image: image,
      pull: 'always',
      environment: {
        DB_TYPE: db,
      },
      commands: [
        'bash tests/drone/install-server.sh',
        'php occ a:l',
        'php occ config:system:set trusted_domains 1 --value=server',
      ] + if federated then ['php occ config:system:set trusted_domains 2 --value=federated'] else [] + [
        'php occ log:manage --level 2',
        'php occ config:list',
        'php occ security:certificates:import /drone/server.crt',
      ] + if federated then ['php occ security:certificates:import /drone/federated.crt'] else [] + [
        'php occ security:certificates',
      ],
    }],

  federated(image='owncloudci/php:7.1', version='', proto='https')::
    [{
      name: 'install-federated',
      image: 'owncloudci/core',
      pull: 'always',
      settings: {
        exclude: 'apps/testing',
        version: version,
        core_path: '/drone/federated',
      },
    }, {
      name: 'configure-federated',
      image: image,
      pull: 'always',
      commands: [
        'cd /drone/federated',
        'php occ a:l',
        'php occ a:e testing',
        'php occ a:l',
        'php occ config:system:set trusted_domains 1 --value=server',
        'php occ config:system:set trusted_domains 2 --value=federated',
        'php occ log:manage --level 2',
        'php occ config:list',
        'echo "export TEST_SERVER_FED_URL=' + proto + '://federated" > /drone/saved-settings.sh',
        'php occ security:certificates:import /drone/server.crt',
        'php occ security:certificates:import /drone/federated.crt',
        'php occ security:certificates',
      ],
    }],

  permissions(image='owncloudci/php:7.1', name='owncloud', path='/drone/src')::
    [{
      name: name + '-permissions',
      image: image,
      pull: 'always',
      commands: [
        'chown www-data -R ' + path,
      ],
    }],

  logging(image='owncloudci/php:7.1', name='owncloud-logfile', file='data/owncloud.log')::
    [{
      name: name,
      image: image,
      pull: 'always',
      detach: true,
      commands: [
        'tail -f ' + file,
      ],
    }],
}
