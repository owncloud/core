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

/**
 * Service definition for Texttospeech (v1).
 *
 * <p>
 * Synthesizes natural-sounding speech by applying powerful neural network
 * models.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/text-to-speech/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Texttospeech extends Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $text;
  public $voices;
  
  /**
   * Constructs the internal representation of the Texttospeech service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://texttospeech.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'texttospeech';

    $this->text = new Google_Service_Texttospeech_Resource_Text(
        $this,
        $this->serviceName,
        'text',
        array(
          'methods' => array(
            'synthesize' => array(
              'path' => 'v1/text:synthesize',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->voices = new Google_Service_Texttospeech_Resource_Voices(
        $this,
        $this->serviceName,
        'voices',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1/voices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'languageCode' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
  }
}
