<?php
require __DIR__ . '/artifacts/aws.phar';

$client = Aws\S3\S3Client::factory([
    'key'    => 'foo',
    'secret' => 'bar',
    'region' => 'us-east-1'
]);

echo 'Version=' . Aws\Common\Aws::VERSION;
