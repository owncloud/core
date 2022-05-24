<?php
/*
 * Copyright 2015 Google Inc.
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

namespace Google\Auth\Credentials;

use Google\Auth\CredentialsLoader;
use Google\Auth\GetQuotaProjectInterface;
use Google\Auth\OAuth2;
use Google\Auth\ProjectIdProviderInterface;
use Google\Auth\ServiceAccountSignerTrait;
use Google\Auth\SignBlobInterface;
use InvalidArgumentException;

/**
 * ServiceAccountCredentials supports authorization using a Google service
 * account.
 *
 * (cf https://developers.google.com/accounts/docs/OAuth2ServiceAccount)
 *
 * It's initialized using the json key file that's downloadable from developer
 * console, which should contain a private_key and client_email fields that it
 * uses.
 *
 * Use it with AuthTokenMiddleware to authorize http requests:
 *
 *   use Google\Auth\Credentials\ServiceAccountCredentials;
 *   use Google\Auth\Middleware\AuthTokenMiddleware;
 *   use GuzzleHttp\Client;
 *   use GuzzleHttp\HandlerStack;
 *
 *   $sa = new ServiceAccountCredentials(
 *       'https://www.googleapis.com/auth/taskqueue',
 *       '/path/to/your/json/key_file.json'
 *   );
 *   $middleware = new AuthTokenMiddleware($sa);
 *   $stack = HandlerStack::create();
 *   $stack->push($middleware);
 *
 *   $client = new Client([
 *       'handler' => $stack,
 *       'base_uri' => 'https://www.googleapis.com/taskqueue/v1beta2/projects/',
 *       'auth' => 'google_auth' // authorize all requests
 *   ]);
 *
 *   $res = $client->get('myproject/taskqueues/myqueue');
 */
class ServiceAccountCredentials extends CredentialsLoader implements
    GetQuotaProjectInterface,
    SignBlobInterface,
    ProjectIdProviderInterface
{
    use ServiceAccountSignerTrait;

    /**
     * The OAuth2 instance used to conduct authorization.
     *
     * @var OAuth2
     */
    protected $auth;

    /**
     * The quota project associated with the JSON credentials
     *
     * @var string
     */
    protected $quotaProject;

    /*
     * @var string|null
     */
    protected $projectId;

    /*
     * @var array|null
     */
    private $lastReceivedJwtAccessToken;

    /*
     * @var bool
     */
    private $useJwtAccessWithScope = false;

    /*
     * @var ServiceAccountJwtAccessCredentials|null
     */
    private $jwtAccessCredentials;

    /**
     * Create a new ServiceAccountCredentials.
     *
     * @param string|array $scope the scope of the access request, expressed
     *   either as an Array or as a space-delimited String.
     * @param string|array $jsonKey JSON credential file path or JSON credentials
     *   as an associative array
     * @param string $sub an email address account to impersonate, in situations when
     *   the service account has been delegated domain wide access.
     * @param string $targetAudience The audience for the ID token.
     */
    public function __construct(
        $scope,
        $jsonKey,
        $sub = null,
        $targetAudience = null
    ) {
        if (is_string($jsonKey)) {
            if (!file_exists($jsonKey)) {
                throw new \InvalidArgumentException('file does not exist');
            }
            $jsonKeyStream = file_get_contents($jsonKey);
            if (!$jsonKey = json_decode($jsonKeyStream, true)) {
                throw new \LogicException('invalid json for auth config');
            }
        }
        if (!array_key_exists('client_email', $jsonKey)) {
            throw new \InvalidArgumentException(
                'json key is missing the client_email field'
            );
        }
        if (!array_key_exists('private_key', $jsonKey)) {
            throw new \InvalidArgumentException(
                'json key is missing the private_key field'
            );
        }
        if (array_key_exists('quota_project_id', $jsonKey)) {
            $this->quotaProject = (string) $jsonKey['quota_project_id'];
        }
        if ($scope && $targetAudience) {
            throw new InvalidArgumentException(
                'Scope and targetAudience cannot both be supplied'
            );
        }
        $additionalClaims = [];
        if ($targetAudience) {
            $additionalClaims = ['target_audience' => $targetAudience];
        }
        $this->auth = new OAuth2([
            'audience' => self::TOKEN_CREDENTIAL_URI,
            'issuer' => $jsonKey['client_email'],
            'scope' => $scope,
            'signingAlgorithm' => 'RS256',
            'signingKey' => $jsonKey['private_key'],
            'sub' => $sub,
            'tokenCredentialUri' => self::TOKEN_CREDENTIAL_URI,
            'additionalClaims' => $additionalClaims,
        ]);

        $this->projectId = isset($jsonKey['project_id'])
            ? $jsonKey['project_id']
            : null;
    }

    /**
     * When called, the ServiceAccountCredentials will use an instance of
     * ServiceAccountJwtAccessCredentials to fetch (self-sign) an access token
     * even when only scopes are supplied. Otherwise,
     * ServiceAccountJwtAccessCredentials is only called when no scopes and an
     * authUrl (audience) is suppled.
     */
    public function useJwtAccessWithScope()
    {
        $this->useJwtAccessWithScope = true;
    }

    /**
     * @param callable $httpHandler
     *
     * @return array A set of auth related metadata, containing the following
     * keys:
     *   - access_token (string)
     *   - expires_in (int)
     *   - token_type (string)
     */
    public function fetchAuthToken(callable $httpHandler = null)
    {
        if ($this->useSelfSignedJwt()) {
            $jwtCreds = $this->createJwtAccessCredentials();

            $accessToken = $jwtCreds->fetchAuthToken($httpHandler);

            if ($lastReceivedToken = $jwtCreds->getLastReceivedToken()) {
                // Keep self-signed JWTs in memory as the last received token
                $this->lastReceivedJwtAccessToken = $lastReceivedToken;
            }

            return $accessToken;
        }
        return $this->auth->fetchAuthToken($httpHandler);
    }

    /**
     * @return string
     */
    public function getCacheKey()
    {
        $key = $this->auth->getIssuer() . ':' . $this->auth->getCacheKey();
        if ($sub = $this->auth->getSub()) {
            $key .= ':' . $sub;
        }

        return $key;
    }

    /**
     * @return array
     */
    public function getLastReceivedToken()
    {
        // If self-signed JWTs are being used, fetch the last received token
        // from memory. Else, fetch it from OAuth2
        return $this->useSelfSignedJwt()
            ? $this->lastReceivedJwtAccessToken
            : $this->auth->getLastReceivedToken();
    }

    /**
     * Get the project ID from the service account keyfile.
     *
     * Returns null if the project ID does not exist in the keyfile.
     *
     * @param callable $httpHandler Not used by this credentials type.
     * @return string|null
     */
    public function getProjectId(callable $httpHandler = null)
    {
        return $this->projectId;
    }

    /**
     * Updates metadata with the authorization token.
     *
     * @param array $metadata metadata hashmap
     * @param string $authUri optional auth uri
     * @param callable $httpHandler callback which delivers psr7 request
     * @return array updated metadata hashmap
     */
    public function updateMetadata(
        $metadata,
        $authUri = null,
        callable $httpHandler = null
    ) {
        // scope exists. use oauth implementation
        if (!$this->useSelfSignedJwt()) {
            return parent::updateMetadata($metadata, $authUri, $httpHandler);
        }

        $jwtCreds = $this->createJwtAccessCredentials();
        if ($this->auth->getScope()) {
            // Prefer user-provided "scope" to "audience"
            $updatedMetadata = $jwtCreds->updateMetadata($metadata, null, $httpHandler);
        } else {
            $updatedMetadata = $jwtCreds->updateMetadata($metadata, $authUri, $httpHandler);
        }

        if ($lastReceivedToken = $jwtCreds->getLastReceivedToken()) {
            // Keep self-signed JWTs in memory as the last received token
            $this->lastReceivedJwtAccessToken = $lastReceivedToken;
        }

        return $updatedMetadata;
    }

    private function createJwtAccessCredentials()
    {
        if (!$this->jwtAccessCredentials) {
            // Create credentials for self-signing a JWT (JwtAccess)
            $credJson = array(
                'private_key' => $this->auth->getSigningKey(),
                'client_email' => $this->auth->getIssuer(),
            );
            $this->jwtAccessCredentials = new ServiceAccountJwtAccessCredentials(
                $credJson,
                $this->auth->getScope()
            );
        }

        return $this->jwtAccessCredentials;
    }

    /**
     * @param string $sub an email address account to impersonate, in situations when
     *   the service account has been delegated domain wide access.
     */
    public function setSub($sub)
    {
        $this->auth->setSub($sub);
    }

    /**
     * Get the client name from the keyfile.
     *
     * In this case, it returns the keyfile's client_email key.
     *
     * @param callable $httpHandler Not used by this credentials type.
     * @return string
     */
    public function getClientName(callable $httpHandler = null)
    {
        return $this->auth->getIssuer();
    }

    /**
     * Get the quota project used for this API request
     *
     * @return string|null
     */
    public function getQuotaProject()
    {
        return $this->quotaProject;
    }

    private function useSelfSignedJwt()
    {
        // If claims are set, this call is for "id_tokens"
        if ($this->auth->getAdditionalClaims()) {
            return false;
        }
        
        // When true, ServiceAccountCredentials will always use JwtAccess for access tokens
        if ($this->useJwtAccessWithScope) {
            return true;
        }
        return is_null($this->auth->getScope());
    }
}
