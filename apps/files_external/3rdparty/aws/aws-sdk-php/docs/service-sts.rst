.. service:: Sts

.. note::

    For information about why you might need to use temporary credentials in your application or project, see
    `Scenarios for Granting Temporary Access <http://docs.aws.amazon.com/STS/latest/UsingSTS/STSUseCases.html>`_ in the
    AWS STS documentation.

Getting Temporary Credentials
-----------------------------

AWS STS has five operations that return temporary credentials: ``AssumeRole``, ``AssumeRoleWithWebIdentity``,
``AssumeRoleWithSAML``, ``GetFederationToken``, and ``GetSessionToken``. Using the ``GetSessionToken`` operation is
trivial, so let's use that one as an example.

.. code-block:: php

    $result = $client->getSessionToken();

The result for ``GetSessionToken`` and the other AWS STS operations always contains a ``'Credentials'`` value. If you
print the result (e.g., ``print_r($result)``), it looks like the following:

.. code-block:: php

    Array
    (
        ...
        [Credentials] => Array
        (
            [SessionToken] => '<base64 encoded session token value>'
            [SecretAccessKey] => '<temporary secret access key value>'
            [Expiration] => 2013-11-01T01:57:52Z
            [AccessKeyId] => '<temporary access key value>'
        )
        ...
    )

Using Temporary Credentials
---------------------------

You can use temporary credentials with another AWS client by instantiating the client and passing in the values received
from AWS STS directly.

.. code-block:: php

    use Aws\S3\S3Client;

    $result = $client->getSessionToken();

    $s3 = S3Client::factory(array(
        'key'    => $result['Credentials']['AccessKeyId'],
        'secret' => $result['Credentials']['SecretAccessKey'],
        'token'  => $result['Credentials']['SessionToken'],
    ));

You can also construct a ``Credentials`` object and use that when instantiating the client.

.. code-block:: php

    use Aws\Common\Credentials\Credentials;
    use Aws\S3\S3Client;

    $result = $client->getSessionToken();

    $credentials = new Credentials(
        $result['Credentials']['AccessKeyId'],
        $result['Credentials']['SecretAccessKey'],
        $result['Credentials']['SessionToken']
    );

    $s3 = S3Client::factory(array('credentials' => $credentials));

However, the *best* way to provide temporary credentials is to use the ``createCredentials()`` helper method included
with ``StsClient``. This method extracts the data from an AWS STS result and creates the ``Credentials`` object for you.

.. code-block:: php

    $result = $sts->getSessionToken();
    $credentials = $sts->createCredentials($result);

    $s3 = S3Client::factory(array('credentials' => $credentials));

You can also use the same technique when setting credentials on an existing client object.

.. code-block:: php

    $credentials = $sts->createCredentials($sts->getSessionToken());
    $s3->setCredentials($credentials);

.. apiref:: Sts
