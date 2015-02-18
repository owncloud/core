.. service:: CloudFront 2012-05-05

Signing CloudFront URLs for Private Distributions
-------------------------------------------------

Signed URLs allow you to provide users access to your private content. A signed URL includes additional information
(e.g., expiration time) that gives you more control over access to your content. This additional information appears in
a policy statement, which is based on either a canned policy or a custom policy. For information about how to set up
private distributions and why you need to sign URLs, please read the `Serving Private Content through CloudFront section
<http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/PrivateContent.html>`_ of the CloudFront Developer
Guide.

.. note:

    You must have the OpenSSL extension installed in you PHP environment in order to sign CloudFront URLs.

You can sign a URL using the CloudFront client in the SDK. First you must make sure to provide your CloudFront
Private Key and Key Pair ID to the CloudFront client.

.. code-block:: php

    <?php

    $cloudFront = CloudFrontClient::factory(array(
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>',
    ));

You can alternatively specify the Private Key and Key Pair ID in your AWS config file and use the service builder to
instantiate the CloudFront client. The following is an example config file that specifies the CloudFront key information.

.. code-block:: php

    <?php return array(
        'includes' => array('_aws'),
        'services' => array(
            'default_settings' => array(
                'params' => array(
                    'key'    => '<aws access key>',
                    'secret' => '<aws secret key>',
                    'region' => 'us-west-2'
                )
            ),
            'cloudfront' => array(
                'extends' => 'cloudfront',
                'params'  => array(
                    'private_key' => '/path/to/your/cloudfront-private-key.pem',
                    'key_pair_id' => '<cloudfront key pair id>'
                )
            )
        )
    );

You can sign a CloudFront URL for a video resource using either a canned or custom policy.

.. code-block:: php

    // Setup parameter values for the resource
    $streamHostUrl = 'rtmp://example-distribution.cloudfront.net';
    $resourceKey = 'videos/example.mp4';
    $expires = time() + 300;

    // Create a signed URL for the resource using the canned policy
    $signedUrlCannedPolicy = $cloudFront->getSignedUrl(array(
        'url'     => $streamHostUrl . '/' . $resourceKey,
        'expires' => $expires,
    ));

For versions of the SDK later than 2.3.1, instead of providing your private key information when you instantiate the
client, you can provide it at the time when you sign the URL.

.. code-block:: php

    $signedUrlCannedPolicy = $cloudFront->getSignedUrl(array(
        'url'         => $streamHostUrl . '/' . $resourceKey,
        'expires'     => $expires,
        'private_key' => '/path/to/your/cloudfront-private-key.pem',
        'key_pair_id' => '<cloudfront key pair id>'
    ));

To use a custom policy, provide the ``policy`` key instead of ``expires``.

.. code-block:: php

    $customPolicy = <<<POLICY
    {
        "Statement": [
            {
                "Resource": "{$resourceKey}",
                "Condition": {
                    "IpAddress": {"AWS:SourceIp": "{$_SERVER['REMOTE_ADDR']}/32"},
                    "DateLessThan": {"AWS:EpochTime": {$expires}}
                }
            }
        ]
    }
    POLICY;

    // Create a signed URL for the resource using a custom policy
    $signedUrlCustomPolicy = $cloudFront->getSignedUrl(array(
        'url'    => $streamHostUrl . '/' . $resourceKey,
        'policy' => $customPolicy,
    ));

The form of the signed URL is actually different depending on if the URL you are signing is using the "http" or "rtmp"
scheme. In the case of "http", the full, absolute URL is returned. For "rtmp", only the relative URL is returned for
your convenience, because some players require the host and path to be provided as separate parameters.

The following is an example of how you could use the signed URL to construct a web page displaying a video using
`JWPlayer <http://www.longtailvideo.com/jw-player/>`_. The same type of technique would apply to other players like
`FlowPlayer <http://flowplayer.org/>`_, but will require different client-side code.

.. code-block:: html

    <html>
    <head>
        <title>Amazon CloudFront Streaming Example</title>
        <script type="text/javascript" src="https://example.com/jwplayer.js"></script>
    </head>
    <body>
        <div id="video">The canned policy video will be here.</div>
        <script type="text/javascript">
            jwplayer('video').setup({
                file: "<?= $streamHostUrl ?>/cfx/st/<?= $signedUrlCannedPolicy ?>",
                width: "720",
                height: "480"
            });
        </script>
    </body>
    </html>

.. apiref:: CloudFront 2012-05-05
