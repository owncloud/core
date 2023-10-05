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
use InvalidArgumentException;
use UnexpectedValueException;

/**
 * Retrieve a token from a URL.
 */
class UrlSource implements ExternalAccountCredentialSourceInterface
{
    private string $url;
    private ?string $format;
    private ?string $subjectTokenFieldName;

    /**
     * @var array<string, string|string[]>
     */
    private ?array $headers;

    /**
     * @param string $url                   The URL to fetch the subject token from.
     * @param string $format                The format of the token in the response. Can be null or "json".
     * @param string $subjectTokenFieldName The name of the field containing the token in the response. This is required
     *                                      when format is "json".
     * @param array<string, string|string[]> $headers Request headers to send in with the request to the URL.
     */
    public function __construct(
        string $url,
        string $format = null,
        string $subjectTokenFieldName = null,
        array $headers = null
    ) {
        $this->url = $url;

        if ($format === 'json' && is_null($subjectTokenFieldName)) {
            throw new InvalidArgumentException(
                'subject_token_field_name must be set when format is JSON'
            );
        }

        $this->format = $format;
        $this->subjectTokenFieldName = $subjectTokenFieldName;
        $this->headers = $headers;
    }

    public function fetchSubjectToken(callable $httpHandler = null): string
    {
        if (is_null($httpHandler)) {
            $httpHandler = HttpHandlerFactory::build(HttpClientCache::getHttpClient());
        }

        $request = new Request(
            'GET',
            $this->url,
            $this->headers ?: []
        );

        $response = $httpHandler($request);
        $body = (string) $response->getBody();
        if ($this->format === 'json') {
            if (!$json = json_decode((string) $body, true)) {
                throw new UnexpectedValueException(
                    'Unable to decode JSON response'
                );
            }
            if (!isset($json[$this->subjectTokenFieldName])) {
                throw new UnexpectedValueException(
                    'subject_token_field_name not found in JSON file'
                );
            }
            $body = $json[$this->subjectTokenFieldName];
        }

        return $body;
    }
}
