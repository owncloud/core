<?php
/*
 * Copyright 2023 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Auth\CredentialSource;

use Google\Auth\ExternalAccountCredentialSourceInterface;
use Google\Auth\HttpHandler\HttpClientCache;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use GuzzleHttp\Psr7\Request;

/**
 * Authenticates requests using AWS credentials.
 */
class AwsNativeSource implements ExternalAccountCredentialSourceInterface
{
    private const CRED_VERIFICATION_QUERY = 'Action=GetCallerIdentity&Version=2011-06-15';

    private string $audience;
    private string $regionalCredVerificationUrl;
    private ?string $regionUrl;
    private ?string $securityCredentialsUrl;
    private ?string $imdsv2SessionTokenUrl;

    /**
     * @param string $audience The audience for the credential.
     * @param string $regionalCredVerificationUrl The regional AWS GetCallerIdentity action URL used to determine the
     *                                            AWS account ID and its roles. This is not called by this library, but
     *                                            is sent in the subject token to be called by the STS token server.
     * @param string|null $regionUrl This URL should be used to determine the current AWS region needed for the signed
     *                               request construction.
     * @param string|null $securityCredentialsUrl The AWS metadata server URL used to retrieve the access key, secret
     *                                            key and security token needed to sign the GetCallerIdentity request.
     * @param string|null $imdsv2SessionTokenUrl Presence of this URL enforces the auth libraries to fetch a Session
     *                                           Token from AWS. This field is required for EC2 instances using IMDSv2.
     */
    public function __construct(
        string $audience,
        string $regionalCredVerificationUrl,
        string $regionUrl = null,
        string $securityCredentialsUrl = null,
        string $imdsv2SessionTokenUrl = null
    ) {
        $this->audience = $audience;
        $this->regionalCredVerificationUrl = $regionalCredVerificationUrl;
        $this->regionUrl = $regionUrl;
        $this->securityCredentialsUrl = $securityCredentialsUrl;
        $this->imdsv2SessionTokenUrl = $imdsv2SessionTokenUrl;
    }

    public function fetchSubjectToken(callable $httpHandler = null): string
    {
        if (is_null($httpHandler)) {
            $httpHandler = HttpHandlerFactory::build(HttpClientCache::getHttpClient());
        }

        $headers = [];
        if ($this->imdsv2SessionTokenUrl) {
            $headers = [
                'X-aws-ec2-metadata-token' => self::getImdsV2SessionToken($this->imdsv2SessionTokenUrl, $httpHandler)
            ];
        }

        if (!$signingVars = self::getSigningVarsFromEnv()) {
            if (!$this->securityCredentialsUrl) {
                throw new \LogicException('Unable to get credentials from ENV, and no security credentials URL provided');
            }
            $signingVars = self::getSigningVarsFromUrl(
                $httpHandler,
                $this->securityCredentialsUrl,
                self::getRoleName($httpHandler, $this->securityCredentialsUrl, $headers),
                $headers
            );
        }

        if (!$region = self::getRegionFromEnv()) {
            if (!$this->regionUrl) {
                throw new \LogicException('Unable to get region from ENV, and no region URL provided');
            }
            $region = self::getRegionFromUrl($httpHandler, $this->regionUrl, $headers);
        }
        $url = str_replace('{region}', $region, $this->regionalCredVerificationUrl);
        $host = parse_url($url)['host'] ?? '';

        // From here we use the signing vars to create the signed request to receive a token
        [$accessKeyId, $secretAccessKey, $securityToken] = $signingVars;
        $headers = self::getSignedRequestHeaders($region, $host, $accessKeyId, $secretAccessKey, $securityToken);

        // Inject x-goog-cloud-target-resource into header
        $headers['x-goog-cloud-target-resource'] = $this->audience;

        // Format headers as they're expected in the subject token
        $formattedHeaders= array_map(
            fn ($k, $v) => ['key' => $k, 'value' => $v],
            array_keys($headers),
            $headers,
        );

        $request = [
            'headers' => $formattedHeaders,
            'method' => 'POST',
            'url' => $url,
        ];

        return urlencode(json_encode($request) ?: '');
    }

    /**
     * @internal
     */
    public static function getImdsV2SessionToken(string $imdsV2Url, callable $httpHandler): string
    {
        $headers = [
            'X-aws-ec2-metadata-token-ttl-seconds' => '21600'
        ];
        $request = new Request(
            'PUT',
            $imdsV2Url,
            $headers
        );

        $response = $httpHandler($request);
        return (string) $response->getBody();
    }

    /**
     * @see http://docs.aws.amazon.com/general/latest/gr/sigv4-create-canonical-request.html
     *
     * @internal
     *
     * @return array<string, string>
     */
    public static function getSignedRequestHeaders(
        string $region,
        string $host,
        string $accessKeyId,
        string $secretAccessKey,
        ?string $securityToken
    ): array {
        $service = 'sts';

        # Create a date for headers and the credential string in ISO-8601 format
        $amzdate = date('Ymd\THis\Z');
        $datestamp = date('Ymd'); # Date w/o time, used in credential scope

        # Create the canonical headers and signed headers. Header names
        # must be trimmed and lowercase, and sorted in code point order from
        # low to high. Note that there is a trailing \n.
        $canonicalHeaders = sprintf("host:%s\nx-amz-date:%s\n", $host, $amzdate);
        if ($securityToken) {
            $canonicalHeaders .= sprintf("x-amz-security-token:%s\n", $securityToken);
        }

        # Step 5: Create the list of signed headers. This lists the headers
        # in the canonicalHeaders list, delimited with ";" and in alpha order.
        # Note: The request can include any headers; $canonicalHeaders and
        # $signedHeaders lists those that you want to be included in the
        # hash of the request. "Host" and "x-amz-date" are always required.
        $signedHeaders = 'host;x-amz-date';
        if ($securityToken) {
            $signedHeaders .= ';x-amz-security-token';
        }

        # Step 6: Create payload hash (hash of the request body content). For GET
        # requests, the payload is an empty string ("").
        $payloadHash = hash('sha256', '');

        # Step 7: Combine elements to create canonical request
        $canonicalRequest = implode("\n", [
            'POST', // method
            '/',   // canonical URL
            self::CRED_VERIFICATION_QUERY, // query string
            $canonicalHeaders,
            $signedHeaders,
            $payloadHash
        ]);

        # ************* TASK 2: CREATE THE STRING TO SIGN*************
        # Match the algorithm to the hashing algorithm you use, either SHA-1 or
        # SHA-256 (recommended)
        $algorithm = 'AWS4-HMAC-SHA256';
        $scope = implode('/', [$datestamp, $region, $service, 'aws4_request']);
        $stringToSign = implode("\n", [$algorithm, $amzdate, $scope, hash('sha256', $canonicalRequest)]);

        # ************* TASK 3: CALCULATE THE SIGNATURE *************
        # Create the signing key using the function defined above.
        // (done above)
        $signingKey = self::getSignatureKey($secretAccessKey, $datestamp, $region, $service);

        # Sign the string_to_sign using the signing_key
        $signature = bin2hex(self::hmacSign($signingKey, $stringToSign));

        # ************* TASK 4: ADD SIGNING INFORMATION TO THE REQUEST *************
        # The signing information can be either in a query string value or in
        # a header named Authorization. This code shows how to use a header.
        # Create authorization header and add to request headers
        $authorizationHeader = sprintf(
            '%s Credential=%s/%s, SignedHeaders=%s, Signature=%s',
            $algorithm,
            $accessKeyId,
            $scope,
            $signedHeaders,
            $signature
        );

        # The request can include any headers, but MUST include "host", "x-amz-date",
        # and (for this scenario) "Authorization". "host" and "x-amz-date" must
        # be included in the canonical_headers and signed_headers, as noted
        # earlier. Order here is not significant.
        $headers = [
            'host' => $host,
            'x-amz-date' => $amzdate,
            'Authorization' => $authorizationHeader,
        ];
        if ($securityToken) {
            $headers['x-amz-security-token'] = $securityToken;
        }

        return $headers;
    }

    /**
     * @internal
     */
    public static function getRegionFromEnv(): ?string
    {
        $region = getenv('AWS_REGION');
        if (empty($region)) {
            $region = getenv('AWS_DEFAULT_REGION');
        }
        return $region ?: null;
    }

    /**
     * @internal
     *
     * @param callable $httpHandler
     * @param string $regionUrl
     * @param array<string, string|string[]> $headers Request headers to send in with the request.
     */
    public static function getRegionFromUrl(callable $httpHandler, string $regionUrl, array $headers): string
    {
        // get the region/zone from the region URL
        $regionRequest = new Request('GET', $regionUrl, $headers);
        $regionResponse = $httpHandler($regionRequest);

        // Remove last character. For example, if us-east-2b is returned,
        // the region would be us-east-2.
        return substr((string) $regionResponse->getBody(), 0, -1);
    }

    /**
     * @internal
     *
     * @param callable $httpHandler
     * @param string $securityCredentialsUrl
     * @param array<string, string|string[]> $headers Request headers to send in with the request.
     */
    public static function getRoleName(callable $httpHandler, string $securityCredentialsUrl, array $headers): string
    {
        // Get the AWS role name
        $roleRequest = new Request('GET', $securityCredentialsUrl, $headers);
        $roleResponse = $httpHandler($roleRequest);
        $roleName = (string) $roleResponse->getBody();

        return $roleName;
    }

    /**
     * @internal
     *
     * @param callable $httpHandler
     * @param string $securityCredentialsUrl
     * @param array<string, string|string[]> $headers Request headers to send in with the request.
     * @return array{string, string, ?string}
     */
    public static function getSigningVarsFromUrl(
        callable $httpHandler,
        string $securityCredentialsUrl,
        string $roleName,
        array $headers
    ): array {
        // Get the AWS credentials
        $credsRequest = new Request(
            'GET',
            $securityCredentialsUrl . '/' . $roleName,
            $headers
        );
        $credsResponse = $httpHandler($credsRequest);
        $awsCreds = json_decode((string) $credsResponse->getBody(), true);
        return [
            $awsCreds['AccessKeyId'], // accessKeyId
            $awsCreds['SecretAccessKey'], // secretAccessKey
            $awsCreds['Token'], // token
        ];
    }

    /**
     * @internal
     *
     * @return array{string, string, ?string}
     */
    public static function getSigningVarsFromEnv(): ?array
    {
        $accessKeyId = getenv('AWS_ACCESS_KEY_ID');
        $secretAccessKey = getenv('AWS_SECRET_ACCESS_KEY');
        if ($accessKeyId && $secretAccessKey) {
            return [
                $accessKeyId,
                $secretAccessKey,
                getenv('AWS_SESSION_TOKEN') ?: null, // session token (can be null)
            ];
        }

        return null;
    }

    /**
     * Return HMAC hash in binary string
     */
    private static function hmacSign(string $key, string $msg): string
    {
        return hash_hmac('sha256', self::utf8Encode($msg), $key, true);
    }

    /**
     * @TODO add a fallback when mbstring is not available
     */
    private static function utf8Encode(string $string): string
    {
        return mb_convert_encoding($string, 'UTF-8', 'ISO-8859-1');
    }

    private static function getSignatureKey(
        string $key,
        string $dateStamp,
        string $regionName,
        string $serviceName
    ): string {
        $kDate = self::hmacSign(self::utf8Encode('AWS4' . $key), $dateStamp);
        $kRegion = self::hmacSign($kDate, $regionName);
        $kService = self::hmacSign($kRegion, $serviceName);
        $kSigning = self::hmacSign($kService, 'aws4_request');

        return $kSigning;
    }
}
