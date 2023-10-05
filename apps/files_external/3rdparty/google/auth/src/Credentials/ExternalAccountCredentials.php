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

namespace Google\Auth\Credentials;

use Google\Auth\CredentialSource\FileSource;
use Google\Auth\CredentialSource\UrlSource;
use Google\Auth\ExternalAccountCredentialSourceInterface;
use Google\Auth\FetchAuthTokenInterface;
use Google\Auth\OAuth2;
use Google\Auth\UpdateMetadataInterface;
use Google\Auth\UpdateMetadataTrait;
use InvalidArgumentException;

class ExternalAccountCredentials implements FetchAuthTokenInterface, UpdateMetadataInterface
{
    use UpdateMetadataTrait;

    private const EXTERNAL_ACCOUNT_TYPE = 'external_account';

    private OAuth2 $auth;

    /**
     * @param string|string[] $scope   The scope of the access request, expressed either as an array
     *                                 or as a space-delimited string.
     * @param array<mixed>    $jsonKey JSON credentials as an associative array.
     */
    public function __construct(
        $scope,
        array $jsonKey
    ) {
        if (!array_key_exists('type', $jsonKey)) {
            throw new InvalidArgumentException('json key is missing the type field');
        }
        if ($jsonKey['type'] !== self::EXTERNAL_ACCOUNT_TYPE) {
            throw new InvalidArgumentException(sprintf(
                'expected "%s" type but received "%s"',
                self::EXTERNAL_ACCOUNT_TYPE,
                $jsonKey['type']
            ));
        }

        if (!array_key_exists('token_url', $jsonKey)) {
            throw new InvalidArgumentException(
                'json key is missing the token_url field'
            );
        }

        if (!array_key_exists('audience', $jsonKey)) {
            throw new InvalidArgumentException(
                'json key is missing the audience field'
            );
        }

        if (!array_key_exists('subject_token_type', $jsonKey)) {
            throw new InvalidArgumentException(
                'json key is missing the subject_token_type field'
            );
        }

        if (!array_key_exists('credential_source', $jsonKey)) {
            throw new InvalidArgumentException(
                'json key is missing the credential_source field'
            );
        }

        $this->auth = new OAuth2([
            'tokenCredentialUri' => $jsonKey['token_url'],
            'audience' => $jsonKey['audience'],
            'scope' => $scope,
            'subjectTokenType' => $jsonKey['subject_token_type'],
            'subjectTokenFetcher' => self::buildCredentialSource($jsonKey),
        ]);
    }

    /**
     * @param array<mixed> $jsonKey
     */
    private static function buildCredentialSource(array $jsonKey): ExternalAccountCredentialSourceInterface
    {
        $credentialSource = $jsonKey['credential_source'];
        if (isset($credentialSource['file'])) {
            return new FileSource(
                $credentialSource['file'],
                $credentialSource['format']['type'] ?? null,
                $credentialSource['format']['subject_token_field_name'] ?? null
            );
        }

        if (isset($credentialSource['url'])) {
            return new UrlSource(
                $credentialSource['url'],
                $credentialSource['format']['type'] ?? null,
                $credentialSource['format']['subject_token_field_name'] ?? null,
                $credentialSource['headers'] ?? null,
            );
        }

        throw new InvalidArgumentException('Unable to determine credential source from json key.');
    }

    /**
     * @param callable $httpHandler
     *
     * @return array<mixed> {
     *     A set of auth related metadata, containing the following
     *
     *     @type string $access_token
     *     @type int $expires_in
     *     @type string $scope
     *     @type string $token_type
     *     @type string $id_token
     * }
     */
    public function fetchAuthToken(callable $httpHandler = null)
    {
        return $this->auth->fetchAuthToken($httpHandler);
    }

    public function getCacheKey()
    {
        return $this->auth->getCacheKey();
    }

    public function getLastReceivedToken()
    {
        return $this->auth->getLastReceivedToken();
    }
}
