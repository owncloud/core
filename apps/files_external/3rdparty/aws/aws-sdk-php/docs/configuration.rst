Configuring the SDK
===================

The AWS SDK for PHP can be configured in many ways to suit your needs. This guide highlights the use of configuration
files with the service builder as well as individual client configuration options.

Configuration files
-------------------

How configuration files work
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

When passing an array of parameters to the first argument of ``Aws\Common\Aws::factory()``, the service builder loads
the default ``aws-config.php`` file and merges the array of shared parameters into the default configuration.

Excerpt from ``src/Aws/Common/Resources/aws-config.php``:

.. code-block:: php

    <?php return array(
        'class' => 'Aws\Common\Aws',
        'services' => array(
            'default_settings' => array(
                'params' => array()
            ),
            'autoscaling' => array(
                'alias'   => 'AutoScaling',
                'extends' => 'default_settings',
                'class'   => 'Aws\AutoScaling\AutoScalingClient'
            ),
            'cloudformation' => array(
                'alias'   => 'CloudFormation',
                'extends' => 'default_settings',
                'class'   => 'Aws\CloudFormation\CloudFormationClient'
            ),
        // ...
    );

The ``aws-config.php`` file provides default configuration settings for associating client classes with service names.
This file tells the ``Aws\Common\Aws`` service builder which class to instantiate when you reference a client by name.

You can supply your credential profile (see :ref:`credential_profiles`) and other configuration settings to the service
builder so that each client is instantiated with those settings. To do this, pass an array of settings (including your
``profile``) into the first argument of ``Aws\Common\Aws::factory()``.

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\Common\Aws;

    $aws = Aws::factory(array(
        'profile' => 'my_profile',
        'region'  => 'us-east-1',
    ));

Using a custom configuration file
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

You can use a custom configuration file that allows you to create custom named clients with pre-configured settings.

Let's say you want to use the default ``aws-config.php`` settings, but you want to supply your keys using a
configuration file. Each service defined in the default configuration file extends from ``default_settings`` service.
You can create a custom configuration file that extends the default configuration file and add credentials to the
``default_settings`` service:

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'profile' => 'my_profile', // Looks up credentials in ~/.aws/credentials
                    'region'  => 'us-west-2'
                )
            )
        )
    );

Make sure to include the ``'includes' => array('_aws'),`` line in your configuration file, because this extends the
default configuration that makes all of the service clients available to the service builder. If this is missing, then
you will get an exception when trying to retrieve a service client.

You can use your custom configuration file with the ``Aws\Common\Aws`` class by passing the full path to the
configuration file in the first argument of the ``factory()`` method:

.. code-block:: php

    <?php

    require 'vendor/autoload.php';

    use Aws\Common\Aws;

    $aws = Aws::factory('/path/to/custom/config.php');

You can create custom named services if you need to, for example, use multiple accounts/credentials with the
same service:

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'foo.dynamodb' => array(
                'extends' => 'dynamodb',
                'params'  => array(
                    'profile' => 'my_profile',
                    'region'  => 'us-west-2'
                )
            ),
            'bar.dynamodb' => array(
                'extends' => 'dynamodb',
                'params'  => array(
                    'profile' => 'my_other_profile',
                    'region'  => 'us-west-2'
                )
            )
        )
    );

If you prefer JSON syntax, you can define your configuration in JSON format instead of PHP.

.. code-block:: js

    {
        "includes": ["_aws"],
        "services": {
            "default_settings": {
                "params": {
                    "profile": "my_profile",
                    "region": "us-west-2"
                }
            }
        }
    }

For more information about writing custom configuration files, please see `Using the Service Builder
<http://docs.guzzlephp.org/en/latest/webservice-client/using-the-service-builder.html>`_ in the Guzzle documentation.

Client configuration options
-----------------------------

Basic client configuration options include your credentials ``profile`` (see :doc:`credentials`) and a ``region``
(see :ref:`specify_region`). For typical use cases, you will not need to provide more than these 3 options.
The following represents all of the possible client configuration options for service clients in the SDK.

========================= ==============================================================================================
Credentials Options
------------------------------------------------------------------------------------------------------------------------
Options                   Description
========================= ==============================================================================================
``profile``               The AWS credential profile associated with the credentials you want to use. The profile is
                          used to look up your credentials in your credentials file (``~/.aws/credentials``). See
                          :ref:`credential_profiles` for more information.

``key``                   An AWS access key ID. Unless you are setting temporary credentials provided by AWS STS, it is
                          recommended that you avoid hard-coding credentials with this parameter. Please see
                          :doc:`credentials` for my information about credentials.

``secret``                An AWS secret access key. Unless you are setting temporary credentials provided by AWS STS, it
                          is recommended that you avoid hard-coding credentials with this parameter. Please see
                          :doc:`credentials` for my information about credentials.

``token``                 An AWS security token to use with request authentication. These are typically provided by the
                          AWS STS service. Please note that not all services accept temporary credentials.
                          See http://docs.aws.amazon.com/STS/latest/UsingSTS/UsingTokens.html.

``token.ttd``             The UNIX timestamp for when the provided credentials expire.

``credentials``           A credentials object (``Aws\Common\Credentials\CredentialsInterface``) can be provided instead
                          explicit access keys and tokens.

``credentials.cache.key`` Optional custom cache key to use with the credentials.

``credentials.client``    Pass this option to specify a custom ``Guzzle\Http\ClientInterface`` to use if your
                          credentials require a HTTP request (e.g. ``RefreshableInstanceProfileCredentials``).
========================= ==============================================================================================

========================= ==============================================================================================
Endpoint and Signature Options
------------------------------------------------------------------------------------------------------------------------
Options                   Description
========================= ==============================================================================================
``region``                Region name (e.g., 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc.).
                          See :ref:`specify_region`.

``scheme``                URI Scheme of the base URL (e.g.. 'https', 'http') used when base_url is not supplied.

``base_url``              Allows you to specify a custom endpoint instead of have the SDK build one automatically from
                          the region and scheme.

``signature``             Overrides the signature used by the client. Clients will always choose an appropriate default
                          signature. However, it can be useful to override this with a custom setting. This can be set
                          to "v4", "v3https", "v2" or an instance of ``Aws\Common\Signature\SignatureInterface``.

``signature.service``     The signature service scope for Signature V4. See :ref:`custom_endpoint`.

``signature.region``      The signature region scope for Signature V4. See :ref:`custom_endpoint`.
========================= ==============================================================================================

================================== =====================================================================================
Generic Client Options
------------------------------------------------------------------------------------------------------------------------
Options                            Description
================================== =====================================================================================
``ssl.certificate_authority``      Set to true to use the SDK bundled SSL certificate bundle (this is used by default),
                                   ``'system'`` to use the bundle on your system, a string pointing to a file to use a
                                   specific certificate file, a string pointing to a directory to use multiple
                                   certificates, or false to disable SSL validation (not recommended).

                                   When using the ``aws.phar``, the bundled SSL certificate will be extracted to your
                                   system's temp folder, and each time a client is created an MD5 check will be
                                   performed to ensure the integrity of the certificate.

``curl.options``                   Associative array of cURL options to apply to every request created by the client.
                                   If either the key or value of an entry in the array is a string, Guzzle will attempt
                                   to find a matching defined cURL constant automatically (e.g. ``"CURLOPT_PROXY"`` will
                                   be converted to the constant ``CURLOPT_PROXY``).

``request.options``                Associative array of `Guzzle request options
                                   <http://docs.guzzlephp.org/en/latest/http-client/client.html#request-options>`_ to
                                   apply to every request created by the client.

``command.params``                 An associative array of default options to set on each command created by the client.

``client.backoff.logger``          A ``Guzzle\Log\LogAdapterInterface`` object used to log backoff retries. Use
                                   ``'debug'`` to emit PHP warnings when a retry is issued.

``client.backoff.logger.template`` Optional template to use for exponential backoff log messages. See the
                                   ``Guzzle\Plugin\Backoff\BackoffLogger`` class for formatting information.
================================== =====================================================================================

.. _specify_region:

Specifying a region
~~~~~~~~~~~~~~~~~~~

Some clients require a ``region`` configuration setting. You can find out if the client you are using requires a region
and the regions available to a client by consulting the documentation for that particular client
(see :ref:`supported-services`).

Here's an example of creating an Amazon DynamoDB client that uses the ``us-west-1`` region:

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Create a client that uses the us-west-1 region
    $client = DynamoDbClient::factory(array(
        'key'    => 'YOUR_AWS_ACCESS_KEY_ID',
        'secret' => 'YOUR_AWS_SECRET_ACCESS_KEY',
        'region' => 'us-west-1'
    ));

.. _custom_endpoint:

Setting a custom endpoint
~~~~~~~~~~~~~~~~~~~~~~~~~

You can specify a completely customized endpoint for a client using the client's ``base_url`` option. If the client you
are using requires a region, then must still specify the name of the region using the ``region`` option. Setting a
custom endpoint can be useful if you're using a mock web server that emulates a web service, you're testing against a
private beta endpoint, or you are trying to a use a new region not yet supported by the SDK.

Here's an example of creating an Amazon DynamoDB client that uses a completely customized endpoint:

.. code-block:: php

    require 'vendor/autoload.php';

    use Aws\DynamoDb\DynamoDbClient;

    // Create a client that that contacts a completely customized base URL
    $client = DynamoDbClient::factory(array(
        'base_url' => 'http://my-custom-url',
        'region'   => 'my-region-1',
        'key'      => 'abc',
        'secret'   => '123'
    ));

If your custom endpoint uses signature version 4 and must be signed with custom signature scoping values, then you can
specify the signature scoping values using ``signature.service`` (the scoped name of the service) and
``signature.region`` (the region that you are contacting). These values are typically not required.

.. _using_proxy:

Using a proxy
~~~~~~~~~~~~~

You can send requests with the AWS SDK for PHP through a proxy using the "request options" of a client. These
"request options" are applied to each HTTP request sent from the client. One of the option settings that can be
specified is the `proxy` option.

Request options are passed to a client through the client's factory method:

.. code-block:: php

    use Aws\S3\S3Client;

    $s3 = S3Client::factory(array(
        'request.options' => array(
            'proxy' => '127.0.0.1:123'
        )
    ));

The above example tells the client that all requests should be proxied through an HTTP proxy located at the
`127.0.0.1` IP address using port `123`.

You can supply a username and password when specifying your proxy setting if needed, using the format of
``username:password@host:port``.
