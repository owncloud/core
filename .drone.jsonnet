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
    { suite: 'apiFederation', notification: false, email: false },
  ]
]  + [
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

    { suite: 'webUISharingExternal', notification: false, email: true, federated: 'daily-master-qa' },
  ]
];

local notification_deps = std.filterMap(function(p) p.kind == 'pipeline', function(p) p.name, pipelines);

pipelines + [
  pipeline.notify(
    trigger=trigger,
    depends_on=notification_deps,
  ),
]
