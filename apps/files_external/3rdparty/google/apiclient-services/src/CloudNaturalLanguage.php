<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service;

use Google\Client;

/**
 * Service definition for CloudNaturalLanguage (v1).
 *
 * <p>
 * Provides natural language understanding technologies, such as sentiment
 * analysis, entity recognition, entity sentiment analysis, and other text
 * annotations, to developers.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/natural-language/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudNaturalLanguage extends \Google\Service
{
  /** Apply machine learning models to reveal the structure and meaning of text. */
  const CLOUD_LANGUAGE =
      "https://www.googleapis.com/auth/cloud-language";
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $documents;

  /**
   * Constructs the internal representation of the CloudNaturalLanguage service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://language.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'language';

    $this->documents = new CloudNaturalLanguage\Resource\Documents(
        $this,
        $this->serviceName,
        'documents',
        [
          'methods' => [
            'analyzeEntities' => [
              'path' => 'v1/documents:analyzeEntities',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'analyzeEntitySentiment' => [
              'path' => 'v1/documents:analyzeEntitySentiment',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'analyzeSentiment' => [
              'path' => 'v1/documents:analyzeSentiment',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'analyzeSyntax' => [
              'path' => 'v1/documents:analyzeSyntax',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'annotateText' => [
              'path' => 'v1/documents:annotateText',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'classifyText' => [
              'path' => 'v1/documents:classifyText',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudNaturalLanguage::class, 'Google_Service_CloudNaturalLanguage');
