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
 * Service definition for Ideahub (v1alpha).
 *
 * <p>
</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://console.cloud.google.com/apis/library/ideahub.googleapis.com" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Ideahub extends Google_Service
{


  public $ideas;
  public $platforms_properties_ideaStates;
  public $platforms_properties_ideas;
  public $platforms_properties_locales;

  /**
   * Constructs the internal representation of the Ideahub service.
   *
   * @param Google_Client $client The client used to deliver requests.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct(Google_Client $client, $rootUrl = null)
  {
    parent::__construct($client);
    $this->rootUrl = $rootUrl ?: 'https://ideahub.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1alpha';
    $this->serviceName = 'ideahub';

    $this->ideas = new Google_Service_Ideahub_Resource_Ideas(
        $this,
        $this->serviceName,
        'ideas',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1alpha/ideas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'creator.platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creator.platformId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'parent' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->platforms_properties_ideaStates = new Google_Service_Ideahub_Resource_PlatformsPropertiesIdeaStates(
        $this,
        $this->serviceName,
        'ideaStates',
        array(
          'methods' => array(
            'patch' => array(
              'path' => 'v1alpha/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'name' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'updateMask' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->platforms_properties_ideas = new Google_Service_Ideahub_Resource_PlatformsPropertiesIdeas(
        $this,
        $this->serviceName,
        'ideas',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1alpha/{+parent}/ideas',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'creator.platform' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creator.platformId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->platforms_properties_locales = new Google_Service_Ideahub_Resource_PlatformsPropertiesLocales(
        $this,
        $this->serviceName,
        'locales',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'v1alpha/{+parent}/locales',
              'httpMethod' => 'GET',
              'parameters' => array(
                'parent' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'pageSize' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
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
