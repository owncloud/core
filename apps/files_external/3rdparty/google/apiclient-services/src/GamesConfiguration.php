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
 * Service definition for GamesConfiguration (v1configuration).
 *
 * <p>
 * The Google Play Game Services Publishing API allows developers to configure
 * their games in Game Services.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/games/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class GamesConfiguration extends \Google\Service
{
  /** View and manage your Google Play Developer account. */
  const ANDROIDPUBLISHER =
      "https://www.googleapis.com/auth/androidpublisher";

  public $achievementConfigurations;
  public $imageConfigurations;
  public $leaderboardConfigurations;

  /**
   * Constructs the internal representation of the GamesConfiguration service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://gamesconfiguration.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1configuration';
    $this->serviceName = 'gamesConfiguration';

    $this->achievementConfigurations = new GamesConfiguration\Resource\AchievementConfigurations(
        $this,
        $this->serviceName,
        'achievementConfigurations',
        [
          'methods' => [
            'delete' => [
              'path' => 'games/v1configuration/achievements/{achievementId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'games/v1configuration/achievements/{achievementId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'games/v1configuration/applications/{applicationId}/achievements',
              'httpMethod' => 'POST',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'games/v1configuration/applications/{applicationId}/achievements',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'games/v1configuration/achievements/{achievementId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'achievementId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->imageConfigurations = new GamesConfiguration\Resource\ImageConfigurations(
        $this,
        $this->serviceName,
        'imageConfigurations',
        [
          'methods' => [
            'upload' => [
              'path' => 'games/v1configuration/images/{resourceId}/imageType/{imageType}',
              'httpMethod' => 'POST',
              'parameters' => [
                'resourceId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'imageType' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->leaderboardConfigurations = new GamesConfiguration\Resource\LeaderboardConfigurations(
        $this,
        $this->serviceName,
        'leaderboardConfigurations',
        [
          'methods' => [
            'delete' => [
              'path' => 'games/v1configuration/leaderboards/{leaderboardId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'games/v1configuration/leaderboards/{leaderboardId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'insert' => [
              'path' => 'games/v1configuration/applications/{applicationId}/leaderboards',
              'httpMethod' => 'POST',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'games/v1configuration/applications/{applicationId}/leaderboards',
              'httpMethod' => 'GET',
              'parameters' => [
                'applicationId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'maxResults' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'update' => [
              'path' => 'games/v1configuration/leaderboards/{leaderboardId}',
              'httpMethod' => 'PUT',
              'parameters' => [
                'leaderboardId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GamesConfiguration::class, 'Google_Service_GamesConfiguration');
