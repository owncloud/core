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
];

local notification_deps = std.filterMap(function(p) p.kind == 'pipeline', function(p) p.name, pipelines);

pipelines + [
  pipeline.notify(
    trigger=trigger,
    depends_on=notification_deps,
  ),
]
